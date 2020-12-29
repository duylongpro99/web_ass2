 <!-- Header -->
 <?php
    include('./common/common.php');
    include('./common/intro.php');
    include('./common/header.php');
    require_once './controller/productController.php';
    $productController =  new ProductController();
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
                         <?php if(isset($_SESSION['canAddItem'])) {?>
                            <button  type="button" data-toggle="modal" data-target="#addItem" class="btn btn-success add-item">Add</button>
                        <?php } ?>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">

                             <?php
                                $ipresults = $productController->getProductByCategory('iphone');
                                if (count($ipresults) > 0) {
                                    foreach($ipresults as $ipresult) { ?>
                                     <div class="col mb-4 ">
                                     <a href="./product_detail.php?id=<?php echo htmlspecialchars($ipresult->id); ?>">
                                         <div class="card item">
                                            <?php if(isset($_SESSION['canRemoveItem'])) {
                                             echo "<button onclick='removeItem($ipresult->id)' class='btn btn-secondary remove-item'>X</button>";
                                              } ?>
                                             <img class="card-img-top" style="padding:10px" src="<?php echo htmlspecialchars($ipresult->picture); ?>" alt="macbook-air">
                                             <div class="card-body">
                                                 <h2><?php echo htmlspecialchars($ipresult->name); ?></h2>
                                                 <p>Price: <?php echo htmlspecialchars($ipresult->price); ?>$ </p>

                                                 <?php if (!isset($_SESSION['email'])) { ?>
                                                     <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                             Now</a></p>
                                                        <?php
                                                            } else {
                                                                //We have created a function to check whether this particular product is added to cart or not.
                                                                if ($productController->check_if_added_to_cart($ipresult->id, $_SESSION['user_id'])) { //This is same as if(check_if_added_to_cart != 0)
                                                                    echo "<a href='cart-remove.php?id=$ipresult->id&shop=1' class='btn btn-block btn-secondary' disabled>Remove From Cart</a>";
                                                                } else {
                                                        ?>
                                                                <a href="cart-add.php?id=<?php echo htmlspecialchars($ipresult->id); ?>"
                                                                    name="add" value="add" class="btn btn-block btn-primary">Add to
                                                                    cart</a>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                         </div>
                                     </div>
                                 </a>
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
                     <?php if(isset($_SESSION['canAddItem'])) {?>
                        <button  type="button" data-toggle="modal" data-target="#addItem" class="btn btn-success add-item">Add</button>
                    <?php } ?>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $macbooks = $productController->getProductByCategory('macbook');
                                if (count($macbooks) > 0) {
                                    foreach($macbooks as $macbook) { ?>
                                     <div class="col mb-4 ">
                                     <a href="./product_detail.php?id=<?php echo htmlspecialchars($macbook->id); ?>">
                                         <div class="card item">
                                         <?php if(isset($_SESSION['canRemoveItem'])) {
                                             echo "<button onclick='removeItem($macbook->id)' class='btn btn-secondary remove-item'>X</button>";
                                              } ?>
                                             <img class="card-img-top" style="padding:10px" src="<?php echo htmlspecialchars($macbook->picture); ?>" alt="macbook-air">
                                             <div class="card-body">
                                                 <h3><?php echo htmlspecialchars($macbook->name); ?></h3>
                                                 <p>Price: <?php echo htmlspecialchars($macbook->price); ?>$ </p>

                                                 <?php if (!isset($_SESSION['email'])) { ?>
                                                     <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                             Now</a></p>
                                                     <?php
                                                   
                                                        } else {
                                                            //We have created a function to check whether this particular product is added to cart or not.
                                                            if ($productController->check_if_added_to_cart($macbook->id, $_SESSION['user_id'])) { //This is same as if(check_if_added_to_cart != 0)
                                                                echo "<a href='cart-remove.php?id=$macbook->id&shop=1' class='btn btn-block btn-secondary' disabled>Remove From Cart</a>";
                                                            } else {
                                                            ?>
                                             <a href="cart-add.php?id=<?php echo htmlspecialchars($macbook->id); ?>"
                                                 name="add" value="add" class="btn btn-block btn-primary">Add to
                                                 cart</a>
                                             <?php
                                                            }
                                                        }
                                                        ?>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card item w-100">
                     <div class="card-header color">
                         <h3 id="watch" style="color:orange">Apple Watch</h3>
                         <?php if(isset($_SESSION['canAddItem'])) {?>
                            <button  type="button" data-toggle="modal" data-target="#addItem" class="btn btn-success add-item">Add</button>
                        <?php } ?>
                        </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $watchs = $productController->getProductByCategory('watch');
                                if (count($watchs) > 0) {
                                    foreach($watchs as $watch) {?>
                                     <div class="col mb-4 ">
                                     <a href="./product_detail.php?id=<?php echo htmlspecialchars($watch->id); ?>">
                                         <div class="card item">
                                         <?php if(isset($_SESSION['canRemoveItem'])) {
                                             echo "<button onclick='removeItem($watch->id)' class='btn btn-secondary remove-item'>X</button>";
                                              } ?>
                                             <img class="card-img-top" style="padding:10px" src="<?php echo htmlspecialchars( $watch->picture); ?>" alt="macbook-air">
                                             <div class="card-body">
                                                 <h2><?php echo htmlspecialchars( $watch->name); ?></h2>
                                                 <p>Price: <?php echo htmlspecialchars( $watch->price); ?>$ </p>

                                                 <?php if (!isset($_SESSION['email'])) { ?>
                                                     <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                             Now</a></p>
                                                     <?php
                                                    
                                                        } else {
                                                            //We have created a function to check whether this particular product is added to cart or not.
                                                            if ($productController->check_if_added_to_cart($watch->id, $_SESSION['user_id'])) { //This is same as if(check_if_added_to_cart != 0)
                                                                echo "<a href='cart-remove.php?id=$watch->id&shop=1' class='btn btn-block btn-secondary' disabled>Remove From Cart</a>";
                                                            } else {
                                                            ?>
                                             <a href="cart-add.php?id=<?php echo htmlspecialchars($watch->id); ?>"
                                                 name="add" value="add" class="btn btn-block btn-primary">Add to
                                                 cart</a>
                                             <?php
                                                            }
                                                        }
                                                        ?>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                             <?php }
                                }
                                ?>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="card-group" style="margin-bottom:50px">
                 <div class="card w-100 item">
                     <div class="card-header color">
                         <h3 id="mac" style="color:orange">Mac</h3>
                         <?php if(isset($_SESSION['canAddItem'])) {?>
                            <button  type="button" data-toggle="modal" data-target="#addItem" class="btn btn-success add-item">Add</button>

                            <?php } ?>
                     </div>

                     <div class="card-body">
                         <div class="row row-cols-1 row-cols-md-3">
                             <?php
                                $macs = $productController->getProductByCategory('mac');
                                if (count($macs) > 0) {
                                    foreach($macs as $mac) { ?>
                                     <div class="col mb-4 ">
                                     <a href="./product_detail.php?id=<?php echo htmlspecialchars($mac->id); ?>">
                                         <div class="card">
                                         <?php if(isset($_SESSION['canRemoveItem'])) {
                                             echo "<button onclick='removeItem($mac->id)' class='btn btn-secondary remove-item'>X</button>";
                                              } ?>
                                            <img class="card-img-top" style="padding:10px" src="<?php echo htmlspecialchars($mac->picture); ?>" alt="mac">
                                             <div class="card-body">
                                                 <h2><?php echo htmlspecialchars($mac->name); ?></h2>
                                                 <p>Price: <?php echo htmlspecialchars($mac->price); ?>$ </p>

                                                 <?php if (!isset($_SESSION['email'])) { ?>
                                                     <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy
                                                             Now</a></p>
                                                     <?php
                                                    } else {
                                                        //We have created a function to check whether this particular product is added to cart or not.
                                                        if ($productController->check_if_added_to_cart($mac->id, $_SESSION['user_id'])) { //This is same as if(check_if_added_to_cart != 0)
                                                            echo "<a href='cart-remove.php?id=$mac->id&shop=1' class='btn btn-block btn-secondary' disabled>Remove From Cart</a>";
                                                       } else {
                                                        ?>
                                                         <a href="cart-add.php?id=<?php echo htmlspecialchars($mac->id); ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                                 <?php
                                                       }
                                                        }
                                                        ?>
                                         </div>
                                     </div>
                                 </a>
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
 <!-- Modal -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItem" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItem">Add Item</h5>
        <?php if(isset($_SESSION['canAddItem'])) {?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <?php } ?>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="category">Category</label>
        <select class="form-control" id="category" value = "iphone">
            <option value="iphone">Iphone</option>
            <option value="macbook">Macbook</option>
            <option value="watch">Watch</option>
            <option value="mac">Mac</option>
        </select>
        <label for="item-name">Item Name</label>
        <input type="text" class="form-control" id="item-name" placeholder="Item Name">
        <label for="picture-link">Picture Link</label>
        <input type="text" class="form-control" id="picture-link" placeholder="Picture Link">
        <label for="item-price">Price</label>
        <input type="number" class="form-control" id="item-price" placeholder="Price">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="addItem()">Save</button>
      </div>
    </div>
  </div>
</div>
 <script src="./js/handleItem.js"></script>
 <?php
    include('./common/footer.php');
    ?>

