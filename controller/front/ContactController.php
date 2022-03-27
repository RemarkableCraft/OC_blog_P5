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
			$post = ['name' => $post['name'], 'email' => $post['email'], 'message' => $post['message']];

			$this->set_SESSION('post', $post);
			header('Location: ?action=home#contact');
		} else {
			$this->set_SESSION("msgErrorContact", "Le formulaire est vide");
			header('Location: ?action=home#contact');
			die;
		}
	}
}