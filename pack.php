<?php
    $id = $_GET["id"];
    include("header.php");
    
    user::LoggedIn();

    $cPacks         = new pack();
    $cUsers         = new user();
    
    $aUsers         = $cUsers->GetAllUsers();
    
    $aPack          = $cPacks->GetPackById($id);
    $aPackmembers   = $cPacks->GetPackMembers($id);
    $level          = $cUsers->AdminCheck();
    
    $sharedAllies       = 0;
    $sharedContact      = 0;
    $sharedKinfolk      = 0;
    $sharedTerritory    = 0;
    $sharedTerritoryExtra = "";
    
    $aTerritoria = unserialize($aPack["territoria"]);
    
    foreach($aPackmembers as $aPackmember){
        $aPackSharedbackground = unserialize($aPackmember["shared_backgrounds"]);
        $sharedAllies       += $aPackSharedbackground["3"]["Allies"];
        $sharedContact      += $aPackSharedbackground["4"]["Contacts"];
        $sharedKinfolk      += $aPackSharedbackground["2"]["Kinfolk"];
        $sharedTerritory    += $aPackSharedbackground["1"]["Territory"];
        if(!empty($aPackSharedbackground["1"]["territory-advantages"])){
            $sharedTerritoryExtra .= $aPackmember["name"].": ".$aPackSharedbackground["1"]["territory-advantages"]."<br />";
        }
    }
    
    $edited = $cPacks->CheckForEdit($id);
?>
</body>
<div id="main">
    <div class="container">
        <h1><?php echo $aPack["name"]; ?></h1>
        <h6>Pack members</h6>
        <?php
            foreach($aPackmembers as $aPackmember){
                foreach($aUsers as $aUser){
                    if($aPackmember["user_id"] == $aUser["id"]){
                        $playername =  $aUser["playername"];
                    }
                }
            ?>
            <?php echo $aPackmember["name"] ?> - <?php echo $aPackmember["deed_name"] ?> | <?php echo $playername; ?><br />
        <?php
            }
        ?>
        <h6></h6>
        <h6>Shared Backgrounds</h6>
        <div id="sharedbackgrounds">
            <span>Allies</span>
            <?php 
                if($sharedAllies >= 30){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
            <?
                }elseif($sharedAllies >= 20){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedAllies >= 12){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedAllies >= 6){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedAllies >= 2){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedAllies >= 0){
            ?>
                <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }
            ?><br />
            <span>Contact</span>
            <?php 
                if($sharedContact >= 30){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
            <?
                }elseif($sharedContact >= 20){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedContact >= 12){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedContact >= 6){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedContact >= 2){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedContact >= 0){
            ?>
                <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }
            ?><br />
            <span>Kinfolk</span>
            <?php 
                if($sharedKinfolk >= 30){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
            <?
                }elseif($sharedKinfolk >= 20){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedKinfolk >= 12){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedKinfolk >= 6){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedKinfolk >= 2){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedKinfolk >= 0){
            ?>
                <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }
            ?><br />
            <span>Territory</span>
            <?php 
                if($sharedTerritory >= 30){
            ?><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i>
            <?
                }elseif($sharedTerritory >= 20){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedTerritory >= 12){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedTerritory >= 6){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedTerritory >= 2){
            ?>
                <i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }elseif($sharedTerritory >= 0){
            ?>
                <i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i>
            <?php
                }
            ?><br />
            <?php echo $sharedTerritoryExtra; ?>
        </div>
        <h6>Territoria</h6>
        <?php if(isset($aTerritoria["0"]["abstwoude"])){if($aTerritoria["0"]["abstwoude"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Abtswoude<br />
        <?php if(isset($aTerritoria["0"]["binnenstad"])){if($aTerritoria["0"]["binnenstad"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Binnenstad<br />
        <?php if(isset($aTerritoria["0"]["buitenhof"])){if($aTerritoria["0"]["buitenhof"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Buitenhof<br />
        <?php if(isset($aTerritoria["0"]["delftsehout"])){if($aTerritoria["0"]["delftsehout"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Delftse hout<br />
        <?php if(isset($aTerritoria["0"]["hofvandelft"])){if($aTerritoria["0"]["hofvandelft"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Hof van Delft<br />
        <?php if(isset($aTerritoria["0"]["ruiven"])){if($aTerritoria["0"]["ruiven"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Ruiven<br /> 
        <?php if(isset($aTerritoria["0"]["schieweg"])){if($aTerritoria["0"]["schieweg"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Schieweg<br />
        <?php if(isset($aTerritoria["0"]["tanthof"])){if($aTerritoria["0"]["tanthof"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Tanthof<br />
        <?php if(isset($aTerritoria["0"]["vrijenban"])){if($aTerritoria["0"]["vrijenban"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Vrijenban<br />
        <?php if(isset($aTerritoria["0"]["voordijkshoorn"])){if($aTerritoria["0"]["voordijkshoorn"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Voordijkshoorn<br />
        <?php if(isset($aTerritoria["0"]["voorhof"])){if($aTerritoria["0"]["voorhof"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Voorhof<br />
        <?php if(isset($aTerritoria["0"]["wippolder"])){if($aTerritoria["0"]["wippolder"] == "on"){?><i class="fa fa-square" aria-hidden="true"></i><?php }}else{ ?><i class="fa fa-square-o" aria-hidden="true"></i><?php }?> Wippolder (TU wijk)<br />
        &nbsp;<br />
        <h6>Totem</h6>
        <?php echo nl2br($aPack["totem"]); ?><br />&nbsp;<br />
        <?php if($level == 1){ ?>
        <h6>Narrator Snippet</h6>
        <?php echo nl2br($aPack["narrator_snippet"]); ?><br />&nbsp;<br /> 
        <?php } ?>
        <?php if($level == 1){ ?>
        <?php if($edited != 1){ ?><a class="print_hide" href="/edit_pack.php?id=<?php echo $aPack["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php } ?>
        <?php
            if($level == 1){
                if($edited == 1){
                    echo "Pack heeft al een wijziging op zich wachten. Keur eerst deze goed.";
                }
            }else{
                if($edited == 1){
                    echo "Er zijn al wijzigingen aangebracht voor deze Pack. Wacht eerst op goedkeuring van de Narren voordat je nieuwe wijzigingen gaat toebrengen.";
                }
            }
            }
        ?>
    </div>
</div>
</html>