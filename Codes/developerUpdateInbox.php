<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
    <?php 
    include('developerUpdateInboxController.php');

    $update_dev = new developerUpdateInboxController();
    $update_dev->updateDeveloperInbox();
    ?> 
        
<?php
  include_once 'loginController.php';
?>

<div class="topnav">
    <a class="active" href="mainDeveloperHomepage.php">Home</a>
   <div class="search-container">
       <form action="viewbugreportDeveloper.php" method="post">
      <input type="text" name="search" class="submitbutton2">
      <button class="submitbutton" name="submitsearch" type="submit">search</button>
    </form>
    
  </div>

  <div class="logout">
      
      <a href="LogoutController.php" >Logout</a>
  </div>
  
     <div class="logout">
         <a class="active" href="advancedsearchDeveloper.php">Advanced Search</a>
         <a class="active" href="createbugreportDeveloper.php">Report bug</a>
      <strong>
      <?php 
        echo "<style='font-size: 100px; float:right;'>";
        echo $_SESSION['userID']['username'];
      ?>
      </strong>
  </div>  
</div>          
        
        <h1>Approve All Bug Reports</h1>
<div align="center">        
        <table border="1">
            <tr>
                <td>
              

       <form action="developerUpdateInbox.php" class="formtriagerassignedit" method="post">
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
  <option value="Fixed">Fixed</option>
</select><br />

<br />
<input class="button" type="submit" name="submit" value="Submit" />
</form>
        </td></tr>
        </table>           
</div>
    </body>
</html>
            
