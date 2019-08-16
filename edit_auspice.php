<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $auspice = new auspices();
        $aRes = $auspice->GetAuspiceById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Auspice toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Auspice naam" required /><br />
    		<textarea name="info" placeholder="Uitleg over de auspice" required="required" ></textarea><br />
            <input name="xf" type="hidden" value="addauspice" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Auspice is toegevoegd.
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
         <h1>Auspice aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Auspice naam" value="<?php echo $aRes["name"] ?>" required /><br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editauspice" />
    		<textarea name="info" placeholder="Uitleg over de auspice" required="required" ><?php echo $aRes["info"] ?></textarea><br />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Auspice is aangepast.
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