<?php 
    include("header.php");
    user::Admin();
    
    $cCharacter = new character();
    $cUser      = new user();
    $aUsers     = $cUser->GetAllUsers();
?>
</body>
<div id="main">
    <div class="container">
        <h1>Characters</h1>
        <h6>Spelers</h6>
            <table id="players" width="100%">
                <?php 
                 foreach($aUsers as $aUser){
                    if($aUser["level"] == 0){
                    ?>
                <tr class="player">
                    <td class="session-name">
                        <input name="player[<?php echo $aUser["id"] ?>][id]" value="<?php echo $aUser["id"] ?>" type="hidden" />
                        <?php echo $aUser["playername"]; ?>
                    </td>
                    <td class="session-character">
                        <?php 
                        $aId = array(
                            "id" => $aUser["id"]
                        );
                        $aCharacter = $cCharacter->GetActiveCharacter($aId); 
                        ?>
                        <a target="_blank" href="/character.php?id=<?php echo $aCharacter["id"] ?>"><?php echo $aCharacter["name"] ?></a>
                    </td>                   
                    <td>
               	        <a target="_blank" href="/edit_character.php?id=<?php echo $aCharacter["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
                 <?php
                 }
                 }
                ?>
            </table>
        <div class="signupresult success">
            <p>
                De wijzigingen zijn opgeslagen
            </p>
        </div>
    </div>
<script>
$('#paymentform').on('submit', function (e) {
    console.log("clicked");
        e.preventDefault();
	    $.ajax({
	        url: 'xf.php',
	        type:'POST',
	        data: $('#paymentform').serialize(),
	        success: function(response)
	        {
                console.log(response);
                if(response == "success"){
                    $(".success").slideToggle();
                    $(".success").delay(1000).slideToggle();
                }

	        }               
	    });
	});
</script>
<script src="<?php echo $GLOBALS["url"] ?>includes/js/session.php"></script>

</div>
</html>