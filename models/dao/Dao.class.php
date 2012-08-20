<?php
	class Dao
	{

		protected $db;

		public function __construct ()
		{
			//$this->db = &$GLOBALS["pdo"];
			$this->db = DatabaseConnection::get()->handle();
		}

		//public function getList( $orderBy=NULL ){}

		public function save ( $object )
		{
			$exists = $this->findById( $object->getId() );
			if ( empty( $exists ) )
			{
				$this->insert( $object );
			}
			else
			{
				$object->setId( $exists->getId() );
				$this->update( $object );
			}
		}

	}