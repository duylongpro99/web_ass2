<?php 

class roles
{
    //table fields
    public $Id;
    public $Name;
    //message fields
    public $Id_msg;
    public $Name_msg;

    function __construct()
    {
        $Id = 0;
        $Name = "";
        $Id_msg = $Name_msg = "";
    }
}

?>