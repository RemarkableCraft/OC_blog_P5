<?php
namespace model;

/**
 * Permet la connection à la base de données
 */
abstract class DbModel
{
	const HOST = '';
	const DBNAME = '';
	const USERNAME = '';
	const PASSWORD = '';

	protected function dbConnect()
	{
		$db = new \PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::USERNAME, self::PASSWORD);
		return $db;
	}
}