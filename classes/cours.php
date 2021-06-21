<?php

include_once('../configs/cnx.php');
class Cours extends Connection
{

	protected function addCoursDB($titre, $description, $auteur)
	{
		$sql = "INSERT INTO cours(titre,description,id_auteur)values(?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$titre, $description, $auteur]); // or die(print_r($stmt->errorInfo() ));

		return $result;
	}

	protected function getCoursDB($auteur)
	{
		$sql = "SELECT * FROM cours where id_auteur = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$auteur]);
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getCoursDB0()
	{
		$sql = "SELECT * FROM cours  ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function getCoursDB1($id)
	{
		$sql = "SELECT * FROM cours WHERE id_cours=$id ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		return $result;
	}
	protected function updateCoursDB($description, $id_cours)
	{

		$sql = "UPDATE cours SET description = ?  WHERE id_cours = ? ; ";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$description, $id_cours]);

		return $result;
	}
	protected function deleteCoursDB($id_cours)
	{
		$sql = "DELETE from cours WHERE id_cours = ? ;";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$id_cours]);

		return $result;
	}
}
