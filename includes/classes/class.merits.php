<?php

class merits{
    
    function AddMerit($aMerits){
        $sTribe 	= "";
        $sFaction 	= "";
        $sGeneral 	= "";
        
		$sName 	    = $aMerits['name'];
		$sInfo 	    = $aMerits['info'];
        $sXp 	    = $aMerits['xp'];
        if(!empty($aMerits['merit_tribe'])){
            $sTribe 	= $aMerits['merit_tribe'];
        }
        if(!empty($aMerits['merit_faction'])){
        $sFaction 	= $aMerits['merit_faction'];
        }
        if(!empty($aMerits['merit_general'])){
        $sGeneral 	= $aMerits['merit_general'];
        }

		$stmt = db::$conn->prepare("INSERT INTO werewolf_merits (name, info, xp, merit_tribe, merit_faction, merit_general) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($sName, $sInfo, $sXp, $sTribe, $sFaction, $sGeneral));

		return "success";
	}
    
    function DeleteMerit($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_merits WHERE id = ?");
        $stmt->execute(array($id));
        
        return "De Merit is verwijderd.";
    }
    
    function EditMerit($aMerits){
        $sTribe 	= "";
        $sFaction 	= "";
        $sGeneral 	= "";
        
        $id         = $aMerits["id"];
        $sName 	    = $aMerits['name'];
		$sInfo 	    = $aMerits['info'];
        $sXp 	    = $aMerits['xp'];
        if(!empty($aMerits['merit_tribe'])){
            $sTribe 	= $aMerits['merit_tribe'];
        }
        if(!empty($aMerits['merit_faction'])){
        $sFaction 	= $aMerits['merit_faction'];
        }
        if(!empty($aMerits['merit_general'])){
        $sGeneral 	= $aMerits['merit_general'];
        }
        
        $stmt = db::$conn->prepare("UPDATE werewolf_merits SET name=?, info=?, xp=?, merit_tribe=?, merit_faction=?, merit_general=? WHERE id = ?");
        $stmt->execute(array($sName, $sInfo, $sXp, $sTribe, $sFaction, $sGeneral, $id));

		return "success";
    }
    
    function GetAllMerits(){
        $query = "SELECT * FROM werewolf_merits ORDER BY xp ASC, name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetMeritById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_merits where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>