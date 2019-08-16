<?php

class users{
    function GetAllUsers(){
        $query = "SELECT * FROM werewolf_player ORDER BY playername ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();

        return $res;
    }
}

?>