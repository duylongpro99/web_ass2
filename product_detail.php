 <!-- Header -->
 <?php
    require_once './controller/productController.php';
    //include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    $productController =  new ProductController();
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
     <?php if (isset($_GET['id']) && $productController->check_if_product_exist($_GET['id'])) { ?>
     <!--Section: Block Content-->
     <section class="mb-5">

         <div class="row">
             <div class="col-md-6 mb-4 mb-md-0">

                 <div id="mdb-lightbox-ui"></div>

                 <div class="mdb-lightbox">

                     <div class="row product-gallery mx-1">

                         <div class="col-12 mb-0">
                             <figure class="view overlay rounded z-depth-1 main-img">
                                 <a href="<?php echo htmlspecialchars($productController->get_product($_GET['id'])->picture); ?>"
                                     data-size="710x823">
                                     <img src="<?php echo htmlspecialchars($productController->get_product($_GET['id'])->picture); ?>"
                                         class="img-fluid z-depth-1">
                                 </a>
                             </figure>
                         </div>

                     </div>

                 </div>

             </div>
             <div class="col-md-6">

                 <h5><?php echo htmlspecialchars($productController->get_product($_GET['id'])->name); ?></h5>
                 <p><span
                         class="mr-1"><strong>$<?php echo htmlspecialchars($productController->get_product($_GET['id'])->price); ?></strong></span>
                 </p>
                 <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
                     error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
                     officia quis dolore quos sapiente tempore alias.</p>
                 <div class="table-responsive">
                     <table class="table table-sm table-borderless mb-0">
                         <tbody>
                             <tr>
                                 <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                                 <td><?php echo htmlspecialchars($productController->get_product($_GET['id'])->category); ?></td>
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
                        if ($productController->check_if_added_to_cart($_GET['id'], $_SESSION['user_id'])) { //This is same as if(check_if_added_to_cart != 0)
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
             <?php $results = $productController->get_comments($_GET['id']);
                    if (count($results) > 0) { ?>
             <h5><span> </span> Reviews for
                 <span><?php echo htmlspecialchars($productController->get_product($_GET['id'])->name); ?></span></h5>
             <?php foreach($results as $comment) { ?>
             <div class="media mt-3 mb-4">
                 <!-- <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg"
                     width="62" alt="Generic placeholder image"> -->
                 <div class="media-body">
                     <div class="d-sm-flex justify-content-between">
                         <p class="mt-1 mb-2">
                             <strong><?php echo htmlspecialchars($comment->email); ?></strong>
                             <span>– </span><span><?php echo htmlspecialchars($comment->time); ?></span>
                         </p>

                     </div>
                     <p class="mb-0"><?php echo htmlspecialchars($comment->comment); ?></p>
                 </div>
             </div><?php } ?>
             <hr>
             <?php } else { ?>
             <h5><span>0</span> Reviews for
                 <span><?php echo htmlspecialchars($productController->get_product($_GET['id'])->name); ?></span></h5>
             <?php } ?>
             <h5 class="mt-4">Add a review</h5>

             <div>
                 <!-- Your review -->
                 <div class="md-form md-outline">
                     <textarea id="comment-text" class="md-textarea form-control pr-6" rows="4"></textarea>
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
 <script src="./js/addComment.js">
 </script>
 </div>
 <?php
    include('./common/footer.php');
    ?>