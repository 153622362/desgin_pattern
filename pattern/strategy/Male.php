<?php
namespace pattern\strategy;

Class Male implements \pattern\strategy\Strategy
{
	function showAd()
	{
		echo "show a Male AD<br>";
	}

	function showCategory()
	{
		echo "show a Male category<br>";
	}
}