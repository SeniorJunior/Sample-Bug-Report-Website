<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
      
<?php include('loginController.php'); ?>
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
          
     <?php include('triagerInboxController.php'); 
   
  $view_inbox = new triagerInboxController();
  $view_inbox->viewTriagerInbox();
  ?>    
        </table> 
</div>

<h1>Duplicated Bug Reports</h1>
<div align="center">
  <table border="1">
     <?php  
   
  $view_inbox = new triagerInboxController();
  $view_inbox->viewDuplicated();
  ?>   
  </table>
<div>

<h1>Close Bug Reports</h1>
<div align="center">
  <table border="1">
     <?php  
   
  $view_inbox = new triagerInboxController();
  $view_inbox->closeTriagerInbox();
  ?>   
  </table>
</div>

    </body>
</html>   
