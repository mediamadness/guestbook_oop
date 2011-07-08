<?php

	class Onyx_Route {
		
		/**
		 * @var string
		 */
		private $_requestUri = '';
		
		/**
		 * constructor
		 */	
		public function __construct() {
			$this->_requestUri = $_SERVER['REQUEST_URI'];
		}
		
		/**
		 * get route
		 * @return array
		 */
		public function getRoute() {
			
			if( '/' == $this->_requestUri || '/index.php' == $this->_requestUri ) {
				return array(
					'module' => 'index',
					'controller' => 'index',
					'action' => 'index'
				);
			}
			
			$tmp = explode( '/', $this->_requestUri );
			unset($tmp[0], $tmp[1]);
			$tmp = array_values($tmp);
			
			switch( count( $tmp ) ){
					
				case 1 : $result = array(
					'module' => $tmp[0],
					'controller' => 'index',
					'action' => 'index'
				);
				break;
				
				case 2 : $result = array(
					'module' => $tmp[0],
					'controller' => $tmp[1],
					'action' => 'index'
				);
				break;
				
				default : $result = array(
					'module' => $tmp[0],
					'controller' => $tmp[1],
					'action' => $tmp[2]
				);
				break;
				
			}
			
			foreach( $result as $key => $value ) {
				if( empty( $value ) ) {
					$result[$key] = 'index';
				}
			}
			
			unset($tmp[0], $tmp[1], $tmp[2]);
			
			while( false !== $key = current( $tmp ) ) {
				$value = next( $tmp );
				if( !empty( $key ) ) {
					$result[$key] = $value;
				}
				next( $tmp );
			}
			
			return $result;
		}
		
		/**
		 * build url
		 * 
		 * @param array $route
		 * @return string
		 */
		public function url( Array $route ){
			
			$result = '/index.php/';
			
			$tmp = array_slice( $route, 0, 3 );
			$result .= implode( '/', $tmp );
			
			$tmp = array_slice( $route, 3 );
			foreach( $tmp as $key => $value ) {
				$result .= '/' . $key . '/' . $value;
			}
			
			return $result;
		}
		
	}
