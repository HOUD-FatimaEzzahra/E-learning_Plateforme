<?php

include_once('../classes/chapitre.php');

class ChapitreView extends Chapitre
{
	public function getChapitre($id_cours)
	{
		return $this->getChapitreDB($id_cours);
	}
	public function getChapitre1($id)
	{
		return $this->getChapitreDB1($id);
	}
	public function getCours()
	{
		return $this->getCoursDB();
	}
	public function getChapitre2($id_cours, $auteur)
	{
		return $this->getChapitreDB2($id_cours, $auteur);
	}
}
