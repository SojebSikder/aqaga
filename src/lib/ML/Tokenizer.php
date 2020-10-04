<?php 
/**
 * Tokenizer
 * Author: Sojeb Sikder
 */

//namespace ML\ML;

class Tokenizer{
    
    public static $articles = [
        'a', 'an', 'the'
    ];

    public static $be_varb = [
        'am', 'is' , 'are', 'was', 'were'
    ];
    
    public static $wh_question = [
        'what', 'why', 'how', 'which', 'where'
    ];

    public static $since = [
        'since', 'to', 'from','form','here','there'
    ];

    public static function getToken($text, $delimeter =" "){
        $token = explode($delimeter, $text);
        return $token;
    }

    public static function parseGrammer($text){
        $token = self::getToken($text);
        return $token;
    }


    public static function getKeyword($text){
        $token = self::getToken($text);
        return $token;
    }


    public static function parseUrl($data)
    {
        if (substr($data , 0, 7) !="http://") {
            //prepend http://
            $url = "http://".$_POST['url'];
        }
        else{
            $url = $data;
        }
    }


}

?>