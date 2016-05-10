<?php
//include class item 
include 'item.php';
$items[] = new Item("FRANK HOT DOG","a fresh hot every day","5.5","fq");
$items[] = new Item("PORK","pork with low calories","7","pq");
$items[] = new Item("CHICKEN","Chiken bonless and fresh","10.5","cq");
$items[] = new Item("BRISKET","Brisket fresh","6.5","bq");
$items[] = new Item("RIBS","RIBS fresh","8.5","rq");
//count array
$count_item = count($items);
?>
<!DOCTYPE html>
<html>
<head>
<title>Food Truck Order Form</title>
<link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
<script src="js/GetTotal.js"></script>
</head>
   
<body> <!-- checks for cookies here -->

    <img src="img/food-truck.jpg">
    
    <div id="welcome">
     <h1>Welcome to <b style="color:blue">&#9832;</b> Yummy</h1>
     <h1>Food Truck</h1>
       </div>    
