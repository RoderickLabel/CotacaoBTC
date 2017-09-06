<?php
 
namespace Cotacao\SQLite;
 
class SQLiteInsert {
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }
 
    /**
     * Insert a new currency into the currency table
     * @param string $currencies
     * @return void
     */
    public function insertCurrencies($currencies) {

        $sql = 'INSERT INTO currency 
                    (country, currency, currency_code, status) 
                VALUES
                    (:country, :currency, :currency_code, :status)';
        
        foreach ($currencies as $currency) {            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':country', $currency->CtryNm);
            $stmt->bindValue(':currency', $currency->CcyNm);
            $stmt->bindValue(':currency_code', $currency->Ccy);
            $stmt->bindValue(':status', 1);
            $stmt->execute();
        }
 
        //return $this->pdo->lastInsertId() > 0;
        
    }

}