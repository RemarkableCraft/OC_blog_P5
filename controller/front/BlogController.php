<?php
namespace controller\front;

use controller\controller;
use model\Model;

/**
 * Traitement de la page blog.php & post-view.php
 */
class BlogController extends Controller
{
	
	/**
	 * Affiche la page blog.php
	 */
	public function blog()
	{
		$session = $this->get_SESSION();

		$posts = new Model;
		$posts = $posts->select('*','post','','','createDatePost DESC','');
		require 'view/front/blog.php';
	}

	/**
	 * Affiche la page post.php
	 */
	public function post()
	{
		$session = $this->get_SESSION();

		$get = $this->get_GET();
		$idPost = $get['id'];

		$post = new Model;
		$post = $post->select('*','post','idPost',$idPost,'','');
		$post = $post->fetch();

		$comments = new Model;
		$comments = $comments->select('*','comment','postComment',$idPost,'createDateComment DESC','');

		//$nbrComment = $comments->rowCount();

		if ($post !== false) {
			$errorComment = $this->get_SESSION('msgErrorComment');
			$successComment = $this->get_SESSION('msgSuccessComment');
			require 'view/front/post-view.php';
		} else {
			http_response_code(404);
			die;
		}
	}
}