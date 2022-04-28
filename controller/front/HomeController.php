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
		$session = $this->get_SESSION();
		
		$posts = new Model;
		$posts = $posts->select('*','post','','','createDatePost DESC','6');

		$errorContact = $this->get_SESSION('msgErrorContact');
		$successContact = $this->get_SESSION('msgSuccessContact');

		$success = $this->get_SESSION('msgSuccess');
		$error = $this->get_SESSION('msgError');
		require 'view/front/home.php';
	}
}