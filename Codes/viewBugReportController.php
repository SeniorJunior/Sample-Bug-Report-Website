<?php
//include('functions.php');
//include('bugReportClass.php');
include('searchController.php');
//include('bugReportCommentClass.php');

/*if (isset($_POST['update']))
{
	viewTitle();
}*/

class viewBugReportController
{
	// Function to get the Title
	public function viewTitle()
	{
		$viewTitle = new bugReport();
		$viewTitle->viewTitleEntity();
	}

	// Function to get the assignee
	public function viewAssignee()
	{
		$viewAssignee = new bugReport();
		$viewAssignee->viewAssigneeEntity();
	}

	// Function to get the bug reporter
	public function viewBugReporter()
	{
		$viewBugReporter = new bugReport();
		$viewBugReporter->viewBugReporterEntity();	
	}

	// Function to get the categories 
	public function viewCategories()
	{
		$viewCategories = new bugReport();
		$viewCategories->viewCategoriesEntity();
	}

	// Function to get the bug details
	public function viewDetails()
	{
		$viewDetails = new bugReport();
		$viewDetails->viewDetailsEntity();
	}

	// Function to get the comment 
	public function viewComments()
	{
		$viewComments = new bugReport();
		$viewComments->viewCommentsEntity();
	}
}

?>