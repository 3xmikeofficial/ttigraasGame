<img src="./images/race/<?php echo $player->race().".png"; ?>" class="mx-auto" style="max-width:128px;" width="128" height="128">
<ul class="nav nav-pills flex-column mt-3 lh-lg">
    <li class="nav-item mb-5 text-center">
    <?php echo $player->name(); ?>
    </li>
    <li class="nav-item mt-3 row mx-0 lh-lg px-3">
    <div class="col-3 text-start">Level:</div>
    <div class="col-9 fst-italic text-end"><strong><?php echo $player->level() == MAX_PLAYER_LEVEL ? "MAX" : $player->level(); ?></strong></div>
    </li>
    <?php if($player->level() != MAX_PLAYER_LEVEL){ ?>
    <div class="col-12 text-center mt-4">Exp</div>
    <div class="col-12 text-center px-3">
        <div class="progress bg-danger">
            <div class="progress-bar bg-danger" role="progressbar" style="width: <?= ($player->exp()/$player->expNeeded())*100 ?>%;">
                <span><?= $player->exp(); ?> / <?= $player->expNeeded(); ?></span>
            </div>
        </div>
    </div>
    <?php } ?>
    <li class="nav-item mt-3 row mx-0 lh-lg px-3">
    <div class="col-3 text-start">Race:</div>
    <div class="col-9 fst-italic text-end"><strong><?php echo $player->race(); ?></strong></div>
    </li>
    <li class="nav-item row mx-0 lh-lg px-3">
    <div class="col-3 text-start">Class:</div>
    <div class="col-9 fst-italic text-end"><strong><?php echo $player->class(); ?></strong></div>
    </li>
    <div class="col-12 text-center mt-4">Stamina</div>
    <div class="col-12 text-center px-3">
    <div class="progress bg-success">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($player->stamina()/$player->max_stamina())*100 ?>%;">
            <span><?= $player->stamina(); ?> / <?= $player->max_stamina(); ?></span>
        </div>
    </div>
    <?php if(isset($_SESSION["stamina_message"])){ echo Core::alert($_SESSION["stamina_message"], "success"); unset($_SESSION["stamina_message"]); } ?>
    </div>
    <?php 
        
    $equip = $player->equip();

    foreach ($equip as $id => $item) {
        $selected_item[$id] = new Item($item["item_vnum"], $item["quantity"], $item["rarity"], "", $item["id"]);

        if($selected_item[$id]->type() == "ITEM_WEAPON"){
            $weapon = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_HELMET"){
            $helmet = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_BODY"){
            $armor = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_SHIELD"){
            $shield = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_EARINGS"){
            $earings = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_BRACELET"){
            $bracelet = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_NECKLACE"){
            $necklace = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_BELT"){
            $belt = $selected_item[$id];
        } elseif($selected_item[$id]->subtype() == "ITEM_BOOTS"){
            $boots = $selected_item[$id];
        }
    }
    
    ?>

    <div class="row px-5 mt-5 d-flex justify-content-center">
    <div class="col-3 mb-3 ">
        <div class="item">
            <div class="small-slot <?php if(isset($helmet)){ echo Item::getRarityClass($helmet->rarity()); } ?> mx-auto">
            
                <?php 

                    if(isset($helmet)){ echo $helmet->icon();} else { echo Item::notEquiped(); } 

                ?>
            </div>
            <?php if(isset($helmet)){ ?>
                <div class="stats">
                <?= $helmet->showTooltip(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="medium-slot <?php if(isset($weapon)){ echo Item::getRarityClass($weapon->rarity()); } ?> mx-auto">
            <?php if(isset($weapon)){ echo $weapon->icon(); } else { echo Item::notEquiped(); } ?></div>
            <?php if(isset($weapon)){ ?>
                <div class="stats">
                <?= $weapon->showTooltip(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="medium-slot <?php if(isset($armor)){ echo Item::getRarityClass($armor->rarity()); } ?> mx-auto">
        
        <?php if(isset($armor)){ echo $armor->icon(); } else { echo Item::notEquiped(); } ?></div>
        <?php if(isset($armor)){ ?>
            <div class="stats">
            <?= $armor->showTooltip(); ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="small-slot <?php if(isset($shield)){ echo Item::getRarityClass($shield->rarity()); } ?>  mx-auto">
            <?php if(isset($shield)){ echo $shield->icon(); } else { echo Item::notEquiped(); } ?></div>
            <?php if(isset($shield)){ ?>
            <div class="stats">
                <?= $shield->showTooltip(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="small-slot <?php if(isset($earings)){ echo Item::getRarityClass($earings->rarity()); } ?> mx-auto">
            <?php if(isset($earings)){ echo $earings->icon(); } else { echo Item::notEquiped(); } ?>
        </div>
            <?php if(isset($earings)){ ?>
            <div class="stats">
                <?= $earings->showTooltip(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="small-slot <?php if(isset($bracelet)){ echo Item::getRarityClass($bracelet->rarity()); } ?> mx-auto">
            <?php if(isset($bracelet)){ echo $bracelet->icon(); } else { echo Item::notEquiped(); } ?></div>
            <?php if(isset($bracelet)){ ?><div class="stats"><?= $bracelet->showTooltip(); ?></div><?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
            <div class="small-slot <?php if(isset($necklace)){ echo Item::getRarityClass($necklace->rarity()); } ?> mx-auto">
            <?php if(isset($necklace)){ echo $necklace->icon(); } else { echo Item::notEquiped(); } ?></div>
            <?php if(isset($necklace)){ ?><div class="stats"><?= $necklace->showTooltip(); ?></div><?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
        <div class="small-slot <?php if(isset($belt)){ echo Item::getRarityClass($belt->rarity()); } ?> mx-auto"><?php if(isset($belt)){ echo $belt->icon(); } else { echo Item::notEquiped(); } ?></div>
        <?php if(isset($belt)){ ?><div class="stats"><?= $belt->showTooltip(); ?></div><?php } ?>
        </div>
    </div>
    <div class="col-3 mb-3">
        <div class="item">
        <div class="small-slot <?php if(isset($boots)){ echo Item::getRarityClass($boots->rarity()); } ?> mx-auto"><?php if(isset($boots)){ echo $boots->icon(); } else { echo Item::notEquiped(); } ?></div>
        <?php if(isset($boots)){ ?><div class="stats"><?= $boots->showTooltip(); ?></div><?php } ?>
        </div>
    </div>

    <li class="nav-item row mx-0 lh-lg mt-5">
        <div class="col-6 text-center"><?php echo "Health<br><color class='text-success'><strong>".$player->health(); ?></strong></color></div>
        <div class="col-6 text-center"><?php echo "Speed<br><color class='text-info'><strong>".$player->speed(); ?></strong></color></div>
        <div class="col-6 text-center mt-4"><?php echo "Strenght<br><color class='text-danger'><strong>".$player->strenght(); ?></strong></color></div>
        <div class="col-6 text-center mt-4"><?php echo "Defense<br><color class='text-warning'><strong>".$player->defense(); ?></strong></color></div>
    </li>
    <li class="nav-item row mx-0 mt-5 lh-lg px-3">
        <div class="col-3 text-start"><?= Core::addImage(IMAGESDIR."/magicule.png", "", "Gold coins"); ?></div>
        <div class="col-9 fst-italic text-end"><strong><?php echo $player->magicules(); ?></strong></div>
    </li>
    <li class="nav-item row mx-0 lh-lg mt-3 px-3">
        <div class="col-3 text-start"><?= Core::addImage(IMAGESDIR."/money.png", "", "Gold coins"); ?></div>
        <div class="col-9 fst-italic text-end"><strong><?php echo $player->gold(); ?></strong></div>
    </li>
    
</ul>