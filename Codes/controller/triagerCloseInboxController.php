<?php
include('bugReportClass.php');
class triagerCloseInboxController
{
	// Function closeTriagerInbox to update the value of the assignee
	public function closeTriagerInbox()
	{
		$close_report = new bugReport();
		$close_report->closeReportEntity();
	}
}





/*//include('functions.php');
//include('bugReportClass.php');
include('triagerInboxController.php');
$errors=array();

// Call the updateTriagerInbox() if submit button is called
if (!isset($_POST['submit'])) 
{
	updateTriagerInbox();
}

// Function updateTriagerInbox()
function updateTriagerInbox()
{
	global $search, $bugReportTrackingStatus, $bugReportID, $assign, $errors;

	$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

	if (!$con) 
	{
		echo "Not Connected To Server";
	}
	
	if (!mysqli_select_db($con, "mydb")) 
	{
		echo "Database Not Selected";
	}

	$search = $_POST['submit'];
    $bugReportTrackingStatus = $_POST['bugReportTrackingStatus'];
	$bugReportID = $_POST['bugReportID'];
    $assign = $_POST['assign'];

    if ($bugReportTrackingStatus == "NEW") 
    {
		$sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus', bugReportAssigneeID='$assign' WHERE bugReportID ='$bugReportID'";

		$results = mysqli_query($con, $sql);
		
		$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
		
		$results2 = mysqli_query($con, $sql1);
		
		if (!mysqli_query($con, $sql)) 
		{
			echo "<br />";
			echo "<h3>Records Not Updated</h3>";
		} 
		else 
		{
			header("Location: triagerInbox.php");
		}
	
	}
	else
	{
    	$sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus', bugReportAssigneeID='$assign' WHERE bugReportID ='$bugReportID'";
		
		$results = mysqli_query($con, $sql);
		
		$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
		
		$results2 = mysqli_query($con, $sql1);
		
		if (!mysqli_query($con, $sql)) 
		{
			echo "<br />";
			echo "<h3>Status Not Updated</h3>";
		} 
		else 
		{
			header("Location: triagerInbox.php");
		}
    } 
}*/
?>
