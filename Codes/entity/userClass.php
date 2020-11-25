<?php
class User
{
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $email;
	public $role;
	public $ratings;

	//Set functions
	function setUsername($username)
	{
		$this->username = $username;
	}

	function setPassword($password)
	{
		$this->password = $password;
	}

	function setFirstName($first_name)
	{
		$this->first_name = $first_name;
	}

	function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	function setEmail($email)
	{
		$this->email = $email;
	}

	function setRole($role)
	{
		$this->role = $role;
	}

	function setRatings($ratings)
	{
		$this->ratings = $ratings;
	}


	//Get functions
	function getUsername()
	{
		return $this->username;
	}

	function getPassword()
	{
		return $this->password;
	}

	function getFirstName()
	{
		return $this->first_name;
	}

	function getLastName()
	{
		return $this->last_name;
	}

	function getEmail()
	{
		return $this->email;
	}

	function getRole()
	{
		return $this->role;
	}

	function getRatings()
	{
		return $this->ratings;
	}

	function getCredentials($username,$password)
	{
		global $db;
		global $errors;

		//Attempt login if no errors on form
		if (count($errors) == 0) 
		{
	  		$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) 
			{ 	
				$logged_in_user = mysqli_fetch_assoc($results);

				// Return triager page if role == triager
				if($logged_in_user['role'] == 'triager')
				{
					// user found
					$_SESSION['userID'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: mainTriagerHomepage.php');
				}

				// Return developer page if role == developer
				if($logged_in_user['role'] == 'developer')
				{
					// user found
					$_SESSION['userID'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: mainDeveloperHomepage.php');
				}

				// Return reviewer page if role == reviewer
				if($logged_in_user['role'] == 'reviewer')
				{
					// user found
					$_SESSION['userID'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: mainReviewerHomepage.php');
				}

				// Return bug developer page if role == bug developer
				if($logged_in_user['role'] == 'bug reporter')
				{
					// user found
					$_SESSION['userID'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: mainBugReporterHomepage.php');
				}
			}
			else {
	  		array_push($errors, "Wrong username/password combination");
			}
		
		}
	}
}
	
?>
