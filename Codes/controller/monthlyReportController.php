<?php
include('bugReportClass.php');

class monthlyReportController
{
	public function monthlyReport()
	{
		if (isset($_POST['submit'])) 
		{
	        $monthly_report = new bugReport();
	        $monthly_report->monthlyReportEntity();
		}
	}

	// function to count total number of report in a month
	public function countReport()
	{
		if (isset($_POST['submit'])) 
		{
	        $count_report = new bugReport();
	        $count_report->countReportEntity();
		}
		else
		{
			echo "Total number of report in a month is: 0";
		}
	}
}


?>
