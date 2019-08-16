<?php 
    include("header.php");
    user::Admin();
    $cCharacters    = new character();
    $cUser          = new user();
    
    $aCharacters 	= $cCharacters->GetAllActiveCharacters();
    
    
    //var_dump($aCharacters);
    
?>
</body>
<div id="main">
    <div class="container">
        <h1>Contacts</h1>
		<div width="100%">
			<h6>Finance</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["finance"] == "1" || $contactpoints[0]["finance"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["finance"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Industry</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["industry"] == "1" || $contactpoints[0]["industry"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["industry"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Media</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["media"] == "1" || $contactpoints[0]["media"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["media"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Medical</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["medical"] == "1" || $contactpoints[0]["medical"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["medical"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Occult</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["occult"] == "1" || $contactpoints[0]["occult"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["occult"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Police</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["police"] == "1" || $contactpoints[0]["police"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["police"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Politics</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["politics"] == "1" || $contactpoints[0]["politics"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["politics"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Street</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["street"] == "1" || $contactpoints[0]["street"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["street"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>Underworld</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["underworld"] == "1" || $contactpoints[0]["underworld"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["underworld"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div><br />
		<div width="100%">
			<h6>University</h6>
			1:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["university"] == "1" || $contactpoints[0]["university"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
			2:<br />
			<?php
				foreach($aCharacters as $aCharacter){ 
					$contactpoints = unserialize($aCharacter["contact_points"]);
					if($contactpoints[0]["university"] == "2"){ echo $aCharacter["name"]."<br />";} 
				}	
			?>
		</div>
    </div>
</div>
</html>