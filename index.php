<?php

spl_autoload_register(function ($className)
{
	$pathWay =__DIR__.'/libs/'. $className .'.php';	
	include($pathWay);	
});

require 'config/genel.php';
require 'config/database.php';

$boots = new boots;

?>