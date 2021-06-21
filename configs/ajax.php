<?php
// Include the database config file 
session_start();
$auteur = $_SESSION['id'];
include_once('../controllers/exerciceController.php');
include_once('../controllers/chapitreController.php');
include_once('../controllers/correctionController.php');
include_once('../views/chapitreView.php');
include_once('../views/ExerciceView.php');
include_once('../views/CorrectionView.php');
if (isset($_POST["id_cours1"])) {
    // Fetch chapitre data based on the specific cours
    $getChapitre = new ChapitreView();
    $result = $getChapitre->getChapitre2($_POST["id_cours1"], $auteur);

    // Generate HTML of exercice options list
    echo '<option value disabled selected>-- Chapitre --</option>';
    foreach ($result as $output) {
        echo ' <option value="' . $output['id_chapitre'] . '">' . $output['titre'] . '</option>';
    }
}
if (isset($_POST["id_cours2"])) {
    // Fetch chapitre data based on the specific cours
    $getChapitre = new ChapitreView();
    $result = $getChapitre->getChapitre($_POST["id_cours2"]);

    // Generate HTML of exercice options list
    echo '<option value disabled selected>-- Chapitre --</option>';
    foreach ($result as $output) {
        echo ' <option value="' . $output['id_chapitre'] . '">' . $output['titre'] . '</option>';
    }
}




if (isset($_POST["id_chapitre1"])) {
    // Fetch exercice data based on the specific chapitre
    $getExercice = new ExerciceView();
    $result = $getExercice->getExercice($_POST["id_chapitre1"], $auteur);

    // Generate HTML of exercice options list
    echo '<option value disabled selected>-- Exercice --</option>';
    foreach ($result as $output) {
        echo ' <option value="' . $output['id_exercice'] . '">' . $output['titre'] . '</option>';
    }
}
if (isset($_POST["id_chapitre2"])) {
    // Fetch exercice data based on the specific chapitre
    $getExercice = new ExerciceView();
    $result = $getExercice->getExercice($_POST["id_chapitre"], $auteur);

    // Generate HTML of exercice options list
    echo '<option value disabled selected>-- Exercice --</option>';
    foreach ($result as $output) {
        echo ' <option value="' . $output['id_exercice'] . '">' . $output['titre'] . '</option>';
    }
}









if (isset($_POST["id_exercice"])) {
    // Fetch exercice data based on the specific chapitre
    $getCorrection = new CorrectionView();
    $result = $getCorrection->getCorrection($_POST["id_exercice"], $auteur);

    // Generate HTML of exercice options list
    foreach ($result as $output) {
        echo ' <option value="' . $output['id_correction'] . '">' . $output['titre'] . '</option>';
    }
}
