<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
    <?php include('LoginController.php')?>
    
    <?php include('triagerUpdateInboxController.php'); 
   
  $update_inbox = new triagerUpdateInboxController();
  $update_inbox->updateTriagerInbox();
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
        
        <h1>Approve All Bug Reports</h1>
<div align="center">        
        <table border="1">
            <tr>
                <td>
              

       <form action="triagerUpdateInbox.php" class="formtriagerassignedit" method="post">
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
  <option value="Assigned">Assigned</option>
</select><br />

<label for="type">Assign To:</label>
<select id="type" name="assign">
  <option value="11">madeleine11</option>
  <option value="12">amira12</option>
  <option value="13">jarrett13</option>
  <option value="14">sullivan14</option>
  <option value="15">rhett15</option>
  
</select><br /><br />

<br />
<input class="button" type="submit" name="submit" value="Submit" />
</form>
        </td></tr>
        </table>           
</div>
    </body>
</html>
            
