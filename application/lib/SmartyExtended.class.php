<?php

	include_once '../application/config/includes.inc.php';

	class Smarty_Extended extends SmartyBC
	{

		function __construct ()
		{
			parent::__construct();
			$this->template_dir = SMARTY_TEMPLATE_DIR;
			$this->compile_dir  = SMARTY_COMPILE_DIR;
			$this->cache_dir    = SMARTY_CACHE_DIR;
			$this->caching      = FALSE;
		}

	}