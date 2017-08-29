<?php 

namespace Cotacao;

class SQLiteQuery {

	private $pdo;
 
    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

	public function getAllCurrencies () {

        $stmt = $this->pdo->query('
        	SELECT 
				country, 
				currency, 
				currency_code 
			FROM 
				currency
			WHERE status = 1');
 
        $currencies = [];

        while ($currency = $stmt->fetchObject()) {
            $currencies[] = $currency;
        }
 
        return $currencies;
    }

    public function getCurrencyByCurrencyCode($currencyCode) {	
    	$stmt = $this->pdo->prepare('SELECT country, currency, currency_code 
                                    FROM currency
                                   WHERE currency_code = :currency_code;');
        $stmt->bindParam(':currency_code', $currencyCode);
        $stmt->execute();
        return $stmt->fetchAll();
        //return $stmt->fetchColumn();
    }

}