<?php


    namespace pattern\Observer;


Class Event extends EventGenerator
{
    function trigger()
    {
        echo "Event";
        $this->notify();
    }
}
