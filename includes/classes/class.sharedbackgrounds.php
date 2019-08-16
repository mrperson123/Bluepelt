<?php

class sharedbackgrounds{
    
    function AddSharedbackground($aBackground){
		$sName 	= $aBackground['name'];
		$sInfo 	= $aBackground['info'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_shared_backgrounds (name) VALUES (?)");
        $stmt->execute(array($sName));

		return "success";
	}
    
    function DeleteSharedbackground($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_shared_backgrounds WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Background is verwijderd.";
    }
    
    function EditSharedbackground($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        $info   = $aPost["info"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_shared_backgrounds SET name=?, info=? WHERE id = ?");
        $stmt->execute(array($name, $id));

		return "success";
    }
    
    function GetAllSharedbackgrounds(){
        $query = "SELECT * FROM werewolf_shared_backgrounds ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetSharedbackgroundById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_shared_backgrounds where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>