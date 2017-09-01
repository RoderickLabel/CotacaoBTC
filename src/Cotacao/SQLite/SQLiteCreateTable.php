<?php 

namespace Cotacao\SQLite;

class SQLiteCreateTable {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function createTables() {
		$commands = [
			'CREATE TABLE IF NOT EXISTS currency (
				id INTEGER PRIMARY KEY,
				country VARCHAR,
				currency VARCHAR,
				currency_code VARCHAR,
				status BOOLEAN
			)'
		];

		foreach ($commands as $command) {
			$this->pdo->exec($command);
		}
	}

	public function getTableList() {
		$stmt = $this->pdo->query("
			SELECT name FROM sqlite_master 
			WHERE type = 'table' ORDER BY name"
		);

		$tables = [];

		while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$tables[] = $row['name'];
		}

		return $tables;
	}

}