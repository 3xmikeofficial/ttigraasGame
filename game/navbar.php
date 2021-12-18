<div class="text-center text-white bg-dark" id="sidebar" style="height:100vh">
    <a href="/" class="text-center text-decoration-none">
      <div class="fs-4 mb-5">Ttigraas</div>
    </a>
    <img src="./images/race/<?php echo $player->race().".png"; ?>" class="mx-auto" width="128" height="128">
    <ul class="nav nav-pills flex-column mt-3 lh-lg">
      <li class="nav-item mb-5">
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
            $selected_item[$id] = new Item($item["item_vnum"], $item["rarity"], $item["id"]);

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

      <div class="equipment mt-5">
        <div class="helmet">
          <div class="small-slot item mx-auto">
          <?php 
            if(isset($helmet)){ ?>
              <div class="stats">
                <?= $helmet->showTooltip(); ?>
              </div>
              <?php 
            
            }

                if(isset($helmet)){ 
                  echo $helmet->icon();
                } else { 
                  echo Item::notEquiped(); 
                } 

              ?>
          </div>
        </div>
        <div class="weapon item float-start">
        <?php if(isset($weapon)){ ?>
          <div class="stats">
            <?= $weapon->showTooltip(); ?>
          </div>
        <?php } ?>
        <div class="medium-slot mt-3"><?php if(isset($weapon)){ echo $weapon->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="armor float-start">
          <div class="medium-slot item mt-3">
          <?php if(isset($armor)){ ?><div class="stats"><?= $armor->showTooltip(); ?></div><?php } ?>
            <?php if(isset($armor)){ echo $armor->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="shield float-start">
          <div class="small-slot item mt-3">
          <?php if(isset($shield)){ ?>
            <div class="stats">
              <?= $shield->showTooltip(); ?>
            </div>
          <?php } ?>
          <?php if(isset($shield)){ echo $shield->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="earings item float-start">
          <?php if(isset($earings)){ ?>
            <div class="stats">
              <?= $earings->showTooltip(); ?>
            </div>
          <?php } ?>
          <div class="small-slot mt-3"><?php if(isset($earings)){ echo $earings->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="bracelet item float-start">
        <?php if(isset($bracelet)){ ?><div class="stats"><?= $bracelet->showTooltip(); ?></div><?php } ?>
          <div class="small-slot mt-3"><?php if(isset($bracelet)){ echo $bracelet->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="necklace item float-start">
        <?php if(isset($necklace)){ ?><div class="stats"><?= $necklace->showTooltip(); ?></div><?php } ?>
          <div class="small-slot mt-3"><?php if(isset($necklace)){ echo $necklace->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="belt item">
          <?php if(isset($belt)){ ?><div class="stats"><?= $belt->showTooltip(); ?></div><?php } ?>
          <div class="small-slot mx-auto"><?php if(isset($belt)){ echo $belt->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
        <div class="boots item">
          <?php if(isset($boots)){ ?><div class="stats"><?= $boots->showTooltip(); ?></div><?php } ?>
          <div class="small-slot mx-auto"><?php if(isset($boots)){ echo $boots->icon(); } else { echo Item::notEquiped(); } ?></div>
        </div>
      </div>

      <li class="nav-item row mx-0 lh-lg mt-5">
          <div class="col-6"><?php echo "Health<br><color class='text-success'><strong>".$player->health(); ?></strong></color></div>
          <div class="col-6"><?php echo "Speed<br><color class='text-info'><strong>".$player->speed(); ?></strong></color></div>
          <div class="col-6 mt-4"><?php echo "Strenght<br><color class='text-danger'><strong>".$player->strenght(); ?></strong></color></div>
          <div class="col-6 mt-4"><?php echo "Defense<br><color class='text-warning'><strong>".$player->defense(); ?></strong></color></div>
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
      <div class="mt-5" style="width:100%">
        <a href="?page=free_guild" class="align-center d-block">
            Tavern
        </a>
        <a href="?page=shop" class="align-center d-block">
            Market
        </a>
        <a href="?page=stables" class="align-center d-block">
            Stables
        </a>
        <a href="?page=inventory" class="align-center d-block">
            Inventory
        </a>
        <a href="?page=town" class="align-center d-block">
            Town
        </a>
        <a href="?page=labyrinth" class="align-center d-block">
            Labyrinth
        </a>
        <a href="?page=guild" class="align-center d-block">
            Guild
        </a>
        <a href="?page=logout" class="mb-3 align-center d-block">
            Logout
        </a>
      </div>
</div>