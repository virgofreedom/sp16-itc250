<?php
/**
 * demo_book_categories.php along with demo_book_list.php and demo_book_view.php provides a sample web application
 *
 * This page is a second version of muffin_list.php which addes the 'Pager' class.
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
 * @see demo_book_view.php
 * @see demo_book_list.php 
 * @todo none
 */

require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials 

# SQL statement
$sql = "select CategoryID, Category, Description from Categories order by Category asc";

#Fills <title> tag. If left empty will default to $PageTitle in config_inc.php  
$config->titleTag = 'Muffins made with love & PHP in Seattle';

#Fills <meta> tags.  Currently we're adding to the existing meta tags in config_inc.php
$config->metaDescription = 'Seattle Central\'s ITC280 Class Muffins are made with pure PHP! ' . $config->metaDescription;
$config->metaKeywords = 'Muffins,PHP,Fun,Bran,Regular,Regular Expressions,'. $config->metaKeywords;

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
<h3 align="center"><?=THIS_PAGE;?></h3>

<p align="center">This page, along with <b>demo_book_list.php</b> and <b>demo_book_view.php</b> demonstrates a 
Category/List/View web application with record paging.</p>
<?php

# create connection to MySQL
$iConn = IDB::conn();

# Create instance of new 'pager' class
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql);  //load SQL, add offset
   
# $result stores data object in memory
$result = mysqli_query($iConn,$sql) or die(trigger_error(mysqli_error($iConn), E_USER_ERROR));

if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
   if($myPager->showTotal()==1){$itemz = "category";}else{$itemz = "categories";}  //deal with plural
   echo '<div align="center">We have  ' . $myPager->showTotal() . ' ' . $itemz . '!</div>';
   while ($row = mysqli_fetch_array($result))
   {//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
         echo '<div align="center">';
		 echo '<a href="' . VIRTUAL_PATH . '/demo/demo_book_list.php?cid=' . dbOut($row['CategoryID']) . '&cat=' . urlencode(dbOut($row['Category'])) . '">';
         echo dbOut($row['Category']) . '</a>';
         echo '<em> ' . dbOut($row['Description']) . '</em>';
         echo '</div>';
    }
	echo $myPager->showNav(); //will show paging nav, only if enough records	
}else{//no records
    echo "<div align=center>What! No categories?  There must be a mistake!!</div>";
}
@mysqli_free_result($result); # clears resources

get_footer(); #defaults to footer_inc.php
?>
