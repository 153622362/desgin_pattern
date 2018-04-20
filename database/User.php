<?php
namespace database;

Class User
{
	public $id;
	public $rname;
	public $created_at;

	protected $db;
	public function __construct($id)
	{
		$this->db = \pattern\Factory::createDb();
		$result = mysqli_fetch_assoc($this->db->query("select * from users where id = {$id}"));
		$this->id = $result['id'];
		$this->rname = $result['rname'];
		$this->created_at = $result['created_at'];
	}

	public function __destruct()
	{
		$this->db->query("update users set rname ='{$this->rname}',created_at='{$this->created_at}' where id = '{$this->id}'  limit 1");
	}
}