<?php
//class-test1.php

    $myPerson = new Person('Neak','Rattana',10);
echo '<pre>';
var_dump($myPerson);
echo '</pre>';
    class Person{
        
        public $FirstName = '';
        public $LastName = '';
        public $Pay = 0;
        public function __construct($LastName,$FirstName,$Pay)
        {
            $this->LastName = $LastName;
            $this->FirstName = $FirstName;
            $this->Pay = $Pay;


        }

    }//end Person class