<?php

include_once('../classes/cours.php');
class CoursController extends Cours
{

    public function addCours($titre, $description, $auteur)
    {
        return $this->addCoursDB($titre, $description, $auteur);
    }
    public function updateCours($description, $id_cours)
    {
        return $this->updateCoursDB($description, $id_cours);
    }
    public function deleteCours($id_cours)
    {
        return $this->deleteCoursDB($id_cours);
    }
}
