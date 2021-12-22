<?php

    class Quests{

        public static function getAll($section = ""){

            if(!empty($section)){

                $query = Database::queryAll("SELECT * FROM quests WHERE section = ?", [$section]);

                return $query;

            } else {

                $query = Database::queryAll("SELECT * FROM quests");

                return $query;

            }

        }

        public static function randomLootNumber(){
            return rand(1,10000);
        }

        public static function getOne($id){

            $query = Database::queryAlone("SELECT * FROM quests WHERE id = ?", [$id]);

            return $query;

        }

        public static function getName($id){

            $query = Database::queryAlone("SELECT * FROM quests WHERE id = ?", [$id]);

            return $query["name"];

        }

        public static function alert($alert, $type = "success", $align = "start"){

            if($type == "success"){

                return '
                
                    <div class="alert alert-'.$type.' mb-0 text-'.$align.'" role="alert">
                        <strong>Victory!</strong> '.$alert.'
                    </div>
                ';

            } elseif($type == "warning"){

                return '
                
                    <div class="alert alert-'.$type.' mb-0 text-'.$align.'" role="alert">
                        <strong>Warning!</strong> '.$alert.'
                    </div>
                ';

            } else {

                return '
                
                    <div class="alert alert-'.$type.' mb-0 text-'.$align.'" role="alert">
                        <strong>Lost!</strong> '.$alert.'
                    </div>
                ';

            }

        }

    }

?>