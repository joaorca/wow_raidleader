<?php

	class DatabaseConnection
	{

		public static function get ()
		{
			static $db = NULL;
			if ( $db == NULL )
			{
				$db = new DatabaseConnection();
			}
			return $db;
		}

		private $_handle = NULL;

		private function __construct ()
		{
			//$dsn = 'mysql://root:password@localhost/photos';
			//$this->_handle =& DB::Connect( $dsn, array() );
			$this->_handle = new Connection();
		}

		public function handle ()
		{
			return $this->_handle;
		}
	}