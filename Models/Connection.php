<?php
namespace App;
use \PDO;
/**
 * SQLite connnection
*/
class Connection {

    public $pdo;
    
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    function __construct() {}
}