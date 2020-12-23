<?php
    class userRolesObj{
        public $id;
        public $userId;
        public $roleId;
        
        function __construct($id, $userId, $roleId)
        {
            $this->id = $id;
            $this->userId =  $userId;
            $this->roleId = $roleId;
        }
    }
?>