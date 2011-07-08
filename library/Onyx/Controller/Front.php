<?php

	class Onyx_Controller_Front {
		
		/**
		 * @var Onyx_Controller_Front
		 */
		private static $_instance = null;
		
		/**
		 * @var Onyx_Route
		 */
		private $_route = null;
		
		/**
		 * singleton constructor
		 */
		private function __construct(){  }
		
		/**
		 * get singleton instance
		 * 
		 * @return Onyx_Controller_Front
		 */
		public static function getInstance() {
			if( null === self::$_instance ) {
				self::$_instance = new Onyx_Controller_Front();
			}
			return self::$_instance;
		}
		
		/**
		 * initialise dispatching
		 * 
		 * @return void
		 */
		public function init() {
			
			Onyx_Loader::load('Onyx_Route');
			$this->_route = new Onyx_Route();
			
			
		
		
		
		
		
		}
		
		/**
		 * return route
		 * 
		 * @return Onyx_Route
		 */
		public function getRoute() {
			return $this->_route;
		}
		
		
				
		
		
		
		
	}
