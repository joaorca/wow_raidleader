<?php

	interface iDao
	{

		public function objectBuilder ( $row );

		//public function getList( $orderBy=NULL );

		public function findById ( $id );

		public function save ( $object );

		//public function insert( $object );

		//public function update( $object );

	}