<?php
/**
 * Class Redirect
 * 
 * Adds an abstraction on redirection to make redirection cleaner
 * 
 * @author Jeffrey Moon
 * 
 */
class Redirect{
    /**
     * Redirect to homepage
     */
     public static function index(){
        header('Location: ' . Config::get('BASE_URL')); 
     }
     
     /**
      * Redirect to login page
      */
     public static function login(){
       header('Location: ' . Config::get('BASE_URL') . Config::get('LOGIN_URL'));
     }
     
     /**
      * Redirect to register page
      */
     public static function register(){
       header('Location: ' . Config::get('BASE_URL') . Config::get('REGISTER_URL'));
     }
     
     /**
      * Redirect to logout page
      */
      public static function logout(){
       header('Location ' . Config::get('BASE_URL') . Config::get('LOGOUT_URL'));
      }
      
      /**
       * Redirect to logged-user account
       */
      public static function account(){
       header('Location ' . Config::get('BASE_URL') . Config::get('ACCOUNT_URL'));
      }
     /**
      * Redirect to public user account 
      */
      public static function viewAccount($id){
        header('Location ' . Config::get('BASE_URL') . Config::get('ACCOUNT_GET_URL') . $id);
      }
      
     /**
      * Redirect to given URL
      */
      public static function to($url){
         header('Location: ' . $url);
      }
}