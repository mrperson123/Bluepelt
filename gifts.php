<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $gift = new gifts();
        $result = $gift->DeleteGift($id);
    }
    
    $cAuspices   = new auspices();
    $cBreeds     = new breeds();
    $cTribes     = new tribes();
    
    $aAuspices   = $cAuspices->GetAllAuspices();
    $aBreeds     = $cBreeds->GetAllBreeds();
    $aTribes     = $cTribes->GetAllTribes();
    
    $oGifts = new gifts();
    $aGiftlist = $oGifts->GetAllGifts();
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>Gifts overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <strong>Gifts per Auspice</strong><br />
        <?php 
            
            foreach($aAuspices as $aAuspice){
        ?>
        <strong><?php echo $aAuspice["name"] ?></strong><br />
        <table width="100%">
            <?php 
                foreach($aGiftlist as $aGift){
                    $gift_auspice = unserialize($aGift["gift_auspice"]);
                    if(!empty($gift_auspice)){
                        if(in_array($aAuspice["id"], $gift_auspice)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aGift["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aGift["level"]; ?>
                            </td>
                            <td>
                                <a href="/edit_gift.php?id=<?php echo $aGift["id"] ?>">Gift aanpassen</a> <a href="?del=<?php echo $aGift["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Gift <?php echo $aGift["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        
        <strong>Gifts per Breed</strong><br />
        <?php 
            
            foreach($aBreeds as $aBreed){
        ?>
        <strong><?php echo $aBreed["name"] ?></strong><br />
        <table width="100%">
            <?php 
                foreach($aGiftlist as $aGift){
                    $gift_breed = unserialize($aGift["gift_breed"]);
                    if(!empty($gift_breed)){
                        if(in_array($aBreed["id"], $gift_breed)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aGift["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aGift["level"]; ?>
                            </td>
                            <td>
                                <a href="/edit_gift.php?id=<?php echo $aGift["id"] ?>">Gift aanpassen</a> <a href="?del=<?php echo $aGift["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Gift <?php echo $aGift["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        
        <strong>Gifts per Tribes</strong><br />
        <?php 
            
            foreach($aTribes as $aTribe){
        ?>
        <strong><?php echo $aTribe["tribes"] ?></strong><br />
        <table width="100%">
            <?php 
                foreach($aGiftlist as $aGift){
                    
                    
                    $gift_tribe = unserialize($aGift["gift_tribe"]);
                    if(!empty($gift_tribe)){
                        if(in_array($aTribe["id"], $gift_tribe)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $aGift["name"]; ?>
                            </td>
                            <td>
                                <?php echo $aGift["level"]; ?>
                            </td>
                            <td>
                                <a href="/edit_gift.php?id=<?php echo $aGift["id"] ?>">Gift aanpassen</a> <a href="?del=<?php echo $aGift["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Gift <?php echo $aGift["name"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        
        <br /><a href="edit_gift.php">Nieuwe Gift toevoegen</a>
    </div>
</div>
</html>