<?php 

namespace Cotacao;

/**
 * VO classe PHP Bean para Mercado ou Exchange
 */
class Market {


	/**
	 * @var float currency
	 */
	private $currency;

	/**
	 * @var float high
	 */	
	private $high;	

	/**
	 * @var float latestTrade
	 */	
	private $latestTrade;	

	/**
	 * @var float weightedPrice
	 */	
	private $weightedPrice;	

	/**
	 * @var float bid
	 */	
	private $bid;	

	/**
	 * @var float volume
	 */	
	private $volume;	

	/**
	 * @var float ask
	 */	
	private $ask;	

	/**
	 * @var float low
	 */	
	private $low;	

	/**
	 * @var float duration
	 */	
	private $duration;	

	/**
	 * @var float close
	 */	
	private $close;	

	/**
	 * @var float avg
	 */	
	private $avg;	

	/**
	 * @var float symbol
	 */	
	private $symbol;	

	/**
	 * @var float currencyVolume
	 */	
	private $currencyVolume;

	public function getCurrency() 
	{
		return $this->currency;
	}

	public function setCurrency($currency) 
	{
		$this->currency = $currency;
	}

	public function getHigh() {
		return $this->high;
	}

	public function setHigh($high) 
	{
		$this->high = $high;
	}

	public function getLatestTrade() {
		return $this->latestTrade;
	}

	public function setLatestTrade($latestTrade) 
	{
		$this->latestTrade = $latestTrade;
	}

	public function getWeightedPrice() {
		return $this->weightedPrice;
	}

	public function setWeightedPrice($weightedPrice) 
	{
		$this->weightedPrice = $weightedPrice;
	}

	public function getBid() {
		return $this->bid;
	}

	public function setBid($bid) 
	{
		$this->bid = $bid;
	}

	public function getVolume() {
		return $this->volume;
	}

	public function setVolume($volume) 
	{
		$this->volume = $volume;
	}

	public function getAsk() {
		return $this->ask;
	}

	public function setAsk($ask) 
	{
		$this->ask = $ask;
	}

	public function getLow() {
		return $this->low;
	}

	public function setLow($low) 
	{
		$this->low = $low;
	}

	public function getDuration() {
		return $this->duration;
	}

	public function setDuration($duration) 
	{
		$this->duration = $duration;
	}

	public function getClose() {
		return $this->close;
	}

	public function setClose($close) 
	{
		$this->close = $close;
	}

	public function getAvg() {
		return $this->avg;
	}

	public function setAvg($avg) 
	{
		$this->avg = $avg;
	}

	public function getSymbol() {
		return $this->symbol;
	}

	public function setSymbol($symbol) 
	{
		$this->symbol = $symbol;
	}

	public function getCurrencyVolume() 
	{
		return $this->currencyVolume;
	}

	public function setCurrencyVolume($currencyVolume) 
	{
		$this->currencyVolume = $currencyVolume;
	}

}