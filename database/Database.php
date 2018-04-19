<?php
namespace database; //注意命名空间

Class Database
{
	protected static $db_obj;
	public $example = "this is a Database example.<br>";

	/**
	*单例模式
	*禁止实例化对象
	*/
	private function __construct()
	{
	}
	/**
	*单例模式
	*获取对象
	*/
	static function getInstance()
	{
		if (self::$db_obj) {
			return self::$db_obj;
		}else{
			self::$db_obj = new db\Mysqli();
			return self::$db_obj;
		}
	}

	public function where()
	{
		return $this; //实现链式操作
	}

	public function order()
	{
		return $this;
	}
	
	public function limit()
	{
		return $this;
	}
}