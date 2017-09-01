<?php 

namespace Cotacao;

use Cotacao\Market;
use Cotacao\MarketFactory;
use Cotacao\ApiClient;
use Cotacao\FormatCurrency;
use Cotacao\CurrencyCode;
use Cotacao\CLI\CLIRender;
use Cotacao\CLI\CLIArgs;
use Cotacao\SQLite\SQLiteConnection;
use Cotacao\SQLite\SQLiteQuery;

class Main {

	private $urlApi;
	private $tHeader;
	private $inputISOCurrency;
	private $isNotValidCode;

	public function __construct($argv, $urlApi, $tHeader) 
	{
		
		$pdo = (new SQLiteConnection())->connect();
		$db = new SQLiteQuery($pdo);
		$validCode = new CurrencyCode();
		
		$this->urlApi = $urlApi;
		$this->tHeader = $tHeader;
		$this->inputISOCurrency = strtoupper((new CLIArgs($argv))->getArgs());

		$queryResult = $db->getCurrencyByCurrencyCode($this->inputISOCurrency);
		$this->isNotValidCode = $validCode->isNotValidCode($queryResult);

	}

	/**
	 * Renderiza Cabeçalho da Tabela
	 * @return void
	 */
	public function renderHead($initMessage = null) 
	{
		CLIRender::printMessage($initMessage);
		CLIRender::printLoad();
		CLIRender::breakLine();
		CLIRender::printLineSeparator(89);
		CLIRender::printHeader($this->tHeader);
	}

	/** 
	 * Imprime somente as cotações de mercados especificados, 
	 * em caso de ausência do Código ISO todas exchanges são impressas 
	 * @param void
	 */
	public function renderBody()
	{
		foreach ($this->getMarkets() as $market) {
			$market = MarketFactory::create((array) $market);
			if ( $market->getCurrency() == $this->inputISOCurrency || $this->isNotValidCode ) {
				$this->renderTableRow($market); 
			}
		}
		
		CLIRender::printLineSeparator(89);
		CLIRender::printBody();
	}

	/**
	 * Obtém os dados remotos via API
	 * @return Json
	 */
	public function getMarkets() 
	{
		$apiClient = new ApiClient($this->urlApi);
		return json_decode($apiClient->getData());
	}

	/**
	 * @param Market
	 * @return void
	 */
	public function renderTableRow(Market $market) 
	{
		if ($market->getBid() && $market->getAsk()) {
			CLIRender::printLineSeparator(89);
			CLIRender::printLineData ([
				$market->getSymbol(), 
				FormatCurrency::toReal($market->getBid()), 
				FormatCurrency::toReal($market->getAsk()), 
				FormatCurrency::toReal($market->getAvg())
			]);
		}
	}

}