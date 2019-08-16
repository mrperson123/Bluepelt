<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $background = new backgrounds();
        $result = $background->DeleteBackground($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Backgrounds overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $oBackgrounds = new backgrounds();
            $aBackgroundlist = $oBackgrounds->GetAllBackgrounds();
            foreach($aBackgroundlist as $aBackground){
                ?>
             <tr>
                <td>
                    <?php echo $aBackground["name"] ?>
                </td>
                <td>
                    <a href="/edit_background.php?id=<?php echo $aBackground["id"] ?>">Backgrounds aanpassen</a> <a href="?del=<?php echo $aBackground["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Background <?php echo $aBackground["backgrounds"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_background.php">Nieuwe Background toevoegen</a>
    </div>
</div>
</html>