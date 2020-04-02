<?php

namespace pattern\decorator;

//装饰器模式
Class Human
{
    protected $decorators = [];
    public function eat()
    {
        $this->beforeat();
        echo "吃饭";
        $this->aftereat();
    }

    public function beforeat()
    {
        foreach ($this->decorators as $decorator) {
            $decorator->beforeDo();
        }
    }

    public function aftereat()
    {
        krsort($this->decorators);
        foreach ($this->decorators as $decorator) {
            $decorator->afterDo();
        }
    }

    public function addDecorator(Decorator $decorator)
    {
        $this->decorators[] = $decorator;
    }
}
