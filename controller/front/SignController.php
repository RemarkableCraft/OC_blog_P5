<?php
namespace controller\front;

use controller\controller;

/**
 * Traitement de la page Connexion/Inscription.php et Déconnexion.php
 */
class SignController extends Controller
{
	
	public function get_sign()
	{
		require 'view/front/signInUp.php';
	}
}