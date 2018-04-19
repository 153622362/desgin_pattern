<?php
namespace pattern;
/**
*工厂模式
*在一个类中生成对象
*外部则可以 Factory\Factory::createObj();
*往后修改工厂类的对象就可以切换对象或更改名字
*/
class Factory
{
	public $example = 'this is a Factory pattern example.';

	static function createDb()
	{
		if (!(Register::get('db'))) {
			$obj = \database\Database::getInstance();
			Register::set('db',$obj); //映射到注册树模式上
		}
		return Register::get('db');		
	}

	static function createORMUser($id)
	{
		$key = 'user'.$id;
		if (!(Register::get($key))) {
			$obj = new \database\User($id);
			Register::set($key, $obj); //映射到注册树上
		}
		
		return Register::get($key);
	}
}


