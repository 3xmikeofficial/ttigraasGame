<?php 

    class Monster extends Character{

        public function __construct($name = "", $stats = array(), $exp = 0, $gold = 0, $magicules = 0, $inventory = "", $cost = 5){
            $this->_name = $name;
            $this->_health = $stats[0];
            $this->_speed = $stats[1];
            $this->_strenght = $stats[2];
            $this->_defense = $stats[3];
            $this->_exp = $exp;
            $this->_gold = $gold;
            $this->_magicules = $magicules;
            $this->_inventory = $inventory;
            $this->_cost = $cost;
        }

    }

?>