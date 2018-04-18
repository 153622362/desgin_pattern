<?php
namespace pattern\strategy;

Class Male implements \pattern\strategy\Strategy
{
	function showAd()
	{
		echo "show a Male AD";
	}

	function showCategory()
	{
		echo "show a Male category";
	}
}