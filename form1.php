<?php
//form1.php

if(isset($_POST['submit']))
{//data submitted, show data
    echo $_POST['FirstName'];
}else{//show form
 ?>
 <form action="form1.php" method="POST">
     First Name : <input type="text" name="FirstName"><br/>
     
     <input type="submit" name="submit" value="submit">
 </form>
 
 <?php   
}