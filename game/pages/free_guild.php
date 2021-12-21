
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

<?php 

if(!isset($_GET["section"])){ 
        
?>
<div class="row">
    <div class="col-2">
        <div class="card bg-dark">
            <div class="card-header bg-dark">Quests</div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="nav flex-column align-items-center nav-pills pe-0 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php 
                        
                            $quests = Quests::getAll();

                            foreach ($quests as $quest) {
                                
                                echo '<button class="nav-link col-12" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#'.str_replace(" ", "_", $quest["name"]).'" type="button" role="tab" aria-controls="'.str_replace(" ", "_", $quest["name"]).'" aria-selected="false">'.$quest["name"].'</button>';
        
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content col-10" id="v-pills-tabContent">
        <div class="tab-pane fade show active" role="tabpanel">
            <?php 
                if(isset($_POST["quest_begin"])){ 
                    $quest = Quests::getOne($_POST["quest"]);
            ?>
            <div class="col-8 pe-3 float-start">
                <div class="card bg-dark">
                    <div class="card-header bg-dark"><?= $quest["name"]; ?></div>
                    <div class="card-body bg-dark">
                        <div class="col-3 float-start text-center">
                            <?= Core::addImage("https://static.wikia.nocookie.net/tensei-shitara-slime-datta-ken/images/e/ef/Black_spider.jpg"); ?>
                            <div class="col-12 float-start text-center mt-3">Stats</div>
                            <div class="col-6 float-start text-start">Health</div>
                            <div class="col-6 float-start text-end"><?= $quest["health"]; ?></div>
                            <div class="col-6 float-start text-start">Speed</div>
                            <div class="col-6 float-start text-end"><?= $quest["speed"]; ?></div>
                            <div class="col-6 float-start text-start">Strenght</div>
                            <div class="col-6 float-start text-end"><?= $quest["strenght"]; ?></div>
                            <div class="col-6 float-start text-start">Defense</div>
                            <div class="col-6 float-start text-end"><?= $quest["defense"]; ?></div>
                            <div class="col-12 float-start text-center mt-3">Requirements</div>
                            <div class="col-6 float-start text-start">Time</div>
                            <div class="col-6 float-start text-end"><?= $quest["time"]; ?>s</div>
                            <div class="col-6 float-start text-start">Stamina</div>
                            <div class="col-6 float-start text-end">-<?= $quest["cost"]; ?></div>
                        </div>
                        <div class="col-9 float-start text-center">
                            <?php 
                                if($player->stamina() > $quest["cost"]){
                        
                                    $monster = new Monster($quest["name"], [$quest["health"],$quest["speed"],$quest["strenght"],$quest["defense"]], Core::Random($quest["min_exp"], $quest["max_exp"]), Core::Random($quest["min_gold"], $quest["max_gold"]), $quest["inventory"], $quest["cost"]);
                            
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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 float-start">
                <div class="card bg-dark">
                    <div class="card-header bg-dark text-center">Rewards</div>
                    <div class="card-body bg-dark">
                        <?php 
                            if(isset($gameover)){ 
                                if(isset($battle_status) && $battle_status == "win"){
                                    if(isset($quest["inventory"]) && $quest["inventory"] != ""){
                                        $loot = unserialize($quest["inventory"]);
                                        echo '<div class="equipment">';
                                            foreach ($loot as $loot_item) {
                                                $selected_item = new Item($loot_item["vnum"]);
                                                $selected_item->setQuantity($loot_item["quantity"]);
                                                $selected_item->setRarity($loot_item["rarity"]);
                                                $player->addItem($loot_item["vnum"], $loot_item["quantity"], $loot_item["rarity"]);
                                                echo '
                                                    <div class="item float-start">
                                                        <div class="'.$selected_item->sizeText().'-slot m-3">
                                                            '.$selected_item->icon().'
                                                            <span class="quantity">'.$selected_item->quantity().'</span>
                                                        </div>
                                                        <div class="stats text-center">
                                                            '.$selected_item->showToolTip().'
                                                        </div>
                                                    </div>
                                                ';
                                                
                                            }
                                        echo "</div>";
                                    } else {
                                        echo "You didnt get loot this time!";
                                    }
                                } else {
                                    echo "You dont deserve sweets!";
                                }
                            } else { 
                                echo "After selecting quest here will be list of possible rewards!"; 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php

            foreach ($quests as $quest) {
                
                echo '<div class="tab-pane fade" id="'.str_replace(" ", "_", $quest["name"]).'" role="tabpanel" aria-labelledby="'.str_replace(" ", "_", $quest["name"]).'-tab">';

                    echo '<div class="tab-pane fade show active" role="tabpanel">
                    <div class="col-8 pe-3 float-start">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark">'.$quest["name"].'</div>
                            <div class="card-body bg-dark">
                                <div class="col-3 float-start text-center">
                                    '.Core::addImage("https://static.wikia.nocookie.net/tensei-shitara-slime-datta-ken/images/e/ef/Black_spider.jpg").'
                                    <div class="col-12 float-start text-center mt-3">Stats</div>
                                    <div class="col-6 float-start text-start">Health</div>
                                    <div class="col-6 float-start text-end">'.$quest["health"].'</div>
                                    <div class="col-6 float-start text-start">Speed</div>
                                    <div class="col-6 float-start text-end">'.$quest["speed"].'</div>
                                    <div class="col-6 float-start text-start">Strenght</div>
                                    <div class="col-6 float-start text-end">'.$quest["strenght"].'</div>
                                    <div class="col-6 float-start text-start">Defense</div>
                                    <div class="col-6 float-start text-end">'.$quest["defense"].'</div>
                                    <div class="col-12 float-start text-center mt-3">Requirements</div>
                                    <div class="col-6 float-start text-start">Time</div>
                                    <div class="col-6 float-start text-end">'.$quest["time"].'s</div>
                                    <div class="col-6 float-start text-start">Stamina</div>
                                    <div class="col-6 float-start text-end">-'.$quest["cost"].'</div>
                                </div>
                                <div class="col-9 float-start text-center">
                                
                                    <form method="post">
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

                            echo '</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 float-start">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark text-center">Rewards</div>
                            <div class="card-body bg-dark">';

                                // Rewards
                                
                                echo '<div class="col-6 float-start">Gold: </div><div class="col-6 float-start text-end">'.$quest["min_gold"].' - '.$quest["max_gold"].'g</div>';
                                echo '<div class="col-6 float-start">Exp: </div><div class="col-6 float-start text-end">'.$quest["min_exp"].' - '.$quest["max_exp"].'</div>';

                            echo '</div>
                        </div>
                    </div>
                </div>';

                echo '</div>';

            }
        
        ?>
    </div>
</div>

<?php

    }

?>