<?php 

require_once("../autoload.php");
error_reporting(E_ALL ^ E_NOTICE);

use Cotacao\Main;

$urlApi = "http://api.bitcoincharts.com/v1/markets.json";
$tHeader = ['Exchange', 'Bid (Venda)', 'Ask (Compra)', 'Valor Médio'];

$app = new Main($argv, $urlApi, $tHeader);
$app->renderHead("Consultando mercados.");
$app->renderBody();