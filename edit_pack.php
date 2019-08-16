<?php 
    include("header.php");
	
	user::LoggedIn();
	
	$cUser                  = new user();
	$cPack 					= new pack();
	
	//set level;
	$level = $cUser->AdminCheck();
	
	//check if new pack or pack to be edited
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $aRes = $cPack->GetPackById($id);
        if(!empty($aRes)){
            $edit = 1;
        }
		
		$edited = $cPack->CheckForEdit($id);
		if($level != "1"){
			if($edited == "1"){
				$url = $GLOBALS["url"]."pack?id=".$id; 
		?>
		<script>
			window.location="<?php echo $url; ?>";
		</script>
		<?php
				//header("location: ".$GLOBALS["url"]."/pack?id=".$id);
			}
		}
    }
	
	//check if admin or user is editing
	if($level == 1){
		$editor = "editpackadmin";
	}else{
		$editor = "editpack";
	}
	
	$aTerritoria = unserialize($aRes["territoria"]);
	
?>
<div id="main">
    <div class="container"> 
        <?php if($edit == 0){ ?>
        <h1>Nieuwe Pack toevoegen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Pack naam" required /><br />
            <input name="xf" type="hidden" value="addpack" />
    		<input type="submit" value="Toevoegen" />
    	</form>
        <div class="signupresult success">
            <p>
                De Pack is toegevoegd.
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
         <h1>Pack aanpassen</h1>
        <form id="signupform" action="xf.php">
    		<input name="name" placeholder="Pack naam" value="<?php echo $aRes["name"] ?>" required /><br />
			<h6>Territoria</h6>
			<input <?php if(isset($aTerritoria["0"]["abstwoude"])){if($aTerritoria["0"]["abstwoude"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][abstwoude]" id=checkbox1><label for="checkbox1">Abtswoude</label><br />
			<input <?php if(isset($aTerritoria["0"]["binnenstad"])){if($aTerritoria["0"]["binnenstad"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][binnenstad]" id=checkbox2><label for="checkbox2">Binnenstad</label><br />
			<input <?php if(isset($aTerritoria["0"]["buitenhof"])){if($aTerritoria["0"]["buitenhof"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][buitenhof]" id=checkbox3><label for="checkbox3">Buitenhof</label><br />
			<input <?php if(isset($aTerritoria["0"]["delftsehout"])){if($aTerritoria["0"]["delftsehout"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][delftsehout]" id=checkbox4><label for="checkbox4">Delftse Hout</label><br />
			<input <?php if(isset($aTerritoria["0"]["hofvandelft"])){if($aTerritoria["0"]["hofvandelft"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][hofvandelft]" id=checkbox5><label for="checkbox5">Hof van Delft</label><br />
			<input <?php if(isset($aTerritoria["0"]["ruiven"])){if($aTerritoria["0"]["ruiven"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][ruiven]" id=checkbox6><label for="checkbox6">Ruiven</label><br />
			<input <?php if(isset($aTerritoria["0"]["schieweg"])){if($aTerritoria["0"]["schieweg"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][schieweg]" id=checkbox7><label for="checkbox7">Schieweg</label><br />
			<input <?php if(isset($aTerritoria["0"]["tanthof"])){if($aTerritoria["0"]["tanthof"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][tanthof]" id=checkbox8><label for="checkbox8">Tanthof</label><br />
			<input <?php if(isset($aTerritoria["0"]["vrijenban"])){if($aTerritoria["0"]["vrijenban"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][vrijenban]" id=checkbox9><label for="checkbox9">Vrijenban</label><br />
			<input <?php if(isset($aTerritoria["0"]["voordijkshoorn"])){if($aTerritoria["0"]["voordijkshoorn"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][voordijkshoorn]" id=checkbox10><label for="checkbox10">Voordijkshoorn</label><br />
			<input <?php if(isset($aTerritoria["0"]["voorhof"])){if($aTerritoria["0"]["voorhof"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][voorhof]" id=checkbox11><label for="checkbox11">Voorhof</label><br />
			<input <?php if(isset($aTerritoria["0"]["wippolder"])){if($aTerritoria["0"]["wippolder"] == "on"){?>checked <?php }} ?> type="checkbox" name="territoria[0][wippolder]" id=checkbox12><label for="checkbox12">Wippolder (TU wijk)</label><br />&nbsp;<br />
			<h6>Totem</h6>
			<textarea name="totem"><?php if(isset($aRes["totem"])){ echo $aRes["totem"]; } ?></textarea>
			<?php if($level == "1"){ ?>
			<h6>Narrator Snippet</h6>
			<textarea name="narrator_snippet"><?php if(isset($aRes["narrator_snippet"])){ echo $aRes["narrator_snippet"]; } ?></textarea>
			<?php } ?>
            <input name="id" type="hidden" value="<?php echo $aRes["id"] ?>" />
            <input name="xf" type="hidden" value="<?php echo $editor; ?>" />
    		&nbsp;<br /><input type="submit" value="Aanpassen" />
    	</form>
        <div class="signupresult success"> 
            <p>
                De Pack is aangepast.
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
</body>
</html>