<form action="<?php $PHP_SELF; ?>" method="post" class="bg-dark p-5">
    <h1 class="mb-5">Login</h1>
    <label for="username">
        Username
    </label>
    <input type="text" name="username" id="username" value="testaccount" class="form-control" <?php if(isset($_POST["username"])){ echo 'value="'.$_POST["username"].'"'; } ?>>
    <label for="password" class="mt-3">
        Password
    </label>
    <input type="password" name="password" id="password" value="test" class="form-control">
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