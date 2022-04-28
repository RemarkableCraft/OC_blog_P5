<?php
namespace controller\front;

use controller\controller;
use model\Model;

/**
 * 
 */
class CommentController extends Controller
{
	/**
	 * traitement du formulaire des commentaire
	 */
	public function comment()
	{
		$comment = $this->get_POST();
		var_dump($comment);
		if (isset($comment['soumission']) && !empty($comment['post']) && !empty($comment['autor']) && !empty($comment['message'])) {
			$this->set_SESSION('comment', $comment);

			$contentComment = $this->verif($comment['message']);

			$value = [$contentComment,$comment['autor'],$comment['post']];

			$newComment = new Model;
			$newComment = $newComment->insert('comment', $value);
			if ($newComment === true) {
				$lien = $this->get_SERVER('HTTP_REFERER');
				$this->set_SESSION('msgSuccess', 'Votre message est bien enregistré, et est en attente de validation.');
				header('Location: '.$lien);
				die;
			} else {
				$lien = $this->get_SERVER('HTTP_REFERER');
				$this->set_SESSION('msgError', 'Votre commentaire ne sait pas enregistré.<br>Veuillez recommencer.');
				header('Location: '.$lien);
				die;
			}
		} else {
			$lien = $this->get_SERVER('HTTP_REFERER');
			$this->set_SESSION('msgError', 'Erreur champ vide.');
			header('Location: '.$lien);
			die;
		}
	}


	/**
	 * validation des commentaires par l'admin
	 */
	public function validComment()
	{
		$idComment = $this->get_GET('id');

		$comment = new Model;
		$comment = $comment->select('*','comment','idComment',$idComment,'','');
		$comment = $comment->fetch();

		if ($comment !== false) {
			$validComment = new Model;
			$validComment = $validComment->update('comment','statusComment=\'0\'','idComment',$idComment);
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


  function verif($value)
	{
		$verif = htmlentities($value);
		$verif = trim($verif);
		return $verif;
	}
}