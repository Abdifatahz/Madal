<?php
// Building A PHP MySQL Forum Tutorial Series
// Published by Tim Kipp @ www.timkipptutorials.com on February 14, 2011
// This script will allow you to post a reply to the topic you are viewing

session_start(); // Start your sessions to allow your page to interact with session variables

// Check to see if they person accessing this page is logged in and that there is a category id in the url
if ((!isset($_SESSION['uid'])) || ($_GET['cid'] == "")) {
	header("Location: index.php");
	exit();
}
// Assign local variables found in the url
$cid = $_GET['cid'];
$tid = $_GET['tid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum Series - Post Forum Reply</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!-- IMPLEMENTING THE TINYMCE WYSIWYG EDITOR -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas"
});
</script>
<!-- END TINYMCE SCRIPT -->
</head>

<body>

<div id="wrapper">
<h2>TimKippTutorials | Forum Tutorial Series</h2>
<p>Complete Source Code.</p>

<?php
echo "<p>You are logged is as ".$_SESSION['username']." &bull; <a href='logout_parse.php'>Logout</a>";
?>

<hr />
<div id="content">
<form action="post_reply_parse.php" method="post">
<p>Reply Content</p>
<textarea name="reply_content" rows="5" cols="75"></textarea>
<br /><br />
<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
<input type="submit" name="reply_submit" value="Post Your Reply" />
</form>
</div>
</div>

</body>
</html>