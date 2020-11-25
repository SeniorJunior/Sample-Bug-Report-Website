<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
    <?php include("viewBugReportController.php"); ?>
<?php include('loginController.php'); ?>
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
        
<h1>Documentation</h1>

<button class="droplist">Title</button>
<div class="panel">
  <?php 
  
  $title = new viewBugReportController();
  $title->viewTitle();

  ?>
  <p></p>
</div>

<button class="droplist">Categories</button>
<div class="panel">
  <?php 
  
  $categories = new viewBugReportController();
  $categories->viewCategories();
  
  ?>
  <p></p>
</div>

<button class="droplist">People</button>
<div class="panel">
  <?php 
  
  $assignee = new viewBugReportController();
  $assignee->viewAssignee();
  
  $bugReporter = new viewBugReportController();
  $bugReporter->viewBugReporter();
  
  ?>
  <p></p>
</div>

<button class="droplist">Details</button>
<div class="panel">
  <?php 
  
  $details = new viewBugReportController();
  $details->viewDetails();
  
  ?>
  <p></p>
</div>

<button class="droplist">Comments</button>
<div class="panel">
    <br><br>
     <?php 
     include('bugReportCommentController.php');
     
     $add_comment = new bugReportCommentController();
     $add_comment->newComment();
     ?>

     <?php 
  
      $comment = new viewBugReportController();
      $comment->viewComments();
  
     ?>
  <br><br>
     <form action="documentationReviewer.php" class="form" method="post">
      <?php $bugReportID = $_POST['bugReportID'];?>
  <textarea id="comments" name="comments" rows="6" cols="50" required>
  </textarea>
        <br><br>
  <input type='hidden' name='bugReportID' value="<?php echo $bugReportID?>"/>      
  <input type="submit" name="submit" value="Add comment"/>      
    </form>
    <br><br>
</div>



<script>
var acc = document.getElementsByClassName("droplist");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

 </body>
</html>
