<?php

include_once('../classes/correction.php');

class CorrectionView extends Correction
{
	public function getExercice()
	{
		return $this->getExerciceDB();
	}
	public function getCorrection($id_exercice, $auteur)
	{
		return $this->getCorrectionDB($id_exercice, $auteur);
	}
	public function getCorrection1($id_exercice)
	{
		return $this->getCorrectionDB1($id_exercice);
	}
	public function getCorrection2($auteur)
	{
		return $this->getCorrectionDB2($auteur);
	}
}
