<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
      <?php include('loginController.php');?>
        
    <?php include('reviewerUpdateInboxController.php'); 
    $update_inbox = new reviewerUpdateInboxController();
    $update_inbox -> updateReviewerInbox();
     ?>
        
        
<div class="topnav">
    <a class="active" href="mainReviewerHomepage.php">Home</a>
   <div class="search-container">
      <form action="viewbugreportReviewer.php" method="post">
      <input type="text" name="search" class="submitbutton2">
      <button class="submitbutton" name="submitsearch" type="submit">search</button>
    </form>
    
  </div>

  <div class="logout">
      
      <a href="LogoutController.php" >Logout</a>
  </div>
  
     <div class="logout">
         <a class="active" href="advancedsearchReviewer.php">Advanced Search</a>
         <a class="active" href="createbugreportReviewer.php">Report bug</a>
      <strong>
      <?php 
        echo "<style='font-size: 100px; float:right;'>";
        echo $_SESSION['userID']['username'];
      ?>
      </strong>
  </div>  
</div>                 
        
        <h1>Approve fixed Bug Report</h1>
<div align="center">        
        <table border="1">
            <tr>
                <td>
              

       <form action="reviewerUpdateInbox.php" class="formtriagerassignedit" method="post">
<?php
if (isset($_POST['update'])) {
	$bugReportID = $_POST['bugReportID'];
}
?>
<br />
Bug Report ID: <input type="text" name="bugReportID" readonly value="<?php echo $bugReportID?>" />
<br /><br/>


<label for="type">Status:</label>
<select id="type" name="bugReportTrackingStatus">
  <option value="Verified">Verified</option>
</select><br />

<br />
<input class="button" type="submit" name="submit" value="Submit" />
</form>
        </td></tr>
        </table>           
</div>
    </body>
</html>
            
