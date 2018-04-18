<?php
namespace pattern\strategy;
/**
*	策略模式
*创建策略可以随意切换策略
* 例如男女用户展示不用的页面	
*/

interface Strategy 
{
	function showAd();
	function showCategory();
}