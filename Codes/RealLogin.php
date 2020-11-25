<html>

<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php
	include_once 'loginController.php';

	$user = new loginController();
	$user->login();
?>

    <h1><center>Minion Bug Tracking System</center></h1>
    <form action="RealLogin.php" method="post">
	        
	<table border="0" class="loginform">
	<tr>
	<td>
	<h3>Sign In</h3>
	</td>
	</tr>
	<tr>
	<td>
	Username:<input type="text" name="username" required/>
	</td>
	</tr>

	<tr>
	    
	<td>
	Password:<input type="password" name="password" required/>
	</td>

	</tr>
	<tr>
	    
	<td>
	    
	<br/>
	<input class="button" type="submit" name="login" value="Login" onclick="return(submitLogin());">

	</td>
	</tr>
	</table>
	</form>
</body>

<script src="vendor/jquery/jquery.min.js"></script>

</html>



