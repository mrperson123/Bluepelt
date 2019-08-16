    <?php 
        include("header.php");
	?>
    <div id="main">
        <div class="container">
            <h1>
                Inschrijfformulier
            </h1>
            <p>
                Vul het onderstaande formulier in om jezelf in te schrijven voor de LRP Bluepelt Werewolf te Delft
            </p>
            
            <form id="signupform" action="xf.signup.php">
        		<input name="name" placeholder="Voor & Achternaam" required /><br />
        		<input name="email" placeholder="Email" type="email" required /><br />
        		<input name="password" type="password" placeholder="Wachtwoord" required /><br />
                <input name="xf" type="hidden" value="signup" />
        		<input type="submit" value="Inschrijven" />
        	</form>
            <div class="signupresult success">
                <p>
                    Je bent succesvol aangemeld. Er is een e-mail verstuurd naar het door jouw opgegeven adres. Volg de instructies in de e-mail om je inschrijving te voltooien.
                </p>
            </div>
            <div class="signupresult exist">
                <p>
                    Je probeert je in te schrijven met een e-mail adres wat al bestaat. <a href="<?php $GLOBALS['url'] ?>forgot.php">Klik hier</a> als je je wachtwoord bent vergeten.
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
        
        </div>
    </div>
	
</body>
</html>