<?php
namespace pattern;

class Iterator implements \Iterator
{
    protected $ids;
    protected $data = array();
    protected $index;

    function __construct()
    {
        $db = \pattern\Factory::getDb();
        $result = $db->query("select * from users");
        $this->data = $result->fetch_all(MYSQLI_ASSOC);
    }

    function current()
    {
        $id = $this->data[$this->index];
        return $id;
    }

    function next()
    {
        $this->index++;
    }

    function valid()
    {
        return $this->index < count($this->data);
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
