<?php

include_once('../classes/utilisateur.php');

class UtilisateurView extends Utilisateur
{
	public function getUtilisateur($email, $password)
	{
		return $this->getUtilisateurDB($email, $password);
	}
	public function getUtilisateur2($email)
	{
		return $this->getUtilisateurDB2($email);
	}
}


////////////////////////////////////////////////////////:: change username par email