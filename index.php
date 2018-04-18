<?php

define('BASEDIR', __DIR__);
include BASEDIR.'/Loader.php';
spl_autoload_register('\\Loader\\Loader::autoload'); //自动加载

//单例模式
$obj = database\Database::getInstance();
echo $obj->example;

//工厂后
$obj2 = pattern\Factory::createObj();
echo $obj2->example;
//注册树模式
$obj3 = pattern\Register::get('db');
echo $obj3->example;

//适配器模式
$db = new database\db\PDO();
$res1 = $db->connect('localhost','root','root','test');
$sql = 'select * from objects';
$res = $db->query($sql);
$db->close();


//策略模式
class Page{
	protected $strategy;
	function show()
	{
		$this->strategy->showAd();
		$this->strategy->showCategory();
	}

	function setStrategy(\pattern\strategy\Strategy $strategy)
	{
		$this->strategy = $strategy;
	}
}

$obj = new Page();
$strategy = new \pattern\strategy\Female();
$obj->setStrategy($strategy);
$obj->show();

