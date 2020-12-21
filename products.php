 <!-- Header -->
 <?php
    include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    ?>
 <!-- body -->
 <br>
 <br>

 <div class="container">
     <!-- Jumbotron Header -->
     <div class="jumbotron home-spacer text-center" id="products-jumbotron">

         <h1>Welcome to Apple Store</h1>
     </div>
     <hr>
     <br>

     <div class="row">
         <div class="col-sm-3" style="margin-bottom:50px">
             <div class="card">
                 <div class="card-header color">
                     <h3 style="color:orange">Products</h3>
                 </div>
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item"><a href="#iphone"><span style="color:black">Iphone</span></a></li>
                     <li class="list-group-item"><a href="#macbook"><span style="color:black">Macbook</span></a></li>
                     <li class="list-group-item"><a href="#watch"><span style="color:black">Apple Watch</span></a></li>
                     <li class="list-group-item"><a href="#mac"><span style="color:black">Mac</span></a></li>
                 </ul>
             </div>
         </div>


         <div class="col-sm-9 text-center">

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="iphone" style="color:orange">Iphone</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">

                             <?php
                                $query = "SELECT `id`, `name`, `picture`, `price` FROM `items` WHERE category='iphone'";
                                $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
                                if (mysqli_num_rows($ipresult) >= 1) {
                                    while ($row = mysqli_fetch_array($ipresult)) { ?>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="<?php echo htmlspecialchars($row["picture"]); ?>" alt="macbook-air">
                                     <div class="card-body">
                                         <h2><?php echo htmlspecialchars($row["name"]); ?></h2>
                                         <p>Price: <?php echo htmlspecialchars($row["price"]); ?> </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="macbook" style="color:orange">Macbook</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $query = "SELECT `id`, `name`, `picture`, `price` FROM `items` WHERE category='macbook'";
                                $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
                                if (mysqli_num_rows($ipresult) >= 1) {
                                    while ($row = mysqli_fetch_array($ipresult)) { ?>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="<?php echo htmlspecialchars($row["picture"]); ?>" alt="macbook-air">
                                     <div class="card-body">
                                         <h3><?php echo htmlspecialchars($row["name"]); ?></h3>
                                         <p>Price: <?php echo htmlspecialchars($row["price"]); ?> </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="watch" style="color:orange">Apple Watch</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $query = "SELECT `id`, `name`, `picture`, `price` FROM `items` WHERE category='watch'";
                                $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
                                if (mysqli_num_rows($ipresult) >= 1) {
                                    while ($row = mysqli_fetch_array($ipresult)) { ?>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="<?php echo htmlspecialchars($row["picture"]); ?>" alt="macbook-air">
                                     <div class="card-body">
                                         <h2><?php echo htmlspecialchars($row["name"]); ?></h2>
                                         <p>Price: <?php echo htmlspecialchars($row["price"]); ?> </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100">
                     <div class="card-header color">
                         <h3 id="mac" style="color:orange">Mac</h3>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $query = "SELECT `id`, `name`, `picture`, `price` FROM `items` WHERE category='mac'";
                                $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
                                if (mysqli_num_rows($ipresult) >= 1) {
                                    while ($row = mysqli_fetch_array($ipresult)) { ?>
                             <div class="col mb-4 ">
                                 <div class="card">
                                     <img class="card-img-top" style="padding:10px"
                                         src="<?php echo htmlspecialchars($row["picture"]); ?>" alt="macbook-air">
                                     <div class="card-body">
                                         <h2><?php echo htmlspecialchars($row["name"]); ?></h2>
                                         <p>Price: <?php echo htmlspecialchars($row["price"]); ?> </p>

                                         <p><a href="#" data-toggle="modal" data-target="#loginmodal" role="button"
                                                 class="btn btn-primary btn-block btn-sm">Buy Now</a></p>
                                     </div>
                                 </div>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php
    include('./common/footer.php');
    ?>