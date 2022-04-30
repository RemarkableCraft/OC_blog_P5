<?php
session_start();

use routeur\Route;

/**
 * Inclue le fichier correspondant à la classe instancié.
 */
function autoload($class)
{
	require_once $class.'.php';
}
spl_autoload_register('autoload');

$route = new Route;
$route->router();