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
		$post = $this->get_SESSION('post');
		$errorContact = $this->get_SESSION('msgErrorContact');
		require 'view/front/home.php';
	}
}