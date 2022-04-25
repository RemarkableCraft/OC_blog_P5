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
		$session = $this->get_SESSION();
		$POST = $this->get_POST();
		require 'view/admin/create-editPost.php';
	}


	/**
	 * affiche le formulaire de modification d'article
	 */
	public function editPost()
	{
		$session = $this->get_SESSION();
		$idPost = $this->get_GET('id');

		$post = new Model;
		$post = $post->select('*','post','idPost',$idPost,'','');
		$post = $post->fetch();
		require 'view/admin/create-editPost.php';
	}


	/**
	 * supprime le post en question
	 */
	public function deletePost()
	{
		echo "delete";
	}
}