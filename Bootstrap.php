<?php
/**
 * @package Wells.Config
 */

require __DIR__ . '/Base.php';

/**
* Returns instance of Config_Object
*/
function config(){
	static $config;
	if ( ! isset($config) )
		$config = new Wells\Config\Object;
	return $config;
}

function config_set( $var, $val ){
	return config()->set( $var, $val );
}

function config_get( $var ){
	return config()->get( $var );
}

function config_isset( $var ){
	return config()->exists( $var );	
}
