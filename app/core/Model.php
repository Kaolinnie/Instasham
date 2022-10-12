<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		// For testing: currently using local DB
		// $server = 'localhost';//127.0.0.1
		// $dbname = 'instasham';
		// $username = 'root';
		// $password = '';
		$server = 'jodyplex.ddns.net';//127.0.0.1
		$dbname = 'instasham';
		$username = 'instasham';
		$password = 'eCommerceInstashamDB2022!';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname",
											$username,$password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		}catch(\Exception $e){
			echo "Failed connecting to the database";
			exit(0);
		}
	}
}