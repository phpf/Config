<?php
/**
 * @package Wells
 * @subpackage Config
 */

namespace Wells\Config;

abstract class Base {
	
	public $data;
	
	protected $readOnly = false;
	
	protected $hasDefaults = false;
	
	protected $defaults = array();
	
	public function set( $var, $val ){
		
		if ( $this->isReadOnly() )
			return false;
		
		if ( false === strpos( $var, '.' ) ){
			return $this->data[ $var ] = $val;
		}
		
		return array_set( $this->data, $var, $val );	
	}
	
	public function get( $var ){
		
		if ( false === strpos( $var, '.' ) ){
			return isset( $this->data[ $var ] ) ? $this->data[ $var ] : $this->getDefault( $var );
		}
		
		return array_get( $this->data, $var );
	}
	
	public function exists( $var ){
		
		$val = $this->get( $var );
		
		return !empty( $val );
	}

	public function isReadOnly(){
		return (bool) $this->readOnly;	
	}
	
	public function hasDefaults(){
		return (bool) $this->hasDefaults;	
	}
	
	public function setReadOnly( $val ){
		$this->readOnly = (bool) $val;	
		return $this;
	}
	
	public function setHasDefaults( $val ){
		$this->hasDefaults = (bool) $val;
		return $this;
	}
	
	public function setDefault( $var, $val ){
		$this->defaults[ $var ] = $val;
		return $this;
	}
	
	public function getDefault( $var ){
		
		if ( ! $this->hasDefaults() || ! isset( $this->defaults[ $var ] ) ){
			return null;	
		}
		
		return $this->defaults[ $var ];
	}
}

