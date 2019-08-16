<?php 
    include("header.php");
    user::Admin();
    
    $id = $_GET["id"];
    
    $cCharacter = new character();
    $cUser      = new user();
    $cSession   = new session();
    
    $aSession   = $cSession->GetSessionById($id);
    $aUsers     = $cUser->GetAllUsers();
    
    
    $payments = unserialize($aSession["payment"]);
?>
</body>
<div id="main">
    <div class="container">
        <h1>Sessie <?php echo $aSession["number"]." - ".$aSession["name"] ?></h1>
        <h6>Spelers</h6>
        <form name="payment" id="paymentform">
            <table id="players" width="100%">
                <tr>
                    <th>
                        Speler
                    </th>
                    <th>
                        Character
                    </th>
                    <th>
                        Aanwezig
                    </th>
                    <th colspan="2">
                        Betaald
                    </th>
                </tr>
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
                        echo $cCharacter->GetSessionCharacter($aId); 
                        ?>
                        <?php
                            $aCharacter = $cCharacter->GetActiveCharacter($aId);
                            if(isset($payments[$aUser["id"]]["character_id"])){
                                $characterId = $payments[$aUser["id"]]["character_id"];
                                $blaat = 0;
                            }else{
                                $characterId = $aCharacter["id"];
                                $blaat = 1;
                            }
                        ?>
                        <input type="hidden" value="<?php echo $characterId; ?>" name="player[<?php echo $aUser["id"] ?>][character_id]" />
                    </td>
                    <td  class="session-played">
                
                        <input <?php if(isset($payments[$aUser["id"]]["played"])){
                            if($payments[$aUser["id"]]["played"] == "on"){
                                echo 'checked="checked"';
                            }} ?> type="checkbox" class="clear" name="player[<?php echo $aUser["id"] ?>][played]" />
                    </td>
                    <td  class="session-payed">
                        <input <?php if(isset($payments[$aUser["id"]]["payed"])){
                            if($payments[$aUser["id"]]["payed"] == "on"){
                                echo 'checked="checked"';
                            }} ?> type="checkbox" class="clear" name="player[<?php echo $aUser["id"] ?>][payed]" />
                    </td>
                    <td>
                    </td>
                </tr>
                 <?php
                 }
                 }
                ?>
            </table>&nbsp;<br />&nbsp;<br />
            <h6>Narrators</h6>
            <table id="players" width="100%">
                <tr>
                    <th>
                        Speler
                    </th>
                    <th>
                        
                    </th>
                    <th>
                        Aanwezig
                    </th>
                    <th colspan="2">
                        Betaald
                    </th>
                </tr>
                <?php 
                 foreach($aUsers as $aUser){
                    if($aUser["level"] == 1 && $aUser["email"] != "rolf@databoss.nl"){
                    ?>
                <tr class="player">
                    <td class="session-name">
                        <input name="player[<?php echo $aUser["id"] ?>][id]" value="<?php echo $aUser["id"] ?>" type="hidden" />
                        <?php echo $aUser["playername"]; ?>
                    </td>
                    <td class="session-character">
                        
                    </td>
                    <td  class="session-played">
                
                        <input <?php if(isset($payments[$aUser["id"]]["played"])){
                            if($payments[$aUser["id"]]["played"] == "on"){
                                echo 'checked="checked"';
                            }} ?> type="checkbox" class="clear" name="player[<?php echo $aUser["id"] ?>][played]" />
                    </td>
                    <td  class="session-payed">
                        <input <?php if(isset($payments[$aUser["id"]]["payed"])){
                            if($payments[$aUser["id"]]["payed"] == "on"){
                                echo 'checked="checked"';
                            }} ?> type="checkbox" class="clear" name="player[<?php echo $aUser["id"] ?>][payed]" />
                    </td>
                    <td>
                    </td>
                </tr>
                 <?php
                 }
                 }
                ?>
            </table>
            <input name="xf" type="hidden" value="savepayment" />
            <input name="id" type="hidden" value="<?php echo $id; ?>" />
            <input type="submit" value="Opslaan" />
        </form>
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