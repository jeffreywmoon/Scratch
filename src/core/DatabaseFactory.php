<?php
/**
 * Class DatabaseFactory
 * 
 * A simple database factory. similar to the database factory used in:
 * https://github.com/panique/huge/blob/master/application/core/DatabaseFactory.php
 * 
 * @author Jeffrey Moon
 * 
 */
class DatabaseFactory{
  
  // db factory
  private static $factory;
  
  // db handler
  private $db;

  /**
   * return factory
   */
  public static function getFactory(){
    if(!self::$factory){
      self::$factory = new DatabaseFactory();
    }
    
    return self::$factory;
  }
  
  /**
   * Return instance of db connection.
   * Use like:
   * DatabaseFactory::getFactory()->getConnection();
   * 
   * This allows us to implement connection pooling easier
   */
  public function getConnection(){
    // if db instance doesn't yet exist, create it
    if(!$this->db){  
      // pdo connect string
      $pdostring = 'mysql:host=' . Config::get('DBHOST') . ';dbname=' . Config::get('DBNAME');
      // attempt to connect to db
      try{
        $this->db = new PDO($pdostring, Config::get('DBUSER'), Config::get('DBPASS'));
      // catch connection error
      }catch(PDOException $e){
        echo "<br>Error:" . $e->getMessage() . "<br>";
        $this->db = null;
        // connect
      }
    }
    // return db instance
    return $this->db;
  }
}
?>