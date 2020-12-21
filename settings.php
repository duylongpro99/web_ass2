 <!-- Header -->
 <?php
    include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    ?>
 <!-- body -->
 <div class="container-fluid">
     <br><br>
     <div class="row">
         <div class="col-sm-4"></div>
         <div class="col-sm-4" id="settings-container">
             <h4>Change Password</h4><br>
             <form action="settings_script.php" method="POST">
                 <div class="form-group">
                     <input type="password" class="form-control" name="old_password" pattern=".{6,}"
                         placeholder="Old Password" required>
                 </div>
                 <div class="form-group">
                     <input type="password" class="form-control" name="new_password" pattern=".{6,}"
                         placeholder="New Password" required>
                 </div>
                 <div class="form-group">
                     <input type="password" class="form-control" name="repnew_password" pattern=".{6,}"
                         placeholder="Re-type New Password" required>
                 </div>
                 <div><b class="red">
                         <?php
                            if (isset($_GET["error"])) {
                                echo $_GET['error'];
                            }
                            ?>
                     </b></div>
                 <button type="submit" class="btn btn-primary">Change</button>

             </form>
         </div>
         <div class="col-sm-4"></div>
     </div>
 </div>
 <?php
    include('./common/footer.php');
    ?>