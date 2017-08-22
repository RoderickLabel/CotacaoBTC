<?php 

namespace Cotacao;

use Cotacao\Market;

class MarketFactory {

	public static function create(Array $marketArr)
	{
		$market = new Market();	
		$market->setCurrency($marketArr['currency']);
		$market->setHigh($marketArr['high']);
		$market->setLatestTrade($marketArr['latestTrade']);
		$market->setWeightedPrice($marketArr['weightedPrice']);
		$market->setBid($marketArr['bid']);
		$market->setVolume($marketArr['volume']);
		$market->setAsk($marketArr['ask']);
		$market->setLow($marketArr['low']);
		$market->setDuration($marketArr['duration']);
		$market->setClose($marketArr['close']);
		$market->setAvg($marketArr['avg']);
		$market->setSymbol($marketArr['symbol']);
		$market->setCurrencyVolume($marketArr['currencyVolume']);
		return $market;
	}


}