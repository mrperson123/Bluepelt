<?php 
    include("header.php");
//die("a");
    $cMerits                = new merits();
    $cFlaws                 = new flaws();  
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
    $aMerits    = explode(",", $aCharacter["merits_id"]);
    $aFlaws     = explode(",", $aCharacter["flaws_id"]);
?>
</body>
<div id="main">
    <div class="container">
	    
        <h1>Merits & flaws van <?php echo $aCharacter["name"]; if(!empty($aCharacter["deed_name"])){ echo " - ".$aCharacter["deed_name"];} ?></h1>
        <h1>Merits</h1>
        <?php foreach($aMerits as $aMerit){
	        $aMeritRes = $cMerits->GetMeritById($aMerit);
            //var_dump($aMeritRes);
	        if(!empty($aMeritRes["info"])){
		 ?>
		 <div class="giftinfo" id="<?php echo $aMeritRes["id"] ?>">
			 <h6>
				 <?php echo $aMeritRes["name"] ?>
			 </h6>
			 <div>
				 <strong>Info</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aMeritRes["info"]) ?>
			 </div>
		 </div><br /><br />
		 <?php
	        }
        } ?>
        <h1>Flaws</h1>
        <?php foreach($aFlaws as $aFlaw){
	        $aFlawRes = $cFlaws->GetFlawById($aFlaw);
            //var_dump($aMeritRes);
	        if(!empty($aFlawRes["info"])){
		 ?>
		 <div class="giftinfo" id="<?php echo $aFlawRes["id"] ?>">
			 <h6>
				 <?php echo $aFlawRes["name"] ?>
			 </h6>
			 <div>
				 <strong>Info</strong><br />
				 <?php echo str_replace(PHP_EOL,"<br>",$aFlawRes["info"]) ?>
			 </div>
		 </div><br /><br />
		 <?php
	        }
        } ?>
    </div>
</div>
</html>