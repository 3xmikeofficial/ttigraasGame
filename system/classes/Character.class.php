<?php 

    abstract class Character{

        protected $_name;
        protected $_race;
        protected $_class;
        protected $_health;
        protected $_int;
        protected $_strenght;
        protected $_defense;
        protected $_magicules;
        protected $_gold;
        protected $_equip;

        public function name(){
            return $this->_name;
        }
        public function race(){
            return $this->_race;
        }
        public function class(){
            return $this->_class;
        }
        public function health(){
            return $this->_health;
        }
        public function int(){
            return $this->_int;
        }
        public function strenght(){
            return $this->_strenght;
        }
        public function defense(){
            return $this->_defense;
        }
        public function magicules(){
            return $this->_magicules;
        }
        public function gold(){
            return $this->_gold;
        }
        public function equip(){
            return $this->_equip;
        }

        public static function getClass($race, $class){

            switch ($race) {
                case 'Slime':
                    switch ($class) {
                        default:
                            return "Slime";
                            break;
                        case 1:
                            return "Demon slime";
                            break;
                        case 2:
                            return "Ultimate Slime";
                            break;
                    }
                    break;
                case 'Human':
                    switch ($class) {
                        default:
                            return "Human";
                            break;
                        case 1:
                            return "Sage";
                            break;
                        case 2:
                            return "Saint";
                            break;
                        case 3:
                            return "Hero";
                            break;
                        case 4:
                            return "Demi-God";
                            break;
                        
                    }
                    break;
                case 'Demon':
                    # code...
                    switch ($class) {
                        default:
                            return "Lesser Demon";
                            break;
                        case 1:
                            return "Greater Demon";
                            break;
                        case 2:
                            return "Arch Demon";
                            break;
                        case 3:
                            return "Demon Lord";
                            break;
                    }
                    break;
                case 'Angel':
                    # code...
                    switch ($class) {
                        default:
                            return "Angel";
                            break;
                        case 1:
                            return "Seraphim";
                            break;
                        case 2:
                            return "Fallen Angel";
                            break;
                        case 3:
                            return "Celestial Demon";
                            break;
                    }
                    break;
                case 'Goblin':
                    # code...
                    switch ($class) {
                        default:
                            return "Goblin";
                            break;
                        case 1:
                            return "Hobgoblin";
                            break;
                        case 2:
                            return "Ogre";
                            break;
                        case 3:
                            return "Kijin";
                            break;
                        case 4:
                            return "Fair Oni";
                            break;
                        case 5:
                            return "Wicked Oni";
                            break;
                        
                    }
                    break;
                case 'Lizardman':
                    switch ($class) {
                        default:
                            return "Lizardman";
                            break;
                        
                        case 1:
                            return "Dragonewt";
                            break;
                    }
                    break;
                case 'Orc':
                    switch ($class) {
                        default:
                            return "Orc";   
                            break;
                        case 1:
                            return "Orc Knight";    
                            break;
                        case 2:
                            return "Orc Elite"; 
                            break;
                        case 3:
                            return "High Orc";  
                            break;
                        case 4:
                            return "Orc General";   
                            break;
                        case 5:
                            return "Orc Lord";  
                            break;
                    }
                    break;
            }

        }

    }

?>