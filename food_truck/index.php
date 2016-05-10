<?php
include "includes/header.php";
?>
<form method="post" action="check_out.php"> 
<table>
<tr>
<td width="30%" align="center" style="color:green">Item Name</td>
<td width="23%" align="left" style="color:green">Price</td>
<td width="27%" align="left" style="color:green">Quantity</td>
<td width="30%" align="left" style="color:green">Subtotal</td>
</tr>
<?php
for ($i=0;$i < $count_item;$i++){
   
    echo '
    <tr>
        <td>'. $items[$i]->name .'</td>
        <td>'. $items[$i]->price .'</td>
        <td><input  type="number" min="0" id="'. $items[$i]->qty_form .'" 
        onkeyup="
        get_sub('."'".$items[$i]->qty_form."',"."'".$items[$i]->price."',"."'".$items[$i]->qty_form."s'".');
        total_item('."'".$count_item."',"."'sumItem','total','topping'".');" 
        name="'. $items[$i]->qty_form .'"> </td>
        <td><span id="'. $items[$i]->qty_form .'s"   align="center" style="color:red"></span></td>
    </tr>';
}
?>

<tr>
    <td>Topping :</td>
    <td>
        <?php
        echo '
        <select id="topping" name="topping" onchange="total_item('."'".$count_item."',"."'sumItem','total','topping'".');">
        ';
        ?>
        
            <option value="0"></option>
            <option value="0.5">Chese</option>
            <option value="0.75">Honey Mustard</option>
            <option value="1">Meet</option>
        </select>
    </td>
</tr>
<tr>
<td style="color:green">Total Selected Items</td>
<td id="sumItem">0</td>
<td style="color:green">Your Total Will be</td>
<td><span name='ts' id='total' style="color:red">0</span></td>
</tr>
<tr>
    <td></td>
<td><input type='submit' name="submit" value="Check out" /></a></td>
</tr>    
</table>

 </form>  
<?php
include "includes/footer.php";
?>