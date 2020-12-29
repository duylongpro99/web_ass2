<?php
session_start();
require_once './controller/userController.php';
$userController = new usersController();
require './controller/cartController.php';
$cartController = new cartController();
require("./common/common.php");
include('./common/intro.php');
include('./common/header.php');
if (isset($_COOKIE['userId'])) {
    $adminId = (int)$_COOKIE['userId'];
    $accountList = $userController->getUsersForAdmin($adminId);
    $listCart = $cartController->getListOrderItem();
};

?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col col-sm-4 text-left">Id</th>
            <th scope="col col-sm-4 text-left">Item No.</th>
            <th scope="col col-sm-4 text-left">Item Name</th>
            <th scope="col col-sm-4 text-left">Customer</th>
            <th scope="col col-sm-4 text-left">Email</th>
            <th scope="col col-sm-4 text-left">Contact</th>
            <th scope="col col-sm-4 text-left">Address</th>
            <th scope="col col-sm-4 text-left">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listCart as $cart) {
            echo "
                <tr>
                    <th scope='row' class = 'text-left'>$cart->orderid</th>
                    <td class = 'text-left'>$cart->id</td>
                    <td class = 'text-left'>$cart->name</td>
                    <td class = 'text-left'>$cart->username</td>
                    <td class = 'text-left'>$cart->email</td>
                    <td class = 'text-left'>$cart->phone</td>
                    <td class = 'text-left'>$cart->address</td>
                    <td class = 'text-left'>
                        <button onclick = 'myFunction($cart->orderid)' class='btn btn-danger'>Done</button>
                    </td>
                </tr>
            ";
        }
        ?>
    </tbody>
    <script src="./js/confirmOrder.js"></script>
</table>
<?php
include('./common/footer.php');
?>