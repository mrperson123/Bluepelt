<?php 
    include("header.php");
    
//die("a");
    $cGifts                 = new gifts();  
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
    $aGifts = explode(",", $aCharacter["gifts_id"]);
    //var_dump($aGifts);
?>
</body>
<div id="main">
    <div class="container">
	    
        <h1>Gifts van <?php echo $aCharacter["name"]; if(!empty($aCharacter["deed_name"])){ echo " - ".$aCharacter["deed_name"];} ?></h1>
        <h2>Gifts</h2>
        <?php foreach($aGifts as $Gift){
	        $aGift = $cGifts->GetGiftById($Gift);
	        if(!empty($aGift["info"])){
		 ?>
		 <div class="giftinfo" id="<?php echo $aGift["id"] ?>">
			 <h6>
				 <?php echo $aGift["name"] ?>
			 </h6>
			 <div>
				 <strong>Info</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aGift["info"]) ?>
			 </div>
			 <div>
				 <strong>Testpool</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aGift["testpool"]) ?>
			 </div>
			 <div>
				 <strong>Focus</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aGift["focus"]) ?>
			 </div>
		 </div><br /><br />
		 <?php
	        }
        } ?>
    </div>
</div>
</html>