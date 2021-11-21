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

        public static function alert($alert, $type = "info", $align = "start"){

            return '
            
                <div class="alert alert-'.$type.' mb-0 mt-3 text-'.$align.'" role="alert">
                    <strong>'.ucfirst($type).'!</strong> '.$alert.'
                </div>
            ';

        }

        public static function secureInput($var){

            return htmlspecialchars($var);

        }

    }

?>