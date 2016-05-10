<?php
/**
 * demo_book_list.php along with demo_book_categories.php and demo_book_view.php provides a sample web application
 *
 *
 * demo_book_categories.php feeds a CategoryID via the querystring to demo_book_list.php.
 * 
 * The text of the Category itself is also passed (encoded) on the querystring, 
 * saving a database query.
 *
 * Paging has been implemented in this version, requiring a reference to pager_inc.php
 * 
 * @package nmCategories
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.2 2012/03/14
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see pager_inc.php 
 * @see demo_book_categories.php
 * @see demo_book_view.php 
 * @todo none
 */

require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials  

//CategoryID passed in on querystring
if(isset($_GET['cid'])){
         $myID = intval($_GET['cid']); #Convert to integer, will equate to zero if fails
}else{
        $myID = 0; //zero means no category id
}

//Category comes in on encoded on querystring
if(isset($_GET['cat'])){$myCat = strip_tags(urldecode(trim($_GET['cat'])));}else{$myCat = "all";} 
$myWhere = ""; //init

switch ($myID)
{
 case 0:
    $myWhere = "";
    break;
 default:
    $myWhere = " and b.CategoryID = " . $myID;
}

#write meta info regarding this category
if($myCat == "all"){$Category = 'Programming';}else{$Category = $myCat;}
$config->titleTag = 'ITC280 ' . $Category . ' Books '; #feature Category in <title>

$config->metaDescription = 'The ITC280 Bookstore features ' . $Category . ' and other IT books. ' . $config->metaDescription;
$config->metaKeywords = $Category . ',IT books,' . $config->metaKeywords;

//myCat will be title of page
$Title = strtoupper($myCat);

//add $myWhere to SQL statement
$sql = "select BookID, BookTitle, Price from Categories c inner join Books b on b.CategoryID=c.CategoryID" . $myWhere;

/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/

//END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to header_inc.php
?>
<h3 align="center"><?=$Title;?> Books (demo_book_list.php)</h3>

<p align="center">This page, along with <b>demo_book_categories.php</b> and <b>demo_book_view.php</b> 
demonstrates a Category/List/View web application with record paging.</p>
<?php

# create connection to MySQL
$iConn = IDB::conn();

# nav image buttons.  Overriding default buttons below
$first = '<img src="' . VIRTUAL_PATH . 'images/arrow_first.gif" border="0" />';
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';
$last = '<img src="' . VIRTUAL_PATH . 'images/arrow_last.gif" border="0" />';
# Create instance of new 'pager' class
$myPager = new Pager(3,$first,$prev,$next,$last);
$sql = $myPager->loadSQL($sql);  #load SQL, add offset
   
# $result stores data object in memory
$result = mysqli_query($iConn,$sql) or die(trigger_error(mysqli_error($iConn), E_USER_ERROR));
if($myPager->showTotal()==1){$itemz = "book";}else{$itemz = "books";}  //deal with plural
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
   echo '<div align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</div>';
   while ($row = mysqli_fetch_array($result))
   {//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		echo '<div align="center" valign="middle">';
		echo '<a href="' . VIRTUAL_PATH . 'demo/demo_book_view.php?id=' . dbOut($row['BookID']) . '&cid=' . $myID . '&cat=' . $myCat . '">';
		echo dbOut($row['BookTitle']) . '</a>';
		echo ' <i>only</i> <font color="red">$' . money_format("%(#10n",dbOut($row['Price'])) . '</font>';
		echo '</div>';
    }
	echo $myPager->showNAV(); //show paging nav, only if enough records	
}else{//no records
    echo '<div align="center">What! No books?  There must be a mistake!!</div>';
}
echo '<div align="center"><a href="' . VIRTUAL_PATH . 'demo/demo_book_categories.php">Back To Categories</a></div>';
@mysqli_free_result($result); # clears resources

get_footer(); #defaults to footer_inc.php
?>
