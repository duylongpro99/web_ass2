<?php
    class users{
        public $id;
        public $name;
        public $password;
        public $city;
        public $email;
        public $contact;
        public $address;

        public $id_msg;
        public $name_msg;
        public $password_msg;
        public $city_msg;
        public $email_msg;
        public $contact_msg;
        public $address_msg;
        
        function __construct()
        {
            $id = 0;
            $name = $password = $city = $email = $contact = $address = '';
            $id_msg = $name_msg = $password = $city_msg = $email_msg = $contact_msg = $address_msg = '';
        }
    }
?>