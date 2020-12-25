<?php
class userroles{
    public $id;
    public $roleId;
    public $userId;

    public $id_msg;
    public $roleId_msg;
    public $userId_msg;
    
    function __construct()
    {
        $roleId = $userId = $id = 0;
        $roleId_msg = $userId_msg = $id_msg = '';
    }
}   
?>