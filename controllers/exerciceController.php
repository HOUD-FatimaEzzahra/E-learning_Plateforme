<?php

include_once('../classes/exercice.php');
class ExerciceController extends Exercice{

    public function addExercice($id_chapitre,$titre,$description,$contenu, $auteur,$niveau){
        return $this->addExerciceDB($id_chapitre,$titre,$description,$contenu, $auteur,$niveau);
    }
    public function updateExercice($description,$contenu,$niveau,$id_chapitre){
        return $this->updateExerciceDB($description,$contenu,$niveau,$id_chapitre);
    }
    public function deleteExercice($id_chapitre){
        return $this->deleteExerciceDB($id_chapitre);
    }

}
