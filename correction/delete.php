<?php
session_start();
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}
require_once('../controllers/correctionController.php');
require_once('../views/correctionView.php');

if (isset($_POST['delete-correction'])) {
  $id_correction = $_POST['correction'];
  $CorrectionDelete = new CorrectionController();
  $CorrectionDelete->deleteCorrection($id_correction);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCorrection = new CorrectionView();
$result = $getCorrection->getCorrection2($auteur);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Supprimer Correction</title>
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
      <p class="centered3">Supprimer Correction</p>
      <form method="post" action="" class="text-center" onsubmit="return deleteCorrection()">
        <select id="correction" name="correction" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Correction --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_correction"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>

        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25%; ;" type="submit" name="delete-correction">Supprimer</button>
        <br>
      </form>
      <br>
    </div>


    <?php
    include('../include/footer.inc.php')
    ?>
  </div>
</body>

</html>