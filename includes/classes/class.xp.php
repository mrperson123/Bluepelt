<?php

//include("class.gifts.php");

class xp{
    function CountXp($post){
        $cCharacter = new character();
        $aCharacter = $cCharacter->GetCharacterById($post);
        
        $sXp = 0;
        
        //Attributes
        $sXp = $aCharacter["physical"] * 3;
        $sXp += ($aCharacter["social"] * 3);
        $sXp += ($aCharacter["mental"] * 3);
        
        //Skills
        $aSkills = unserialize($aCharacter["skills"]);
        foreach($aSkills as $skill){
            $sSkillRankSwitch = 0;
            if(isset($skill["skill_rank_switch"])){
                $sSkillRankSwitch = $skill["skill_rank_switch"];
            }
            $sXp += $this->SkillCounter($skill["skill_points"], $sSkillRankSwitch); 
        }
        
        //Merits
        $aMerits = explode(',', $aCharacter["merits_id"]);
        $cMerit = new merits();
        foreach($aMerits as $aMerit){
            $amMerit = $cMerit->GetMeritById($aMerit);
            $sXp += $amMerit["xp"];
        }
        
        //Shared backgrounds old
        /*
        $aSharedBackgrounds = unserialize($aCharacter["shared_backgrounds"]);
        $sXp += $aSharedBackgrounds["1"]["Territory"];
        $sXp += $aSharedBackgrounds["3"]["Allies"];
        $sXp += $aSharedBackgrounds["4"]["Contacts"];
        $sXp += $aSharedBackgrounds["2"]["Kinfolk"];
        */
        $aSharedBackgrounds = unserialize($aCharacter["shared_backgrounds"]);
        $sXp += $this->BackgroundCounter($aSharedBackgrounds["allies"]);
        $sXp += $this->BackgroundCounter($aSharedBackgrounds["contacts"]);
        $sXp += $this->BackgroundCounter($aSharedBackgrounds["kinfolk"]);
        $sXp += $this->BackgroundCounter($aSharedBackgrounds["territory"]);
        
        //Flaws
        $aFlaws = explode(',', $aCharacter["flaws_id"]);
        $cFlaw = new flaws();
        foreach($aFlaws as $aFlaw){
            $amFlaw = $cFlaw->GetFlawById($aFlaw);
            $sXp -= $amFlaw["xp"];
        }
        
        //Backgrounds
        $aBackgrounds = unserialize($aCharacter["backgrounds"]);
        $aSheepWolf = array("4","5","1","30","29");
        foreach($aBackgrounds as $background){
            if(in_array($background["background"], $aSheepWolf)){
                if(in_array(95, $aMerits)){
                    $sXp += $this->BackgroundCounterWolfinsheep($background["background_points"]);
                }else{
                   $sXp += $this->BackgroundCounter($background["background_points"]); 
                }
            }else{
                $sXp += $this->BackgroundCounter($background["background_points"]);
            }
            
        }
        
        //Gifts
        $aSheetgifts = explode(',', $aCharacter["gifts_id"]);
        $cGifts = new gifts();
        foreach($aSheetgifts as $aSheetgift){
            $sXp += $this->GiftCounter($aSheetgift, $aCharacter);
        }
        
        $sXp = $sXp - 142;
        
        return $sXp;
    }
    
    function GiftCounter($aSheetgift, $aCharacter){
        $cGifts = new gifts();
        $aGift = $cGifts->GetgiftById($aSheetgift);
        $aAuspice   = unserialize($aGift["gift_auspice"]);
        $aBreed     = unserialize($aGift["gift_breed"]);
        $aTribe     = unserialize($aGift["gift_tribe"]);
         
        $sVar = 1;
    
        if(!empty($aAuspice)){
            if(in_array($aCharacter["auspice_id"], $aAuspice)){
                $sVar = 0;
            }
        }
        if(!empty($aBreed)){
            if(in_array($aCharacter["breed_id"], $aBreed)){
                $sVar = 0;
            }
        }
        if(!empty($aTribe)){
            if(in_array($aCharacter["tribe_id"], $aTribe)){
                $sVar = 0;
            }
        }

        if($sVar == 1){
            $xp = $aGift["level"] * 6;
        }else{
            $xp = $aGift["level"] * 4;
        }
        return $xp;
    }
    
    function SkillCounter($count, $sSkillRankSwitch){ 
        $xp = 0;
        $skill_count = 0;
        $sSkillRankSwitch = $sSkillRankSwitch;
        while($skill_count <= $count){
            if($sSkillRankSwitch == 0){
                $xp += $skill_count;
            }elseif($skill_count >= $sSkillRankSwitch){
                $xp += $skill_count * 2;
            }else{
                $xp += $skill_count;
            }
            $skill_count++;
        }
        return $xp;
    }
    
    function BackgroundCounter($count){
        $xp = 0;
        $skill_count = 0;
        while($skill_count <= $count){
            $xp += $skill_count * 2;
            $skill_count++;
        }
        return $xp;
    }
    
    function BackgroundCounterWolfinsheep($count){
        $xp = 0;
        $skill_count = 0;
        while($skill_count <= $count){
            $xp += $skill_count * 1;
            $skill_count++;
        }
        return $xp;
    }
    
    function GetSessionXp($playerId,$characterId){ 
        $cSession = new session();
        $aSessions = $cSession->GetAllSessions();
        $xp = 0;
        foreach($aSessions as $aSession){
            $aInfos = unserialize($aSession["payment"]);
            $aInfo = $aInfos["$playerId"];
            if(($aInfo["character_id"] == $characterId) && ($aInfo["played"] == "on")){
                $xp++;
            }
        }
        $xp = $xp * 3;
        return $xp;
    }
    
    
    function textXP($post){
        $cCharacter = new character();
        $aCharacter = $cCharacter->GetCharacterById($post);
        
        $sXp[] = 0;
        //Skills
        $aSkills = unserialize($aCharacter["skills"]);
        foreach($aSkills as $skill){
            $sSkillRankSwitch = 0;
            if(isset($skill["skill_rank_switch"])){
                $sSkillRankSwitch = $skill["skill_rank_switch"];
            }
            $sXp[] = $this->SkillCounter($skill["skill_points"], $sSkillRankSwitch); 
        }
        
        return $sXp;
        
        
    }
    
}

?>