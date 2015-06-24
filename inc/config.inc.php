<?php

date_default_timezone_set('America/Los_Angeles');

if ( $_SERVER['SERVER_NAME'] == 'ubuntulocal.dev') :
	define('MY_ENV', 'dev');
else :
	define('MY_ENV', 'prod');
endif;

if (MY_ENV == 'dev') :
	define("MY_SITEURL","http://".$_SERVER['HTTP_HOST']."/curriculum-vitae");
	define("MY_HOME", "/curriculum-vitae/");
	define("MY_MAILTO", "jsoningram@gmail.com");
	define("MY_MAILFROM", "jsoningram@gmail.com");
	define("JQUERY", MY_SITEURL . "/js/vendor/jquery.js");
	define("FOUNDATIONCSS", MY_SITEURL . "/css/foundation.min.css");
	define("FOUNDATIONJS", MY_SITEURL . "/js/foundation.min.js");
	define("FONTAWESOME", MY_SITEURL . "/css/font-awesome.min.css");
	define("GOOGLEFONTS", MY_SITEURL . "/css/googlefonts.css");
	define("STYLESCSS", MY_SITEURL . "/css/style.css");
else :
	define("MY_SITEURL","http://".$_SERVER['HTTP_HOST']."");
	define("MY_HOME", "/");
	define("MY_MAILTO", "jsoningram@gmail.com");
	define("MY_MAILFROM", "info@jsoningram.com");
	define("JQUERY", "//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js");
	define("FOUNDATIONCSS", "https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css");
	define("FOUNDATIONJS", "https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js");
	define("FONTAWESOME", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css");
	define("GOOGLEFONTS", "//fonts.googleapis.com/css?family=Lato:400,300,700,900,300italic,400italic");
	define("STYLESCSS", MY_SITEURL . "/css/style.min.css");
endif;

$company_name = 'Jason Ingram';
$company_phone = '949.378.9012';
$company_fax = '';
$company_address = '';
$twitter = 'https://twitter.com/jsoningram';
$linkedin = 'https://www.linkedin.com/in/jsoningram';
$facebook = '';
$googleplus = '';
$mailchimp_url = '';
$page_title= "jason ingram | curriculum vitae";

$thankyou_message = '';

$email = 'jsoningram@gmail.com';

$obfuscated_email = "";
for ($i = 0; $i < strlen($email); $i++){
	$obfuscated_email .= "&#" . ord($email[$i]) . ";";
}