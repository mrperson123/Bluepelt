<?php 
	
	include('includes/include.php'); 
    $user = new character();
	$result = $user->GetSessionCharacter($_POST);
	//var_dump($result);
    echo $result;
    
?>