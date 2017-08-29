<?php 

namespace Cotacao;

class CurrencyCode {	

	/**
	 * Retorna true se código iso de moedas for inválido
	 * @return boolean
	 */
	public function isNotValidCode(array $queryResult)
	{
		return !(count($queryResult) > 0);
	}

}