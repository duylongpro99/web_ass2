<?php
class cartsResponseAdmin
{
    public $orderid;
    public $id;
    public $name;
    public $price;
    public $username;
    public $email;
    public $phone;
    public $address;

    function __construct($_order_id, $_id, $_name, $_price, $_username, $_email, $_phone, $_address)
    {
        $this->orderid = $_order_id;
        $this->id = $_id;
        $this->name = $_name;
        $this->price = $_price;
        $this->username = $_username;
        $this->email = $_email;
        $this->phone = $_phone;
        $this->address = $_address;
    }
}