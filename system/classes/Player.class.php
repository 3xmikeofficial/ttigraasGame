<?php 

    class Player extends Character {

        public function __construct($token){

            $query = Database::queryAlone("SELECT * FROM characters WHERE token='$token' ;");

            $this->_name = $query["name"];
            $this->_race = $query["race"];
            $this->_class = Character::getClass($this->_race, $query["class"]);
            $this->_health = $query["health"];
            $this->_int = $query["int"];
            $this->_strenght = $query["strenght"];
            $this->_defense = $query["defense"];
            $this->_magicules = $query["magicules"];
            $this->_gold = $query["gold"];
            $this->_equip = Item::getEquip($token);

        }

        public static function doExist($token){

            $query = Database::query("SELECT * FROM characters WHERE token='$token' ;");

            return $query;

        }

        public static function createChar($name, $race, $token){

            Database::queryAlone("INSERT INTO characters SET name='$name', race='$race', token='$token' ;");

        }

    }

?>