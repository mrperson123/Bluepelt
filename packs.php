<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $pack = new pack();
        $result = $pack->DeletePack($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Packs overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $oPacks = new pack();
            $aPacklist = $oPacks->GetAllPacks();
            foreach($aPacklist as $aPack){
                ?>
             <tr>
                <td>
                    <a href="/pack?id=<?php echo $aPack["id"] ?>"><?php echo $aPack["name"] ?></a>
                </td>
                <td>
                    <a href="/edit_pack.php?id=<?php echo $aPack["id"] ?>">Pack aanpassen</a> <a href="?del=<?php echo $aPack["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Pack <?php echo $aPack["packs"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_pack.php">Nieuwe Pack toevoegen</a>
    </div>
</div>
</html>