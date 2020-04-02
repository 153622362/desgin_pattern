<?php

namespace pattern\decorator;


class SingDecorator implements Decorator
{
    function beforeDo()
    {
        echo '唱歌';
    }

    function afterDo()
    {
        echo "再次唱歌";
    }
}
