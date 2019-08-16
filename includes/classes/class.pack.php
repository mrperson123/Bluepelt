<?php

class pack{
    
    function AddPack($aPack){
		$sName 	= $aPack['name'];
		$stmt = db::$conn->prepare("INSERT INTO werewolf_pack (name) VALUES (?)");
        $stmt->execute(array($sName));

		return "success";
	}
    
    function DeletePack($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_pack WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Pack is verwijderd.";
    }
	
	function EditPack($aPost){
        $id     	= $aPost["id"];
        $name   	= $aPost["name"];
		$territoria = "";
		if(isset($aPost["territoria"])){
			$territoria = serialize($aPost["territoria"]);
		}
		$nar		= "";
		if(isset($aPost["narrator_snippet"])){
			$nar = $aPost["narrator_snippet"];
		}
		$totem		= "";
		if(isset($aPost["totem"])){
			$totem		= $aPost["totem"];
		}
		
        $stmt = db::$conn->prepare("INSERT INTO werewolf_pack_edit (pack_id, name, territoria, totem) VALUES (?, ?, ?, ?)");
        $stmt->execute(array($id, $name, $territoria, $totem)); 

		return "success";
    }
    
    function EditPackAdmin($aPost){
        $id     	= $aPost["id"];
        $name   	= $aPost["name"];
		$territoria = "";
		if(isset($aPost["territoria"])){
			$territoria = serialize($aPost["territoria"]);
		}
		$nar		= "";
		if(isset($aPost["narrator_snippet"])){
			$nar = $aPost["narrator_snippet"];
		}
		$totem		= "";
		if(isset($aPost["totem"])){
			$totem		= $aPost["totem"];
		}
		
        $stmt = db::$conn->prepare("UPDATE werewolf_pack SET name=?, territoria=?, narrator_snippet=?, totem=? WHERE id = ?");
        $stmt->execute(array($name, $territoria, $nar, $totem, $id)); 

		return "success";
    }

	//check if character is edited
    function CheckForEdit($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_pack_edit where pack_id=?");
		$res = $stmt->execute(array($post));
		$res = $stmt->rowCount();
        
        return $res;
    }
	
    function GetAllPacks(){
        $query = "SELECT * FROM werewolf_pack ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetPackMembers($post){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_character where pack_name LIKE ? ORDER BY name ASC");
		$stmt->execute(array($post));
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetPackById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_pack where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>