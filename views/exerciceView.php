<?php

include_once('../classes/exercice.php');

class ExerciceView extends Exercice
{
	public function getCours()
	{
		return $this->getCoursDB();
	}
	public function getChapitre($id_cours)
	{
		return $this->getChapitreDB($id_cours);
	}
	public function getExercice($id_chapitre, $auteur)
	{
		return $this->getExerciceDB($id_chapitre, $auteur);
	}
	public function getExercice2($id_chapitre)
	{
		return $this->getExerciceDB1($id_chapitre);
	}
	public function getExercice3($id_exercice)
	{
		return $this->getExerciceDB3($id_exercice);
	}
	public function getExercice0()
	{
		return $this->getExerciceDB0();
	}
}
