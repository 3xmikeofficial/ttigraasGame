<div class="card bg-dark">
    <div class="card-header">Free guild</div>
    <div class="card-body">
        <div class="row">
            <div class="col-1"><img src="./images/Master.png" alt="test"></div>
            <div class="col-11 text-left">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo illum cumque omnis. Cupiditate quisquam quam atque porro quos eveniet sequi totam suscipit ratione beatae autem praesentium dolores itaque, at deserunt.<br>

                <form action="<?php $PHP_SELF; ?>" method='post'>
            
                    
                    <select name="quest" class='bg-dark form-control mt-4'>

                        <option selected disabled>Select adventure</option>

                        <?php 
                        
                                $quests = Quests::getAll();

                                foreach($quests as $quest){

                                    echo "<option value='".$quest["id"]."'>".$quest["name"]."</option>";

                                }
                        
                        ?>
                    </select>

                    <input type="submit" class="form-control bg-success mt-3" name="begin_quest" value="Accept job">

                    <?php 
                    
                        if(isset($_POST["begin_quest"])){

                            $quest = Quests::getOne($_POST["quest"]);

                            $monster = new Monster($quest["name"], [$quest["health"],$quest["speed"],$quest["strenght"],$quest["defense"]], Core::Random($quest["min_exp"], $quest["max_exp"]), Core::Random($quest["min_gold"], $quest["max_gold"]));

                            $turn = 0;

                            while(($player->health() > 0 and $monster->health() > 0)){

                                if(!$player->attacked and !$monster->attacked){

                                    // Attacking first
                                    if($player->speed() > $monster->speed()){
                                        $monster->setHealth(-$player->strenght());
                                        $player->attacked = true;
                                    } elseif($player->speed() == $monster->speed()){

                                        $rand = Core::random(1,2);

                                        if($rand == 1){ // Random select player
                                            $monster->setHealth(-$player->strenght());
                                            $player->attacked = true;
                                        } else {
                                            $player->setHealth(-$monster->strenght());
                                            $monster->attacked = true;
                                        }

                                    }  else {
                                        $player->setHealth(-$monster->strenght());
                                        $monster->attacked = true;
                                    }

                                    // Doing attack as second
                                    if($player->health() > 0 and $monster->health() > 0){

                                        if($player->attacked){
                                            $player->setHealth(-$monster->strenght());
                                            $monster->attacked = true;
                                        } else {
                                            $monster->setHealth(-$player->strenght());
                                            $player->attacked = true;
                                        }

                                    } else {

                                        if($player->health() > $monster->health()){
                                            $player->addExp($monster->exp());
                                            $player->addGold($monster->gold());
                                            echo Quests::alert("You earned <strong>".$monster->exp()."</strong> exp and <strong>".$monster->gold()."</strong> gold.", "success");
                                        } else {
                                            echo Quests::alert("Si slabý jak čaj!", "danger");
                                        }

                                    }

                                    $player->attacked = false;
                                    $monster->attacked = false;
                                    
                                    $turn++;

                                }
                
                            }

                        }
                    
                    ?>

                </form>
            
            </div>
        </div>
    </div>
</div>