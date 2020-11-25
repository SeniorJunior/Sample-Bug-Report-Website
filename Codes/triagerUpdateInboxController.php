<?php
include('bugReportClass.php');

// Function updateTriagerInbox to update the value of the assignee

class triagerUpdateInboxController
{
	// Function closeTriagerInbox to update the value of the assignee
	public function updateTriagerInbox()
	{
		if (isset($_POST['submit']))
		{
			$Update_report = new bugReport();
			$Update_report->updateReportEntity();
		}
	}
}


?>