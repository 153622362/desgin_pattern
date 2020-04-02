<?php
namespace pattern\Observer;
abstract Class EventGenerator
{
	private $observers = [];
	function notify()
	{
		foreach ($this->observers as $observer) {
			$observer->update();
		}
	}
	function addObserver(Observer $observer)
	{
		$this->observers[] = $observer;
	}
}