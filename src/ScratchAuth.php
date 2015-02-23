<?php
/**
 * The main include for pages that DO require the user to be logged in.
 * If the user doesn't need to be logged in, use Scratch.php instead.
 * 
 * Use:
 * <?php
 *      require_once('[path_to_scratch_folder]/ScratchAuth.php');
 *      ScratchAuth::init();
 * ?>
 * 
 * If the user isn't logged in, the will be redirected to login/
 *
 * @author Jeffrey Moon
 *
 */
 
class ScratchAuth{
    /**
     * Requires all core files, starts the session
     */
    public static function init(){
        // include config first
        $CONFIG_PATH = realpath($_SERVER['DOCUMENT_ROOT']) . '/scratch/core/Config.php';
        require_once($CONFIG_PATH);
        // include rest of project
        $root = Config::get('ROOT_URL');
        // include core
        $core = Config::get('CORE_URL');
        require_once($root . $core . 'UserStatus.php');
        require_once($root . $core . 'Session.php');
        require_once($root . $core . 'Redirect.php'); 
        require_once($root . $core . 'DatabaseFactory.php');
        require_once($root . $core . 'Request.php');

        // include models
        $model = Config::get('MODEL_URL');
        require_once($root . $model . 'LoginModel.php');
        require_once($root . $model . 'RegisterModel.php');
        require_once($root . $model . 'UserModel.php');
        
    }
}
?>