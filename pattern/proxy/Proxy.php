<?php
namespace pattern\proxy;

Class Proxy implements InterfaceProxy
{
	public function getUserName($id)
	{
		$db = \pattern\Factory::createDb();  //假设是读库
		$sql = "select * from users where id = {$id}";
		$db->query($sql);

	}
	public function setUserName($id,$name)
	{
		$db = new \database\db\Mysqli();  //假设是写库
		$db->connect('127.0.0.1','root','root','test');
		$sql = "update users set rname = '{$name}'";
		$db->query($sql);
	}
}