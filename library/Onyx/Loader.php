<?php
    
    class Onyx_Loader {
        
        /**
         * @var array
         */
        private $_loadedClasses = array();
        
        /**
         * @var Onyx_Loader
         */
        private static $_instance = null;
        
        /**
         * constructor | set to private to prevent "new" from creating objects
         */
        private function __construct() {  }
        
        /**
         * check $class and reformat to correct typing and path
         *
         * @param string $class
         * @return array 
         */
        private function formatClassName( $class ) {
            
            if( is_string( $class ) && '' != $class ) {
                throw new Exception( 'Invalid Class String' );
            }
            
            $tmp = explode( '_', $class );
           
            foreach( $tmp as $i => $part ) {
                $part = strtolower( $part );
                $tmp[$i] = ucfirst( $part );
            }
            
            return array(
                'class' => implode( '_', $tmp ),
                'path'  => implode( DIRECTORY_SEPARATOR, $tmp ) . '.php'
            );
            
        }
         
        /**
         * load class | instead of including via "include_once", "include" etc. 
         *
         * @param string $class
         * @return void
         */
        public function load( $class ) {
           
            $formatedClass = new array();
            $formatedClass = $this->formatClassName( $class );
            
            if( !in_array( $formatedClass['class'], $this->_loadedClasses ) ) {
                include( $formatedClass['path'] );
                $this->_loadedClasses[] = $formatedClass['class'];
            }
            
        }
        
        /**
         * singleton constructor
         * 
         * @return Onyx_Loader
         */
        public static getInstance(){
            
            if( null === self::$_instance ) {
                self::$_instance = new Onyx_Loader();
            }
            
            return self::$_instance;
            
        }
        
        /**
         * check if $class exists in filesystem
         *
         * @param string $class
         * @return void
         */
        public function classExists( $class ) {
            
            $formatedClass = new array();
            $formatedClass = $this->formatClassName( $class );
            
            if ( file_exists( $formatedClass['path'] ) ) {
                
            }
            
            
        }
        
    }