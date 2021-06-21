<?php
session_start();
require_once('../controllers/coursController.php');
require_once('../views/coursView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}

if (isset($_POST['delete-cours'])) {
  $id_cours = $_POST['cours'];
  $CoursDelete = new CoursController();
  $CoursDelete->deleteCours($id_cours);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCours = new CoursView();
$result = $getCours->getCours($auteur);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Supprimer Cours</title>

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
      <p class="centered3">Supprimer Cours</p>


      <form method="post" action="" class="text-center" onsubmit="return deleteCours()">
        <select id="cours" name="cours" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Cours --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_cours"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25%; ;" type="submit" name="delete-cours">Supprimer</button>
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