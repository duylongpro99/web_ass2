<?php
require './model/response/cartsResponse.php';

class cartsModel{
    function __construct($consetup)
    {
        $this->host = $consetup->host;
        $this->user = $consetup->user;
        $this->pass =  $consetup->pass;
        $this->db = $consetup->db;            					
    } 

    // open mysql data base
    public function open_db()
    {
        $this->condb = new mysqli( $this->host, $this->user, $this->pass, $this->db);
        if ($this->condb->connect_error) 
        {
            die("Erron in connection: " . $this->condb->connect_error);
        }
    }
    
    // close database
    public function close_db()
    {
        $this->condb->close();
    }
    
    public function getListCart($userId){
        $cartList = array();
        $this->open_db();
        $query=$this->condb->prepare("SELECT items.price AS Price, items.id, items.name AS Name FROM usersitems JOIN items ON usersitems.item_id = items.id WHERE usersitems.user_id= ? and status='Added to cart'");
        $query->bind_param("i", $userId);
        $query->execute();
        $res = $query->get_result();
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $cart = new cartsResponse($row['id'],$row['Name'], '', '', $row['Price']);
                array_push($cartList, $cart);
            }
        }
        $query->close();
        $this->close_db();
        return $cartList;
    }

    public function cartAdd($itemId, $userId){
        try{
            $this->open_db();
            $query=$this->condb->prepare("call AddCart(?, ?)");
            $query->bind_param("ii", $itemId, $userId);
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);	
            $query->close();				
            $this->close_db();     
            return $rowData["done"] ;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function cartRemove($itemId, $userId){
        try{
            $this->open_db();
            $query=$this->condb->prepare("call RemoveCart(?, ?)");
            $query->bind_param("ii", $itemId, $userId);
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);	
            $query->close();				
            $this->close_db();     
            return $rowData["done"] ;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

}
?>