<?php
class bugReportComment
{
	public $bugReportCommentID;
	public $bugReportID;
	public $bugReportComment;
	public $bugReportUserID;

	// Set functions
	function setBugReportCommentID($bugReportCommentID)
	{
		$this->bugReportCommentID = $bugReportCommentID;
	}

	function setBugReportID($bugReportID)
	{
		$this->bugReportID = $bugReportID;
	}

	function setBugReportComment($bugReportComment)
	{
		$this->bugReportComment = $bugReportComment;
	}

	function setBugReportUserID($bugReportUserID)
	{
		$this->bugReportUserID = $bugReportUserID;
	}

	///////
	//////
	//////

	// Get function
	function getBugReportCommentID()
	{
		return $this->bugReportCommentID;
	}

	function getBugReportID()
	{
		return $this->bugReportID;
	}

	function getBugReportComment()
	{
		return $this->bugReportComment;
	}

	function getBugReportUserID()
	{
		return $this->bugReportUserID;
	}

	function addComment()
	{
		global $db, $bugReportUserID, $errors, $bugReportCommentID, $bugReportID, $bugReportComment;

		$host = "some.link.to.rds";
			$dbusername = "dbusername";
			$dbpassword = "password";
			$dbname = "dbname";
		// Because MySQL Port is 3306
	        $port = "3306";
	        
			$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
			if (!$conn) 
			{
				echo "Not Connected To Server";
			}
			
			if (!mysqli_select_db($conn, "mydb")) 
			{
				echo "Database Not Selected";
			}

		$new_comment = new bugReportComment();
		$new_comment->setBugReportID($_POST['bugReportID']);
		$new_comment->setBugReportComment(e($_POST['comments']));
		$new_comment->setBugReportUserID($_SESSION['userID']['userID']);

		$bugReportComment = $new_comment->getBugReportComment();
		$bugReportUserID = $new_comment->getBugReportUserID();
		$bugReportID = $new_comment->getBugReportID();

		// Check connection
		if($con->connect_error)
		{
			die("Connection failed: " . $con->connect_error);
		}

		if (count($errors) == 0)
		{
			$sql = "INSERT INTO bugReportComment (bugReportID,bugReportComment,bugReportUserID) VALUES('$bugReportID','$bugReportComment', '$bugReportUserID')";
			mysqli_query($con,$sql);

		}
	}
}

?>
