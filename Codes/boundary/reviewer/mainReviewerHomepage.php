<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
<?php
  include_once 'loginController.php';
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
        <b><h1>Welcome to Minions</h1></b><br>
        
        <table class="homepagetable">
            <tr>
                <td>
                    <a href="advancedsearchReviewer.php" style="text-decoration: none;">
                    <img src="images/advancedsearch.png" width="200" height="200">
                    &emsp; &emsp;

                    <a href="viewallbugreportReviewer.php" style="text-decoration: none;">
                        <img src="images/view.png" width="250" height="200">
                   &emsp; &emsp;
                    
                   <a href="createbugreportReviewer.php" style="text-decoration: none;">
                       <img src="images/newbug.png" width="200" height="200">
                     &emsp; &emsp;   
                   
                       <a href="reviewerInbox.php" style="text-decoration: none;">
                    <img src="images/inbox.png" width="200" height="200">
                    
                    <a href="monthlyReportReviewer.php" style="text-decoration: none;">
                         <img src="images/monthlyreport.png" width="200" height="200">
                    &emsp; &emsp;    
                        
                    <a href="bestPerformedMonthlyReviewer.php" style="text-decoration: none;">
                        <img src="images/bestperforming.png" width="200" height="200">
                    &emsp; &emsp;    
                </td>
            </tr>
        </table>
        
        
    </body>
    
</html>