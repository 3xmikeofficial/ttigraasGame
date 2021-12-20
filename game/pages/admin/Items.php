<div class="card bg-dark">

    <div class="card-header">Item section</div>
    <div class="card-body">

        <form action="<?php $PHP_SELF; ?>" method="post">
        
            <select name="character" class="form-control">
                <option selected disabled>---> Choose a character <---</option>
                <?php 

                    $characters = Character::getAll();

                    foreach ($characters as $character) {
                        echo "<option value='".$character['id']."'>".$character['name']."</option>";
                    }
                
                ?>
            </select>

            <select name="item" class="form-control mt-3">
                <option selected disabled>---> Choose item <---</option>
                <?php 

                    $items = Item::getAll();

                    foreach ($items as $item) {
                        echo "<option value='".$item['id']."'>".$item['item_name']."</option>";
                    }
                
                ?>
            </select>

            <input type="number" name="quantity" class="form-control mt-3" value="1" />
            <input type="number" name="rarity" class="form-control mt-3" value="1" max=8 />

            <input type="submit" value="Add Item" name="add_item" class="form-control bg-success mt-3">

            <?php 
            
                if(isset($_POST["add_item"])){

                    $item = new Item($_POST["item"]);

                    $char = new Player($_POST["character"]);

                    $char->addItem($item->vnum(), $item->type(), $item->subtype(), $char->token(), $_POST["quantity"], $_POST["rarity"]);
                    echo Core::alert($_POST["quantity"]."x ".$item->name()." was successfully added!", "success");
                    
                }
            
            ?>
    
        </form>

    </div>

</div>