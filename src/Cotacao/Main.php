<?php 

namespace Cotacao;

use Cotacao\Market;
use Cotacao\MarketFactory;
use Cotacao\ApiClient;
use Cotacao\CLIRender;
use Cotacao\CLIArgs;
use Cotacao\FormatCurrency;

class Main {

	private $args;
	private $urlApi;
	private $tHeader;

	public function __construct($argv, $urlApi, $tHeader) 
	{
		$this->args = $argv;
		$this->urlApi = $urlApi;
		$this->tHeader = $tHeader;
	}

	public function renderHead($initMessage = null) 
	{
		CLIRender::printMessage($initMessage);
		CLIRender::printLoad();
		CLIRender::breakLine();
		CLIRender::printHeader($this->tHeader);
	}

	public function renderBody()
	{
		$cliArgs = new CLIArgs($this->args);
		$isoCurrency = FormatCurrency::isoCurrency($cliArgs->getArgs());

		foreach ($this->getMarkets() as $market) {
			$market = MarketFactory::create((array) $market);
			// Imprime somente as cotações de mercados especificados, em caso de ausência do Código ISO todas exchanges são impressas
			if ( $market->getCurrency() == $isoCurrency || FormatCurrency::isNotValidCode($isoCurrency) ) {
				$this->renderTableRow($market); 
			}
		}
		
		CLIRender::printLineSeparator();
		CLIRender::printBody();
	}

	public function getMarkets() 
	{
		$apiClient = new ApiClient($this->urlApi);
		return json_decode($apiClient->getData());
	}

	public function renderTableRow(Market $market) 
	{
		if ($market->getBid() && $market->getAsk()) {
			CLIRender::printLineSeparator();
			CLIRender::printLineData ([
				$market->getSymbol(), 
				FormatCurrency::toReal($market->getBid()), 
				FormatCurrency::toReal($market->getAsk()), 
				FormatCurrency::toReal($market->getAvg())
			]);
		}
	}

}