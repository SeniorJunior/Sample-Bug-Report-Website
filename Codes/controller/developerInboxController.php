<?php 
//include('functions.php');
include('bugReportClass.php');

$errors=array();

class developerInboxController
{
	// Function viewDeveloperInbox()
	public function viewDeveloperInbox()
	{
		// Call the viewDeveloperInbox() if submitsearch button is called
		if (!isset($_POST['submitsearch'])) 
		{
			$view_dev_inbox = new bugReport();
			$view_dev_inbox->viewDeveloperInboxEntity();
		}
		
	}
}

?>
