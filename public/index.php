<?php
    
    // set include path in php.ini to current paths + the one in which the framework resides (temporary)
    ini_set( 'include_path', ini_get('include_path') . PATH_SEPARATOR . '../library/' );
    
    // Classloader
    include_once('Onyx/Loader.php');
    
	Onyx_Loader::getInstance()->load( 'Onyx_Controller_Front' );
	Onyx_Controller_Front::getInstance()->init();
