<?php
namespace controller\front;

use core\Superglobals;
use controller\controller;

/**
 * Traitement du formulaire de contact
 */
class ContactController extends Controller
{
	/**
	 * Récupère et traite les données du formulaire de contact,
	 * pour ensuite envoyer le tous par mail
	 */
	public function contact()
	{
		$post = $this->get_POST();

		if (isset($post) && !empty($post)) {
			$this->set_SESSION('post', $post);

			// vérification champ par champ s'ils sont remplis
			if (empty($post['name'])) {
				$this->set_SESSION("msgError", "Le nom est vide");

				header('Location: ?action=home#contact');
				die;
			}

			if (empty($post['email'])) {
				$this->set_SESSION("msgError", "Le mail est vide");

				header('Location: ?action=home#contact');
				die;
			}

			if (empty($post['message'])) {
				$this->set_SESSION("msgError", "Le message est vide");

				header('Location: ?action=home#contact');
				die;
			}

			// tous est bon
			$msgError = $this->get_SESSION('msgErrorContact');

			if (!isset($msgError)) {
				$name = $this->verif($post['name']);
				$email = $this->verif($post['email']);
				$content = $this->verif($post['message']);
				$to = 'masseestelle@gmail.com';
				$subject = 'Nouveau message';
				$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
					<html xmlns:v="urn:schemas-microsoft-com:vml">
					<head>
						<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
						<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

						<title>Vous avez un nouveau message</title>
					</head>
					<body>
						<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#eee" style="font-family: sans-serif;">
							<thead style="text-align: center;">
								<tr style="height: 5vh;"></tr>
								<tr>
									<td width="10%"></td>
									<td colspan="2" bgcolor="#8FBC8B" style="padding: 10px; color: #fff; font-weight: bold; font-size: 25px; border-radius: 20px 20px 0 0;">Nouveau message</td>
									<td width="10%"></td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td width="10%"></td>
									<td colspan="2" bgcolor="#fff" style="padding: 5px 20px; font-size: 18px;"><strong>De :</strong> '.$name.'</td>
									<td width="10%"></td>
								</tr>
								<tr style="height: 5px;"></tr>
								<tr>
									<td width="10%"></td>
									<td colspan="2" bgcolor="#fff" style="padding: 30px 20px; font-size: 18px;">'.nl2br($content).'</td>
									<td width="10%"></td>
								</tr>
							</tbody>

							<tfoot>
								<tr>
									<td width="10%"></td>
									<td bgcolor="#D5E6D4" style="color: #808080; text-align: right; font-size: 10px; padding: 0 10px;">'.$email.'</td>
									<td bgcolor="#6B8D68" width="150px" style="color: #fff; font-size: 20px; font-weight: bold; text-align: center; padding: 10px 0;"><a href="mailto:'.$email.'" style="color: inherit; text-decoration: none;">REPONDRE</a></td>
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
					$this->unset_SESSION(['post']);
					$this->set_SESSION("msgSuccess", "Votre mail est bien partie");

					header('Location: ?action=home#contact');
					die;
				} else {
					$this->set_SESSION("msgError", "Problème avec l'envoi du message, veuillez recommencer");

					header('Location: ?action=home#contact');
					die;
				}
			}
		} else {
			$this->set_SESSION("msgError", "Le formulaire est vide");

			header('Location: ?action=home#contact');
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