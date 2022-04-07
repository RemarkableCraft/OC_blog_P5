<?php
namespace model;

/**
 * Permet la connection à la base de données
 */
abstract class DbModel
{
	const HOST = 'localhost';
	const DBNAME = 'blog_oc';
	const USERNAME = 'root';
	const PASSWORD = '';

	protected function dbConnect()
	{
		$db = new \PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::USERNAME, self::PASSWORD);
		return $db;
	}
}