<?php
class bugReport
{
	public $bugReportID;
	public $bugReportStatus;
	public $bugReportTrackingStatus;
	public $bugReportDesc;
	public $bugReportTitle;
	public $bugReportKeywords;
	public $bugReportType;
	public $bugReportAssigneeID;
	public $bugReportCommentID;
	public $bugReportUserID;
	public $bugReportCreationDate;

	// Set functions
	function setBugReportID($bugReportID)
	{
		$this->bugReportID = $bugReportID;
	}

	function setBugReportStatus($bugReportStatus)
	{
		$this->bugReportStatus = $bugReportStatus;
	}

	function setBugReportTrackingStatus($bugReportTrackingStatus)
	{
		$this->bugReportTrackingStatus = $bugReportTrackingStatus;
	}

	function setBugReportDesc($bugReportDesc)
	{
		$this->bugReportDesc = $bugReportDesc;
	}

	function setBugReportTitle($bugReportTitle)
	{
		$this->bugReportTitle = $bugReportTitle;
	}

	function setBugReportKeywords($bugReportKeywords)
	{
		$this->bugReportKeywords = $bugReportKeywords;
	}

	function setBugReportType($bugReportType)
	{
		$this->bugReportType = $bugReportType;
	}

	function setBugReportAssigneeID($bugReportAssigneeID)
	{
		$this->bugReportAssigneeID = $bugReportAssigneeID;
	}

	function setBugReportUserID($bugReportUserID)
	{
		$this->bugReportUserID = $bugReportUserID;
	}

	///////
	//////
	//////

	// Get function
	function getBugReportID()
	{
		return $this->bugReportID;
	}

	function getBugReportStatus()
	{
		return $this->bugReportStatus;
	}

	function getBugReportTrackingStatus()
	{
		return $this->bugReportTrackingStatus;
	}

	function getBugReportDesc()
	{
		return $this->bugReportDesc;
	}

	function getBugReportTitle()
	{
		return $this->bugReportTitle;
	}

	function getBugReportKeywords()
	{
		return $this->bugReportKeywords;
	}

	function getBugReportType()
	{
		return $this->bugReportType;
	}

	function getBugReportAssigneeID()
	{
		return $this->bugReportAssigneeID;
	}
	
	function getBugReportUserID()
	{
		return $this->bugReportUserID;
	}

	public function closeReportEntity()
	{
		if (isset($_POST['submit'])) 
		{
	        $host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
			$dbusername = "sqldb";
			$dbpassword = "csit314project";
			$dbname = "mydb";
	        $port = "3306";
	        
			$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
			if (!$conn) 
			{
				echo "Not Connected To Server";
			}
			
			if (!mysqli_select_db($conn, "mydb")) 
			{
				echo "Database Not Selected";
			}
		        
		    //$search = $_POST['submit'];
		    $closeBugReport = new bugReport();
		    $closeBugReport->setBugReportID($_POST['bugReportID']);
		    $closeBugReport->setBugReportStatus($_POST['bugReportStatus']);

		    $bugReportID = $closeBugReport->getBugReportID();
		    $bugReportStatus = $closeBugReport->getBugReportStatus();

		   	//$bugReportStatus = $_POST['bugReportStatus'];
			//$bugReportID = $_POST['bugReportID'];
		   	$assign = $_POST['assign'];
		        
			
			if ($bugReportTrackingStatus == "Verified") 
			{
				$sql = "UPDATE bugReport SET bugReportStatus ='$bugReportStatus' WHERE bugReportID ='$bugReportID'";
				$results = mysqli_query($conn, $sql);
				
				$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
				$results2 = mysqli_query($conn, $sql1);
				
				if (!mysqli_query($conn, $sql)) 
				{
					echo "<br />";
					echo "<h3>Records Not Updated</h3>";
				} 
				else 
				{
					//echo "Bug Report Close successfully";
					header("Location: triagerInbox.php");
				}
			
			}
			else
			{
		    	$sql = "UPDATE bugReport SET bugReportStatus ='$bugReportStatus' WHERE bugReportID ='$bugReportID'";
				$results = mysqli_query($conn, $sql);
				
				$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
				$results2 = mysqli_query($conn, $sql1);
				
				if (!mysqli_query($conn, $sql)) 
				{
					echo "<br />";
					echo "<h3>Status Not Updated</h3>";
				} 
				else 
				{
					//echo "Bug Report Close successfully";
					header("Location: triagerInbox.php");
				}
			} 
		}
	}

	// Function for advanced search
	public function advancedSearchEntity()
	{
		if (isset($_POST['submit'])) 
		{
		    $host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
			$dbusername = "sqldb";
			$dbpassword = "csit314project";
			$dbname = "mydb";
		    $port = "3306";
		    
		   
	        //$title = $_POST['title'];
	        $assignee = $_POST['assignee'];
	        //$keywords = $_POST['keywords'];
	        
	        

			$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
			
			$advanced_search = new bugReport();
		    $advanced_search->setBugReportTitle($_POST['title']);
		    $advanced_search->setBugReportKeywords($_POST['keywords']);

		    $title = $advanced_search->getBugReportTitle();
		    $keywords = $advanced_search->getBugReportKeywords();
		    
			if (!$conn) 
			{
				echo "Not Connected To Server";
			}
			
			if (!mysqli_select_db($conn, "mydb")) 
			{
				echo "Database Not Selected";
			}

		    $sql = "SELECT bugReportID, bugReportTitle,bugReportKeywords,username, bugReportStatus, bugReportTrackingStatus, bugReportUserID FROM bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID WHERE bugReportTitle LIKE '%".$title."%' AND username LIKE '%".$assignee."%' AND bugReportKeywords LIKE '%".$keywords."%'  ORDER BY bugReportStatus DESC,bugReportID ASC";
		        
			$results = mysqli_query($conn, $sql);
			
			
		    if ($results -> num_rows > 0) 
		    {
				echo "<tr>";
				echo "<th>Bug Report ID</th>";
				echo "<th>Bug Title</th>";
				echo "<th>Assigned to</th>";
				echo "<th>Status</th>";
				echo "<th>Tracking Status</th>";
		        echo "<th>Keywords</th>";
		        echo "<th>Bug reporter</th>";
		    	echo "</tr>";
				
				while ($row = mysqli_fetch_assoc($results)) 
				{
					// If session is triager
					if($_SESSION['userID']['role'] == 'triager')
					{
						echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
			            echo "<td>" . $row["username"] . "</td>";
			            echo "<td>" . $row["bugReportStatus"] . "</td>" ;
			            echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
			            echo "<td>" . $row["bugReportKeywords"] . "</td>" ;
			            echo "<td><form action='documentationTriager.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
						echo "</tr>";
					}

					// If session is developer
					if($_SESSION['userID']['role'] == 'developer')
					{
						echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
			            echo "<td>" . $row["username"] . "</td>";
			            echo "<td>" . $row["bugReportStatus"] . "</td>" ;
			            echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
			            echo "<td>" . $row["bugReportKeywords"] . "</td>" ;
			            echo "<td><form action='documentationDeveloper.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
						echo "</tr>";
					}

					// If session is reviewer
					if($_SESSION['userID']['role'] == 'reviewer')
					{
						echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
			            echo "<td>" . $row["username"] . "</td>";
			            echo "<td>" . $row["bugReportStatus"] . "</td>" ;
			            echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
			            echo "<td>" . $row["bugReportKeywords"] . "</td>" ;
			            echo "<td><form action='documentationReviewer.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
						echo "</tr>";
					}

					// If session is bug reporter
					if($_SESSION['userID']['role'] == 'bug reporter')
					{
						echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
			            echo "<td>" . $row["username"] . "</td>";
			            echo "<td>" . $row["bugReportStatus"] . "</td>" ;
			            echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
			            echo "<td>" . $row["bugReportKeywords"] . "</td>" ;
			            echo "<td><form action='documentationBugReporter.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
						echo "</tr>";
					}                             
				}
			} 
			else 
			{
				echo "No Results";
			}
	    }
	}

	public function showBestPerformedEntity()
	{
		if (isset($_POST['submitBest'])) 
		{
	        $host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
			$dbusername = "sqldb";
			$dbpassword = "csit314project";
			$dbname = "mydb";
	        $port = "3306";
	        
			$con = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
			if (!$con) 
			{
				echo "Not Connected To Server";
			}
			
			if (!mysqli_select_db($con, "mydb")) 
			{
				echo "Database Not Selected";
			}
		    
		    $best_performed = new User();
		    $best_performed->setRole($_POST['role']);

		    $role = $best_performed->getRole();

		   	$month = $_POST['month'];
		    
		    $sql = "SELECT username,count(bugReportID),bugReportUserID from bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID where month(bugReportCreationDate) = '$month' and role = '$role'";

		    $results = mysqli_query($con,$sql);
		    

		    if ($results -> num_rows > 0)
		    {
		    	echo "<tr>";
				echo "<th>Username</th>";
	                       
				
				echo "</tr>";
				
				while ($row = mysqli_fetch_assoc($results)) 
				{
					// If session is triager
					if($_SESSION['userID']['role'] == 'triager')
					{
						echo "<tr>";
		            	echo "<td>" . $row["username"] . "</td>";
		            
						echo "</tr>";   
					}

					// If session is developer
					if($_SESSION['userID']['role'] == 'developer')
					{
						echo "<tr>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	
						echo "</tr>"; 
					}

					// If session is reviewer
					if($_SESSION['userID']['role'] == 'reviewer')
					{
						echo "<tr>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	
						echo "</tr>"; 
					}

					// If session is bug reporter
					if($_SESSION['userID']['role'] == 'bug reporter')
					{
						echo "<tr>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	
						echo "</tr>"; 
					}
				}
		    }
		    else
		    {
		    	echo "No results";
		    }
		}
	}

	// Creation of new report
	public function newReportEntity()
	{
		global $db, $bugReportUserID, $bugReportTitle, $bugReportType, $bugReportkeywords, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		$new_report = new bugReport();
		$new_report->setBugReportTitle(e($_POST['bugTitle']));
		$new_report->setBugReportUserID($_SESSION['userID']['userID']);
		$new_report->setBugReportType(e($_POST['bugType']));
	    $new_report->setBugReportkeywords(e($_POST['keywords']));
		$new_report->setBugReportDesc(e($_POST['description']));
		$new_report->setBugReportStatus(e($_POST['status']));
		$new_report->setBugReportTrackingStatus(e($_POST['tracking']));
		//$new_report->setBugReportID($_GET['bugReportID']);

		$bugReportTitle = $new_report->getBugReportTitle();
		$bugReportType = $new_report->getBugReportType();
	    $bugReportkeywords = $new_report->getBugReportkeywords();
		$bugReportDesc = $new_report->getBugReportDesc();
		//$bugReportID = $new_report->getBugReportID();
		$bugReportUserID = $new_report->getBugReportUserID();
		$bugReportStatus = $new_report->getBugReportStatus();
		$bugReportTrackingStatus = $new_report->getBugReportTrackingStatus();

		// Check connection
		if($con->connect_error)
		{
			die("Connection failed: " . $con->connect_error);
		}

		if (count($errors) == 0)
		{
			$sql = "INSERT INTO bugReport (bugReportStatus,bugReportTrackingStatus,bugReportTitle,bugReportType,bugReportkeywords,bugReportDesc,bugReportUserID,bugReportCreationDate) VALUES('$bugReportStatus', '$bugReportTrackingStatus', '$bugReportTitle', '$bugReportType','$bugReportkeywords', '$bugReportDesc', '$bugReportUserID', NOW())";
			mysqli_query($con,$sql);

			// If role is triager
		    if($_SESSION['userID']['role'] == 'triager')
		    {
		      header('location: mainTriagerHomepage.php');
		    } 

		    // If role is developer 
		    if($_SESSION['userID']['role'] == 'developer')
		    {
		      header('location: mainDeveloperHomepage.php');
		    }

		    // If role is reviewer
		    if($_SESSION['userID']['role'] == 'reviewer')
		    {
		      header('location: mainReviewerHomepage.php');
		    }

		    // If role is bug reporter
		    if($_SESSION['userID']['role'] == 'bug reporter')
		    {
		      header('location: mainBugReporterHomepage.php');
		    }

			else
			{
				echo "Error";
			}
		}
	}
	// View title
	public function viewTitleEntity()
	{
		$view_title = new bugReport();
		$view_title->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_title->getBugReportID();
		//$bugReportID = $_POST['bugReportID'];
		
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportTitle,bugReportID FROM bugReport WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo '<td>Title: ' . $row['bugReportTitle'] . '</td>';
				echo "<br><br>";
				echo '<td>Bug Report ID: ' . $row['bugReportID'] . '</td>';
			echo "</tr>";
		}
	}

	// View Assignee
	public function viewAssigneeEntity()
	{
		$view_assignee = new bugReport();
		$view_assignee->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_assignee->getBugReportID();
		
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportAssigneeID,bugReportID,username FROM bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo '<td>Assignee ID: ' . $row['bugReportAssigneeID'] . '</td>';
				echo "<br>";
				echo '<td>Assignee username: ' . $row['username'] . '</td>';
				echo "<br><br>";
			echo "</tr>";
		}
	}

	public function viewBugReporterEntity()
	{
		$view_bugReporter = new bugReport();
		$view_bugReporter->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_bugReporter->getBugReportID();
		
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportUserID,bugReportID,username FROM bugReport INNER JOIN user ON bugReport.bugReportUserID = user.userID WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo '<td>Bug Reporter ID: ' . $row['bugReportUserID'] . '</td>';
				echo "<br>";
				echo '<td>Bug Reporter username: ' . $row['username'] . '</td>';
				echo "<br><br>";
			echo "</tr>";
		}
	}

	public function viewCategoriesEntity()
	{
		$view_categories = new bugReport();
		$view_categories->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_categories->getBugReportID();
		
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportType,bugReportID,bugReportStatus,bugReportTrackingStatus FROM bugReport WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo '<td>Type: ' . $row['bugReportType'] . '</td>';
				echo '<br>';
				echo '<td>Tracking Status: ' . $row['bugReportTrackingStatus'] . '</td>';
				echo '<br>';
				echo '<td>Status: ' . $row['bugReportStatus'] . '</td>';
			echo "</tr>";
		}
	}

	public function viewDetailsEntity()
	{
		$view_details = new bugReport();
		$view_details->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_details->getBugReportID();
		
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportDesc,bugReportID FROM bugReport WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo '<td>Details: ' . $row['bugReportDesc'] . '</td>';
			echo "</tr>";
		}
	}	

	public function viewCommentsEntity()
	{
		$view_comments = new bugReport();
		$view_comments->setBugReportID($_POST['bugReportID']);

		$bugReportID = $view_comments->getBugReportID();
	        
		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportCommentID,bugReportComment,bugReportUserID,bugReportID FROM bugReportComment WHERE bugReportID = '$bugReportID'";
		$results = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($results))
		{
			echo "<tr>";
				echo "<br><br>";
				echo "<td>Comment ID: " . $row['bugReportCommentID'] . "</td>";
				echo "<br>";
				echo "<td>User ID: " . $row['bugReportUserID'] . "</td>";
				echo "<br>";
				echo '<td>Comments: ' . $row['bugReportComment'] . '</td>';
			echo "</tr>";
		}
	}

	public function viewDeveloperInboxEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
			
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$developerInbox = new bugReport();
		$developerInbox->setBugReportAssigneeID($_SESSION['userID']['userID']);
		//$developerInbox->setBugReportTrackingStatus($_POST['keywords']);

		$assigned = $developerInbox->getBugReportAssigneeID();
		//$tracking_status = $developerInbox->getBugReportTrackingStatus();
		//$assigned = $_SESSION['userID']['userID'];
		$sql = "SELECT bugReportID, bugReportTitle,bugReportStatus,bugReportTrackingStatus,bugReportAssigneeID FROM bugReport WHERE bugReportTrackingStatus='Assigned' and bugReportAssigneeID = $assigned";
		        
		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Status</th>";
			echo "<th>Tracking Status</th>";
			echo "<th>Assignee ID</th>";
			echo "<th>View</th>";
		    echo "<th>Edit</th>";
			echo "</tr>";
				
			while ($row = mysqli_fetch_assoc($results)) 
			{
				echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
		            echo "<td>" . $row["bugReportStatus"] . "</td>";
		            echo "<td>" . $row["bugReportTrackingStatus"] . "</td>" ; 
		            echo "<td>" . $row['bugReportAssigneeID'] . "</td>";
		            echo "<td><form action='documentationDeveloper.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
		            echo "<td><form action='developerUpdateInbox.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Update'/></form></td>";
				echo "</tr>";
			}
		}

		else 
		{
			echo "No Results";
		}
	}

	public function updateDeveloperInboxEntity()
	{
		$host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
		$dbusername = "sqldb";
		$dbpassword = "csit314project";
		$dbname = "mydb";
        $port = "3306";
        
		$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
	
		if (!$conn) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($conn, "mydb")) 
		{
			echo "Database Not Selected";
		}
	    
	    $developerUpdateInbox = new bugReport();
		$developerUpdateInbox->setBugReportID($_POST['bugReportID']);
		$developerUpdateInbox->setBugReportTrackingStatus($_POST['bugReportTrackingStatus']);

		$bugReportTrackingStatus = $developerUpdateInbox->getBugReportTrackingStatus();
		$bugReportID = $developerUpdateInbox->getBugReportID();
	    
	    //$search = $_POST['submit'];
	   	//$bugReportTrackingStatus = $_POST['bugReportTrackingStatus'];
		//$bugReportID = $_POST['bugReportID'];
	        
		
		if ($bugReportTrackingStatus == "Assigned") 
		{
			$sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus' WHERE bugReportID ='$bugReportID'";
			$results = mysqli_query($conn, $sql);
			
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
			
			if (!mysqli_query($conn, $sql)) 
			{
				echo "<br />";
				echo "<h3>Records Not Updated</h3>";
			} 
			else 
			{
				header("Location: developerInbox.php");
			}
		
		}
		else
		{
	    	$sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus' WHERE bugReportID ='$bugReportID'";
			$results = mysqli_query($conn, $sql);
			
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
			
			if (!mysqli_query($conn, $sql)) 
			{
				echo "<br />";
				echo "<h3>Status Not Updated</h3>";
			} 
			else 
			{
				header("Location: developerInbox.php");
			}
		} 
	}

	public function monthlyReportEntity()
	{
		$host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
		$dbusername = "sqldb";
		$dbpassword = "csit314project";
		$dbname = "mydb";
	    $port = "3306";
	        
		$con = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
		if (!$con) 
		{
			echo "Not Connected To Server";
		}
			
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$search = $_POST['submit'];
		$month = $_POST['month'];
		    
		$sql = "SELECT bugReportID, bugReportTitle, username,bugReportStatus, bugReportTrackingStatus,bugReportUserID, bugReportCreationDate from bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID where month(bugReportCreationDate) = '$month'";

		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0)
		{
		   	echo "<tr>";
				echo "<th>Bug Report ID</th>";
				echo "<th>Bug Title</th>";
				echo "<th>Assigned to</th>";
				echo "<th>Status</th>";
				echo "<th>Tracking Status</th>";
				echo "<th>Bug reporter</th>";
				echo "<th>Date created</th>";
				echo "<th>View</th>";
			echo "</tr>";
				
			while ($row = mysqli_fetch_assoc($results)) 
			{
				// If session is triager
				if($_SESSION['userID']['role'] == 'triager')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
		            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
		            	echo "<td>" . $row["bugReportUserID"] . "</td>";
		            	echo "<td>" . $row["bugReportCreationDate"] . "</td>";
		            	echo "<td><form action='documentationTriager.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";   
				}

				// If session is developer
				if($_SESSION['userID']['role'] == 'developer')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
		            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
		            	echo "<td>" . $row["bugReportUserID"] . "</td>";
		            	echo "<td>" . $row["bugReportCreationDate"] . "</td>";
		            	echo "<td><form action='documentationDeveloper.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}

				// If session is reviewer
				if($_SESSION['userID']['role'] == 'reviewer')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
		            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
		            	echo "<td>" . $row["bugReportUserID"] . "</td>";
		            	echo "<td>" . $row["bugReportCreationDate"] . "</td>";
		            	echo "<td><form action='documentationReviewer.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}
				
				// If session is bug reporter
				if($_SESSION['userID']['role'] == 'bug reporter')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
		            	echo "<td>" . $row["username"] . "</td>";
		            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
		            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>";
		            	echo "<td>" . $row["bugReportUserID"] . "</td>";
		            	echo "<td>" . $row["bugReportCreationDate"] . "</td>";
		            	echo "<td><form action='documentationBugReporter.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}
			}
		}
		else
		{
		    echo "No results";
		}
	}

	public function countReportEntity()
	{
		$host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
		$dbusername = "sqldb";
		$dbpassword = "csit314project";
		$dbname = "mydb";
        $port = "3306";
        
		$con = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
	
		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}
	        
	    $search = $_POST['submit'];
	   	$month = $_POST['month'];

	   	$sql = "SELECT * from bugReport where month(bugReportCreationDate) = '$month' and bugReportTrackingStatus NOT IN ('new')";

	    $results = mysqli_query($con,$sql);
	    $num_rows = mysqli_num_rows($results);

	    echo "Total number of bug report in a month is: " . $num_rows;
	}

	public function viewSearchReportEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$search = $_POST['search'];

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportID, bugReportTitle,username, bugReportStatus,bugReportUserID FROM bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID WHERE bugReportID LIKE '%".$search."%' OR  bugReportTitle LIKE '%".$search."%' OR  username LIKE '%".$search."%' OR  bugReportStatus LIKE '%".$search."%' OR bugReportUserID LIKE '%".$search."%' ORDER BY bugReportStatus DESC,bugReportID ASC";

		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Assigned to</th>";
			echo "<th>Status</th>";
			echo "<th>Bug reporter</th>";
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($results)) 
			{
				// If session is triager
				if($_SESSION['userID']['role'] == 'triager')
				{
					echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["username"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
	            	echo "<td>" . $row["bugReportUserID"] . "</td>";
	            	echo "<td><form action='documentationTriager.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";   
				}

				// If session is developer
				if($_SESSION['userID']['role'] == 'developer')
				{
					echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["username"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
	            	echo "<td>" . $row["bugReportUserID"] . "</td>";
	            	echo "<td><form action='documentationDeveloper.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}

				// If session is reviewer
				if($_SESSION['userID']['role'] == 'reviewer')
				{
					echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["username"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
	            	echo "<td>" . $row["bugReportUserID"] . "</td>";
	            	echo "<td><form action='documentationReviewer.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}

				// If session is bug reporter
				if($_SESSION['userID']['role'] == 'bug reporter')
				{
					echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["username"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>" ;
	            	echo "<td>" . $row["bugReportUserID"] . "</td>";
	            	echo "<td><form action='documentationBugReporter.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
					echo "</tr>";
				}
			}
		} 
		else
		{
			echo "No Results";
		}
	}

	public function viewAllBugReportEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

	    $sql = "SELECT bugReportID, bugReportTitle,username, bugReportStatus,bugReportUserID FROM bugReport INNER JOIN user ON bugReport.bugReportAssigneeID = user.userID ORDER BY bugReportStatus DESC,bugReportID ASC";
	        
		$results = mysqli_query($con, $sql);
		
		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
				echo "<th>Bug Report ID</th>";
				echo "<th>Bug Title</th>";
				echo "<th>Assigned to</th>";
				echo "<th>Status</th>";
				echo "<th>Bug reporter</th>";
			echo "</tr>";
				
			while ($row = mysqli_fetch_assoc($results)) 
			{
				// If session is bug reporter
				if($_SESSION['userID']['role'] == 'bug reporter')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
				        echo "<td>" . $row["username"] . "</td>";
				        echo "<td>" . $row["bugReportStatus"] . "</td>" ; 
				        echo "<td>" . $row["bugReportUserID"] . "</td>";
				        echo "<td><form action='documentationBugReporter.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";      
					echo "</tr>";
				}

				// If session is developer
				if($_SESSION['userID']['role'] == 'developer')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
				        echo "<td>" . $row["username"] . "</td>";
				        echo "<td>" . $row["bugReportStatus"] . "</td>" ; 
				        echo "<td>" . $row["bugReportUserID"] . "</td>";
				        echo "<td><form action='documentationDeveloper.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";      
					echo "</tr>";
				}

				// If session is reviewer
				if($_SESSION['userID']['role'] == 'reviewer')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
				        echo "<td>" . $row["username"] . "</td>";
				        echo "<td>" . $row["bugReportStatus"] . "</td>" ; 
				        echo "<td>" . $row["bugReportUserID"] . "</td>";
				        echo "<td><form action='documentationReviewer.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";      
					echo "</tr>";
				}

				// If session is triager
				if($_SESSION['userID']['role'] == 'triager')
				{
					echo "<tr>";
						echo "<td>" . $row["bugReportID"] . "</td>";
						echo "<td>" . $row["bugReportTitle"] . "</td>";
				        echo "<td>" . $row["username"] . "</td>";
				        echo "<td>" . $row["bugReportStatus"] . "</td>" ; 
				        echo "<td>" . $row["bugReportUserID"] . "</td>";
				        echo "<td><form action='documentationTriager.php' method='post'> <input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";      
					echo "</tr>";
				}

			}
		} 
		else 
		{
			echo "No Results";
	    }
	}

	public function deleteReportEntity()
	{
        $host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
	    $dbusername = "sqldb";
	    $dbpassword = "csit314project";
	    $dbname = "mydb";
	    $port = "3306";
	        
	    $conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
	    
	    if (!$conn) 
	    {
	        echo "Not Connected To Server";
	    }
	        
	    if (!mysqli_select_db($conn, "mydb")) 
	    {
	        echo "Database Not Selected";
	    }
	            
	    $search = $_POST['submit'];
	    $bugReportTrackingStatus = $_POST['bugReportTrackingStatus'];
	    $bugReportID = $_POST['bugReportID'];
	    $assign = $_POST['assign'];

	    $sql = "DELETE FROM bugReport WHERE bugReportID = '$bugReportID'";
	        
	    $results = mysqli_query($conn,$sql);

	    if (!mysqli_query($conn, $sql)) 
	    {
	        echo "<br />";
	        echo "<h3>Records Not Updated</h3>";
	    } 
	    else 
	    {
	        header("Location: triagerInbox.php");
	    }
    }

    public function updateReportEntity()
    {
        $host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
		$dbusername = "sqldb";
		$dbpassword = "csit314project";
		$dbname = "mydb";
	    $port = "3306";
	        
		$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
		if (!$conn) 
		{
			echo "Not Connected To Server";
		}
			
		if (!mysqli_select_db($conn, "mydb")) 
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
			$results = mysqli_query($conn, $sql);
				
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
				
			if (!mysqli_query($conn, $sql)) 
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
			$results = mysqli_query($conn, $sql);
				
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
				
			if (!mysqli_query($conn, $sql)) 
			{
				echo "<br />";
				echo "<h3>Status Not Updated</h3>";
			} 
			else 
			{
				header("Location: triagerInbox.php");
			}
		} 
	}

	public function updateReviewerInboxEntity()
	{
		$host = "mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com";
		$dbusername = "sqldb";
		$dbpassword = "csit314project";
		$dbname = "mydb";
	    $port = "3306";
	        
		$conn = mysqli_connect ($host, $dbusername, $dbpassword, $dbname, $port);
		
		if (!$conn) 
		{
			echo "Not Connected To Server";
		}
			
		if (!mysqli_select_db($conn, "mydb")) 
		{
			echo "Database Not Selected";
		}
		        
		$search = $_POST['submit'];
		$bugReportTrackingStatus = $_POST['bugReportTrackingStatus'];
		$bugReportID = $_POST['bugReportID'];
		        
		if ($bugReportTrackingStatus == "Fixed") 
		{
			$sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus' WHERE bugReportID ='$bugReportID'";
			$results = mysqli_query($conn, $sql);
				
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
				
			if (!mysqli_query($conn, $sql)) 
			{
				echo "<br />";
				echo "<h3>Records Not Updated</h3>";
			} 
			else 
			{
				header("Location: reviewerInbox.php");
			}
			
		}
		else
		{
		    $sql = "UPDATE bugReport SET bugReportTrackingStatus ='$bugReportTrackingStatus' WHERE bugReportID ='$bugReportID'";
			$results = mysqli_query($conn, $sql);
				
			$sql1 = "UPDATE bugReport SET bugReportID WHERE bugReportID = '$bugReportID'";
			$results2 = mysqli_query($conn, $sql1);
				
			if (!mysqli_query($conn, $sql)) 
			{
				echo "<br />";
				echo "<h3>Status Not Updated</h3>";
			} 
			else 
			{
				header("Location: reviewerInbox.php");
			}
		} 
	}

	public function viewTriagerInboxEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportID, bugReportTitle,bugReportStatus,bugReportTrackingStatus FROM bugReport WHERE bugReportTrackingStatus='New' AND bugReportAssigneeID='0'";
	        
		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Status</th>";
			echo "<th>Tracking Status</th>";
			echo "<th>View</th>";
	       	echo "<th>Edit</th>";
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($results)) 
			{
				echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>";
	            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>" ;
	            	echo "<td><form action='documentationTriager.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
	            	echo "<td><form action='triagerupdateInbox.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Update'/></form></td>";
				echo "</tr>";
			}
		}

		else 
		{
			echo "No Results";
	    }
	}

	// Function viewDuplicated()
	public function viewDuplicatedEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportID, bugReportTitle,bugReportStatus,bugReportTrackingStatus,bugReportKeywords,count(bugReportTitle) FROM bugReport GROUP BY bugReportTitle HAVING COUNT(bugReportTitle) > 1";
	        
		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Keywords</th>";
			echo "<th>Status</th>";
			echo "<th>Tracking Status</th>";
			echo "<th>View</th>";
	       	echo "<th>Edit</th>";
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($results)) 
			{
				echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
					echo "<td>" . $row['bugReportKeywords'] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>";
	            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>" ;
	            	echo "<td><form action='documentationTriager.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
	            	echo "<td><form action='triagerDeleteInbox.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Update'/></form></td>";
				echo "</tr>";
			}
		}

		else 
		{
			echo "No Results";
	    }
	}

	// Function closeTriagerInbox()
	function closeTriagerInboxEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$sql = "SELECT bugReportID, bugReportTitle,bugReportStatus,bugReportKeywords,bugReportTrackingStatus FROM bugReport WHERE bugReportTrackingStatus='Verified' and bugReportStatus='open'";
	        
		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Keywords</th>";
			echo "<th>Status</th>";
			echo "<th>Tracking Status</th>";
	       	echo "<th>Edit</th>";
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($results)) 
			{
				echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
					echo "<td>" . $row['bugReportKeywords'] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>";
	            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>" ; 
	            	echo "<td><form action='triagerCloseInbox.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Update'/></form></td>";
				echo "</tr>";
			}
		}

		else 
		{
			echo "No Results";
	    }
	}

	function viewReviewerInboxEntity()
	{
		global $db, $bugReportTitle, $bugReportType, $bugReportDesc, $bugReportStatus, $errors;

		$con = mysqli_connect("mydb.c2k9br7f0jdv.ap-southeast-1.rds.amazonaws.com", "sqldb", "csit314project", "mydb");

		if (!$con) 
		{
			echo "Not Connected To Server";
		}
		
		if (!mysqli_select_db($con, "mydb")) 
		{
			echo "Database Not Selected";
		}

		$assigned = $_SESSION['userID']['userID'];
		$sql = "SELECT bugReportID, bugReportTitle,bugReportStatus,bugReportTrackingStatus,bugReportAssigneeID FROM bugReport WHERE bugReportTrackingStatus='Fixed'";
	        
		$results = mysqli_query($con,$sql);

		if ($results -> num_rows > 0) 
		{
			echo "<tr>";
			echo "<th>Bug Report ID</th>";
			echo "<th>Bug Title</th>";
			echo "<th>Status</th>";
			echo "<th>Tracking Status</th>";
			echo "<th>Assignee ID</th>";
			echo "<th>View</th>";
	       	echo "<th>Edit</th>";
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($results)) 
			{
				echo "<tr>";
					echo "<td>" . $row["bugReportID"] . "</td>";
					echo "<td>" . $row["bugReportTitle"] . "</td>";
	            	echo "<td>" . $row["bugReportStatus"] . "</td>";
	            	echo "<td>" . $row["bugReportTrackingStatus"] . "</td>" ; 
	            	echo "<td>" . $row['bugReportAssigneeID'] . "</td>";
	            	echo "<td><form action='documentationReviewer.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Select'/></form></td>";
	            	echo "<td><form action='reviewerUpdateInbox.php' method='post'><input type='hidden' name='bugReportID' value='" . $row["bugReportID"] . "'/><input type='submit' name='update' value='Update'/></form></td>";
				echo "</tr>";
			}
		}

		else 
		{
			echo "No Results";
	    }
	}	
}

?>