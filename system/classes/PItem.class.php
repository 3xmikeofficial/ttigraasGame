<?php 

    class PItem{

        protected $_vnum;
        protected $_name;
        protected $_type;
        protected $_subtype;
        protected $_stackable;
        protected $_min_value;
        protected $_max_value;
        protected $_price;

        public function __construct($vnum){

            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id = ?", [$vnum]);

            $this->_vnum = $query["id"];
            $this->_name = $query["item_name"];
            $this->_type = $query["item_type"];
            $this->_subtype = $query["item_subtype"];
            $this->_stackable = $query["stackable"];
            $this->_min_value = $query["min_value"];
            $this->_max_value = $query["max_value"];
            $this->_price = $query["price"];


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
        public function stackable(){

            return $this->_stackable;

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

    }

?>