<?php 

namespace Cotacao;

class FormatCurrency {
	public static function toReal($number) 
	{
		if ($number > 0) {
			return '$ ' . number_format($number, 2, ',', '.');
		} else {
			return str_pad("--", 12, " ", STR_PAD_BOTH);
		}
	}
}