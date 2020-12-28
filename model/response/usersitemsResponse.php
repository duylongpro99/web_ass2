<?php
    class UISResponse{
        public $id;
        public $user_id;
        public $item_id;
        public $status;
        
        function __construct($_id, $_user_id, $_item_id
        , $_status)
        {
            $this->id = $_id;
            $this->user_id = $_user_id;
            $this->item_id =  $_item_id;
            $this->status = $_status;
        }
    }
?>