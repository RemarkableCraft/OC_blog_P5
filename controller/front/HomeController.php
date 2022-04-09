<?php
namespace controller\front;

use controller\controller;
use model\Model;

/**
 * Traitement de la page home.php
 */
class HomeController extends Controller
{
	/**
	 * affiche la page home
	 */
	public function home()
	{
		$posts = new Model;
		$posts = $posts->select('*','post','','','createDatePost DESC','6');

		$errorContact = $this->get_SESSION('msgErrorContact');
		$successContact = $this->get_SESSION('msgSuccessContact');

		$successSignIn = $this->get_SESSION('msgSuccessSignIn');
		require 'view/front/home.php';
	}
}