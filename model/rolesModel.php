<?php
    class rolesModel{

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
			$this->condb = mysqli_connect( $this->host, $this->user, $this->pass, $this->db);
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
				$query=$this->condb->prepare("INSERT INTO roles (Id,[Name]) VALUES (?, ?)");
				$query->bind_param("is",$obj->Id,$obj->Name);
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
				$query=$this->condb->prepare("UPDATE roles SET [Name]=? WHERE Id=?");
				$query->bind_param("si",$obj->Name,$obj->Id);
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
				$query=$this->condb->prepare("DELETE FROM roles WHERE Id=?");
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
					$query=$this->condb->prepare("SELECT * FROM roles WHERE Id=?");
					$query->bind_param("i",$id);
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM roles");	}		
				
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