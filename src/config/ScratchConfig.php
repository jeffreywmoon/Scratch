<?php
/**
 * Scratch Config
 * 
 * This is the main configuration file.
 * core/Config.php invokes getConfig(), thus all
 * config entries should be obtained by including
 * core/Config.php and calling Config::get([key])
 * 
 * @author Jeffrey Moon
 */
class ScratchConfig{
    /**
     * returns config
     */
    public static function getConfig(){
        // initialize config variables
        $config = array(

// START OF SCRATCH CONFIGURATION----------------------------
// 
            // database config
            'DBUSER' => 'matematch',
            'DBNAME' => 'matematch',
            'DBPASS' => 'catsnacks',
            'DBHOST' => '0.0.0.0',
            
            // url config        
            'ROOT_URL' => realpath($_SERVER['DOCUMENT_ROOT']) . '/',
            'BASE_URL' => 'https://matematch-jwmoon07.c9.io/',
            'CORE_URL' => 'scratch/core/',
            'SCRATCH_URL' => 'scratch/',
            'CONTROLLER_URL' => 'scratch/controller/',
            'MODEL_URL' => 'scratch/model/',
            'LOGIN_URL' => '#login',
            'REGISTER_URL' => '#login',
            'ACCOUNT_URL' => '#account',
            'LOGOUT_URL' => '#logout',
            'PROFILE_URL' => '#profile';
            'PROFILE_PIC_URL' => 'upload/profile/',
            'PROFILE_GET_URL' => '#profile?user='
//
// END OF SCRATCH CONFIG-------------------------------------           
        
        );
        return $config;
    }
    
}
?>