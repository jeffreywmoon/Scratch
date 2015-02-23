<?php
/**
 * The minimum include for pages that do NOT require the user to be logged in.
 * If the user needs to be logged in, use ScratchAuth.php instead.
 * 
 * If you're not sure whether to use this or Scratch.php, use Scratch.php
 * 
 * Use:
 * <?php
 *      require_once('[path_to_scratch_folder]/ScratchMin.php');
 *      ScratchMin::init();
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
 
class ScratchMin{
    /**
     * Requires minimun core files and starts the session
     */
    public static function init(){
        // include config first
        $CONFIG_PATH = realpath($_SERVER['DOCUMENT_ROOT']) . '/scratch/core/Config.php';
        require_once($CONFIG_PATH);
        // include rest of project
        $root = Config::get('ROOT_URL');
        // include core
        $core = Config::get('CORE_URL');
        require_once($root . $core . 'Redirect.php'); //
        require_once($root . $core . 'Session.php'); //
        // include models
        $model = Config::get('MODEL_URL');
        require_once($root . $model . 'LoginModel.php'); //
        require_once($root . $model . 'UserModel.php'); //
        
        // start session
        Session::init();
    }
}
?>