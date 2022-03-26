<?php
namespace controller\front;

use controller\controller;

/**
 * Traitement de la page home.php
 */
class HomeController extends Controller
{
	
	public function get_home()
	{
		require 'view/front/home.php';
	}
}