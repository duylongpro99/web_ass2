<?php
    class CmtResponse{
        public $email;
        public $comment;
        public $time;
        
        function __construct($_email, $_comment, $_time)
        {
            $this->email = $_email;
            $this->comment = $_comment;
            $this->time =  $_time;
        }
    }
?>