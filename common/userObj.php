<?php
    class userObj{
        public $id;
        public $name;
        public $password;
        public $city;
        public $email;
        public $contact;
        public $address;
        
        function __construct($id, $name, $password, $city, $email, $contact, $address )
        {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->city = $city;
            $this->email = $email;
            $this->contact = $contact;
            $this->address = $address;
        }
    }
?>