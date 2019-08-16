<?php     
    include("header.php");
    


    if(!isset($_SESSION["userid"])){
        header("location: ".$GLOBALS["url"]);
    }
    
    $characterId = $_GET["id"];
	
	

    $cAuspices      = new auspices();
    $cBackgrounds   = new backgrounds();
    $cBreeds        = new breeds();
    $cFlaws         = new flaws();
    $cGifts         = new gifts();
    $cMerits        = new merits();
    $cPacks         = new pack();
    $cSkills        = new skills();
    $cTribes        = new tribes();
    $cCharacter     = new character();
    $cUser          = new user();
    $cSharedbackgrounds     = new sharedbackgrounds();
    
    $level = $cUser->AdminCheck();
    
    if($level == 1){
        if(isset($_GET["id"])){
            $aUser = $cUser->GetUserById($_GET["id"]);
            $username   = $aUser["playername"];
            $userid     = $aUser["id"];
        }
    }
        
    $aAuspices      = $cAuspices->GetAllAuspices();
    $aBackgrounds   = $cBackgrounds->GetAllBackgrounds();
    $aBreeds        = $cBreeds->GetAllBreeds();
    $aFlaws         = $cFlaws->GetAllFlaws();
    $aGifts         = $cGifts->GetAllGifts();
    $aMerits        = $cMerits->GetAllMerits();
    $aPacks         = $cPacks->GetAllPacks();
    $aSkills        = $cSkills->GetAllSkills();
    $aTribes        = $cTribes->GetAllTribes();
    $aSharedbackgrounds     = $cSharedbackgrounds->GetAllSharedbackgrounds();
    $aUsers			= $cUser->GetAllUsers();
    
    $aCharacter     = $cCharacter->GetCharacterById($characterId);
    
	if($level != "1"){
        if($_SESSION["userid"] != $aCharacter["user_id"]){
    ?>
    <script>
        window.location.href = "https://www.bluepelt.nl/";
    </script>
    <?php
        }
    }
	
    $aPhysicalFocus     = array();
    $aSocialFocus       = array();
    $aMentalFocus       = array();
    
    if(!empty($aCharacter['physical_focus'])){  $aPhysicalFocus     = unserialize($aCharacter['physical_focus']); }
    if(!empty($aCharacter['social_focus'])){    $aSocialFocus       = unserialize($aCharacter['social_focus']); }
    if(!empty($aCharacter['mental_focus'])){    $aMentalFocus       = unserialize($aCharacter['mental_focus']); }
    
    $sheetGifts     = explode(",", $aCharacter["gifts_id"]);
    $sheetMerits    = explode(",", $aCharacter["merits_id"]);
    $sheetFlaws     = explode(",", $aCharacter["flaws_id"]);
    $aSheetSkills        = unserialize($aCharacter["skills"]);
    $aSheetBackgrounds   = unserialize($aCharacter["backgrounds"]);
    $contactpoints = unserialize($aCharacter["contact_points"]);
    
    $aSheetSharedbackgrounds     = unserialize($aCharacter["shared_backgrounds"]);
?>
</body>
    <div id="main">
        <div class="container">
            <h1>Edit Character</h1>
            <form id="signupform">
	            
                <input name="name" placeholder="Naam" required="required" value="<?php echo $aCharacter["name"]; ?>" /><br />
                <input name="deed_name" placeholder="Deed name" value="<?php echo $aCharacter["deed_name"]; ?>" /><br />
                
                <?php if($level == 1){ ?>
                <select name="pack_name">
                    <option <?php if($aCharacter["pack_name"] == "0"){ echo 'selected="selected"';} ?> value="0">Geen pack</option>
                    <?php 
                        foreach($aPacks as $aPack){
                        ?>
                    <option <?php if($aCharacter["pack_name"] == $aPack["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aPack["id"]; ?>"><?php echo $aPack["name"]; ?></option>    
                    <?php
                        }
                    ?>
                </select><br />
                <?php }else{ ?>
                (Een pack moet door een Narrator aan je character toe worden gevoegd.)<br />
                <?php } ?>
                Kies een breed<br />
                <select name="breed_id"  class="select2">
                <?php
                    foreach($aBreeds as $aBreed){
                ?>
                    <option<?php if($aCharacter["breed_id"] == $aBreed["id"]){echo ' selected="selected"';} ?> value="<?php echo $aBreed["id"] ?>"><?php echo $aBreed["name"] ?></option>
                <?php
                    }
                ?>
                </select><br />
                Kies een Tribe<br />
                <select name="tribe_id" class="select2">
                <?php
                    foreach($aTribes as $aTribe){
                ?>
                    <option<?php if($aCharacter["tribe_id"] == $aTribe["id"]){echo ' selected="selected"';} ?> value="<?php echo $aTribe["id"] ?>"><?php echo $aTribe["tribes"] ?></option>
                <?php
                    }
                ?>
                </select><br />
                Kies een Auspice<br />
                <select name="auspice_id"  class="select2">
                <?php
                    foreach($aAuspices as $aAuspice){
                ?>
                    <option<?php if($aCharacter["auspice_id"] == $aAuspice["id"]){echo ' selected="selected"';} ?> value="<?php echo $aAuspice["id"] ?>"><?php echo $aAuspice["name"] ?></option>
                <?php
                    }
                ?>
                </select><br /><br />
                <h6>Attributes</h6>
                <div class="row">
                    <div class="column col4">                
                        <strong>Physical</strong><br />
                        Aantal punten<br />
                        <select name="physical">
                            <option <?php if($aCharacter["physical"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["physical"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["physical"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["physical"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["physical"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                            <option <?php if($aCharacter["physical"] == 6){echo ' selected="selected"';} ?> value="6">6</option>
                            <option <?php if($aCharacter["physical"] == 7){echo ' selected="selected"';} ?> value="7">7</option>
                            <option <?php if($aCharacter["physical"] == 8){echo ' selected="selected"';} ?> value="8">8</option>
                            <option <?php if($aCharacter["physical"] == 9){echo ' selected="selected"';} ?> value="9">9</option>
                            <option <?php if($aCharacter["physical"] == 10){echo ' selected="selected"';} ?> value="10">10</option>
                            <option <?php if($aCharacter["physical"] == 11){echo ' selected="selected"';} ?> value="11">11</option>
                            <option <?php if($aCharacter["physical"] == 12){echo ' selected="selected"';} ?> value="12">12</option>
                            <option <?php if($aCharacter["physical"] == 13){echo ' selected="selected"';} ?> value="13">13</option>
                            <option <?php if($aCharacter["physical"] == 14){echo ' selected="selected"';} ?> value="14">14</option>
                            <option <?php if($aCharacter["physical"] == 15){echo ' selected="selected"';} ?> value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="physical_bonus">
                            <option <?php if($aCharacter["physical_bonus"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                            <option <?php if($aCharacter["physical_bonus"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["physical_bonus"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["physical_bonus"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["physical_bonus"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["physical_bonus"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                        </select><br />
                        Physical Focus<br />
                        <input name="physical_focus[]" type="hidden" value="5" />
                        <input <?php if(in_array(1, $aPhysicalFocus)){ echo 'checked="checked"';} ?> name="physical_focus[]" type="checkbox" value="1" id="physical_focus1" /><label for="physical_focus1">Strength</label><br />
                        <input <?php if(in_array(2, $aPhysicalFocus)){ echo 'checked="checked"';} ?> name="physical_focus[]" type="checkbox" value="2" id="physical_focus2" /><label for="physical_focus2">Dexterity</label><br />
                        <input <?php if(in_array(3, $aPhysicalFocus)){ echo 'checked="checked"';} ?> name="physical_focus[]" type="checkbox" value="3" id="physical_focus3" /><label for="physical_focus3">Stamina</label><br /><br />
                    </div>
                    <div class="column col4">
                        <strong>Social</strong><br />
                        Aantal punten<br />
                        <select name="social">
                            <option <?php if($aCharacter["social"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["social"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["social"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["social"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["social"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                            <option <?php if($aCharacter["social"] == 6){echo ' selected="selected"';} ?> value="6">6</option>
                            <option <?php if($aCharacter["social"] == 7){echo ' selected="selected"';} ?> value="7">7</option>
                            <option <?php if($aCharacter["social"] == 8){echo ' selected="selected"';} ?> value="8">8</option>
                            <option <?php if($aCharacter["social"] == 9){echo ' selected="selected"';} ?> value="9">9</option>
                            <option <?php if($aCharacter["social"] == 10){echo ' selected="selected"';} ?> value="10">10</option>
                            <option <?php if($aCharacter["social"] == 11){echo ' selected="selected"';} ?> value="11">11</option>
                            <option <?php if($aCharacter["social"] == 12){echo ' selected="selected"';} ?> value="12">12</option>
                            <option <?php if($aCharacter["social"] == 13){echo ' selected="selected"';} ?> value="13">13</option>
                            <option <?php if($aCharacter["social"] == 14){echo ' selected="selected"';} ?> value="14">14</option>
                            <option <?php if($aCharacter["social"] == 15){echo ' selected="selected"';} ?> value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="social_bonus">
                            <option <?php if($aCharacter["social_bonus"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                            <option <?php if($aCharacter["social_bonus"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["social_bonus"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["social_bonus"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["social_bonus"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["social_bonus"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                        </select><br />
                        Social Focus<br />
                        <input name="social_focus[]" type="hidden" value="5" />
                        <input <?php if(in_array(1, $aSocialFocus)){ echo 'checked="checked"';} ?> name="social_focus[]" type="checkbox" value="1" id="social_focus1" /><label for="social_focus1">Charisma</label><br />
                        <input <?php if(in_array(2, $aSocialFocus)){ echo 'checked="checked"';} ?> name="social_focus[]" type="checkbox" value="2" id="social_focus2" /><label for="social_focus2">Manipulation</label><br />
                        <input <?php if(in_array(3, $aSocialFocus)){ echo 'checked="checked"';} ?> name="social_focus[]" type="checkbox" value="3" id="social_focus3" /><label for="social_focus3">Appereance</label><br />
                    </div>
                    <div class="column col4">
                        <strong>Mental</strong><br />
                        Aantal punten<br />
                        <select name="mental">
                            <option <?php if($aCharacter["mental"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["mental"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["mental"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["mental"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["mental"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                            <option <?php if($aCharacter["mental"] == 6){echo ' selected="selected"';} ?> value="6">6</option>
                            <option <?php if($aCharacter["mental"] == 7){echo ' selected="selected"';} ?> value="7">7</option>
                            <option <?php if($aCharacter["mental"] == 8){echo ' selected="selected"';} ?> value="8">8</option>
                            <option <?php if($aCharacter["mental"] == 9){echo ' selected="selected"';} ?> value="9">9</option>
                            <option <?php if($aCharacter["mental"] == 10){echo ' selected="selected"';} ?> value="10">10</option>
                            <option <?php if($aCharacter["mental"] == 11){echo ' selected="selected"';} ?> value="11">11</option>
                            <option <?php if($aCharacter["mental"] == 12){echo ' selected="selected"';} ?> value="12">12</option>
                            <option <?php if($aCharacter["mental"] == 13){echo ' selected="selected"';} ?> value="13">13</option>
                            <option <?php if($aCharacter["mental"] == 14){echo ' selected="selected"';} ?> value="14">14</option>
                            <option <?php if($aCharacter["mental"] == 15){echo ' selected="selected"';} ?> value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="mental_bonus">
                            <option <?php if($aCharacter["mental_bonus"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                            <option <?php if($aCharacter["mental_bonus"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                            <option <?php if($aCharacter["mental_bonus"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                            <option <?php if($aCharacter["mental_bonus"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                            <option <?php if($aCharacter["mental_bonus"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                            <option <?php if($aCharacter["mental_bonus"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                        </select><br />
                        Mental Focus<br />
                        <input name="mental_focus[]" type="hidden" value="5" />
                        <input <?php if(in_array(1, $aMentalFocus)){ echo 'checked="checked"';} ?> name="mental_focus[]" type="checkbox" value="1" id="mental_focus1" /><label for="mental_focus1">Perception</label><br />
                        <input <?php if(in_array(2, $aMentalFocus)){ echo 'checked="checked"';} ?> name="mental_focus[]" type="checkbox" value="2" id="mental_focus2" /><label for="mental_focus2">Intelligence</label><br />
                        <input <?php if(in_array(3, $aMentalFocus)){ echo 'checked="checked"';} ?> name="mental_focus[]" type="checkbox" value="3" id="mental_focus3" /><label for="mental_focus3">Wits</label><br />
                    </div>
                
                    <div class="clear"></div>
                </div>
                <h6>Skills</h6>
                <div id="skills">
                    <?php 
                    $skillCount = "0";
                    foreach($aSheetSkills as $aSheetSkill){
                    ?>
                    
                    <div class="skill">
                        <div class="row">
                            <div class="column col4">
                                <span class="hide-text">Kies je Skill<br /></span>
                                <input type="hidden" name="meta_skill_id<?php echo $skillCount; ?>" value="<?php echo $aSheetSkill["id"]; ?>" />
                                <select class="skill_name select2" name="skill[<?php echo $skillCount; ?>][skill]">
                                    <?php 
                                        foreach($aSkills as $aSkill){
                                        
                                    ?>
                                    <option <?php if($aSheetSkill["skill"] == $aSkill["id"]){echo ' selected="selected"';} ?> value="<?php echo $aSkill["id"] ?>"><?php echo $aSkill["name"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="column col4">
                                <span class="hide-text">Vul eventueel een Skill Specialty in<br /></span>
                                <input value="<?php echo $aSheetSkill["skill_specialty"]; ?>" name="skill[<?php echo $skillCount; ?>][skill_specialty]" class="skill_specialty" placeholder="Skill Specialty" />
                            </div>
                            <div class="column col3">
                                <span class="hide-text">Kies de aantal punten in de Skill<br /></span>
                                <select name="skill[<?php echo $skillCount; ?>][skill_points]" class="skill_points">
                                    <option <?php if($aSheetSkill["skill_points"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 6){echo ' selected="selected"';} ?> value="6">6</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 7){echo ' selected="selected"';} ?> value="7">7</option>
                                    <option <?php if($aSheetSkill["skill_points"] == 8){echo ' selected="selected"';} ?> value="8">8</option>
                                </select>
                                <?php
                                    $skill_rank = "0";
                                   //var_dump($aSheetSkill);
                                    if(isset($aSheetSkill["skill_rank"])){
                                        $skill_rank = $aSheetSkill["skill_rank"];
                                        $skill_rank_switch = "0";
                                        if($skill_rank < 3){
                                            if(isset($aSheetSkill["skill_rank_switch"])){
                                                $skill_rank_switch = $aSheetSkill["skill_rank_switch"];
                                            }
                                            
                                            ?>
                                            <script>
                                                var thisvalue = "0";
                                                $(".skill_points").on("focus", function(){
                                                    thisvalue = $(this).val();
                                                    thisvalue = Number(thisvalue) + 1;
                                                }).change(function(){
                                                    jQuery(".skill_rank_switch").first().val(thisvalue);
                                                })
                                            </script>
                                            <?php
                                        }
                                    }
                                ?>
                                <input type="hidden" name="skill[<?php echo $skillCount; ?>][skill_rank_switch]" class="skill_rank_switch" value="<?php echo $skill_rank_switch; ?>"  />
                                <input type="hidden" name="skill[<?php echo $skillCount; ?>][skill_rank]" class="skill_rank" value="<?php echo $skill_rank; ?>"  />
                            </div>
                            <div class="column col1 deleterow">
                                <a class="remove_skill" title="Verwijder deze Skill"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $skillCount++;
                        } 
                    ?>
                    
                </div>
                <input type="button" id="add_skill" value="Voeg nog een Skill toe" />
                
                <h6>Backgrounds</h6>
                <div id="backgrounds">
                    <?php 
                    $backgroundCount = "0";
                    $rank = "0";
                    foreach($aSheetBackgrounds as $aSheetBackground){
                        if($aSheetBackground["background"] == "9"){
                            $rank = $aSheetBackground["background_points"];
                        }
                    ?>
                    <div class="background">
                        <div class="row">
                            <div class="column col4">
                                <span class="hide-text">Kies je Background<br /></span>
                                <input type="hidden" name="meta_background_id<?php echo $backgroundCount; ?>" value="<?php echo $aSheetBackground["id"]; ?>" />
                                <select class="background_name select2" name="background[<?php echo $backgroundCount; ?>][background]">
                                    <?php 
                                        foreach($aBackgrounds as $aBackground){
                                    ?>
                                    <option <?php if($aSheetBackground["background"] == $aBackground["id"]){echo ' selected="selected"';} ?> value="<?php echo $aBackground["id"] ?>"><?php echo $aBackground["name"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="column col4">
                                <span class="hide-text">Vul eventueel een Background Specialty in<br /></span>
                                <input value="<?php echo $aSheetBackground["background_specialty"]; ?>" name="background[<?php echo $backgroundCount; ?>][background_specialty]" placeholder="background Specialty" />
                            </div>
                            <div class="column col3">
                                <span class="hide-text">Kies de aantal punten<br /></span>
                                <select name="background[<?php echo $backgroundCount; ?>][background_points]" class="background_points">
                                    <option <?php if($aSheetBackground["background_points"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                                    <option <?php if($aSheetBackground["background_points"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                                    <option <?php if($aSheetBackground["background_points"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                                    <option <?php if($aSheetBackground["background_points"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                                    <option <?php if($aSheetBackground["background_points"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                                </select>
                            </div>
                            <div class="column col1 deleterow">
                                <a class="remove_background" title="Verwijder deze Background"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $backgroundCount++;
                        } 
                    ?>
                </div>
                <input type="button" id="add_background" value="Voeg nog een background toe" />
                <h6>Shared Backgrounds</h6>
                <div id="sharedbackgrounds">
                    <span>Allies</span>
                    <select name="sharedbackgrounds[allies]" class="shared_bg_select">
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                        <option <?php if($aSheetSharedbackgrounds["allies"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                    </select>
                    <input type="hidden" name="sharedbackgrounds[allies-advantages]" placeholder="Allies advantages" value="<?php echo $aSheetSharedbackgrounds["allies-advantages"] ?>" />
                    <br />
                    <span>Contacts</span>
                    <select name="sharedbackgrounds[contacts]" class="shared_bg_select">
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                        <option <?php if($aSheetSharedbackgrounds["contacts"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                    </select>
                    <input type="hidden" name="sharedbackgrounds[contacts-advantages]" placeholder="Contacts advantages" value="<?php echo $aSheetSharedbackgrounds["contacts-advantages"] ?>" />
                    <br />
                    <span>Kinfolk</span>
                    <select name="sharedbackgrounds[kinfolk]" class="shared_bg_select">
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                        <option <?php if($aSheetSharedbackgrounds["kinfolk"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                    </select>
                    <input type="hidden" name="sharedbackgrounds[kinfolk-advantages]" placeholder="Kinfolk advantages" value="<?php echo $aSheetSharedbackgrounds["kinfolk-advantages"] ?>" />
                    <br />
                    <span>Territory</span>
                    <select name="sharedbackgrounds[territory]" class="shared_bg_select">
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
                        <option <?php if($aSheetSharedbackgrounds["territory"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
                    </select>
                    <input name="sharedbackgrounds[territory-advantages]" placeholder="Territory advantages" value="<?php echo $aSheetSharedbackgrounds["territory-advantages"] ?>" />
                    <br />
                    <?php
                    /*
                    foreach($aSharedbackgrounds as $aSharedbackground){
                        foreach($aSheetSharedbackgrounds as $aSheetSharedbackground){
                            if($aSharedbackground["name"] == key($aSheetSharedbackground)){
                                ?>
                                <span><?php echo $aSharedbackground["name"]; ?></span>
                                <input name="sharedbackgrounds[<?php echo $aSharedbackground["id"]; ?>][<?php echo $aSharedbackground["name"]; ?>]" value="<?php echo $aSheetSharedbackground[key($aSheetSharedbackground)] ?>" />
                                <?php
                                if($aSharedbackground["name"] == "Territory"){
                                ?>
                                <input name="sharedbackgrounds[<?php echo $aSharedbackground["id"]; ?>][territory-advantages]" placeholder="Territory advantages" value="<?php echo $aSheetSharedbackground["territory-advantages"] ?>" />
                                <?php } ?>
                                <br />
                            <?php 
                            }
                        }
                        ?>
                        
                    <?
                    }
                    */
                    ?>
                    
                </div>
                <h6>Gifts</h6>
                <div id="gifts">
                    <?php 
                        $giftCount = "";
                        foreach($sheetGifts as $sheetGift){
                    ?>
                    <div class="gift">
                        <select name="gifts_id[]" class="select2 giftslist">
                            <?php 
                                foreach($aAuspices as $aAuspice){
                            ?>
                                <optgroup label="<?php echo $aAuspice["name"] ?>">
                                    <?php 
                                    foreach($aGifts as $aGift){
                                    $gift_auspice = unserialize($aGift["gift_auspice"]);
                                    if(!empty($gift_auspice)){
                                        if(in_array($aAuspice["id"], $gift_auspice)){
                                    ?>
                                    <option <?php if($sheetGift == $aGift["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aAuspice["name"] ?>)</option>
                                    <?php 
                                            } 
                                        }
                                        }
                                    ?>
                                </optgroup>
                            <?php
                                    
                                }
                            ?>
                            <?php 
                                foreach($aBreeds as $aBreed){
                            ?>
                                <optgroup label="<?php echo $aBreed["name"] ?>">
                                    <?php 
                                    foreach($aGifts as $aGift){
                                    $gift_breed = unserialize($aGift["gift_breed"]);
                                    if(!empty($gift_breed)){
                                        if(in_array($aBreed["id"], $gift_breed)){
                                    ?>
                                    <option <?php if($sheetGift == $aGift["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aBreed["name"] ?>)</option>
                                    <?php 
                                            } 
                                        }
                                        }
                                    ?>
                                </optgroup>
                            <?php
                                    } 
                                
                            ?>
                            
                            <?php 
                                foreach($aTribes as $aTribe){
                            ?>
                                <optgroup label="<?php echo $aTribe["tribes"] ?>">
                                    <?php 
                                    foreach($aGifts as $aGift){
                                    $gift_tribe = unserialize($aGift["gift_tribe"]);
                                    if(!empty($gift_tribe)){
                                        if(in_array($aTribe["id"], $gift_tribe)){
                                    ?>
                                    <option <?php if($sheetGift == $aGift["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aTribe["tribes"] ?>)</option>
                                    <?php 
                                            } 
                                        }
                                        }
                                    ?>
                                </optgroup>
                            <?php
                                    
                                }
                            ?>
                        </select>
                        <a class="remove_gift" title="Verwijder deze Gift"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                    <?php
                         $giftCount++;
                        }
                    ?>
                </div>
                <input type="button" id="add_gift" value="Voeg nog een Gift toe" />
                <h6>Merits</h6>
                <div id="merits">
                    <?php 
                        $meritCount = "";
                        foreach($sheetMerits as $sheetMerit){ 
                    ?>
                    
                    <div class="merit">
                        <select name="merits_id[]" class="select2 meritslist">
                            <?php 
                                foreach($aTribes as $aTribe){
                                    ?>
                                 <optgroup label="<?php echo $aTribe["tribes"] ?>">
                                 <?php 
                                    foreach($aMerits as $aMerit){
                                        
                                        if($aMerit['merit_tribe'] == $aTribe["id"]){
                                    ?>
                                    <option <?php if($sheetMerit == $aMerit["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. <?php echo $aTribe["tribes"] ?>)</option>
                                    <?php 
                                            } 
                                        
                                        }
                                    ?>
                                 </optgroup>   
                            <?php
                                }
                            ?>
                            <optgroup label="Concordat of Stars">
                            <?php 
                                foreach($aMerits as $aMerit){
                                    if($aMerit['merit_faction'] == 1){
                            ?>
                            <option <?php if($sheetMerit == $aMerit["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. Concordat of Stars)</option>
                            <?php 
                                    } 
                                
                                }
                            ?>
                            </optgroup>
                            <optgroup label="Sanctum of Gaia">
                            <?php 
                                foreach($aMerits as $aMerit){
                                    if($aMerit['merit_faction'] == 2){
                            ?>
                            <option <?php if($sheetMerit == $aMerit["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. Sanctum of Gaia)</option>
                            <?php 
                                    } 
                                
                                }
                            ?>
                            </optgroup>
                            <optgroup label="General Merits">
                            <?php 
                                foreach($aMerits as $aMerit){
                                    if($aMerit['merit_general'] == 1){
                            ?>
                            <option  <?php if($sheetMerit == $aMerit["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. General Merit)</option>
                            <?php 
                                    } 
                                
                                }
                            ?>
                            </optgroup>
                        </select>
                        <a class="remove_merit" title="Verwijder deze Merit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                    <?php
                        $meritCount++;
                        }
                    ?>
                </div>
                <input type="button" id="add_merit" value="Voeg nog een Merit toe" />
                <h6>Flaws</h6>
                <div id="flaws">
                    <?php 
                        $flawCount = "";
                        foreach($sheetFlaws as $sheetFlaw){ 
                    ?>
                    <div class="flaw">
                        <select name="flaws_id[]" class="select2 flawslist">
                            <?php 
                                foreach($aFlaws as $aFlaw){
                            ?>
                            <option  <?php if($sheetFlaw == $aFlaw["id"]){ echo 'selected="selected"';} ?> value="<?php echo $aFlaw["id"] ?>"><?php echo $aFlaw["name"] ?> (<?php echo $aFlaw["xp"] ?> xp.)</option>
                            <?php 
                                }
                            ?>
                        </select>
                        <a class="remove_flaw" title="Verwijder deze Flaw"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                    <?php
                        $flawCount++;
                        }
                    ?>
                </div>
				<input type="button" id="add_flaw" value="Voeg nog een Flaw toe" /><br />
				<h6>Wyrm Taint</h6>
                Physical<br />
				<select name="wyrmtaint">
					<option <?php if($aCharacter["wyrmtaint"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
					<option <?php if($aCharacter["wyrmtaint"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
					<option <?php if($aCharacter["wyrmtaint"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
					<option <?php if($aCharacter["wyrmtaint"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
					<option <?php if($aCharacter["wyrmtaint"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
					<option <?php if($aCharacter["wyrmtaint"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
				</select><br />
                Mental<br />
				<select name="wyrmtaint_mental">
					<option <?php if($aCharacter["wyrmtaint_mental"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
					<option <?php if($aCharacter["wyrmtaint_mental"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
					<option <?php if($aCharacter["wyrmtaint_mental"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
					<option <?php if($aCharacter["wyrmtaint_mental"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
					<option <?php if($aCharacter["wyrmtaint_mental"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
					<option <?php if($aCharacter["wyrmtaint_mental"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
				</select><br />
				<h6>Harano</h6>
				<select name="harano">
					<option <?php if($aCharacter["harano"] == 0){echo ' selected="selected"';} ?> value="0">0</option>
					<option <?php if($aCharacter["harano"] == 1){echo ' selected="selected"';} ?> value="1">1</option>
					<option <?php if($aCharacter["harano"] == 2){echo ' selected="selected"';} ?> value="2">2</option>
					<option <?php if($aCharacter["harano"] == 3){echo ' selected="selected"';} ?> value="3">3</option>
					<option <?php if($aCharacter["harano"] == 4){echo ' selected="selected"';} ?> value="4">4</option>
					<option <?php if($aCharacter["harano"] == 5){echo ' selected="selected"';} ?> value="5">5</option>
				</select><br />
                
                <input name="character_id" type="hidden" value="<?php echo $aCharacter["id"]; ?>" />
                <input name="user_id" type="hidden" value="<?php echo $aCharacter["user_id"]; ?>" />
                <?php if($level == 1){ ?>
                <input name="xf" type="hidden" value="admineditcharacter" /><br />
                <?php }else{ ?>
                <input name="xf" type="hidden" value="editcharacter" /><br />
                <?php } ?>
                <h6>Contacts</h6>
                <textarea name="contact_info" placeholder="Hier komen de omschrijvingen van je Contacts die je hebt"><?php echo $aCharacter["contact_info"] ?></textarea>
                <h6>Extra informatie</h6>
                <textarea name="extra_info" placeholder="Extra informatie zoals fetishes of dergelijke"><?php echo $aCharacter["extra_info"] ?></textarea>
                <h6>Background</h6>
                <textarea name="character_background" placeholder="Plaats hier je eventuele background"><?php echo $aCharacter["character_background"] ?></textarea><br />
                <?php if($level == 1){ ?>
                <h6>Narrator Snippet</h6>
                <textarea name="narrator_snippet" placeholder="Plaats hier je eventuele background"><?php echo $aCharacter["narrator_snippet"] ?></textarea><br />
                <h6>Geselecteerde contacts</h6>
                <div class="contact_nar">
	                <strong>Finance</strong>
	                <select name="contact_points[0][finance]">
		                <option <?php if($contactpoints[0]["finance"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["finance"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["finance"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Industry</strong>
	                <select name="contact_points[0][industry]">
		                <option <?php if($contactpoints[0]["industry"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["industry"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["industry"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Media</strong>
	                <select name="contact_points[0][media]">
		                <option <?php if($contactpoints[0]["media"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["media"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["media"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Medical</strong>
	                <select name="contact_points[0][medical]">
		                <option <?php if($contactpoints[0]["medical"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["medical"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["medical"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Occult</strong>
	                <select name="contact_points[0][occult]">
		                <option <?php if($contactpoints[0]["occult"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["occult"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["occult"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Police</strong>
	                <select name="contact_points[0][police]">
		                <option <?php if($contactpoints[0]["police"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["police"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["police"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Politics</strong>
	                <select name="contact_points[0][politics]">
		                <option <?php if($contactpoints[0]["politics"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["politics"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["politics"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Street</strong>
	                <select name="contact_points[0][street]">
		                <option <?php if($contactpoints[0]["street"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["street"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["street"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>Underworld</strong>
	                <select name="contact_points[0][underworld]">
		                <option <?php if($contactpoints[0]["underworld"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["underworld"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["underworld"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
	                <strong>University</strong>
	                <select name="contact_points[0][university]">
		                <option <?php if($contactpoints[0]["university"] == "0"){ echo 'selected="selected"';} ?> value="0">0</option>
		                <option <?php if($contactpoints[0]["university"] == "1"){ echo 'selected="selected"';} ?> value="1">1</option>
		                <option <?php if($contactpoints[0]["university"] == "2"){ echo 'selected="selected"';} ?> value="2">2</option>
	                </select><br />
                </div>
                <br /><br /><h6>XP Offset</h6>
				<input value="<?php echo $aCharacter["xp"] ?>" name="xp" />
                <?php } ?>
                
                <?php if($level == 1){ ?>
                <br />Verander eigenaar character<br />
		        <select name="user_id">
			        <?php
				    foreach($aUsers as $aUserp){
					    ?>
					<option value="<?php echo $aUserp["id"] ?>" <?php if($aCharacter["user_id"] == $aUserp["id"]){ echo 'selected="selected"';} ?>><?php echo $aUserp["playername"] ?></option>   
					<?php
				    }    
				    ?>
		        </select><br />&nbsp;<br />
		        <?php } ?>
                
                
                <input type="submit" value="Character wijzigen" />
            </form>
            <div class="signupresult success">
                <p>
                    <?php if($level == 1){ ?>
                    De wijzigingen zijn doorgevoerd.
                    <?php }else{ ?>
                    De wijziging is gemeld. Wacht tot een narrator het heeft goedgekeurd.
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
<script>
	$('#signupform').on('submit', function (e) {
        e.preventDefault();
	    $.ajax({
	        url: 'xf.php',
	        type:'POST',
	        data: $('#signupform').serialize(),
	        success: function(response)
	        {
                console.log(response);
                if(response == "success"){
                    $("#signupform").slideToggle();
                    $(".success").slideToggle();
                    setTimeout(function(){
						window.location.replace("http://www.bluepelt.nl/character.php?id=<?php echo $characterId?>");
					}, 2000);
                }

	        }               
	    });
	});
</script>

<script src="<?php echo $GLOBALS["url"] ?>includes/js/create_character.php?skillcount=<?php echo $skillCount; ?>&backgroundcount=<?php echo $backgroundCount; ?>&giftcount=<?php echo $giftCount; ?>&meritcount=<?php echo $meritCount; ?>&flawcount=<?php echo $flawCount; ?>&rank=<?php echo $rank; ?>" type='text/javascript'></script>
</body>
</html>