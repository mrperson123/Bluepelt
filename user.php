<?php 
    include("header.php");
    if(!isset($_SESSION["userid"])){
        header("location: ".$GLOBALS["url"]);
    }
    
    $cCharacters    = new character();
    $cUser          = new user();
    $cXp            = new xp();
    
    $level = $cUser->AdminCheck();
    
    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userid'];
    
    if($level == 1){
        if(isset($_GET["id"])){
            $aUser = $cUser->GetUserById($_GET["id"]);
            $username   = $aUser["playername"];
            $userId     = $aUser["id"];
        }
    }
    
    $aCharacters = $cCharacters->GetAllCharacters($userId);
    
    if(isset($_GET["active"])){
        $characterId    = $_GET["active"];
        $exists         = "";
        
        foreach($aCharacters as $aCharacter){
            if($characterId == $aCharacter["id"]){
                $exists = 1;
            }
        }
        
        $adminExtra = "";
        
        if($level == 1){
           $exists = 1;
           $adminExtra = "?id=".$userId;
        }
        
        $url = "user.php".$adminExtra;
        
        if($exists == 1){
            $cCharacters->SetCharacterActive($userId,$characterId);
            ?>
            <script>
            window.location.replace("<?php echo $url ?>");
            </script>
            <?
            header("Refresh:0; url=$url");
        }
    }
    
    if(isset($_GET["del"])){
        $characterId    = $_GET["del"];
        $exists         = "";
        
        foreach($aCharacters as $aCharacter){
            if($characterId == $aCharacter["id"]){
                $exists = 1;
            }
        }
        
        if($level == 1){
           $exists = 1;
           $adminExtra = "&id=".$userId;
        }
        
        $url = "user.php?dmessage=1".$adminExtra;
        
        if($exists == 1){
            $cCharacters->DeleteCharacter($characterId);
            ?>
            <script>
            window.location.replace("<?php echo $url ?>");
            </script>
            <?
            header("Refresh:0; url=$url");
        }
    }
    
    if(isset($_GET["dmessage"])){
        if($_GET["dmessage"] == 1){
            $message = "De character is verwijderd";
        }
    }   
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>User <?php echo $username;?></h1>
        <?php if(isset($message)){
            echo "<h2>".$message."</h2><br />";
        } ?>
        <h6>
            Overzicht Characters 
        </h6>
        <table width="100%">
            <?php
                foreach($aCharacters as $aCharacter){
                    $edited = $cCharacters->CheckForEdit($aCharacter["id"]);
            ?>
            <tr>
                <td>
                    <a href="/character.php?id=<?php echo $aCharacter["id"] ?>">
                        <?php
                            if($aCharacter["active"] == 1){
                                echo "<strong>";
                            }
                            echo $aCharacter["name"];
                            if($aCharacter["active"] == 1){
                                echo "</strong>";
                            }
                        ?>
                    </a>
                </td>
                <td>
                    <?php
                    $currentXp = $cXp->CountXp($aCharacter["id"]);
                    $sessionXp = $cXp->GetSessionXp($userId,$aCharacter["id"]);
                    $xp = $sessionXp - $currentXp + $aCharacter["xp"];
                    ?>
                    <?php echo $xp; ?> XP Over &nbsp;&nbsp;
                </td>
                <td>
                    <?php if($aCharacter["active"] != 1){ ?><a href="?active=<?php echo $aCharacter["id"] ?><?php if($level == 1){echo "&id=".$userId; } ?>">Zet als je huidige Character</a><?php } ?> 
                    <?php if($edited == "0"){ ?><a href="/edit_character.php?id=<?php echo $aCharacter["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php } ?>
                    <a href="?del=<?php echo $aCharacter["id"] ?><?php if($level == 1){echo "&id=".$userId; } ?>" onclick="return confirm('Weet je het zeker dat je de Character <?php echo $aCharacter["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table><br /><br />
        <a href="/create_character.php">Nieuw Character maken</a>
    </div>
</div>
</html>