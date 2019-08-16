<?php 
    include('includes/include.php'); 
    $rand = rand(1, 100000);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://use.fontawesome.com/0256ba142e.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title></title>
<link rel="stylesheet" href="https://www.bluepelt.nl/font-awesome/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/css/style.css?ver=<?php echo $rand; ?>" />
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="/includes/js/scripts.js"></script>
</head>
<body>
<div id="header">
	<div id="mobile-menu-main">
		<div id="mobile-menu-bg">
			</div>
			<div id="mobile-menu-holder">
				<div id="mobile-menu">
					<?php include('includes/menu.php') ?>
				</div>
			</div>
		</div>
    <div class="container">
        <a href="/" id="logo"></a>
        <?php 
            $user = new user;
            $session = LoggedIn();
            if(!$_SESSION){
                ?>
                <form id="header-login" action="xf.php" >
                    <div class="login error failed">
                        De gegevens die zijn ingevuld kloppen niet. Controleer ze en probeer opnieuw.
                    </div>
                    <div class="login error verify">
                        Je moet eerst nog je account activeren voordat je kan inloggen. Controleer je e-mail en volg de instructies in de mail.
                    </div>
                    <input name="user" type="text" required="required" placeholder="E-mail adres" /><br />
                    <input name="pass" type="password" required="required" placeholder="Wachtwoord" /><br />
                    <input name="xf" type="hidden" value="login" />
                    <input type="submit" value="Inloggen" /> 
                    <div class="clear">
                        <a href="<?php echo $GLOBALS['url'] ?>forgot.php">Wachtwoord vergeten</a><a href="<?php echo $GLOBALS['url'] ?>signup.php">Registreren</a>
                    </div>
                    
                </form>
                <?php
            }else{
                ?>
                <div id="header-loggedin">
                    <strong>Hallo <a href="/user.php"><?php echo $_SESSION['username'];?></a><br /></strong>
                    <a href="xf.logout.php">Uitloggen</a>
                </div>
                <?php
            }
        ?>
        <script>
    		$('#header-login').on('submit', function (e) {
                e.preventDefault();
    		    $.ajax({
    		        url: 'xf.php',
    		        type:'POST',
    		        data: $('#header-login').serialize(),
    		        success: function(response)
                    
    		        {
    		          console.log(response);
                        if(response == "success"){
                            location.reload();
                        }
                        
                        if(response == "failed"){
                            $(".login.error.failed").slideToggle();
                        }
                        
                        if(response == "verify"){
                            $(".login.error.verify").slideToggle();
                        }
    		        }               
    		    });
    		});
    	</script>
		<span id="mobile-menu-button" class="mobile"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <nav class="desktop">
            <?php include('includes/menu.php') ?>
        </nav>
    </div>
</div>