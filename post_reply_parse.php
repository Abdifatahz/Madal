<?php
include_once("connect.php");
session_start(); // Start your sessions to allow your page to interact with session variables

// Check to see if the person accessing this page is logged in
if ($_SESSION['uid']) {
	if (isset($_POST['reply_submit'])) {
	// Make sure that the title and content fields have been filled in
	if ($_POST['reply_content'] == "") {
	
	echo "<p>Fadlan buuxi sanduuqa waydin celinta. <a href='index.php'>Halkan ku dhufo si aad ugu noqotid waydiinta.</a></p>";
		exit();
	} 
		// Connect to the database
		
		// Assign local variables
		$creator = $_SESSION['uid'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		// Insert query to enter the information into the posts table
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		// Execute the INSERT query
		$res = mysql_query($sql) or die(mysql_error());
		// Update query that will update the category that is associated with this topic reply
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		// Execute the category UPDATE query
		$res2 = mysql_query($sql2) or die(mysql_error());
		// Update query that will update the topic that is associated with this topic reply
		$sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		// Execute the topic UPDATE query
		$res3 = mysql_query($sql3) or die(mysql_error());
		
		// //START THE EMAIL PROCESSING SCRIPT
		// // Select query that will select the post_creators associated with the topic you are replying to
		// $sql4 = "SELECT post_creator FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' GROUP BY post_creator";
		// // Execute the SELECT query
		// $res4 = mysql_query($sql4) or die(mysql_error());
		
		// // This while loop will add each user id that was returned in the SELECT query above to an array
		// while ($row4 = mysql_fetch_assoc($res4)) {
		// 	$userids[] .= $row4['post_creator'];
		// }
		// // The foreach loop will run for each user id with the $userids array
		// foreach ($userids as $key) {
		// 	// Select query that selects the id and email from the users table depending on the array key value
		// 	$sql5 = "SELECT id, email FROM users WHERE id='".$key."' AND forum_notification='1' LIMIT 1";
		// 	// Execute the SELECT query
		// 	$res5 = mysql_query($sql5) or die(mysql_error());
		// 	// If the user has their forum_notification field set to 1 in the database
		// 	if (mysql_num_rows($res5) > 0) {
		// 		$row5 = mysql_fetch_assoc($res5);
		// 		// Check to see if the user id being passed through the foreach loop is not the person that is posting the reply
		// 		if ($row5['id'] != $creator) {
		// 			// Adding all the email addresses to an array
		// 			$email .= $row5['email'].", ";
		// 		}
		// 	}
		// }
		// // Taking the last 2 characters off the email array string so that the email can process
		// $email = substr($email, 0, (strlen($email) - 2));
		// // Fill in your information below. The "$to" address should be a dumby address with your domain at the end
		// $to = "noreply@somewhere.com";
		// $from = "YOUR_SITE_EMAIL_HERE";
		// // $bcc is the list of emails that will be sent out as blind carbon copies
		// $bcc = $email;
		// $subject = "YOUR_SUBJECT_HERE";
		
		// // This message can only contain text. NO HTML tags! The HTML tags will just be printed into the email.
		// $message = "YOU MESSAGE CONTENT HERE";
		
		// $headers = "From: $from\r\nReply-To: $from";
		// $headers .= "\r\nBcc: {$bcc}";
		// // Send out the email
		// mail($to, $subject, $message, $headers);
		// // END THE EMAIL PROCESSING SCRIPT
		
		// Check to make sure all the required queries have been executed
		if (($res) && ($res2) && ($res3)) {
			header("location:view_topic.php?cid=".$cid."&tid=".$tid." ");
			// echo "<p>Wadyiin celintaasii way socotay posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Halkan ku dhufo si aad ugu noqotid waydiinta.</a></p>";
		} else {
			echo "<p>cilad ayaa ku dhacday waydin celintaadi. fadlan ku celi mar kale.</p>";
		}
		
	} else {
		exit();
	}
} else {
	exit();
}
?>