<?php 
	
	include('includes/include.php'); 
	
    switch($_POST["xf"]){
        case "addauspice":
            $auspices = new auspices();
        	$result = $auspices->AddAuspice($_POST);
        	echo $result;
            break;
        case "addbackground":
            $background = new backgrounds();
        	$result = $background->AddBackground($_POST);
        	echo $result;
            break;
        case "addbreed":
            $breeds = new breeds();
        	$result = $breeds->AddBreed($_POST);
        	echo $result;
            break;
        case "addcharacter":
            $character = new character();
        	$result = $character->AddCharacter($_POST);
        	echo $result;
            //var_dump($result);
            break;
        case "addgift":
            $gifts = new gifts();
        	$result = $gifts->AddGift($_POST);
        	echo $result;
            break;
        case "addflaw":
            $flaw = new flaws();
        	$result = $flaw->AddFlaw($_POST);
        	echo $result;
            break;
        case "addmailing":
            $mail = new mail();
        	$result = $mail->AddMail($_POST);
            //var_dump($result);
        	echo $result;
            break;
        case "addmerit":
            $merit = new merits();
        	$result = $merit->AddMerit($_POST);
        	echo $result;
            break;
        case "addpack":
            $pack = new pack();
        	$result = $pack->AddPack($_POST);
        	echo $result;
            break;
        case "addsession":
            $session = new session();
        	$result = $session->AddSession($_POST);
        	var_dump($result);
            break;
        case "addskill":
            $skills = new skills();
        	$result = $skills->AddSkill($_POST);
        	echo $result;
            break;
        case "addtribe":
            $tribes = new tribes();
        	$result = $tribes->AddTribe($_POST);
        	echo $result;
            break;
        case "change":
            $user = new user();
        	$signup = $user->ChangePassword($_POST);
        	echo $signup;
            break;
        case "editauspice":
            $auspices = new auspices();
        	$result = $auspices->EditAuspice($_POST);
        	echo $result;
            break; 
        case "editbackground":
            $background = new backgrounds();
        	$result = $background->EditBackground($_POST);
        	echo $result;
            break;
        case "editbreed":
            $breed = new breeds();
        	$result = $breed->EditBreed($_POST);
        	echo $result;
            break;
        case "editcharacter":
            $character = new character();
        	$result = $character->EditCharacter($_POST);
            echo $result;
			//var_dump($result);
            break;
        case "admineditcharacter":
            $character = new character();
        	$result = $character->AdminEditCharacter($_POST);
            echo $result;
            //var_dump($result);
            break;
        case "editflaw":
            $flaw = new flaws();
        	$result = $flaw->EditFlaw($_POST);
        	echo $result;
            break;
        case "editgift":
            $gifts = new gifts();
        	$result = $gifts->EditGift($_POST);
        	echo $result;
            break;
        case "editmerit":
            $merit = new merits();
        	$result = $merit->EditMerit($_POST);
        	echo $result;
            break;
        case "editpack":
            $pack = new pack();
        	$result = $pack->EditPack($_POST);
        	var_dump($result);
			//echo $result;
            break;
		case "editpackadmin":
            $pack = new pack();
        	$result = $pack->EditPackAdmin($_POST);
        	//var_dump($result);
			echo $result;
            break;
        case "editsession":
            $session = new session();
        	$result = $session->EditSession($_POST);
        	echo $result;
            break;
        case "editskill":
            $skill = new skills();
        	$result = $skill->EditSkill($_POST);
        	echo $result;
            break;
        case "edittribe":
            $tribes = new tribes();
        	$result = $tribes->EditTribe($_POST);
        	echo $result;
            break;
        case "edituser":
            $user = new user();
        	$result = $user->EditUser($_POST);
        	echo $result;
            break;
        case "forgot":
            $user = new user();
        	$signup = $user->ForgotPassword($_POST);
        	echo $signup;
            break;
        case "login":
            $user = new user();
            $login = $user->Login($_POST);
            echo $login;
            break;
        case "savepayment":
            $session = new session();
        	$result = $session->savePayment($_POST);
        	echo $result;
            //var_dump($result);
            break;
        case "savemailing":
            $mail = new mail();
        	$result = $mail->SaveMail($_POST);
            //var_dump($result);
        	echo $result;
            break;
        case "sendmailing":
            $mail = new mail();
        	$result = $mail->SendMailing($_POST);
            var_dump($result);
        	//echo $result;
            break;
        case "signup":
            $user = new user();
        	$signup = $user->SignUp($_POST);
        	echo $signup;
            //var_dump($signup);
            break;
        
    }
	
?>