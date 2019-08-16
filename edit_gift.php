<?php 
    include("header.php");
    user::Admin();
    $cAuspices   = new auspices();
    $cBreeds     = new breeds();
    $cTribes     = new tribes();
    
    $aAuspices   = $cAuspices->GetAllAuspices();
    $aBreeds     = $cBreeds->GetAllBreeds();
    $aTribes     = $cTribes->GetAllTribes();
    
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $gifts = new gifts();
        $aRes = $gifts->GetGiftById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Gift toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Gift naam" required /><br />
            <textarea name="info" placeholder="Uitleg over de gift" ></textarea><br />
            <textarea name="testpool" placeholder="Testpool van de gift" ></textarea><br /><br />
            <textarea name="focus" placeholder="Focus van de gift" ></textarea><br /><br />
            <br />
            <strong>
                Selecteer hieronder welk level de gift is.<br />
            </strong>
            <select name="level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br /><br />
            <strong>
                Maak hier onder een keuze uit Auspice, Breed of Tribe waar de gift onder valt.<br />
            </strong>
            Onder welke Auspice valt de gift<br />
                <?php foreach($aAuspices as $aAuspice){ ?>
                <input name="gift_auspice[]" type="checkbox" value="<?php echo $aAuspice["id"]; ?>" id="aus<?php echo $aAuspice["id"]; ?>"><label for="aus<?php echo $aAuspice["id"]; ?>"><?php echo $aAuspice["name"]; ?></label><br />      
                <?php } ?>
            <br />
            Onder welke Breed valt de gift<br />
            <?php foreach($aBreeds as $aBreed){ ?>
                <input name="gift_breed[]" type="checkbox" value="<?php echo $aBreed["id"]; ?>" id="breed<?php echo $aBreed["id"]; ?>"><label for="breed<?php echo $aBreed["id"]; ?>"><?php echo $aBreed["name"]; ?></label><br />      
                <?php } ?>
            <br />
            Onder welke Tribe valt de gift<br />
            <?php foreach($aTribes as $aTribe){ ?>
                <input name="gift_tribe[]" type="checkbox" value="<?php echo $aTribe["id"]; ?>" id="tribe<?php echo $aTribe["id"]; ?>"><label for="tribe<?php echo $aTribe["id"]; ?>"><?php echo $aTribe["tribes"]; ?></label><br />      
                <?php } ?>
            <br />
            <input name="xf" type="hidden" value="addgift" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Gift is toegevoegd.
            </p>
        </div>
        <script>
    		$('#signupform').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#signupform').serialize(),
    		        success: function(response)
    		        {
	                    console.log(response);
    		            $("."+response).slideToggle();
                        if(response == "success"){
                            $("#signupform").slideToggle();
                        }
    		        }               
    		    });
    		});
    	</script>
        <?php }elseif($edit == 1){ ?>
        <h1>Gift aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Gift naam" value="<?php echo $aRes["name"] ?>" required /><br />
            <textarea name="info" placeholder="Uitleg over de gift" ><?php echo $aRes["info"] ?></textarea><br />
            <textarea name="testpool" placeholder="Testpool van de gift" ><?php echo $aRes["testpool"] ?></textarea><br />
            <textarea name="focus" placeholder="Focus van de gift" ><?php echo $aRes["focus"] ?></textarea><br /><br /><br />
            <br />
            <strong>
                Selecteer hieronder welk level de gift is.<br />
            </strong>
            <select name="level">
                <option <?php if($aRes["level"] == 1){?>selected="selected"<?php } ?> value="1">1</option>
                <option <?php if($aRes["level"] == 2){?>selected="selected"<?php } ?>value="2">2</option>
                <option <?php if($aRes["level"] == 3){?>selected="selected"<?php } ?>value="3">3</option>
                <option <?php if($aRes["level"] == 4){?>selected="selected"<?php } ?>value="4">4</option>
                <option <?php if($aRes["level"] == 5){?>selected="selected"<?php } ?>value="5">5</option>
            </select><br /><br />
            <strong>
                Maak hier onder een keuze uit Auspice, Breed of Tribe waar de gift onder valt.<br />
            </strong>
            Onder welke Auspice valt de gift<br />
                <?php foreach($aAuspices as $aAuspice){ ?>
                <input name="gift_auspice[]" type="checkbox" 
                <?php 
                $gift_auspice = unserialize($aRes["gift_auspice"]);
                    if(!empty($gift_auspice)){
                        if(in_array($aAuspice["id"], $gift_auspice)){
                        ?>
                        checked="checked"
                        <?php 
                        }
                    }
                ?>
                value="<?php echo $aAuspice["id"]; ?>" id="aus<?php echo $aAuspice["id"]; ?>"><label for="aus<?php echo $aAuspice["id"]; ?>"><?php echo $aAuspice["name"]; ?></label><br />      
                <?php } ?>
            <br />
            Onder welke Breed valt de gift<br />
            <?php foreach($aBreeds as $aBreed){ ?>
                <input name="gift_breed[]" type="checkbox"
                <?php 
                $gift_breed = unserialize($aRes["gift_breed"]);
                    if(!empty($gift_breed)){
                        if(in_array($aBreed["id"], $gift_breed)){
                        ?>
                        checked="checked"
                        <?php 
                        }
                    }
                ?>
                
                 value="<?php echo $aBreed["id"]; ?>" id="breed<?php echo $aBreed["id"]; ?>"><label for="breed<?php echo $aBreed["id"]; ?>"><?php echo $aBreed["name"]; ?></label><br />      
                <?php } ?>
            <br />
            Onder welke Tribe valt de gift<br />
            <?php foreach($aTribes as $aTribe){ ?>
                <input name="gift_tribe[]" type="checkbox"
                <?php 
                $gift_tribe = unserialize($aRes["gift_tribe"]);
                    if(!empty($gift_tribe)){
                        if(in_array($aTribe["id"], $gift_tribe)){
                        ?>
                        checked="checked"
                        <?php 
                        }
                    }
                ?>
                
                 value="<?php echo $aTribe["id"]; ?>" id="tribe<?php echo $aTribe["id"]; ?>"><label for="tribe<?php echo $aTribe["id"]; ?>"><?php echo $aTribe["tribes"]; ?></label><br />      
                <?php } ?>
            <br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editgift" />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Gift is aangepast.
            </p>
        </div>
        <script>
    		$('#signupform').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#signupform').serialize(),
    		        success: function(response)
    		        {
	                    console.log(response);
    		            $("."+response).slideToggle();
                        if(response == "success"){
                            $("#signupform").slideToggle();
                        }
    		        }               
    		    });
    		});
    	</script>
        <?php } ?>
    </div>
</div>
</html>