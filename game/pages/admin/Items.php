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

            <select name="item" class="form-control selectmultiple mt-3" size="1" multiple="multiple">
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

                        $item = new Item($_POST["item"]);

                        $quantity = $_POST["quantity"];

                        if($item->type() == "ITEM_WEAPON" || $item->type() == "ITEM_ARMOR"){
                            $quantity = 1;
                        }

                        $char = new Player((int) $_POST["character"]);

                        $char->addItem($item->vnum(), $quantity, $_POST["rarity"]);
                        echo Core::alert(Item::checkStackLimit($quantity)."x ".$item->name()." ( Tier: ".Item::checkMaxRarity($_POST["rarity"])." ) was successfully added!", "success");

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
            <select name="items[]" class="form-control selectmultiple mt-3" multiple="multiple">
                <option disabled>Choose items:</option>
                <?php 

                    $items = Item::getAll();

                    foreach ($items as $item) {
                        echo "<option value='".$item['id']."'>".$item['item_name']."</option>";
                    }
                
                ?>
            </select>

            <input type="submit" value="Generate loot" name="generate_loot" class="form-control bg-success mt-3">

            <?php 
            
                if(isset($_POST["generate_loot"])){
                    
                    

                    if(isset($_POST["items"])){

                        $loot = array();
                        foreach ($_POST["items"] as $item) {
                            array_push($loot, array("vnum" => $item, "quantity" => 1, "rarity" => 1));
                        }
                        

                    }
                echo "<textarea readonly='readonly' class='form-control mt-3'>".serialize($loot)."</textarea>";
                echo "<textarea readonly='readonly' class='form-control mt-3'>".var_dump($loot)."</textarea>";
                    
                }
            
            ?>

        </form>
    </div>
</div>