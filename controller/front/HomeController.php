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
		$errorContact = $this->get_SESSION('msgErrorContact');
		$successContact = $this->get_SESSION('msgSuccessContact');
		$successSignIn = $this->get_SESSION('msgSuccessSignIn');
		require 'view/front/home.php';
	}
}