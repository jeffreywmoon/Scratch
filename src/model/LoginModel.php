<?php
/** 
 * Class LoginModel
 * 
 * Manages login authentication, managed by LoginController
 * 
 * @author Jeffrey Moon
 */
class LoginModel{

    /**
     * Authenticates login
     * 
     * @param username the username to log in with
     * @param password the user's entered password
     *
     * @return true if login was successful
     */
    public static function login($email, $password){
        
        $user; // user info, once retrieved from db
        
        // if either username or password was empty
        if(empty($email) || empty($password)){
            Session::set('login_feedback', 'Email/Password box empty');
            return false;
        
        // if the user doesn't exist
        }elseif(!($user=UserModel::getUser($email))){
            Session::set('login_feedback', "User doesn't exist");
            return false;
        
        // if the user's hashed password doesn't match db hashed pw    
        }elseif(!self::checkPasswords($user['password_hash'], UserModel::password($password, $user['salt']))){
            Session::set('login_feedback', "Username/Password mismatch");
            return false;
        
        // login was successful
        }else{
            $session_vars = UserModel::getUserByID($user['user_id']);
            foreach($session_vars as $key=>$value){
                Session::set($key, $value);
                Session::set('user_logged_in', true);
            }
            return true;
        }
    }
    
    /**
     * Logs the user out
     */
    public static function logout(){
        Session::destroy();
    }
    
    /**
     * returns true if password hashes are equal
     */
    private static function checkPasswords($pwhash1, $pwhash2){
        return ($pwhash1==$pwhash2) ? true : false;
    }
}