<?php
require_once '../views/coursView.php';
require_once '../views/exerciceView.php';
$getCours = new CoursView();
$result1 = $getCours->getCours0();
$getExercice = new ExerciceView();
$result2 = $getExercice->getExercice0();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Accueil</title>
	<?php
	session_start();
	require '../include/head.inc.php';
	?>
</head>

<body>
	<!--background-->
	<div class="bg-bts">
		<!-- nav bar-->
		<?php
		require '../include/navbar.inc.php';
		?>
		<!-- hado les cours -->
		<br>
		<div class="">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

				<div class=" container-md content-home bg-container text-dark" style=" border-radius: 10px;margin-top: 30px;margin-bottom: 30px;">
					<br>
					<h2>Cours</h2>
					<div class="row  row-cols-xxl-6 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 ">
						<!--  
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Special title treatment</h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="#" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
						</div>
						  -->
						<?php foreach ($result1 as $output) {
							echo "<div class='col-sm-6'>
				<div class='card' >
					<div class='card-body'>
						<h5 class='card-title'>" . $output['titre'] . "</h5>
						<small class='card-subtitle mb-2 text-muted'>ajoute le " . date('j M Y', strtotime($output['date_Pub'])) . " </small>
						<div class='card-text limite' >" . $output['description'] . "</div>
						<a href='cours?idCours=" . $output['id_cours'] . "' class='btn btn-primary bg-bts0'>Lire la suite</a>
						</div>
					</div>
				</div>";
						}
						?>
					</div>
					<hr>
					<h2>Exercice</h2>
					<div class="row  row-cols-xxl-6 row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 ">

						<?php foreach ($result2 as $output) {
							echo "<div class='col-sm-6'>
							<div class='card'>
								<div class='card-body'>
									<h5 class='card-title'>" . $output['titre'] . "</h5>
									<h6 class='card-subtitle mb-2 text-muted'>ajoute le " . date('j M Y', strtotime($output['date_Pub'])) . " </h6>
									<div class='card-text limite'>" . $output['description'] . "</div>
									<a href='exercice?idExercice=" . $output['id_exercice'] . "'  class='btn btn-primary bg-bts0'>Lire la suite</a>

								</div>
							</div>
							</div>";
						}
						?>
						<br>

					</div>
					<br>
				</div>
			</div>
		</div>
		<br><br>
	</div>
	<?php
	include '../include/footer.inc.php';
	?>


</body>

</html>