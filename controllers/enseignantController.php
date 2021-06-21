<?php

include_once('../classes/enseignant.php');

class EnseignantController extends Enseignant
{

    public function addEnseignant($nom, $prenom, $email, $password, $specialite, $tele, $etat, $fileNameNew)
    {
        return $this->addEnseignantDB($nom, $prenom, $email, $password, $specialite, $tele, $etat, $fileNameNew);
    }
    public function UpdateEnseignant($id, $nom, $prenom, $email, $password, $specialite, $tele, $etat)
    {
        return $this->UpdateEnseignantDB($id, $nom, $prenom, $email,  $password, $specialite, $tele, $etat);
    }
    public function UpdateEnseignant77($id, $nom, $prenom, $email,  $specialite, $tele, $etat)
    {
        return $this->UpdateEnseignantDB77($id, $nom, $prenom, $email,  $specialite, $tele, $etat);
    }
}
