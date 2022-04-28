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
	public function select($champ, $table, $condition=NULL, $value=NULL, $expression=NULL, $count=NULL)
	{
		$db = $this->dbConnect();

		if ($table === 'post') {
			$fk = ' LEFT JOIN user ON autorPost = user.idUser ';
		} elseif ($table === 'comment') {
			$fk = ' LEFT JOIN user ON autorComment = user.idUser LEFT JOIN post ON postComment = post.idPost ';
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
			$req = $db->query('SELECT '.$champ.' FROM '.$table.' '.$fk.' '.$cmd.'');
			return $req;
		} else {
			$req = $db->prepare('SELECT '.$champ.' FROM '.$table.' '.$fk.' WHERE '.$condition.' = ? '.$cmd.'');
			$req->execute(array($value));

			return $req;
		}
	}


	public function insert(string $table, array $value)
	{
		$db = $this->dbConnect();

		if ($table === 'user') {
			$req = $db->prepare
			('INSERT INTO user(name, surname, pseudo, email, password, token, createDate)
				VALUES(?, ?, ?, ?, ?, ?, NOW())');

			$req = $req->execute($value);

			return $req;
		} elseif ($table === 'post') {
			$req = $db->prepare
			('INSERT INTO post(titlePost, chapoPost, contentPost, imagePost, autorPost, createDatePost)
				VALUES(?, ?, ?, ?, ?, NOW())');

			$req = $req->execute($value);

			return $req;
		} elseif ($table === 'comment') {
			$req = $db->prepare
			('INSERT INTO comment(contentComment, autorComment, postComment, createDateComment)
				VALUES(?, ?, ?, NOW())');

			$req = $req->execute($value);

			return $req;
		}
	}



	public function update($table, $set, $condition, $value)
	{
		$db = $this->dbConnect();
		$req = $db->prepare
		('UPDATE '.$table.
			' SET '.$set.
			' WHERE '.$condition.'=?
		');

		$req = $req->execute(array($value));

		return $req;
	}



	public function delete($table, $condition, $value)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM '.$table.' WHERE '.$condition.' = ?');
		$req = $req->execute(array($value));

		return $req;
	}
}