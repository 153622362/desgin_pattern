<?php
namespace pattern\strategy;

class Page{
    protected $strategy;
    function show()
    {
        $this->strategy->showAd();
        $this->strategy->showCategory();
    }

    function setStrategy(\pattern\strategy\Strategy $strategy)
    {
        $this->strategy = $strategy;
    }
}
