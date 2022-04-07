<?php
namespace controller\front;

use controller\controller;

/**
 * Traitement de la page home.php
 */
class HomeController extends Controller
{
	
	public function home()
	{
		$post = $this->get_SESSION('post');
		$errorContact = $this->get_SESSION('msgErrorContact');
		$successContact = $this->get_SESSION('msgSuccessContact');
		require 'view/front/home.php';
	}
}