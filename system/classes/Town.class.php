<?php

    class Town{

        protected $_id;
        protected $_name;
        protected $_main;
        protected $_storage;
        protected $_farm;
        protected $_church;
        protected $_barracks;
        protected $_watchtower;
        protected $_market;
        protected $_stable;
        protected $_garage;
        protected $_smith;
        protected $_woodcutter;
        protected $_quarry;
        protected $_mine;
        protected $_food;
        protected $_wood;
        protected $_stone;
        protected $_iron;

        public function __construct($token){

            $query = Database::queryAlone("SELECT * FROM towns WHERE token = ?", [$token]);

            $this->_id = $query["id"];
            $this->_name = $query["name"];
            $this->_main = $query["main"];
            $this->_storage = $query["storage"];
            $this->_farm = $query["farm"];
            $this->_church = $query["church"];
            $this->_barracks = $query["barracks"];
            $this->_watchtower = $query["watchtower"];
            $this->_market = $query["market"];
            $this->_stable = $query["stable"];
            $this->_garage = $query["garage"];
            $this->_smith = $query["smith"];
            $this->_woodcutter = $query["woodcutter"];
            $this->_quarry = $query["quarry"];
            $this->_mine = $query["mine"];
            $this->_food = $query["food"];
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
        public function main(){
            return $this->_main;
        }
        public function storage(){
            return $this->_storage;
        }
        public function farm(){
            return $this->_farm;
        }
        public function church(){
            return $this->_church;
        }
        public function barracks(){
            return $this->_barracks;
        }
        public function watchtower(){
            return $this->_watchtower;
        }
        public function market(){
            return $this->_market;
        }
        public function stable(){
            return $this->_stable;
        }
        public function garage(){
            return $this->_garage;
        }
        public function smith(){
            return $this->_smith;
        }
        public function woodcutter(){
            return $this->_woodcutter;
        }
        public function quarry(){
            return $this->_quarry;
        }
        public function mine(){
            return $this->_mine;
        }
        public function food(){
            return $this->_food;
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

        public static function getStage($level){

            if($level >= 1 && $level <= 10){

                return 1;

            } elseif($level > 10 && $level <= 20){

                return 2;

            }  elseif($level > 20) {

                return 3;

            } else {

                return 0;

            }

        }

        public static function upgradeBuilding($building, $token){

            $building_level = Database::queryAlone("SELECT * FROM towns WHERE token = ?", [$token]);

            $level = $building_level[$building]+1;

            if($level > MAX_BUILDING_LEVEL)
                $level = MAX_BUILDING_LEVEL;

            Database::queryAlone("UPDATE towns SET $building = ? WHERE token = ?", [$level, $token]);

        }

        public static function getRecipe($building, $level){

            $query = Database::queryAlone("SELECT `resources` FROM town_upgrades WHERE name = ? and tier = ?", [$building, $level]);
            return $query["resources"];

        }

    }

?>