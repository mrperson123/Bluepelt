<?php 
    include("header.php");
    user::Admin();
    if(isset($_GET["del"])){
        $id = $_GET["del"];
        $session = new session();
        $result = $session->DeleteSession($id);
    }
?>
</body>
<div id="main">
    <div class="container">
        <h1>Sessie overzicht</h1>
        <?php if(isset($_GET["del"])){ ?>
        <div id="result">
            <?php echo $result; ?>
        </div>
        <?php } ?>
        <table width="100%" id="users-list">
        <?php 
            $cSessions = new session();
            $aSessionlist = $cSessions->GetAllSessions();
            foreach($aSessionlist as $aSession){
                ?>
             <tr>
                <td>
                    <a href="/session.php?id=<?php echo $aSession["id"]; ?>"><?php echo $aSession["number"]." - ".$aSession["name"] ?></a>
                </td>
                <td>
                    <a href="/edit_session.php?id=<?php echo $aSession["id"] ?>">Session aanpassen</a> <a href="?del=<?php echo $aSession["id"] ?>" onclick="return confirm('Weet je het zeker dat je de Session <?php echo $aSession["sessions"] ?> wilt verwijderen?')" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
             </tr>   
        <?php
            }
        ?>
        </table>
        <br /><a href="edit_session.php">Nieuwe Sessie toevoegen</a>
    </div>
</div>
</html>