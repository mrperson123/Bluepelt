<?php

class session{
    
    function AddSession($aPost){
        $sNumber  = $aPost["number"];
		$sName    = $aPost["name"];
        
		$stmt = db::$conn->prepare("INSERT INTO werewolf_session (number, name) VALUES (?, ?)");
        $stmt->execute(array($aPost["number"], $sName));
        
		return "success";
	}
    
    function DeleteSession($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_session WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Session is verwijderd.";
    }
    
    function EditSession($aPost){
        $id     = $aPost["id"];
        $sNumber  = $aPost["number"];
		$sName    = $aPost['name'];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_session SET number=?, name=? WHERE id = ?");
        $stmt->execute(array($sNumber, $sName, $id));

		return "success";
    }

    function GetAllSessions(){
        $query = "SELECT * FROM werewolf_session ORDER BY number ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function GetSessionById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_session where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
    
    function savePayment($post){
        $id         = $post["id"];
        $serialized = serialize($post["player"]);
        
        $stmt = db::$conn->prepare("UPDATE werewolf_session SET payment=? WHERE id = ?");
        $stmt->execute(array($serialized, $id));
        
        return "success";
    }
    
}

?>