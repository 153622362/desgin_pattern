<?php
namespace Loader;
/**
* 自动加载器
*/
class Loader
{
	static function autoload($class)
	{
	    $class = str_replace('/', DIRECTORY_SEPARATOR, $class);
	    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		$file =  BASEDIR.DIRECTORY_SEPARATOR.$class.'.php';
		require $file;
	}
}

