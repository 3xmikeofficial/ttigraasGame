<form action="<?php $PHP_SELF; ?>" method="post" class="bg-dark p-5">
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