<?php
/**
 * The main include for pages that do NOT require the user to be logged in.
 * If the user needs to be logged in, use ScratchAuth.php instead.
 * 
 * Use:
 * <?php
 *      require_once('[path_to_scratch_folder]/Scratch.php');
 *      Scratch::init();
 * 
 *      // if you want to redirect if user is already logged in
 *      // like if a logged in user attempts to go to register page
 *      // you would put this after Scratch::init() in register page:
 *      if(Session::isLoggedIn()){
 *            Redirect::to([path_to_redirect_to]);
 *      }
 * ?>
 *
 * @author Jeffrey Moon
 *
 */
 
class Scratch{
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
        require_once($root . $core . 'DatabaseFactory.php');
        require_once($root . $core . 'Redirect.php'); 
        require_once($root . $core . 'Request.php');
        require_once($root . $core . 'Session.php');
        // include models
        $model = Config::get('MODEL_URL');
        require_once($root . $model . 'LoginModel.php');
        require_once($root . $model . 'RegisterModel.php');
        require_once($root . $model . 'UserModel.php');
        
        // start session
        Session::init();
    }
}
?>