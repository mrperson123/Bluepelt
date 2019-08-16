<?php

class flaws{
    
    function AddFlaw($aFlaws){
        
		$sName 	    = $aFlaws['name'];
		$sInfo 	    = $aFlaws['info'];
        $sXp 	    = $aFlaws['xp'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_flaws (name, info, xp) VALUES (?, ?, ?)");
        $stmt->execute(array($sName, $sInfo, $sXp));

		return "success";
	}
    
    function DeleteFlaw($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_flaws WHERE id = ?");
        $stmt->execute(array($id));
        
        return "De Flaw is verwijderd.";
    }
    
    function EditFlaw($aFlaws){        
        $id         = $aFlaws["id"];
        $sName 	    = $aFlaws['name'];
		$sInfo 	    = $aFlaws['info'];
        $sXp 	    = $aFlaws['xp'];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_flaws SET name=?, info=?, xp=? WHERE id = ?");
        $stmt->execute(array($sName, $sInfo, $sXp, $id));

		return "success";
    }
    
    function GetAllFlaws(){
        $query = "SELECT * FROM werewolf_flaws ORDER BY xp ASC, name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetFlawById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_flaws where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>