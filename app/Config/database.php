<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behaviour of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your database connection details.
 *
 * @package       cake.config
 */
/**
 * Database configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * datasource => The name of a supported datasource; valid options are as follows:
 *		Database/Mysql 		- MySQL 4 & 5,
 *		Database/Sqlite		- SQLite (PHP5 only),
 *		Database/Postgres	- PostgreSQL 7 and higher,
 *		Database/Sqlserver	- Microsoft SQL Server 2005 and higher
 *
 * You can add custom database datasources (or override existing datasources) by adding the
 * appropriate file to app/Model/Datasource/Database.  Datasources should be named 'MyDatasource.php',
 *
 *
 * persistent => true / false
 * Determines whether or not the database should use a persistent connection
 *
 * host =>
 * the host you connect to the database. To add a socket or port number, use 'port' => #
 *
 * prefix =>
 * Uses the given prefix for all the tables in this database.  This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres specifies which schema you would like to use the tables in. Postgres defaults to 'public'.
 *
 * encoding =>
 * For MySQL, Postgres specifies the character encoding to use when connecting to the
 * database. Uses database default not specified.
 *
 * unix_socket =>
 * For MySQL to connect via socket specify the `unix_socket` parameter instead of `host` and `port`
 */
class DATABASE_CONFIG {
	
	/*
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'admink6x43Jk',
		'password' => 'AzqGgm2a1SCc',
		'database' => 'recordings',		
		'prefix' => '',
		'encoding' => 'utf8',
	);
	*/
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '4reQeX@D',
		'database' => 'recordings',		
		'prefix' => '',
		'encoding' => 'utf8',
	);	
	

	/* zxq.net & local */
	/*
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => '888548_user',
		'password' => 'parola00',
		'database' => 'recordings_zzl_db',		
		'prefix' => '',
		'encoding' => 'utf8',
	);
	*/

	/* 000webhost */
	/*
		public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql6.000webhost.com',
		'login' => 'a6273919_user',
		'password' => 'parola00',
		'database' => 'a6273919_db',		
		'prefix' => '',
		'encoding' => 'utf8',
	);	
	
	/* Byethost */
	/*
		public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'sql306.byethost12.com',
		'login' => 'b12_14380050',
		'password' => 'parola00',
		'database' => 'b12_14380050_db',		
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
	
	*/
	
	/* 2freehosting.com - recordings.yzi.me */
	/*
		public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql.2freehosting.com',
		'login' => 'u867850604_user',
		'password' => 'parola00',
		'database' => 'u867850604_db',		
		'prefix' => '',
		'encoding' => 'utf8',
	);
	
	
	*/	

	/*
	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
	*/

	/*
	public function __construct() {
               if (getenv("OPENSHIFT_MYSQL_DB_HOST")):
	           $this->default['host']       = getenv("OPENSHIFT_MYSQL_DB_HOST");
	           $this->default['port']       = getenv("OPENSHIFT_MYSQL_DB_PORT");
	           $this->default['login']      = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
	           $this->default['password']   = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
	           $this->default['database']   = getenv("OPENSHIFT_APP_NAME");
	           $this->default['datasource'] = 'Database/Mysql';
	           $this->test['datasource']    = 'Database/Mysql';
	       else:
	           $this->default['host']       = getenv("OPENSHIFT_POSTGRESQL_DB_HOST");
	           $this->default['port']       = getenv("OPENSHIFT_POSTGRESQL_DB_PORT");
	           $this->default['login']      = getenv("OPENSHIFT_POSTGRESQL_DB_USERNAME");
	           $this->default['password']   = getenv("OPENSHIFT_POSTGRESQL_DB_PASSWORD");
	           $this->default['database']   = getenv("OPENSHIFT_APP_NAME");
	           $this->default['datasource'] = 'Database/Postgres';
	           $this->test['datasource']    = 'Database/Postgres';
	       endif;
	}
	*/

}
