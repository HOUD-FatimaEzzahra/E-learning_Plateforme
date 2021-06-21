<?php
session_start();
require_once('../controllers/correctionController.php');
require_once('../views/correctionView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}


if (isset($_POST['update-correction'])) {
  $id_correction = $_POST['correction'];
  $contenu = $_POST['contenu'];

  $CorrectionUpdate = new CorrectionController();
  $CorrectionUpdate->updateCorrection($id_correction, $contenu);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCorrection = new CorrectionView();
$result = $getCorrection->getCorrection2($auteur);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Modifier Correction</title>

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
      <p class="centered3">Modifier Correction</p>
      <form method="post" action="" class="text-center" onsubmit="return updateCorrection()">

        <select name="correction" id="correction" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Correction --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_correction"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <br>
        <textarea id="summernote" type="text" name="contenu" placeholder="contenu"></textarea>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25% ;" type="submit" name="update-correction">Modifier</button>
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