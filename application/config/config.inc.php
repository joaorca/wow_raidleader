<?php

	define( 'APPLICATION_NAME', "#raidleadervaisefuder" );
	define( 'CHARSET', 'UTF-8' );

	define( 'DOCUMENT_ROOT', $_SERVER[ 'DOCUMENT_ROOT' ] );
	define( 'HTTP_HOST', $_SERVER[ 'HTTP_HOST' ] );

	define( 'APPLICATION_URL', "http://" . HTTP_HOST . "/" );
	define( 'PUBLICHTML_URL', APPLICATION_URL . "public_html/" );

	define( 'APPLICATION_DIR', DOCUMENT_ROOT . "/" );
	define( 'SMARTY_TEMPLATE_DIR', APPLICATION_DIR . "views/" );
	define( 'SMARTY_COMPILE_DIR', APPLICATION_DIR . "application/smarty/template_c/" );
	define( 'SMARTY_CACHE_DIR', APPLICATION_DIR . "application/smarty/cache/" );

	define( 'LIB_DIR', APPLICATION_DIR . "application/lib/" );
	define( 'SMARTY_DIR', LIB_DIR . "Smarty-3.1.11/libs/" );

	define( 'MODEL_DIR', APPLICATION_DIR . "models/" );
	define( 'DAO_DIR', MODEL_DIR . "dao/" );

	define( 'VIEW_DIR', SMARTY_TEMPLATE_DIR );

	if ( $_SERVER[ "SERVER_ADMIN" ] == "webmaster@laguna" )
	{
		define( 'DB_HOST', 'laguna' );
	}
	else
	{
		define( 'DB_HOST', 'localhost' );
	}

	define( 'DB_USER', 'postgres' );
	define( 'DB_PASS', 'postgres' );
	define( 'DB_DATABASE', 'dbwow' );
	define( 'DB_DRIVER', 'pgsql' );
	define( 'DB_PORT', '5432' );