<?php
session_start();

require_once('../controllers/utilisateurController.php');
require_once('../views/utilisateurView.php');
require_once('../views/enseignantView.php');



if (isset($_POST['check'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $utilisateurCheck = new UtilisateurView();
  $res = $utilisateurCheck->getUtilisateur($email, $password);
  if ($res == '') {
    $EnseignantCheck = new EnseignantView();
    $result = $EnseignantCheck->getEnseignant($email);
    //print_r($result);
    $_SESSION['nom'] = $result['nom'];
    $_SESSION['prenom'] = $result['prenom'];
    $_SESSION['id'] = $result['id'];
    $_SESSION['pictureAdr'] = $result['pictureAdr'];
    if (isset($result['specialite'])) {
      $_SESSION['specialite'] = $result['specialite'];
    } else {
      $_SESSION['specialite'] = 'no';
    }

    header('Location: ../core/home ');
    //print_r($_SESSION);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Se Connecter</title>

  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" type="text/css" href="../css/style1.css" />


</head>

<body>
  <?php
  if (isset($res)) {
    echo "<script> swal('Erreur', '$res', 'error') ;</script>";
  }
  ?>

  <div id="particles-js">
    <section class="ftco-section content " style="top: 30% !important;">
      <div class="container" style="margin-top: 200px;">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <a class="navbar-brand" href="../index">
              <img class="heading-section" src="../img/logo.svg" alt="BTS HASSAN 2" width="300" height="74" />
            </a>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Vous n'avez pas de compte? <a href="create">Créer votre compte</a></h3>
              <form action="" method="POST" class="signin-form">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email" name="email" required autofocus />
                </div>
                <div class="form-group">
                  <input id="password-field" name="password" type="password" class="form-control" placeholder="Mot de passe" required />
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <button type="submit" name="check" class="form-control btn btn-primary submit px-3">
                    Se Connecter
                  </button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                      <input type="checkbox" checked />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="../js/particles.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/sweet-scroll.min.js"></script>
  <!-- particles .js lib  -->
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <!-- stats.js lib -->
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>

  <script>
    (function($) {
      "use strict";

      var fullHeight = function() {
        $(".js-fullheight").css("height", $(window).height());
        $(window).resize(function() {
          $(".js-fullheight").css("height", $(window).height());
        });
      };
      fullHeight();

      $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    })(jQuery);
  </script>
</body>

</html>