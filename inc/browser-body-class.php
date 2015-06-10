<?php
	include_once 'mobile-detect/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	$browser = $_SERVER[ 'HTTP_USER_AGENT' ];
	
	if ( $detect->isMobile() ) {
        $viewport = 'mobile';
        $blurred_border = 'blurred-border';
    }
    
    if( $detect->isTablet() ){
        $viewport = 'tablet';
        $blurred_border = 'blurred-border';
    }
    
    if( $detect->isMobile() && !$detect->isTablet() ){
        $viewport = 'phone';
	    $blurred_border = '';
    }

    if( !$detect->isMobile() && !$detect->isTablet() ){
        $viewport = 'desktop';
	    $blurred_border = 'blurred-border';
    }
	
	if( preg_match( "/Firefox/", $browser ) && preg_match( "/Gecko/", $browser ) ) {
        $browseris = 'firefox';
	
	} elseif ( preg_match( "/Safari/", $browser ) && !preg_match( "/Chrome/", $browser ) ) {
        $browseris = 'safari';

    } elseif ( preg_match( "/Opera/", $browser ) ) {
        $browseris = 'opera';
		
	} elseif ( preg_match( "/MSIE/", $browser ) ) {
        $browseris = 'msie';
	
	} elseif ( preg_match( "/Chrome/", $browser ) ) {
        $browseris = 'chrome';
    
	} else {
    	$browseris = 'unknown';
    }

    // Mac, PC ...or Linux
    if ( preg_match( "/Mac/i", $browser ) ){
        $os = 'mac';

    } elseif ( preg_match( "/Windows/i", $browser ) ){
        $os = 'windows';

    } elseif ( preg_match( "/Linux/i", $browser ) ) {
        $os = 'linux';

    } else {
        $os = 'unknown-os';
    }