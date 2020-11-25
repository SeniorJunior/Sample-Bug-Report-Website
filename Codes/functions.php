<?php
session_start();

// Connect to database
$db = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

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