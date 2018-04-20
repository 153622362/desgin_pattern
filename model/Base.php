<?php
namespace model;

Class Base
{
	public $table_name = '';
	public $fields = [];
	protected $conn;

	function __construct()
	{
		$this->conn = \pattern\Factory::createDb(); 
		$res = $this->conn->query("show full fields  from $this->table_name");
		while($this->fields[] = mysqli_fetch_array($res)['Field']){}
		array_pop($this->fields);
		foreach ($this->fields as $value) {
			$this->$value = '';
		}
	}

	function __set($key,$value)
	{
		$this->$key = $value;
	}

	function findById($id)
	{
		$sql = "select * from {$this->table_name} where id = {$id}";
		$result = mysqli_fetch_assoc($this->conn->query($sql));
		foreach ($result as $key => $value) {
			$this->$key = $value;
		}
		return  $this;


	}

	function save()
	{
		$sql = "update $this->table_name set ";
		$str = '';
		foreach ($this->fields as $value) {
			if (!empty($this->$value) && $value !== 'id') {
				$str .="`{$value}` = '{$this->$value}',";
			}
		}

		$str = rtrim($str,',');
		$where = " where `id` = {$this->id}";
		$sql .= $str.$where;
		var_dump($sql);
		var_dump($this->conn->query($sql));
	}
}