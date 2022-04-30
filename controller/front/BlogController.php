<?php
namespace controller\front;

use controller\Controller;
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
		$posts = $posts->select('*','post','',[],'createDatePost DESC','');

		require 'view/front/blog.php';
	}


	/**
	 * Affiche la page post.php
	 */
	public function post()
	{
		$session = $this->get_SESSION();
		$success = $this->get_SESSION('msgSuccess');
		$error = $this->get_SESSION('msgError');
		$idPost = [$this->get_GET('id')];

		$post = new Model;
		$post = $post->select('*','post','idPost',$idPost,'','');
		$post = $post->fetch();

		$valueCommentValidate = [$this->get_GET('id'),'0'];
		$commentsValidate = new Model;
		$commentsValidate = $commentsValidate->select('*','comment','postComment = ? AND statusComment',$valueCommentValidate,'createDateComment DESC','');

		$nbrComment = new Model;
		$nbrComment = $nbrComment->select('*','comment','postComment = ? AND statusComment',$valueCommentValidate,'','');
		$nbrComment = $nbrComment->rowCount();

		$valueCommentNovalidate = [$this->get_GET('id'),'1'];
		$commentsNovalidate = new Model;
		$commentsNovalidate = $commentsNovalidate->select('*','comment','postComment = ? AND statusComment',$valueCommentNovalidate,'createDateComment DESC','');

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