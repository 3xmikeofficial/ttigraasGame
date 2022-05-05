<?php 

    class Player extends Character {

        protected $_id;

        public function __construct($player_id){

            $query = Database::queryAlone("SELECT * FROM characters WHERE id = ?", [$player_id]);

            $this->_id = $query["id"];
            $this->_name = $query["name"];
            $this->_level = $query["level"];
            $this->_exp = $query["exp"];
            $this->_race = $query["race"];
            $this->_class = Character::getClass($this->_race, $query["class"]);
            $this->_health = $query["health"];
            $this->_stamina = $query["stamina"];
            $this->_max_stamina = $query["max_stamina"];
            $this->_speed = $query["speed"];
            $strenght = 0;
            $str_item = Database::queryAlone("SELECT * FROM items WHERE item_type = ? and player_id = ? and equipped = 1", ["ITEM_WEAPON", $this->_id]);
            if(!empty($str_item)){
            $selected_str_item = new Item($str_item["item_vnum"], $str_item["quantity"], $str_item["rarity"]);
            $strenght += $selected_str_item->ShowAvarageRarityValue();
            }
            $this->_strenght = $query["strenght"]+$strenght;
            $defense = 0;
            $defense_items = Database::queryAll("SELECT * FROM items WHERE item_type = ? and player_id = ? and equipped = 1", ["ITEM_ARMOR", $this->_id]);
            if(!empty($defense_items)){
                foreach ($defense_items as $id => $def_item) {
                    $selected_def_item[$id] = new Item($def_item["item_vnum"], $def_item["quantity"], $def_item["rarity"]);
                    $defense += $selected_def_item[$id]->ShowAvarageRarityValue();
                }
            }
            $this->_defense = $query["defense"]+$defense;
            $this->_magicules = $query["magicules"];
            $this->_gold = $query["gold"];
            $this->_equip = Item::getEquip($this->_id);
            $this->_inventory = Item::getInventory($this->_id);

        }

        public function id(){
            return $this->_id;
        }

        public function addItem($vnum, $quantity = 1, $rarity = 1){

            if(Item::isWeapon($vnum) || Item::isArmor($vnum)){

                Item::createItem($vnum, $this->_id, 1, $rarity);
                
            } else {

                Item::addItem($vnum, $this->_id, $quantity, $rarity);

            }

        }

        public function setStamina($value){

            $this->_stamina = $this->_stamina + $value;
            Database::queryAlone("UPDATE characters SET stamina = ? WHERE account_id = ?", [$this->_stamina, $this->_id]);

        }

        public static function doExist($player_id){

            $query = Database::query("SELECT * FROM characters WHERE account_id = ? ",[$player_id]);

            return $query;

        }

        public static function createChar($name, $race, $account_id){

            switch ($race) {
                case 'Slime':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Human':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Demon':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Angel':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Goblin':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Lizardman':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
                case 'Orc':
                    $health = 100;
                    $speed = 10;
                    $strenght = 20;
                    $defense = 0;
                    break;
            }

            Database::queryAlone("INSERT INTO characters SET name = ?, account_id = ?, race = ?, health = ?, speed = ?, strenght = ?, defense = ? ",[$name,$account_id,$race,$health,$speed,$strenght,$defense]);

        }

        public function setExp($exp){
            Database::queryAlone("UPDATE characters set exp = ? WHERE name = ? ",[$exp, $this->_name]);
        }
    
        public function addExp($exp){
            if($this->_level != MAX_PLAYER_LEVEL){
                $this->_exp += $exp;
                while($this->_exp >= $this->expNeeded()){
                    $this->_exp -= $this->expNeeded();
                    $this->setExp($this->_exp);
                    $this->levelUp();
                }
                $this->setExp($this->_exp);
            }
        }

        public function levelUp(){
            if($this->_level != MAX_PLAYER_LEVEL){
                $this->_level += 1;
                Database::queryAlone("UPDATE characters SET level = ? WHERE name = ?",[$this->_level, $this->_name]);
                return $this->_level;
            } else {
                return $this->_level;
            }
        }

        public function addGold($gold){
            $this->_gold += $gold;
            Database::queryAlone("UPDATE characters SET gold = ? WHERE name = ?",[$this->_gold, $this->_name]);
            return $this->_gold;
        }

    }

?>