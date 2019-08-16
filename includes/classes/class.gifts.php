<?php 

class gifts{
    function AddGift($post){
        //return($post);
        $sAuspice   = "";
        $sBreed     = "";
        $sTribe     = "";
        
        $sName 	    = $post['name'];
		$sInfo 	    = $post['info'];
        $sLevel 	= $post['level'];
        if(!empty($post['gift_auspice'])){$sAuspice = serialize($post['gift_auspice']);};
        if(!empty($post['gift_breed'])){$sBreed = serialize($post['gift_breed']);};
        if(!empty($post['gift_tribe'])){$sTribe = serialize($post['gift_tribe']);};
        $sTestpool 	= $post['testpool'];
        $sFocus 	= $post['focus'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_gifts (name, level, info, gift_auspice, gift_breed, gift_tribe, testpool, focus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($sName, $sLevel, $sInfo, $sAuspice, $sBreed, $sTribe, $sTestpool, $sFocus));

		return "success";
    }
    
    function EditGift($post){
        //return($post);
        $sAuspice   = "";
        $sBreed     = "";
        $sTribe     = "";
        
        $sName 	    = $post['name'];
		$sInfo 	    = $post['info'];
        $sLevel 	= $post['level'];
        if(!empty($post['gift_auspice'])){$sAuspice = serialize($post['gift_auspice']);};
        if(!empty($post['gift_breed'])){$sBreed = serialize($post['gift_breed']);};
        if(!empty($post['gift_tribe'])){$sTribe = serialize($post['gift_tribe']);};
        $sTestpool 	= $post['testpool'];
        $sFocus 	= $post['focus'];
        $sId        = $post["id"];

		$stmt = db::$conn->prepare("UPDATE werewolf_gifts SET name=?, level=?, info=?, gift_auspice=?, gift_breed=?, gift_tribe=?, testpool=?, focus=? WHERE id = ?");
        $stmt->execute(array($sName, $sLevel, $sInfo, $sAuspice, $sBreed, $sTribe, $sTestpool, $sFocus, $sId));


		return "success";
    }
    
    function GetAllGifts(){
        $query = "SELECT * FROM werewolf_gifts ORDER BY level ASC, name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        
        return $res;
    }
    
    function DeleteGift($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_gifts WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Gift is verwijderd.";
    }
    
    function GetGiftById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_gifts where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
}

?>