<?php 

class character{
    function AddCharacter($post){

        //Lets make variables
        $user_id = "";
        $name = "";
        $deed_name = "";
        $pack_name = "";
        $tribe_id = "";
        $auspice_id = "";
        $breed_id = "";
        $physical = "";
        $social = "";
        $mental = "";
        $physical_bonus = "";
        $social_bonus = "";
        $mental_bonus = "";
        $physical_focus = "";
        $social_focus = "";
        $mental_focus = "";
        $skills = "";
        $backgrounds = "";
        $gifts_id = "";
        $merits_id = "";
        $flaws_id = "";
        $extra_info = "";
        $character_background = "";
        $shared_backgrounds = "";
        $contact_info = "";
        
        
        //add post data to variables
        $user_id                = $post["user_id"];
        $name                   = $post["name"];
        $deed_name              = $post["deed_name"];
        $pack_name              = 0;
        $tribe_id               = $post["tribe_id"];
        $auspice_id             = $post["auspice_id"];
        $breed_id               = $post["breed_id"];
        $physical               = $post["physical"];
        $social                 = $post["social"];
        $mental                 = $post["mental"];
        $physical_bonus         = $post["physical_bonus"];
        $social_bonus           = $post["social_bonus"];
        $mental_bonus           = $post["mental_bonus"];
        if(isset($post["physical_focus"])){
            $physical_focus         = serialize($post["physical_focus"]);
        }
        if(isset($post["social_focus"])){
            $social_focus           = serialize($post["social_focus"]);
        }
        if(isset($post["mental_focus"])){
            $mental_focus           = serialize($post["mental_focus"]);
        }
        $skills                 = serialize($post["skill"]);
        $backgrounds            = serialize($post["background"]);
        //$gifts_id               = $post["gifts_id"];
        //$merits_id              = $post["merits_id"];
        //$flaws_id               = $post["flaws_id"];
        $extra_info             = $post["extra_info"];
        $character_background   = $post["character_background"];
        $shared_backgrounds     = serialize($post["sharedbackgrounds"]);
        $contact_info           = $post["contact_info"];

        $aGifts = $post["gifts_id"];
        $gifts = "";
        foreach($aGifts as $key => $value){
            $gifts .= $value.",";
        }
        $gifts_id = substr($gifts, 0, -1);
        
        $aMerit = $post["merits_id"];
        $merit = "";
        foreach($aMerit as $key => $value){
            $merit .= $value.",";
        }
        $merits_id = substr($merit, 0, -1);
        
        
        $aFlaws = $post["flaws_id"];
        $flaws = "";
        foreach($aFlaws as $key => $value){
            $flaws .= $value.",";
        }
        $flaws_id = substr($flaws, 0, -1);
    
       
        //insert character into database
        $stmt = db::$conn->prepare("INSERT INTO werewolf_character 
        (user_id, name, deed_name, pack_name, tribe_id, auspice_id, breed_id, physical, social, mental, physical_bonus, social_bonus, mental_bonus, physical_focus, social_focus, mental_focus, gifts_id, merits_id, flaws_id, extra_info, character_background, active, skills, backgrounds, shared_backgrounds, contact_info) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute(array($user_id, $name, $deed_name, $pack_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, 0, $skills, $backgrounds, $shared_backgrounds, $contact_info));
        
        $stmt1 = db::$conn->prepare("INSERT INTO werewolf_character_backlog
        (user_id, name, deed_name, pack_name, tribe_id, auspice_id, breed_id, physical, social, mental, physical_bonus, social_bonus, mental_bonus, physical_focus, social_focus, mental_focus, gifts_id, merits_id, flaws_id, extra_info, character_background, active, skills, backgrounds, shared_backgrounds, contact_info) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt1->execute(array($user_id, $name, $deed_name, $pack_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, 0, $skills, $backgrounds, $shared_backgrounds, $contact_info));
        
        return "success";
    }
    
    
    
    function GetAllCharacters($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character where user_id=? ORDER BY name ASC");
		$res = $stmt->execute(array($post));
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetAllCharactersAdmin(){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character ORDER BY name ASC");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetAllActiveCharacters(){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character where active=1 ORDER BY name ASC");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    
    
    function GetCharacterById($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character WHERE id = ?;");
        $res = $stmt->execute(array($post));
		$aCharacter = $stmt->fetch();
        
        return $aCharacter;
    }
    
    function GetSessionCharacter($post){

        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character WHERE user_id = ? and active = 1;");
        $res = $stmt->execute(array($post["id"]));
        $aCharacter = array();
		$aCharacter = $stmt->fetch();
        if(!empty($aCharacter)){
        $sReturn = '<a target="_blank" href="/character.php?id='.$aCharacter["id"].'">'.substr($aCharacter["name"], 0 ,25).'</a>';
        }else{
            $sReturn = "Geen actieve character";
        }
        return $sReturn;
    }
    
    function GetActiveCharacter($post){

        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character WHERE user_id = ? and active = 1;");
        $res = $stmt->execute(array($post["id"]));
        $aCharacter = array();
		$aCharacter = $stmt->fetch();
        if(!empty($aCharacter)){
            $sReturn = $aCharacter;
        }else{
            $sReturn = "";
        }
        return $sReturn;
    }
    
    
    
    function SetCharacterActive($userId,$characterId){
        
        $stmt = db::$conn->prepare("UPDATE werewolf_character SET active = 0 WHERE user_id = ?;");
        $res = $stmt->execute(array($userId));
        
        $stmt = db::$conn->prepare("UPDATE werewolf_character SET active = 1 WHERE id = ?;");
        $res = $stmt->execute(array($characterId));
    }
    
    
    
    function DeleteCharacter($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_character WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Character is verwijderd.";
    }
    
    
    
    function EditCharacter($post){
        $character_id = "";
        $user_id = "";
        $name = "";
        $deed_name = "";
        $pack_name = "";
        $tribe_id = "";
        $auspice_id = "";
        $breed_id = "";
        $physical = "";
        $social = "";
        $mental = "";
        $physical_bonus = "";
        $social_bonus = "";
        $mental_bonus = "";
        $physical_focus = "";
        $social_focus = "";
        $mental_focus = "";
        $skills_meta_id = "";
        $backgrounds_meta_id = "";
        $meta_skill_id = "";
        $meta_background_id = "";
        $gifts_id = "";
        $merits_id = "";
        $flaws_id = "";
        $extra_info = "";
        $character_background = "";
        $shared_backgrounds = "";
        $contact_info = "";
        
        $character_id           = $post["character_id"];
        $user_id                = $post["user_id"];
        $name                   = $post["name"];
        $deed_name              = $post["deed_name"];
        $tribe_id               = $post["tribe_id"];
        $auspice_id             = $post["auspice_id"];
        $breed_id               = $post["breed_id"];
        $physical               = $post["physical"];
        $social                 = $post["social"];
        $mental                 = $post["mental"];
        $physical_bonus         = $post["physical_bonus"];
        $social_bonus           = $post["social_bonus"];
        $mental_bonus           = $post["mental_bonus"];
        if(isset($post["physical_focus"])){
            $physical_focus         = serialize($post["physical_focus"]);
        }
        if(isset($post["social_focus"])){
            $social_focus           = serialize($post["social_focus"]);
        }
        if(isset($post["mental_focus"])){
            $mental_focus           = serialize($post["mental_focus"]);
        }
        //$gifts_id               = $post["gifts_id"];
        //$merits_id              = $post["merits_id"];
        //$flaws_id               = $post["flaws_id"];
        $extra_info             = $post["extra_info"];
        $character_background   = $post["character_background"];
        $skills                 = serialize($post["skill"]);
        $backgrounds            = serialize($post["background"]);
        $shared_backgrounds     = serialize($post["sharedbackgrounds"]);
        $contact_info           = $post["contact_info"];
        $wyrmtaint              = $post["wyrmtaint"];
        $wyrmtaint_mental       = $post["wyrmtaint_mental"];
        $harano                 = $post["harano"];
        
        $aGifts = $post["gifts_id"];
        $gifts = "";
        foreach($aGifts as $key => $value){
            $gifts .= $value.",";
        }
        $gifts_id = substr($gifts, 0, -1);
        
        $aMerit = $post["merits_id"];
        $merit = "";
        foreach($aMerit as $key => $value){
            $merit .= $value.",";
        }
        $merits_id = substr($merit, 0, -1);
        
        
        $aFlaws = $post["flaws_id"];
        $flaws = "";
        foreach($aFlaws as $key => $value){
            $flaws .= $value.",";
        }
        $flaws_id = substr($flaws, 0, -1);

        
        //insert character into database
        $stmt = db::$conn->prepare("INSERT INTO werewolf_character_edit 
        (character_id, user_id, name, deed_name, tribe_id, auspice_id, breed_id, physical, social, mental, physical_bonus, social_bonus, mental_bonus, physical_focus, social_focus, mental_focus, gifts_id, merits_id, flaws_id, extra_info, character_background, skills, backgrounds, shared_backgrounds, contact_info, wyrmtaint, wyrmtaint_mental, harano) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute(array($character_id, $user_id, $name, $deed_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, $skills, $backgrounds, $shared_backgrounds, $contact_info, $wyrmtaint, $wyrmtaint_mental, $harano));
        
        return "success";
    }
    
    //check if character is edited
    function CheckForEdit($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character_edit where character_id=?");
		$res = $stmt->execute(array($post));
		$res = $stmt->rowCount();
        
        return $res;
    }
    
    //get list of all edited characters
    function GetAllEditedCharacters(){
	    
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character_edit ORDER BY id");
		$res = $stmt->execute();
		$res = $stmt->FetchAll();
        
        return $res;
    }
    
    //get edited character by id
    function GetEditedById($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character_edit where id=?");
		$res = $stmt->execute(array($post));
		$res = $stmt->Fetch();
        
        return $res;
    }
    
    //approve edit
    function AdminEditCharacter($post){
        
        $glory                  = "";
        $honor                  = ""; 
        $wisdom                 = ""; 
        
        $character_id           = $post["character_id"];
        $user_id				= $post["user_id"];
        $name                   = $post["name"];
        $deed_name              = $post["deed_name"];
        $pack_name              = $post["pack_name"];
        $tribe_id               = $post["tribe_id"];
        $auspice_id             = $post["auspice_id"];
        $breed_id               = $post["breed_id"];
        $physical               = $post["physical"];
        $social                 = $post["social"];
        $mental                 = $post["mental"];
        $physical_bonus         = $post["physical_bonus"];
        $social_bonus           = $post["social_bonus"];
        $mental_bonus           = $post["mental_bonus"];
        if(isset($post["physical_focus"])){
            $physical_focus         = serialize($post["physical_focus"]);
        }
        if(isset($post["social_focus"])){
            $social_focus           = serialize($post["social_focus"]);
        }
        if(isset($post["mental_focus"])){
            $mental_focus           = serialize($post["mental_focus"]);
        }
        $skills                 = serialize($post["skill"]);
        $backgrounds            = serialize($post["background"]);
        //$gifts_id               = $post["gifts_id"];
        //$merits_id              = $post["merits_id"];
        //$flaws_id               = $post["flaws_id"];
        $extra_info             = $post["extra_info"];
        $character_background   = $post["character_background"];
        $narrator_snippet       = $post["narrator_snippet"];
        $shared_backgrounds     = serialize($post["sharedbackgrounds"]);
        $contact_info           = $post["contact_info"];
        $contact_points			= serialize($post["contact_points"]);
        $wyrmtaint              = $post["wyrmtaint"];
        $wyrmtaint_mental       = $post["wyrmtaint_mental"];
        $harano                 = $post["harano"];
        if(isset($post["gifts_id1"])){
            for ($i = 1; is_null($post['gifts_id'.$i]) == false; $i++) {
                $gifts_id .= ",".$post['gifts_id'.$i];
            }
        }
        
        if(isset($post["glory"])){
        $glory                  = $post["glory"];
        }
        
        if(isset($post["honor"])){
        $honor                  = $post["honor"]; 
        }
        
        if(isset($post["wisdom"])){
        $wisdom                 = $post["wisdom"]; 
        }
        
        $aGifts = $post["gifts_id"];
        $gifts = "";
        foreach($aGifts as $key => $value){
            $gifts .= $value.",";
        }
        $gifts_id = substr($gifts, 0, -1);
        
        $aMerit = $post["merits_id"];
        $merit = "";
        foreach($aMerit as $key => $value){
            $merit .= $value.",";
        }
        $merits_id = substr($merit, 0, -1);
        
        
        $aFlaws = $post["flaws_id"];
        $flaws = "";
        foreach($aFlaws as $key => $value){
            $flaws .= $value.",";
        }
        $flaws_id = substr($flaws, 0, -1);
        
        /*
        if(isset($post["merits_id1"])){
            for ($i = 1; is_null($post['merits_id'.$i]) == false; $i++) {
                $merits_id .= ",".$post['merits_id'.$i];
            }
        }
        
        if(isset($post["flaws_id1"])){
            for ($i = 1; is_null($post['flaws_id'.$i]) == false; $i++) {
                $flaws_id .= ",".$post['flaws_id'.$i];
            }
        }
        */
        
        $xp = $post["xp"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_character SET
        name = ?, 
        deed_name = ?, 
        pack_name = ?, 
        tribe_id = ?, 
        auspice_id = ?, 
        breed_id = ?, 
        physical = ?, 
        social = ?, 
        mental = ?, 
        physical_bonus = ?, 
        social_bonus = ?, 
        mental_bonus = ?, 
        physical_focus = ?, 
        social_focus = ?, 
        mental_focus = ?, 
        gifts_id = ?, 
        merits_id = ?, 
        flaws_id = ?, 
        extra_info = ?, 
        character_background = ?, 
        skills = ?, 
        backgrounds = ?,
        narrator_snippet = ?,
        shared_backgrounds = ?,
        contact_info = ?,
        contact_points = ?,
        user_id = ?,
        glory = ?,
        honor = ?,
        wisdom = ?,
        wyrmtaint = ?,
        wyrmtaint_mental = ?,
        harano = ?,
        xp = ?
        WHERE id = ?");
        
        

        $stmt->execute(array($name, $deed_name, $pack_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, $skills, $backgrounds, $narrator_snippet, $shared_backgrounds, $contact_info, $contact_points, $user_id, $glory, $honor, $wisdom, $wyrmtaint, $wyrmtaint_mental, $harano, $xp, $character_id));
        
        $stmt1 = db::$conn->prepare("INSERT INTO werewolf_character_backlog 
        (name,
        user_id,
        deed_name, 
        tribe_id, 
        auspice_id, 
        breed_id, 
        physical, 
        social, 
        mental, 
        physical_bonus, 
        social_bonus, 
        mental_bonus, 
        physical_focus, 
        social_focus, 
        mental_focus, 
        gifts_id, 
        merits_id, 
        flaws_id, 
        extra_info, 
        character_background, 
        skills, 
        backgrounds,
        shared_backgrounds,
        contact_info,
        harano,
        wyrmtaint,
        wyrmtaint_mental,
        xp,
        character_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        $stmt1->execute(array($name, $user_id, $deed_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, $skills, $backgrounds, $shared_backgrounds, $contact_info, $wyrmtaint, $wyrmtaint_mental, $harano, $xp, $character_id));
        
        return "success";
    }
    
    //approve edit
    function ApproveEdit($post){
        $stmt                 = db::$conn->prepare("SELECT * FROM werewolf_character_edit where id=?");
		$res                  = $stmt->execute(array($post));
		$edited_character     = $stmt->Fetch();
        
        $character_id           = $edited_character["character_id"];
        $name                   = $edited_character["name"];
        $user_id                = $edited_character["user_id"];
        $deed_name              = $edited_character["deed_name"];
        $tribe_id               = $edited_character["tribe_id"];
        $auspice_id             = $edited_character["auspice_id"];
        $breed_id               = $edited_character["breed_id"];
        $physical               = $edited_character["physical"];
        $social                 = $edited_character["social"];
        $mental                 = $edited_character["mental"];
        $physical_bonus         = $edited_character["physical_bonus"];
        $social_bonus           = $edited_character["social_bonus"];
        $mental_bonus           = $edited_character["mental_bonus"];
        $physical_focus         = $edited_character["physical_focus"];
        $social_focus           = $edited_character["social_focus"];
        $mental_focus           = $edited_character["mental_focus"];
        $gifts_id               = $edited_character["gifts_id"];
        $merits_id              = $edited_character["merits_id"];
        $flaws_id               = $edited_character["flaws_id"];
        $extra_info             = $edited_character["extra_info"];
        $character_background   = $edited_character["character_background"];
        $skills                 = $edited_character["skills"];
        $backgrounds            = $edited_character["backgrounds"];
        $shared_backgrounds     = $edited_character["shared_backgrounds"];
        $contact_info           = $edited_character["contact_info"];
        $wyrmtaint              = $edited_character["wyrmtaint"];
        $wyrmtaint_mental       = $edited_character["wyrmtaint_mental"];
        $harano                 = $edited_character["harano"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_character SET
        name = ?, 
        deed_name = ?, 
        tribe_id = ?, 
        auspice_id = ?, 
        breed_id = ?, 
        physical = ?, 
        social = ?, 
        mental = ?, 
        physical_bonus = ?, 
        social_bonus = ?, 
        mental_bonus = ?, 
        physical_focus = ?, 
        social_focus = ?, 
        mental_focus = ?, 
        gifts_id = ?, 
        merits_id = ?, 
        flaws_id = ?, 
        extra_info = ?, 
        character_background = ?, 
        skills = ?, 
        backgrounds = ?,
        shared_backgrounds = ?,
        contact_info = ?,
        harano = ?,
        wyrmtaint = ?,
        wyrmtaint_mental = ?
        WHERE id = ?");

        $stmt->execute(array($name, $deed_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, $skills, $backgrounds, $shared_backgrounds, $contact_info, $harano, $wyrmtaint, $wyrmtaint_mental, $character_id));
        
        $stmt1 = db::$conn->prepare("INSERT INTO werewolf_character_backlog 
        (name,
        user_id,
        deed_name, 
        tribe_id, 
        auspice_id, 
        breed_id, 
        physical, 
        social, 
        mental, 
        physical_bonus, 
        social_bonus, 
        mental_bonus, 
        physical_focus, 
        social_focus, 
        mental_focus, 
        gifts_id, 
        merits_id, 
        flaws_id, 
        extra_info, 
        character_background, 
        skills, 
        backgrounds,
        shared_backgrounds,
        contact_info,
        harano,
        wyrmtaint,
        wyrmtaint_mental = ?
        character_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        $stmt1->execute(array($name, $user_id, $deed_name, $tribe_id, $auspice_id, $breed_id, $physical, $social, $mental, $physical_bonus, $social_bonus, $mental_bonus, $physical_focus, $social_focus, $mental_focus, $gifts_id, $merits_id, $flaws_id, $extra_info, $character_background, $skills, $backgrounds, $shared_backgrounds, $contact_info, $harano, $wyrmtaint, $wyrmtaint_mental, $character_id));
        
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE id = ?");
		$stmt->execute(array($edited_character["user_id"]));
		$res = $stmt->fetch();
        
        $subject    = "Wijziging character goedgekeurd";
        $messsage   = "Beste ".$res["playername"].", De wijzigingen aan je character zijn goedgekeurd. Als je nog vragen hierover hebt neem dan contact op met de Narrators." ;
        $address    = $res["email"];
        
        phpmailer::sendMail($subject, $messsage, $address);
        
        
        $stmt = db::$conn->prepare("DELETE FROM werewolf_character_edit WHERE id  = ?");
        $stmt->execute(array($post));
        
        return "success";
    }
    
    //decline edit
    function DeclineEdit($post){
        $stmt                 = db::$conn->prepare("SELECT * FROM werewolf_character_edit where id=?");
		$res                  = $stmt->execute(array($post));
		$edited_character     = $stmt->Fetch();
        
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_player WHERE id = ?");
		$stmt->execute(array($edited_character["user_id"]));
		$res = $stmt->fetch();
        
        $subject    = "Wijziging character afgekeurd";
        $messsage   = "Beste ".$res["playername"].", Helaas zijn de wijzigingen aan je character afgekeurd. Wil je hier meer over weten? Neem dan contact op met de Narrators." ;
        $address    = $res["email"];
        
        phpmailer::sendMail($subject, $messsage, $address);
        
        $stmt = db::$conn->prepare("DELETE FROM werewolf_character_edit WHERE id  = ?");
        $stmt->execute(array($post));
        
        return "success";
    }
    
}
?>