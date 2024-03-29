<?php
require 'model/cartModel.php';
require 'model/entity/carts.php';
require_once './constant/config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class cartController
{

    function __construct()
    {
        $this->objconfig = new config();
        $this->objcm =  new cartsModel($this->objconfig);
    }

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

    public function getListCart($userId)
    {
        return $this->objcm->getListCart($userId);
    }

    public function getListOrderItem()
    {
        return $this->objcm->getListOrderItem();
    }

    public function confirmOrderDone($orderId)
    {
        return $this->objcm->confirmOrderDone($orderId);
    }

    // add new record
    public function cartAdd($itemId, $userId)
    {
        return $this->objcm->cartAdd($itemId, $userId);
    }

    public function removeCart($itemId, $userId)
    {
        return $this->objcm->cartRemove($itemId, $userId);
    }
}