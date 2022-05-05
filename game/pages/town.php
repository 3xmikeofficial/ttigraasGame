<?php 

    if(Town::doExist($player->id())){

        $town = new Town($player->id());

    }

?>

<div class="card bg-dark">
    <div class="card-header"><?php if(Town::doExist($player->id())){ echo $town->name(); } else { echo "Town"; } ?></div>
    <div class="card-body">
        <?php 
        
            if($player->level() < 50){

                ?>

                    You need level 100 to enter City.

                <?php

            } else {

                if(Town::doExist($player->id())){
                    
                    echo Core::openDiv(["class" => "row"]);

                                /* Food - start */
                                echo Core::openDiv(["class" => "nav-item col-3"]);

                                    echo Core::openDiv(["class" => "float-start text-start"]);

                                        echo "Food";

                                    echo Core::closeDiv();

                                    echo Core::openDiv(["class" => "text-end"]);

                                        echo "<strong><i>".$town->food()." ( + ".((30*Core::maxVal($town->farm(), 1)+(($town->farm()**2)))+($town->farm()**2)-(2*Core::maxVal($town->farm(), 1)))." / h )</i></strong>";

                                    echo Core::closeDiv();
                                echo Core::closeDiv();
                                /* Wood - start */
                                echo Core::openDiv(["class" => "nav-item col-3"]);

                                    echo Core::openDiv(["class" => "float-start text-start"]);

                                        echo "Wood";

                                    echo Core::closeDiv();

                                    echo Core::openDiv(["class" => "text-end"]);

                                        echo "<strong><i>".$town->wood()." ( + ".(8*Core::maxVal($town->woodcutter(), 1))." / h )</i></strong>";

                                    echo Core::closeDiv();
                                echo Core::closeDiv();

                                /* Stone - start */

                                echo Core::openDiv(["class" => "col-3 nav-item"]);
                                    echo Core::openDiv(["class" => "float-start text-start"]);

                                        echo "Stone";

                                    echo Core::closeDiv();

                                    echo Core::openDiv(["class" => "text-end"]);

                                        echo "<strong><i>".$town->stone()." ( + ".(8*Core::maxVal($town->quarry(), 1))." / h )</i></strong>";

                                    echo Core::closeDiv();
                                echo Core::closeDiv();

                                /* Magisteel - start */

                                echo Core::openDiv(["class" => "col-3 nav-item"]);
                                    echo Core::openDiv(["class" => "float-start text-start"]);

                                        echo "Magisteel";

                                    echo Core::closeDiv();

                                    echo Core::openDiv(["class" => "text-end"]);

                                        echo "<strong><i>".$town->iron()." ( + ".(8*Core::maxVal($town->mine(), 1))." / h )</i></strong>";

                                    echo Core::closeDiv();
                                echo Core::closeDiv();

                        echo Core::openDiv(["class" => "col-12 mt-3"]);

                            echo Core::openDiv(["class" => "city-bg float-left"]);
                            
                                echo Core::addImage("./images/Town.png", ["class" => "img-fluid"]);

                                ?>

                                    <div class="visual-building visual-building-main<?php echo Town::getStage($town->main()); ?>"></div>
                                    <div class="visual-building visual-building-storage<?php echo Town::getStage($town->storage()); ?>"></div>
                                    <div class="visual-building visual-building-farm<?php echo Town::getStage($town->farm()); ?>"></div>
                                    <?php if($town->church()){ ?><div class="visual-building visual-building-church<?php echo Town::getStage($town->church()); ?>"></div><?php } ?>
                                    <?php if($town->barracks()){ ?><div class="visual-building visual-building-barracks<?php echo Town::getStage($town->barracks()); ?>"></div><?php } ?>
                                    <?php if($town->watchtower()){ ?><div class="visual-building visual-building-watchtower<?php echo Town::getStage($town->watchtower()); ?>"></div><?php } ?>
                                    <?php if($town->market()){ ?><div class="visual-building visual-building-market<?php echo Town::getStage($town->market()); ?>"></div><?php } ?>
                                    <?php if($town->stable()){ ?><div class="visual-building visual-building-stable<?php echo Town::getStage($town->stable()); ?>"></div><?php } ?>
                                    <?php if($town->garage()){ ?><div class="visual-building visual-building-garage<?php echo Town::getStage($town->garage()); ?>"></div><?php } ?>
                                    <?php if($town->wood()){ ?><div class="visual-building visual-building-wood<?php echo Town::getStage($town->wood()); ?>"></div><?php } ?>
                                    <?php if($town->stone()){ ?><div class="visual-building visual-building-stone<?php echo Town::getStage($town->stone()); ?>"></div><?php } ?>
                                    <?php if($town->iron()){ ?><div class="visual-building visual-building-iron<?php echo Town::getStage($town->iron()); ?>"></div><?php } ?>
                                    <?php if($town->smith()){ ?><div class="visual-building visual-building-smith<?php echo Town::getStage($town->smith()); ?>"></div><?php } ?>

                                <?php
                            
                            echo Core::closeDiv();

                        echo Core::closeDiv();

                    echo Core::closeDiv();

                } else {

                    echo Core::openForm();

                        echo Core::addLabel("Name of town:", "town_name", ["class" => "col-3"]);

                        echo Core::addInput("text", "town_name", "form-control col-9", ["placeholder" => "Name of town"]);

                        echo Core::addInput("submit", "create_town", "form-control bg-success mt-3", ["value" => "Create town"]);

                        if(isset($_POST["create_town"])){

                            if(Core::check($_POST["town_name"])){

                                if(!Town::nameTaken($_POST["town_name"])){

                                    Town::create(Core::secureInput($_POST["town_name"]), $player->id());
                                    
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

<?php 

    if(Town::doExist($player->id())){

        echo Core::openCard("Buildings");

            $buildings = ["main","storage","farm","church","barracks","watchtower","market","stable","garage","wood","stone","iron","smith"];
            $building_names = ["main" => "Village Headquarters", "storage" => "Warehouse", "farm" => "Farm", "church" => "Church", "barracks" => "Barracks", "watchtower" => "Watchtower", "market" => "Market", "stable" => "Stable", "garage" => "Workshop", "wood" => "Timber camp", "stone" => "Quarry", "iron" => "Magisteel mine", "smith" => "Smithy"];


                echo Core::opendiv(["class" => "row"]);
            foreach ($buildings as $building) {
                echo Core::openDiv(["class" => "nav-item col-12"]);
                    echo Core::openDiv(["class" => "col-4 float-start text-start"]).$building_names[$building].($town->$building() > 0 ? " ( Lv.".$town->$building()." )" : "").Core::closeDiv();
                    echo Core::openDiv(["class" => "col-4 float-start text-center"]);

                        @$resource_list[$building] = unserialize(Town::getRecipe($building, $town->$building()));
                        if($resource_list[$building]){

                            foreach ($resource_list[$building] as $resource => $value) {
                                echo ucfirst($resource).": ".$value."&nbsp;&nbsp;&nbsp;";
                            }

                        }

                    echo Core::closeDiv();
                    echo Core::openDiv(["class" => "col-4 float-end text-end"]);
                    if($resource_list[$building]){
                        echo "<a href='?page=town&action=upgrade_building&id=".$building."'>".($town->$building() == 0 ? "Build" : "Upgrade")."</a>";
                    } else {
                        echo "MAX";
                    }
                    echo Core::closeDiv();
                echo Core::closeDiv();
            }
                echo Core::closediv();

            if(isset($_GET["action"]) && $_GET["action"] == "upgrade_building" && isset($_GET["id"])){

                Town::upgradeBuilding($_GET["id"], $player->id());

            }

        echo Core::closeCard();

    }

?>