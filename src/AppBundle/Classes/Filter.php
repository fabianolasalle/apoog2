<?php

namespace AppBundle\Classes;

use Doctrine\ORM as ORM;

class Filter
{
    public $name;
    public $condition;
    public $value;
    public $humanName;

    public function __construct($name, $condition, $value, $humanName)
    {
        $this->name = $name;
        $this->condition = $condition;
        $this->value = $value;
        $this->humanName = $humanName;
    }
}
