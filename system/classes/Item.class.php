<?php 

    class Item{

        protected $_id;
        protected $_vnum;
        protected $_name;
        protected $_type;
        protected $_subtype;
        protected $_size;
        protected $_min_value;
        protected $_max_value;
        protected $_price;
        protected $_rarity;
        protected $_icon;
        protected $_equipped = false;
        protected $_quantity = 1;

        public function __construct($item_vnum, $rarity = 1, $id = ""){

            $tooltip = self::getProto($item_vnum);
            if(isset($id) and $id != ""){
                $this->_id = $id;
                $item = Database::queryAlone("SELECT * FROM items WHERE id = ?", [$id]);
                $this->_quantity = $item["quantity"];
                $this->_equipped = $item["equipped"];
            }
            $this->_vnum = $tooltip["id"];
            $this->_name = $tooltip["item_name"];
            $this->_type = $tooltip["item_type"];
            $this->_subtype = $tooltip["item_subtype"];
            $this->_size = $tooltip["size"];
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
        public function size(){
            return $this->_size;
        }
        public function sizeText(){
            if($this->_size == 1){
                return "small";
            } elseif($this->_size == 2){
                return "medium";
            } elseif($this->_size == 3){
                return "large";
            }
        }
        public function min_value(){
            return $this->_min_value;
        }
        public function max_value(){
            return $this->_max_value;
        }
        public function min_rarityValue(){
            return $this->_min_value*$this->_rarity;
        }
        public function max_rarityValue(){
            return $this->_max_value*$this->_rarity;
        }
        public function showRarityValues(){
            return $this->min_rarityValue()." - ".$this->max_rarityValue();
        }
        public function showAvarageRarityValue(){
            return self::getAvarageValue($this->min_rarityValue(),$this->max_rarityValue());
        }
        public function price(){
            return $this->_price;
        }
        public function rarityPrice(){
            return $this->_price*$this->_rarity;
        }
        public function rarity(){
            return $this->_rarity;
        }
        public function quantity(){
            return $this->_quantity;
        }
        public function equipped(){
            return $this->_equipped;
        }

        public function remove(){
            Database::queryAlone("DELETE FROM items WHERE id = ?", [$this->_id]);
        }

        public function removeOne(){
            $this->_quantity -= 1;
            Database::queryAlone("UPDATE items SET quantity = ? WHERE id = ?", [$this->_quantity, $this->_id]);
        }

        public function icon(){
            $icon = IMAGESDIR."/items/".$this->_vnum.".png";
            if(file_exists($icon)){

                $query = Core::addImage($icon);

            } else {

                $query = "<span class='text-danger'>X</span>";

            }
            return $query;
        }

        public static function notEquiped(){

            return "<span class='text-danger'>!</span>";

        }

        public static function getItems($token){

            $query = Database::queryAll("SELECT * FROM items WHERE token='$token' ;");

            return $query;

        }

        public function showTooltip(){

            $query = "<span style='color: ".self::getRarityColor($this->_rarity)."'>".$this->_name."</span>";
            $query .= "<hr>";

            if($this->_type == "ITEM_WEAPON"){
                $query .= "Damage: ".$this->_min_value*$this->_rarity." - ".$this->_max_value*$this->_rarity;
            } elseif($this->_type == "ITEM_ARMOR"){
                $query .= "Armor: ".(self::getAvarageValue($this->_min_value, $this->_max_value)*$this->_rarity);
            } elseif($this->_type == "ITEM_POTION"){
                if($this->_subtype == "ITEM_STAMINA"){
                    $query .= "Stamina: +".(self::getAvarageValue($this->_min_value, $this->_max_value)*$this->_rarity);
                }
            } else {

            }

            $query .= "<hr>";

            $query .= ($this->_price*$this->_rarity)."g";

            return $query;

        }

        public static function getItem($id){

            $query = Database::queryAlone("SELECT * FROM items WHERE id='$id' ;");

            return $query;

        }

        public static function getProto($id){

            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id='$id' ;");

            return $query;

        }

        public static function getAvarageValue($min, $max){
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

        public static function getRarityColorText($rarity, $text){
            switch ($rarity) {
                default:
                    $rarity = "#9d9d9d"; // Common Grade
                    break;

                case 2:
                    $rarity = "#ffffff"; // Uncommon Grade
                    break;

                case 3:
                    $rarity = "#1eff00"; // Special Grade
                    break;

                case 4:
                    $rarity = "#0070dd"; // Rare Grade
                    break;

                case 5:
                    $rarity = "#00ccff"; // Unique Grade
                    break;

                case 6:
                    $rarity = "#a335ee"; // Legend Grade
                    break;

                case 7:
                    $rarity = "#e6cc80"; // Mythical (Gods) Grade
                    break;

                case 8:
                    $rarity = "#ff8000"; // Genesis Class
                    break;
            }
            return "<span style='color: ${rarity}'>${text}</span>";
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