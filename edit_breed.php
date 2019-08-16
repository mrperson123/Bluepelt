<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $breed = new breeds();
        $aRes = $breed->GetBreedById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Breed toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Breed naam" required /><br />
    		<textarea name="info" placeholder="Uitleg over de breed" required="required" ></textarea><br />
            <input name="xf" type="hidden" value="addbreed" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Breed is toegevoegd.
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
         <h1>Breed aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Breed naam" value="<?php echo $aRes["name"] ?>" required /><br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editbreed" />
    		<textarea name="info" placeholder="Uitleg over de breed" required="required" ><?php echo $aRes["info"] ?></textarea><br />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Breed is aangepast.
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
</html>