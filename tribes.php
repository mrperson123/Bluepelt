<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $tribe = new tribes();
        $result = $tribe->DeleteTribe($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Tribes overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $oTribes = new tribes();
            $aTribelist = $oTribes->GetAllTribes();
            foreach($aTribelist as $aTribe){
                ?>
             <tr>
                <td>
                    <?php echo $aTribe["tribes"] ?>
                </td>
                <td>
                    <a href="/edit_tribe.php?id=<?php echo $aTribe["id"] ?>">Tribe aanpassen</a> <a href="?del=<?php echo $aTribe["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Tribe <?php echo $aTribe["tribes"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_tribe.php">Nieuwe Tribe toevoegen</a>
    </div>
</div>
</html>