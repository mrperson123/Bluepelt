<?php 
    include("header.php");
    
    $cCharacters    = new character();
    $cUser          = new user();
    
    $level = $cUser->AdminCheck();
    
    if(isset($_GET["approve"])){
        $cCharacters->ApproveEdit($_GET["approve"]);
        $message = "approved";
    }
    
    if(isset($_GET["decline"])){
        $cCharacters->DeclineEdit($_GET["decline"]);
        $message = "declined";
    }
    
    
    $edited = $cCharacters->GetAllEditedCharacters();
    
    
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>Gewijzigde Characters</h1>
        <table width="100%">
            <thead>
                <td>
                    Player naam
                </td>
                <td>
                    Character Naam
                </td>
                <td>
                    
                </td>
            </thead>
            <?php
                foreach($edited as $edit){
                    $aCharacter     = $cCharacters->GetCharacterById($edit["character_id"]);
                    $aUser          = $cUser->GetUserById($edit["user_id"]);
                    ?>
                    <tr>
                        <td>
                            <?php echo $aUser["playername"] ?>
                        </td>
                        <td>
                            <?php echo $aCharacter["name"] ?>
                        </td>
                        <td>
                            <a href="character_edited.php?id=<?php echo $edit["id"] ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
</html>