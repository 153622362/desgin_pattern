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
		$this->db = new db\PDO();
		$this->db->connect('localhost','root','root','test');
		$sql = "select * from users where id = {$id}";
		$res = $this->db->query($sql);
		$result = $res->fetch(\PDO::FETCH_ASSOC);
		$this->id = $result['id'];
		$this->rname = $result['rname'];
		$this->created_at = $result['created_at'];
	}

	public function __destruct()
	{
		$this->db->query("update users set rname ='{$this->rname}',created_at='{$this->created_at}' where id = '{$this->id}'  limit 1");
	}
}