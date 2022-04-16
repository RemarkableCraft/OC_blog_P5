<?php
namespace controller\back;

use controller\Controller;
use model\Model;

/**
 * Traitement de la page admin
 */
class AdminController extends Controller
{
	/**
	 * affiche la page d'administration du site
	 */
	public function admin()
	{
		$session = $this->get_SESSION();

		if (isset($session['user']) && !empty($session['user']) && $session['user']['role'] === 'admin') {
			$posts = new Model;
			$posts = $posts->select('*','post','','','createDatePost ASC','');

			require 'view/admin/dashboard.php';
		} else {
			http_response_code(404);
			die;
		}
	}
}