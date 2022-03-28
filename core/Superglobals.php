<?php
namespace core;

/**
 * Class SuperglobalsController
 * Permet de sécuriser les données
 */
abstract class Superglobals
{
	private $_GET;
	private $_POST;
	private $_SESSION;
	
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
		$this->_POST = (isset($_POST)) ? $_POST : null;
		$this->_SESSION = (isset($_SESSION)) ? $_SESSION : null;
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


	/**
	 * Retourne la valeur du _POST
	 * @param  string|null $key Paramètre que l'on souhaite
	 * @return string           Valeur que l'on souhaite
	 */
	public function get_POST(string $key = null)
	{
		if ($key !== null) {
			return (isset($this->_POST["$key"])) ? $this->_POST["$key"] : null;
		} else {
			return $this->_POST;
		}
	}


	/**
	 * Ajoute une nouvelle valeur à _SESSION
	 */
	public function set_SESSION($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * Retourne la valeur du _SESSION
	 * @param  string|null $key Paramètre que l'on souhaite
	 * @return string           Valeur que l'on souhaite
	 */
	public function get_SESSION(string $key = null)
	{
		if ($key !== null) {
			return (isset($this->_SESSION["$key"])) ? $this->_SESSION["$key"] : null;
		} else {
			return $this->_SESSION;
		}
	}
}