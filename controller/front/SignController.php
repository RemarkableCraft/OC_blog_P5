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
		$session = $this->get_SESSION();
		if (isset($session['user']) && !empty($session['user'])) {
			header('Location: ?action=home');
			die;
		} else {
			$postUp = $this->get_SESSION('postUp');
			$postIn = $this->get_SESSION('postIn');
			$errorSignUp = $this->get_SESSION('msgErrorSignUp');
			$successSignUp = $this->get_SESSION('msgSuccessSignUp');
			$errorSignIn = $this->get_SESSION('msgErrorSignIn');
			$successSignIn = $this->get_SESSION('msgSuccessSignIn');
			require 'view/front/signInUp.php';
		}
	}


	/**
	 * Traitement du formulaire d'inscription
	 */
	public function signUp()
	{
		$post = $this->get_POST();
		$session = $this->get_SESSION();
		$server = $this->get_SERVER();

		if (isset($post) && $post['soumission'] === 'signUp') {
			$this->set_SESSION('postUp', $post);
			if (!empty($post['name']) && !empty($post['surname']) && !empty($post['pseudo1']) && !empty($post['email']) && !empty($post['password1']) && !empty($post['password2'])) {
				// name
				$name = $this->verif($post['name']);

				// surname
				$surname = $this->verif($post['surname']);

				// pseudo
				$pseudo = $this->verif($post['pseudo1']);

				$pseudoExist = new Model;
				$pseudoExist = $pseudoExist->select('pseudo','user','pseudo',$pseudo,'','');
				$pseudoExist = $pseudoExist->fetch();

				if ($pseudoExist !== false) {
					$this->set_SESSION('msgErrorSignUp', "Ce pseudo existe déjà, trouve en un autre.<br><em>Astuce ajoute des chiffres à la fin.</em>");
					header('Location: ?action=sign');
					die;
				}
				
				// email
				if (filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
					$email = $this->verif($post['email']);

					$emailExist = new Model;
					$emailExist = $emailExist->select('email','user','email',$email,'','');
					$emailExist = $emailExist->fetch();

					if ($emailExist !== false) {
						$this->set_SESSION('msgErrorSignUp', "Cet email est déjà pris.<br><em>Avez-vous déjà créé un compte?</em>");
						header('Location: ?action=sign');
						die;
					}
				} else {
					$this->set_SESSION('msgErrorSignUp', "Ton mail n'est pas correct");
					header('Location: ?action=sign');
					die();
				}

				// password
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

				// enregistrement dans la BDD
				if (!isset($session['msgErrorSignUp'])) {
					$token = bin2hex(random_bytes(10));
					$code = $token[15].$token[2].$token[16].$token[1].$token[8].$token[10];

					$value = $name.','.$surname.','.$pseudo.','.$email.','.$password.','.$token;
					$newUser = new Model;
					$newUser = $newUser->insert('user', $value);

					$lien = $server['HTTP_ORIGIN'].$server['PHP_SELF'].'?action=valid&token='.$token.'&pseudo='.$pseudo;

					if ($newUser === true) {
						$to = $email;
						$subject = 'Valider votre inscription.';
						$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
							<html xmlns:v="urn:schemas-microsoft-com:vml">
							<head>
								<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
								<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

								<title>Validez votre inscription</title>
							</head>
							<body>
								<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#eee" style="font-family: sans-serif;">
									<thead style="text-align: center;">
										<tr style="height: 5vh;"></tr>
										<tr>
											<td width="10%"></td>
											<td bgcolor="#8FBC8B" style="padding: 10px; color: #fff; font-weight: bold; font-size: 25px; border-radius: 20Px 20Px 0 0;">Valider votre inscription</td>
											<td width="10%"></td>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td width="10%"></td>
											<td bgcolor="#fff" style="padding: 20px; font-size: 18px;">Bonjour '.$pseudo.'<br><br>Pour finaliser la création de votre compte, il faut le valider.<br>Cliquez ici</td>
											<td width="10%"></td>
										</tr>
										<tr>
											<td width="10%"></td>
											<td bgcolor="#fff" style="padding: 20px; font-size: 18px; text-align: center;">
												<a href="'.$lien.'" style="text-decoration: none; padding: 20px 50px; background: #8FBC8D; border-radius: 50px; color: #fff; font-weight: bold; font-size: 20px;">Valider mon compte</a>
											</td>
											<td width="10%"></td>
										</tr>
										<tr>
											<td width="10%"></td>
											<td bgcolor="#fff" style="padding: 20px; font-size: 18px;">Et entrez le code suivant: <strong style="font-size: 20px;">'.$code.'</strong></td>
											<td width="10%"></td>
										</tr>
									</tbody>

									<tfoot>
										<tr>
											<td width="10%"></td>
											<td bgcolor="#D5E6D4" style="padding: 10px; font-size: 25px; border-radius: 0 0 20px 20px;">&nbsp</td>
											<td width="10%"></td>
										</tr>
										<tr style="height: 5vh;"></tr>
									</tfoot>
								</table>
							</body>
							</html>';
						$headers = "MIME-Version: 1.0\n";
						$headers .= "From : ".$email."\n";
						$headers .= "X-Priority : 1\n";
						$headers .= "Content-type: text/html; charset=utf-8\n";
						$headers .= "Content-Transfer-Encoding: 8bit\n";

						if (mail($to, $subject, $message, $headers)) {
							unset($_SESSION['postUp']);
							$this->set_SESSION('msgSuccessSignUp', 'Votre compte est bien enregistré.<br>Vous allez recevoir un mail pour valider votre compte.');
							header('Location: ?action=sign');
							die;
						} else {
							$this->set_SESSION('msgErrorSignUp', 'Le mail de validation n\'a pu être envoyer. Contactez le site.');
						}
					} else {
						$this->set_SESSION('msgErrorSignUp', 'Une erreur est survenue lors de votre inscription.');
						header('Location: ?action=sign');
						die;
					}
				}
			} else {
				$this->set_SESSION('msgErrorSignUp', 'Certains champs ne sont pas remplis');
				header('Location: ?action=sign');
				die();
			}
		}
	}


	/**
	 * Affiche la page de validation
	 */
	public function valid()
	{
		$token = $this->get_GET('token');
		$user = $this->get_GET('pseudo');
		$errorValid = $this->get_SESSION('msgErrorValid');
		$successValid = $this->get_SESSION('msgSuccessValid');
		require 'view/front/validSignUp.php';
	}


	/**
	 * Traitement du formulaire de validation
	 */
	public function confirm()
	{
		$post = $this->get_POST();
		$server = $this->get_SERVER();
		$session = $this->get_SESSION();

		if (empty($session['msgErrorValid'])) {
			if (isset($post) && $post['soumission'] === 'valid') {
				$token = $post['token'];
				$verifCode = $token[15].$token[2].$token[16].$token[1].$token[8].$token[10];

				if ($verifCode === $post['code']) {

					$verifToken = new Model;
					$verifToken = $verifToken->select('pseudo','user','token',$token,'','');
					$verifToken = $verifToken->fetch();

					if ($verifToken) {
						if ($verifToken['pseudo'] === $post['user']) {
							$pseudo = $post['user'];

							$validCompte = new Model;
							$validCompte = $validCompte->update('user','validateDate=NOW(),token=NULL','pseudo',$pseudo);

							if ($validCompte !== false) {
								$this->set_SESSION('msgSuccessValid', 'Votre compte est validé.');
								header('Location: '.$server['HTTP_REFERER']);
								die;
							} else {
								$this->set_SESSION('msgErrorValid', 'Problème lors de la validation de votre compte.');
								header('Location: '.$server['HTTP_REFERER']);
								die;
							}
						} else {
							http_response_code(404);
							header('Location: ?action=404');
							die;
						}
					} else {
						http_response_code(404);
						header('Location: ?action=404');
						die;
					}
				} else {
					$this->set_SESSION('msgErrorValid', 'Ce n\'est pas le bon code');
					header('Location: '.$server['HTTP_REFERER']);
					die;
				}
			}
		} else {
			$token = $this->get_GET('token');
			$user = $this->get_GET('pseudo');
			$errorValid = $this->get_SESSION('msgErrorValid');
			$successValid = $this->get_SESSION('msgSuccessValid');
			require 'view/front/validSignUp.php';
		}
	}


	/**
	 * Traitement du formulaire de connexion
	 */
	public function signIn()
	{
		$post = $this->get_POST();

		if (isset($post) && $post['soumission'] === 'signIn') {
			$this->set_SESSION('postIn', $post);

			if (!empty($post['pseudo']) && !empty($post['password'])) {
				$pseudo = $post['pseudo'];
				$password = $post['password'];

				$user = new Model;
				$user = $user->select('*','user','pseudo',$pseudo,'','');
				$user = $user->fetch();

				if ($user !== false) {
					if ($user['token'] === NULL) {
						if (password_verify($password, $user['password'])) {
							unset($_SESSION['postIn']);
							$this->set_SESSION('user',$user);
							$this->set_SESSION('msgSuccessSignIn','Vous êtes connecté.');
							header('Location: ?action=home');
							die;
						} else {
							$this->set_SESSION('msgErrorSignIn','Le mot de passe est incorrect.');
							header('Location: ?action=sign');
							die;
						}
					} else {
						$this->set_SESSION('msgErrorSignIn','Ce compte est en attente de validation');
						header('Location: ?action=sign');
						die;
					}
				} else {
					$this->set_SESSION('msgErrorSignIn','Ce compte n\'existe pas.');
					header('Location: ?action=sign');
					die;
				}
			} else {
				$this->set_SESSION('msgErrorSignIn', 'Certain champ ne sont pas remplis.');
				header('Location: ?action=sign');
				die;
			}
		}
	}


	/**
	 * Traitement de la déconnexion
	 */
	public function signOut()
	{
		unset($_SESSION['user']);
		$this->set_SESSION('msgSuccessSignIn','Vous êtes déconnecté.');
		header('Location: ?action=home');
		die;
	}


  function verif($value)
	{
		$verif = htmlentities($value);
		$verif = trim($verif);
		return $verif;
	}
}