<?php 

    if($user->isAdmin()){

        if(isset($_GET["section"])){

            include_once(ADMIN."/".$_GET["section"].".php");

        } else {

            echo '<a href="'.ACTUAL_URL.'&section=Items">Item section</a>';

        }

    } else {

        echo Core::redirect(URL);

    }

?>