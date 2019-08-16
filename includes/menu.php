<ul id="header-menu"> 
    <li>
        <a href="/">Home</a>
    </li>

    
    <?php if($_SESSION){ ?>
    <li>
        <a href="/user.php">Mijn Account</a>
    </li>
    <li>
        <span>
            Downloads
        </span>
        <ul class="submenu">
            <li>
                <a href="/docs/rules.pdf" target="_blank">Regelset</a>
            </li>
            <li>
                <a href="/docs/character-creation.pdf" target="_blank">Character creation</a>
            </li>
            <li>
                <a href="/docs/cheatsheet.pdf" target="_blank">Cheatsheet</a>
            </li>
            <li>
                <a href="/docs/Guide-to-Garou.pdf" target="_blank">Guide to Garou</a>
            </li>
        </ul>
        <span class="sub-open mobile"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </li>
    <?php } ?>
    <?php if(AdminVisible()){ ?>
    <li>
    <span>Char's / Leden</span>
        <ul class="submenu">
            <li>
                <a href="characters.php">Characters</a>
            </li>
            <li>
                <a href="/xp.php">XP overzicht</a>
            </li>
            <li>
                <a href="/contacts.php">Contacts</a>
            </li>
            <li>
                <a href="/users.php">Leden</a>
            </li>
        </ul>
        <span class="sub-open mobile"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </li>
    <li>
    <span>Wijzigingen</span>
        <ul class="submenu">
            <li> 
                <a href="/character_check_overview.php">Character's</a>
            </li>
            <li>
                <a href="/pack_check_overview.php">Pack's</a>
            </li>
        </ul>
    <li>
        <span>Sheet informatie</span>
        <ul class="submenu">
            <li>
                <a href="auspices.php">Auspices</a>
            </li>
            <li>
                <a href="backgrounds.php">Backgrounds</a>
            </li>
            <li>
                <a href="breeds.php">Breeds</a>
            </li>
            <li>
                <a href="gifts.php">Gifts</a>
            </li>
            <li>
                <a href="flaws.php">Flaws</a>
            </li>
            <li>
                <a href="merits.php">Merits</a>
            </li>
            <li>
                <a href="packs.php">Packs</a>
            </li>
            <li>
                <a href="skills.php">Skills</a>
            </li>
            <li>
                <a href="tribes.php">Tribes</a>
            </li>
        </ul>
        <span class="sub-open mobile"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </li>
    <li>
        <span>Sessies</span>
        <ul class="submenu">
            <li>
                <a href="/sessions.php">Sessies</a>
            </li>
            <li>
                <a href="/mailing.php">Mailings</a>
            </li>
        </ul>
        <span class="sub-open mobile"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </li>
    <?php } ?>
    <li>
        <a target="_blank" href="/wiki/">Wiki</a>
    </li>
</ul>