<?php
include('bugReportClass.php');

class bestPerformedMonthlyController
{
	// Function to see who's the best performed reporter/developer in a month 
	public function showBestPerformed()
	{
		$best_performed_dev = new bugReport();
		$best_performed_dev->showBestPerformedEntity();
	}

}

?>