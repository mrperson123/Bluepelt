<?php

class user{
	
	#Signup user
	public function SignUp($aSignup){
		$sName 		= $aSignup['name'];
		$sEmail 	= $aSignup['email'];
		$sPassword 	= $aSignup['password'];
		$stmt = db::$conn->prepare("SELECT 1 FROM `werewolf_player` WHERE `email` LIKE '$sEmail'");
        $stmt->execute(array($sEmail));
		$res = $stmt->rowCount();
		
		#Check if email exist in db
		if(empty($res)){
			#if email doesnt exist
			$sHashPassword = sha1($sPassword);
			$sHash = $sName.$sEmail.$sPassword;
			$sVerifyCode = sha1($sHash);

			$stmt = db::$conn->prepare("INSERT INTO werewolf_player (playername, password, email, verifycode, verified, level) VALUES (?, ?, ?, ?, '0', '0')");
			$stmt->execute(array($sName, $sHashPassword, $sEmail, $sVerifyCode));

            $id = db::$conn->lastInsertId();
            
            $subject    = "Inschrijving Bluepelt Werewolf";
            $messsage   = "Bedankt voor het inschrijven bij Bluepelt Werewolf te Delft. Om je account te verifi&euml;ren klik op de volgende link: <a href='".$GLOBALS['url']."activate.php?id=$id&code=$sVerifyCode'>Verifi&euml;ren</a>";
            $address    = $sEmail;
            
            phpmailer::sendMail($subject, $messsage, $address);
			return "success";
		}else{
			#if email exist cant do stuff
			$return = "exist";
			return $return;
		}
	}
    
    function GetAllUsers(){
        $query = "SELECT * FROM werewolf_player ORDER BY playername ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();

        return $res;
    }
	  
    #Activate user
    public function ActivateUser($id, $code){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE id = ?");
		$stmt->execute(array($id));
        $res = $stmt->fetch();
        $sDbCode = $res['verifycode'];
        
        #stop if already activated
        if($res['verified'] == 1){
            $return = 'activated';
            return $return;
        }
        
        #check if code is correct. if code is correct verify else give error
        if($code != $sDbCode){
            $return = "";
        }else{
            $stmt = db::$conn->prepare("UPDATE werewolf_player SET verified='1' WHERE id = ?");
            $stmt->execute(array($id));
            $return = "success";
        }
		return $return;
    }
        
    #if user forgot password. The n00b;
    public function ForgotPassword($aForgot){
        $sEmail = $aForgot['email'];
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE email = ?");
        $stmt->execute(array($sEmail));
		$res = $stmt->fetchAll();
        //return $res;
        
        if($res == ""){
            return "falsepositive";
        }else{
            $sId = $res[0]['id'];
            $time = sha1(time());
            $stmt = db::$conn->prepare("UPDATE werewolf_player SET forgot_password=? WHERE email = ?");
            $stmt->execute(array($time, $sEmail));
            
            #make forgot email
            $subject    = "Wachtwoord vergeten";
            $messsage   = "Deze e-mail is naar je verstuurd omdat er is aangegeven dat je je wachtwoord bent vergeten. <a href='".$GLOBALS['url']."forgot.php?id=$sId&code=$time'>Klik hier</a> om een nieuw wachtwoord in te stellen.";
            $address    = $sEmail;
            
            phpmailer::sendMail($subject, $messsage, $address);
        
            $res = "send";
            return $res;
        }
    }
    
    #check if forgot variables are correct
    public function CheckForgotPassword($id, $code){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE id = ?");
		$stmt->execute(array($id));
		$res = $stmt->fetch();

        $sCode =  $res['forgot_password'];

        if($sCode == ""){
            $end = 0;
        }elseif($sCode == $code){
            $end = 1;
        }elseif($sCode != $code){
            $end = 0;
        }
        
        return $end;
    }
    
    #change password by forgot
    public function ChangePassword($form){
        $id 	= $form['id'];
		$pass 	= $form['password'];
        
        $sHashPassword = sha1($pass);
        $stmt = db::$conn->prepare("UPDATE werewolf_player SET password=?, forgot_password='' WHERE id = ?");
        $res = $stmt->execute(array($sHashPassword, $id));
        return $res;
    }
    
    #Log in functionality and set sessions, maybe keep logged in
    public function Login($form){
        $sUser = $form['user'];
        $sPass = sha1($form['pass']);
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE email = ? and password = ?");
        $stmt->execute(array($sUser, $sPass));
		$res = $stmt->fetchObject();
        if($res == false){
            return "failed";
            die();
        }
        if($res->verified == 0){
            return "verify";
        }
        
        
        if($res != ""){
            $_SESSION['username']   = $res->playername;
            $_SESSION['userid']     = $res->id;
            $_SESSION['level']		= $res->level;
            return "success";
        }else{
            return "failed";
        }
    }
    
    
    #Check if User is Narrator or admin or whatever
    public static function Admin(){
        if($_SESSION['level'] != 1){
            header("location: ".$GLOBALS["url"]);
            die();
        }
    }
	
	public static function LoggedIn(){
		if(!isset($_SESSION['level'])){
			header("location: ".$GLOBALS["url"]);
            die();
		}
	}
    
    public static function AdminCheck(){
        if($_SESSION['level'] == 1){
            return 1;
        }else{
            return 0;
        }
    }
    
    #Get user row by id
    public function GetUserById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
    #update user
    public function EditUser($post){
        $stmt = db::$conn->prepare("UPDATE werewolf_player SET playername=?, email=?, level=?, verified=? WHERE id = ?");
        $res = $stmt->execute(array($post['name'], $post['email'], $post['level'], $post['verified'], $post['id']));
        return "success";
    }
}

	
?>