<?php
namespace database\db;
use database\db\InterDatabase;

Class PDO implements InterDatabase
{
	protected $conn;
	function connect($host, $user, $pass, $dbname)
	{
		 $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}

	function query($sql)
	{
		return  $this->conn->query($sql);
		
	}

	function close()
	{
		$this->conn = null;
	}
}
