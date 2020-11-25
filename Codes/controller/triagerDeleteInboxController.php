<?php
include('bugReportClass.php');

// Function updateTriagerInbox to update the value of the assignee

class triagerDeleteInboxController
{
	// Function deleteTriagerInobx to update the value of the assignee
	public function deleteTriagerInbox()
	{
		if (isset($_POST['submit']))
		{
			$Delete_report = new bugReport();
			$Delete_report->deleteReportEntity();
		}	
	}
}




?>
