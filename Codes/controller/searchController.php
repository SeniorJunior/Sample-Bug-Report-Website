<?php

//include('functions.php');
include('bugReportClass.php');

$errors=array();

class searchController
{
	// Function viewReport()
	public function viewSearchReport()
	{
		if (isset($_POST['submitsearch']))
		{
			$search = new bugReport();
			$search->viewSearchReportEntity();
		}
	}
}

?>
