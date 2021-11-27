<div class="text-center text-white bg-dark" id="sidebar" style="height:100vh">
    <a href="/" class="text-center text-decoration-none">
      <div class="fs-4 mb-5">Ttigraas</div>
    </a>
    <img src="./images/race/<?php echo $player->race().".png"; ?> ?>" class="mx-auto" width="128" height="128">
    <ul class="nav nav-pills flex-column mt-3 lh-lg">
      <li class="nav-item mb-5">
        <?php echo $player->name(); ?>
      </li>
      <li class="nav-item mt-3 row mx-0 lh-lg px-3">
        <div class="col-3 text-start">Level:</div>
        <div class="col-9 fst-italic text-end"><strong><?php echo $player->level() == MAX_LEVEL ? "MAX" : $player->level(); ?></strong></div>
      </li>
      <?php if($player->level() != MAX_LEVEL){ ?>
        <div class="col-12 text-center mt-4">Exp</div>
        <div class="col-12 nav-item text-center px-3">
          <strong><?php echo $player->exp(); ?></strong> / <strong><?php echo $player->expNeeded(); ?></strong>
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
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?= ($player->stamina()/$player->max_stamina())*100 ?>%;">
                <span><?= $player->stamina(); ?> / <?= $player->max_stamina(); ?></span>
            </div>
        </div>
      </div>
      <li class="nav-item row mx-0 lh-lg mt-5">
          <div class="col-6"><?php echo "Health<br><color class='text-success'><strong>".$player->health(); ?></strong></color></div>
          <div class="col-6"><?php echo "Speed<br><color class='text-info'><strong>".$player->speed(); ?></strong></color></div>
          <div class="col-6 mt-4"><?php echo "Strenght<br><color class='text-danger'><strong>".$player->strenght(); ?></strong></color></div>
          <div class="col-6 mt-4"><?php echo "Defense<br><color class='text-warning'><strong>".$player->defense(); ?></strong></color></div>
        </li>
        <li class="nav-item row mx-0 lh-lg mt-3 px-3">
          <div class="col-3 text-start">Magicules:</div>
          <div class="col-9 fst-italic text-end"><strong><?php echo $player->magicules(); ?></strong></div>
        </li>
        <li class="nav-item row mx-0 lh-lg mt-3 mb-5 px-3">
          <div class="col-3 text-start">Coins:</div>
          <div class="col-9 fst-italic text-end"><strong><?php echo $player->gold(); ?></strong></div>
        </li>

        <div class="row">

          <?php 
          
            $equip = $player->equip();

            foreach ($equip as $id => $item) {
                $selected_item[$id] = new Item($item["item_vnum"], $item["rarity"], $id);

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

          <div class="col-12">Weapon</div>
          <div class="col-12 nav-item"><?php if(isset($weapon)){ echo "<span style='color: ".Item::getRarityColor($weapon->rarity())."'>".$weapon->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Helmet</div>
          <div class="col-12 nav-item"><?php if(isset($helmet)){ echo "<span style='color: ".Item::getRarityColor($helmet->rarity())."'>".$helmet->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Armor</div>
          <div class="col-12 nav-item"><?php if(isset($armor)){ echo "<span style='color: ".Item::getRarityColor($armor->rarity())."'>".$armor->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Shield</div>
          <div class="col-12 nav-item"><?php if(isset($shield)){ echo "<span style='color: ".Item::getRarityColor($shield->rarity())."'>".$shield->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Earings</div>
          <div class="col-12 nav-item"><?php if(isset($earings)){ echo "<span style='color: ".Item::getRarityColor($earings->rarity())."'>".$earings->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Bracelet</div>
          <div class="col-12 nav-item"><?php if(isset($bracelet)){ echo "<span style='color: ".Item::getRarityColor($bracelet->rarity())."'>".$bracelet->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Necklace</div>
          <div class="col-12 nav-item"><?php if(isset($necklace)){ echo "<span style='color: ".Item::getRarityColor($necklace->rarity())."'>".$necklace->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Belt</div>
          <div class="col-12 nav-item"><?php if(isset($belt)){ echo "<span style='color: ".Item::getRarityColor($belt->rarity())."'>".$belt->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>
          <div class="col-12 mt-4">Boots</div>
          <div class="col-12 nav-item"><?php if(isset($boots)){ echo "<span style='color: ".Item::getRarityColor($boots->rarity())."'>".$boots->name()."</span>"; } else { echo "<span class='text-danger'>Not equipped</span>"; } ?></div>

        </div>
        
    </ul>
      <div class="mt-5" style="width:100%">
        <a href="?page=free_guild" class="align-center d-block">
            Tavern
        </a>
        <a href="?page=shop" class="align-center d-block">
            Market
        </a>
        <a href="?page=inventory" class="align-center d-block">
            Inventory
        </a>
        <a href="?page=guild" class="align-center d-block">
            Guild
        </a>
        <a href="?page=logout" class="mb-3 align-center d-block">
            Logout
        </a>
      </div>
</div>