<?php
//index.php
//include class item 
include 'item.php';
//define varaible THIS_PAGE to make it easy to action back
//to this file
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//create array to store item
$items[] = new Item("Burrito","Includes awesome sauce!",7.95);
$items[] = new Item("Taco","Includes cheese and lettuce",3.99);
$items[] = new Item("Fried Ice Cream","Includes free sprinkles",2.99);
//count array
$count_item = count($items);
//deine the tax 
$tax = 9.5;
if(isset($_POST['submit']))
{//data submitted
    //get the item name and qty from submit form
    $item = $_POST['item'];
    $qty  = $_POST['Qty'];
    $top = $_POST['topping'];
    
    if (!is_numeric($qty))
    {//verify if it is numeric or not if not show the message
        echo '<h3>The quantity can be only in number please enter again.</h3><a href="' . THIS_PAGE . '">Enter again</a>';
        die;
    }else{
        for($i=0;$i < $count_item;$i++)
        {
            if ($item == $items[$i]->name){
                //compare the item name to get price and description
                $price = $items[$i]->price;
                $des = $items[$i]->description;
                break; //exit loop
            }
        }
    //calculate the amount due before tax
    $amount = number_format($price * $qty,2);
        if ($top == "yes")
        {//get topping price
            $top_price = .25;

        }else{
            $top_price = 0;            
        }
        $sub_total = number_format($amount + $top_price,2);
        $total = number_format($sub_total,2) + number_format($amount * $tax/100,2);
    }
    ?>
<table>
    <thead>
        <tr>
            <th>Name</th><th>Description</th><th>Price</th><th>Qty</th><th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?=$item?></td><td><?=$des?></td>
            <td>$<?=$price?></td><td><?=$qty?></td>
            <td>$<?=$amount?></td>
        </tr>
        <?php
         if ($top == "yes")
         {//if have top show item topping
            echo "<tr>
            <td></td><td>Add topping</td>
            <td>$$top_price</td><td>1</td>
            <td>$$top_price</td>
            </tr>";
         }
        ?>
        <tr><td colspan="4">Sub toal</td><td>$<?=$sub_total?></td></tr>
        <tr><td colspan="4">Tax</td><td><?=$tax?>%</td></tr>
        <tr><td colspan="4">Total</td><td>$<?=$total?></td></tr>
    </tbody>
</table>
<?php
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    Item name:<select name="item">';
    //loop in array to show the item name for custumer
    for($i=0;$i < $count_item;$i++)
    {
        echo '<option value="'.$items[$i]->name.'">'.$items[$i]->name.'</option>';
    }
    echo '</select><br/>
    Quantity:<input type="Text" name="Qty"/><br/>
    Topping <input type="radio" name="topping" value="no" checked/>No
    <input type="radio" name="topping" value="yes"/>Yes
    <input type="submit" name="submit" value="Submit It!"/>
    </form>
    ';   
}