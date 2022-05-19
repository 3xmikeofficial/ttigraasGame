
    <div class="col-12">
        <div class="card bg-dark text-center d-md-inline-block w-100 px-md-5">
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

include_once(GAME.DIRECTORY_SEPARATOR."addons".DIRECTORY_SEPARATOR."quest_rewards.php");

if(!isset($_GET["section"])){ 
        
?>
    <div class="col-12 col-md-2 mb-3">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-start text-sm-center">Quests</div>
            <div class="card-body text-center">
                <div class="nav flex-column align-items-center nav-pills pe-0 col-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php 
                    
                        $quests = Quests::getAll();

                            foreach ($quests as $quest):

                                if(isset($_GET["id"]) && $_GET["id"] == $quest["id"]): ?>
                                
                                    <a class="nav-link col-12 active" href="<?= GAME_URL; ?>?page=free_guild&id=<?= $quest["id"]; ?>"><?= $quest["name"]; ?></a>
                                    
                                <?php else: ?>

                                    <a class="nav-link col-12" href="<?= GAME_URL; ?>?page=free_guild&id=<?= $quest["id"]; ?>"><?= $quest["name"]; ?></a>

                        <?php 
                                endif; 
                            
                            endforeach;
                        
                        ?>
                </div>
            </div>
        </div>
    </div>
<?php

} else {

?>

    <div class="col-12 col-md-2">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-center text-md-start">Quests</div>
            <div class="card-body text-center">
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
    

<?php

}

?>
        <?php

            if(isset($_GET["id"])){

                    $quest = Quests::getOne($_GET["id"]);

                    echo '
                    <div class="col-12 col-md-7 pe-3 float-start">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark">'.$quest["name"].'</div>
                            <div class="card-body bg-dark">
                                <div class="col-6 col-md-6 float-start text-center">'.Core::addImage(IMAGESDIR."/quests/".str_replace(" ", "_", $quest["name"]).".png", ["width" => "200px", "height" => "115px"], $quest["name"]).'</div>
                                <div class="col-6 col-md-6 float-start text-center">
                                    <div class="col-12 float-start text-center"><strong>Stats</strong></div>
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
                                <div class="col-12 col-md-12 mt-3 float-start text-center">';

                                    if(isset($_POST["quest_begin"])){
                    
                                    $quest = Quests::getOne($_POST["quest"]);
                
                                        if($player->stamina() > $quest["cost"]){
                                
                                            $monster = new Monster($quest["name"], [$quest["health"],$quest["speed"],$quest["strenght"],$quest["defense"]], Core::Random($quest["min_exp"], $quest["max_exp"]), Core::Random($quest["min_gold"], $quest["max_gold"]),Core::Random($quest["min_magicules"], $quest["max_magicules"]), @$quest_rewards[$quest["name"]], $quest["cost"]);
                                    
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
                    <div class="col-12 col-md-3 float-start mb-5">
                        <div class="card bg-dark">
                            <div class="card-header bg-dark text-center">Rewards</div>
                            <div class="card-body bg-dark text-center">';

                            echo '</div>
                        </div>
                    </div>';

            }
        
        ?>
</div>