<?php
namespace pattern;
/**
*工厂模式
*在一个类中生成对象
*外部则可以 Factory\Factory::createObj();
*这样外部调用,修改则修改工厂中的方法就可以了。
*/
class Factory
{
	public $example = 'this is a Factory pattern example.';

	static function createObj()
	{
		$obj = \database\Database::getInstance();
		Register::set('db',$obj); //映射到注册树模式上
		return $obj;
	}
}