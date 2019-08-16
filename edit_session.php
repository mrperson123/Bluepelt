<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $session = new session();
        $aRes = $session->GetSessionById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    
?>
</body>
<div id="main">
    <div class="container">
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Sessie toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="number" placeholder="Sessie nummer" required /><br />
    		<input name="name" placeholder="Sessie naam" /><br />
            <input name="xf" type="hidden" value="addsession" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Sessie is toegevoegd.
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
         <h1>Session aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="number" placeholder="Sessie nummer" value="<?php echo $aRes["number"] ?>" required /><br />
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="editsession" />
    		<input name="name" placeholder="Sessie naam" required="required" value="<?php echo $aRes["name"] ?>" /><br />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Session is aangepast.
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