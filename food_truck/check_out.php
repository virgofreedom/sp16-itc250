<?php
include "includes/header.php";
$fq = $_POST['fq'];
$pq = $_POST['pq'];
$cq = $_POST['cq'];
$bq = $_POST['bq'];
$rq = $_POST['rq'];
$top = $_POST['topping'];
$Fname = "";$Pname = "";$Cname="";$Bname="";$Rname="";
$Fprice = "";$Pprice ="";$Bprice="";$Cprice="";$Rprice="";
$tax = 9.5;
if ($fq > 0){
    $Fname = $items[0]->name;
    $Fprice = number_format($items[0]->price,2);
    $Fsub = number_format($fq * $Fprice,2);
}
if($pq > 0){
    $Pname = $items[1]->name;
    $Pprice = number_format($items[1]->price,2);
    $Psub = number_format($pq * $Pprice,2);
}
if($cq > 0){
    $Cname = $items[2]->name;
    $Cprice = number_format($items[2]->price,2);
    $Csub = number_format($cq * $Cprice,2);
}
if($bq > 0){
    $Bname = $items[3]->name;
    $Bprice = number_format($items[3]->price,2);
    $Bsub = number_format($bq * $Bprice,2);
}
if($rq > 0){
    $Rname = $items[4]->name;
    $Rprice = number_format($items[4]->price,2);
    $Rsub = number_format($rq * $Rprice,2);
}

$tbt = number_format($Fsub + $Psub + $Csub + $Bsub + $Rsub +$top,2);
$taxP = number_format(($tbt * ($tax/100)),2);
$tamount =number_format($taxP + $tbt,2);
?>
<table>
    <tr>
<td width="30%" align="center" style="color:green">Item Name</td>
<td width="23%" align="left" style="color:green">Price</td>
<td width="27%" align="left" style="color:green">Quantity</td>
<td width="30%" align="left" style="color:green">Subtotal</td>
</tr>
<tr>
    <td><?=$Fname?></td><td>$<?=$Fprice?></td><td><?=$fq?></td><td>$<?=$Fsub?></td>
</tr>
<tr>
    <td><?=$Pname?></td><td>$<?=$Pprice?></td><td><?=$pq?></td><td>$<?=$Psub?></td>
</tr>
<tr>
    <td><?=$Cname?></td><td>$<?=$Cprice?></td><td><?=$cq?></td><td>$<?=$Csub?></td>
</tr>
<tr>
    <td><?=$Bname?></td><td>$<?=$Bprice?></td><td><?=$bq?></td><td>$<?=$Bsub?></td>
</tr>
<tr>
    <td><?=$Rname?></td><td>$<?=$Rprice?></td><td><?=$rq?></td><td>$<?=$Rsub?></td>
</tr>
<tr>
    <td></td><td></td><td>Amout due before tax:</td><td>$<?=$tbt?></td>
</tr>
<tr>
    <td></td><td></td><td>Tax <?=$tax?>%:</td><td>$<?=$taxP?></td>
</tr>
<tr>
    <td></td><td></td><td>Total amount :</td><td>$<?=$tamount?></td>
</tr>
<tr>
    <td><a href="index.php" target="_self"><button>New order</button></a></td>    
</tr>
</table>

<?php
include "includes/footer.php";
?>