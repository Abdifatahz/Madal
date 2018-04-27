
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
echo "<div id='dhig'>"; ?>

<form id ="form" action="create_topic_parse.php" method="post">
<p>Ciwaanka Mawduuca</p>

<input type="text" name="topic_title" size="70" maxlength="100" placeholder = "kuqor qoraal koban" />
<p>Faahfaahin</p>
<textarea name="topic_content" rows="7" cols="65" maxlength="1000"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="submit" name="topic_submit" value="Samee Mawduucan" />
</form>
<?php
echo "</div>";
?>
</div>










<div id="footer">
	 <p>Allrights served <?php echo date("Y"); ?>  Desingned by Abdifatah Abdilahi</p>
</div>
</div>
</body>
</html>


























