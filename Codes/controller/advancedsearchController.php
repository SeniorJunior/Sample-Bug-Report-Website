<?php

include('bugReportClass.php');

class advancedSearchController
{
	public function advancedSearch()
	{
		$bugReport = new bugReport();
		$bugReport->advancedSearchEntity();
	}
}


?>
