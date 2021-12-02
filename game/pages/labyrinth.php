<div class="card bg-dark">
    <div class="card-header">Labyrinth</div>
    <div class="card-body">
        <?php 
        
            if($player->level() < 100){

                ?>

                    You need level 100 to enter labyrinth.

                <?php

            } else {

                ?>

                    The Labyrinth.

                <?php

            }
        
        ?>
    </div>
</div>