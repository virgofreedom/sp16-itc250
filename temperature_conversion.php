<?php
//postback1.php
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
    $res = 0;
    $value = $_POST['vConversion'];
    if (is_numeric($value))
    {
        
    
        if ($_POST['typeOfconversion']=="c2f")
        {
            $res  = $value * 1.8 + 32;
            $res = number_format($res,2) . " °F";
        }else if($_POST['typeOfconversion']=="f2c"){
            $res  = ($value - 32)*.5556;
            $res = number_format($res,2) . " °C";
        }else if($_POST['typeOfconversion']=="f2k"){
            $res  = ($value +459.67)*.5556;
            $res = number_format($res,2) . " K";
        }else if($_POST['typeOfconversion']=="k2f"){
            $res  = $value * 9/5 - 459.67;
            $res = number_format($res,2) . " °F";
        }else if($_POST['typeOfconversion']=="k2c"){
            $res  = $value - 273.15;
            $res = number_format($res,2) . " °C";
        }else if($_POST['typeOfconversion']=="c2k"){
            $res  = $value + 273.15;
            $res = number_format($res,2) . " °C";
        }else{
            echo "Please select the type of conversion.";
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
        die;    
        }
        echo 'The result of the conversion is '.$res;
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
    
    }else{
        echo "This value is not numeric, please enter only the numeric";
        echo '</br><a href="'.THIS_PAGE.'"><< Go Back</a>';
        die;
    }
    
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
        <select name="typeOfconversion">
            <option value="c2f">°C to °F</option>
            <option value="f2c">°F to °C</option>
            <option value="f2k">°F to K</option>
            <option value="k2f">K to °F</option>
            <option value="k2c">K to °C</option>
            <option value="c2k">°C to K</option>
        </select>
    <br/>
    <input type="Text" name="vConversion"/><br/>
    
    <input type="submit" name="submit" value="Submit It!"/>
    </form>
    ';   
}