<?php
//item.php

class Item{

    public $name = '';
    public $description = '';
    public $price = 0;
    
    public function __construct($name,$description,$price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    
    
}