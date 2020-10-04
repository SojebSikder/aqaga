<?php
/**
 * FileManagement Class
 */
class FileManagement{

    public static function getContent($file){
        $file = file_get_contents($file);
        return $file;
    }

    public static function saveContent($file, $text){
        $file = file_put_contents($file, $text, FILE_APPEND);
        return $file;
    }

    public static function getDir($dir){
        $file = scandir($dir);
        return $file;
    }
}


?>