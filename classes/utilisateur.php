<?php

include_once('../configs/cnx.php');
class Utilisateur extends Connection
{

	protected function addUtilisateurDB($nom, $prenom, $email, $password, $fileNameNew)
	{


		$sql = "SELECT nom FROM utilisateur WHERE email = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		if (isset($result["nom"])) {
			return " Email deja ajouter  ";
		}
		$sql = "INSERT INTO utilisateur (nom,prenom,email,password,pictureAdr)values(?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$nom, $prenom, $email, $password, $fileNameNew]);
		return 1;
	}
	protected function getUtilisateurDB($email, $password)
	{
		$sql = "SELECT *  FROM utilisateur WHERE email = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		if (!isset($result["password"])) {
			return "Email incorrect";
		}
		$res = password_verify($password, $result["password"]);
		if ($res) {
			return "";
		}
		return "password incorrect";
	}
	protected function getUtilisateurDB2($email)
	{
		$sql = "SELECT nom , prenom, id  FROM utilisateur WHERE email = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		$res = array('nom' => $result['nom'], 'prenom' => $result['prenom'], 'id' => $result['id']);

		return $res;
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
