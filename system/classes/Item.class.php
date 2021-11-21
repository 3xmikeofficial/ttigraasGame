<?php 

    class Item{

        protected $_id;
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

        public static function getRarityColor($rarity){

            switch ($rarity) {
                default:
                    return "gray";
                    break;

                case 2:
                    return "white";
                    break;

                case 3:
                    return "green";
                    break;

                case 4:
                    return "#0070dd";
                    break;

                case 5:
                    return "purple";
                    break;

                case 6:
                    return "#e6cc80";
                    break;

                case 7:
                    return "#ff8000";
                    break;
            }

        }

    }

?>