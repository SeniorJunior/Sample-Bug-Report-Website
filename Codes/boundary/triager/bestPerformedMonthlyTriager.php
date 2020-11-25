<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
  include_once 'loginController.php';
?>
  <?php include('bestPerformedMonthlyController.php'); ?>
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
<?php $month = $_POST['month'] ?? 0 ?>

<h1>Best Performed</h1>
<div align="center">  
    <table border="1">
      <tr>
        <td>
            <form action="bestPerformedMonthlyTriager.php" class="formadvancedsearch" method="post">
            <label for="type">Month:</label>
          <select id="type" name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select><br />
          <label for="type">Best performed: </label>
            <select id="type" name="role">
              <option value="developer">Developer</option>
              <option value="bug reporter">Bug Reporter</option>
            </select><br/>
            <input class="button" type="submit" name="submitBest" value="Submit" />
            <br>
          </form> 
        </td>
      </tr>
    </table>
</div>  

<div align="center">
  <table border="1">
    <?php
      $bestDev = new bestPerformedMonthlyController();
      $bestDev->showBestPerformed();
    ?>
    <br><br>
     <?php echo "You're viewing report for month number: " . $month ?>
  </table>
</div>
</body>
</html>