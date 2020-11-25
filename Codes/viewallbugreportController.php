<?php
include('bugReportClass.php');

class viewAllBugReportController
{
	public function viewAllBugReport()
	{
		$view_all = new bugReport();
		$view_all->viewAllBugReportEntity();
	}
}

?>