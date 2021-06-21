<?php

include_once('../classes/enseignant.php');

class EnseignantView extends Enseignant
{
	public function getEnseignant($email)
	{
		return $this->getEnseignantDB($email);
	}
	public function getEnseignant2($id)
	{
		return $this->getEnseignantDB2($id);
	}
}
