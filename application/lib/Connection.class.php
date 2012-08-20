<?php
	final class Connection extends PDO
	{

		public function __construct ()
		{
			try
			{
				parent::__construct( DB_DRIVER . ":host='" . DB_HOST . "';port='" . DB_PORT . "';dbname='" . DB_DATABASE . "';user='" . DB_USER . "';password='" . DB_PASS . "'" );
				parent::setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e )
			{
				echo 'Error: ' . $e->getMessage();
			}
		}

	}