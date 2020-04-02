<?php
namespace database;

use pattern\Factory;

Class User
{
	public $id;
	public $rname;
	public $created_at;

	protected $db;
	public function __construct($id)
	{
		$this->db = Factory::getDb();
		$result = mysqli_fetch_assoc($this->db->query("select * from users where id = {$id}"));
		$this->id = $result['id'];
		$this->name = $result['name'];
		$this->created_at = $result['created_at'];
	}

	public function __destruct()
	{
		$this->db->query("update users set rname ='{$this->name}',created_at='{$this->created_at}' where id = '{$this->id}'  limit 1");
	}
}
