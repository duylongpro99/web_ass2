<?php
class usersModel{
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
    
    // insert record
    public function insertRecord($obj)
    {
        try
        {	
            $this->open_db();
            $query=$this -> condb -> prepare("INSERT INTO users(id,address, city, contact, email, name, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $query->bind_param('issssss',$obj->id, $obj->address,$obj->city,$obj->contact,$obj->email,$obj->name,$obj->password);
            $query->execute();
            $res= $query->get_result();
            $last_id=$this->condb->insert_id;
            $query->close();
            $this->close_db();
            return $last_id;

        }
        catch (Exception $e) 
        {
            $this->close_db();	
            throw $e;
        }
    }
    //update record
    public function updateRecord($obj)
    {
        try
        {	
            $this->open_db();
            $query=$this->condb->prepare("UPDATE users SET [name] = ? , email = ?, [address] = ?, city = ?, contact = ?, [password] = ?  WHERE id=?");
            $query->bind_param("ssssss",$obj->name, $obj->email,$obj->address,$obj->city,$obj->contact,$obj->password);
            $query->execute();
            $res=$query->get_result();						
            $query->close();
            $this->close_db();
            return true;
        }
        catch (Exception $e) 
        {
            $this->close_db();
            throw $e;
        }
    }
        // delete record
    public function deleteRecord($Id)
    {	
        try{
            $this->open_db();
            $query=$this->condb->prepare("DELETE FROM users WHERE id=?");
            $query->bind_param("i",$Id);
            $query->execute();
            $res=$query->get_result();
            $query->close();
            $this->close_db();
            return true;	
        }
        catch (Exception $e) 
        {
            $this->close_db();
            throw $e;
        }		
    }   
    // select record     
    public function selectRecord($id)
    {
        try
        {
            $this->open_db();
            if($id>0)
            {	
                $query=$this->condb->prepare("SELECT * FROM users WHERE id=?");
                $query->bind_param("i",$id);
            }
            else
            {$query=$this->condb->prepare("SELECT * FROM users");	}		
            
            $query->execute();
            $res=$query->get_result();	
            $query->close();				
            $this->close_db();                
            return $res;
        }
        catch(Exception $e)
        {
            $this->close_db();
            throw $e; 	
        }
        
    }
}
?>