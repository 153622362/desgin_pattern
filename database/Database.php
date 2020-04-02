<?php
namespace database;

use pattern\Register;

Class Database
{
	private static $db_obj;
	public $example = "this is a Database example.<br>";

	private function __construct(){}

	//对外唯一获取对象方法
	public static function getDbInstance()
	{
		$config = Register::get('config');
		$db = $config['db_file_load'] . $config['connect_type'];
		$db = empty($db)?'\database\db\Mysqli':$db;
		if (self::$db_obj) {
			return self::$db_obj;
		}else{
			self::$db_obj = new $db();
			return self::$db_obj;
		}
	}


	private function __wakeup(){}
	private function __clone() {}
}
