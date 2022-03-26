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

use controller\{SuperglobalsController, controller};
use controller\front\{HomeController, SignController, BlogController};


$get = new SuperglobalsController;
$get = $get->get_GET();

if (isset($get['action'])) {
	switch ($get['action']) {
		case 'home':
			$home = new HomeController;
			$home->get_home();
			break;

		case 'sign':
			$sign = new SignController;
			$sign->get_sign();
			break;

		case 'blog':
			$blog = new BlogController;
			$blog->get_blog();
			break;

		case 'post':
			$post = new BlogController;
			$post->get_post();
			break;
		
		default:
			http_response_code(404);
			break;
	}
} else {
	$home = new HomeController;
	$home->get_home();
}
	