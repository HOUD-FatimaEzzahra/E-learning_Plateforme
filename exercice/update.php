<?php
session_start();
require_once('../controllers/exerciceController.php');
require_once('../views/exerciceView.php');
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page

}
if (isset($_POST['update-exercice'])) {
  $id_exercice = $_POST['exercice'];
  $description = $_POST['description'];
  $contenu = $_POST['contenu'];
  $niveau = $_POST['niveau'];
  $ExerciceUpdate = new ExerciceController();
  $ExerciceUpdate->updateExercice($description, $contenu, $niveau, $id_exercice);
  header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
}
$getCours = new ExerciceView();
$result = $getCours->getCours();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Modifier Exercice</title>

  <?php
  require '../include/head.inc.php';
  ?>
  <script>
    $(document).ready(function() {
      $('#cours').on('change', function() {
        var id_cours2 = $(this).val();
        if (id_cours2) {
          $.ajax({
            type: 'POST',
            url: '../configs/ajax.php',
            data: 'id_cours2=' + id_cours2,
            success: function(html) {
              $('#chapitre').html(html);
            }
          });
        } else {
          $('#chapitre').html('<option value="">Select cours first</option>');
        }
      });
    });
    $(document).ready(function() {
      $('#chapitre').on('change', function() {
        var id_chapitre1 = $(this).val();
        if (id_chapitre1) {
          $.ajax({
            type: 'POST',
            url: '../configs/ajax.php',
            data: 'id_chapitre1=' + id_chapitre1,
            success: function(html) {
              $('#exercice').html(html);
            }
          });
        } else {
          $('#exercice').html('<option value="">Select chapitre first</option>');
        }
      });
    });
  </script>
</head>

<body>
  <div class="bg-bts">
    <?php
    require '../include/navbar.inc.php';
    require '../include/session.inc.php';
    ?>

    <div class="container  bg-light text-dark " style=" border-radius: 10px;margin-top: 30px;padding-top: 30px;margin-bottom: 30px;">
      <p class="centered3">Modifier Exercice</p>

      <form method="post" action="" class="text-center" onsubmit="return updateExercice()">

        <select id="cours" name="cours" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Cours --</option>
          <?php foreach ($result as $output) { ?>
            <option value="<?php echo $output["id_cours"]; ?>"><?php echo $output["titre"]; ?></option>
          <?php } ?>
        </select>
        <select id="chapitre" name="chapitre" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Chapitre --</option>
        </select>

        <select id="exercice" name="exercice" class="form-control me-2 ft margtop bts-raduis">
          <option value disabled selected>-- Exercice --</option>
        </select>
        <br />
        <table>
          <tr>
            <th><label>Niveau d'exercice : </label></th>
            <td><input type="radio" style="margin:5px" name="niveau" value="1" checked></td>
            <td><label> facile </label></td>
            <td><input type="radio" style="margin:5px" name="niveau" value="2"></td>
            <td><label> moyen </label></td>
            <td><input type="radio" style="margin:5px" name="niveau" value="3"></td>
            <td><label> difficile </label></td>
          </tr>
        </table>
        <textarea class="form-control me-2 ft margtop bts-raduis" rows="3" name="description" id="description" placeholder="Description"></textarea>
        <br>
        <textarea id="summernote" type="text" name="contenu" placeholder="contenu"></textarea>
        <button class="btn btn-outline-dark ft margtop btn-bts " style="border-radius: 30px; width: 25% ;" type="submit" name="update-exercice">Modifier</button>
        <br>
      </form>
      <br>
    </div>
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
    <br>
    <?php
    include('../include/footer.inc.php')
    ?>
  </div>
  <script>
    var alertList = document.querySelectorAll('.alert')
    alertList.forEach(function(alert) {
      new bootstrap.Alert(alert)
    })
  </script>




</body>

</html>