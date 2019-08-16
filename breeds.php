<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $breed = new breeds();
        $result = $breed->DeleteBreed($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Breeds overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $oBreeds = new breeds();
            $aBreedlist = $oBreeds->GetAllBreeds();
            foreach($aBreedlist as $aBreed){
                ?>
             <tr>
                <td>
                    <?php echo $aBreed["name"] ?>
                </td>
                <td>
                    <a href="/edit_breed.php?id=<?php echo $aBreed["id"] ?>">Breeds aanpassen</a> <a href="?del=<?php echo $aBreed["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Breed <?php echo $aBreed["breeds"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_breed.php">Nieuwe Breed toevoegen</a>
    </div>
</div>
</html>