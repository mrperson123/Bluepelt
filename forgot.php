<?php 
    include("header.php");
?>
</body>
<div id="main">
    <div class="container">
        <h1>Wachtwoord vergeten</h1>
        <?php 
            $id     = "";
            $code   = "";
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            
            if(isset($_GET['code'])){
                $code= $_GET['code'];
            }
            
            $user = new user;
            $sCheck = $user->CheckForgotPassword($id, $code);
            if($sCheck == 0){
        ?>
        <p>
            Vul hieronder je e-mail adres in om een nieuw wachtwoord in te stellen.
        </p>
        
        <form id="forgotform" action="xf.php">
    		<input name="email" placeholder="Email" type="email" required /><br />
            <input name="xf" type="hidden" value="forgot" />
    		<input type="submit" value="Verzenden" />
    	</form>
        <div class="forgotresult success">
            Er is een e-mail naar je adres gestuurd met de instructies om je wachtwoord aan te passen.
        </div>
        <div class="forgotresult success1">
            Er is een e-mail naar je adres gestuurd met de instructies om je wachtwoord aan te passen.
        </div>
    	<script>
    		$('#forgotform').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#forgotform').serialize(),
					success: function(response)
    		        {              
	                    if(response == "send"){
                            $(".forgotresult.success").slideToggle();
                            $("#forgotform").slideToggle();
                        }
                        
                        if(response == "falsepositive"){
                            $(".forgotresult.success1").slideToggle();
                            $("#forgotform").slideToggle();
                           
                        }
    		            
    		        }               
    		    });
    		});
    	</script>
        <?php 
            }else{
                
        ?>
        <p>
            Vul hieronder het nieuw wachtwoord wat je in wilt stellen.
        </p>
        
        <form id="changeform" action="xf.php">
    		<input name="password" placeholder="Nieuw wachtwoord" type="password" required /><br />
            <input name="xf" type="hidden" value="change" />
            <input name="id" value="<?php echo $id; ?>" type="hidden" required />
    		<input type="submit" value="Verzenden" />
    	</form>
        <div class="forgotresult success">
            Je wachtwoord is aangepast. Log in met je nieuw ingestelde wachtwoord.
        </div>
    	<script>
    		$('#changeform').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#changeform').serialize(),
    		        success: function(response)
    		        {
                        if(response == 1){
	                       $("#changeform").slideToggle();
                           $(".forgotresult.success").slideToggle();
                        }
    		            
    		        }               
    		    });
    		});
    	</script>
        <?php 
            }
        ?>
    </div>
</div>
</html>