<?php
namespace controller;

/**
 * Class SuperglobalsController
 * Permet de sécuriser les données
 */
class SuperglobalsController
{
	private $_GET;
	
	function __construct()
	{
		$this->define_superglobals();
	}

	/**
	 * Récupere les valeurs des GLOBALS
	 */
	private function define_superglobals()
	{
		$this->_GET = (isset($_GET)) ? $_GET : null;
	}

	/**
	 * Retourne la valeur du _GET
	 * @param  string|null $key Paramètre que l'on souhaite
	 * @return string           Valeur que l'on souhaite
	 */
	public function get_GET(string $key = null)
	{
		if ($key !== null) {
			return (isset($this->_GET["$key"])) ? $this->_GET["$key"] : null;
		} else {
			return $this->_GET;
		}
	}
}