<?php
/**
 * Handles globals (post/get)
 * 
 * @author Jeffrey Moon
 */
class Request{
    
    /**
     * return POST variable if exists
     */
    public static function post($key){
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
    }
    
    /**
     * return GET variable if exists
     */
     public static function get($key){
         if(isset($_GET[$key])){
             return $_GET[$key];
         }
     }
}
?>