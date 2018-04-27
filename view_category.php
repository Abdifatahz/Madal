
<?php include_once("classes/develop_php_library.php"); ?>
<?php
include_once("connect.php");

session_start(); // Start your sessions to allow your page to interact with session variables
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mawduucyada</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>


<div class="container">
	<div id="header">
		<div id="hr">
			
<?php
// Check to see if the person viewing this page is logged in or not
if (!isset($_SESSION['uid'])) {
	echo "<form action='login_parse.php' method='post'>
	<input type='text' name='username' placeholder='username'/>&nbsp;
	<input type='password' name='password' placeholder='password'/>&nbsp;
	<input type='submit' name='submit' value='Log In'  />
	";
} else {
	echo "welcome ".$_SESSION['username']." &nbsp| <a href='logout_parse.php'>Logout</a>";
}
?>

		</div>
</div>
		

<div id="sidebar2">

<?php 
echo "<div id='login'>";
$result=mysql_fetch_array(mysql_query('select count(*) as total from topics' ));
$result2=mysql_fetch_array(mysql_query('select count(*) as total from posts' ));
$result3=mysql_fetch_array(mysql_query('select count(*) as total from users' ));
$result = $result['total'];
$result2 = $result2['total'];
$result3 = $result3['total'];
echo "<h2> Our Site </h2>";
echo "<h4>"."$result Su-aalood"; 
echo "<br />";
echo "<h4>"."$result2  Jawabood"; 
echo "<br />";
echo "<h4>". "$result3  Isticmaale". "</h4>"; 

echo "</div>";
?>
<hr />
<div id='login'>
<h2>Qaybaha</h2>
<?php $sql = "SELECT  * FROM categories order by id Asc ";
$res = mysql_query($sql) or die(mysql_error());
// $result=mysql_fetch_array(mysql_query('select count(*) as total from topics WHERE category_id =2' ));
// $result = $result['total'];
// echo "<h4>"."$result ";
	$categories = "";
if (mysql_num_rows($res) > 0 ) {
	while ($row = mysql_fetch_assoc($res)) {
		$id = $row['id'];
		$title = $row['category_title'];
		$categories .= "<a href='view_category.php?cid=".$id."' 
		class='cat_links'> ".$title." <font size = '-1'>
		"."</font></a>";
	}
	echo $categories;
}
else{
	echo "<p> THere are no categories available yet.<p>";
}


// // Function that will convert a user id into their username
// function getusername($uid) {
// 	$sql = "SELECT username FROM users WHERE id='".$uid."' LIMIT 1";
// 	$res = mysql_query($sql) or die(mysql_error());
// 	$row = mysql_fetch_assoc($res);
// 	return $row['username'];
// }
?>
</div>
<hr>

<?php $sql = "SELECT  * FROM topics order by category_id DEsc LIMIT 5 ";
$res = mysql_query($sql) or die(mysql_error());
	$categories = "";
	echo "<div id='login'>";
	echo "<h2>Waydiimo </h2>";
if (mysql_num_rows($res) > 0 ) {
	while ($row = mysql_fetch_assoc($res)) {

		$cid = $row['category_id'];
		$tid = $row['id'];
		$title = $row['topic_title'];
		$categories .= "<a href='view_topic.php?cid=".$cid."&tid=".$tid."' class='cat_links'> ".$title." <font size = '-1'>
		"."</font></a>";
	}
	echo $categories;
}
else{
	echo "<p> THere are no categories available yet.<p>";
}
echo "</div>";
?>



</div>


<div id="wrapper">

<?php
date_default_timezone_set('Africa/Nairobi');
echo "<div id='dhig'>";
// Function that will count how many replies each topic has
function topic_replies($cid, $tid) {
	$sql = "SELECT count(*) AS topic_replies FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
	$res = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($res);
	return $row['topic_replies'] - 1;
}
// Function that will convert a user id into their username
function getusername($uid) {
	$sql = "SELECT username FROM users WHERE id='".$uid."' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($res);
	return $row['username'];
}
// Function that will convert the datetime string from the database into a user-friendly format
function convertdate($date) {
	$date = strtotime($date);
	return date("M j, Y g:ia", $date);
}

// Assign local variables
$cid = $_GET['cid'];

// Check to see if the person accessing this page is logged in
if (isset($_SESSION['uid'])) {
	$logged = " <p><a href='create_topic.php?cid=".$cid."'>Halkan Guji-Mawduuc samee</a></p>";
} else {
	$logged = " | Faldan Isdiiwan Gali si aad u samaysid Mawduuc.";
}
// Query that checks to see if the category specified in the $cid variable actually exists in the database
$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
// Execute the SELECT query
$res = mysql_query($sql) or die(mysql_error());
// Check if the category exists
if (mysql_num_rows($res) == 1) {
	// Select the topics that are associated with this category id and order by the topic_reply_date
	$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
	// Execute the SELECT query
	$res2 = mysql_query($sql2) or die(mysql_error());
		$topics ="";
	// Check to see if there are topics in the category
	if (mysql_num_rows($res2) > 0) {
		// Appending table data to the $topics variable for output on the page
		$topics .= "<table width='100%' style='border-collapse: collapse;'>";
		$topics .= "<tr><td colspan='4'><p><a href='index.php'>Kunoqo Bogga Hore </a><p>".$logged."<hr /></td></tr>";
		$topics .= "<tr style='background-color: #dddddd;'><td>Ciwaanka Mawduca</td><td width='65' align='center'>Jawaabe</td><td width='65' align='center'>Jawabaha</td><td width='65' align='center'>Fiirisay</td></tr>";
		$topics .= "<tr><td colspan='4'><hr /></td><tr>";
		// Fetching topic data from the database
		while ($row = mysql_fetch_assoc($res2)) {
			// Assign local variables from the database data
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$date = $row['topic_date'];
			$creator = $row['topic_creator'];
				$timeAgoObject = new convertToAgo;
		$convertedTime = ($timeAgoObject -> convert_datetime($date)); 
		$when = ($timeAgoObject -> makeAgo($convertedTime)); 
		
			// Check to see if the topic has every been replied to
			if ($row['topic_last_user'] == "") { $last_user = "CIDNA"; } else { $last_user = getusername($row['topic_last_user']); }
			// Append the actual topic data to the $topics variable
			$topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Soo Dhigay: ".getusername($creator)." Ilaa ".$when."</span></td><td align='center'>".$last_user."</td><td align='center'>".topic_replies($cid, $tid)."</td><td align='center'>".$views."</td></tr>";
			$topics .= "<tr><td colspan='4'><hr /></td></tr>";
		}
		$topics .= "</table>";
		// Displaying the $topics variable on the page
		echo $topics;
} else {
		// If there are no topics
		echo "<p><a href='index.php'>Kunoqo Bogga Hore</a></p><hr />";
		echo "<p>Qaybtan Wali Mawduuc Lagama Samayn.".$logged."</p>";
	}
} else {
	// If the category does not exist
	echo "<p><a href='index.php'>Kunoqo Bogga Hore</a><p><hr />";
	echo "<p>Waxaad Isku dayeysaa in aad eegtid Qayb aan jirin.";
}
echo "</div>";
?>
</div>










<div id="footer">
	 <p>Allrights served <?php echo date("Y"); ?>  Desingned by Abdifatah Abdilahi</p>
</div>
</div>
</body>
</html>


























