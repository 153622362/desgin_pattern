<?php
namespace database\db;
use database\db\InterDatabase;
use \pattern\Register;

Class Mysqli implements InterDatabase
{
	protected $conn;
	public function __construct()
	{
		$config = Register::get('database');
		$this->connect($config['host'],$config['username'],$config['password'],$config['dbname']);
	}


	function connect($host, $user, $pass, $dbname)
	{
		$this->conn = mysqli_connect($host, $user, $pass, $dbname);
        mysqli_set_charset($this->conn, 'utf8');

	}

	function query($sql='')
	{
		return @mysqli_query($this->conn, $sql);

	}

	function close()
	{
		mysqli_close($this->conn);
	}
}
