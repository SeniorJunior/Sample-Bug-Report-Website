<?php 

logout();

function logout()
{
	session_start();
	session_destroy();
	header("Location: firstHomepage.php");
}

?>
