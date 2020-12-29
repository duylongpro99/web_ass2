<?php
require 'model/usersModel.php';
require 'model/entity/users.php';
require_once './constant/config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class usersController
{

    function __construct()
    {
        $this->objconfig = new config();
        $this->objum =  new usersModel($this->objconfig);
    }
    // mvc handler request
    // public function mvcHandler() 
    // {
    // 	$act = isset($_GET['act']) ? $_GET['act'] : NULL;
    // 	switch ($act) 
    // 	{
    //         case 'add' :                    
    // 			$this->insert();
    // 			break;						
    // 		case 'update':
    // 			$this->update();
    // 			break;				
    // 		case 'delete' :					
    // 			$this->delete();
    // 			break;								
    // 		default:
    //             $this->list();
    // 	}
    // }		
    // page redirection
    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }
    // check validation
    public function checkValidation($user)
    {
        $noerror = true;
        // Validate category        
        // if(empty($sporttb->category)){
        //     $sporttb->category_msg = "Field is empty.";$noerror=false;
        // } elseif(!filter_var($sporttb->category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        //     $sporttb->category_msg = "Invalid entry.";$noerror=false;
        // }else{$sporttb->category_msg ="";}            
        // // Validate name            
        // if(empty($sporttb->name)){
        //     $sporttb->name_msg = "Field is empty.";$noerror=false;     
        // } elseif(!filter_var($sporttb->name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        //     $sporttb->name_msg = "Invalid entry.";$noerror=false;
        // }else{$sporttb->name_msg ="";}
        return $noerror;
    }
    // add new record
    public function insert($_user)
    {
        try {
            $user = new users();
            // if (isset($_POST['addbtn'])) 
            // {   
            // read form value
            $user->name = trim($_user->name);
            $user->email = trim($_user->email);
            $user->password = trim($_user->password);
            $user->contact = trim($_user->contact);
            $user->city = trim($_user->city);
            $user->address = trim($_user->address);
            $user->id = $_user->id;
            //call validation
            $chk = $this->checkValidation($user);
            if ($chk) {
                //call insert record            
                $pid = $this->objum->insertRecord($user);

                if ($pid) {
                    return $pid;
                } else {
                    echo "Somthing is wrong..., try again.";
                }
            } else {
                $_SESSION['usertbl0'] = serialize($user); //add session obj           
                $this->pageRedirect("http://localhost/dashboard/www/assignment/login.php");
            }
            //}
        } catch (Exception $e) {
            $this->objum->close_db();
            throw $e;
        }
    }

    public function insertAnUser($newuser)
    {
        try {
            //call insert record            
            $pid = $this->objum->insertRecord($newuser);
            if ($pid > 0) {
                $this->list();
            } else {
                echo "<script>console.log('can't insert')</script>";
            }

            $this->pageRedirect("http://localhost/dashboard/www/assignment/index.php");
        } catch (Exception $e) {
            $this->objum->close_db();
            throw $e;
        }
    }
    // update record
    public function update()
    {
        try {

            if (isset($_POST['updatebtn'])) {
                $user = unserialize($_SESSION['usertbl0']);
                $user->id = trim($_POST['id']);
                $user->name = trim($_POST['name']);
                $user->email = trim($_POST['email']);
                $user->city = trim($_POST['city']);
                $user->address = trim($_POST['address']);
                $user->password = trim($_POST['password']);
                $user->contact = trim($_POST['contact']);
                // check validation  
                $chk = $this->checkValidation($user);
                if ($chk) {
                    $res = $this->objum->updateRecord($user);
                    if ($res) {
                        $this->list();
                    } else {
                        echo "Somthing is wrong..., try again.";
                    }
                } else {
                    $_SESSION['usertbl0'] = serialize($user);
                    $this->pageRedirect("http://localhost/dashboard/www/assignment/settings.php");
                }
            } elseif (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $id = $_GET['id'];
                $result = $this->objum->selectRecord($id);
                $row = mysqli_fetch_array($result);
                $user = new users();
                $user->id = $row["id"];
                $user->name = $row["name"];
                $user->password = $row["password"];
                $user->email = $row["email"];
                $user->contact = $row["contact"];
                $user->city = $row["city"];
                $user->address = $row["address"];
                $_SESSION['usertbl0'] = serialize($user);
                $this->pageRedirect('http://localhost/dashboard/www/assignment/settings.php');
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->objum->close_db();
            throw $e;
        }
    }

    public function updatePassword($old_pass, $rep_pass, $new_pass)
    {
        $row = mysqli_fetch_array($this->objum->selectAccount($_SESSION['email']));

        $orig_pass = $row['password'];

        // header('location: ../settings.php?error=' . $row['password']);

        //check old password and password taken from db
        if ($new_pass != $rep_pass) {
            header('location: settings.php?error=The two passwords don\'t match.');
        } else {
            if ($old_pass == $orig_pass) {
                $this->objum->updatePassword($_SESSION['email'], $new_pass);
                header('location: settings.php?error=Password Updated Successfully');
            } else
                header('location: settings.php?error=Wrong Old Password.');
        }
    }

    // delete record
    public function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $res = $this->objum->deleteRecord($id);
                if ($res) {
                    $this->pageRedirect('http://localhost/dashboard/www/assignment/index.php');
                } else {
                    echo "Somthing is wrong..., try again.";
                }
            } else {
                echo "Invalid operation.";
            }
        } catch (Exception $e) {
            $this->objum->close_db();
            throw $e;
        }
    }
    public function list()
    {
        $result = $this->objum->selectRecord(0);
        include "http://localhost/dashboard/www/assignment/index.php";
    }

    public function getMaxIndex()
    {
        $result = $this->objum->getMaxIndex();
        return $result;
    }

    public function checkInLogin($existedUser)
    {
        $result = $this->objum->checkInLogin($existedUser);
        return $result;
    }

    public function getPermissionsOfUser($userId)
    {
        $result = $this->objum->getPermissionsOfUser($userId);
        return $result;
    }

    public function getUsersForAdmin($adminId)
    {
        $accountList = $this->objum->getUsersForAdmin($adminId);
        return $accountList;
    }

    public function deleteAccount($accountId)
    {
        $res = $this->objum->deleteAccount($accountId);
        return $res;
    }
}