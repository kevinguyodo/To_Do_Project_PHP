<?php
namespace App;
use \PDO;
/**
 * SQLite connnection
*/
class Connection {
    /*
     * PDO instance
     * @var type 
     */
    public $pdo;

    /*
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($pdo == null) {
            $pdo = new PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }

    function __construct() {}
}