<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		// local DB
		$server = 'localhost';//127.0.0.1
		$dbname = 'instasham';
		$username = 'root';
		$password = '';

		// my hosted DB which you can access right now if you would like, just uncomment
		// $server = 'jodyplex.ddns.net';
		// $dbname = 'instasham';
		// $username = 'instasham';
		// $password = 'eCommerceInstashamDB2022!';

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