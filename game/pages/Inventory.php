<div class="card bg-dark">

    <div class="card-header text-center">
        <a href="<?php echo GAME_URL; ?>?page=inventory" class="mx-3 <?php if(!isset($_GET["section"])){ echo "active"; } ?>">All</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Weapons" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Weapons"){ echo "active"; } ?>">Weapons</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Helmets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Helmets"){ echo "active"; } ?>">Helmets</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Armors" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Armors"){ echo "active"; } ?>">Armors</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Shields" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Shields"){ echo "active"; } ?>">Shields</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Earings" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Earings"){ echo "active"; } ?>">Earings</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Bracelets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Bracelets"){ echo "active"; } ?>">Bracelets</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Necklaces" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Necklaces"){ echo "active"; } ?>">Necklaces</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Belts" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Belts"){ echo "active"; } ?>">Belts</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Boots" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Boots"){ echo "active"; } ?>">Boots</a>
        <a href="<?php echo GAME_URL; ?>?page=inventory&section=Misc" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Misc"){ echo "active"; } ?>">Misc</a>
    </div>
    <div class="card-body">
        <?php

            include_once(GAME.DIRECTORY_SEPARATOR."addons".DIRECTORY_SEPARATOR."refine_proto.php");
            include_once(GAME.DIRECTORY_SEPARATOR."addons".DIRECTORY_SEPARATOR."salvages.php");
        
        ?>

        <?php
            
            if(isset($_SESSION["error"])){ echo Core::alert($_SESSION["error"], "danger", "start", "float-start col-12"); unset($_SESSION["error"]);}
            if(isset($_SESSION["warning"])){ echo Core::alert($_SESSION["warning"], "warning", "start", "float-start col-12"); unset($_SESSION["warning"]);}

            if(isset($_SESSION["salvage"])){

                echo Item::alert("primary", $_SESSION["salvage"]);
                unset($_SESSION["salvage"]);
    
            }
            if(isset($_SESSION["upgrade"])){

                echo Item::alert("dark", $_SESSION["upgrade"]);
                unset($_SESSION["upgrade"]);
    
            }

        ?>

    </div>

</div>