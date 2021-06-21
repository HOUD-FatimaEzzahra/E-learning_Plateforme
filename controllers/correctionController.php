<?php

include_once('../classes/correction.php');
class CorrectionController extends Correction{

    public function addCorrection($id_exercice,$titre,$contenu, $auteur){
        return $this->addCorrectionDB($id_exercice,$titre,$contenu, $auteur);
    }
    public function updateCorrection($id_correction,$contenu){
        return $this->updateCorrectionDB($id_correction,$contenu);
    }

    public function deleteCorrection($id_correction){
        return $this->deleteCorrectionDB($id_correction);
    }

}
