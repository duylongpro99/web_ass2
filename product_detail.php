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
        $query = "SELECT * FROM usersitems WHERE item_id='$item_id' AND user_id ='$user_id' and status='Added to cart'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        // We'll check if the no.of rows in the result and no.of rows returned by the mysqli_num_rows($result) is true. If yes then it return 0 else it returns 0
        if (mysqli_num_rows($result) >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    //This code checks if the product is added to cart. 
    function check_if_product_exist($item_id)
    {
        // require("./common/common.php"); // connecting to the database
        // We will select all the entries from the user_items table where the item_id is equal to the item_id we passed to this function, user_id is equal to the user_id in the session and status is 'Added to cart'
        require("./common/common.php"); // connecting to the database
        $query = "SELECT * FROM items WHERE id='$item_id' ";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

        // We'll check if the no.of rows in the result and no.of rows returned by the mysqli_num_rows($result) is true. If yes then it return 0 else it returns 0
        if (mysqli_num_rows($result) >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
    // $id = 0;
    // $name = '';
    // $picture = '';
    // $price = 0;
    function get_product($item_id)
    {
        require("./common/common.php");
        $query = "SELECT `id`, `name`, `picture`, `price`, `category` FROM `items` WHERE id='$item_id'";
        $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
        return mysqli_fetch_array($ipresult);
    }

    function get_comments($item_id)
    {
        require("./common/common.php");
        $query = "SELECT users.email, comments.comment, comments.time FROM comments JOIN users ON comments.user_id = users.id WHERE comments.item_id='$item_id'";
        $ipresult = mysqli_query($con, $query) or die($mysqli_error($con));
        return $ipresult;
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
     <?php if (isset($_GET['id']) && check_if_product_exist($_GET['id'])) { ?>
     <!--Section: Block Content-->
     <section class="mb-5">

         <div class="row">
             <div class="col-md-6 mb-4 mb-md-0">

                 <div id="mdb-lightbox-ui"></div>

                 <div class="mdb-lightbox">

                     <div class="row product-gallery mx-1">

                         <div class="col-12 mb-0">
                             <figure class="view overlay rounded z-depth-1 main-img">
                                 <a href="<?php echo htmlspecialchars(get_product($_GET['id'])['picture']); ?>"
                                     data-size="710x823">
                                     <img src="<?php echo htmlspecialchars(get_product($_GET['id'])['picture']); ?>"
                                         class="img-fluid z-depth-1">
                                 </a>
                             </figure>
                         </div>

                     </div>

                 </div>

             </div>
             <div class="col-md-6">

                 <h5><?php echo htmlspecialchars(get_product($_GET['id'])['name']); ?></h5>
                 <p><span
                         class="mr-1"><strong>$<?php echo htmlspecialchars(get_product($_GET['id'])['price']); ?></strong></span>
                 </p>
                 <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
                     error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
                     officia quis dolore quos sapiente tempore alias.</p>
                 <div class="table-responsive">
                     <table class="table table-sm table-borderless mb-0">
                         <tbody>
                             <tr>
                                 <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                                 <td><?php echo htmlspecialchars(get_product($_GET['id'])['category']); ?></td>
                             </tr>
                             <tr>
                                 <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                                 <td>USA, Europe</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <hr>

                 <?php
                        //We have created a function to check whether this particular product is added to cart or not.
                        if (check_if_added_to_cart($_GET['id'])) { //This is same as if(check_if_added_to_cart != 0)
                            echo '<a href="#" class="btn btn-block btn-secondary" disabled>Added to
                                             cart</a>';
                        } else {
                        ?>
                 <a href="cart-add.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" name="add" value="add"
                     class="btn btn-block btn-primary">Add to cart</a>
                 <?php
                        }
                        ?>
             </div>
         </div>

     </section>
     <!--Section: Block Content-->
     <!-- Classic tabs -->
     <div class="classic-tabs border rounded px-4 pt-1">


         <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
             <?php $results = get_comments($_GET['id']);
                    if (mysqli_num_rows($results) >= 1) { ?>
             <h5><span> </span> Reviews for
                 <span><?php echo htmlspecialchars(get_product($_GET['id'])['name']); ?></span></h5>
             <?php while ($row = mysqli_fetch_array($results)) { ?>
             <div class="media mt-3 mb-4">
                 <!-- <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg"
                     width="62" alt="Generic placeholder image"> -->
                 <div class="media-body">
                     <div class="d-sm-flex justify-content-between">
                         <p class="mt-1 mb-2">
                             <strong><?php echo htmlspecialchars($row['email']); ?></strong>
                             <span>– </span><span><?php echo htmlspecialchars($row['time']); ?></span>
                         </p>

                     </div>
                     <p class="mb-0"><?php echo htmlspecialchars($row['comment']); ?></p>
                 </div>
             </div><?php } ?>
             <hr>
             <?php } else { ?>
             <h5><span>0</span> Reviews for
                 <span><?php echo htmlspecialchars(get_product($_GET['id'])['name']); ?></span></h5>
             <?php } ?>
             <h5 class="mt-4">Add a review</h5>

             <div>
                 <!-- Your review -->
                 <div class="md-form md-outline">
                     <textarea id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
                 </div>
                 <br />
                 <div class="text-right pb-2">
                     <button type="button" onclick="myFunc(<?php echo htmlspecialchars($_GET['id']); ?>,)"
                         class="btn btn-primary">Add a review</button>
                 </div>
             </div>
         </div>
     </div>

 </div>
 <!-- Classic tabs -->
 <?php } else {
            echo "<div class=\"jumbotron home-spacer text-center\" id=\"products-jumbotron\">

         <h1>Item does not exist!</h1>
     </div>";
        }
    ?>
 <script>
myFunc(x) {
    $.ajax({
        type: "POST",
        url: 'comment-add.php',
        data: {
            id: x,
            comment: 'abc 111111'
        },
        success: function(html) {
            //For wait 5 seconds
            setTimeout(function() {
                location.reload(); //Refresh page
            }, 500);
        }

    });
};
 </script>
 </div>
 <?php
    include('./common/footer.php');
    ?>