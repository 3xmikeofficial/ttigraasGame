<?php 

    class User{

        protected $_id;
        protected $_username;
        protected $_password;
        protected $_rank;
        protected $_blocked;

        public function __construct($value){

            if(gettype($value) == "string"){
            
                $query = Database::queryAlone("SELECT * FROM accounts WHERE username or token = ?  ", [$value]);
                
            } else {

                $query = Database::queryAlone("SELECT * FROM accounts WHERE id = ?  ", [$value]);

            }

            $this->_id = $query["id"];
            $this->_username = $query["username"];
            $this->_password = $query["password"];
            $this->_rank = $query["rank"];
            $this->_blocked = $query["blocked"];
            
        }

        public function id(){

            return $this->_id;

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

            if(isset($_SESSION["user_id"])){

                return true;

            } else {

                return false;

            }

        }

        public static function getDataAlone($var, $value){

            if(gettype($value) == "string"){
                $query = Database::queryAlone("SELECT * FROM accounts WHERE id = ?", [$value]);
            } else {
                $query = Database::queryAlone("SELECT * FROM accounts WHERE id = ?", [$value]);
            }

            return $query[$var];

        }

        public static function createUser($username, $password){

            $password = Core::hash($password);

            Database::queryAlone("INSERT INTO accounts SET username = ?, password = ?", [$username, $password]);

            echo Core::alert("Account successfully created!", "success");

        }

        public static function userExist($username){

            $query = Database::query("SELECT * FROM accounts WHERE username = ?", [$username]);

            return $query;

        }

    }

?>