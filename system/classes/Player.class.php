<?php 

    class Player extends Character {

        protected $_id;
        protected $_token;

        public function __construct($idortoken){

            $query = Database::queryAlone("SELECT * FROM characters WHERE id = ? or token = ? ", [$idortoken, $idortoken]);

            $this->_id = $query["id"];
            $this->_token = $query["token"];
            $this->_name = $query["name"];
            $this->_level = $query["level"];
            $this->_exp = $query["exp"];
            $this->_race = $query["race"];
            $this->_class = Character::getClass($this->_race, $query["class"]);
            $this->_health = $query["health"];
            $this->_stamina = $query["stamina"];
            $this->_max_stamina = $query["max_stamina"];
            $this->_speed = $query["speed"];
            $this->_strenght = $query["strenght"];
            $this->_defense = $query["defense"];
            $this->_magicules = $query["magicules"];
            $this->_gold = $query["gold"];
            $this->_equip = Item::getEquip($this->_token);
            $this->_inventory = Item::getInventory($this->_token);

        }

        public function id(){
            return $this->_id;
        }
        public function token(){
            return $this->_token;
        }

        public function addItem($vnum, $type, $subtype, $token, $quantity = 1, $rarity = 1){

            if(Item::isWeapon($vnum) || Item::isArmor($vnum)){

                Item::createItem($vnum, $type, $subtype, $token, 1, $rarity);
                
            } else {

                Item::addItem($vnum, $type, $subtype, $token, $quantity, $rarity);

            }

        }

        public function setStamina($value){

            $this->_stamina = $this->_stamina + $value;
            Database::queryAlone("UPDATE characters SET stamina = ? WHERE token = ?", [$this->_stamina, $this->_token]);

        }

        public static function doExist($token){

            $query = Database::query("SELECT * FROM characters WHERE token = ? ",[$token]);

            return $query;

        }

        public static function createChar($name, $race, $token){

            Database::queryAlone("INSERT INTO characters SET name= ?, race= ?, token= ? ",[$name,$race,$token]);

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