<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
  include_once 'loginController.php';
?>
<div class="topnav">
    <a class="active" href="mainBugReporterHomepage.php">Home</a>
   <div class="search-container">
       <form action="viewbugreportBugReporter.php" method="post">
      <input type="text" name="search" class="submitbutton2">
      <button class="submitbutton" name="submitsearch" type="submit">search</button>
    </form>
    
  </div>

  <div class="logout">
      
      <a href="LogoutController.php" >Logout</a>
  </div>
  
     <div class="logout">
         <a class="active" href="advancedsearchBugReporter.php">Advanced Search</a>
         <a class="active" href="createbugreportBugReporter.php">Report bug</a>
      <strong>
      <?php 
        echo "<style='font-size: 100px; float:right;'>";
        echo $_SESSION['userID']['username'];
      ?>
      </strong>
  </div>  
</div>
        
       <h1>Advanced search</h1>
       <div align="center">  
       <table border="1">
           <tr>
               <td>
           
       
       <form action="doadvancedsearchBugReporter.php" class="formadvancedsearch" method="post">
           Title:<input type="text" class="fieldas" name="title"><br><br>
           Keywords:<input type="text" class="fieldas" name="keywords"><br><br>
           Assignee:<input type="text" class="fieldas" name="assignee"><br><br>
           <input class="submitbuttonas" type="submit" name="submit" value="search"/>
           
       </td>
       </tr>
       
     
    </form> 
                   </div>               

</html>

