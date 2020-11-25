<?php 
//include('functions.php');
include('bugReportClass.php');

$errors=array();

// Function viewTriagerInbox()
class triagerInboxController
{
	// Function closeTriagerInbox to update the value of the assignee
	public function viewTriagerInbox()
	{
		$view_report = new bugReport();
		$view_report->viewTriagerInboxEntity();
	}
        
        public function viewDuplicated()
	{
		$view_report = new bugReport();
		$view_report->viewDuplicatedEntity();
	}
        
        public function closeTriagerInbox()
	{
		$view_report = new bugReport();
		$view_report->closeTriagerInboxEntity();
	}
}


?>
