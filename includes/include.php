<?php 

class db {
    public static $conn=NULL;
}

try{
	if(is_null(db::$conn)){
		db::$conn = new PDO('mysql:host=*;dbname=*;charset=utf8mb4', '*', '*');
		}
	//var_dump("succes");
}catch(PDOException $e){
    echo $e->getMessage();
}


    
    session_start();
    $GLOBALS["url"] = "https://www.bluepelt.nl/";
    
    function __autoload($classname) {
        include_once("classes/class.$classname.php"); 
    }
    
    #check if user is logged in
    function LoggedIn() {
        if(session_status() == PHP_SESSION_NONE){
            return "0"; 
        }
    }
    
    #check if user is admin
    function AdminVisible(){
        if(!LoggedIn()){
            if(isset($_SESSION['level'])){
                if($_SESSION['level'] == 1){
                    return 1;
                }
            }
        }
    }	

?>