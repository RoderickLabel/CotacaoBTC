<?php

namespace Cotacao\SQLite;
 
use \PDO;

/**
 * SQLite connnection
 */
class SQLiteConnection {

    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
 
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new PDO("sqlite:" . Config::getPathToSQLiteFile());
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}