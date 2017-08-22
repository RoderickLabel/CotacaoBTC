<?php 

namespace Cotacao;

class CLIArgs {

	private $args = [];

	public function __construct($args)
	{
		$this->setArgs($args);
	}

	public function setArgs($args)
	{
		foreach ($args as $arg) {
        	$e = explode("=", $arg);
	        if(count($e) == 2) {

	            $this->args[$e[0]] = $e[1];
	        } else {	        	
	            $this->args = $e[0];
	        }
	    }
	}

	public function getArgs()
	{
		return $this->args;
	}

	public function getLengthArg()
	{
		return $this->args;
	}

}