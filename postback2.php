<?php
//postback2.php
//echo basename($_SERVER['PHP_SELF']);
//die;
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//echo THIS_PAGE;
//die;
/*
' . xxx . '
*/
if(isset($_POST['submit']))
{//data submitted
    echo '<pre>';
    var_dump($_post);
    echo '</pre>';
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    Number 1:<input type="Text" name="number1"/><br/>
    Number 2:<input type="Text" name="number2"/><br/>
    <input type="submit" name="submit" value="Submit It!"/>
    </form>
    ';   
}