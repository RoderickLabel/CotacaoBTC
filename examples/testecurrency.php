<?php 

require_once("../vendor/autoload.php");

use Cotacao\SQLiteConnection as SQLiteConnection;
use Cotacao\SQLiteQuery as SQLiteQuery;
use Cotacao\CurrencyCode as CurrencyCode;

$pdo = (new SQLiteConnection())->connect();
$db = new SQLiteQuery($pdo);
$currencyCode = new CurrencyCode();


print "\n";
$codigo = "CNY";
$queryResult = $db->getCurrencyByCurrencyCode(strtoupper($codigo));
$result = $currencyCode->isNotValidCode($queryResult);
var_dump("Código escolhido " . $codigo, $result);
print "\n";


$codigo = "cny";
$queryResult = $db->getCurrencyByCurrencyCode(strtoupper($codigo));
$result = $currencyCode->isNotValidCode($queryResult);
var_dump("Código escolhido " . $codigo, $result);
print "\n";


$codigo = "BRL";
$queryResult = $db->getCurrencyByCurrencyCode(strtoupper($codigo));
$result = $currencyCode->isNotValidCode($queryResult);
var_dump("Código escolhido " . $codigo, $result);
print "\n";


$codigo = "lorem";
$queryResult = $db->getCurrencyByCurrencyCode(strtoupper($codigo));
$result = $currencyCode->isNotValidCode($queryResult);
var_dump("Código escolhido " . $codigo, $result);
print "\n";


$codigo = null;
$queryResult = $db->getCurrencyByCurrencyCode(strtoupper($codigo));
$result = $currencyCode->isNotValidCode($queryResult);
var_dump("Código escolhido " . $codigo, $result);
print "\n";