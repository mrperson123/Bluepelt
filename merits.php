<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $merit = new merits();
        $result = $merit->DeleteMerit($id);
    }
    
    $cTribes     = new tribes();
    
    $aTribes     = $cTribes->GetAllTribes();
    
    $oMerits     = new merits();
    $aMeritlist  = $oMerits->GetAllMerits();
?>
</body>
<div id="main">
    <div class="container">
        <h1>Merits overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        
        <strong>Merits per Tribes</strong><br />
        <?php 
            
            foreach($aTribes as $aTribe){
        ?>
        <strong><?php echo $aTribe["tribes"] ?></strong><br />
        <table width="100%">
            <?php 
                foreach($aMeritlist as $aMerit){
                    
                    if(!empty($aMerit["merit_tribe"])){
                        if($aTribe["id"] == $aMerit["merit_tribe"]){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aMerit["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aMerit["xp"]; ?>
                            </td>
                            <td>
                                <a href="/edit_merit.php?id=<?php echo $aMerit["id"] ?>">Merit aanpassen</a> <a href="?del=<?php echo $aMerit["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Merit <?php echo $aMerit["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    
                }
            ?>
        </table><br /><br />
        <?php
            }
        ?>
        
        <strong>Merits per Factions</strong><br />

        <strong>Concordat of Stars</strong><br />
        <table width="100%">
            <?php 
                foreach($aMeritlist as $aMerit){
                    
                    if(!empty($aMerit["merit_faction"])){
                        if($aMerit["merit_faction"] == 1){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aMerit["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aMerit["xp"]; ?>
                            </td>
                            <td>
                                <a href="/edit_merit.php?id=<?php echo $aMerit["id"] ?>">Merit aanpassen</a> <a href="?del=<?php echo $aMerit["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Merit <?php echo $aMerit["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    
                }
            ?>
        </table><br /><br />
        <strong>Sanctum of Gaia</strong><br />
        <table width="100%">
            <?php 
                foreach($aMeritlist as $aMerit){
                    
                    if(!empty($aMerit["merit_faction"])){
                        if($aMerit["merit_faction"] == 2){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aMerit["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aMerit["xp"]; ?>
                            </td>
                            <td>
                                <a href="/edit_merit.php?id=<?php echo $aMerit["id"] ?>">Merit aanpassen</a> <a href="?del=<?php echo $aMerit["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Merit <?php echo $aMerit["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    
                }
            ?>
        </table><br /><br />
        
        <strong>General Merits</strong><br />
        <table width="100%">
            <?php 
                foreach($aMeritlist as $aMerit){
                    
                    if(!empty($aMerit["merit_general"])){
                        if($aMerit["merit_general"] == 1){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aMerit["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aMerit["xp"]; ?>
                            </td>
                            <td>
                                <a href="/edit_merit.php?id=<?php echo $aMerit["id"] ?>">Merit aanpassen</a> <a href="?del=<?php echo $aMerit["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Merit <?php echo $aMerit["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    
                }
            ?>
        </table><br /><br />
   
        
        <br /><a href="edit_merit.php">Nieuwe Merit toevoegen</a>
    </div>
</div>
</html>