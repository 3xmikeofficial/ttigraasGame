<div class="card bg-dark">

    <div class="card-header">Item creator</div>
    <div class="card-body">

        <form action="<?php $PHP_SELF; ?>" method="post">
        
            <select name="character" class="form-control selectmultiple" size="1" multiple="multiple">
                <option disabled>Choose player:</option>
                <?php 

                    $characters = Character::getAll();

                    foreach ($characters as $character) {
                        echo "<option value='".$character['id']."'>".$character['name']."</option>";
                    }
                
                ?>
            </select>

            <select name="item[]" class="form-control selectmultiple mt-3" size="1" multiple="multiple">
                <option disabled>Choose item:</option>
                <?php 

                    $items = Item::getAll();

                    foreach ($items as $item) {
                        echo "<option value='".$item['id']."'>".$item['item_name']."</option>";
                    }
                
                ?>
            </select>

            <input type="number" name="quantity" class="form-control mt-3" value="1" min="1" max="<?= STACK_LIMIT; ?>"/>
            <input type="number" name="rarity" class="form-control mt-3" value="1" min="1" max="<?= MAX_RARITY; ?>" />

            <input type="submit" value="Add Item" name="add_item" class="form-control bg-success mt-3">

            <?php 
            
                if(isset($_POST["add_item"])){

                    if(isset($_POST["item"]) && isset($_POST["character"])){

                        foreach ($_POST["item"] as $id => $pitem) {
                            $item[$id] = new Item($pitem);

                            $item[$id]->setQuantity($_POST["quantity"]);
                            $item[$id]->setRarity($_POST["rarity"]);
    
                            if($item[$id]->type() == "ITEM_WEAPON" || $item[$id]->type() == "ITEM_ARMOR"){
                                $item[$id]->setQuantity(1);
                            }
    
                            $char = new Player((int) $_POST["character"]);
    
                            $char->addItem($item[$id]->vnum(), $item[$id]->quantity(), $item[$id]->rarity());
                            echo Item::checkStackLimit($item[$id]->quantity())."x ".$item[$id]->name()." ( Tier: ".Item::checkMaxRarity($item[$id]->rarity())." ) was successfully added!<br>";    
                        }

                    }
                    
                }
            
            ?>
    
        </form>

    </div>

</div>
<div class="card bg-dark mb-5">
    <div class="card-header bg-dark">Loot creator</div>
    <div class="card-body bg-dark">
        <form action="<?php $PHP_SELF; ?>" method="post">
            <select name="items[]" class="form-control selectmultiple mt-2" style="height:300px!important" multiple="multiple">
                <option disabled>Choose items:</option>
                <?php 

                    $items = Item::getAll();

                    foreach ($items as $item) {
                        echo "<option value='".$item['id']."'>".$item['item_name']."</option>";
                    }
                
                ?>
            </select>

            <?php if(isset($_SESSION["updated_loot"])){ ?>
            <div class="col-6 float-start px-3"><input type="submit" value="Add loot" name="add_loot" class="form-control float-end bg-success mt-3"></div>
            <?php } ?>
            <div class="col-<?php echo isset($_SESSION["updated_loot"]) ? 6 : 12; ?> float-end px-3"><input type="submit" value="Generate loot" name="generate_loot" class="form-control float-start bg-primary mt-3"></div>

            <?php 
            
                if(isset($_POST["generate_loot"])){

                    if(isset($_POST["items"])){

                        $loot = array();
                        foreach ($_POST["items"] as $item) {
                            array_push($loot, array("vnum" => $item, "quantity" => 1, "rarity" => 1, "chance" => 100));
                        }

                        $_SESSION["loot"] = $loot;
                        echo Core::refresh();
                        

                    }
                    
                }
                if(isset($_POST["add_loot"])){

                    if(isset($_POST["items"])){

                        if(isset($_SESSION["loot"])){
                            foreach ($_POST["items"] as $item) {
                                array_push($_SESSION["loot"], array("vnum" => $item, "quantity" => 1, "rarity" => 1, "chance" => 100));
                            }
                        } elseif(isset($_SESSION["updated_loot"])){
                            foreach ($_POST["items"] as $item) {
                                array_push($_SESSION["updated_loot"], array("vnum" => $item, "quantity" => 1, "rarity" => 1, "chance" => 100));
                            }
                        }

                    }
                    
                }
            
            ?>

        </form>
    </div>
</div>
<?php if(isset($_SESSION["loot"]) || isset($_SESSION["updated_loot"])){ ?>
<div class="card bg-dark mb-5">
    <div class="card-header bg-dark">Loot Update</div>
    <div class="card-body bg-dark">
        <?php 
        
            echo '<div class="col-6 float-start ps-3 mb-3">Name</div><div class="col-2 float-start text-center mb-3">Quantity</div><div class="col-2 float-start text-center mb-3">Rarity</div><div class="col-2 float-start text-center mb-3">Drop chance</div><hr class="col-12">';
            echo '<form class="mt-3" method="post">';
                if(isset($_SESSION["loot"])){
                    $_SESSION["updated_loot"] = $_SESSION["loot"];
                }
                foreach ($_SESSION["updated_loot"] as $item) {
                    $selected_item = new Item($item["vnum"]);
                    echo '<div class="nav-item">';
                        echo '<div class="col-6 ps-3 my-2 float-start">';
                            echo $selected_item->name();
                        echo '</div>';
                        echo '<div class="col-2 px-5 my-2 float-start">';
                            echo '<input type="text" name="item_quantity[]" class="form-control text-center" value="'.$item["quantity"].'" id="">';
                        echo '</div>';
                        echo '<div class="col-2 px-5 my-2 float-start">';
                        echo '<input type="text" name="item_rarity[]" class="form-control text-center" value="'.$item["rarity"].'" id="">';
                        echo '</div>';
                        echo '<div class="col-2 px-5 my-2 float-start">';
                        echo '<input type="text" name="item_chance[]" class="form-control text-center" value="'.$item["chance"].'" id="">';
                        echo '</div>';
                        echo '<div class="clearfix"></div>';
                    echo '</div>';
                }
            echo '<div class="col-4 float-start px-3"><input type="submit" name="update_loot" class="form-control float-start bg-success mt-3" value="Update loot"></div>';
            echo '<div class="col-4 float-start px-3"><input type="submit" name="serialize_loot" class="form-control float-start bg-primary mt-3" value="Serialize loot"></div>';
            echo '<div class="col-4 float-end px-3"><input type="submit" name="discard_loot" class="form-control float-start bg-danger mt-3" value="Discard loot"></div>';
            echo '</form>';
            if(isset($_POST["update_loot"])){
                $stored_loot = $_SESSION["updated_loot"];
                unset($_SESSION["updated_loot"]);
                $_SESSION["updated_loot"] = array();
                foreach($stored_loot as $id => $loot){
                    array_push($_SESSION["updated_loot"], array("vnum" => $loot["vnum"], "quantity" => $_POST["item_quantity"][$id], "rarity" => $_POST["item_rarity"][$id], "chance" => (float)$_POST["item_chance"][$id]));
                }
                unset($_SESSION["loot"]);
                echo Core::refresh();
            }
            if(isset($_POST["serialize_loot"])){
                echo '<div class="mt-5 mb-3 col-12 float-start">Loot</div><hr class="col-12">';
                foreach($_SESSION["updated_loot"] as $item){
                    $sitem = new Item($item["vnum"]);
                    echo $item["quantity"]."x ".Item::getRarityColorText($item["rarity"], $sitem->name())." ( Tier: ".$item["rarity"]." ) with ".$item["chance"]."% chance to drop<br>";
                }
                $serialized_loot = $_SESSION["updated_loot"];
                echo '<div class="mt-5 col-12">Serialized array</div>';
                echo '<div class="col-12"><pre class="form-control"><code>';
                foreach ($serialized_loot as $reward) {
                    $sreward = new Item($reward["vnum"]);
                    echo '            array("vnum" => '.$reward["vnum"].', "quantity" => '.$reward["quantity"].', "rarity" => '.$reward["rarity"].', "chance" => '.$reward["chance"].'), // '.$sreward->name().'<br>';
                }
                echo '</code></pre></div>';
            }
            if(isset($_POST["discard_loot"])){

                unset($_SESSION["loot"]);
                unset($_SESSION["updated_loot"]);
                echo Core::refresh();

            }

        ?>
    </div>
</div>
<?php } ?>