<div class="card bg-dark">

    <div class="card-header d-flex justify-content-center"><a href="<?php echo GAME_URL; ?>?page=inventory" class="mx-3 <?php if(!isset($_GET["section"])){ echo "active"; } ?>">All</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Weapons" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Weapons"){ echo "active"; } ?>">Weapons</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Helmets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Helmets"){ echo "active"; } ?>">Helmets</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Armors" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Armors"){ echo "active"; } ?>">Armors</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Shields" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Shields"){ echo "active"; } ?>">Shields</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Earings" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Earings"){ echo "active"; } ?>">Earings</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Bracelets" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Bracelets"){ echo "active"; } ?>">Bracelets</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Necklaces" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Necklaces"){ echo "active"; } ?>">Necklaces</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Belts" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Belts"){ echo "active"; } ?>">Belts</a><a href="<?php echo GAME_URL; ?>?page=inventory&section=Boots" class="mx-3  <?php if(isset($_GET["section"]) && $_GET["section"] == "Boots"){ echo "active"; } ?>">Boots</a></div>
    <div class="card-body">
        <?php
            switch (@$_GET["section"]) {

                case 'Weapons':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"], $item["id"]);
                        if($item[$id]->type() == "ITEM_WEAPON"){
                            echo Core::modalButton(Core::clean(Core::numberText($item[$id]->vnum())), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Helmets':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_HELMET"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Armors':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BODY"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Shields':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_SHIELD"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Earings':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_EARINGS"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Bracelets':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BRACELET"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Necklaces':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_NECKLACE"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;

                case 'Belts':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BELT"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                    
                case 'Boots':
                    $inv = Item::getItems($_SESSION["user_token"]);
                    $i = 0;
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"]);
                        if($item[$id]->subtype() == "ITEM_BOOTS"){
                            echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                            
                            echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                                echo Core::openDiv(["class" => "row"]);
                                    echo Core::openDiv(["class" => "col-3"]);
                                        echo $item[$id]->icon();
                                    echo Core::closeDiv();
                                    echo Core::openDiv(["class" => "col-9"]);
                                        echo $item[$id]->showTooltip();
                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                            echo Core::closeModal();
                        }
                    }
                    break;
                
                default:
                    $i = 0;
                    $inv = Item::getItems($_SESSION["user_token"]);
                    foreach ($inv as $id => $item) {
                        $item[$id] = new Item($item["item_vnum"], $item["rarity"], $item["id"]);
                        echo Core::modalButton(Core::numberText($item[$id]->vnum()), $item[$id]->icon(), $item[$id]->sizeText()."-slot m-3");
                        
                        echo Core::openModal(Core::numberText($item[$id]->vnum()), Item::getRarityColorText($item[$id]->rarity(), $item[$id]->name()));
                            echo Core::openDiv(["class" => "row"]);
                                echo Core::openDiv(["class" => "col-3"]);
                                    echo $item[$id]->icon();
                                echo Core::closeDiv();
                                echo Core::openDiv(["class" => "col-9 text-center"]);
                                    echo "Damage: ".$item[$id]->showDamage()."<br>";
                                    echo "Price: ".$item[$id]->rarityPrice()." g";

                                    echo Core::openForm();

                                        echo "<input type='hidden' name='item_id' value='".$item[$id]->id()."' />";
                                        if(!$item[$id]->equipped()){
                                            echo Core::addInput("submit", "Equip", "form-control btn bg-success mt-3 btn-success");
                                        } else {
                                            echo Core::addInput("submit", "Un-equip", "form-control btn bg-danger mt-3 btn-danger");
                                        }
                                        if(isset($_POST["Equip"])){

                                            $item = Item::getItem($_POST["item_id"]);

                                            if($item["token"] == $player->token()){

                                                Database::queryAlone("UPDATE items SET equipped=0 WHERE item_subtype = ?", [$item["item_subtype"]]);
                                                Database::queryAlone("UPDATE items SET equipped=1 WHERE id = ?", [$item["id"]]);
                                                echo Core::refresh();

                                            }

                                        } elseif(isset($_POST["Un-equip"])){

                                            $item = Item::getItem($_POST["item_id"]);

                                            if($item["token"] == $player->token()){

                                                Database::queryAlone("UPDATE items SET equipped=0 WHERE item_subtype = ?", [$item["item_subtype"]]);
                                                echo Core::refresh();

                                            }

                                        }
                                    echo Core::closeForm();

                                echo Core::closeDiv();
                            echo Core::closeDiv();
                        echo Core::closeModal();
                    }
                    break;
            }
        
        ?>

    </div>

</div>