<?php
/**
 * Class Session
 * Handles the sessions
 */
class Session{
    /** 
     * initiates session if not initiated
     */
    public static function init(){
        if(session_id()==''){
            session_start();
        }
    }

    /**
     * returns true if user is currently logged in
     */
    public static function isLoggedIn(){
        return (Session::get('user_logged_in')) ? true : false;
    }
    
    /**
     * sets session variable
     * @param key the session variable to set
     * @param value the value to assign to session variable
     */
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    /**
     * returns session variable
     * @param key the session variable to return
     */
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }
    
    /**
     * returns user array to front end
     */
    public static function userArray(){
        return array(
            'user_id' => $_SESSION['user_id'],
            'username' => $_SESSION['username']
        );
    }
    /**
     * destroys current session
     */
    public static function destroy(){
        session_destroy();
    }
    
}
?>