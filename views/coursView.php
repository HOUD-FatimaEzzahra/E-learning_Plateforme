<?php

include_once('../classes/cours.php');

class CoursView extends Cours
{
	public function getCours($auteur)
	{
		return $this->getCoursDB($auteur);
	}
	public function getCours0()
	{
		return $this->getCoursDB0();
	}
	public function getCours1($id)
	{
		return $this->getCoursDB1($id);
	}
}
