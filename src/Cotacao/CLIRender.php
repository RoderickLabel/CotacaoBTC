<?php 

namespace Cotacao;

class CLIRender {

	public static function printMessage($message)
	{
		printf("%s $message %s %s", PHP_EOL, PHP_EOL, PHP_EOL);	
	}

	public static function printLoad()
	{
		for ($i = 0; $i <= 100; $i++) {
		    print " Carregando... {$i}%\r";
		    usleep(10000);
		}			
	}

	public static function breakLine()
	{
		printf("%s", PHP_EOL);
	}

	public static function printLineSeparator($cols)
	{
		printf("%s %s", str_pad("", $cols, "-"), PHP_EOL);
	}

	public static function printHeader(array $titles)
	{
		ob_start();
		self::printLineSeparator(89);
		$strOut = "| ";
		foreach ($titles as $title) {
			$strOut .= str_pad($title, 19, " ") . " | ";
		}
		print($strOut . PHP_EOL);
		
	}

	public static function printLineData(array $columns)
	{
		$strOut = "| ";
		foreach ($columns as $column) {
			$strOut .= str_pad($column, 19, " ") . " | ";
		}
		print($strOut . PHP_EOL);
	}

	public static function printBody()
	{
		ob_end_flush();
	}

}