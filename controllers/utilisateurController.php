<?php

include_once('../classes/utilisateur.php');

class UtilisateurController extends Utilisateur
{

    public function addUtilisateur($nom, $prenom, $email, $password, $fileNameNew)
    {
        return $this->addUtilisateurDB($nom, $prenom, $email, $password, $fileNameNew);
    }
}
