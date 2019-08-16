<?php 
    include("header.php");
    user::Admin();
    $cMail = new mail();
    $cSession = new session();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $result = $cMail->DeleteMail($id);
    }
    $aMails = $cMail->GetAllMails();
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>Mailing overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            
            foreach($aMails as $aMail){
                ?>
             <tr>
                <td>
                    <?php 
                    $aSession = $cSession->GetSessionById($aMail["session_id"]);
                    echo $aSession["number"]." - ".$aSession["name"]
                     ?>
                </td>
                <td>
                    <a href="/edit_mail.php?id=<?php echo $aMail["id"] ?>">Mailing aanpassen</a> <a href="?del=<?php echo $aMail["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Mailing <?php echo $aMail["id"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_mail.php">Nieuwe Mailing toevoegen</a>
    </div>
</div>
</html>