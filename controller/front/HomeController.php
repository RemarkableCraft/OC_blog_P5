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
		$posts = $posts->select('*','post','',[],'createDatePost DESC','6');

		$success = $this->get_SESSION('msgSuccess');
		$error = $this->get_SESSION('msgError');

		require 'view/front/home.php';
	}
}