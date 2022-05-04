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
            
                    $inv = Item::getItems($_SESSION["user_token"]);
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["quantity"], $item["rarity"], 0, $item["id"]);
                        if(isset($_GET["section"])){
                            switch ($_GET["section"]) {
                                case 'Weapons':
                                    $section = "ITEM_WEAPON";
                                    break;
                                case 'Helmets':
                                    $section = "ITEM_HELMET";
                                    break;
                                case 'Armors':
                                    $section = "ITEM_BODY";
                                    break;
                                case 'Shields':
                                    $section = "ITEM_SHIELD";
                                    break;
                                case 'Earings':
                                    $section = "ITEM_EARINGS";
                                    break;
                                case 'Bracelets':
                                    $section = "ITEM_BRACELET";
                                    break;
                                case 'Necklaces':
                                    $section = "ITEM_NECKLACE";
                                    break;
                                case 'Belts':
                                    $section = "ITEM_BELT";
                                    break;
                                case 'Boots':
                                    $section = "ITEM_BOOTS";
                                    break;
                                case 'Misc':
                                    $section = "ITEM_MISC";
                                    break;
                            }
                        }
                        if(!isset($_GET["section"]) or (isset($section) && ($item[$id]->type() == $section || $item[$id]->subtype() == $section))){

                            echo Core::modalButton(Core::numberText($item[$id]->id()), Item::showItem($item[$id]->vnum(), $item[$id]->quantity(), $item[$id]->rarity(), 0, $item[$id]->id()), Item::getRarityClass($item[$id]->rarity())." m-3 float-start");
                            
                            echo Core::openModal(Core::numberText($item[$id]->id()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()." [".Item::getRarityTier($item[$id]->rarity())."]"));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3 text-center"]);
                                        echo $item[$id]->icon()."<br>";
                                        if($item[$id]->quantity() > 1){
                                            echo $item[$id]->quantity()."ks";
                                        }
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9 text-center"]);
                                        if($item[$id]->type() == "ITEM_WEAPON"){
                                            echo "Damage: ".$item[$id]->showRarityValues()."<br>";
                                        } elseif($item[$id]->type() == "ITEM_ARMOR"){
                                            echo "Armor: ".$item[$id]->showAvarageRarityValue()."<br>";
                                        } elseif($item[$id]->type() == "ITEM_POTION"){
                                            if($item[$id]->subtype() == "ITEM_STAMINA"){
                                                echo "+ ".$item[$id]->showAvarageRarityValue()." Stamina<hr>";
                                            }
                                        }
                                        if($item[$id]->hasStone()){
                                            foreach ($item[$id]->stones() as $stone) {
                                                echo Item::showStone($stone);
                                            }
                                        }
                                        if($item[$id]->hasSocket()){
                                            echo Core::modalButton(Core::numberText($item[$id]->id())."_stone", "Add stone");
                                        }

                                        echo "<hr>";
                                        echo "Price: ".$item[$id]->rarityPrice().Core::addImage(IMAGESDIR."/money.png");

                                        echo Core::openForm();

                                            echo "<input type='hidden' name='item_id' value='".$item[$id]->id()."' />";
                                            if($item[$id]->type() == "ITEM_WEAPON" || $item[$id]->type() == "ITEM_ARMOR"){
                                                if(!$item[$id]->equipped()){
                                                    echo Core::addInput("submit", "Equip", "form-control btn bg-dark text-light mt-3 btn-dark");
                                                } else {
                                                    echo Core::addInput("submit", "Un-equip", "form-control btn bg-danger mt-3 btn-danger");
                                                }
                                                if(isset($_POST["Equip"])){

                                                    $sitem = Item::getItem($_POST["item_id"]);

                                                    if($sitem["token"] == $player->token() && $item[$id]->id() == $_POST["item_id"]){

                                                        Database::queryAlone("UPDATE items SET equipped=0 WHERE item_subtype = ?", [$item["item_subtype"]]);
                                                        Database::queryAlone("UPDATE items SET equipped=1 WHERE id = ?", [$item["id"]]);
                                                        echo Core::refresh();

                                                    }

                                                } elseif(isset($_POST["Un-equip"])){

                                                    $sitem = Item::getItem($_POST["item_id"]);

                                                    if($item["token"] == $player->token() && $item[$id]->id() == $_POST["item_id"]){

                                                        Database::queryAlone("UPDATE items SET equipped=0 WHERE item_subtype = ?", [$item["item_subtype"]]);
                                                        echo Core::refresh();

                                                    }

                                                }
                                            } elseif($item[$id]->type() == "ITEM_POTION"){

                                                echo Core::addInput("submit", "Use", "form-control btn text-light bg-dark mt-3 btn-dark");

                                                if(isset($_POST["Use"])){

                                                    if($item[$id]->subtype() == "ITEM_STAMINA"){

                                                        $get_item = Item::getItem($_POST["item_id"]);

                                                        if($get_item["token"] == $player->token() && $item[$id]->id() == $_POST["item_id"]){

                                                            if($get_item["quantity"] == 1){

                                                                if($player->stamina() < $player->max_stamina()){

                                                                    $item[$id]->remove();
                                                                    $stamina = Core::maxVal($item[$id]->showAvarageRarityValue(), ($player->max_stamina()-$player->stamina()));
                                                                    $player->setStamina($stamina);
                                                                    $_SESSION["stamina_message"] = "You have recovered ${stamina} stamina!";
                                                                    echo Core::refresh();

                                                                } else {
                
                                                                    $_SESSION["warning"] = "Potion wasn't use because you already have max stamina!";
                
                                                                }

                                                            } else {

                                                                if($player->stamina() < $player->max_stamina()){

                                                                    $item[$id]->removeOne();
                                                                    $stamina = Core::maxVal($item[$id]->showAvarageRarityValue(), ($player->max_stamina()-$player->stamina()));
                                                                    $player->setStamina($stamina);
                                                                    $_SESSION["stamina_message"] = "You have recovered ${stamina} stamina!";
                                                                    echo Core::refresh();

                                                                } else {
                
                                                                    $_SESSION["warning"] = "Potion wasn't use because you already have max stamina!";
                
                                                                }

                                                            }

                                                        }

                                                    }
                                                        
                                                }

                                            }

                                            if(!empty($refine_sets[$item[$id]->vnum()][$item[$id]->rarity()])){
                                                // Start of grouping items by vnum and rarity
                                                $srefsets = $refine_sets[$item[$id]->vnum()][$item[$id]->rarity()];
                                                $urefsets = array();
                                                $sref_count = 0;
                                                foreach ($srefsets as $srefset) {
                                                    $sref_count++;
                                                }
                                                for($i = 0; $i < $sref_count; $i++){
                                                    $uref_count = 0;
                                                    foreach ($urefsets as $urefset) {
                                                        $uref_count++;
                                                    }
                                                    if($uref_count == 0){
                                                        if(isset($srefsets[$i]["vnum"]) && isset($srefsets[$i]["quantity"]) && isset($srefsets[$i]["rarity"])){
                                                            array_push($urefsets, array("vnum" => $srefsets[$i]["vnum"],"quantity" => $srefsets[$i]["quantity"],"rarity" => $srefsets[$i]["rarity"]));
                                                            unset($srefsets[$i]);
                                                        }
                                                    } else {
                                                        for($u = 0; $u < $uref_count; $u++){
                                                            
                                                            if(isset($srefsets[$i]["vnum"]) && isset($srefsets[$i]["quantity"]) && isset($srefsets[$i]["rarity"]) && isset($urefsets[$u]["vnum"]) && isset($urefsets[$u]["quantity"]) && isset($urefsets[$u]["rarity"])){
                                                                if($srefsets[$i]["vnum"] == $urefsets[$u]["vnum"]){
                                                                    if($srefsets[$i]["rarity"] == $urefsets[$u]["rarity"]){
                                                                        $urefsets[$u]["quantity"] += $srefsets[$i]["quantity"];
                                                                        unset($srefsets[$i]);
                                                                    } else {
                                                                        array_push($urefsets, array("vnum" => $srefsets[$i]["vnum"],"quantity" => $srefsets[$i]["quantity"],"rarity" => $srefsets[$i]["rarity"]));
                                                                        unset($srefsets[$i]);
                                                                    }
                                                                } else {
                                                                    array_push($urefsets, array("vnum" => $srefsets[$i]["vnum"],"quantity" => $srefsets[$i]["quantity"],"rarity" => $srefsets[$i]["rarity"]));
                                                                    unset($srefsets[$i]);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                // end of grouping items by vnum and rarity
                                                echo '<div class="col-12 mt-5">Item Upgrade</div><hr>';
                                                echo '<div class="mt-3 col-12">';
                                                    echo '<div class="d-flex flex-row flex-wrap justify-content-center">';
                                                    foreach($urefsets as $refine_set){
                                                        echo '<div class="m-1">';
                                                            echo Item::showItem($refine_set["vnum"], Item::ownQuantity($refine_set["vnum"], $player->token(), $refine_set["rarity"])." / ".$refine_set["quantity"], $refine_set["rarity"]);
                                                            ;
                                                        echo '</div>';
                                                    }
                                                    echo '</div>';
                                                echo '</div>';
                                                echo Core::addInput("submit", "Upgrade", "form-control btn bg-success mt-3 btn-success");
                                                if(isset($_POST["Upgrade"])){

                                                    if(isset($_POST["item_id"])){
                                                        $get_item = Item::getItem($_POST["item_id"]);
                                                    }

                                                    if($item[$id]->rarity() == 8){
                                                        return;
                                                    }
                                                    
                                                    $upgrade = false;
                                                    if(isset($get_item["token"]) && $get_item["token"] == $player->token() && $item[$id]->id() == $_POST["item_id"]){

                                                        foreach($urefsets as $refine_set){
                                                            if(Item::ownQuantity($refine_set["vnum"], $player->token(), $refine_set["rarity"]) >= $refine_set["quantity"]){

                                                                $upgrade = true;
                                                                Item::removeItems($refine_set["vnum"], $player->token(), $refine_set["quantity"], $refine_set["rarity"]);
                                                                
                                                            }
                                                            
                                                        }

                                                        if($upgrade == true){
                                                            
                                                            $item[$id]->upgradeRarity();
                                                            $_SESSION["upgrade"] = Item::getRarityColorText(Core::minVal(($item[$id]->rarity()-1),1), $item[$id]->name())." was successfully upgraded!";
                                                                
                                                        } else {
                                                            $_SESSION["upgrade"] = "Not enough resources!";
                                                        }
                                                        
                                                    }

                                                }
                                            }

                                            if(!empty($salvages[$item[$id]->vnum()])){
                                                // start of grouping salvageses
                                                $ssalvageses = $salvages[$item[$id]->vnum()];
                                                $usalvageses = array();
                                                $ssalvage_count = 0;
                                                foreach ($ssalvageses as $srefset) {
                                                    $ssalvage_count++;
                                                }
                                                for($i = 0; $i < $ssalvage_count; $i++){
                                                    $usalvage_count = 0;
                                                    foreach ($usalvageses as $usalvage) {
                                                        $usalvage_count++;
                                                    }
                                                    if($usalvage_count == 0){
                                                        if(isset($ssalvageses[$i]["vnum"]) && isset($ssalvageses[$i]["quantity"]) && isset($ssalvageses[$i]["rarity"])){
                                                            array_push($usalvageses, array("vnum" => $ssalvageses[$i]["vnum"],"quantity" => $ssalvageses[$i]["quantity"],"rarity" => $ssalvageses[$i]["rarity"],"chance" => $ssalvageses[$i]["chance"]));
                                                            unset($ssalvageses[$i]);
                                                        }
                                                    } else {
                                                        for($u = 0; $u < $usalvage_count; $u++){
                                                            
                                                            if(isset($ssalvageses[$i]["vnum"]) && isset($ssalvageses[$i]["quantity"]) && isset($ssalvageses[$i]["rarity"]) && isset($usalvageses[$u]["vnum"]) && isset($usalvageses[$u]["quantity"]) && isset($usalvageses[$u]["rarity"])){
                                                                if($ssalvageses[$i]["vnum"] == $usalvageses[$u]["vnum"]){
                                                                    if($ssalvageses[$i]["rarity"] == $usalvageses[$u]["rarity"]){
                                                                        $usalvageses[$u]["quantity"] += $ssalvageses[$i]["quantity"];
                                                                        unset($ssalvageses[$i]);
                                                                    } else {
                                                                        array_push($usalvageses, array("vnum" => $ssalvageses[$i]["vnum"],"quantity" => $ssalvageses[$i]["quantity"],"rarity" => $ssalvageses[$i]["rarity"],"chance" => $ssalvageses[$i]["chance"]));
                                                                        unset($ssalvageses[$i]);
                                                                    }
                                                                } else {
                                                                    array_push($usalvageses, array("vnum" => $ssalvageses[$i]["vnum"],"quantity" => $ssalvageses[$i]["quantity"],"rarity" => $ssalvageses[$i]["rarity"],"chance" => $ssalvageses[$i]["chance"]));
                                                                    unset($ssalvageses[$i]);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                // end of grouping salvageses
                                                echo '<div class="col-12 mt-5">Salvage</div><hr>';
                                                echo '<div class="mt-3 col-12">';
                                                    echo '<div class="d-flex flex-row flex-wrap justify-content-center">';
                                                    foreach($usalvageses as $salvage){
                                                        echo '<div class="m-1">';
                                                            echo Item::showItem($salvage["vnum"], (Core::minVal(($salvage["quantity"]*($item[$id]->rarity()-1)), $salvage["quantity"])/2), $salvage["rarity"], $salvage["chance"]);
                                                        echo '</div>';
                                                    }
                                                    echo '</div>';
                                                echo '</div>';
                                                echo Core::addInput("submit", "Salvage", "form-control btn bg-primary mt-3 btn-success");
                                                if(isset($_POST["Salvage"])){

                                                    if(isset($_POST["item_id"])){
                                                        $get_item = Item::getItem($_POST["item_id"]);
                                                    }

                                                    if(isset($get_item["token"]) && $get_item["token"] == $player->token() && $item[$id]->id() == $_POST["item_id"]){

                                                        $salvage_result = array();

                                                        foreach($usalvageses as $salvage_item){
                                                            if($salvage_item["chance"]*LOOT_CHANCE_MULTIPLIER >= Item::randomSalvageNumber()){
                                                                array_push($salvage_result, array("vnum" => $salvage_item["vnum"], "quantity" => (Core::minVal(($salvage["quantity"]*($item[$id]->rarity()-1)), $salvage["quantity"])/2), "rarity" => $salvage_item["rarity"]));
                                                                $player->addItem($salvage_item["vnum"],(Core::minVal(($salvage["quantity"]*($item[$id]->rarity()-1)), $salvage["quantity"])/2),$salvage_item["rarity"]);
                                                            }
                                                        }
                                                        $item[$id]->remove();

                                                        $_SESSION["salvage"] = $salvage_result;

                                                    }

                                                }
                                            }


                                        echo Core::closeForm();

                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                            echo Core::openModal(Core::numberText($item[$id]->id())."_stone", "Add stone");
                                echo '<div class="row">
                                    <div class="col-4">'.Item::showItem($item[$id]->vnum(),$item[$id]->quantity(), $item[$id]->rarity(), 0, $item[$id]->id()).'</div>
                                    <div class="col-8">Stones list</div>
                                </div>';
                            echo Core::closeModal();

                        }
                    }
        
        ?>

        <div class="clearfix"></div>

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