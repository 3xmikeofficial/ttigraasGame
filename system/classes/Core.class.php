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

        public static function addImage($src = "", $params = "", $title = ""){

            return "<img src='${src}' ".($params == "" ? "" : self::doParams($params))." title='${title}' />";

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

            return "<input type='".$type."' name='${name}' value='${name}' id='${name}' class='${classes}' ".self::doParams($params)." />";

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

        public static function clean($string = ""){

            return str_replace("  ", "", $string);

        }

        public static function modalButton($id, $text = "info", $params = ""){

            return '<button type="button" class="'.$params.'" data-bs-toggle="modal" data-bs-target="#'.$id.'">
            '.$text.'
          </button>';

        }

        public static function openModal($id, $title = "title"){

            return '<div class="modal fade" id="'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-dark">
                  <h5 class="modal-title">'.$title.'</h5>
                  <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">';

        }

        public static function closeModal(){

            return '</div>
                        </div>
                            </div>
                                </div>';

        }

        public static function numberText($num = false){
            $num = str_replace(array(',', ' '), '' , trim($num));
            if(! $num) {
                return false;
            }
            $num = (int) $num;
            $words = array();
            $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
                'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
            );
            $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
            $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
                'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
                'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
            );
            $num_length = strlen($num);
            $levels = (int) (($num_length + 2) / 3);
            $max_length = $levels * 3;
            $num = substr('00' . $num, -$max_length);
            $num_levels = str_split($num, 3);
            for ($i = 0; $i < count($num_levels); $i++) {
                $levels--;
                $hundreds = (int) ($num_levels[$i] / 100);
                $hundreds = ($hundreds ? '_' . $list1[$hundreds] . ' hundred' . '_' : '');
                $tens = (int) ($num_levels[$i] % 100);
                $singles = '';
                if ( $tens < 20 ) {
                    $tens = ($tens ? '_' . $list1[$tens] . '_' : '' );
                } else {
                    $tens = (int)($tens / 10);
                    $tens = '_' . $list2[$tens] . '_';
                    $singles = (int) ($num_levels[$i] % 10);
                    $singles = '_' . $list1[$singles] . '_';
                }
                $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
            } //end for loop
            $commas = count($words);
            if ($commas > 1) {
                $commas = $commas - 1;
            }
            return trim(implode('', $words));
        }

    }

?>