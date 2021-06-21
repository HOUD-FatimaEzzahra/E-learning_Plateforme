<?php
include_once('../controllers/enseignantController.php');
//require_once('../views/enseignantView.php');

if (isset($_POST['submit'])) {
	if (strlen($_POST['password']) < 6) {
		$res = "password must be at least 6 characters";
	} else {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$tele = $_POST['tele'];
		$specialite = $_POST['specialite'];
		$etat = 1;
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		//uploading image
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');


		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 500000) {
					$fileNameNew = $nom . "_" . $prenom . "." . $fileActualExt;
					$fileDestination = "../img/photo/" . $fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					$EnseignantAdd = new EnseignantController();
					$res = $EnseignantAdd->addEnseignant($nom, $prenom, $email, $password, $specialite, $tele, $etat, $fileNameNew);
					if ($res == '1') {
						header('Location: check ');
					}
				} else {
					$res =  "picture is too big";
				}
			} else {
				$res =  "error uploading picture";
			}
		} else {
			$res = " type incorrect";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>S'inscrire</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="../img/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

	<link rel="stylesheet" type="text/css" href="../css/style1.css" />
</head>
</head>

<body>
	<?php
	if (isset($res)) {
		echo "<script> swal('Erreur', '$res', 'error') ;</script>";
	}
	?>


	<div id="particles-js">
		<section class="ftco-section content">
			<div class="container">
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
							<h3 class="mb-4 text-center">Avez-vous un compte? <a href="check"> Se Connecter</a></h3>
							<form action="" method="POST" class="signin-form" enctype="multipart/form-data">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Nom" name="nom" aria-label="text" required autofocus />
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Prénom" name="prenom" aria-label="text" required />
								</div>
								<div class="form-group">
									<input class="form-control" type="email" placeholder="E-mail" name="email" aria-label="text" required />
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="tele" name="tele" aria-label="text" required>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="specialite" name="specialite" aria-label="text" required>
								</div>
								<div class="form-group">
									<input id="password-field" name="password" type="password" class="form-control" placeholder="Mot de passe" required />
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<input class="form-control1" type="file" name="file" required />
								</div>
								<div class="form-group">
									<input class="form-control btn btn-primary submit px-3" style="width: 22rem" type="submit" name="submit" value="S'inscrire" />
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