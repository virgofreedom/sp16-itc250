<?php
//postback1.php
//echo basename($_SERVER['PHP_SELF']);
//die;

//echo THIS_PAGE;
//die;
/*
' . xxx . '
*/
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
if(isset($_POST['submit']))
{//data submitted
    $res = 0;
    $value = $_POST['vConversion'];
    if (is_numeric($value))
    {
        
    
        if ($_POST['typeOfconversion']=="c2f")
        {
            $res  = $value * 1.8 + 32;
            $res = number_format($res,2) . " °F";
            $unit = "°C";
        }else if($_POST['typeOfconversion']=="f2c"){
            $res  = ($value - 32)*.5556;
            $res = number_format($res,2) . " °C";
            $unit = "°F";
        }else if($_POST['typeOfconversion']=="f2k"){
            $res  = ($value +459.67)*.5556;
            $res = number_format($res,2) . " K";
            $unit = "°F";
        }else if($_POST['typeOfconversion']=="k2f"){
            $res  = $value * 9/5 - 459.67;
            $res = number_format($res,2) . " °F";
            $unit = "K";
        }else if($_POST['typeOfconversion']=="k2c"){
            $res  = $value - 273.15;
            $res = number_format($res,2) . " °C";
            $unit = "K";
        }else if($_POST['typeOfconversion']=="c2k"){
            $res  = $value + 273.15;
            $res = number_format($res,2) . " °C";
            $unit = "°C";
        }else{
            echo "Please select the type of conversion.";
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
        die;    
        }
        echo 'The result of '.$value.' '.$unit.' is '.$res;
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
    
    }else{
        echo "This value is not numeric, please enter only the numeric";
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
        die;
    }
    
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    <input type="radio" name="typeOfconversion" value="c2f" checked/>°C to °F
    <input type="radio" name="typeOfconversion" value="f2c"/>°F to °C
    <input type="radio" name="typeOfconversion" value="f2k"/>°F to K
    <input type="radio" name="typeOfconversion" value="k2f"/> K to °F
    <input type="radio" name="typeOfconversion" value="k2c"/> K to °C
    <input type="radio" name="typeOfconversion" value="c2k"/>°C to K
    <br/><input type="Text" name="vConversion"/><br/>
    
    <input type="submit" name="submit" value="Submit It!"/>
    </form>
    ';   
}