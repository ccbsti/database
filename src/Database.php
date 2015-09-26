<?php

namespace Sti;

use \PDO;
use \Slim\Slim;

/**
* Classe de conexão ao banco de dados
*/
class Database extends PDO  {


	public function __construct($driver=null, $host=null, $port=null, $name=null, $username=null, $password=null) {
	
		$app = Slim::getInstance();

		if ($driver === null) {
			if ($app->config('database.driver') !== null ) {
				$driver = $app->config('database.driver');
			} else {
				throw new DatabaseException('You need to specify the database driver!');
			}
		}

		if ($host === null) {
			if ($app->config('database.host') !== null ) {
				$host = $app->config('database.host');
			} else {
				throw new DatabaseException('You need to specify the database host!');
			}
		}

		if ($port === null) {
			if ($app->config('database.port') !== null ) {
				$port = $app->config('database.port');
			} else {
				throw new DatabaseException('You need to specify the database port!');
			}
		}		

		if ($name === null) {
			if ($app->config('database.name') !== null ) {
				$name = $app->config('database.name');
			} else {
				throw new DatabaseException('You need to specify the database name!');
			}
		}		

		if ($username === null) {
			if ($app->config('database.username') !== null ) {
				$username = $app->config('database.username');
			} else {
				throw new DatabaseException('You need to specify the database username!');
			}
		}		

		if ($password === null) {
			if ($app->config('database.password') !== null ) {
				$password = $app->config('database.password');
			} else {
				throw new DatabaseException('You need to specify the database password!');
			}
		}		


		parent::__construct("$driver:host=$host;port=$port;dbname=$name", $username, $password,
			array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_STATEMENT_CLASS => array('\Sti\DatabaseStatement')
				)
			);
	}

}
