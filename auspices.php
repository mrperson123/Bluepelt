<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $auspice = new auspices();
        $result = $auspice->DeleteAuspice($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Auspices overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $oAuspices = new auspices();
            $aAuspicelist = $oAuspices->GetAllAuspices();
            foreach($aAuspicelist as $aAuspice){
                ?>
             <tr>
                <td>
                    <?php echo $aAuspice["name"] ?>
                </td>
                <td>
                    <a href="/edit_auspice.php?id=<?php echo $aAuspice["id"] ?>">Auspices aanpassen</a> <a href="?del=<?php echo $aAuspice["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Auspice <?php echo $aAuspice["auspices"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_auspice.php">Nieuwe Auspice toevoegen</a>
    </div>
</div>
</html>