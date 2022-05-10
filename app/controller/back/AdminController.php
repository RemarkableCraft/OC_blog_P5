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
			$success = $this->get_SESSION('msgSuccess');
			$error = $this->get_SESSION('msgError');

			$posts = new Model;
			$posts = $posts->select('*','post','',[],'createDatePost DESC','');

			$comments = new Model;
			$comments = $comments->select('*','comment','statusComment',['1'],'createDateComment DESC','');

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
		$user = $this->get_SESSION('user');

		if (isset($user) && !empty($user) && $user['role'] === 'admin') {
			$POST = $this->get_SESSION('editPost');
			$error = $this->get_SESSION('msgError');
			$success = $this->get_SESSION('msgSuccess');

			require 'view/admin/create-editPost.php';
		} else {
			http_response_code(404);
			die;
		}
	}


	/**
	 * Traitement du formulaire de création d'article
	 */
	public function addPost()
	{
		$POST = $this->get_POST();

		if (isset($POST) && !empty($POST['titlePost']) && !empty($POST['chapoPost']) && !empty($POST['contentPost']) && !empty($POST['imagePost'])) {
			$titlePost = $this->verif($POST['titlePost']);
			$chapoPost = $this->verif($POST['chapoPost']);
			$contentPost = $this->verif($POST['contentPost']);
			$imagePost = $this->verif($POST['imagePost']);
			$user = $this->get_SESSION('user');
			$autorPost = $user['idUser'];
			$value = [$titlePost,$chapoPost,$contentPost,$imagePost,$autorPost];

			$addPost = new Model;
			$addPost = $addPost->insert('post', $value);

			if ($addPost === true) {
				$this->unset_SESSION(['editPost']);
				$this->set_SESSION('msgSuccess','L\'article à bien été enregistré.');

				header('Location: ?action=createPost');
				die;
			} else {
				$this->set_SESSION('editPost', $POST);
				$this->set_SESSION('msgError','Problème avec l\'enregistrement de l\'article.');

				header('Location: ?action=createPost');
				die;
			}
		} else {
			$this->set_SESSION('editPost', $POST);
			$this->set_SESSION('msgError','Veuillez remplir tous les champs du formulaire.');

			header('Location: ?action=createPost');
			die;
		}
	}


	/**
	 * affiche le formulaire de modification d'article
	 */
	public function editPost()
	{
		$session = $this->get_SESSION();
		$idPost = [$this->get_GET('id')];
		$POST = $this->get_SESSION('updatePost');
		$user = $this->get_SESSION('user');

		if (isset($user) && !empty($user) && $user['role'] === 'admin') {
			$POST = $this->get_SESSION('editPost');
			$error = $this->get_SESSION('msgError');
			$success = $this->get_SESSION('msgSuccess');

			$post = new Model;
			$post = $post->select('*','post','idPost',$idPost,'','');
			$post = $post->fetch();

			require 'view/admin/create-editPost.php';
		} else {
			http_response_code(404);
			die;
		}
	}


	/**
	 * traitement du formulaire de modification d'article
	 */
	public function updatePost()
	{
		$POST = $this->get_POST();
		$idPost = $this->get_GET('id');

		if (isset($POST) && !empty($POST['titlePost']) && !empty($POST['chapoPost']) && !empty($POST['contentPost']) && !empty($POST['imagePost'])) {
			$titlePost = $this->verif($POST['titlePost']);
			$chapoPost = $this->verif($POST['chapoPost']);
			$contentPost = $this->verif($POST['contentPost']);
			$imagePost = $this->verif($POST['imagePost']);
			$user = $this->get_SESSION('user');
			$autorPost = $user['idUser'];
			$set = 'titlePost="'.$titlePost.'", chapoPost="'.$chapoPost.'", contentPost="'.$contentPost.'", imagePost="'.$imagePost.'", autorPost="'.$autorPost.'", updateDatePost=NOW()';

			$updatePost = new Model;
			$updatePost = $updatePost->update('post',$set,'idPost',[$idPost]);

			if ($updatePost !== false) {
				$this->unset_SESSION(['updatePost']);
				$this->set_SESSION('msgSuccess','Article modifié.');

				header('Location: ?action=editPost&id='.$idPost);
				die;
			} else {
				$this->set_SESSION('updatePost', $POST);
				$this->set_SESSION('msgError','Article non modifié.');

				header('Location: ?action=editPost&id='.$idPost);
				die;
			}
		} else {
			$this->set_SESSION('updatePost', $POST);
			$this->set_SESSION('msgError','Veuillez remplir tous les champs du formulaire.');

			header('Location: ?action=editPost&id='.$idPost);
			die;
		}
	}


	/**
	 * supprime le post en question
	 */
	public function deletePost()
	{
		$idPost = $this->get_GET('id');

		$deletePost = new Model;
		$deletePost = $deletePost->delete('post','idPost',[$idPost]);

		if ($deletePost === true) {
			$this->set_SESSION('msgSuccess','Article supprimé');

			header('Location: ?action=admin');
			die;
		} else {
			$this->set_SESSION('msgError','Problème à la suppression de l\'article');

			header('Location: ?action=admin');
			die;
		}
	}


	/**
	 * validation des commentaires par l'admin
	 */
	public function validComment()
	{
		$idComment = [$this->get_GET('id')];

		$comment = new Model;
		$comment = $comment->select('*','comment','idComment',$idComment,'','');
		$comment = $comment->fetch();

		if ($comment !== false) {
			$idComment = $this->get_GET('id');

			$validComment = new Model;
			$validComment = $validComment->update('comment','statusComment=\'0\'','idComment',[$idComment]);

			if ($validComment !== false) {
				$lien = $this->get_SERVER('HTTP_REFERER');
				$this->set_SESSION('msgSuccess','Le commentaire à bien été validé.');

				header('Location: '.$lien);
				die;
			} else {
				$lien = $this->get_SERVER('HTTP_REFERER');
				$this->set_SESSION('msgError','Problème, le commentaire n\'a pas été validé.');

				header('Location: '.$lien);
				die;
			}
		} else {
			http_response_code(404);
			die;
		}
	}


	private function verif($value)
	{
		$verif = htmlentities($value);
		$verif = trim($verif);

		return $verif;
	}
}