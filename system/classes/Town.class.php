<?php

    class Town{

        protected $_id;
        protected $_name;
        protected $_wood;
        protected $_stone;
        protected $_iron;

        public function __construct($token){

            $query = Database::queryAlone("SELECT * FROM towns WHERE token = ?", [$token]);

            $this->_id = $query["id"];
            $this->_name = $query["name"];
            $this->_wood = $query["wood"];
            $this->_stone = $query["stone"];
            $this->_iron = $query["iron"];
            
        }

        public function id(){
            return $this->_id;
        }
        public function name(){
            return $this->_name;
        }
        public function wood(){
            return $this->_wood;
        }
        public function stone(){
            return $this->_stone;
        }
        public function iron(){
            return $this->_iron;
        }

        public static function create($name, $token){

            Database::queryAlone("INSERT INTO towns set name = ?, token = ?", [$name, $token]);

        }

        public static function doExist($token){

            $query = Database::query("SELECT * FROM towns WHERE token = ? ", [$token]);

            return $query;

        }

        public static function nameTaken($name){

            $query = Database::query("SELECT * FROM towns WHERE name = ?", [$name]);

            return $query;

        }

    }

?>