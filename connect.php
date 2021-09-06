
<?php
/**
 * Try and catch with database
 * 
 * @author Mathis PLUMAIL 2021
 */

class database {
    // attribut = var, private = ne sortira pas du fichier
     private static $dbName = 'bddsql_'; 
     private static $dbHost = 'localhost';
     private static $dbUsername = 'root';
     private static $dbUserPassword = '';
     private static $connect = null;
     
     public function __construct() { 
         die('La fonction d\'initialisation n\'est pas autorisée');        
     }
     // appel en static ::
     public static function connect() { // public = accessible par d'autres fichiers
        if ( null == self::$connect ) { 
            try { 
                self::$connect = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
            } 
            catch(PDOException $e) { 
                 echo "<h1 class='bg-danger text-center'>La connexion à échouée<h1> 
                 <h3 class='bg-warning'>Le message d'erreur : " . $e->getMessage() . "</h3>";
            }
        } // fin de if
       return self::$connect;
    }  
    public static function disconnect() {
        return self::$connect = null;
    }
}