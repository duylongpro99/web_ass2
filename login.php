 <!-- Header -->
 <?php
  include('./common/intro.php');
  include('./common/header.php');
  ?>
 <!-- body -->
 <div class="container" style="padding-top: 40px;">
     <div class="row">
         <div class="col-sm-7">
             <img src="./img/samsung-galaxy-s20-ultra6.jpg" alt="...">
         </div>

         <div class="col-sm-5">

             <h2 style="color:orange; margin-left: 20px; margin-bottom: 20px;">LOG IN</h2>

             <form action="login_submit.php" method="POST">
                 <div class="form-group col-sm-10">
                     <input type="e-mail" class="form-control" name="e-mail" placeholder="Enter your Resistered E-Mail"
                         required>
                 </div>
                 <div class="form-group col-sm-10" style="padding-bottom: 5px;">
                     <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                 </div>
                 <div class="checkbox col-sm-10">
                     <label><input type="checkbox" value="" checked>Remember me</label>
                 </div>
                 <div class="col-sm-10">
                     <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px;">Log
                         In</button>
                 </div>
                 <p class="col-sm-10">Not a member? <a href="./signup.html">Sign Up</a></p>
                 <p class="pull-left col-sm-10"><a href="#">Forgot Password?</a></p>
             </form>
         </div>
     </div>
 </div>
 <?php
  include('./common/footer.php');
  ?>