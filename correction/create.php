<?php
session_start();
require_once('../controllers/correctionController.php');
require_once('../views/correctionView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}
if (isset($_POST['submit-correction'])) {
  $titre = $_POST['titre'];
  $contenu = $_POST['contenu'];
  $id_exercice = $_POST['exercice'];
  $CorrectionAdd = new CorrectionController();
  $CorrectionAdd->addCorrection($id_exercice, $titre, $contenu, $auteur);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getExercice = new CorrectionView();
$result = $getExercice->getExercice();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Creer Correction</title>
  <?php
  require '../include/head.inc.php';
  ?>

</head>

<body>
  <div class="bg-bts">
    <!-- nav bar-->
    <?php
    require '../include/navbar.inc.php';
    require '../include/session.inc.php';
    ?>

    <div class="container  bg-light text-dark " style=" border-radius: 10px;margin-top: 30px;padding-top: 30px;margin-bottom: 30px;">
      <p class="centered3">Ajouter Correction</p>

      <form method="post" action="" class="text-center" onsubmit="return addCorrection()">
        <select id="exercice" name="exercice" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- exercice --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_exercice"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <input class="form-control me-2 ft margtop  bts-raduis" type="text" name="titre" id="titre" placeholder="Titre" />
        <br>
        <textarea id="summernote" type="text" name="contenu" placeholder="contenu"></textarea>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25%; ;" type="submit" name="submit-correction">Ajouter</button>
        <br>
      </form>
      <br>
    </div>

    <br>
    <script>
      $('#summernote').summernote({
        placeholder: 'Contenu',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['insert', ['picture', 'link', 'video', 'math', 'hr']],
          ['para', ['paragraph']],
          ['misc', ['undo', 'redo']],
          ['view', ['fullscreen', 'codeview', 'help']]

        ],

      });
    </script>

    <?php
    include('../include/footer.inc.php')
    ?>

  </div>

</body>

</html>