<?php

include("class.character.php");
include("class.phpmailer.php");
include("class.session.php");


class mail{
    function AddMail($post){
        $session_id         = "";
        $finance_1          = "";
        $finance_2          = "";
        $industry_1         = "";
        $industry_2         = "";
        $media_1            = "";
        $media_2            = "";
        $medical_1          = "";
        $medical_2          = "";
        $occult_1           = "";
        $occult_2           = "";
        $police_1           = "";
        $police_2           = "";
        $politics_1         = "";
        $politics_2         = "";
        $street_1           = "";
        $street_2           = "";
        $underworld_1       = "";
        $underworld_2       = "";
        $univeristy_1       = "";
        $university_2       = "";
        $begin_text         = "";
        $ic_text            = "";
        $times              = "";
        $characters_text    = "";
        
        $session_id         = $post["session_id"];
        $finance_1          = $post["finance_1"];
        $finance_2          = $post["finance_2"];
        $industry_1         = $post["industry_1"];
        $industry_2         = $post["industry_2"];
        $media_1            = $post["media_1"];
        $media_2            = $post["media_2"];
        $medical_1          = $post["medical_1"];
        $medical_2          = $post["medical_2"];
        $occult_1           = $post["occult_1"];
        $occult_2           = $post["occult_2"];
        $police_1           = $post["police_1"];
        $police_2           = $post["police_2"];
        $politics_1         = $post["politics_1"];
        $politics_2         = $post["politics_2"];
        $street_1           = $post["street_1"];
        $street_2           = $post["street_2"];
        $underworld_1       = $post["underworld_1"];
        $underworld_2       = $post["underworld_2"];
        $university_1       = $post["university_1"];
        $university_2       = $post["university_2"];
        $begin_text         = $post["begin_text"];
        $ic_text            = $post["ic_text"];
        $times              = $post["times"];
        $characters_text    = serialize($post["character"]);

		$stmt = db::$conn->prepare("INSERT INTO werewolf_mail (session_id, sent, finance_1, finance_2, industry_1, industry_2, media_1, media_2, medical_1, medical_2, occult_1, occult_2, police_1, police_2, politics_1, politics_2, street_1, street_2, underworld_1, underworld_2, university_1, university_2, begin_text, ic_text, times, characters_text) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($session_id, "0", $finance_1, $finance_2, $industry_1, $industry_2, $media_1, $media_2, $medical_1, $medical_2, $occult_1, $occult_2, $police_1, $police_2, $politics_1, $politics_2, $street_1, $street_2, $underworld_1, $underworld_2, $university_1, $university_2, $begin_text, $ic_text, $times, $characters_text));
        $lastid = db::$conn->lastInsertId();
        
        
		return "success,".$lastid;
    }
    
    function GetAllMails(){
        $query = "SELECT * FROM werewolf_mail ORDER BY session_id ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function DeleteMail($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_mail WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Mailing is verwijderd.";
    }
    
    function GetMailById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_mail where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
    function SaveMail($post){
        $session_id         = "";
        $finance_1          = "";
        $finance_2          = "";
        $industry_1         = "";
        $industry_2         = "";
        $media_1            = "";
        $media_2            = "";
        $medical_1          = "";
        $medical_2          = "";
        $occult_1           = "";
        $occult_2           = "";
        $police_1           = "";
        $police_2           = "";
        $politics_1         = "";
        $politics_2         = "";
        $street_1           = "";
        $street_2           = "";
        $underworld_1       = "";
        $underworld_2       = "";
        $univeristy_1       = "";
        $university_2       = "";
        $begin_text         = "";
        $ic_text            = "";
        $times              = "";
        $characters_text    = "";
        
        $session_id         = $post["session_id"];
        $finance_1          = $post["finance_1"];
        $finance_2          = $post["finance_2"];
        $industry_1         = $post["industry_1"];
        $industry_2         = $post["industry_2"];
        $media_1            = $post["media_1"];
        $media_2            = $post["media_2"];
        $medical_1          = $post["medical_1"];
        $medical_2          = $post["medical_2"];
        $occult_1           = $post["occult_1"];
        $occult_2           = $post["occult_2"];
        $police_1           = $post["police_1"];
        $police_2           = $post["police_2"];
        $politics_1         = $post["politics_1"];
        $politics_2         = $post["politics_2"];
        $street_1           = $post["street_1"];
        $street_2           = $post["street_2"];
        $underworld_1       = $post["underworld_1"];
        $underworld_2       = $post["underworld_2"];
        $university_1       = $post["university_1"];
        $university_2       = $post["university_2"];
        $begin_text         = $post["begin_text"];
        $ic_text            = $post["ic_text"];
        $times              = $post["times"];
        $characters_text    = serialize($post["character"]);
        $id                 = $post["id"];
        

		$stmt = db::$conn->prepare("UPDATE werewolf_mail SET 
        session_id = ?, 
        sent = ?, 
        finance_1 = ?, 
        finance_2 = ?, 
        industry_1 = ?, 
        industry_2 = ?, 
        media_1 = ?, 
        media_2 = ?,
        medical_1 = ?, 
        medical_2 = ?, 
        occult_1 = ?, 
        occult_2 = ?, 
        police_1 = ?, 
        police_2 = ?, 
        politics_1 = ?, 
        politics_2 = ?, 
        street_1 = ?, 
        street_2 = ?, 
        underworld_1 = ?, 
        underworld_2 = ?, 
        university_1 = ?, 
        university_2 = ?, 
        begin_text = ?, 
        ic_text = ?, 
        times = ?, 
        characters_text = ?
        WHERE id = ?");
        $stmt->execute(array($session_id, "0", $finance_1, $finance_2, $industry_1, $industry_2, $media_1, $media_2, $medical_1, $medical_2, $occult_1, $occult_2, $police_1, $police_2, $politics_1, $politics_2, $street_1, $street_2, $underworld_1, $underworld_2, $university_1, $university_2, $begin_text, $ic_text, $times, $characters_text, $id));

		return "success";
    }
    
    public static function paragraph($text){
        $text = str_replace("\r\n","\n",$text);
    
        $paragraphs = preg_split("/[\n]{2,}/",$text);
        foreach ($paragraphs as $key => $p) {
            $paragraphs[$key] = "<p>".str_replace("\n","<br />",$paragraphs[$key])."</p>";
        }
        
        $text = implode("", $paragraphs);
        
        return $text;
    }
    
    function SendMailing($id){
        $cCharacter     = new character();
        $cMailer        = new PHPMailer();
        $cSession       = new session();
        $cUser          = new user();
		$cXp        = new xp();
        
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_mail where id LIKE ?");
        $stmt->execute(array($id["id"]));
        $res = $stmt->fetch();
        
        $session = $cSession->GetSessionById($res["session_id"]);
        
        $subject = "Informatie werewolfsessie ".$session["number"]." ".$session["name"];
        $character_texts = unserialize($res["characters_text"]);
        
        $aCharacters = $cCharacter->GetAllActiveCharacters();
        $mailsucces = "";
        foreach($aCharacters as $aCharacter){
            $user = $cUser->getUserById($aCharacter["user_id"]);
            $contact = unserialize($aCharacter["contact_points"]);
            
            $mail =     self::paragraph("Beste ".$user["playername"].",");
            //$mail .=     self::paragraph($user["level"]);
            $mail .=    "<p>Hierbij een overzicht van de informatie voor de aankomende weerwolf sessie ".$session["number"]." '".$session["name"]."'</p>";
            $mail .=    self::paragraph($res["begin_text"]);
            $mail .=    self::paragraph($res["ic_text"]);
            $mail .=    "<b>Verschillende IC dingen die je deze maand ter oren zijn gekomen:</b><br />";
            
            if($contact[0]["finance"] == "1"){
                $mail .=    "Finance 1: ".$res["finance_1"]."<br />";
            }
            if($contact[0]["finance"] == "2"){
                $mail .=    "Finance 1: ".$res["finance_1"]."<br />";
                $mail .=    "Finance 2: ".$res["finance_2"]."<br />";
            }
            
            if($contact[0]["industry"] == "1"){
                $mail .=    "Industry 1: ".$res["industry_1"]."<br />";
            }
            if($contact[0]["industry"] == "2"){
                $mail .=    "Industry 1: ".$res["industry_1"]."<br />";
                $mail .=    "Industry 2: ".$res["industry_2"]."<br />";
            }
            
            if($contact[0]["media"] == "1"){
                $mail .=    "Media 1: ".$res["media_1"]."<br />";
            }
            if($contact[0]["media"] == "2"){
                $mail .=    "Media 1: ".$res["media_1"]."<br />";
                $mail .=    "Media 2: ".$res["media_2"]."<br />";
            }
            
            if($contact[0]["occult"] == "1"){
                $mail .=    "Occult 1: ".$res["occult_1"]."<br />";
            }
            if($contact[0]["occult"] == "2"){
                $mail .=    "Occult 1: ".$res["occult_1"]."<br />";
                $mail .=    "Occult 2: ".$res["occult_2"]."<br />";
            }
            
            if($contact[0]["police"] == "1"){
                $mail .=    "Police 1: ".$res["police_1"]."<br />";
            }
            if($contact[0]["police"] == "2"){
                $mail .=    "Police 1: ".$res["police_1"]."<br />";
                $mail .=    "Police 2: ".$res["police_2"]."<br />";
            }
            
            if($contact[0]["politics"] == "1"){
                $mail .=    "Politics 1: ".$res["politics_1"]."<br />";
            }
            if($contact[0]["politics"] == "2"){
                $mail .=    "Politics 1: ".$res["politics_1"]."<br />";
                $mail .=    "Politics 2: ".$res["politics_2"]."<br />";
            }
            
            if($contact[0]["street"] == "1"){
                $mail .=    "Street 1: ".$res["street_1"]."<br />";
            }
            if($contact[0]["street"] == "2"){
                $mail .=    "Street 1: ".$res["street_1"]."<br />";
                $mail .=    "Street 2: ".$res["street_2"]."<br />";
            }
            
            if($contact[0]["underworld"] == "1"){
                $mail .=    "Underworld 1: ".$res["underworld_1"]."<br />";
            }
            if($contact[0]["underworld"] == "2"){
                $mail .=    "Underworld 1: ".$res["underworld_1"]."<br />";
                $mail .=    "Underworld 2: ".$res["underworld_2"]."<br />";
            }
            
            if($contact[0]["university"] == "1"){
                $mail .=    "University 1: ".$res["university_1"]."<br />";
            }
            if($contact[0]["university"] == "2"){
                $mail .=    "University 1: ".$res["university_1"]."<br />";
                $mail .=    "University 2: ".$res["university_2"]."<br />";
            }
            
            foreach($character_texts as $character_text){
                
                if($character_text["id"] == $aCharacter["id"]){
                    if(!empty($character_text["rumour"])){
                        $mail .=    "&nbsp;<br />Je character hoort het volgende gerucht:".self::paragraph($character_text["rumour"]);
                    }
                    if(!empty($character_text["remark"])){
                        $mail .=    self::paragraph($character_text["remark"]);
                    }
                    
                    $xp = 0;
					/*
                    if(!empty($character_text["xp"])){
                        $xp = $character_text["xp"];
                    }
                    */
					
					
                }
            }
			
			$xp = 0;
			$currentXp = $cXp->CountXp($aCharacter["id"]);
			$sessionXp = $cXp->GetSessionXp($aCharacter["user_id"],$aCharacter["id"]);
			$xp = $sessionXp - $currentXp + $aCharacter["xp"];
			
			$mail .=    "<p>XP die je over hebt: <b>".$xp."XP</b> voor <b>".$aCharacter["name"]."</b></p>"; 
            
            /* renown uit tijdelijk
            $mail .= "<p><b>Je Huidige renown</b><br />Glory: ".$aCharacter["glory"]."<br />Honor: ".$aCharacter["honor"]."<br />Wisdom: ".$aCharacter["wisdom"]."</p>";
            */
            
            if(!empty($res["times"])){
            $mail .=    "<p>Wil je weten wat er gebeurd in de hele wereld van de Garou, lees dan hier alvast de Garou Times:<br />";
            $mail .=    '<a href="'.$res["times"].'">Klik hier om de Garou times te lezen</a></p>';
            }
            
            $mail .= '<p>Mocht je nog zaken willen uitspelen of doorspreken laat het even weten via <a href="mailto:bluepelt.nar@gmail.com">bluepelt.nar@gmail.com</a> en zorg dat je zaterdag op tijd in de Bebop bent.<br />Moet je nog xp uitgeven voer het in op <a href="https://www.bluepelt.nl/>">bluepelt.nl</a>.</p>';
            
            $mail .= "Groet,<br />Het Narratorteam";
            
            
            $list = get_html_translation_table(HTML_ENTITIES);
            unset($list['"']);
            unset($list['<']); 
            unset($list['>']);
            unset($list['&']);
            
            $search = array_keys($list);
            $values = array_values($list);
            $search = array_map('utf8_encode', $search);
            
            $str_in = $mail;
            $str_out = str_replace($search, $values, $str_in);
            
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= "from: info@bluepelt.nl";
            
            if($user["level"] != 2){
                $mailsucces .= mail($user["email"], $subject, $mail, $headers);
            }
            
            //return $mailsucces;
            $mailsucces .= " ".$user["email"]."<br /> ";
            
        } 
        phpmailer::sendMailing("mailing verstuurd", $mailsucces, "rolfsiebers@gmail.com");
        return "success";
    }
    
}

?>