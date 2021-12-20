<?php 

    class User{

        protected $_username;
        protected $_password;
        protected $_token;
        protected $_rank;
        protected $_blocked;

        public function __construct($value){

            if(gettype($value) == "string"){
            
                $query = Database::queryAlone("SELECT * FROM users WHERE username or token = ?  ", [$value]);
                
            } else {

                $query = Database::queryAlone("SELECT * FROM users WHERE id = ?  ", [$value]);

            }

            $this->_username = $query["username"];
            $this->_password = $query["password"];
            $this->_token = $query["token"];
            $this->_rank = $query["rank"];
            $this->_blocked = $query["blocked"];
            
        }

        public function token(){

            return $this->_token;

        }
        public function rank(){

            return $this->_rank;

        }

        public function isAdmin(){
            if($this->_rank == 777){
                return true;
            }
        }

        public static function isLoggedIn(){

            if(isset($_SESSION["user_token"])){

                return true;

            } else {

                return false;

            }

        }

        public static function getDataAlone($data, $var, $val){

            $query = Database::queryAlone("SELECT $data FROM users WHERE $var='$val' ;");

            return $query[$data];

        }

        public static function createUser($username, $password){

            $password = Core::hash($password);

            $token = self::createToken();

            Database::queryAlone("INSERT INTO users SET username='$username', password='$password', token='$token' ;");

            echo Core::alert("Account successfully created!", "success");

        }

        public static function userExist($username){

            $query = Database::query("SELECT * FROM users WHERE username='$username' ;");

            return $query;

        }

        public static function generateToken($length = 80){
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $token = '';
            for ($i = 0; $i < $length; $i++) {
                $token .= $characters[rand(0, $charactersLength - 1)];
            }

            return $token;

        }

        public static function createToken(){

            do {

                $token = self::generateToken();

            } while(self::existToken($token));

            return $token;

        }

        public static function existToken($token){

            return Database::query("SELECT * FROM users WHERE token='$token' ;");

        }

    }

?>