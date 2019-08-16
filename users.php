<?php 
    include("header.php");
    user::Admin();
?>
</body>
<div id="main">
    <div class="container">
        <h1>Leden overzicht</h1>
        <table width="100%" id="users-list">
            <thead>
                <td>
                    Naam
                </td>
                <td>
                    Email adres
                </td>
                <td>
                    Level
                </td>
                <td>
                    Geverifieerd
                </td>
                <td></td>
            </thead>
        <?php 
            $users = new users();
            $userlist = $users->GetAllUsers();
            foreach($userlist as $user){
                ?>
                <tr>
                    <td>
                        <a href="/user.php?id=<?php echo $user["id"] ?>">
                            <?php echo $user["playername"] ?>
                        </a>
                    </td>
                    <td><?php echo $user["email"]; if($user["verified"] == 1){ ?> <a href="mailto:<?php echo $user["email"] ?>" title="Stuur een e-mail"><i class="fa fa-envelope-o" aria-hidden="true"></i></td></a> <?php } ?>
                    <td><?php echo $user["level"] ?></td>
                    <td><?php 
                        if($user["verified"] == 1){
                            echo "geverifieerd";
                        }else{
                            echo "niet geverifieerd";
                        }
                    ?></td>
                    <td><a href="edit_user.php?id=<?php echo $user["id"] ?>">Aanpassen</a></td>
                </tr>
                <?php
            }
        ?>
        </table>
    </div>
</div>
</html>