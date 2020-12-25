<?php
    class carts{
        public $id;
        public $name;
        public $picture;
        public $category;
        public $price;
        

        public $id_msg;
        public $name_msg;
        public $category_msg;
        public $picture_msg;
        public $price_msg;
        
        function __construct()
        {
            $id = $price = 0;
            $name = $picture = $category =  '';
            $id_msg = $name_msg = $category_msg = $picture_msg = $price_msg = '';
        }
    }
?>