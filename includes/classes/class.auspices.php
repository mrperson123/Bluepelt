<?php

class auspices{
    
    function AddAuspice($aAuspice){
		$sName 	= $aAuspice['name'];
		$sInfo 	= $aAuspice['info'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_auspices (name, info) VALUES (?, ?)");
        $stmt->execute(array($sName, $sInfo));

		return "success";
	}
    
    function DeleteAuspice($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_auspices WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Auspice is verwijderd.";
    }
    
    function EditAuspice($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        $info   = $aPost["info"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_auspices SET name=?, info=? WHERE id = ?");
        $stmt->execute(array($name, $info, $id));

		return "success";
    }
    
    function GetAllAuspices(){
        $query = "SELECT * FROM werewolf_auspices ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetAuspiceById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_auspices where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>