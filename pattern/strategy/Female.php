<?php
namespace pattern\strategy;

Class Female implements \pattern\strategy\Strategy
{
	function showAd()
	{
		echo "show a Female AD<br>";
	}

	function showCategory()
	{
		echo "show a Female category<br>";
	}
}