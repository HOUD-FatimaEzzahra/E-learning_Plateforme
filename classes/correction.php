<?php

include_once('../configs/cnx.php');
class Correction extends Connection
{

	protected function addCorrectionDB($id_exercice, $titre, $contenu, $auteur)
	{
		$sql = "INSERT INTO correction (id_correction , titre  , contenu , id_auteur) values (?,?,?,?);";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_exercice, $titre, $contenu, $auteur]); //or die(print_r($stmt->errorInfo() ));
		// pour modifier etat d'exercice
		$sql = "UPDATE exercice SET  etat = true WHERE id_exercice = ? ;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_exercice]);
		return $result;
	}
	protected function getExerciceDB()
	{
		$sql = "SELECT * FROM exercice";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getCorrectionDB($id_exercice, $auteur)
	{
		$sql = "SELECT * FROM correction WHERE id_exercice = ? and id_auteur = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_exercice, $auteur]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getCorrectionDB2($auteur)
	{
		$sql = "SELECT * FROM correction WHERE id_auteur = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$auteur]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getCorrectionDB1($id)
	{
		$sql = "SELECT views FROM exercice WHERE id_exercice = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch();


		if (!strpos($result['views'], $_SERVER['REMOTE_ADDR'])) {
			$sql = "UPDATE exercice set views = ? WHERE id_exercice = ?";
			$stmt = $this->connect()->prepare($sql);
			$str = $result['views'] . " - " . $_SERVER['REMOTE_ADDR'];
			//$ip = file_get_contents("http://api.ipify.org"); // pour l'adresse ipv4
			$stmt->execute([$str, $id]);
		}

		// $sql = "SELECT * FROM correction WHERE id_exercice = ? ";
		$sql = "SELECT
			cor.id_correction as id_correction , co.titre as cours , cor.titre as titre , cor.contenu as contenu ,n.nom as niveau, u.nom as n_auteur , u.prenom as p_auteur , ex.date_Pub as date , ex.views as views , ex.etat as etat 
		FROM
			exercice ex , cours co , chapitre ca , correction cor , niveau n , utilisateur u
		where
			cor.id_correction=ex.id_exercice and ex.id_chapitre=ca.id_chapitre and ca.id_cours=co.id_cours and ex.niveau=n.id and cor.id_auteur=u.id and cor.id_correction=?
			 ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetchAll();

		return $result;
	}
	// ca.id_cours = co.id_cours and ex.id_chapitre = ca.id_chapitre and n.id=ex.niveau and ex.id_auteur=u.id and ex.id_exercice=? 
	protected function updateCorrectionDB($id_correction, $contenu)
	{
		$sql = "UPDATE correction SET  contenu = ? WHERE id_correction = ? ; ";

		$stmt = $this->connect()->prepare($sql) or die(print_r($stmt->errorInfo()));
		$result = $stmt->execute([$contenu, $id_correction]);

		return $result;
	}
	protected function deleteCorrectionDB($id_correction)
	{
		$sql = "DELETE from correction WHERE id_correction = ? ;";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_correction]) or die(print_r($stmt->errorInfo()));
		// pour modifier etat d'exercice
		$sql = "UPDATE exercice SET  etat = false WHERE id_exercice = ? ;";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_correction]);

		return $result;
	}
}
