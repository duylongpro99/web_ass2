<?php
    require_once 'model/userrolesModel.php';
    require 'model/entity/userroles.php';
    require_once './config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class userrolesController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objurm =  new userrolesModel($this->objconfig);
		}
        // mvc handler request
		// public function mvcHandler() 
		// {
		// 	$act = isset($_GET['act']) ? $_GET['act'] : NULL;
		// 	switch ($act) 
		// 	{
        //         case 'add' :                    
		// 			$this->insert();
		// 			break;						
		// 		case 'update':
		// 			$this->update();
		// 			break;				
		// 		case 'delete' :					
		// 			$this->delete();
		// 			break;								
		// 		default:
        //             $this->list();
		// 	}
		// }		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($user)
        {    $noerror=true;
            // Validate category        
            // if(empty($sporttb->category)){
            //     $sporttb->category_msg = "Field is empty.";$noerror=false;
            // } elseif(!filter_var($sporttb->category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            //     $sporttb->category_msg = "Invalid entry.";$noerror=false;
            // }else{$sporttb->category_msg ="";}            
            // // Validate name            
            // if(empty($sporttb->name)){
            //     $sporttb->name_msg = "Field is empty.";$noerror=false;     
            // } elseif(!filter_var($sporttb->name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            //     $sporttb->name_msg = "Invalid entry.";$noerror=false;
            // }else{$sporttb->name_msg ="";}
            return $noerror;
        }
        // add new record
		public function insert($_newUserRole)
		{
            try{
                $userrole=new userroles(); 
                // read form value
                $userrole->id = $_newUserRole->id;
                $userrole->userId = $_newUserRole->userId;
                $userrole->roleId = $_newUserRole->roleId;
                //call validation
                $chk=$this->checkValidation($userrole);                    
                if($chk)
                {   
                    //call insert record            
                    $pid = $this->objurm->insertRecord($userrole);
                    return $pid;
                }
            }catch (Exception $e) 
            {
                $this->objurm->close_db();	
                throw $e;
            }
        }

        // update record
        public function update()
		{
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $userrole=unserialize($_SESSION['userrolestbl0']);
                    $userrole->id = trim($_POST['id']);
                    $userrole->userId = trim($_POST['userId']);
                    $userrole->roleId = trim($_POST['roleId']);       
                    // check validation  
                    $chk=$this->checkValidation($userrole);
                    if($chk)
                    {
                        $res = $this->objurm->updateRecord($userrole);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {         
                        $_SESSION['userrolestbl0']=serialize($userrole);      
                        $this->pageRedirect("http://localhost/dashboard/www/assignment/settings.php");                
                    }
                }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                    $id=$_GET['id'];
                    $result=$this->objurm->selectRecord($id);
                    $row=mysqli_fetch_array($result);  
                    $userrole=new userroles();                  
                    $userrole->id = $row["id"];
                    $userrole->userId = $row["userId"];
                    $userrole->roleId = $row["roleId"];
                  
                    $_SESSION['usertbl0']=serialize($userrole);
                    $this->pageRedirect('http://localhost/dashboard/www/assignment/settings.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->objurm->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['id'])) 
                {
                    $id=$_GET['id'];
                    $res=$this->objurm->deleteRecord($id);                
                    if($res){
                        $this->pageRedirect('http://localhost/dashboard/www/assignment/index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->objurm->close_db();				
                throw $e;
            }
        }
        public function list(){
            $result=$this->objurm->selectRecord(0);
            include "http://localhost/dashboard/www/assignment/index.php";                                        
        }

        public function getMaxIndex(){
            $result = $this->objurm->getMaxIndex();
            return $result;
        }
    }
		
	
?>