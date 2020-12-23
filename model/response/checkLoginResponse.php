<?php
    class checkLoginResponse{
        public $userId;
        public $roleName;
        public $roleId;
        public $userName;
        public $password;
        public $email;
        public $contact;
        public $city;
        public $address;
        function __construct($_userId, $_userName, $_roleName
        , $_roleId, $_password, $_email, $_contact, $_city, $_address)
        {
            $this->userId = $_userId;
            $this->roleName = $_roleName;
            $this->roleId =  $_roleId;
            $this->userName = $_userName;
            $this->password = $_password;
            $this->email = $_email;
            $this->contact = $_contact;
            $this->city = $_city;
            $this->address = $_address;
        }
    }
?>