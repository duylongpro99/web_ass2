 <!-- Header -->
 <?php
    include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    ?>
 <!-- body -->
 <?php

    //This code checks if the product is added to cart. 
    function check_if_added_to_cart($item_id)
    {
        $user_id = $_SESSION['user_id']; //We'll get the user_id from the session
        // require("./common/common.php"); // connecting to the database
        // We will select all the entries from the user_items table where the item_id is equal to the item_id we passed to this function, user_id is equal to the user_id in the session and status is 'Added to cart'
        require("./common/common.php"); // connecting to the database
        $query = "SELECT * FROM users_items WHERE item_id='$item_id' AND user_id ='$user_id' and status='Added to cart'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        // We'll check if the no.of rows in the result and no.of rows returned by the mysqli_num_rows($result) is true. If yes then it return 0 else it returns 0
        if (mysqli_num_rows($result) >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    ?>
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

                                         <?php if (!isset($_SESSION['email'])) { ?>
                                         <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                 Now</a></p>
                                         <?php
                                                    } else {
                                                        //We have created a function to check whether this particular product is added to cart or not.
                                                        if (check_if_added_to_cart($row["id"])) { //This is same as if(check_if_added_to_cart != 0)
                                                            echo '<a href="#" class="btn btn-block btn-secondary" disabled>Added to
                                             cart</a>';
                                                        } else {
                                                        ?>
                                         <a href="cart-add.php?id=<?php echo htmlspecialchars($row["id"]); ?>"
                                             name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                         <?php
                                                        }
                                                    }
                                                    ?>
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

                                         <?php if (!isset($_SESSION['email'])) { ?>
                                         <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                 Now</a></p>
                                         <?php
                                                    } else {
                                                        //We have created a function to check whether this particular product is added to cart or not.
                                                        if (check_if_added_to_cart($row["id"])) { //This is same as if(check_if_added_to_cart != 0)
                                                            echo '<a href="#" class="btn btn-block btn-success" disabled>Added to
                                             cart</a>';
                                                        } else {
                                                        ?>
                                         <a href="cart-add.php?id=<?php echo htmlspecialchars($row["id"]); ?>"
                                             name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                         <?php
                                                        }
                                                    }
                                                    ?>
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

                                         <?php if (!isset($_SESSION['email'])) { ?>
                                         <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                 Now</a></p>
                                         <?php
                                                    } else {
                                                        //We have created a function to check whether this particular product is added to cart or not.
                                                        if (check_if_added_to_cart($row["id"])) { //This is same as if(check_if_added_to_cart != 0)
                                                            echo '<a href="#" class="btn btn-block btn-success" disabled>Added to
                                             cart</a>';
                                                        } else {
                                                        ?>
                                         <a href="cart-add.php?id=<?php echo htmlspecialchars($row["id"]); ?>"
                                             name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                         <?php
                                                        }
                                                    }
                                                    ?>
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

                                         <?php if (!isset($_SESSION['email'])) { ?>
                                         <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                 Now</a></p>
                                         <?php
                                                    } else {
                                                        //We have created a function to check whether this particular product is added to cart or not.
                                                        if (check_if_added_to_cart($row["id"])) { //This is same as if(check_if_added_to_cart != 0)
                                                            echo '<a href="#" class="btn btn-block btn-success" disabled>Added to
                                             cart</a>';
                                                        } else {
                                                        ?>
                                         <a href="cart-add.php?id=<?php echo htmlspecialchars($row["id"]); ?>"
                                             name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                         <?php
                                                        }
                                                    }
                                                    ?>
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