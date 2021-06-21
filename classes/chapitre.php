<?php

include_once('../configs/cnx.php');
class Chapitre extends Connection
{

	protected function addChapitreDB($id_cours, $titre, $description, $contenu, $auteur)
	{
		$sql = "INSERT INTO chapitre (id_cours , titre , description , contenu, id_auteur) values (?,?,?,?,?);";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_cours, $titre, $description, $contenu, $auteur]); // or die(print_r($stmt->errorInfo() ));

		return $result;
	}
	protected function getCoursDB()
	{
		$sql = "SELECT * FROM cours";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getChapitreDB2($id_cours, $auteur)
	{
		$sql = "SELECT * FROM chapitre WHERE id_cours =? and id_auteur= ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_cours, $auteur]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getChapitreDB($id_cours)
	{
		$sql = "SELECT * FROM chapitre WHERE id_cours =?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_cours]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getChapitreDB1($id)
	{
		$sql = "SELECT views FROM chapitre WHERE id_chapitre = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch();


		if (!strpos($result['views'], $_SERVER['REMOTE_ADDR'])) {
			$sql = "UPDATE chapitre set views = ? WHERE id_chapitre = ?";
			$stmt = $this->connect()->prepare($sql);
			$str = $result['views'] . " - " . $_SERVER['REMOTE_ADDR'];
			//$ip = file_get_contents("http://api.ipify.org"); // pour l'adresse ipv4
			$stmt->execute([$str, $id]);
		}

		$sql = "SELECT co.id_cours as id_cours , ca.titre as chapitre , co.titre as cours , u.nom as n_auteur , u.prenom as p_auteur , ca.date_pub as date , ca.description as description , ca.contenu as contenu , views as views  FROM chapitre ca , cours co , utilisateur u WHERE ca.id_chapitre =? and ca.id_cours = co.id_cours and ca.id_auteur = u.id";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function updateChapitreDB($description, $contenu, $id_chapitre)
	{
		$sql = "UPDATE chapitre SET description = ? , contenu =? WHERE id_chapitre = ? ; ";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$description, $contenu, $id_chapitre]);

		return $result;
	}
	protected function deleteChapitreDB($id_chapitre)
	{
		$sql = "DELETE from chapitre WHERE id_chapitre = ? ;";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_chapitre]); //or die(print_r($stmt->errorInfo() ));

		return $result;
	}
}
