<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $skill = new skills();
        $result = $skill->DeleteSkill($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Skills overzicht</h1>
        <table width="100%" id="users-list">
        <?php 
            $oSkills = new skills();
            $aSkillslist = $oSkills->GetAllSkills();
            foreach($aSkillslist as $skill){
                ?>
             <tr>
                <td>
                    <?php echo $skill["name"] ?>
                </td>
                <td>
                    <a href="/edit_skill.php?id=<?php echo $skill["id"] ?>">Skill aanpassen</a>  <a href="?del=<?php echo $skill["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Tribe <?php echo $skill["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_skill.php">Nieuwe Skill toevoegen</a>
    </div>
</div>
</html>