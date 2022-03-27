<?php
session_start();

/**
 * Inclue le fichier correspondant à la classe instancié.
 */
function autoload($class)
{
	require_once $class . '.php';
}
spl_autoload_register('autoload');

use routeur\Route;

new Route;
	