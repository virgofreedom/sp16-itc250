<?php
////My pager here////////////////
function my_pager_content($sql,$num_page,$var)
{
if(isset($_GET[$var])){
$current = $_GET[$var];
}else{
$current = 1;
}
$index_sql = strripos($sql,"LIMIT");
if ($index_sql != ""){
$old_sql = trim(substr($sql,0,$index_sql)-1); 
}else{
$old_sql = $sql;
}
$limit = " LIMIT ". (($current-1)*$num_page)." , ". $num_page;
$new_sql = $old_sql . $limit;
return $new_sql;
}

function my_pager_show_nav($con,$sql,$num_page,$prev_img,$next_img,$var){
if(isset($_GET[$var])){
$current = $_GET[$var];
}else{
$current = 1;
}
$self = basename($_SERVER['PHP_SELF']);
$result = mysqli_query($con,$sql);
$num_row = mysqli_num_rows($result);
$numofpage = floor($num_row / $num_page);
$last_page = $num_row % $num_page;
if ($numofpage < 1){
$numofpage = 1;
}
if ($numofpage >= 1 && $last_page > 0 ){
$page_total = $numofpage +1;
}else{
$page_total = $numofpage;
}
///Create page of pages and image here
if($current == 1){
$prev_img = "";
$next_page = $current +1; 
}if($current > 1 ){
$pre_page = $current-1;
$next_page = $current +1; 
}if($current == $page_total){
$prev_img = $prev_img;
$next_img = "";
$pre_page = $current-1;
}
$res = '<div style="text-align:center;">
<a href="'.$self.'?'.$var.'='.$pre_page.'">'.$prev_img.'</a>
<strong>'.$current.'</strong> Of <strong>'.$page_total.'</strong> '.
'<a href="'.$self.'?'.$var.'='.$next_page.'">'.$next_img.'</a></div>';
return $res;
}
////End pager here////////////////

//In the page you want the item to show up :
//
/*From here is the way to use....
//$iConn = db connection, so create your own way.
$sql = "Select * from video ORDER BY id DESC";
$number_per_page = 14; //number of each page you to show.
$var = "pl"; // just only the variable you want to set, you set what ever 
you want but if you use multiple list in the same page pls chose the different variable for each list.
$result = mysqli_query($iConn,my_pager_content($sql,$number_per_page,$var)) or die(mysqli_error($iConn));
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
//here echo what you want to show up from you db
}
echo '<div class="small-12 columns">';//use your own class here..
echo my_pager_show_nav($iConn,$sql,$number_per_page,$prev,$next,$var);
echo '</div>'; //Here we echo the nav of the page;
}else{
echo '<div class="small-12 columns"><p align=center>No result showed.</p></div>'; //use your own class here..
}
*/
?>
