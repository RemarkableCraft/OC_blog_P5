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
			$posts = $posts->select('*','post','','','createDatePost DESC','');

			$comments = new Model;
			$comments = $comments->select('*','comment','statusComment','1','createDateComment DESC','');
			$comment = $comments->fetch();

			require 'view/admin/dashboard.php';
		} else {
			http_response_code(404);
			die;
		}
	}


	/**
	 * affiche le formulaire de création d'article
	 */
	public function createPost()
	{
		echo "create";
	}


	/**
	 * affiche le formulaire de modification d'article
	 */
	public function editPost()
	{
		echo "edit";
	}


	/**
	 * supprime le post en question
	 */
	public function deletePost()
	{
		echo "delete";
	}
}