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

    public function insert_comment($user_id, $item_id, $content){
        try{
            $this->open_db();
            $query=$this->condb->prepare("INSERT INTO `comments`(`user_id`, `item_id`, `comment`) VALUES (?,?,?)");
            $query->bind_param("iis",$user_id, $item_id, $content);
            $query->execute();
            $res = $query->get_result();
            $query->close();				
            $this->close_db(); 
            return 1;    
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function getProductByCategory($category){
        try{
            $items = array();
            $this->open_db();
            $query=$this->condb->prepare("SELECT `id`, `name`, `picture`, `price` FROM `items` WHERE category=?");
            $query->bind_param("s", $category);
            $query->execute();
            $res = $query->get_result();
            if (mysqli_num_rows($res) > 0) {
                while ($rowData = mysqli_fetch_assoc($res)) {
                    $item = new cartsResponse($rowData['id'], $rowData['name'], $rowData['picture'], $category, $rowData['price']) ;
                    array_push($items, $item);
                }
            }
            $query->close();				
            $this->close_db();     
            return $items;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function getMaxIndexOfProduct(){
        try{
            $this->open_db();
            $query=$this->condb->prepare("call getMaxIndexOfProduct()");
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);
            $query->close();				
            $this->close_db();     
            return $rowData['maxId'];
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function addProduct($_id, $_name, $_picture, $_category, $_price){
        try{
            $this->open_db();
            $query=$this->condb->prepare("call AddProduct(?,?,?,?,?)");
            $query->bind_param("isssi",$_id, $_name, $_picture, $_category, $_price);
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);
            $query->close();				
            $this->close_db(); 
            if($rowData['done']) return 1;
            else return 0;    
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

    public function removeProduct($itemId){
        try{
            $this->open_db();
            $query=$this->condb->prepare("call removeItem(?)");
            $query->bind_param("i",$itemId);
            $query->execute();
            $res = $query->get_result();
            $rowData = mysqli_fetch_array($res);
            $query->close();				
            $this->close_db(); 
            if($rowData['done']) return 1;
            else return 0;    
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
    }

}
?>