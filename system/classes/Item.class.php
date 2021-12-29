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
        protected $_chance;

        public function __construct($item_vnum, $quantity = "", $rarity = 1, $chance = "", $id = ""){

            $tooltip = self::getProto($item_vnum);
            if(isset($quantity)){
                $this->_quantity = $quantity;
            }
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
            $this->_salvage = $tooltip["salvage"];
            $this->_rarity = $rarity;
            $this->_chance = $chance;

        }

        public function id(){
            return $this->_id;
        }
        public function vnum(){
            return @$this->_vnum;
        }
        public function name(){
            return $this->_name;
        }
        public function type(){
            return $this->_type;
        }
        public static function getType($id){
            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id = ?", [$id]);
            return $query["item_type"];
        }
        public static function getSubtype($id){
            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id = ?", [$id]);
            return $query["item_subtype"];
        }
        public static function isWeapon($id){
            return self::getType($id) == "ITEM_WEAPON" ? true : false;
        }
        public static function isArmor($id){
            return self::getType($id) == "ITEM_ARMOR" ? true : false;
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
        public function setRarity($rarity){
            $this->_rarity = $rarity;
        }
        public function upgradeRarity(){
            $this->_rarity += 1;
            Database::QueryAlone("UPDATE items SET rarity = ? WHERE id = ?", [$this->_rarity, $this->_id]);
        }
        public function quantity(){
            return $this->_quantity;
        }
        public function setQuantity($quantity){
            $this->_quantity = $quantity;
        }
        public function chance(){
            return $this->_chance;
        }
        public function salvage(){
            return $this->_salvage;
        }
        public function equipped(){
            return $this->_equipped;
        }

        public static function removeItems($vnum, $token, $quantity, $rarity){

            $remaining = $quantity;

            while($remaining > 0){

                $find_item = Database::queryAlone("SELECT * FROM items WHERE item_vnum = ? and token = ? and rarity = ?", [$vnum, $token, $rarity]);
                if($remaining >= $find_item["quantity"]){
                        Database::queryAlone("DELETE FROM items WHERE id = ?", [$find_item["id"]]);
                        $remaining -= $find_item["quantity"];
                } else {
                    $update_quantity = $find_item["quantity"]-$remaining;
                    Database::queryAlone("UPDATE items SET quantity = ? WHERE id = ?", [$update_quantity, $find_item["id"]]);
                    $remaining = 0;
                }

            }

        }

        public function remove(){
            $query = Database::queryAlone("SELECT * FROM items WHERE id = ?", [$this->_id]);
            if(isset($query["quantity"]) && $query["quantity"] == 1){
                Database::queryAlone("DELETE FROM items WHERE id = ?", [$this->_id]);
            } else {
                $this->_quantity -= 1;
                Database::queryAlone("UPDATE items SET quantity = ? WHERE id = ?", [$this->_quantity, $this->_id]);
            }
        }

        public function removeOne(){
            $query = Database::queryAlone("SELECT * FROM items WHERE id = ?", [$this->_id]);
            if($query["quantity"] == 1){
                Database::queryAlone("DELETE FROM items WHERE id = ?", [$this->_id]);
            } else {
                $this->_quantity -= 1;
                Database::queryAlone("UPDATE items SET quantity = ? WHERE id = ?", [$this->_quantity, $this->_id]);
            }
        }

        public static function ownQuantity($vnum, $token, $rarity){

            $query = Database::queryAll("SELECT * FROM items WHERE item_vnum = ? and token = ? and rarity = ?", [$vnum, $token,$rarity]);

            $quantity = 0;
            foreach ($query as $item) {
                $quantity += $item["quantity"];
            }

            if($quantity > STACK_LIMIT){
                $quantity = STACK_LIMIT;
            }

            return $quantity;

        }

        public static function getAll(){

            $query = Database::queryAll("SELECT * FROM item_proto");

            return $query;

        }

        public static function checkMaxRarity($value){
            if($value > MAX_RARITY){
                $value = MAX_RARITY;
            }
            return $value;
        }

        public static function checkStackLimit($value){
            if($value > STACK_LIMIT){
                $value = STACK_LIMIT;
            }
            return $value;
        }

        public static function stackExist($vnum, $token, $rarity){
            $query = Database::query("SELECT * FROM items WHERE item_vnum = ? and quantity < ? and token = ? and rarity = ?", [$vnum, STACK_LIMIT, $token, $rarity]);
            return $query > 0 ? true : false;
        }

        public static function updateStack($id, $quantity){

            Database::queryAlone("UPDATE items SET quantity = ? WHERE id = ?", [$quantity, $id]);

        }

        public static function addItem($vnum, $token, $quantity, $rarity){
            $remaining = $quantity;

            while($remaining > 0){

                if(self::stackExist($vnum, $token, $rarity)){

                    $stack_row = Database::queryAlone("SELECT * FROM items WHERE item_vnum = ? and token = ? and quantity < ? and rarity = ? LIMIT 1", [$vnum, $token, STACK_LIMIT, $rarity]);
                    $update_quantity = $stack_row["quantity"]+$remaining;
                    if($update_quantity >= STACK_LIMIT){
                        $remaining = $update_quantity-STACK_LIMIT;
                        $update_quantity = STACK_LIMIT;
                        self::updateStack($stack_row["id"], $update_quantity);
                    } else {
    
                        self::updateStack($stack_row["id"], $update_quantity);
                        $remaining = 0;

                    }
    
                } else {

                    if($remaining > STACK_LIMIT){

                        self::createItem($vnum, $token, STACK_LIMIT, $rarity);
                        $remaining = $remaining-STACK_LIMIT;

                    } else {
                        self::createItem($vnum, $token, $remaining, $rarity);
                        $remaining = 0;
                    }
                }

            }
        }

        public static function createItem($vnum, $token, $quantity = 1, $rarity = 1){

            $type = Item::getType($vnum);
            $subtype = Item::getSubtype($vnum);

            Database::queryAlone("INSERT INTO items SET item_vnum = ?, item_type = ?, item_subtype = ?, token = ?, quantity = ?, rarity = ?", [$vnum, $type, $subtype, $token, self::checkStackLimit($quantity), self::checkMaxRarity($rarity)]);

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

            $query = Database::queryAll("SELECT * FROM items WHERE token = ?", [$token]);

            return $query;

        }

        public static function alert($type, $text){
            switch ($type) {
                case 'primary':
                    $info = "Salvage";
                    break;
                case 'dark':
                    $info = "Upgrade";
                    break;
            }

            $alert = "";
            $alert .= '<div class="alert alert-'.$type.' bg-dark text-light mb-0 mt-3 text-start" role="alert">
            <strong>'.ucfirst($info).'</strong> ( Result )<hr>';

                if(gettype($text) == "string"){
                    $alert .= $text;
                } else {
                    foreach($text as $item) {
                        $actual_item = new Item($item["vnum"]);
                        $alert .= $item["quantity"]."x ".Item::getRarityColorText($item["rarity"], $actual_item->name())."<br>";
                    }
                }

            $alert .= '</div>';

            return $alert;
        }

        public static function randomSalvageNumber(){
            return rand(1,10000);
        }

        public function showTooltip(){

            $query = "<span style='color: ".self::getRarityColor($this->_rarity)."'>".$this->_name." [".self::getRarityTier($this->rarity())."]</span>";
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
                $query .= "Crafting material";
            }

            
            $query .= "<hr>";
            
            $query .= "Price: ".($this->_price*$this->_rarity)."g";

            if(isset($this->_chance) && !empty($this->_chance)){
                $query .= "<hr>";
                $query .= "Drop chance: ".$this->_chance."%";
            }

            if(isset($_SESSION["user_token"]) && User::getDataAlone("rank", $_SESSION["user_token"]) == 777){
                $query .= "<hr>ID: ".$this->_vnum;
            }

            return $query;

        }

        public static function showItem($vnum, $quantity = "", $rarity = "", $chance = ""){
            $item = "";
            if(isset($vnum)){
                $actual_item = new Item($vnum, $quantity, $rarity, $chance);

                $item .= '<div class="item">';
                    $item .= '<div class="'.$actual_item->sizeText().'-slot '.Item::getRarityClass($actual_item->rarity()).'">';
                        $item .= $actual_item->icon();
                        $item .= '<div class="quantity text-center">'.$quantity.'</div>';
                    $item .= '</div>';
                        $item .= '<div class="stats text-center">'.$actual_item->showTooltip().'</div>';
                $item .= '</div>';

                return $item;
            }

        }

        public static function getItem($id){

            $query = Database::queryAlone("SELECT * FROM items WHERE id = ?", [$id]);

            return $query;

        }

        public static function getProto($id){

            $query = Database::queryAlone("SELECT * FROM item_proto WHERE id = ?", [$id]);

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
            $rarity = self::getRarityColor($rarity);
            return "<span style='color: ${rarity}'>${text}</span>";
        }
        public static function getRarityClass($rarity){
            switch ($rarity) {
                default:
                    $query = "common"; // Common Grade
                    break;

                case 2:
                    $query = "uncommon"; // Uncommon Grade
                    break;

                case 3:
                    $query = "special"; // Special Grade
                    break;

                case 4:
                    $query = "rare"; // Rare Grade
                    break;

                case 5:
                    $query = "unique"; // Unique Grade
                    break;

                case 6:
                    $query = "legend"; // Legend Grade
                    break;

                case 7:
                    $query = "mythical"; // Mythical (Gods) Grade
                    break;

                case 8:
                    $query = "genesis"; // Genesis Class
                    break;
            }
            return $query;
        }
        public static function getRarityTier($rarity){
            switch ($rarity) {
                default:
                    $query = "I"; // Common Grade
                    break;

                case 2:
                    $query = "II"; // Uncommon Grade
                    break;

                case 3:
                    $query = "III"; // Special Grade
                    break;

                case 4:
                    $query = "IV"; // Rare Grade
                    break;

                case 5:
                    $query = "V"; // Unique Grade
                    break;

                case 6:
                    $query = "VI"; // Legend Grade
                    break;

                case 7:
                    $query = "VII"; // Mythical (Gods) Grade
                    break;

                case 8:
                    $query = "VIII"; // Genesis Class
                    break;
            }
            return $query;
        }
        public static function getRarityColor($rarity){

            switch ($rarity) {
                default:
                    return "#666666"; // Common Grade
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
        public static function getRarityName($rarity){

            switch ($rarity) {
                default:
                    return "Common"; // Common Grade
                    break;

                case 2:
                    return "Uncommon"; // Uncommon Grade
                    break;

                case 3:
                    return "Special"; // Special Grade
                    break;

                case 4:
                    return "Rare"; // Rare Grade
                    break;

                case 5:
                    return "Unique"; // Unique Grade
                    break;

                case 6:
                    return "Legendary"; // Legend Grade
                    break;

                case 7:
                    return "Mythical"; // Mythical (Gods) Grade
                    break;

                case 8:
                    return "Genesis"; // Genesis Class
                    break;
            }

        }

    }

?>