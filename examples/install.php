<?php
 
require '../vendor/autoload.php';
 
use Cotacao\SQLiteConnection as SQLiteConnection;
use Cotacao\SQLiteCreateTable as SQLiteCreateTable;
use Cotacao\SQLiteInsert as SQLiteInsert;
use Cotacao\SQLiteQuery as SQLiteQuery;
use Cotacao\CLIRender as CLIRender;
use Cotacao\CurrencyCode as CurrencyCode;
 
$pdo = (new SQLiteConnection())->connect();

if ($pdo != null)
    echo "Conexão com Banco de Dados SQLite executada com sucesso!\n";
else
    echo "Whoops, não foi possível se conectar com Banco de Dados SQLite!\n";

try {

	CLIRender::printMessage("Verificando banco de dados...\n");

	$db = new SQLiteCreateTable($pdo);
	CLIRender::printMessage("Verificando Tabelas...");
	$db->createTables();
	CLIRender::printMessage("Obtendo tabelas existentes...\n");
	$tables = $db->getTableList();

	CLIRender::printHeader(["Tabelas:"]);

	foreach ($tables as $table) {
		CLIRender::printLineData([$table]);
	}

	CLIRender::printBody();

	CLIRender::printMessage("Obtendo dados...\n");
	$allCurrencies = (new CurrencyCode())->getCodes()->CcyTbl->CcyNtry;

	CLIRender::printMessage("Inserindo dados...\n");
	$insert = new SQLiteInsert($pdo);
	$insert->insertCurrencies($allCurrencies);

	CLIRender::printMessage("Dados importados, aplicação instalada!\n");
	
	$db = new SQLiteQuery($pdo);
	$code = $db->getCurrencyByCurrencyCode(strtoupper('brl'));
	$currencyCode = new CurrencyCode();
	$result = $currencyCode->isNotValidCode($code);
	var_dump($result);

} catch (Exception $e) {
	print $e->getMessage();
}