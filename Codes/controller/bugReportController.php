<?php
//session_start();
include('functions.php');
include('bugReportClass.php');

$errors=array();


class bugReportController
{
	// Function newReport()
	public function newReport()
	{
		if (isset($_POST['submit']))
		{
			$new_report = new bugReport();
			$new_report->newReportEntity();
		}
	}
}


?>
