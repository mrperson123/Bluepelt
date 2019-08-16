<?php 
    include("header.php");
    user::Admin();
    $edit = 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $cMail = new mail();
        $aRes = $cMail->GetMailById($id);
    }
    
    $cUser      = new user();
    $cSessions  = new session();
    $cCharacter = new character();
    
    $aSessions      = $cSessions->GetAllSessions();
    $aCharacters    = $cCharacter->GetAllActiveCharacters();
    
    if(isset($aRes)){
    $characters = unserialize($aRes["characters_text"]);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Nieuwe mailing toevoegen</h1>
        <form id="signupform" action="xf.php">
            <strong>Kies een sessie</strong><br />
            <select name="session_id" required="required">
                <?php foreach($aSessions as $aSession){ ?>
                <option value="<?php echo $aSession["id"] ?>"<?php if(isset($aRes)){if($aSession["id"] == $aRes["session_id"]){ echo " selected='selected'";}} ?>><?php echo $aSession["number"]." - ".$aSession["name"]; ?></option>
                <?php } ?>
            </select><br /><br />
            <div class="row">
                <div class="column col5">
                    <strong>Oc intro tekst</strong><br />
                    <textarea name="begin_text" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["begin_text"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>IC intro tekst</strong><br />
                    <textarea name="ic_text" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["ic_text"];} ?></textarea>
                </div>
            </div>
            <div class="clear"></div>
            <strong>Url van de Garou Times</strong><br />
            <input name="times" class="mailing input" value="<?php if(isset($aRes)){ echo $aRes["times"];} ?>" />
            <br />&nbsp;<br />
            <h6>Contacts</h6>   
            <div class="row">
                <div class="column col5">
                    <strong>Finance 1</strong><br />
                    <textarea name="finance_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["finance_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Finance 2</strong><br />
                    <textarea name="finance_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["finance_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Industry 1</strong><br />
                    <textarea name="industry_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["industry_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Industry 2</strong><br />
                    <textarea name="industry_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["industry_2"];} ?></textarea>
                </div>
            </div> 
            <div class="row">
                <div class="column col5">
                    <strong>Media 1</strong><br />
                    <textarea name="media_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["media_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Media 2</strong><br />
                    <textarea name="media_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["media_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Medical 1</strong><br />
                    <textarea name="medical_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["medical_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Medical 2</strong><br />
                    <textarea name="medical_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["medical_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Occult 1</strong><br />
                    <textarea name="occult_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["occult_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Occult 2</strong><br />
                    <textarea name="occult_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["occult_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Police 1</strong><br />
                    <textarea name="police_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["police_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Police 2</strong><br />
                    <textarea name="police_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["police_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Politics 1</strong><br />
                    <textarea name="politics_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["politics_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Politics 2</strong><br />
                    <textarea name="politics_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["politics_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Street 1</strong><br />
                    <textarea name="street_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["street_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Street 2</strong><br />
                    <textarea name="street_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["street_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>Underworld 1</strong><br />
                    <textarea name="underworld_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["underworld_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>Underworld 2</strong><br />
                    <textarea name="underworld_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["underworld_2"];} ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column col5">
                    <strong>University 1</strong><br />
                    <textarea name="university_1" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["university_1"];} ?></textarea>
                </div>
                <div class="column col2">
                </div>
                <div class="column col5"> 
                    <strong>University 2</strong><br />
                    <textarea name="university_2" class="mailing_textarea"><?php if(isset($aRes)){ echo $aRes["university_2"];} ?></textarea>
                </div>
            </div>
            <div class="clear"></div>
            <br />
            <h6>Characters</h6>          
            <div id="characters">
                <?php if(!isset($aRes)){ ?>
                <div class="character">
                    <span class="hide-text">Kies de Character<br /></span>
                    <select class="character_name select2" name="character[0][id]">
                        <option value="0"></option>
                        <?php 
                            foreach($aCharacters as $aCharacter){
                            $aUser = $cUser->GetUserById($aCharacter["user_id"]);
                        ?>
                        <option value="<?php echo $aCharacter["id"] ?>"><?php echo $aCharacter["name"] ?> - <?php echo $aUser["playername"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <a class="remove_character" title="Verwijder deze Character"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br />
                    Aantal XP<br />
                    <input name="character[0][xp]" />
                    <div class="row">
                        <div class="column col5">
                            <strong>Character Rumour</strong><br />
                            <textarea name="character[0][rumour]" class="mailing_textarea"></textarea>
                        </div>
                        <div class="column col1">
                        </div>
                        <div class="column col5"> 
                            <strong>Character opmerking</strong><br />
                            <textarea name="character[0][remark]" class="mailing_textarea"></textarea>
                        </div>
                        <div class="column col1">
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                    
                  
                </div>
                <?php }else{ ?>
                <?php 
                $charactercount = 0;
                foreach($characters as $character){ ?>
                <div class="character">
                    <span class="hide-text">Kies de Character<br /></span>
                    <select class="character_name select2" name="character[<?php echo $charactercount ?>][id]">
                        <option value="0" <?php if($character["id"] == "0"){ echo " selected='selected'";} ?>></option>
                        <?php 
                            foreach($aCharacters as $aCharacter){
                            $aUser = $cUser->GetUserById($aCharacter["user_id"]);
                        ?>
                        <option value="<?php echo $aCharacter["id"] ?>"<?php if($character["id"] == $aCharacter["id"]){ echo " selected='selected'";} ?>><?php echo $aCharacter["name"] ?> - <?php echo $aUser["playername"]; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <a class="remove_character" title="Verwijder deze Character"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br />
                    Aantal XP<br />
                    <input name="character[<?php echo $charactercount ?>][xp]" type="hidden" value="<?php echo $character["xp"]; ?>" /><br />
                    <div class="row">
                        <div class="column col5">
                            <strong>Character Rumour</strong><br />
                            <textarea name="character[<?php echo $charactercount ?>][rumour]" class="mailing_textarea"><?php echo $character["rumour"]; ?></textarea>
                        </div>
                        <div class="column col1">
                        </div>
                        <div class="column col5"> 
                            <strong>Character opmerking</strong><br />
                            <textarea name="character[<?php echo $charactercount ?>][remark]" class="mailing_textarea"><?php echo $character["remark"]; ?></textarea>
                        </div>
                        <div class="column col1">
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                    
                  
                </div>
                
                <?php 
                    $charactercount++;
                    }
                } 
                ?>
            </div>
            <input type="button" id="add_character" value="Voeg nog een character toe" />   
            <?php if(isset($aRes)){?>
            <input name="id" type="hidden" value="<?php echo $aRes["id"]; ?>" />
            <?php } ?>       
            <input name="xf" type="hidden" value="<?php if(isset($aRes)){ echo "savemailing";}else{ echo "addmailing";} ?>" /><br /><br />
    		<input type="submit" value="Opslaan" />
    	</form>
        <div class="signupresult success">
            <p>
                De Mailing is opgeslagen.
            </p>
        </div>
        <?php if(isset($aRes)){?>
        <form id="sendmailing" action="xf.php">
            <input name="id" type="hidden" value="<?php echo $aRes["id"]; ?>" />
            <input name="xf" type="hidden" value="sendmailing" /><br /><br />
    		<input type="submit" id="mailbutton" value="Verzenden" /><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            <div class="hidden result" >Maandelijkse mailing verstuurd</div>
        </form>
        <?php } ?> 
        <script>
    		$('#signupform').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#signupform').serialize(),
    		        success: function(response)
    		        {
                        <?php if(!isset($aRes)){ ?>
	                    var resp = response;
                        var splitted = resp.split(",");
                        var number = splitted[1];
                        var url = "/edit_mail.php?id="+number;
                        console.log(url);
                        window.location.href = url;
                        <?php }else{ ?>
                        if(response == "success"){
                            $(".success").slideToggle();
                            $(".success").delay(1000).slideToggle();
                        }
                        <?php } ?>
    		        }               
    		    });
    		});
            
            $('#sendmailing').on('submit', function (e) {
                $("#mailbutton").attr("disabled", true);
                $(".fa-spinner").css({"opacity": "1"});
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#sendmailing').serialize(),
    		        success: function(response)
    		        {
                        console.log(response);
                        $(".fa-spinner").css({"opacity": "0"});
                        $(".hidden").show();
    		        }               
    		    });
    		});
    	</script>

    </div>
</div>
<script src="<?php echo $GLOBALS["url"] ?>includes/js/create_character.php<?php if(isset($aRes)){echo "?charactercount=".$charactercount;} ?>"></script>
</body>
</html>