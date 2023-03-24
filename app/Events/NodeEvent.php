<?php
namespace App\Events;

class NodeEvent
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}
