<?php 

    require_once("./system/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/main.css">
    <title>That time i got reincarnated as a slime - Browser game</title>
</head>
<body>

    <div class="forms">

        <?php 

            if(!User::isLoggedIn()){
        
                if(isset($_GET["page"]) && $_GET["page"] == "register"){ // Register

                    ?>

                        <form action="<?php $PHP_SELF; ?>" method="post">
                            <h1 class="mb-5">Register</h1>
                            <label for="username">
                                Username
                            </label>
                            <input type="text" name="username" id="username" class="form-control" <?php if(isset($_POST["username"])){ echo 'value="'.$_POST["username"].'"'; } ?>>
                            <label for="password" class="mt-3">
                                Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control">
                            <label for="repassword" class="mt-3">
                                Confirm password
                            </label>
                            <input type="password" name="repassword" id="repassword" class="form-control">
                            <input type="submit" value="Register" name="register" class="form-control bg-success mt-3">
                            <div class="mt-3 text-center">Already have account? <a href="?page=login">Login</a></div>

                            <?php


                            
                                if(isset($_POST["register"])){

                                    if(Core::check($_POST["username"]) && Core::check($_POST["password"]) && Core::check($_POST["repassword"])){

                                        if($_POST["password"] == $_POST["repassword"]){

                                            if(!User::userExist($_POST["username"])){

                                                $username = Core::secureInput($_POST["username"]);
                                                $password = $_POST["password"];

                                                User::createUser($username, $password);
                                                
                                            } else {

                                                echo Core::alert("Username is already taken!", "danger");
                                                
                                            }

                                        } else {

                                            echo Core::alert("Passwords does not match!", "danger");

                                        }

                                    } else {

                                        echo Core::alert("You have to fill all required data!", "danger");

                                    }
                
                                }

                            ?>

                        </form>

                    <?php

                } else { // Login

                    ?>

                        <form action="<?php $PHP_SELF; ?>" method="post">
                            <h1 class="mb-5">Login</h1>
                            <label for="username">
                                Username
                            </label>
                            <input type="text" name="username" id="username" class="form-control" <?php if(isset($_POST["username"])){ echo 'value="'.$_POST["username"].'"'; } ?>>
                            <label for="password" class="mt-3">
                                Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control">
                            <input type="submit" value="Login" name="login" class="form-control bg-success mt-3">

                                <?php 
                                
                                    if(isset($_POST["login"])){

                                        if(Core::check($_POST["username"]) && Core::check($_POST["password"])){

                                            if(User::UserExist($_POST["username"])){

                                                $username = $_POST["username"];

                                                $password = $_POST["password"];
                                                $query = Database::queryAlone("SELECT * FROM users WHERE username = ?", [$username]);
                                                

                                                if(password_verify($password,$query["password"])){

                                                    echo Core::alert("Login successfull!", "success");

                                                    $_SESSION["user_token"] = $query["token"];
                                                    echo Core::redirect(GAME_URL);

                                                } else {

                                                    echo Core::alert("Wrong username or password!", "danger");

                                                }


                                            } else {

                                                echo Core::alert("Wrong username or password!", "danger");

                                            }

                                        } else {

                                            echo Core::alert("You have to fill all required fields!", "danger");

                                        }

                                    }
                                
                                ?>

                            <div class="mt-3 text-center">Dont have account? <a href="?page=register">Register</a></div>
                        </form>

                    <?php

                }

            } else {

                echo Core::redirect(GAME_URL);

            }
        
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>