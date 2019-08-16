<?php

class backgrounds{
    
    function AddBackground($aBackground){
		$sName 	= $aBackground['name'];
		$sInfo 	= $aBackground['info'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_backgrounds (name, info) VALUES (?, ?)");
        $stmt->execute(array($sName, $sInfo));

		return "success";
	}
    
    function DeleteBackground($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_backgrounds WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Background is verwijderd.";
    }
    
    function EditBackground($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        $info   = $aPost["info"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_backgrounds SET name=?, info=? WHERE id = ?");
        $stmt->execute(array($name, $info, $id));

		return "success";
    }
    
    function GetAllBackgrounds(){
        $query = "SELECT * FROM werewolf_backgrounds ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetBackgroundById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_backgrounds where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>