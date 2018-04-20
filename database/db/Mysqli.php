<?php
namespace database\db;
use database\db\InterDatabase;

Class Mysqli implements InterDatabase
{
	protected $conn;
	public function __construct()
	{
		$config = \pattern\Register::get('config');
		$this->connect($config['host'],$config['username'],$config['password'],$config['dbname']);
	}


	function connect($host, $user, $pass, $dbname)
	{
		$this->conn = mysqli_connect($host, $user, $pass, $dbname);
	}

	function query($sql='')
	{
		return mysqli_query($this->conn, $sql);
		
	}

	function close()
	{
		mysqli_close($this->conn);
	}
}