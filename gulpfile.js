var gulp 			= require('gulp'),
	gutil 			= require('gulp-util'),
	compass 		= require('gulp-compass'),
	connect 		= require('gulp-connect'),
	gulpif 			= require('gulp-if'),
	uglify 			= require('gulp-uglify'),
	jsonMinify 		= require('gulp-jsonminify'),
	concat 			= require('gulp-concat');

	sass			=	require('gulp-ruby-sass'),  // Our sass compiler
	notify			=	require('gulp-notify'), // Basic gulp notificatin using OS
	minifycss		=	require('gulp-minify-css'), // Minification
	rename			=	require('gulp-rename'), // Allows us to rename our css file prior to minifying 
	autoprefixer	=	require('gulp-autoprefixer'), // Adds vendor prefixes for us
	browserSync		=	require('browser-sync'); // Sends php, js, img and css updates to browser for us

var env,
	jsSources,
	sassSources,
	jsonSources,
	sassStyle,
	outputDir;

var env = process.env.NODE_ENV || 'production';

if (env === 'development') {
	outputDir = 'builds/development';
	sassStyle = 'expanded';
} else {
	outputDir = 'builds/production';
	sassStyle = 'compressed';
}

jsSources = [ // order of array elements determins processing order
	'./bower_components/jquery/dist/jquery.js',
	'./bower_components/foundation/js/foundation.js',
	'./js/app.js',
];
sassSources = [
	'./bower_components/foundation/scss/normalize.scss',
	'./bower_components/foundation/scss/foundation.scss',
	'./bower_components/fontawesome/scss/font-awesome.scss',
	'./css/scss/style.scss',
];
jsonSources = ['js/*.json'];


gulp.task('js', function() {
	gulp.src(jsSources)
		.pipe(concat('app.min.js'))
		.pipe(gulpif(env === 'production', uglify()))
		.pipe(gulp.dest('js'))
		.pipe(connect.reload())
});

gulp.task('watch', function() {
	gulp.watch(jsSources, ['js']);
	gulp.watch('./bower_components/foundation/scss/normalize.scss', ['styles']);
	gulp.watch('./bower_components/foundation/scss/foundation.scss', ['styles']);
	gulp.watch('./bower_components/fontawesome/scss/font-awesome.scss', ['styles']);
	gulp.watch('./css/scss/*scss', ['styles']);
	gulp.watch('./dev/*.json', ['json']);
});

gulp.task('json', function() {
	gulp.src('dev/*.json')
	.pipe(gulpif(env === 'production', jsonMinify()))
	.pipe(gulpif(env === 'production', gulp.dest('js')))
	.pipe(connect.reload())
});

gulp.task('browser-sync', function() {
	var files = [
		'**/*.php'
	];

	browserSync.init(files, {
		proxy: 'ubuntulocal.dev:8080/jsoningram'
	});
});


// Our 'styles' tasks, which handles our sass actions such as compliling and minification

gulp.task('styles', function() {
	return sass('css/scss', {
			style: 'expanded',
			lineNumbers: true,
			container: 'resume' 
		})
		.on('error', notify.onError(function(error) {
			return "Error: " + error.message;
		}))
		.pipe(autoprefixer({ 
			browsers: ['last 2 versions', 'ie >= 8']
		})) // our autoprefixer - add and remove vendor prefixes using caniuse.com
		.pipe(gulp.dest('css')) // Location of our app.css file
		.pipe(browserSync.reload({stream:true})) // CSS injection when app.css file is written
		.pipe(rename({suffix: '.min'})) // Create a copy version of our compiled app.css file and name it app.min.css
		.pipe(minifycss({
			keepSpecialComments:0
		})) // Minify our newly copied app.min.css file
		.pipe(gulp.dest('css')) // Save app.min.css onto this directory	
		.pipe(browserSync.reload({stream:true})) // CSS injection when app.min.css file is written
		.pipe(notify({
			message: "Styles task complete!"
		}));
});

gulp.task('default', ['styles', 'browser-sync', 'json', 'watch', 'js']);