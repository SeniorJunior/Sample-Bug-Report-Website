<?php
//include('viewBugReportController.php');
include('bugReportCommentClass.php');

$errors=array();

class bugReportCommentController
{
	// Function newComment()
	public function newComment()
	{
		if (isset($_POST['submit']))
		{
			$new_comment = new bugReportComment();
			$new_comment->addComment();
		}	
	}
}

?>
