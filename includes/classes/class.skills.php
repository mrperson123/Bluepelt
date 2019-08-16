<?php 

class skills{
    
    function Addskill($aTribe){
		$sName 	= $aTribe['name'];

		$stmt = db::$conn->prepare("INSERT INTO werewolf_skills (name) VALUES (?)");
        $stmt->execute(array($sName));

		return "success";
	}
    
    function DeleteSkill($id){
        $stmt = db::$conn->prepare("DELETE FROM werewolf_skills WHERE id  = ?");
        $stmt->execute(array($id));
        
        return "De Skill is verwijderd.";
    }
    
    function EditSkill($aPost){
        $id     = $aPost["id"];
        $name   = $aPost["name"];
        
        $stmt = db::$conn->prepare("UPDATE werewolf_skills SET name=? WHERE id = ?");
        $stmt->execute(array($name, $id));

		return "success";
    }
    
    function GetAllSkills(){
        $query = "SELECT * FROM werewolf_skills ORDER BY name ASC";
		$stmt = db::$conn->query($query);
		$res = $stmt->fetchAll();
        return $res;
    }
    
    function GetSkillById($id){
        $stmt = db::$conn->prepare("SELECT * FROM werewolf_skills where id LIKE ?");
        $stmt->execute(array($id));
        $res = $stmt->fetch();
        
        return $res;
    }
}

?>