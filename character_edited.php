<?php 
    include("header.php");
    
    $cAuspices      = new auspices();
    $cBackgrounds   = new backgrounds();
    $cCharacters    = new character();
    $cBreeds        = new breeds();
    $cFlaws         = new flaws();
    $cGifts         = new gifts();
    $cMerits        = new merits();
    $cSkills        = new skills();
    $cTribes        = new tribes();
    $cUser          = new user();
    
    $aAuspices      = $cAuspices->GetAllAuspices();
    $aBackgrounds   = $cBackgrounds->GetAllBackgrounds();
    $aBreeds        = $cBreeds->GetAllBreeds();
    $aFlaws         = $cFlaws->GetAllFlaws();
    $aGifts         = $cGifts->GetAllGifts();
    $aMerits        = $cMerits->GetAllMerits();
    $aSkills        = $cSkills->GetAllSkills();
    $aTribes        = $cTribes->GetAllTribes();
    
    $level = $cUser->AdminCheck();
    
    $character_edited_id = $_GET["id"];
    
    $edited = $cCharacters->GetEditedById($character_edited_id);

    $character_id = $edited["character_id"];    
    
    if($level == 1){
        if(isset($_GET["id"])){
            $aUser = $cUser->GetUserById($_GET["id"]);
            $username   = $aUser["playername"];
            $userid     = $aUser["id"];
        }
    }
    
    $aCharacter      = $cCharacters->GetCharacterById($character_id);
    $aEditCharacter  = $cCharacters->GetEditedById($character_edited_id);
    
    if($level != "1"){
        if($_SESSION["userid"] != $aCharacter["user_id"]){
            header("location: ".$GLOBALS["url"]);
        }
    }
    
    $aTribe     = $cTribes->GetTribeById($aCharacter["tribe_id"]);
    $aBreed     = $cBreeds->GetBreedById($aCharacter["breed_id"]);
    $aAuspice   = $cAuspices->GetAuspiceById($aCharacter["auspice_id"]);
    
    $aPhysicalFocus     = array();
    $aSocialFocus       = array();
    $aMentalFocus       = array();
    
    if(!empty($aCharacter['physical_focus'])){  $aPhysicalFocus     = unserialize($aCharacter['physical_focus']); }
    if(!empty($aCharacter['social_focus'])){    $aSocialFocus       = unserialize($aCharacter['social_focus']); }
    if(!empty($aCharacter['mental_focus'])){    $aMentalFocus       = unserialize($aCharacter['mental_focus']); }
    $aSkills        = unserialize($aCharacter["skills"]);
    $aBackgrounds   = unserialize($aCharacter["backgrounds"]);
    $aSheetSharedbackgrounds     = unserialize($aCharacter["shared_backgrounds"]);
    
    if(!empty($aEditCharacter['physical_focus'])){  $aEditPhysicalFocus     = unserialize($aEditCharacter['physical_focus']); }
    if(!empty($aEditCharacter['social_focus'])){    $aEditSocialFocus       = unserialize($aEditCharacter['social_focus']); }
    if(!empty($aEditCharacter['mental_focus'])){    $aEditMentalFocus       = unserialize($aEditCharacter['mental_focus']); }
    $aEditSkills        = unserialize($aEditCharacter["skills"]);
    $aEditBackgrounds   = unserialize($aEditCharacter["backgrounds"]);
    $aEditSheetSharedbackgrounds     = unserialize($aEditCharacter["shared_backgrounds"]);
    
?>
</body>
<div id="main">
    <div class="container">
        <div class="row">
            <div class="column col5">
            
                <h1><?php echo $aCharacter["name"]; if(!empty($aCharacter["deed_name"])){ echo " - ".$aCharacter["deed_name"];} ?></h1>
                <div id="sheet-topinfo" class="sheet-part">
                    <span class="sheet-topinfo"><strong>Tribe: </strong><?php echo $aTribe["tribes"]; ?></span>
                    <span class="sheet-topinfo"><strong>Breed: </strong><?php echo $aBreed["name"] ?></span><br />
                    <span class="sheet-topinfo"><strong>Auspice: </strong> <?php echo $aAuspice["name"]; ?></span>
                </div>
                <div id="sheet-attributes" class="sheet-part">
                    <h6>Attributes</h6>
                    <div class="row">
                        <div class="">
                            <strong>Physical</strong>
                            <div class="attributes-dots">
                                <?php 
                                $i = 1;
                                $bonusDots = 10 + $aCharacter["physical_bonus"];
                                while($i <= $aCharacter["physical"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aCharacter["physical_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Strength</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Dexterity</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Stamina</span>
                            </div>
                        </div>
                        <div class="">
                            <strong>Social</strong>
                            <div class="attributes-dots">
                                <?php 
                                $bonusDots = 10 + $aCharacter["social_bonus"];
                                $i = 1;
                                while($i <= $aCharacter["social"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aCharacter["social_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Charisma</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Manipulation</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Appearance</span>
                            </div>
                        </div>
                        <div class="">
                            <strong>Mental</strong>
                            <div class="attributes-dots">
                                <?php 
                                $i = 1;
                                $bonusDots = 10 + $aCharacter["mental_bonus"];
                                while($i <= $aCharacter["mental"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aCharacter["mental_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Perception</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Intelligence</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Wits</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div id="sheet-background-merits-skills" class="sheet-part">
                    <div class="row">
                        <div class="">
                            <h6>Skills</h6>
                            <div>
                            <?php 
                            foreach($aSkills as $aSkill){
                                $Skill = $cSkills->GetSkillById($aSkill["skill"]);
                                ?>
                                <div class="sheet-skill">
                                    <span class="sheet-skill-name">
                                        <?php echo $Skill["name"]; ?>
                                        <?php 
                                            if(!empty($aSkill["skill_specialty"])){
                                            ?>
                                                <span class="sheet-skill-specialty">(<?php echo $aSkill["skill_specialty"]; ?>)</span>
                                            <?php
                                            }
                                        ?>
                                    </span>
                                    <?php 
                                        $i = 1;
                                        while($i <= $aSkill["skill_points"]){
                                            echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                            $i++;
                                        }
                                        
                                        while($i <= 8){
                                            echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                            $i++;
                                        }
                                        ?>
                                </div>
                                <?
                                }   
                            ?>
                        </div>
                        </div>
                        
                        <div class="">
                            <h6>Backgrounds</h6>
                            <div>
                                <?php 
                                foreach($aBackgrounds as $aBackground){
                                    $background = $cBackgrounds->GetBackgroundById($aBackground["background"]);
                                    ?>
                                    <div class="sheet-background">
                                        <span class="sheet-background-name">
                                            <?php echo $background["name"]; ?>
                                            <?php 
                                                if(!empty($aBackground["background_specialty"])){
                                                ?>
                                                    <span class="sheet-background-specialty">(<?php echo $aBackground["background_specialty"]; ?>)</span>
                                                <?php
                                                }
                                            ?>
                                        </span>
                                        <?php 
                                            $i = 1;
                                            while($i <= $aBackground["background_points"]){
                                                echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                                $i++;
                                            }
                                            
                                            while($i <= 5){
                                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                                $i++;
                                            }
                                            ?>
                                    </div>
                                    <?
                                    }
                                ?>
                            </div><br />
                            <h6>Shared Backgrounds</h6>
                            <div id="sharedbackgrounds">
                            <span>Allies</span><?php echo $aSheetSharedbackgrounds["allies"] ?><br />
                            <span>Contacts</span><?php echo $aSheetSharedbackgrounds["contacts"] ?><br />
                            <span>Kinfolk</span><?php echo $aSheetSharedbackgrounds["kinfolk"] ?><br />
                            <span>Territory</span><?php echo $aSheetSharedbackgrounds["territory"] ?><br />
                            <span>Territory advantages</span><?php echo $aSheetSharedbackgrounds["territory-advantages"] ?><br />
                            </div>
                        </div>
                        <div class="">
                            <h6>Merits</h6>
                            <div id="sheet-merits">
                                <?php 
                                    $aSheetMerits = explode(',', $aCharacter["merits_id"]);
                                    foreach($aSheetMerits as $aSheetMerit){
                                        $aMerit = $cMerits->GetMeritById($aSheetMerit);
                                    ?>
                                    <div class="sheet-merit">
                                        <span class="sheet-merit-name"><?php echo $aMerit["name"]; ?></span><?php echo $aMerit["xp"]; ?> xp
                                    </div>
                                    <?php
                                        
                                    }
                                ?>
                            </div>
                            <h6>Flaws</h6>
                            <div id="sheet-flaws">
                                <?php 
                                    $aSheetFlaws = explode(',', $aCharacter["flaws_id"]);
                                    foreach($aSheetFlaws as $aSheetFlaw){
                                        $aFlaw = $cFlaws->GetFlawById($aSheetFlaw);
                                    ?>
                                    <div class="sheet-flaw">
                                        <span class="sheet-flaw-name"><?php echo $aFlaw["name"]; ?></span><?php echo $aFlaw["xp"]; ?> xp
                                    </div>
                                    <?php
                                        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sheet-gifts" class="sheet-part">
                    <h6>Gifts</h6>
                    <?php 
                        $aSheetgifts = explode(',', $aCharacter["gifts_id"]);
                        foreach($aSheetgifts as $aSheetgift){
                            $aGift = $cGifts->GetgiftById($aSheetgift);
                        ?>
                        <div class="sheet-gift">
                            <span class="sheet-gift-name"><?php echo $aGift["name"]; ?></span> <?php echo $aGift["level"]; ?>
                        </div>
                        <?php
                            
                        }
                    ?>
                </div>
                <div>
                <h6>Wyrm Taint</h6>
                <div id="sheet-wyrmtaint" class="sheet-part">
                    Physical<br />
                    <?php 
                        $i = 1;
                        while($i <= $aCharacter["wyrmtaint"]){
                            echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                            $i++;
                        }
                        
                        while($i <= 5){
                            echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                            $i++;
                        }
                    ?><br />
                    Mental<br />
                    <?php 
                        $i = 1;
                        while($i <= $aCharacter["wyrmtaint_mental"]){
                            echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                            $i++;
                        }
                        
                        while($i <= 5){
                            echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                            $i++;
                        }
                    ?>
                </div>
                <h6>Harano</h6>
                <div id="sheet-wyrmtaint" class="sheet-part">
                    <?php 
                        $i = 1;
                        while($i <= $aCharacter["harano"]){
                            echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                            $i++;
                        }
                        
                        while($i <= 5){
                            echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                            $i++;
                        }
                    ?>
                </div>
            <?php if(!empty($aCharacter["extra_info"])){ ?>
	        <h6>Extra informatie</h6>
            <p>
                <?php echo nl2br($aCharacter["extra_info"]); ?>
            </p>
            <?php } ?>
            <?php if(!empty($aCharacter["contact_info"])){ ?>
            <h6>Contacts</h6>
            <p>
                <?php echo nl2br($aCharacter["contact_info"]); ?>
            </p>
            <?php } ?>
            <?php if(!empty($aCharacter["character_background"])){ ?>
            <h6>Character Background</h6>
            <p>
                <?php echo nl2br($aCharacter["character_background"]); ?>
            </p>
            <?php } ?>
        </div>
        
        </div>
            <div class="column col2">
            </div>
            <div class="column col5">
            <h1>&nbsp;</h1>
            <div id="sheet-topinfo" class="sheet-part">

                    <span class="sheet-topinfo"><strong>Tribe: </strong><?php echo $aTribe["tribes"]; ?></span>
                    <span class="sheet-topinfo"><strong>Breed: </strong><?php echo $aBreed["name"] ?></span><br />
                    <span class="sheet-topinfo"><strong>Auspice: </strong> <?php echo $aAuspice["name"]; ?></span>
                </div>
                <div id="sheet-attributes" class="sheet-part">
                    <h6>Attributes</h6>
                    <div class="row">
                        <div class="">
                            <strong>Physical</strong>
                            <div class="attributes-dots">
                                <?php 
                                $i = 1;
                                $bonusDots = 10 + $aEditCharacter["physical_bonus"];
                                while($i <= $aEditCharacter["physical"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aEditCharacter["physical_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Strength</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Dexterity</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aPhysicalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Stamina</span>
                            </div>
                        </div>
                        <div class="">
                            <strong>Social</strong>
                            <div class="attributes-dots">
                                <?php 
                                $bonusDots = 10 + $aEditCharacter["social_bonus"];
                                $i = 1;
                                while($i <= $aEditCharacter["social"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aEditCharacter["social_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Charisma</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Manipulation</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aSocialFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Appearance</span>
                            </div>
                        </div>
                        <div class="">
                            <strong>Mental</strong>
                            <div class="attributes-dots">
                                <?php 
                                $i = 1;
                                $bonusDots = 10 + $aEditCharacter["mental_bonus"];
                                while($i <= $aEditCharacter["mental"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                
                                while($i <= $bonusDots){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    if($i == 5){
                                        echo " ";
                                    }
                                    if($i == 10){
                                        echo " ";
                                    }
                                    $i++;
                                }
                                ?><br />
                                Bonus 
                                <?php 
                                $i = 1;
                                while($i <= $aEditCharacter["mental_bonus"]){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                    $i++;
                                }
                                
                                while($i <= 5){
                                    echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="attribute-focus">
                                <span class="attribute-focus-text"><?php if(in_array(1, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Perception</span>
                                <span class="attribute-focus-text"><?php if(in_array(2, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Intelligence</span>
                                <span class="attribute-focus-text"><?php if(in_array(3, $aMentalFocus)){ echo '<i class="fa fa-square" aria-hidden="true"></i>' ;}else{ echo '<i class="fa fa-square-o" aria-hidden="true"></i>' ;} ?> Wits</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                </div>
                <div id="sheet-background-merits-skills" class="sheet-part">
                    <div class="row">
                        <div class="">
                            <h6>Skills</h6>
                            <div>
                            <?php 
                            foreach($aEditSkills as $aSkill){
                                $Skill = $cSkills->GetSkillById($aSkill["skill"]);
                                ?>
                                <div class="sheet-skill">
                                    <span class="sheet-skill-name">
                                        <?php echo $Skill["name"]; ?>
                                        <?php 
                                            if(!empty($aSkill["skill_specialty"])){
                                            ?>
                                                <span class="sheet-skill-specialty">(<?php echo $aSkill["skill_specialty"]; ?>)</span>
                                            <?php
                                            }
                                        ?>
                                    </span>
                                    <?php 
                                        $i = 1;
                                        while($i <= $aSkill["skill_points"]){
                                            echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                            $i++;
                                        }
                                        
                                        while($i <= 8){
                                            echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                            $i++;
                                        }
                                        ?>
                                </div>
                                <?
                                }   
                            ?>
                        </div>
                        </div>
                        
                        <div class="">
                            <h6>Backgrounds</h6>
                            <div>
                                <?php 
                                foreach($aEditBackgrounds as $aBackground){
                                    $background = $cBackgrounds->GetBackgroundById($aBackground["background"]);
                                    ?>
                                    <div class="sheet-background">
                                        <span class="sheet-background-name">
                                            <?php echo $background["name"]; ?>
                                            <?php 
                                                if(!empty($aBackground["background_specialty"])){
                                                ?>
                                                    <span class="sheet-background-specialty">(<?php echo $aBackground["background_specialty"]; ?>)</span>
                                                <?php
                                                }
                                            ?>
                                        </span>
                                        <?php 
                                            $i = 1;
                                            while($i <= $aBackground["background_points"]){
                                                echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                                $i++;
                                            }
                                            
                                            while($i <= 5){
                                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                                $i++;
                                            }
                                            ?>
                                    </div>
                                    <?
                                    }
                                ?>
                            </div><br />
                            <h6>Shared Backgrounds</h6>
                            <div id="sharedbackgrounds">
                            <span>Allies</span><?php echo $aEditSheetSharedbackgrounds["allies"] ?><br />
                            <span>Contacts</span><?php echo $aEditSheetSharedbackgrounds["contacts"] ?><br />
                            <span>Kinfolk</span><?php echo $aEditSheetSharedbackgrounds["kinfolk"] ?><br />
                            <span>Territory</span><?php echo $aEditSheetSharedbackgrounds["territory"] ?><br />
                            <span>Territory advantages</span><?php echo $aEditSheetSharedbackgrounds["territory-advantages"] ?><br />
                            </div>
                        </div>
                        <div class="">
                            <h6>Merits</h6>
                            <div id="sheet-merits">
                                <?php 
                                    $aSheetMerits = explode(',', $aEditCharacter["merits_id"]);
                                    foreach($aSheetMerits as $aSheetMerit){
                                        $aMerit = $cMerits->GetMeritById($aSheetMerit);
                                    ?>
                                    <div class="sheet-merit">
                                        <span class="sheet-merit-name"><?php echo $aMerit["name"]; ?></span><?php echo $aMerit["xp"]; ?> xp
                                    </div>
                                    <?php
                                        
                                    }
                                ?>
                            </div>
                            <h6>Flaws</h6>
                            <div id="sheet-flaws">
                                <?php 
                                    $aSheetFlaws = explode(',', $aEditCharacter["flaws_id"]);
                                    foreach($aSheetFlaws as $aSheetFlaw){
                                        $aFlaw = $cFlaws->GetFlawById($aSheetFlaw);
                                    ?>
                                    <div class="sheet-flaw">
                                        <span class="sheet-flaw-name"><?php echo $aFlaw["name"]; ?></span><?php echo $aFlaw["xp"]; ?> xp
                                    </div>
                                    <?php
                                        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sheet-gifts" class="sheet-part">
                    <h6>Gifts</h6>
                    <?php 
                        $aSheetgifts = explode(',', $aEditCharacter["gifts_id"]);
                        foreach($aSheetgifts as $aSheetgift){
                            $aGift = $cGifts->GetgiftById($aSheetgift);
                        ?>
                        <div class="sheet-gift">
                            <span class="sheet-gift-name"><?php echo $aGift["name"]; ?></span> <?php echo $aGift["level"]; ?>
                        </div>
                        <?php
                            
                        }
                    ?>
                </div>
                <h6>Wyrm Taint</h6>
                    <div id="sheet-wyrmtaint" class="sheet-part">
                        Physical<br />
                        <?php 
                            $i = 1;
                            while($i <= $aEditCharacter["wyrmtaint"]){
                                echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                        ?><br />
                        Mental<br />
                        <?php 
                            $i = 1;
                            while($i <= $aEditCharacter["wyrmtaint_mental"]){
                                echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                        ?><br />
                    </div>
                    <h6>Harano</h6>
                    <div id="sheet-wyrmtaint" class="sheet-part">
                        <?php 
                            $i = 1;
                            while($i <= $aEditCharacter["harano"]){
                                echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                        ?>
                    </div>
                <div>
	            <?php if(!empty($aEditCharacter["extra_info"])){ ?>
		        <h6>Extra informatie</h6>
	            <p>
	                <?php echo nl2br($aEditCharacter["extra_info"]); ?>
	            </p>
	            <?php } ?>
	            <?php if(!empty($aEditCharacter["contact_info"])){ ?>
	            <h6>Contacts</h6>
	            <p>
	                <?php echo nl2br($aEditCharacter["contact_info"]); ?>
	            </p>
	            <?php } ?>
	            <?php if(!empty($aEditCharacter["character_background"])){ ?>
	            <h6>Character Background</h6>
	            <p>
	                <?php echo nl2br($aEditCharacter["character_background"]); ?>
	            </p>
	            <?php } ?>
            </div>
            </div>
        </div>
        <a href="/character_check_overview.php?approve=<?php echo $character_edited_id ?>" class="check_edit approve" title="Wijziging goedkeuren"><i class="fa fa-check" aria-hidden="true"></i></a>
        <a href="/character_check_overview.php?decline=<?php echo $character_edited_id ?>" class="check_edit decline" title="Wijziging afkeuren"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
</div>
</html>