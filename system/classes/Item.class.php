<?php 

    class Item{

        protected $_id;
        protected $_owner;
        protected $_vnum;
        protected $_name;
        protected $_type;
        protected $_subtype;
        protected $_quantity;
        protected $_rarity;
        protected $_equipped;
        protected $_socket0;
        protected $_socket1;
        protected $_socket2;
        protected $_stackable;
        protected $_value0;
        protected $_value1;
        protected $_price;

        public function __construct($id){
            $query = Database::queryAlone("SELECT * FROM items WHERE id = ?", [$id]);
            $this->_id = $id;
            $this->_owner = $query["player_id"];
            $this->_vnum = $query["item_vnum"];
            $pitem = new PItem($this->_vnum);
            $this->_name = $pitem->name();
            $this->_type = $query["item_type"];
            $this->_subtype = $query["item_subtype"];
            $this->_quantity = $query["quantity"];
            $this->_rarity = $query["rarity"];
            $this->_equipped = $query["equipped"];
            $this->_socket0 = $query["socket0"];
            $this->_socket1 = $query["socket1"];
            $this->_socket2 = $query["socket2"];
            $this->_stackable = $pitem->stackable();
            $this->_value0 = $pitem->min_value();
            $this->_value1 = $pitem->max_value();
            $this->_price = $pitem->price();

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
        public function isWeapon(){
            return $this->_type == "ITEM_WEAPON" ? true : false;
        }
        public function isArmor(){
            return $this->_type == "ITEM_ARMOR" ? true : false;
        }
        public function min_value(){
            return $this->value0;
        }
        public function max_value(){
            return $this->value1;
        }

    }

?>