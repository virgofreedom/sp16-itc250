<?php
//item-test.php

/*

This serve a resource for our second Group project

*/

include 'item.php';

$items[] = new Item("Burrito","Includes awesome sauce!",7.95);
$items[] = new Item("Taco","Includes cheese and lettuce",3.99);
$items[] = new Item("Fried Ice Cream","Includes free sprinkles",2.99);
echo '<pre>';
var_dump($items);
echo '</pre>';