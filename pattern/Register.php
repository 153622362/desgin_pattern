<?php
namespace pattern;

/**
*注册树模式
*/

Class Register
{
	protected static $objects;

	/**
	*挂到树上
	*/
	static function set($alias,$object)
	{
		self::$objects[$alias] = $object;
	}

	static function get($name)
	{
		return self::$objects[$name];
	}
	/**
	*从树上卸除
	*/
	static function _unset($name)
	{
		unset(self::$objects[$name]);
	}
}