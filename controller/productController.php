<?php
    require 'model/productModel.php';
    require 'model/entity/carts.php';
    require_once './constant/config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class ProductController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
            $this->objpm =  new productsModel($this->objconfig);
		}
        
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($user)
        {    
            $noerror=true;
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
        
        public function check_if_added_to_cart($item_id, $user_id)
        {
            return $this-> objpm ->check_if_added_to_cart($item_id, $user_id);
        }

        public function check_if_product_exist($item_id){
            return $this-> objpm ->check_if_product_exist($item_id);
        }

        public function get_product($item_id){
            return $this-> objpm -> get_product($item_id);  
        }

        public function get_comments($item_id){
            return $this-> objpm -> get_comments($item_id);
        }

        public function insert_comment($user_id, $item_id, $content){
            return  $this-> objpm -> insert_comment($user_id, $item_id, $content);
        }

        public function getProductByCategory($category){
            return $this-> objpm -> getProductByCategory($category);
        }

        public function getMaxIndexOfProduct(){
            return $this -> objpm -> getMaxIndexOfProduct();
        }

        public function addProduct($_id, $_name, $_picture, $_category, $_price){
            return $this -> objpm -> addProduct($_id, $_name, $_picture, $_category, $_price);
        }

        public function  removeProduct($itemId){
            return $this -> objpm -> removeProduct($itemId);
        }
    }
		
	
?>