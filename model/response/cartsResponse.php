<?php
    class cartsResponse{
        public $id;
        public $name;
        public $picture;
        public $category;
        public $price;
        
        function __construct($_id, $_name, $_picture
        , $_category, $_price)
        {
            $this->id = $_id;
            $this->name = $_name;
            $this->picture =  $_picture;
            $this->category = $_category;
            $this->price = $_price;
        }
    }
?>