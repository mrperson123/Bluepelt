<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $flaw = new flaws();
        $result = $flaw->DeleteFlaw($id);
    }
    
    $oFlaws     = new flaws();
    $aFlawlist  = $oFlaws->GetAllFlaws();
?>
</body>
<div id="main">
    <div class="container">
        <h1>Flaws overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        
        
        <table width="100%">
            <?php 
                foreach($aFlawlist as $aFlaw){

                        ?>
                        <tr>
                            <td>
                                <?php echo $aFlaw["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aFlaw["xp"]; ?>
                            </td>
                            <td>
                                <a href="/edit_flaw.php?id=<?php echo $aFlaw["id"] ?>">Flaw aanpassen</a> <a href="?del=<?php echo $aFlaw["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Flaw <?php echo $aFlaw["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 

                    
                }
            ?>
        </table><br />
   
        
        <br /><a href="edit_flaw.php">Nieuwe Flaw toevoegen</a>
    </div>
</div>
</html>