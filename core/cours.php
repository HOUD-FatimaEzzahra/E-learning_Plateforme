<?php
require_once '../views/coursView.php';
require_once '../views/chapitreView.php';
$id = $_GET['idCours'];
$getCours = new CoursView();
$result0 = $getCours->getCours1($id);
$getChapitre = new ChapitreView();
$result1 = $getChapitre->getChapitre($id);

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
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

			<div class="container content-home bg-container text-dark" style=" border-radius: 10px;margin-top: 30px;margin-bottom: 30px;">
				<br>
				<?php
				foreach ($result0 as $output) {
					echo "
			<h4>" . $output['titre'] . "</h4>
			<nav aria-label=''>
				<ol class='breadcrumb'>
					<li class='breadcrumb-item'>Core</a></li>
					<li class='breadcrumb-item'>Cours</a></li>
					<li class='breadcrumb-item active' aria-current='page'>" . $output['titre'] . "</li>
				</ol>
				</nav>
				<h5>Description</h5>
				<p>" . $output['description'] . "</p>	";


					echo "<h5>Les chapitres</h5>";

					$i = 1;
				?>
					<div class="accordion" id="accordionPanelsStayOpenExample">
						<?php
						foreach ($result1 as $output1) {
						?>

							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $i; ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $i; ?>">
										<?php echo $output1['titre']; ?>
									</button>
								</h2>
								<div id="panelsStayOpen-collapse<?php echo $i; ?>" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading<?php echo $i; ?>">
									<div class="accordion-body">
										<?php echo $output1['description']; ?>
										<a class="bluee" href="chapitre?id=<?php echo $output1['id_chapitre']; ?>">lire la suite</a>
									</div>
								</div>
							</div>
					<?php
							$i++;
						}
						echo "</div> <br>";
					}
					?>

					</div>
			</div>
			<br>
		</div>

	</div>
	<?php
	include '../include/footer.inc.php';
	?>

</body>


</html>