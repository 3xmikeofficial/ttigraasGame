<?php

    class Town{

        protected $_name;

        public function __construct($token){

            $query = Database::queryAlone("SELECT * FROM towns WHERE token = ?", [$token]);

            $this->_name = $query["name"];
            
        }

        public function name(){
            return $this->_name;
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