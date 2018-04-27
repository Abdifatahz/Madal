<?php include_once("classes/develop_php_library.php"); ?>
<?php

include_once("connect.php");
session_start(); // Start your sessions to allow your page to interact with session variables
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eeg Mawduuca</title>
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
</div>

<div id="wrapper">

<?php
// Connect to the database
date_default_timezone_set('Africa/Nairobi');

echo "<div id='dhig'>";
echo "<p> <a href='index.php'>
kunoqo Bogga Hore Guji Halkan</a></p>";
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
	return date("M j, Y ", $date);
}
function ago($date){
       $date = "";
			$timeAgoObject = new convertToAgo;
		$convertedTime = ($timeAgoObject -> convert_datetime($date)); 
		$when = ($timeAgoObject -> makeAgo($convertedTime)); 
		return $when;
}
// Assign local variables from the variables in the URL
$cid = $_GET['cid'];
$tid = $_GET['tid'];
// Select the topic data depending on the $cid and $tid variables
$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
// Execute the SELECT query
$res = mysql_query($sql) or die(mysql_error());
// Check to see if the topic exists
if (mysql_num_rows($res) == 1) {
	echo "<table width='100%'>";
	// Check to see if the person accessing this page is logged in
	if ($_SESSION['uid']) { echo "<tr><td colspan='2'><input type='hidden' value='' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" /><hr />"; } else { echo "<tr><td colspan='2'><p>Please log in to add your reply.</p><hr /></td></tr>"; }
	// Fetch all the topic data from the database
	while ($row = mysql_fetch_assoc($res)) {
		// Query the posts table for all posts in the specified topic
		$sql2 = "SELECT * FROM  posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";

		// Execute the SELECT query
		
		$res2 = mysql_query($sql2) or die(mysql_error());

		// Fetch all the post data from the database
		while ($row2 = mysql_fetch_assoc($res2)) {

				$date = $row2['post_date'];
			$timeAgoObject = new convertToAgo;
		$convertedTime = ($timeAgoObject -> convert_datetime($date)); 
		$when = ($timeAgoObject -> makeAgo($convertedTime)); 
	
			// Echo out the topic post data from the database
			echo "<tr><td valign='top' style='border: 2px solid #ddd;'><h6>
			<div style='min-height: 125px;'>".$row['topic_title']."<br />
			Soo qoray ".getusername($row2['post_creator'])." ilaa ".$when."</h6><hr />
			".$row2['post_content']."</div></td><td width='100' valign='top' align='center' 
			style='border: 2px solid #ddd;'><img src='images/user_default.jpg' width='100' height='100'>
			".getusername($row2['post_creator'])."<br />kuso-biray.<br />"
			.convertdate($row2['post_date'])."<br />Tafatiray<br />" . 
			

			($row2['post_creator'])."



			</td></tr><tr><td colspan='2'><hr /></td></tr>";
		
		}
		// Assign local variable for the current number of views that this topic has
		$old_views = $row['topic_views'];
		// Add 1 to the current value of the topic views
		$new_views = $old_views + 1;
		// Update query that will update the topic_views for this topic
		$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
		// Execute the UPDATE query
		$res3 = mysql_query($sql3) or die(mysql_error());
	}
} else {
	// If the topic does not exist
	echo "<p>This topic does not exist.</p>";
}
?>

</div>
<hr />
<div id="form">
<form action="post_reply_parse.php" method="post">
<p>Reply Content</p>


<textarea name="reply_content" rows="5" cols="60"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="hidden" name="tid" value="<?php echo $tid; ?>" />

<input type="submit" name="reply_submit" value="Post Your Reply" />
</form>
</div>
</div>

</body>
</html>