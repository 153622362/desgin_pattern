<?php
namespace pattern\proxy;

interface InterfaceProxy
{
	public function get($id);
	public function set($id,$name);
}
