<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'SIAF';	

$db['SIAF'] = array(
	'dsn'	=> 'DBVFP',
	'hostname' => '',
	'username' => '',
	'password' => '',
	'database' => '',
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

// $db['DBSIAF'] = array(
//     'dsn'          => '',
//     'hostname'     => '192.168.1.100', //
//     'username'     => 'smp',
//     'password'     => 'Semo123',
//     'database'     => 'DBSIAF',
//     'dbdriver'     => 'sqlsrv',
//     'dbprefix'     => '',
//     'pconnect'     => false,
//     'db_debug'     => (ENVIRONMENT !== 'production'),
//     'cache_on'     => false,
//     'cachedir'     => '',
//     'char_set'     => 'utf8',
//     'dbcollat'     => 'Modern_Spanish_CI_AS',
//     'swap_pre'     => '',
//     'encrypt'      => false,
//     'compress'     => false,
//     'stricton'     => false,
//     'failover'     => array(),
//     'save_queries' => true,
// );

$db['DBSIAF'] = array(
	'dsn'	=> '',
	'hostname' => "Driver={ODBC Driver 13 for SQL Server};Server=(local);Database=DBSIAF",
	'username' => 'smp',
	'password' => 'Semo123',
	'database' => '',
	'dbdriver' => 'odbc',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);