<?php

include_once('../classes/chapitre.php');
class ChapitreController extends Chapitre
{

    public function addChapitre($id_cours, $titre, $description, $contenu, $auteur)
    {
        return $this->addChapitreDB($id_cours, $titre, $description, $contenu, $auteur);
    }
    public function updateChapitre($description, $contenu, $id_chapitre)
    {
        return $this->updateChapitreDB($description, $contenu, $id_chapitre);
    }
    public function deleteChapitre($id_chapitre)
    {
        return $this->deleteChapitreDB($id_chapitre);
    }
}
