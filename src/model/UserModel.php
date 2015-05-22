<?php
/**
 * Class UserModel
 * 
 * Handles all user-related database communication
 * 
 * @author Jeffrey Moon
 */
class UserModel{
    /**
     * returns user's info from db in form of assoc. array
     */
    public static function getUser($email){
        $db = DatabaseFactory::getFactory()->getConnection();
        $st = $db->prepare('SELECT user_id, password_hash FROM auth WHERE email=:email LIMIT 1');
        $st->execute(array(':email'=>$email));
         
        return $st->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Gets another user's info based on user id
     */
    public static function getUserByID($user_id){
        $db = DatabaseFactory::getFactory()->getConnection();
        $st = $db->prepare('SELECT user_id, email, first_name, last_name, has_profile_pic,' .
            ' profile_pic, joined FROM user WHERE user_id=:user_id LIMIT 1');
        $st->execute(array(':user_id'=>$user_id));
        
        return $st->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * adds a new user to db
     */
    public static function addNewUser($email, $password, $first_name, $last_name){
        $db = DatabaseFactory::getFactory()->getConnection();
        $st = $db->prepare('INSERT INTO auth (email, password_hash) VALUES (:email,:password_hash);' .
            'INSERT INTO user (user_id, first_name, last_name, email, joined) VALUES 
            (LAST_INSERT_ID(), :first_name, :last_name, :email, :joined);');
        // generate salt, hash password
        $salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $st->execute(array(
            ':email' => $email,
            ':password_hash' => $password_hash,
            ':first_name' => $first_name,
            ':last_name' => $last_name,  
            ':email' => $email,
            ':joined' => self::now()
        ));
    } 
    
    /**
     * Returns true if user exists with email
     */
    public static function userExists($email){
        $db = DatabaseFactory::getFactory()->getConnection();
        $st = $db->prepare('SELECT user_id FROM user WHERE email=:email LIMIT 1');
        $st->execute(array(':email'=>$email));
        
        return ($st->fetch()) ? true : false;
    }
    
    /**
     * Returns true if user exists with user_id
     */
    public static function userExistsById($user_id){
        $db = DatabaseFactory::getFactory()->getConnection();
        $st = $db->prepare('SELECT user_id FROM user WHERE user_id=:user_id LIMIT 1');
        $st->execute(array(':user_id'=>$user_id));
        
        return ($st->fetch()) ? true : false;
    }
    
    /**
     * returns a salted and hashed password
     */
    public static function password($password , $salt){
        return hash('sha256', $salt . $password);
    }
    
    /**
     * returns timestamp
     */
    public static function now(){
        return date("Y-m-d H:i:s");
    }
}
?>
