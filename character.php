<?php 
    include("header.php");
    
    $cAuspices              = new auspices();
    $cBackgrounds           = new backgrounds();
    $cCharacters            = new character();
    $cBreeds                = new breeds();
    $cFlaws                 = new flaws();
    $cGifts                 = new gifts();
    $cMerits                = new merits();
    $cPacks                 = new pack();
    $cSkills                = new skills();
    $cTribes                = new tribes();
    $cUser                  = new user();
    $cSharedbackgrounds     = new sharedbackgrounds();
    $cXp                    = new xp();
    
    $aAuspices      = $cAuspices->GetAllAuspices();
    $aBackgrounds   = $cBackgrounds->GetAllBackgrounds();
    $aBreeds        = $cBreeds->GetAllBreeds();
    $aFlaws         = $cFlaws->GetAllFlaws();
    $aGifts         = $cGifts->GetAllGifts();
    $aMerits        = $cMerits->GetAllMerits();
    $aSkills        = $cSkills->GetAllSkills();
    $aTribes        = $cTribes->GetAllTribes();
    $aSharedbackgrounds     = $cSharedbackgrounds->GetAllSharedbackgrounds();
    $aUsers			= $cUser->GetAllUsers();
    
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
    $aSheetSharedbackgrounds     	= unserialize($aCharacter["shared_backgrounds"]);
    
    
    $sharedAllies       = $aSheetSharedbackgrounds["allies"];
    $sharedContact      = $aSheetSharedbackgrounds["contacts"];
    $sharedKinfolk      = $aSheetSharedbackgrounds["kinfolk"]; 
    $sharedTerritory    = $aSheetSharedbackgrounds["territory"];
    $sharedAlliesExtra = "";
    $sharedContactExtra = "";
    $sharedKinfolkExtra = "";
    $sharedTerritoryExtra = "";
    if(!empty($aSheetSharedbackgrounds["allies-advantages"])){
        $sharedAlliesExtra = $aCharacter["name"].": ".$aSheetSharedbackgrounds["allies-advantages"]."<br />";
    }
    if(!empty($aSheetSharedbackgrounds["contacts-advantages"])){
        $sharedContactsExtra = $aCharacter["name"].": ".$aSheetSharedbackgrounds["contacts-advantages"]."<br />";
    }
    if(!empty($aSheetSharedbackgrounds["kinfolk-advantages"])){
        $sharedKinfolkExtra = $aCharacter["name"].": ".$aSheetSharedbackgrounds["kinfolk-advantages"]."<br />";
    }
    if(!empty($aSheetSharedbackgrounds["territory-advantages"])){
        $sharedTerritoryExtra = $aCharacter["name"].": ".$aSheetSharedbackgrounds["territory-advantages"]."<br />";
    }
    
    
    if(($aCharacter["pack_name"] != "0")){
        $aPack          = $cPacks->GetPackById($aCharacter["pack_name"]);
        $aPackmembers   = $cPacks->GetPackMembers($aCharacter["pack_name"]);
        
        foreach($aPackmembers as $aPackmember){
            if($aPackmember["id"] != $character_id){
                $aPackSharedbackground = unserialize($aPackmember["shared_backgrounds"]);
                $sharedAllies       += $aPackSharedbackground["allies"];
                $sharedContact      += $aPackSharedbackground["contacts"];
                $sharedKinfolk      += $aPackSharedbackground["kinfolk"];
                $sharedTerritory    += $aPackSharedbackground["territory"];
                if(!empty($aPackSharedbackground["allies-advantages"])){
                    $sharedAlliesExtra .= $aPackmember["name"].": ".$aPackSharedbackground["allies-advantages"]."<br />";
                }
                if(!empty($aPackSharedbackground["contacts-advantages"])){
                    $sharedContactsExtra .= $aPackmember["name"].": ".$aPackSharedbackground["contacts-advantages"]."<br />";
                }
                if(!empty($aPackSharedbackground["kinfolk-advantages"])){
                    $sharedKinfolkExtra .= $aPackmember["name"].": ".$aPackSharedbackground["kinfolk-advantages"]."<br />";
                }
                if(!empty($aPackSharedbackground["territory-advantages"])){
                    $sharedTerritoryExtra .= $aPackmember["name"].": ".$aPackSharedbackground["territory-advantages"]."<br />";
                }
            }
        }
    }

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
    $aSkills                		= unserialize($aCharacter["skills"]);
    $aBackgrounds           		= unserialize($aCharacter["backgrounds"]);
    
    
    if($_SERVER["REMOTE_ADDR"] == "94.208.177.161"){
        //var_dump($aBackgrounds);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1><?php echo $aCharacter["name"]; if(!empty($aCharacter["deed_name"])){ echo " - ".$aCharacter["deed_name"];} ?></h1>
        
        <div id="sheet-topinfo" class="sheet-part">
            <span class="sheet-topinfo"><strong>Tribe: </strong><?php echo $aTribe["tribes"]; ?></span>
            <span class="sheet-topinfo"><strong>Breed: </strong><?php echo $aBreed["name"] ?></span>
            <span class="sheet-topinfo"><strong>Auspice: </strong> <?php echo $aAuspice["name"]; ?></span>
            <?php if(($aCharacter["pack_name"] != "0")){ ?><span class="sheet-topinfo"><strong>Pack: </strong> <a href="/pack.php?id=<?php echo $aPack["id"]; ?>"><?php echo $aPack["name"]; ?></a></span> <?php } ?>
        </div>
        <div id="sheet-attributes" class="sheet-part">
            <h6>Attributes</h6>
            <div class="row">
                <div class="column col4">
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
                <div class="column col4">
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
                <div class="column col4">
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
                <div class="column col4">
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
                                    
                                    while($i <= 5){
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
                
                <div class="column col4">
                    <h6>Backgrounds</h6>
                    <div>
                        <?php 
                        foreach($aBackgrounds as $aBackground){
                            $background = $cBackgrounds->GetBackgroundById($aBackground["background"]);
                            ?>
                            <div class="sheet-background">
                                <span class="sheet-background-name">
                                    <?php if(!empty($background["info"])){ ?><a href="/view_background.php?id=<?php echo $character_id; ?>#<?php echo $background["id"]; ?>"><?php } ?>
                                    <?php echo $background["name"]; ?>
                                    <?php if(!empty($background["info"])){ ?></a><?php } ?>
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
                        <span>Allies</span>
                        <?php 
                            $i = 1;
                            while($i <= $sharedAllies){
                                if($i < 6){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                }
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                            ?><br /><?php
                            //echo $sharedAlliesExtra;
                        ?>
                        <span>Contacts</span>
                        <?php 
                            $i = 1;
                            while($i <= $sharedContact){
                                if($i < 6){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                }
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                            ?><br /><?php
                            //echo $sharedContactsExtra;
                        ?>
                        <span>Kinfolk</span>
                        <?php 
                            $i = 1;
                            while($i <= $sharedKinfolk){
                                if($i < 6){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                }
                                $i++; 
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                            ?><br /><?php
                            //echo $sharedKinfolkExtra;
                        ?>
                        <span>Territory</span>
                        <?php 
                            $i = 1;
                            while($i <= $sharedTerritory){
                                if($i < 6){
                                    echo '<i class="fa fa-circle" aria-hidden="true"></i>';
                                }
                                $i++;
                            }
                            
                            while($i <= 5){
                                echo '<i class="fa fa-circle-o" aria-hidden="true"></i>';
                                $i++;
                            }
                            ?><br /><?php
                            echo $sharedTerritoryExtra;
                        ?>
                        <?php /*
                        <span>Allies</span>
                        <?php 
                            if($sharedAllies >= 30){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
                        <?
                            }elseif($sharedAllies >= 20){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedAllies >= 12){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedAllies >= 6){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedAllies >= 2){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedAllies >= 0){
                        ?>
                            <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }
                        ?><br />
                        <span>Contact</span>
                        <?php 
                            if($sharedContact >= 30){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
                        <?
                            }elseif($sharedContact >= 20){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedContact >= 12){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedContact >= 6){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedContact >= 2){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedContact >= 0){
                        ?>
                            <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }
                        ?><br />
                        <span>Kinfolk</span>
                        <?php 
                            if($sharedKinfolk >= 30){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
                        <?
                            }elseif($sharedKinfolk >= 20){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedKinfolk >= 12){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedKinfolk >= 6){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedKinfolk >= 2){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedKinfolk >= 0){
                        ?>
                            <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }
                        ?><br />
                        <span>Territory</span>
                        <?php 
                            if($sharedTerritory >= 30){
                        ?><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
                        <?
                            }elseif($sharedTerritory >= 20){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedTerritory >= 12){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedTerritory >= 6){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedTerritory >= 2){
                        ?>
                            <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }elseif($sharedTerritory >= 0){
                        ?>
                            <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
                        <?php
                            }
                        ?><br />
                        <?php echo $sharedTerritoryExtra; ?>
                        */ ?>
                    </div>
                </div>
                <div class="column col4">
                    <h6>Gifts</h6>
                    <div id="sheet-gifts" class="sheet-part">
                    <?php 
                        $aSheetgifts = explode(',', $aCharacter["gifts_id"]);
                        foreach($aSheetgifts as $aSheetgift){
                            $aGift = $cGifts->GetgiftById($aSheetgift);
                        ?>
                        <div class="sheet-gift">
	                        <?php if(!empty($aGift["info"])){ ?><a href="/view_gifts.php?id=<?php echo $character_id; ?>#<?php echo $aGift["id"]; ?>"><?php } ?>
                            <span class="sheet-gift-name"><?php echo $aGift["name"]; ?></span> <?php echo $aGift["level"]; ?>
                            <?php if(!empty($aGift["info"])){ ?></a><?php } ?>
                        </div>
                        <?php
                            
                        }
                    ?>
                    </div>
                    <h6>Merits</h6>
                    <div id="sheet-merits">
                        <?php 
                            $aSheetMerits = explode(',', $aCharacter["merits_id"]);
                            foreach($aSheetMerits as $aSheetMerit){
                                $aMerit = $cMerits->GetMeritById($aSheetMerit);
                            ?>
                            <div class="sheet-merit">
                                <?php if(!empty($aMerit["info"])){ ?><a href="/view_merits.php?id=<?php echo $character_id; ?>#<?php echo $aMerit["id"]; ?>"><?php } ?>
                                <span class="sheet-merit-name"><?php echo $aMerit["name"]; ?></span><?php echo $aMerit["xp"]; ?> xp
                                <?php if(!empty($aMerit["info"])){ ?></a><?php } ?>
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
                                <?php if(!empty($aFlaw["info"])){ ?><a href="/view_merits.php?id=<?php echo $character_id; ?>#<?php echo $aFlaw["id"]; ?>"><?php } ?>
                                <span class="sheet-flaw-name"><?php echo $aFlaw["name"]; ?></span><?php echo $aFlaw["xp"]; ?> xp
                                <?php if(!empty($aFlaw["info"])){ ?></a><?php } ?>
                            </div>
                            <?php
                                
                            }
                        ?>
                    </div><br />
                    
                    <h6>Wyrm Taint</h6>
                    <div id="sheet-wyrmtaint" class="sheet-part">
                        <span>Physical</span><?php 
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
                        <span>Mental</span><?php 
                            $i = 1;
                            while($i <= $aCharacter["wyrmtaint_mental"]){
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
                </div>
            </div>
        </div>
        <div>
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
            <?php if($level == 1){ ?>
            <h6>Narrator snippet</h6>
            <p>
                <?php echo nl2br($aCharacter["narrator_snippet"]); ?>
            </p>
            <?php } ?>
        </div>
        <?php if($edited == "0"){ ?><a class="print_hide" href="/edit_character.php?id=<?php echo $aCharacter["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php } ?>
    </div>
</div>
</html>