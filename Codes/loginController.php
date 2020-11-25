<?php 
include('functions.php');
include('userClass.php');
$errors = array();

class loginController
{
	public function login()
	{
		if (isset($_POST['login']))
		{
			$current_user = new user();
			$current_user->setUsername(e($_POST['username']));
			$current_user->setPassword(e($_POST['password']));

			$username = $current_user->getUsername();
			$password = $current_user->getPassword();

			$credential = new User();
			$credential->getCredentials($username,$password);

		}
	}
	
}
?>