<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>

<?php
include ('bugReportController.php');

$new = new bugReportController();
$new->newReport();
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

      
    <form action="createbugreportDeveloper.php" class="form" method="post">
     <b><h1>Reporting a bug</h1></b>   
    <label for="bugtitle">Bug Title:</label>
    <input type="text" id="bugtitle" name="bugTitle" required ><br><br>
    
  Bug Type:
  <input type="radio" id="defect" name="bugType" value="defect">
  <label for="defect">Defect</label>
  <input type="radio" id="enhancement" name="bugType" value="enhancement">
  <label for="enhancement">Request for enhancement</label><br><br>
  <label for="bugtitle">Keywords:</label>
   <input type="text" id="keywords" name="keywords" required ><br><br>
   
  <label for="bugtitle">Bug Description:</label><br>
  <textarea id="description" name="description" rows="6" cols="50" required>
  
  </textarea>
  <br><br> 
  <input type="hidden" name="status" value="open">
  <input type="hidden" name="tracking" value="new">
<input type="submit" name="submit" value="submit"/>
<input type="reset" value="Clear"/><br /><br />
 </form>
        
    </body>
    
</html>
