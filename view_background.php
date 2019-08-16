<?php 
    include("header.php");
    
//die("a");
    $cBackgrounds           = new backgrounds();  
    $cCharacters            = new character();
    $cUser                  = new user();

    
    $character_id = $_GET["id"];
    
    
    
    $edited = $cCharacters->CheckForEdit($character_id);
    
    $level = $cUser->AdminCheck();
    
    if($level == 1){
        if(isset($_GET["id"])){
            $aUser = $cUser->GetUserById($_GET["id"]);
            $username   = $aUser["playername"];
            $userid     = $aUser["id"];
        }
    }  
   
    $aCharacter         = $cCharacters->GetCharacterById($character_id);
        
    if($level != "1"){
        if($_SESSION["userid"] != $aCharacter["user_id"]){
    ?>
    <script>
        window.location.href = "https://www.bluepelt.nl/";
    </script>
    <?php
        }
    }
    //var_dump($aCharacter);
    $aBackgrounds           		= unserialize($aCharacter["backgrounds"]);
    //var_dump($aBackgrounds);
?>
</body>
<div id="main">
    <div class="container">
	    
        <h1>Backgrounds van <?php echo $aCharacter["name"]; if(!empty($aCharacter["deed_name"])){ echo " - ".$aCharacter["deed_name"];} ?></h1>

        <?php foreach($aBackgrounds as $aBackground){
	        $aBackground = $cBackgrounds->GetBackgroundById($aBackground["background"]);
            //var_dump($aBackground);
	        if(!empty($aBackground["info"])){
		 ?>
		 <div class="giftinfo" id="<?php echo $aBackground["id"] ?>">
			 <h6>
				 <?php echo $aBackground["name"] ?>
			 </h6>
			 <div>
				 <strong>Info</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aBackground["info"]) ?>
			 </div>
		 </div><br /><br />
		 <?php
	        }
        } ?>
    </div>
</div>
</html>