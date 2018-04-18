<?php
namespace database\db;
use database\db\InterDatabase;

Class Mysql implements InterDatabase
{
	protected $conn;
	function connect($host, $user, $pass, $dbname)
	{
		$conn = mysql_connect($host, $user, $pass);
		mysql_select_db($dbname, $conn);
		$this->conn = $conn;
	}

	function query($sql)
	{
		$res = mysql_query($sql, $this->conn);
		return $res;
	}

	function close()
	{
		mysql_close($this->conn);
	}
}