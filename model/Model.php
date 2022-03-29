<?php
namespace model;

/**
 * Requêtes SQL
 */
class Model extends DbModel
{

	/**
	 * Requête SQL SELECT
	 * @param  string      $champ      champ(s) de la table de BDD
	 * @param  string      $table      nom de la table de BDD
	 * @param  string|null $condition  extraire les lignes d’une base de données qui respectent une condition
	 * @param  string|null $value      la valeur de la condition
	 * @param  string|null $expression trier les données sur une ou plusieurs colonnes, par ordre ascendant ou descendant.
	 * @param  int|null    $count      nbr de resultat
	 */
	public function select(string $champ, string $table, string $condition=NULL, string $value=NULL, string $expression=NULL, int $count=NULL)
	{
		$db = $this->dbConnect();

		if ($table === 'post') {
			$fk = ' LEFT JOIN user ON autor = user.id ';
		} elseif ($table === 'comment') {
			$fk = ' LEFT JOIN user ON autor = user.id LEFT JOIN post ON post = post.id ';
		} else {
			$fk = '';
		}

		if ($expression == NULL) {
			$cmd= '';
		} else {
			$cmd= ' ORDER BY '.$expression;
		}

		if ($count == NULL) {
			$cmd .= '';
		} else {
			$cmd .= ' LIMIT '.$count;
		}
		

		if ($condition == NULL) {
			$req = "query('SELECT ".$champ." FROM ".$table." ".$fk." ".$cmd."');";
			return $req;
		} else {
			$req = "prepare('SELECT ".$champ." FROM ".$table." ".$fk." WHERE ".$condition." = ? ".$cmd."');";
			$req.= ' $stmt->execute(array('.$value.'));';
			return $req;
		}

		$stmt = $db->$req;

		return $req;
	}


	public function insert(string $table, string $value)
	{
		$value = explode(',', $value);

		$db = $this->dbConnect;

		if ($table === 'user') {
			$req = $db->prepare
			('INSERT INTO user(name, surname, pseudo, email, password, token, createDate)
				VALUES(?, ?, ?, ?, ?, ?, NOW())');

			$req->execute(array($value[0], $value[1], $value[2], $value[3], $value[4], $value[5]));

			return $req;
		} elseif ($table === 'post') {
			$req = $db->prepare
			('INSERT INTO post(title, chapo, content, image, autor, createDate)
				VALUES(?, ?, ?, ?, ?, NOW())');

			$req->execute(array($value[0], $value[1], $value[2], $value[3], $value[4]));

			return $req;
		} elseif ($table === 'comment') {
			$req = $db->prepare
			('INSERT INTO comment(content, autor, post, createDate)
				VALUES(?, ?, ?, NOW())');

			$req->execute(array($value[0], $value[1], $value[2]));

			return $req;
		}
	}
}