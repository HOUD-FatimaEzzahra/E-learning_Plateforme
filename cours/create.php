<?php
session_start();
require_once('../controllers/coursController.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}
if (isset($_POST['submit-cours'])) {
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $auteur = $_SESSION['id'];
  $CoursAdd = new CoursController();
  $CoursAdd->addCours($titre, $description, $auteur);
  header('Location:' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Creer Cours</title>
  <?php
  require '../include/head.inc.php';
  ?>
</head>

<body>
  <div class="bg-bts">
    <?php
    require '../include/navbar.inc.php';
    require '../include/session.inc.php';

    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container bg-light text-dark" style=" border-radius: 10px; margin-top: 30px; padding-top: 30px; margin-bottom: 30px;">
      <p class="centered3">Ajouter Cours</p>

      <form method="post" action="" class="text-center" onsubmit="return addCours()">
        <input class="form-control me-2 ft margtop bts-raduis" type="text" name="titre" placeholder="Titre" id="titre" />
        <textarea class="form-control me-2 ft margtop bts-raduis" id="summernote" name="description" placeholder="Description"></textarea>

        <button class="btn btn-outline-dark ft margtop btn-bts" style="border-radius: 30px; width: 25%" type="submit" name="submit-cours">
          Ajouter
        </button>
        <br />
      </form>
      <br />
    </div>

    <br />
    <script>
      $('#summernote').summernote({
        placeholder: 'Description',
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