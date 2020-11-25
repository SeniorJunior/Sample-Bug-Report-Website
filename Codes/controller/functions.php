<?php
session_start();

// Connect to database
$db = mysqli_connect("link.to.rds.com", "dbusername", "dbpassword", "dbname");

// Escape string
function e($val)
{
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

// Return user array from their id
function getUserID($userID)
{
	global $db;
	$query = "SELECT * FROM user where userID=" . $userID;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

?>
