<?php
    require 'model/rolesModel.php';
    require 'model/roles.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

    class rolesController
    {
        function __construct()
        {
            $this->objconfig = new config();
            $this->objrm = new rolesModel($this->objconfig);
        }

        public function mvcHandler()
        {
            
        }
    }
?>