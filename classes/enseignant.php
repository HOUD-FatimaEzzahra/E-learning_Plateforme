<?php

require_once '../configs/cnx.php';
class Enseignant extends Connection
{


	protected function addEnseignantDB($nom, $prenom, $email,  $password, $specialite, $tele, $etat, $fileNameNew)
	{


		$sql = "SELECT nom FROM utilisateur WHERE email = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		if (isset($result["nom"])) {
			return " Email deja ajouter  ";
		}
		$sql = "INSERT INTO utilisateur (nom,prenom,email,password,specialite,tele,etat,pictureAdr)values(?,?,?,?,?,?,?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$nom, $prenom, $email, $password, $specialite, $tele, $etat, $fileNameNew]); //or die(print_r($stmt->errorInfo()));

		return 1;
	}

	protected function getenseignantDB($email)
	{
		$sql = "SELECT nom , prenom, id,specialite , pictureAdr  FROM utilisateur WHERE email = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		if (isset($result['specialite'])) {
			$res = array('nom' => $result['nom'], 'prenom' => $result['prenom'], 'id' => $result['id'], 'specialite' => $result['specialite'], 'pictureAdr' => $result['pictureAdr']);
			return $res;
		}
		if (empty($result['specialite'])) {
			$res = array('nom' => $result['nom'], 'prenom' => $result['prenom'], 'id' => $result['id'], 'pictureAdr' => $result['pictureAdr']);
			return $res;
		}
	}
	protected function getenseignantDB2($id)
	{
		$sql = "SELECT *  FROM utilisateur WHERE id = ? ";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch();
		if (isset($result['specialite'])) {
			$res = array(
				'id' => $result['id'],
				'nom' => $result['nom'],
				'prenom' => $result['prenom'],
				'specialite' => $result['specialite'],
				'email' => $result['email'],
				'etat' => $result['etat'],
				'tele' => $result['tele'],
				'password' => $result['password'],
				'pictureAdr' => $result['pictureAdr']
			);
			return $res;
		}
		if (empty($result['specialite'])) {
			$res = array(
				'id' => $result['id'],
				'nom' => $result['nom'],
				'prenom' => $result['prenom'],
				'email' => $result['email'],
				'password' => $result['password'],
				'pictureAdr' => $result['pictureAdr']
			);
			return $res;
		}
	}
	protected function UpdateEnseignantDB($id, $nom, $prenom, $email, $password, $specialite, $tele, $etat)
	{
		$sql = "UPDATE utilisateur SET 
		nom = ? ,
		prenom = ?,
		email = ?, 
		password = ?,
		specialite = ?,
		tele = ?,
		etat = ?
		  WHERE id = ? ; ";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$nom, $prenom, $email, $password, $specialite, $tele, $etat, $id]);

		return $result;
	}
	protected function UpdateEnseignantDB77($id, $nom, $prenom, $email, $specialite, $tele, $etat)
	{
		$sql = "UPDATE utilisateur SET 
		nom = ? ,
		prenom = ? , 
		email = ? ,
		specialite = ? ,
		tele = ? ,
		etat = ?
		  WHERE id = ? ; ";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([$nom, $prenom, $email, $specialite, $tele, $etat, $id]);

		return $result;
	}
	// protected function deleteCoursDB($id_cours)
	// {
	// 	$sql = "DELETE from cours WHERE id_cours = ? ;";

	// 	$stmt = $this->connect()->prepare($sql);
	// 	$result = $stmt->execute([$id_cours]);

	// 	return $result;
	// }
}
