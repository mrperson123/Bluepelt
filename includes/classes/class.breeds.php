<?php

class breeds{
    
    function AddBreed($aBreed){
		$sName 	= $aBreed['name'];
		$sInfo 	= $aBreed['info'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_breeds (name, info) VALUES (?, ?)");
        $stmt->execute(array($sName, $sInfo));

		return "success";
	}
    
    function DeleteBreed($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_breeds WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Breed is verwijderd.";
    }
    
    function EditBreed($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        $info   = $aPost["info"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_breeds SET name=?, info=? WHERE id = ?");
        $stmt->execute(array($name, $info, $id));

		return "success";
    }
    
    function GetAllBreeds(){
        $query = "SELECT * FROM werewolf_breeds ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetBreedById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_breeds where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
}

?>