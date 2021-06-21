<?php
session_start();
if (isset($_SESSION['id'])) {
  $auteur = $_SESSION['id'];
} else {
  header('Location: ../core/home '); //pour eviter alert when refresh page
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Settings</title>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="stylesheet" type="text/css" href="../css/styleEdite.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <?php
  require_once '../controllers/enseignantController.php';
  require_once '../views/enseignantView.php';

  $getEnseignant = new EnseignantView();
  $result = $getEnseignant->getEnseignant2($_SESSION['id']);

  if (isset($_POST['update'])) {


    $id = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tele = $_POST['tele'];
    $email = $_POST['email'];
    $etat = $_POST['etat'];
    $specialite = $_POST['specialite'];

    if (!empty($_POST['new_password'])) {


      if (password_verify($_POST['password'], $result["password"]) == 1) {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $EnseignantUpdate = new EnseignantController();
        $test = $EnseignantUpdate->UpdateEnseignant($id, $nom, $prenom, $email, $password, $specialite, $tele, $etat);
      }
    }
    if (empty($_POST['new_password'])) {

      $EnseignantUpdate = new EnseignantController();
      $test = $EnseignantUpdate->UpdateEnseignant77($id, $nom, $prenom, $email, $specialite, $tele, $etat);


      header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page

    } else {
      $res = "mots de passe incorecct";
    }

    // header('Location: ' . $_SERVER['PHP_SELF']); //pour eviter alert when refresh page
  }


  if (isset($_POST['cancel'])) {

    header('Location: ../core/home '); //pour eviter alert when refresh page
  }


  ?>

</head>

<body>
  <?php
  if (isset($res)) {
    echo "<script> swal('Erreur', '$res', 'error') ;</script>";
  }
  ?>
  <div class="bg-bts" style="height: 150vh;">
    <nav class=" sticky-top navbar navbar-expand-xl shadow-lg nav-pills nav-fill">
      <div class="container-fluid">

        <a class="navbar-brand" href="../core/home">
          <img src="../img/logo.svg" alt="logo bts hassan 2 " width="200" height="50" />
        </a>
      </div>
    </nav>
    <div class="container">
      <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="card ">
            <!-- h-100 -->
            <div class="card-body">
              <div class="account-settings">
                <div class="user-profile">
                  <div class="user-avatar">
                    <img src="<?php echo '../img/photo/' . $_SESSION['pictureAdr']; ?>" class="avatar raduis" alt="Photo de profil" />
                  </div>
                  <h5 class="user-name"><?php echo ucfirst($_SESSION['prenom']) . ' ' . strtoupper($_SESSION['nom']); ?></h5>
                  <h6 class="user-email"><?php echo 'ID : ' . $result['id']; ?></h6>
                </div>
                <div class="about">
                  <h5>About</h5>
                  <p>
                    <?php if (isset($result['specialite'])) {
                      echo 'enseignant';
                    } else {
                      echo 'Etudiant(e)';
                    } ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
          <form method="POST" action="">
            <div class="card h-100">
              <div class="card-body">
                <div class="row gutters">

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $result['nom'] ?>" />
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter email ID" value="<?php echo $result['email'] ?>" />
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                    <div class="form-group">
                      <label>Prénom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $result['prenom'] ?>" />
                    </div>

                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="tele" placeholder="Numero" <?php
                                                                                                if (isset($result['tele'])) {
                                                                                                  echo "value='" . $result['tele'] . "'";
                                                                                                } else {
                                                                                                  echo 'disabled';
                                                                                                }
                                                                                                ?> />
                    </div>
                  </div>
                  <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Spécialite</label>
                      <input type="text" class="form-control" name="specialite" placeholder="Spécialite" <?php
                                                                                                          if (isset($result['specialite'])) {
                                                                                                            echo "value='" . $result['specialite'] . "'";
                                                                                                          } else {
                                                                                                            echo ' disabled';
                                                                                                          }
                                                                                                          ?> />
                    </div>

                  </div>
                  <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Etat</label>
                      <select class="form-control" name="etat">
                        <option value="1">Active</option>
                        <option value="0">Désactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Mots de passe</h6>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Actuelle Mots de passe</label>
                      <input type="password" class="form-control" name="password" placeholder="Entrer votre mots de passe" />
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Nouveau Mots de passe</label>
                      <input type="password" class="form-control" name="new_password" placeholder="Nouveau mots de passe" value="" />
                    </div>
                  </div>
                </div>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                      <input type="submit" value="Update" name="update" class="btn btn-primary" />
                      <input type="submit" value="Cancel" name="cancel" class="btn btn-secondary" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

</html>