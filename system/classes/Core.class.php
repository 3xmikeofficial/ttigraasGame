<?php 

    class Core
    {

        public static function redirect($url, $delay = 0){

            return '<meta http-equiv="refresh" content="'.$delay.'; url='.$url.'">';

        }

        public static function refresh($delay = 0){

            return '<meta http-equiv="refresh" content="'.$delay.'">';

        }

        public static function hash($value){

            global $hash;

            return password_hash($value, PASSWORD_BCRYPT);

        }

        public static function check($var){

            if(isset($var) && !empty(trim($var))){

                return true;

            }

            return false;

        }

        public static function openRow(){

            return "<div class='row'>";

        }
        public static function closeRow(){

            return "</div>";

        }

        public static function addLabel($text = "", $name = "", $params = ""){

            return "<label for='${name}' ".($params == "" ? "" : self::doParams($params)).">${text}</label>";

        }

        public static function addImage($src = "", $params = ""){

            return "<img src='${src}' ".($params == "" ? "" : self::doParams($params))." />";

        }

        public static function doParams($params){

            if(empty($params)){
                return;
            }

            $query = "";

            foreach($params as $key => $value){

                $query .= $key."='${value}'";

            }

            return $query;

        }

        public static function addInput($type = "text", $name = "", $classes = "", $params = ""){

            return "<input type='".$type."' name='${name}' id='${name}' class='${classes}' ".self::doParams($params)." />";

        }

        public static function openForm(){

            return "<form method='post' action='".$_SERVER["REQUEST_URI"]."'>";

        }
        public static function closeForm(){

            return "</form>";

        }
        public static function openDiv($params = ""){

            return "<div ".self::doParams($params).">";

        }
        public static function closeDiv(){

            return "</div>";

        }

        public static function openCard($title, $params = ""){

            return "<div class='card bg-dark'><div class='card-header' ".self::doParams($params).">${title}</div><div class='card-body'>";

        }
        public static function closeCard(){

            return "</div></div>";

        }

        public static function minVal($value, $min = 1){

            return $value >= $min ? $value : $min;

        }

        public static function alert($alert, $type = "info", $align = "start"){

            return '
            
                <div class="alert alert-'.$type.' mb-0 mt-3 text-'.$align.'" role="alert">
                    <strong>'.ucfirst(($type == "danger" ? "error" : $type)).'!</strong> '.$alert.'
                </div>
            ';

        }

        public static function secureInput($var){

            return htmlspecialchars($var);

        }

        public static function random($min, $max){

            $random = rand($min, $max);

            return $random;

        }

    }

?>