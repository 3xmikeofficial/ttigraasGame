
    <div class="col-12">
        <div class="card bg-dark d-flex flex-row justify-content-center">
            <span>Filter:</span>
            <a href="<?php echo GAME_URL; ?>?page=free_guild" class="mx-3 <?php if(!isset($_GET["section"])){ echo "active"; } ?>">All</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Beginner" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Beginner"){ echo "active"; } ?>">Beginner</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Intermediate" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Intermediate"){ echo "active"; } ?>">Intermediate</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Expert" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Expert"){ echo "active"; } ?>">Expert</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Master" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Master"){ echo "active"; } ?>">Master</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Levels" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Levels"){ echo "active"; } ?>">Levels</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Golds" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Golds"){ echo "active"; } ?>">Golds</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Conquest" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Conquest"){ echo "active"; } ?>">Conquest</a>
            <a href="<?php echo GAME_URL; ?>?page=free_guild&section=Events" class="mx-3 <?php if(isset($_GET["section"]) && $_GET["section"] == "Events"){ echo "active"; } ?>">Events</a>
        </div>
        
    </div>

<div class="row">
<?php 

if(!isset($_GET["section"])){ 
        
?>
    <div class="col-2">
        <div class="card bg-dark">
            <div class="card-header bg-dark">Quests</div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="nav flex-column align-items-center nav-pills pe-0 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php 
                        
                            $quests = Quests::getAll();

                            foreach ($quests as $quest) {

                                if(isset($_GET["id"]) && $_GET["id"] == $quest["id"]){
                                
                                    echo '<a class="nav-link col-12 active" href="'.GAME_URL.'?page=free_guild&id='.$quest["id"].'">'.$quest["name"].'</a>';
                                    
                                } else {

                                    echo '<a class="nav-link col-12" href="'.GAME_URL.'?page=free_guild&id='.$quest["id"].'">'.$quest["name"].'</a>';

                                }

                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

} else {

?>

    <div class="col-2">
        <div class="card bg-dark">
            <div class="card-header bg-dark">Quests</div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="nav flex-column align-items-center nav-pills pe-0 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php 
                        
                            $quests = Quests::getAll($_GET["section"]);

                            if(!empty($quests)){

                                foreach ($quests as $quest) {

                                    if(isset($_GET["id"]) && $_GET["id"] == $quest["id"]){
                                    
                                        echo '<a class="nav-link col-12 active" href="'.GAME_URL.'?page=free_guild&id='.$quest["id"].'">'.$quest["name"].'</a>';
                                        
                                    } else {
    
                                        echo '<a class="nav-link col-12" href="'.GAME_URL.'?page=free_guild&id='.$quest["id"].'">'.$quest["name"].'</a>';
    
                                    }
    
                                }

                            } else {

                                echo Core::Redirect(GAME_URL."?page=free_guild");

                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

}

?>
        <?php

            if(isset($_GET["id"])){

                    $quest = Quests::getOne($_GET["id"]);

                    echo '
                    <div class="col-7 pe-3 float-start">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark">'.$quest["name"].'</div>
                            <div class="card-body bg-dark">
                                <div class="col-3 float-start text-center">
                                    '.Core::addImage(IMAGESDIR."/quests/".str_replace(" ", "_", $quest["name"]).".png", ["width" => "200px", "height" => "115px"], $quest["name"]).'
                                    <div class="col-12 float-start text-center mt-3"><strong>Stats</strong></div>
                                    <div class="col-6 float-start text-start">Health</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["health"].'</i></strong></div>
                                    <div class="col-6 float-start text-start">Speed</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["speed"].'</i></strong></div>
                                    <div class="col-6 float-start text-start">Strenght</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["strenght"].'</i></strong></div>
                                    <div class="col-6 float-start text-start">Defense</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["defense"].'</i></strong></div>
                                    <div class="col-12 float-start text-center mt-3"><strong>Requirements</strong></div>
                                    <div class="col-6 float-start text-start">Time</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["time"].'s</i></strong></div>
                                    <div class="col-6 float-start text-start">Stamina</div>
                                    <div class="col-6 float-start text-end">-<strong><i>'.$quest["cost"].'</i></strong></div>
                                    <div class="col-12 float-start text-center mt-3"><strong>Section</strong></div>
                                    <div class="col-6 float-start text-start">Difficulty</div>
                                    <div class="col-6 float-start text-end"><strong><i>'.$quest["section"].'</i></strong></div>
                                </div>
                                <div class="col-9 float-start text-center">';

                                    if(isset($_POST["quest_begin"])){
                    
                                    $quest = Quests::getOne($_POST["quest"]);
                
                                        if($player->stamina() > $quest["cost"]){
                                
                                            $monster = new Monster($quest["name"], [$quest["health"],$quest["speed"],$quest["strenght"],$quest["defense"]], Core::Random($quest["min_exp"], $quest["max_exp"]), Core::Random($quest["min_gold"], $quest["max_gold"]),Core::Random($quest["min_magicules"], $quest["max_magicules"]), $quest["inventory"], $quest["cost"]);
                                    
                                            $turn = 0;
                                            $gameover = false;
                                    
                                            while(!$gameover){
                                    
                                                if(!$player->attacked and !$monster->attacked){
                                    
                                                    // Attacking first
                                                    if($player->speed() > $monster->speed()){
                                                        $monster->setHealth(-$player->strenght());
                                                        $player->attacked = true;
                                                        if($monster->health() <= 0){
                                                            $gameover = true;
                                                        }
                                                    } elseif($player->speed() == $monster->speed()){
                                    
                                                        $rand = Core::random(1,2);
                                    
                                                        if($rand == 1){ // Random select player
                                                            $monster->setHealth(-$player->strenght());
                                                            $player->attacked = true;
                                                            if($monster->health() <= 0){
                                                                $gameover = true;
                                                            }
                                                        } else {
                                                            $player->setHealth(-$monster->strenght());
                                                            $monster->attacked = true;
                                                            if($player->health() <= 0){
                                                                $gameover = true;
                                                            }
                                                        }
                                    
                                                    }  else {
                                                        $player->setHealth(-$monster->strenght());
                                                        $monster->attacked = true;
                                                        if($player->health() <= 0){
                                                            $gameover = true;
                                                        }
                                                    }
                                    
                                                    // Doing attack as second
                                                    if($player->health() > 0 and $monster->health() > 0){
                                    
                                                        if($player->attacked){
                                                            $player->setHealth(-$monster->strenght());
                                                            $monster->attacked = true;
                                                            if($player->health() <= 0){
                                                                $gameover = true;
                                                            }
                                                        } else {
                                                            $monster->setHealth(-$player->strenght());
                                                            $player->attacked = true;
                                                            if($monster->health() <= 0){
                                                                $gameover = true;
                                                            }
                                                        }
                                    
                                                    } else {
                                    
                                                        $gameover = true;
                                    
                                                    }
                                    
                                                    $player->attacked = false;
                                                    $monster->attacked = false;
                                                    
                                                    $turn++;
                                    
                                                }
                                    
                                            }
                
                                            if($gameover){
                                                if($player->health() >= $monster->health()){
                                                    $player->addExp($monster->exp());
                                                    $player->addGold($monster->gold());
                                                    $exp = $monster->exp();
                                                    $gold = $monster->gold();
                                                    $magicules = $monster->magicules();
                                                    $battle_status = "win";
                                                    echo Quests::alert("You earned <strong>".$monster->exp()."</strong> exp and <strong>".$monster->gold()."</strong> gold.", "success");
                                                } else {
                                                    echo Quests::alert("Si slabý jak čaj!", "danger");
                                                }
                                                
                                                $player->setStamina(-$monster->_cost);
                                            }
                
                                        } else {
                
                                            echo Quests::alert("You dont have enough stamina!", "warning");
                
                                        }

                                    } else {
                                
                                        echo '<form method="post">
                                            <label for="customRange1" class="form-label">Repeats</label><br>
                                            <div class="col-10 float-start px-3">
                                                <input type="range"name="amountRange" value="1" class="form-range mt-2" id="customRange1" min="1" max="'.($player->stamina()/$quest["cost"]).'" oninput="this.form.amountInput.value=this.value">
                                            </div>
                                            <div class="col-2 float-start text-center px-3">
                                                <input type="text" class="form-control" name="amountInput" value="1" min="1" max="'.($player->stamina()/$quest["cost"]).'" oninput="this.form.amountRange.value=this.value" />
                                            </div>
                                            <div class="col-12 px-3">
                                            <input type="hidden" name="quest" value="'.$quest["id"].'" /> 
                                            <input name="quest_begin" type="submit" class="form-control bg-success mt-5" value="BEGIN">
                                            </div>
                                        
                                        </form>';

                                    }

                            echo '</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 float-start">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark text-center">Rewards</div>
                            <div class="card-body bg-dark text-center">';

                            if(isset($_POST["quest_begin"])){

                                if(isset($gameover)){ 
                                    if(isset($battle_status) && $battle_status == "win"){
                                        if(isset($quest["inventory"]) && $quest["inventory"] != ""){
                                            $loot = unserialize($quest["inventory"]);
                                            echo '<div class="equipment">';
                                                foreach ($loot as $id => $loot_item) {
                                                    $loot_chances[$id] = $loot_item["chance"]*LOOT_CHANCE_MULTIPLIER;
                                                    $random_numbers[$id] = Quests::randomLootNumber();
                                                    if($loot_chances[$id] >= $random_numbers[$id]){
                                                        $player->addItem($loot_item["vnum"], $loot_item["quantity"], $loot_item["rarity"]);
                                                        $selected_item = new Item($loot_item["vnum"]);
                                                        $selected_item->setQuantity($loot_item["quantity"]);
                                                        $selected_item->setRarity($loot_item["rarity"]);
                                                        echo '
                                                            <div class="item float-start">
                                                                <div class="'.$selected_item->sizeText().'-slot '.Item::getRarityClass($selected_item->rarity()).' m-3">
                                                                    '.$selected_item->icon().'
                                                                    <span class="quantity">'.(($selected_item->type() == "ITEM_WEAPON" or $selected_item->type() == "ITEM_ARMOR") ? "" : $selected_item->quantity()).'</span>
                                                                </div>
                                                                <div class="stats text-center">
                                                                    '.$selected_item->showToolTip().'
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                    
                                                }
                                                echo "</div>";
                                                echo '<hr class="col-12 float-start">';
                                                echo '<div class="col-6 float-start text-start">Gold: </div><div class="col-6 float-start text-end"><strong><i>'.$gold.'</i></strong></div>';
                                                echo '<div class="col-6 float-start text-start">Exp: </div><div class="col-6 float-start text-end"><strong><i>'.$exp.'</i></strong></div>';                                                                            
                                                echo '<div class="col-6 float-start text-start">Magicules: </div><div class="col-6 float-start text-end"><strong><i>'.$magicules.'</i></strong></div>';                                                                            
                                        } else {
                                            echo "You didnt get loot this time!";
                                        }
                                    } else {
                                        echo "You dont deserve sweets!";
                                    }
                                } else { 
                                    echo "After selecting quest here will be list of possible rewards!"; 
                                }

                            } else {

                                if(isset($quest["inventory"]) && $quest["inventory"] != ""){
                                    $loot = unserialize($quest["inventory"]);
                                    echo '<div class="equipment">';
                                        if(!isset($_GET["drop"])){
                                            $item_vnums = array();
                                            $grouped_items = array();
                                            foreach ($loot as $id => $loot_item) {
                                                
                                                if(!in_array($loot_item["vnum"], $item_vnums)){
                                                    array_push($item_vnums, $loot_item["vnum"]);
                                                }
                                                
                                            }
                                            foreach ($item_vnums as $item) {
                                                array_push($grouped_items, array("vnum" => $item, "quantity" => 1, "rarity" => 1));
                                            }
                                            foreach ($grouped_items as $group_item) {
                                                $selected_item = new Item($group_item["vnum"]);
                                                $selected_item->setQuantity($group_item["quantity"]);
                                                $selected_item->setRarity($group_item["rarity"]);
                                                echo '
                                                    <div class="item float-start">
                                                        <div class="'.$selected_item->sizeText().'-slot m-3">
                                                            '.$selected_item->icon().'
                                                            <span class="quantity">'.(($selected_item->type() == "ITEM_WEAPON" or $selected_item->type() == "ITEM_ARMOR") ? "" : $selected_item->quantity()).'</span>
                                                        </div>
                                                        <div class="stats text-center">
                                                            '.$selected_item->showToolTip().'
                                                        </div>
                                                    </div>
                                                ';
                                            }
                                        } else {
                                            foreach ($loot as $litem) {
                                                $selected_item = new Item($litem["vnum"]);
                                                $selected_item->setQuantity($litem["quantity"]);
                                                $selected_item->setRarity($litem["rarity"]);
                                                echo '
                                                    <div class="item float-start">
                                                        <div class="'.$selected_item->sizeText().'-slot '.Item::getRarityClass($selected_item->rarity()).' m-3">
                                                            '.$selected_item->icon().'
                                                            <span class="quantity">'.(($selected_item->type() == "ITEM_WEAPON" or $selected_item->type() == "ITEM_ARMOR") ? "" : $selected_item->quantity()).'</span>
                                                        </div>
                                                        <div class="stats text-center">
                                                            '.$selected_item->showToolTip().'
                                                        </div>
                                                    </div>
                                                ';
                                            }
                                        }
                                        echo "</div>";
                                } else {
                                    echo "There is no reward!";
                                }
                                echo "<hr class='col-12'>";

                                    // Rewards
                                    
                                    echo '<div class="col-6 float-start text-start">Gold: </div><div class="col-6 float-start text-end"><strong><i>'.$quest["min_gold"].'</i></strong> - <strong><i>'.$quest["max_gold"].'g</i></strong></div>';
                                    echo '<div class="col-6 float-start text-start">Exp: </div><div class="col-6 float-start text-end"><strong><i>'.$quest["min_exp"].'</i></strong> - <strong><i>'.$quest["max_exp"].'</i></strong></div>';
                                    if(!isset($_GET["drop"])){
                                        echo "<div class='col-12 mt-3 float-start'><a href='".ACTUAL_URL."&drop=full'>Show complete drop</a></div>";
                                    }

                            }

                            echo '</div>
                        </div>
                    </div>
                </div>';

                echo '</div>';

            }
        
        ?>
    </div>
</div>