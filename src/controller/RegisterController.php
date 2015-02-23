<?php
/**
 * Handles registration redirection
 * 
 * currently in script form, but will be class-ified (lul) and called from a 2nd
 * page within the register folder
 * 
 * @author Jeffrey Moon
 */
require_once('../Scratch.php');
Scratch::init();

// attempt registration -- if registration is successful as to db
// Passing a large amount
if(RegisterModel::registerNewUser(Request::post('email'), Request::post('reemail'),
Request::post('password'), Request::post('repassword'), Request::post('firstname'),
Request::post('lastname'))){
    
    Redirect::to(Config::get('BASE_URL') . Config::get('LOGIN_URL'));
}else{
    Redirect::to(Config::get('BASE_URL') . Config::get('REGISTER_URL'));
}

?>