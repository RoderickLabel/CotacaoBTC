<?php 

require_once ('../vendor/autoload.php');

error_reporting(E_ALL ^ E_NOTICE);

use Cotacao\Main;

$urlApi = "http://api.bitcoincharts.com/v1/markets.json";
$tHeader = ['Exchange', 'Bid (Compra)', 'Ask (Venda)', 'Valor Médio'];

$app = new Main($argv, $urlApi, $tHeader);
$app->renderHead("Consultando mercados.");
$app->renderBody();
