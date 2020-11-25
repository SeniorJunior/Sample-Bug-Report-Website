<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
    <?php include_once 'loginController.php'; ?>
    <div class="topnav">
    <a class="active" href="RealLogin.php">Home</a>
   <div class="search-container">
      <form action="RealLogin.php" method="post">
      <input type="text" name="search" class="submitbutton2">
      <button class="submitbutton" name="submitsearch" type="submit">search</button>
    </form>
    
  </div>

  <div class="logout">
      
      <a href="RealLogin.php" >Login here</a>
  </div>
  
     <div class="logout">
         <a class="active" href="RealLogin.php">Advanced Search</a>
         <a class="active" href="RealLogin.php">Report bug</a>
     
  </div>  
</div>        
        
      
       <b><h1>Welcome to Minions</h1></b><br>
        
        <table class="homepagetable1">
            <tr>
                <td>
                    <a href="RealLogin.php" style="text-decoration: none;">
                    <img src="images/advancedsearch.png" width="200" height="200">
                    &emsp; &emsp;

                    <a href="RealLogin.php" style="text-decoration: none;">
                        <img src="images/view.png" width="250" height="200">
                   &emsp; &emsp;
                    
                   <a href="RealLogin.php" style="text-decoration: none;">
                       <img src="images/newbug.png" width="200" height="200">
                     &emsp; &emsp;   
                   
                      
                </td>
            </tr>
        </table>
        
        
    </body>
    
</html>

