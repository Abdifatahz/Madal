<?php
// Building A PHP MySQL Forum Tutorial Series
// Published by Tim Kipp @ www.timkipptutorials.com on February 14, 2011
// This script will log the user out of your site using session_destory()

session_start(); // Start your sessions to allow your page to interact with session variables
session_destroy(); // This will destroy (remove) any session variables that have been set
header("Location: index.php");
?>