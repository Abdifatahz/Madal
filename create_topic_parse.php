<?php
// Building A PHP MySQL Forum Tutorial Series
// Published by Tim Kipp @ www.timkipptutorials.com on February 14, 2011
// This script will parse the information from the create_topic.php page and add it to the database

session_start(); // Start your sessions to allow your page to interact with session variables

// Check to see if there is someone logged in
if ($_SESSION['uid'] == "") {
	header("Location: index.php");
	exit();
}
// Check to see if the topic_submit form button on the create_topic.php page has been clicked
if (isset($_POST['topic_submit'])) {
	// Make sure that the title and content fields have been filled in
	if (($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
		echo "Maadan buuxin labada qayboodba. Fadlan ku noqo bogii hore.";
		exit();
	} else {
		// Connect to the database
		include_once("connect.php");
		// Assign the POST variables to local variables
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION['uid'];
		// Insert query to enter the topic information into the database
		$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".$title."', '".$creator."', now(), now())";
		// Execute the INSERT query
		$res = mysql_query($sql) or die(mysql_error());
		// Gather the generated mysql_insert_id from the INSERT query
		$new_topic_id = mysql_insert_id();
		// Insert query to enter the post information into the database
		$sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";
		// Execute the INSERT query
		$res2 = mysql_query($sql2) or die(mysql_error());
		// Update the forum category associated with this new topic
		$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		// Execute the category UPDATE query
		$res3 = mysql_query($sql3) or die(mysql_error());
		// Check to make sure all the required queries have been executed
		if (($res) && ($res2) && ($res3)) {
			header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
		} else {
			echo "There was a problem creating your topic. Please try again.";
		}
	}
}
?>