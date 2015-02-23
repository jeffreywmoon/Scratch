<?php
/**
 * Class Config
 * 
 * Returns entries from the configuration file located at /scratch/config
 * 
 * @author Jeffrey Moon
 */
class Config{
    private static $config; // config file
    
    /**
     * returns config entry
     * @param key the config entry to return
     */
    public static function get($key){
        if(!self::$config){
            require_once(realpath($_SERVER['DOCUMENT_ROOT'])) . '/scratch/config/ScratchConfig.php';
            self::$config = ScratchConfig::getConfig();
        }
        
        return self::$config[$key];
    }
}
?>