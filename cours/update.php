<?php
session_start();
require_once('../controllers/coursController.php');
require_once('../views/coursView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}


if (isset($_POST['update-cours'])) {
  $id_cours = $_POST['cours'];
  $description = $_POST['description'];
  $CoursUpdate = new CoursController();
  $CoursUpdate->updateCours($description, $id_cours);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCours = new CoursView();
$result = $getCours->getCours($auteur);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Modifier Cours</title>

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

    <div class="container  bg-light text-dark " style=" border-radius: 10px;margin-top: 30px;padding-top: 30px;margin-bottom: 30px;">
      <p class="centered3">Modifier Cours</p>
      <form method="post" action="" class="text-center" onsubmit="return updateCours()">

        <select id="cours" name="cours" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Cours --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_cours"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <textarea class="form-control me-2 ft margtop bts-raduis" id="summernote" name="description" placeholder="Description"></textarea>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25% ;" type="submit" name="update-cours">Modifier</button>
        <br>
      </form>
      <br>

    </div>
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
    <br>
    <?php
    include('../include/footer.inc.php')
    ?>
  </div>


</body>

</html>