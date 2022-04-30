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
	 * traitement du formulaire des commentaires
	 */
	public function comment()
	{
		$comment = $this->get_POST();

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


	function verif($value)
	{
		$verif = htmlentities($value);
		$verif = trim($verif);
		return $verif;
	}
}