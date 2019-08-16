<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $user = new user();
        $aRes = $user->GetUserById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
    }
    $level = $aRes["level"];
?>
</body>
<div id="main">
    <div class="container">
         <h1>Lid aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Naam" value="<?php echo $aRes["playername"] ?>" required /><br />
            <input name="email" type="email" placeholder="Email" value="<?php echo $aRes["email"] ?>" required /><br />
            <select name="level">
                <option <?php if($level == 0){ ?>selected="selected"<?php } ?> value="0">Speler</option>
                <option <?php if($level == 1){ ?>selected="selected"<?php } ?> value="1">Narrator</option>
                <option <?php if($level == 1){ ?>selected="selected"<?php } ?> value="2">Non-actief</option>
            </select><br />
            <select name="verified">
	            <option <?php if($aRes["verified"] == 0){ ?>selected="selected"<?php } ?> value="0">Niet geverifieerd</option>
	            <option <?php if($aRes["verified"] == 1){ ?>selected="selected"<?php } ?> value="1">Geverifieerd</option>
            </select>
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="edituser" />
    		<input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success">
            <p>
                De lid is aangepast.
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
                        }
    		        }               
    		    });
    		});
    	</script>
    </div>
</div>
</html>