<?php     
    include("header.php");

    if(!isset($_SESSION["userid"])){
        header("location: ".$GLOBALS["url"]);
    }

    $cAuspices              = new auspices();
    $cBackgrounds           = new backgrounds();
    $cBreeds                = new breeds();
    $cFlaws                 = new flaws();
    $cGifts                 = new gifts();
    $cMerits                = new merits();
    $cPacks                 = new pack();
    $cSkills                = new skills();
    $cTribes                = new tribes();
    $cSharedbackgrounds     = new sharedbackgrounds();
    
    $aAuspices              = $cAuspices->GetAllAuspices();
    $aBackgrounds           = $cBackgrounds->GetAllBackgrounds();
    $aBreeds                = $cBreeds->GetAllBreeds();
    $aFlaws                 = $cFlaws->GetAllFlaws();
    $aGifts                 = $cGifts->GetAllGifts();
    $aMerits                = $cMerits->GetAllMerits();
    $aPacks                 = $cPacks->GetAllPacks();
    $aSkills                = $cSkills->GetAllSkills();
    $aTribes                = $cTribes->GetAllTribes();
    $aSharedbackgrounds     = $cSharedbackgrounds->GetAllSharedbackgrounds();
    
    
?>
</body>
    <div id="main">
        <div class="container">
            <h1>Character Creation</h1>
            <form id="signupform">
                <input name="name" placeholder="Naam" required="required" /><br />
                <input name="deed_name" placeholder="Deed name" /><br />
                (Een pack moet door een Narrator aan je character toe worden gevoegd.)<br />
                Kies een breed<br />
                <select name="breed_id"  class="select2">
                <?php
                    foreach($aBreeds as $aBreed){
                ?>
                    <option value="<?php echo $aBreed["id"] ?>"><?php echo $aBreed["name"] ?></option>
                <?php
                    }
                ?>
                </select><br />
                Kies een Tribe<br />
                <select name="tribe_id" class="select2">
                <?php
                    foreach($aTribes as $aTribe){
                ?>
                    <option value="<?php echo $aTribe["id"] ?>"><?php echo $aTribe["tribes"] ?></option>
                <?php
                    }
                ?>
                </select><br />
                Kies een Auspice<br />
                <select name="auspice_id"  class="select2">
                <?php
                    foreach($aAuspices as $aAuspice){
                ?>
                    <option value="<?php echo $aAuspice["id"] ?>"><?php echo $aAuspice["name"] ?></option>
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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="physical_bonus">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br />
                        Physical Focus<br />
                        <input name="physical_focus[]" type="hidden" value="5" />
                        <input name="physical_focus[]" type="checkbox" value="1" id="physical_focus1" /><label for="physical_focus1">Strength</label><br />
                        <input name="physical_focus[]" type="checkbox" value="2" id="physical_focus2" /><label for="physical_focus2">Dexterity</label><br />
                        <input name="physical_focus[]" type="checkbox" value="3" id="physical_focus3" /><label for="physical_focus3">Stamina</label><br /><br />
                    </div>
                    <div class="column col4">
                        <strong>Social</strong><br />
                        Aantal punten<br />
                        <select name="social">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="social_bonus">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br />
                        Social Focus<br />
                        <input name="social_focus[]" type="hidden" value="5" />
                        <input name="social_focus[]" type="checkbox" value="1" id="social_focus1" /><label for="social_focus1">Charisma</label><br />
                        <input name="social_focus[]" type="checkbox" value="2" id="social_focus2" /><label for="social_focus2">Manipulation</label><br />
                        <input name="social_focus[]" type="checkbox" value="3" id="social_focus3" /><label for="social_focus3">Appereance</label><br />
                    </div>
                    <div class="column col4">
                        <strong>Mental</strong><br />
                        Aantal punten<br />
                        <select name="mental">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select><br />
                        Bonus punten<br />
                        <select name="mental_bonus">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br />
                        Mental Focus<br />
                        <input name="mental_focus[]" type="hidden" value="5" />
                        <input name="mental_focus[]" type="checkbox" value="1" id="mental_focus1" /><label for="mental_focus1">Perception</label><br />
                        <input name="mental_focus[]" type="checkbox" value="2" id="mental_focus2" /><label for="mental_focus2">Intelligence</label><br />
                        <input name="mental_focus[]" type="checkbox" value="3" id="mental_focus3" /><label for="mental_focus3">Wits</label><br />
                    </div>
                
                    <div class="clear"></div>
                </div>
                <h6>Skills</h6>
                <div id="skills">
                    <div class="skill">
                        <div class="row">
                            <div class="column col4">
                                <span class="hide-text">Kies je Skill<br /></span>
                                <select class="skill_name select2" name="skill[0][skill]">
                                    <?php 
                                        foreach($aSkills as $aSkill){
                                    ?>
                                    <option value="<?php echo $aSkill["id"] ?>"><?php echo $aSkill["name"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="column col4">
                                <span class="hide-text">Vul eventueel een Skill Specialty in<br /></span>
                                <input name="skill[0][skill_specialty]" class="skill_specialty" placeholder="Skill Specialty" />
                            </div>
                            <div class="column col3">
                                <span class="hide-text">Kies de aantal punten in de Skill<br /></span>
                                <select name="skill[0][skill_points]" class="skill_points">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="column col1 deleterow">
                                <a class="remove_skill" title="Verwijder deze Skill"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <input type="button" id="add_skill" value="Voeg nog een Skill toe" />
                
                <h6>Backgrounds</h6>
                <div id="backgrounds">
                    <div class="background">
                        <div class="row">
                            <div class="column col4">
                                <span class="hide-text">Kies je Background<br /></span>
                                <select class="background_name select2" name="background[0][background]">
                                    <?php 
                                        foreach($aBackgrounds as $aBackground){
                                    ?>
                                    <option value="<?php echo $aBackground["id"] ?>"><?php echo $aBackground["name"] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="column col4">
                                <span class="hide-text">Vul eventueel een Background Specialty in<br /></span>
                                <input name="background[0][background_specialty]" placeholder="background Specialty" />
                            </div>
                            <div class="column col3">
                                <span class="hide-text">Kies de aantal punten<br /></span>
                                <select name="background[0][background_points]" class="background_points">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="column col1 deleterow">
                                <a class="remove_background" title="Verwijder deze Background"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <input type="button" id="add_background" value="Voeg nog een background toe" />
                <h6>Shared Backgrounds</h6>
                <div id="sharedbackgrounds">
                    <?php 
                    foreach($aSharedbackgrounds as $aSharedbackground){
                        ?>
                        <span><?php echo $aSharedbackground["name"]; ?></span>
                        <input name="sharedbackgrounds[<?php echo $aSharedbackground["id"]; ?>][<?php echo $aSharedbackground["name"]; ?>]" value="" />
                        <?php
                            if($aSharedbackground["name"] == "Territory"){
                        ?>
                        <input name="sharedbackgrounds[<?php echo $aSharedbackground["id"]; ?>][territory-advantages]" placeholder="Territory advantages" />
                        <?php } ?>
                        <br />
                    <?
                    }
                    ?>
                </div>
                <h6>Gifts</h6>
                <div id="gifts">
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
                                    <option value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aAuspice["name"] ?>)</option>
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
                                    <option value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aBreed["name"] ?>)</option>
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
                                    <option value="<?php echo $aGift["id"] ?>"><?php echo $aGift["name"] ?> (<?php echo $aGift["level"] ?>. <?php echo $aTribe["tribes"] ?>)</option>
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
                </div>
                <input type="button" id="add_gift" value="Voeg nog een Gift toe" />
                <h6>Merits</h6>
                <div id="merits">
                    <div class="merit">
                        <select name="merits_id[]" class="select2 meritslist">
                            <optgroup label="General Merits">
                            <?php 
                                foreach($aMerits as $aMerit){
                                    if($aMerit['merit_general'] == 1){
                            ?>
                            <option value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. General Merit)</option>
                            <?php 
                                    } 
                                
                                }
                            ?>
                            </optgroup>
                            <?php 
                                foreach($aTribes as $aTribe){
                                    ?>
                                 <optgroup label="<?php echo $aTribe["tribes"] ?>">
                                 <?php 
                                    foreach($aMerits as $aMerit){
                                        
                                        if($aMerit['merit_tribe'] == $aTribe["id"]){
                                    ?>
                                    <option value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. <?php echo $aTribe["tribes"] ?>)</option>
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
                            <option value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. Concordat of Stars)</option>
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
                            <option value="<?php echo $aMerit["id"] ?>"><?php echo $aMerit["name"] ?> (<?php echo $aMerit["xp"] ?> xp. Sanctum of Gaia)</option>
                            <?php 
                                    } 
                                
                                }
                            ?>
                            </optgroup>
                            
                        </select>
                        <a class="remove_merit" title="Verwijder deze Merit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
                <input type="button" id="add_merit" value="Voeg nog een Merit toe" />
                <h6>Flaws</h6>
                <div id="flaws">
                    <div class="flaw">
                        <select name="flaws_id[]" class="select2 flawslist">
                            <?php 
                                foreach($aFlaws as $aFlaw){
                            ?>
                            <option value="<?php echo $aFlaw["id"] ?>"><?php echo $aFlaw["name"] ?> (<?php echo $aFlaw["xp"] ?> xp.)</option>
                            <?php 
                                }
                            ?>
                        </select>
                        <a class="remove_flaw" title="Verwijder deze Flaw"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
                <input type="button" id="add_flaw" value="Voeg nog een Flaw toe" />
                <input name="user_id" type="hidden" value="<?php echo $_SESSION['userid']  ?>" />
                <input name="xf" type="hidden" value="addcharacter" /><br />
                <h6>Contacts</h6>
                <textarea name="contact_info" placeholder="Hier komen de omschrijvingen van je Contacts die je hebt"></textarea>
                <h6>Extra informatie</h6>
                <textarea name="extra_info" placeholder="Extra informatie zoals fetishes of dergelijke"></textarea>
                <h6>Background</h6>
                <textarea name="character_background" placeholder="Plaats hier je eventuele background"></textarea><br />
                <input type="submit" value="Character opslaan" />
            </form>
            <div class="signupresult success">
                <p>
                    Je character is aangemaakt.
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
                }

	        }               
	    });
	});
</script>
<script src="<?php echo $GLOBALS["url"] ?>includes/js/create_character.php"></script>
</body>
</html>