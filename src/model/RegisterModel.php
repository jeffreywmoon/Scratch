<?php
/**
 * Class Register Model
 * 
 * Handles all of the registration authentication/database calls,
 * adds new user to database if valid registration
 * 
 * @author Jeffrey Moon
 */
class RegisterModel{
    
    public static function registerNewUser($email, $reemail, $password, $repassword, $first_name, $last_name){
        // if one of the text boxes was empty
        if(empty($email) || empty($reemail) || empty($password) || empty($repassword) || 
        empty($first_name) || empty($last_name)){
            Session::set('register_feedback', 'Please completely fill in the form');
            return false;
        
        // if entered emails are different
        }elseif(!($email==$reemail)){
            Session::set('register_feedback', 'Email addresses did not match');
            return false;

        // if entered passwords are different    
        }elseif(!($password==$repassword)){
            Session::set('register_feedback', 'Passwords do not match');
            return false;
       
        // if username is taken
        }elseif(UserModel::userExists($email)){
            Session::set('register_feedback', 'Account already registered with that email');
            return false;
            
        // Now add new user and redirect to login page
        }else{
            UserModel::addNewUser($email, $password, $first_name, $last_name);
            return true;
        }
    }
}
?>