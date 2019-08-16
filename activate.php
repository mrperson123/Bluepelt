    <?php 
        include("header.php");
	?>
    <div id="main">
        <div class="container">
            <h1>
                Activeren
            </h1>
            <?php 
                $user = new user;
                $id     = "";
                $code   = "";
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                
                if(isset($_GET['code'])){
                    $code= $_GET['code'];
                }
                
                $result = $user->ActivateUser($id, $code);
                                
                if($result == ""){
                    ?>
                    <div class="activate error">
                        De code die je hebt opgegeven klopt niet.
                    </div>
                    <?php
                }
                if($result == "activated"){
                    ?>
                    <div class="activate error">
                        Je account is al geactiveerd. Log in met de door jouw opgegeven gegevens of <a href="<?php $GLOBALS['url'] ?>forgot.php">klik hier</a> als je je wachtwoord vergeten bent.
                    </div>
                    <?php
                }
                if($result == "success"){
                    ?>
                    <div class="activate success">
                        Je bent nu helemaal ingeschreven. Log nu in met de door jouw opgegeven gegevens.
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
	
</body>
</html>