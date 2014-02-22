<?php
/**
 * @package Wells.Config
 */

/**
* Returns instance of Config_Object
*/
function config(){
	return Wells\Util\Dependency\Container::i()->singleton('config');
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
