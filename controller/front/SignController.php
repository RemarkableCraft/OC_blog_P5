<?php
namespace controller\front;

use controller\Controller;
use model\Model;

/**
 * Traitement de la page Connexion/Inscription.php et Déconnexion.php
 */
class SignController extends Controller
{
	
	/**
	 * Affiche la page de connexion / inscription
	 */
	public function sign()
	{
		$postUp = $this->get_SESSION('postUp');
		$postIn = $this->get_SESSION('postIn');
		$errorSignUp = $this->get_SESSION('msgErrorSignUp');
		$successSignUp = $this->get_SESSION('msgSuccessSignUp');
		require 'view/front/signInUp.php';
	}


	/**
	 * Traitement du formulaire d'inscription
	 */
	public function signUp()
	{
		$post = $this->get_POST();
		$session = $this->get_SESSION();

		if (isset($post) && $post['soumission'] === 'signUp') {
			$this->set_SESSION('postUp', $post);
			var_dump($_SESSION['postUp']);
			if (!empty($post['name']) && !empty($post['surname']) && !empty($post['pseudo1']) && !empty($post['email']) && !empty($post['password1']) && !empty($post['password2'])) {
				$name = $this->verif($post['name']);
				$surname = $this->verif($post['surname']);
				$pseudo = $this->verif($post['pseudo1']);

				$pseudoExist = new Model;
				$pseudoExist = $pseudoExist->select('role','user','pseudo','admin','','');
				var_dump($pseudoExist);

				if (filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
					$email = $this->verif($post['email']);
				} else {
					$this->set_SESSION('msgErrorSignUp', "Ton mail n'est pas correct");
					header('Location: ?action=sign');
					die();
				}

				$uppercase = preg_match('@[A-Z]@', $post['password1']);
				$lowercase = preg_match('@[a-z]@', $post['password1']);
				$number = preg_match('@[0-9]@', $post['password1']);
				$specialChars = preg_match('@[^\w]@', $post['password1']);
				if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($post['password1']) < 8) {
					$this->set_SESSION('msgErrorSignUp', "Ton mot de passe n'est pas correct");
					header('Location: ?action=sign');
					die();
				} else {
					if ($post['password1'] === $post['password2']) {
						$password = password_hash($post['password1'], PASSWORD_DEFAULT);
					} else {
						$this->set_SESSION('msgErrorSignUp', "Ton mot de passe et la confirmation de mot de passe ne sont pas identiques.");
						header('Location: ?action=sign');
						die();
					}
				}

				if (!isset($session['msgErrorSignUp'])) {
					$token = bin2hex(random_bytes(10));
					$code = $token[15].$token[2].$token[16].$token[1].$token[8].$token[10];
				}
			} else {
				$this->set_SESSION('msgErrorSignUp', 'Certains champs ne sont pas remplis');
				header('Location: ?action=sign');
				die();
			}
		} else {
			$this->set_SESSION('msgErrorSignUp', 'Certains champs ne sont pas remplis');
			header('Location: ?action=sign');
			die();
		}
	}

  function verif($value)
	{
		$verif = htmlentities($value);
		$verif = trim($verif);
		return $verif;
	}
}