<?php
namespace pattern\proxy;

interface InterfaceProxy
{
	public function getUserName($id);
	public function setUserName($id,$name);
}