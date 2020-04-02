<?php
namespace pattern\proxy;

use pattern\Factory;
use pattern\Register;

Class Proxy implements InterfaceProxy
{
	public function get($id)
	{
        //假设是读库
		$db = Factory::getDb();
		$sql = "select * from users where id = {$id}";
		$db->query($sql);

	}
	public function set($id,$name)
	{
        //假设是写库
		$db = new \database\db\Mysqli();
        $database_config = Register::get('database');
		$db->connect($database_config['host'],$database_config['username'],$database_config['password'],$database_config['dbname']);
		$sql = "update users set rname = '{$name}'";
		$db->query($sql);
	}
}
