


<!DOCTYPE html>
<html>
<head>
<title>Food Truck Order Form</title>
<link href="css/stylesheet.css" type="text/css" rel="stylesheet" />

</head>
   
<body> <!-- checks for cookies here -->

    <img src="img/food-truck.jpg">
    
    <div id="welcome">
     <h1>Welcome to <b style="color:blue">&#9832;</b> Yummy</h1>
     <h1>Food Truck</h1>
       </div>    
<form method="post" action="thax.php" name="payment"> 
<table>
<tr>
<td style="color:green">Total Selected Items</td>
<td><output <?=$sumItems?> /></td>
<td style="color:green">Your Total is </td>
<td><output <?=$sumTotal?> /></td>
</tr>    


    
<tr>
 <td style="color:green">Payment Method</td>
</tr> 
 
 <tr>   
<td><label style="color:green">Visa <a href="#"><input type="checkbox" name="Visa" value="Visa"></a></label></td>
</tr>
    
  <tr> 
<td><label style="color:green">Master <a href="#"><input type="checkbox" name="Master" value="Master"></a></label></td>
 </tr>
    
<tr> 
<td><label style="color:green">Cash <a href="#"><input type="checkbox" name="Cash" value="Cash"></a></label></td>
 </tr>

<tr>
<td><input type="submit" name="Submit" value="Check Out" ></td>
</tr>

</table>

 </form>  
    

</body>
</html>
