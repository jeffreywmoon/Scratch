<?php
/**
 * Class UserStatus
 * 
 * Initiates session, and checks if user is authenticated.
 * For use on authentication-required pages (account, etc)
 * 
 */
class UserStatus{
    
    public static function isLoggedIn(){
        Session::init();
        if(!Session::isLoggedIn()){
            Session::destroy();
            return false; 
        }else{
            return true;
        }
    }
}