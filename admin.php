<?php
session_start();
require_once './controller/userController.php';
$userController = new usersController();
require("./common/common.php");
include('./common/intro.php');
include('./common/header.php');
if(isset($_COOKIE['userId'])){
    $adminId = (int)$_COOKIE['userId']; 
    $accountList = $userController->getUsersForAdmin($adminId);
};

?>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col col-sm-4 text-left">Account Name</th>
      <th scope="col col-sm-4 text-left">Member</th>
      <th scope="col col-sm-4 text-left">Email</th>
      <th scope="col col-sm-4 text-left">Contact</th>
      <th scope="col col-sm-4 text-left">Address</th>
      <th scope="col col-sm-4 text-left">City</th>
      <th scope="col col-sm-4 text-left">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($accountList as $account){
            echo "
                <tr>
                    <th scope='row' class = 'text-left'>$account->name</th>
                    <td class = 'text-left'>$account->roleName</td>
                    <td class = 'text-left'>$account->email</td>
                    <td class = 'text-left'>$account->contact</td>
                    <td class = 'text-left'>$account->address</td>
                    <td class = 'text-left'>$account->city</td>
                    <td class = 'text-left'>
                        <button onclick = 'deleteAccount($account->id)' class='btn btn-danger'>Delete</button>
                    </td>
                </tr>
            ";
        }
    ?>
  </tbody>
  <?php 
  ?>
  <script>
      function deleteAccount(accountId){
        $.post("./deleteAccount.php",{userId: accountId},function(data){
                console.log(data);
                if(data){
                    location.reload();
                }
            });
      }
  </script>
</table>
<?php
include('./common/footer.php');
?>
