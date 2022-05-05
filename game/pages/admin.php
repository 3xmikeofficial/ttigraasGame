<?php 

    if($user->isAdmin()){

        if(isset($_GET["section"])){

            include_once(ADMIN."/".$_GET["section"].".php");

        } else {

            ?>

            <div class="card bg-dark text-white">

            <div class="card-header">Admin section</div>

            <div class="card-body">
                <?php echo '<a href="'.ACTUAL_URL.'&section=Items">Item section</a>'; ?>
            </div>

            </div>

            <?php

        }

    } else {

        echo Core::redirect(URL);

    }

?>