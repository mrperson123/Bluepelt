<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $merit = new merits();
        $aRes = $merit->GetMeritById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    
    $cTribes     = new tribes();
    $aTribes     = $cTribes->GetAllTribes();
    
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Merit toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Merit naam" required /><br />
    		<textarea name="info" placeholder="Uitleg over de merit" ></textarea><br /><br />
            <strong>
                Aantal XP punten<br />
            </strong>
            <select name="xp">
	            <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select><br /><br />
            <strong>Onder welke Tribe valt de Merit</strong><br />
            <?php
                foreach($aTribes as $aTribe){
                    ?>
                    <input type="radio" name="merit_tribe" id="tribe<?php echo $aTribe["id"] ?>" value="<?php echo $aTribe["id"] ?>" /><label for="tribe<?php echo $aTribe["id"] ?>"><?php echo $aTribe["tribes"] ?></label><br />
                    <?
                }
             ?><input type="button" id="tribe_reset" value="Geen Tribe" /><br /><br />
             
             <strong>Onder welke Faction valt de Merit</strong><br />
             <input type="radio" name="merit_faction" id="faction1" value="1" /><label for="faction1">Concordat of Stars</label><br />
             <input type="radio" name="merit_faction" id="faction2" value="2" /><label for="faction2">Sanctum of Gaia</label><br />
             <input type="button" id="faction_reset" value="Geen Faction" /><br /><br />
             
             <strong>Is de Merit een General Merit?</strong><br />
             <input type="checkbox" name="merit_general" id="general_merit" value="1" /><label for="general_merit">General Merit</label> <br /><br />
            <input name="xf" type="hidden" value="addmerit" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Merit is toegevoegd.
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
    		            $("."+response).slideToggle();
                        if(response == "success"){
                            $("#signupform").slideToggle();
                        }
    		        }               
    		    });
    		});
    	</script>
         <?php }elseif($edit == 1){ ?>
         <h1>Merit aanpassen</h1>
         <pre>
         </pre>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Merit naam" value="<?php echo $aRes["name"] ?>" required /><br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editmerit" />
    		<textarea name="info" placeholder="Uitleg over de merit" ><?php echo $aRes["info"] ?></textarea><br /><br />
            <select name="xp">
	            <option <?php if($aRes["xp"] == 0){echo ' selected="selected "';} ?> value="0">0</option>
                <option <?php if($aRes["xp"] == 1){echo ' selected="selected "';} ?> value="1">1</option>
                <option <?php if($aRes["xp"] == 2){echo ' selected="selected "';} ?> value="2">2</option>
                <option <?php if($aRes["xp"] == 3){echo ' selected="selected "';} ?> value="3">3</option>
                <option <?php if($aRes["xp"] == 4){echo ' selected="selected "';} ?> value="4">4</option>
                <option <?php if($aRes["xp"] == 5){echo ' selected="selected "';} ?> value="5">5</option>
                <option <?php if($aRes["xp"] == 6){echo ' selected="selected "';} ?> value="6">6</option>
                <option <?php if($aRes["xp"] == 7){echo ' selected="selected "';} ?> value="7">7</option>
            </select><br /><br />
            <strong>Onder welke Tribe valt de Merit</strong><br />
            <?php
                foreach($aTribes as $aTribe){
                    ?>
                    <input type="radio" <?php if($aRes["merit_tribe"] == $aTribe["id"]){echo ' checked "';} ?> name="merit_tribe" id="tribe<?php echo $aTribe["id"] ?>" value="<?php echo $aTribe["id"] ?>" /><label for="tribe<?php echo $aTribe["id"] ?>"><?php echo $aTribe["tribes"] ?></label><br />
                    <?
                }
             ?><input type="button" id="tribe_reset" value="Geen Tribe" /><br /><br />
             
             <strong>Onder welke Faction valt de Merit</strong><br />
             <input type="radio" name="merit_faction" <?php if($aRes["merit_faction"] == 1){echo ' checked "';} ?> id="faction1" value="1" /><label for="faction1">Concordat of Stars</label><br />
             <input type="radio" name="merit_faction" <?php if($aRes["merit_faction"] == 2){echo ' checked "';} ?> id="faction2" value="2" /><label for="faction2">Sanctum of Gaia</label><br />
             <input type="button" id="faction_reset" value="Geen Faction" /><br /><br />
             
             <strong>Is de Merit een General Merit?</strong><br />
             <input type="checkbox" name="merit_general" id="general_merit" <?php if($aRes["merit_general"] == 1){echo ' checked';} ?> value="1" /><label for="general_merit">General Merit</label> <br /><br />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Merit is aangepast.
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
<script>
$("#tribe_reset").click(function(){
    $('input[name=merit_tribe]').attr('checked',false);
})
$("#faction_reset").click(function(){
    $('input[name=merit_faction]').attr('checked',false);
})
</script>
</body>
</html>