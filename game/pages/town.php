<?php 

    if(Town::doExist($player->token())){

        $town = new Town($player->token());

    }

?>

<div class="card bg-dark">
    <div class="card-header"><?php if(Town::doExist($player->token())){ echo $town->name(); } else { echo "Town"; } ?></div>
    <div class="card-body">
        <?php 
        
            if($player->level() < 50){

                ?>

                    You need level 100 to enter City.

                <?php

            } else {

                if(Town::doExist($player->token())){

                    echo Core::openDiv(["class" => "city-bg"]);

                        echo Core::addImage("./images/Town.png", ["width" => "1280", "height" => "720"]);

                    echo Core::closeDiv();

                } else {

                    echo Core::openForm();

                        echo Core::addLabel("Name of town:", "town_name", ["class" => "col-3"]);

                        echo Core::addInput("text", "town_name", "form-control col-9", ["placeholder" => "Name of town"]);

                        echo Core::addInput("submit", "create_town", "form-control bg-success mt-3", ["value" => "Create town"]);

                        if(isset($_POST["create_town"])){

                            if(Core::check($_POST["town_name"])){

                                if(!Town::nameTaken($_POST["town_name"])){

                                    Town::create(Core::secureInput($_POST["town_name"]), $player->token());
                                    
                                    echo Core::alert("Your town is creating...", "success").Core::refresh(3);

                                } else {

                                    echo Core::alert("Name of town already exist!", "danger");
    
                                }

                            } else {

                                echo Core::alert("You have to choose name of town!", "danger");

                            }

                        }

                    echo Core::CloseForm();

                }

            }
        
        ?>
    </div>
</div>