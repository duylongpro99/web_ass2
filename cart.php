 <!-- Header -->
 <?php
    require './controller/cartController.php';
    $cartController = new cartController();
    include('./common/intro.php');
    include('./common/header.php');
    ?>
 <!-- body -->
 <div class="container w-96 px-0" style=" max-width: 96vw; margin-left: 2%; margin-top: 40px;">
     <div class="row">
         <div class="col-sm-12">
             <table class="table table-striped">
                 <?php
                    $sum = 0;
                    $userId = $_SESSION['user_id'];
                    $listCart = $cartController->getListCart($userId);
                    // $query = "SELECT items.price AS Price, items.id, items.name AS Name FROM usersitems JOIN items ON usersitems.item_id = items.id WHERE usersitems.user_id='$user_id' and status='Added to cart'";
                    // $result = mysqli_query($con, $query) or die($mysqli_error($con));
                    // if (mysqli_num_rows($result) >= 1) {
                    if (count($listCart) > 0) {
                    ?>
                 <thead>
                     <tr>
                         <th>Item Number</th>
                         <th>Item Name</th>
                         <th>Price</th>
                         <th></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                            // while ($row = mysqli_fetch_array($result)) {
                            //     $sum += $row["Price"];
                            //     $id = "";
                            //     $id .= $row["id"] . ",";
                            //     echo "<tr>
                            //                 <td class=\"amount\">" . $row["id"] . "</td>
                            //                 <td>" . $row["Name"] . "</td>
                            //                 <td class=\"price\">VND " . $row["Price"] . "</td>
                            //                 <td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> X </a></td>
                            //             </tr>";
                            // }
                            // $id = rtrim($id, ",");
                            // echo "<tr>
                            //             <td></td>
                            //             <td>Total</td>
                            //             <td>VND " . $sum . "</td>
                            //             <td><a href='success.php?itemsid=" . $id . "'class='btn btn-primary'>Confirm Order</a></td>
                            //             </tr>";
                            foreach ($listCart as $cart) {
                                $sum += (float)$cart->price;
                                $id = "";
                                $id .= $cart->id . ",";
                                echo "<tr>
                                                <td class=\"amount\">" . $cart->id . "</td>
                                                <td>" . $cart->name . "</td>
                                                <td class=\"price\">VND " . $cart->price . "</td>
                                                <td><a href='cart-remove.php?id=$cart->id' class='remove_item_link'> X </a></td>
                                            </tr>";
                            }
                            $id = rtrim($id, ",");
                            echo "<tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>VND " . $sum . "</td>
                                        <td><a href='success.php?itemsid=" . $id . "'class='btn btn-primary'>Confirm Order</a></td>
                                        </tr>";
                            ?>

                     <!-- <tr>
                         <td> </td>
                         <td></td>
                         <td class="total">Total</td>
                         <td class="confirm"><button type="button" onclick="pay()"
                                 class="btn btn-primary">Caculate</button></td>
                     </tr> -->
                 </tbody>
                 <?php
                    } else {
                        echo "<center><h2>Add items to the cart first!</h2></center>";
                    }
                    ?>
             </table>
         </div>
     </div>
 </div>
 </div>
 <script>
function deleteCartItem(itemId) {
    $.get("./cart-remove.php", {
        id: itemId
    }, function(data) {
        console.log(data);
        if (data) {
            location.reload();
        }
    });
}

function myFunction(x) {
    var txt;
    var r = confirm("Delete data cannot be recovered!");
    if (r == true) {
        deleteCartItem(x);
    }
}
 </script>
 <script type="text/javascript" src="./js/cart.js"></script>
 <?php
    include('./common/footer.php');
    ?>