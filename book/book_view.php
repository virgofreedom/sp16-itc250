<?php
/**
 * demo_book_view.php along with demo_book_categories.php and demo_book_list.php provides a sample web application
 *
 *
 * demo_book_categories.php feeds a CategoryID via the querystring to demo_book_list.php.
 * 
 * The text of the Category itself is also passed (encoded) on the querystring, 
 * saving a database query.
 *
 * 
 * @package nmCategories
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.2 2012/03/14
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see demo_book_categories.php
 * @see demo_book_list.php 
 * @todo none
 */

require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials 

if(isset($_GET['cid'])){$CategoryID = $_GET['cid'];}else{$CategoryID =0;}
if(isset($_GET['cat'])){$Category = urldecode($_GET['cat']);}else{$Category="";}

//check variable of item passed in on querystring
if(isset($_GET['id'])){
	$myID = intval($_GET['id']); #Convert to integer, will equate to zero if fails
	if($myID < 1){myRedirect(VIRTUAL_PATH . 'demo/demo_book_list.php?cid=' . $CategoryID . '&cat=' . urlencode($Category));}
}else{
	myRedirect(VIRTUAL_PATH . 'demo/demo_book_list.php?cid=' . $CategoryID . '&cat=' . urlencode($Category)); # Nothing on querystring, redirect
}

$sql = "select BookTitle, Description, Price from Books where BookID = " . $myID;

//END CONFIG AREA ---------------------------------------------------------- 

# create connection to MySQL
$iConn = IDB::conn();
   
# $result stores data object in memory
$result = mysqli_query($iConn,$sql) or die(trigger_error(mysqli_error($iConn), E_USER_ERROR));

if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	$foundRecord = TRUE;
	while ($row = mysqli_fetch_array($result))
	{
	     $BookTitle = dbOut($row['BookTitle']);
	     $Description = dbOut($row['Description']);
	     $Price = dbOut($row['Price']);
	     $PageTitle = 'ITC280 Books: ' . $BookTitle; #feature book title in $PageTitle
	     $config->metaKeywords = $BookTitle . ',' . $Category . ',IT Books,' . $config->metaKeywords;
	     $config->metaDescription  = 'The ITC280 Bookstore features books like ' . $BookTitle . ' and other ' . $Category . ' books. ' . $config->metaDescription;
	}
}else{
	$foundRecord = FALSE;
	$PageTitle = 'No such book!';	
}
get_header(); #defaults to header_inc.php
?>
<h3 align="center"><?php echo THIS_PAGE; ?></h3>

<p align="center">This page, along with <b>demo_book_categories.php</b> and <b>demo_book_list.php</b> demonstrates a Category/List/View 
web application with record paging.</p>
<?php if($foundRecord){ ?>   
	<h3 align="center"><?php echo $BookTitle; ?></h3>
	<table align="center">
		<tr>
			<td><img src="<?=VIRTUAL_PATH;?>upload/b<?=$myID;?>.jpg" /></td>
			<td>We have great books like <?=$BookTitle;?></td>
		</tr>
		<tr>
			<td colspan="2">
				<blockquote><?=$Description;?></blockquote>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<h3><i>ONLY!!:</i> <font color="red">$<?=number_format($Price,2);?></font></h3>
			</td>
		</tr>
	</table>
<?    
}else{//no records
	echo '<div align="center">There is no such book!</div>';
}
?>
<div align="center"><a href="<?php echo VIRTUAL_PATH . 'demo/demo_book_list.php?cid=' . $CategoryID . '&cat=' . urlencode($Category);?>">More <?php echo $Category;?> Books!</a></div>
<div align="center"><a href="<?php echo VIRTUAL_PATH; ?>demo/demo_book_categories.php">Back To Categories</a></div>
<?php
@mysqli_free_result($result); # clears resources

get_footer(); #defaults to footer_inc.php
?>