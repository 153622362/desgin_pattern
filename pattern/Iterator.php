<?php
namespace pattern;

class Iterator implements \Iterator
{
    protected $ids;
    protected $data = array();
    protected $index;

    function __construct()
    {
        $db = \pattern\Factory::createDb();
        $result = $db->query("select id from users");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
    }

    function current()
    {
        $id = $this->ids[$this->index]['id'];
        return $id;
    }

    function next()
    {
        $this->index ++;
    }

    function valid()
    {
        return $this->index < count($this->ids);
    }

    function rewind()
    {
        $this->index = 0;
    }

    function key()
    {
        return $this->index;
    }

}