var json = (function() {
	var json = null;
	$.ajax({
		'async': false,
		'global': false,
		'url': "js/data.json",
		'dataType': "json",
		'success': function (data) {
			json = data;
		}
	});
	return json;
 })();

$( ".about-me" ).click(function() {
	$( "#experience" ).addClass( "hide" );
	$( "#portfolio" ).addClass( "hide" );
	$( "#about" ).removeClass( "hide" );
});

$( ".return" ).click(function() {
	$( "#experience" ).removeClass( "hide" );
	$( "#portfolio" ).removeClass( "hide" );
	$( "#about" ).addClass( "hide" );
});