<?php
 
require '../vendor/autoload.php';
 
use Cotacao\SQLite\SQLiteConnection as SQLiteConnection;
use Cotacao\SQLite\SQLiteCreateTable as SQLiteCreateTable;
use Cotacao\SQLite\SQLiteInsert as SQLiteInsert;
use Cotacao\SQLite\SQLiteQuery as SQLiteQuery;
use Cotacao\CLI\CLIRender as CLIRender;
use Cotacao\CurrencyCode as CurrencyCode;
 
if (!file_exists("../db")) mkdir("../db");

$pdo = (new SQLiteConnection())->connect();
CLIRender::printMessage("Verificando banco de dados...");

if ($pdo != null)
    CLIRender::printMessage("Conexão com Banco de Dados SQLite executada com sucesso!");
else
    CLIRender::printMessage("Whoops, não foi possível se conectar com Banco de Dados SQLite!");

try {

	$db = new SQLiteCreateTable($pdo);
	CLIRender::printMessage("Verificando Tabelas...");
	$db->createTables();
	CLIRender::printMessage("Obtendo tabelas existentes...\n");
	$tables = $db->getTableList();

	CLIRender::printLineSeparator(23);
	CLIRender::printHeader(["Tabelas"]);
	foreach ($tables as $table) {
		CLIRender::printLineData([$table]);
	}
	CLIRender::printLineSeparator(23);
	CLIRender::printBody();

	CLIRender::printMessage("Obtendo dados...");
	$xml = simplexml_load_file("../data/iso4217.xml");
	$allCurrencies = $xml->CcyTbl->CcyNtry;

	CLIRender::printMessage("Importando dados...");
	$insert = new SQLiteInsert($pdo);
	$insert->insertCurrencies($allCurrencies);

	CLIRender::printMessage("Dados importados, aplicação instalada!");
	
} catch (Exception $e) {
	CLIRender::printMessage($e->getMessage());
}