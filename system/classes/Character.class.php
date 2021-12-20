<?php 

    abstract class Character{

        protected $_name;
        protected $_level = 1;
        protected $_exp = 0;
        protected $_race;
        protected $_class;
        protected $_stamina = 100;
        protected $_max_stamina = 100;
        protected $_health = 100;
        protected $_speed;
        protected $_strenght;
        protected $_defense;
        protected $_magicules;
        protected $_gold;
        protected $_equip;
        protected $_inventory;
        public $attacked = false;

        public function name(){
            return $this->_name;
        }
        public function level(){
            return $this->_level;
        }
        public function exp(){
            return $this->_exp;
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
        public function setHealth($hp){
            $health = $this->_health+$hp;
            if($health < 0){
                $health = 0;
            }
            $this->_health = $health;
            return $this->_health;
        }
        public function stamina(){
            return $this->_stamina;
        }
        public function max_stamina(){
            return $this->_max_stamina;
        }
        public function speed(){
            return $this->_speed;
        }
        public function strenght(){
            return $this->_strenght;
        }
        public function defense(){
            return $this->_defense;
        }

        public function statsValue(){

            $value = $this->_speed+$this->_strenght+$this->_defense;

            return $value;

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
        public function inventory(){
            return $this->_inventory;
        }

        public static function getAll(){

            $query = Database::queryAll("SELECT * FROM characters");

            return $query;

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

        public function expNeeded(){

            $exp_table = array(
                0,1,2,3,4,5,6,7,8,9,
                10,11,12,13,14,15,16,17,18,19,
                20,21,22,23,24,25,26,27,28,29,
                30,31,32,33,34,35,36,37,38,39,
                40,41,42,43,44,45,46,47,48,49,
                50,51,52,53,54,55,56,57,58,59,
                60,61,62,63,64,65,66,67,68,69,
                70,71,72,73,74,75,76,77,78,79,
                80,81,82,83,84,85,86,87,88,89,
                90,91,92,93,94,95,96,97,98,99,
                100,101,102,103,104,105,106,107,108,109,
                110,111,112,113,114,115,116,117,118,119,
                120,121,122,123,124,125,126,127,128,129,
                130,131,132,133,134,135,136,137,138,139,
                140,141,142,143,144,145,146,147,148,149,
                150,151,152,153,154,155,156,157,158,159,
                160,161,162,163,164,165,166,167,168,169,
                170,171,172,173,174,175,176,177,178,179,
                180,181,182,183,184,185,186,187,188,189,
                190,191,192,193,194,195,196,197,198,199,
                200,201,202,203,204,205,206,207,208,209,
                210,211,212,213,214,215,216,217,218,219,
                220,221,222,223,224,225,226,227,228,229,
                230,231,232,233,234,235,236,237,238,239,
                240,241,242,243,244,245,246,247,248,249,
                250,251,252,253,254,255
            );


            if($this->level()+1 > count($exp_table)-1){
                return $exp_table[count($exp_table)-1];
            } else {
                return @$exp_table[$this->level()+1];
            }

        }

    }

?>