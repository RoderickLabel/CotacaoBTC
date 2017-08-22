<?php 
function autoload ($classname) {
	include("src/" . $classname . ".php");
}
spl_autoload_register("autoload");