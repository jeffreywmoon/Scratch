<?php
/**
 * LoginController
 * 
 * Handles login authentication and redirection, currently in script form
 * but will be class-ified (lul) and then called from a 2nd page within the login
 * folder
 * 
 * @author Jeffrey Moon
 */
 require_once('../Scratch.php');
 Scratch::init();
 
 if(LoginModel::login(Request::post('email'), Request::post('password'))){
     //if login was successful, go account
     Redirect::to(Config::get('BASE_URL') . Config::get("ACCOUNT_URL"));
 }else{
     // if login was unsuccessful -- redirect back to login w/ error msg
     Redirect::to(Config::get('BASE_URL') . Config::get("LOGIN_URL"));
 }
?>