<?php

class tribes{
    
    function AddTribe($aTribe){
		$sName 	= $aTribe['name'];
		$sInfo 	= $aTribe['info'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_tribes (tribes, general_info) VALUES (?, ?)");
        $stmt->execute(array($sName, $sInfo));

		return "success";
	}
    
    function DeleteTribe($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_tribes WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Tribe is verwijderd.";
    }
    
    function EditTribe($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        $info   = $aPost["info"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_tribes SET tribes=?, general_info=? WHERE id = ?");
        $stmt->execute(array($name, $info, $id));

		return "success";
    }
    
    function GetAllTribes(){
        $query = "SELECT * FROM werewolf_tribes ORDER BY tribes ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetTribeById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_tribes where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>