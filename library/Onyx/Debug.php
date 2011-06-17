<?php
	
	/**
	 * debug
	 */
	class Onyx_Debug {
		
		/**
		 * dump variable
		 * 
		 * @param mixed $var
		 * @return void
		 */
		public static function dump( $var ){
			echo str_replace( '  ', '&nbsp;', nl2br( print_r( $var, true ) ) );
		}
		
	}
