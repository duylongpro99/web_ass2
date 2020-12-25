<?php
    class accountResponse{
        public $id;
        public $name;
        public $email;
        public $contact;
        public $roleName;
        public $city;
        public $address;
        function __construct($_userId, $_userName, $_roleName
        , $_email, $_contact, $_city, $_address)
        {
            $this->id = $_userId;
            $this->name = $_userName;
            $this->roleName =  $_roleName;
            $this->email = $_email;
            $this->contact = $_contact;
            $this->city = $_city;
            $this->address = $_address;
        }
    }
?>