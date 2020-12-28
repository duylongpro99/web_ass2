<?php
// require_once './response/usersitemsResponse.php';
require_once './model/response/cartsResponse.php';
require_once './model/response/commentResponse.php';
class productsModel{
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
    
    public function check_if_added_to_cart($item_id, $user_id)
    {
        try{
            $this->open_db();
            $query=$this->condb->prepare("SELECT * FROM usersitems WHERE item_id= ? AND user_id = ? and status = 'Added to cart'");
            $query->bind_param("ii", $item_id, $user_id );
            $query->execute();
            $res = $query->get_result();
            $query->close();	
            $this->close_db();
            if(mysqli_num_rows($res) >= 1) return 1;
            else return 0;     
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function check_if_product_exist($item_id){
        try{
            $this->open_db();
            $query=$this->condb->prepare("SELECT * FROM items WHERE id=?;");
            $query->bind_param("i", $item_id);
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);	
            $query->close();				
            $this->close_db();     
            if($rowData['id']) return 1 ;
            else return 0;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }
    
    public function get_product($item_id){
        try{
            $this->open_db();
            $query=$this->condb->prepare("SELECT `id`, `name`, `picture`, `price`, `category` FROM `items` WHERE id=?");
            $query->bind_param("i", $item_id );
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);	
            $query->close();				
            $this->close_db();    
            if($rowData["id"]) return  new cartsResponse($rowData["id"], $rowData["name"], $rowData["picture"], $rowData["category"], $rowData["price"]);
            else return null;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function get_comments($item_id){
        try{
            $comments = array();
            $this->open_db();
            $query=$this->condb->prepare("SELECT users.email, comments.comment, comments.time FROM comments JOIN users ON comments.user_id = users.id WHERE comments.item_id=?");
            $query->bind_param("i", $item_id);
            $query->execute();
            $res = $query->get_result();
            if (mysqli_num_rows($res) > 0) {
                while ($rowData = mysqli_fetch_assoc($res)) {
                    $comment = new CmtResponse($rowData['email'], $rowData['comment'], $rowData['time']) ;
                    array_push($comments, $comment);
                }
            }
            $query->close();				
            $this->close_db();     
            return $comments;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

}
?>