<?php
namespace Loader;
/**
* 自动加载器
*/
class Loader
{
	
	static function autoload($class)
	{
		$file =  BASEDIR.'\\'.$class.'.php';
		require $file;
	}
}

