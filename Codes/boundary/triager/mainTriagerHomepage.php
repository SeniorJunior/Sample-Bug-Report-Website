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
    <a class="active" href="mainTriagerHomepage.php">Home</a>
   <div class="search-container">
      <form action="viewbugreportTriager.php" method="post">
      <input type="text" name="search" class="submitbutton2">
      <button class="submitbutton" name="submitsearch" type="submit">search</button>
    </form>
    
  </div>

  <div class="logout">
      
      <a href="LogoutController.php" >Logout</a>
  </div>
  
     <div class="logout">
         <a class="active" href="advancedsearchTriager.php">Advanced Search</a>
         <a class="active" href="createbugreportTriager.php">Report bug</a>
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
                    <a href="advancedsearchTriager.php" style="text-decoration: none;">
                    <img src="images/advancedsearch.png" width="200" height="200">
                    &emsp; &emsp;

                    <a href="viewallbugreportTriager.php" style="text-decoration: none;">
                        <img src="images/view.png" width="200" height="200">
                   &emsp; &emsp;
                    
                   <a href="createbugreportTriager.php" style="text-decoration: none;">
                       <img src="images/newbug.png" width="200" height="200">
                     &emsp; &emsp;   
                   
                       <a href="triagerInbox.php" style="text-decoration: none;">
                    <img src="images/inbox.png" width="200" height="200">
                    
                    <a href="monthlyReportTriager.php" style="text-decoration: none;">
                         <img src="images/monthlyreport.png" width="200" height="200">
                    &emsp; &emsp;    
                        
                    <a href="bestPerformedMonthlyTriager.php" style="text-decoration: none;">
                        <img src="images/bestperforming.png" width="200" height="200">
                    &emsp; &emsp;    
                </td>
            </tr>
        </table>
        
        
    </body>
    
</html>

