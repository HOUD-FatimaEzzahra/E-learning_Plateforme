<?php
session_start();
require_once('../controllers/chapitreController.php');
require_once('../views/chapitreView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}

if (isset($_POST['delete-chapitre'])) {
  $id_chapitre = $_POST['chapitre'];
  $ChapitreDelete = new ChapitreController();
  $ChapitreDelete->deleteChapitre($id_chapitre);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCours = new ChapitreView();
$result = $getCours->getCours();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Supprimer Chapitre</title>

  <?php
  require '../include/head.inc.php';
  ?>
  <script>
    $(document).ready(function() {
      $('#cours').on('change', function() {
        var id_cours1 = $(this).val();
        if (id_cours1) {
          $.ajax({
            type: 'POST',
            url: '../configs/ajax.php',
            data: 'id_cours1=' + id_cours1,
            success: function(html) {
              $('#chapitre').html(html);
            }
          });
        } else {
          $('#chapitre').html('<option value="">Select cours first</option>');
        }
      });
    });
  </script>

</head>

<body>
  <div class="bg-bts">
    <!-- nav bar-->
    <?php
    require '../include/navbar.inc.php';
    require '../include/session.inc.php';
    ?>


    <div class="container  bg-light text-dark " style=" border-radius: 10px;margin-top: 30px;padding-top: 30px;margin-bottom: 30px;">
      <p class="centered3">Supprimer Chapitre</p>


      <form method="post" action="" class="text-center" onsubmit="return deleteChapitre()">
        <select id="cours" name="cours" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Cours --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_cours"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <select id="chapitre" name="chapitre" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Chapitre --</option>
        </select>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25%; ;" type="submit" name="delete-chapitre">Supprimer</button>
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