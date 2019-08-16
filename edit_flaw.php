<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $flaw = new flaws();
        $aRes = $flaw->GetFlawById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Flaw toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Flaw naam" required /><br />
    		<textarea name="info" placeholder="Uitleg over de flaw" ></textarea><br /><br />
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
            </select><br />
            <input name="xf" type="hidden" value="addflaw" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Flaw is toegevoegd.
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
         <h1>Flaw aanpassen</h1>
         <pre>
         </pre>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Flaw naam" value="<?php echo $aRes["name"] ?>" required /><br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editflaw" />
    		<textarea name="info" placeholder="Uitleg over de flaw" ><?php echo $aRes["info"] ?></textarea><br /><br />
            <select name="xp">
	            <option <?php if($aRes["xp"] == 0){echo ' selected="selected "';} ?> value="0">0</option>
                <option <?php if($aRes["xp"] == 1){echo ' selected="selected "';} ?> value="1">1</option>
                <option <?php if($aRes["xp"] == 2){echo ' selected="selected "';} ?> value="2">2</option>
                <option <?php if($aRes["xp"] == 3){echo ' selected="selected "';} ?> value="3">3</option>
                <option <?php if($aRes["xp"] == 4){echo ' selected="selected "';} ?> value="4">4</option>
                <option <?php if($aRes["xp"] == 5){echo ' selected="selected "';} ?> value="5">5</option>
                <option <?php if($aRes["xp"] == 6){echo ' selected="selected "';} ?> value="6">6</option>
                <option <?php if($aRes["xp"] == 7){echo ' selected="selected "';} ?> value="7">7</option>
            </select><br />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Flaw is aangepast.
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
</body>
</html>