<?php

include_once('../configs/cnx.php');
class Exercice extends Connection
{

	protected function addExerciceDB($id_chapitre, $titre, $description, $contenu, $auteur, $niveau)
	{
		$sql = "INSERT INTO exercice (titre ,id_chapitre, description , contenu, id_auteur , niveau ) values (?,?,?,?,?,?);";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$titre, $id_chapitre, $description, $contenu, $auteur, $niveau]); // or die(print_r($stmt->errorInfo() ));

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
	protected function getChapitreDB($id_cours)
	{
		$sql = "SELECT * FROM chapitre WHERE id_cours = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_cours]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getExerciceDB($id_chapitre, $auteur)
	{
		$sql = "SELECT * FROM exercice WHERE id_chapitre = ? and id_auteur = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_chapitre, $auteur]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getExerciceDB1($id_chapitre)
	{
		$sql = "SELECT * FROM exercice WHERE id_chapitre = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id_chapitre]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getExerciceDB0()
	{
		$sql = "SELECT * FROM exercice  ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getExerciceDB3($id)
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

		$sql = "SELECT ex.id_exercice as id_exercice , co.titre as cours , ex.titre as titre , ex.description as description , ex.contenu as contenu ,n.nom as niveau, u.nom as n_auteur , u.prenom as p_auteur , ex.date_Pub as date , ex.views as views , ex.etat as etat FROM exercice ex , cours co , chapitre ca , niveau n , utilisateur u where ca.id_cours = co.id_cours and ex.id_chapitre = ca.id_chapitre and n.id=ex.niveau and ex.id_auteur=u.id and ex.id_exercice=?  ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function updateExerciceDB($description, $contenu, $niveau, $id_exercice)
	{
		$sql = "UPDATE exercice SET description = ? , contenu = ? , niveau = ? WHERE id_exercice = ? ";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$description, $contenu, $niveau, $id_exercice]);

		return $result;
	}
	protected function deleteExerciceDB($id_exercice)
	{
		$sql = "DELETE from exercice WHERE id_exercice =?";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_exercice]); //or die(print_r($stmt->errorInfo() ));

		return $result;
	}
}
