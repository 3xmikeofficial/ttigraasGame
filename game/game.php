<?php 

    require_once("../system/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/main.css">
    <title>That time i got reincarnated as a slime - Browser game</title>
</head>
<body>

    <?php 
    
        if(User::isLoggedIn()){
            if(!Player::doExist($_SESSION["user_token"])){

                ?>

                    <div class="forms">
                        <form action="<?php $PHP_SELF; ?>" method="post">
                            <h1 class="mb-5">Character selection</h1>
                            <select name="race" id="race" class="form-control">
                                <option selected disabled>Choose race</option>
                                <option value="Slime">Slime</option>
                                <option value="Human">Human</option>
                                <option value="Demon">Demon</option>
                                <option value="Angel">Angel</option>
                                <option value="Goblin">Goblin</option>
                                <option value="Lizardman">Lizardman</option>
                                <option value="Orc">Orc</option>
                            </select>
                            <input type="submit" value="Reincarnate" name="reincarnate" class="bg-success mt-3 form-control">

                            <?php 
                            
                                if(isset($_POST["reincarnate"])){

                                    if(Core::check($_POST["race"])){

                                        $name = User::getDataAlone("username", "token", $_SESSION["user_token"]);
                                        $race = $_POST["race"];
                        
                                        Player::createChar($name, $race, $_SESSION["user_token"]);

                                        echo Core::alert("You are reincarnating...", "success");

                                        $player = new Player($_SESSION["user_token"]);

                                        echo Core::refresh(3);
                                        
                                    } else {

                                        echo Core::alert("You have to select race to reincarnate yourself!", "danger");

                                    }

                                }
                            
                            ?>

                        </form>
                    </div>

                <?php

            } else {

                $player = new Player($_SESSION["user_token"]);

                include_once("./navbar.php");

                ?> <div id="content"> <?php

                if(isset($_GET["page"])){

                    $page = PAGES.DIRECTORY_SEPARATOR.$_GET["page"].".php";

                    if(file_exists($page) && filesize($page) > 0){

                        include_once($page);

                    } else {

                        ?>

                            
                                <div class="card bg-dark mb-5">
                                    <div class="card-header bg-dark">Not found!</div>
                                    <div class="card-body bg-dark">
                                        Page does not exist!
                                    </div>
                                </div>

                        <?php

                    }

                } else {
                }

                ?> </div> <?php

            }

        } else {

            echo Core::redirect(URL);

        }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>