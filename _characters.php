<?php 
    include("header.php");
    user::Admin();
    $cCharacters    = new character();
    $cUser          = new user();
    
    $aCharacters 	= $cCharacters->GetAllCharactersAdmin();
    
    
    //var_dump($aCharacters);
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>Active Characters</h1>
		<table width="100%">
			
			<?php
				foreach($aCharacters as $aCharacter){ 
					if($aCharacter["active"] == 1){
					$aUser = $cUser->GetUserById($aCharacter["user_id"]);
				?>
				<tr>
					<td>
						<?php echo $aUser["playername"]; ?>
					</td>
					<td>
						<a target="_blank" href="/character.php?id=<?php echo $aCharacter["id"] ?>"><?php echo $aCharacter["name"]; ?> - <?php echo $aCharacter["deed_name"]; ?></a>
					</td>
					
					<td>
						<a href="/edit_character.php?id=<?php echo $aCharacter["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php
					}
				}	
			?>
		</table>
		<h1>&nbsp;<br />Niet active Characters</h1>
		<table width="100%">
			
			<?php
				foreach($aCharacters as $aCharacter){
					if($aCharacter["active"] != 1){
					$aUser = $cUser->GetUserById($aCharacter["user_id"]);
				?>
				<tr>
					<td>
						<?php echo $aUser["playername"]; ?>
					</td>
					<td>
						<a target="_blank" href="/character.php?id=<?php echo $aCharacter["id"] ?>"><?php echo $aCharacter["name"]; ?> - <?php echo $aCharacter["deed_name"]; ?></a>
					</td>
					<td>
						<a href="/edit_character.php?id=<?php echo $aCharacter["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php
					}
				}	
			?>
		</table>
    </div>
</div>
</html>