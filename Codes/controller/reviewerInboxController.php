<?php 
//include('functions.php');
include('bugReportClass.php');

$errors=array();

// Call the viewDeveloperInbox() if submitsearch button is called


//include('functions.php');

class reviewerInboxController
{
    // Function viewDeveloperInbox()
    public function viewReviewerInbox()
    {
        // Call the viewDeveloperInbox() if submitsearch button is called
        if (!isset($_POST['submitsearch'])) 
        {
            $reviewer_inbox = new bugReport();
            $reviewer_inbox->viewReviewerInboxEntity();
        }
        
    }
}

// Function viewReviewerInbox()

?>
