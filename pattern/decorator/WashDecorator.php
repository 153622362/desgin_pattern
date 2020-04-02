<?php

namespace pattern\decorator;


    Class WashDecorator implements Decorator
    {
        function beforeDo()
        {
            echo '洗手';
        }

        function afterDo()
        {
            echo "再次洗手";
        }
    }
