 <!-- Header -->
 <?php
  include('./common/intro.php');

  if (isset($_SESSION['email'])) {
    header('location: products.php');
  }

  include('./common/header.php');


  ?>
 <!-- body -->
 <div class="container" style="padding-top: 40px;">
     <div class="row">
         <div class="col-sm-5">
             <img src="./img/samsung-galaxy-s20-ultra6.jpg" alt="...">
         </div>

         <div class="col col-md-7 col-sm-7">
             <h2 style="color:orange; margin-left: 20px; margin-bottom: 20px;">SIGN UP</h2>
             <form action="signup_script.php" method="POST">

                 <div class="form-group col-sm-12">
                     <input class="form-control" placeholder="Name" name="name" pattern="[A-Za-z0-9]+" required>
                 </div>

                 <div class="form-group col-sm-12">
                     <input type="email" class="form-control" placeholder="Email"
                         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" required>
                 </div>

                 <div class="form-group col-sm-12">
                     <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password"
                         required>
                 </div>

                 <div class="form-group col-sm-12">
                     <input type="text" class="form-control" placeholder="Contact" maxlength="10" size="10"
                         name="contact" required>
                 </div>

                 <div class="form-group col-sm-12">
                     <input type="text" class="form-control" placeholder="City" name="city">
                 </div>

                 <div class="form-group col-sm-12">
                     <input type="text" class="form-control" placeholder="Address" name="address">
                 </div>

                 <div class="col-sm-12">
                     <button type="submit" name="submit" class="btn btn-primary"
                         style="margin-bottom: 20px;">Submit</button>
                 </div>
                 <div class="col-sm-12">
                     Already have an account ?<a href="login.php"> Login</a>
                 </div>

             </form>
         </div>
     </div>
     <br />
     <br />
 </div>
 <?php
  include('./common/footer.php');
  ?>