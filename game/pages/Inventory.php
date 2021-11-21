<div class="card bg-dark">

    <div class="card-header d-flex justify-content-center"><a href="<?php echo GAME_URL; ?>?page=inventory" class="mx-3 <?php if(!isset($_GET["section"])){ echo "active"; } ?>">All</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Weapons" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Weapons"){ echo "active"; } ?>">Weapons</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Helmets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Helmets"){ echo "active"; } ?>">Helmets</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Armors" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Armors"){ echo "active"; } ?>">Armors</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Shields" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Shields"){ echo "active"; } ?>">Shields</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Earings" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Earings"){ echo "active"; } ?>">Earings</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Bracelets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Bracelets"){ echo "active"; } ?>">Bracelets</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Necklaces" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Necklaces"){ echo "active"; } ?>">Necklaces</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Belts" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Belts"){ echo "active"; } ?>">Belts</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Boots" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Boots"){ echo "active"; } ?>">Boots</a></div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">Name</div>
            <div class="col-4 text-center">Value</div>
            <div class="col-4 text-end">Price</div>
        
        <?php
            switch (@$_GET["section"]) {

                case 'Weapons':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->type() == "ITEM_WEAPON"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>    ".$item[$id]->name()."</span><span class='col-4 text-center'>Dmg: ".$item[$id]->min_value()*$item[$id]->rarity()." - ".$item[$id]->max_value()*$item[$id]->rarity()."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Helmets':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_HELMET"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Armors':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BODY"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Shields':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_SHIELD"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Earings':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_EARINGS"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Bracelets':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BRACELET"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Necklaces':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_NECKLACE"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;

                case 'Belts':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BELT"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                    
                case 'Boots':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BOOTS"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
                
                default:
                    $i = 0;
                    $inv = Item::getItems($_SESSION["user_token"]);
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->type() == "ITEM_WEAPON"){
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>    ".$item[$id]->name()."</span><span class='col-4 text-center'>Dmg: ".$item[$id]->min_value()*$item[$id]->rarity()." - ".$item[$id]->max_value()*$item[$id]->rarity()."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        } else {
                            if($i != 0){ echo "<hr>"; }
                            echo "<span class='col-4' style='color: ".Item::getRarityColor($item[$id]->rarity())."'>".$item[$id]->name()."</span><span class='col-4 text-center'>Armor: ".Item::getAvarage($item[$id]->min_value()*$item[$id]->rarity(), $item[$id]->max_value()*$item[$id]->rarity())."</span><span class='col-4 text-end'>".$item[$id]->price()*$item[$id]->rarity()."</span>";
                            $i++;
                        }
                    }
                    break;
            }
        
        ?>

        </div>

    </div>

</div>