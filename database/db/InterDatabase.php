<?php
namespace database\db;
// 适配器模式--适配各种数据库
interface InterDatabase
{
	function connect($host,$user,$pass,$dbname);
	function query($sql);
	function close();
}