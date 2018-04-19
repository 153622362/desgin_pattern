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
		$conn = mysqli_connect($host, $user, $pass, $dbname);
		$this->conn = $conn;
	}

	function query($sql)
	{
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}

	function close()
	{
		mysqli_close($this->conn);
	}
}