<?php 

namespace Cotacao;

class Market {

	private $currency;
	private $high;	
	private $latestTrade;	
	private $weightedPrice;	
	private $bid;	
	private $volume;	
	private $ask;	
	private $low;	
	private $duration;	
	private $close;	
	private $avg;	
	private $symbol;	
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