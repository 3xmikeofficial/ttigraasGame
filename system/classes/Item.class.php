<?php 

    class Item{

        protected $_id;
        protected $_vnum;
        protected $_name;
        protected $_type;
        protected $_subtype;
        protected $_min_value;
        protected $_max_value;
        protected $_price;
        protected $_rarity;

        public function __construct($item_vnum, $rarity = 1, $id = ""){

            $tooltip = self::Tooltip($item_vnum);

            $this->_id = $id;
            $this->_vnum = $tooltip["id"];
            $this->_name = $tooltip["item_name"];
            $this->_type = $tooltip["item_type"];
            $this->_subtype = $tooltip["item_subtype"];
            $this->_min_value = $tooltip["min_value"];
            $this->_max_value = $tooltip["max_value"];
            $this->_price = $tooltip["price"];
            $this->_rarity = $rarity;

        }

        public function id(){
            return $this->_id;
        }
        public function vnum(){
            return $this->_vnum;
        }
        public function name(){
            return $this->_name;
        }
        public function type(){
            return $this->_type;
        }
        public function subtype(){
            return $this->_subtype;
        }
        public function min_value(){
            return $this->_min_value;
        }
        public function max_value(){
            return $this->_max_value;
        }
        public function price(){
            return $this->_price;
        }
        public function rarity(){
            return $this->_rarity;
        }

        public static function getItems($token){

            $query = Database::queryAll("SELECT * FROM items WHERE token='$token' ;");

            return $query;

        }

        public static function Tooltip($id){

            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id='$id' ;");

            return $query;

        }

        public static function getAvarage($min, $max){
            return ($min+$max)/2;
        }

        public static function getEquip($token){

            $query = Database::queryAll("SELECT * FROM items WHERE token = ? and equipped=1 ", [$token]);

            return $query;

        }
        public static function getInventory($token){

            $query = Database::queryAll("SELECT * FROM items WHERE token = ?", [$token]);

            return $query;

        }

        public static function getRarityColor($rarity){

            switch ($rarity) {
                default:
                    return "#9d9d9d"; // Common Grade
                    break;

                case 2:
                    return "#ffffff"; // Uncommon Grade
                    break;

                case 3:
                    return "#1eff00"; // Special Grade
                    break;

                case 4:
                    return "#0070dd"; // Rare Grade
                    break;

                case 5:
                    return "#00ccff"; // Unique Grade
                    break;

                case 6:
                    return "#a335ee"; // Legend Grade
                    break;

                case 7:
                    return "#e6cc80"; // Mythical (Gods) Grade
                    break;

                case 8:
                    return "#ff8000"; // Genesis Class
                    break;
            }

        }

    }

?>