<?php
require_once '../views/chapitreView.php';
$id = $_GET['id'];
$getChapitre = new ChapitreView();
$result = $getChapitre->getChapitre1($id);


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Accueil</title>

	<?php
	session_start();
	require '../include/head.inc.php';
	?>
	<style>
		a {
			color: whitesmoke;
		}

		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>

<body>
	<div class="bg-bts">
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="GVUSQt5M"></script>

		<!-- <div id="particles-js"> -->
		<!-- nav bar-->
		<?php
		require '../include/navbar.inc.php';
		foreach ($result as $output) {
			$getChapitre = new ChapitreView();
			$result1 = $getChapitre->getChapitre($output['id_cours']);
		?>

			<div class="row">
				<br>
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<br>
					<div class="container bg-light text-dark" style="  width: 90%; border-radius: 10px;margin:auto;">
						<br>
						<h3><?php echo $output['chapitre']; ?></h3>
						<br>
						<?php echo $output['contenu']; ?>
						<br>
						<div class="fb-like" style="padding: 20px;" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-width="850" data-layout="button_count" data-action="like" data-size="large" data-share="true">
						</div>
						<br>
					</div>
					<br>
					<div class="container bg-light text-dark" style=" width: 90%; border-radius: 10px;margin:auto;">

						<div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-width="850" data-numposts="5">
						</div>
					</div>
				</div>
				<br>
				<!-- <div class="col-1"></div> -->
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<br>
					<div class="container bg-light text-dark" style="  width: 90%; border-radius: 10px;margin:auto;">
						<br>
						<h4>Détails</h4>
						<table style="width: 100%;">
							<tr>
								<td><i class="far fa-folder-open"></i></td>
								<td>
									<?php echo $output['cours']; ?>
								</td>
							</tr>
							<tr>
								<td><i class="fas fa-user-alt"></i></td>
								<td><?php echo strtoupper($output['n_auteur']) . " " . ucfirst($output['p_auteur']); ?></td>
							</tr>
							<tr>
								<td><i class="far fa-calendar-alt"></i></td>
								<td><?php echo date("d-m-Y", strtotime($output['date'])); ?></td>
							</tr>
							<tr>
								<td><i class="fas fa-eye"></i></td>
								<td><?php echo substr_count($output['views'], "-") . " Views"; ?></td>
							</tr>
						</table>
						<br>

					</div>
					<br>
					<div class="container bg-light text-dark" style=" width: 90%; border-radius: 10px;margin:auto;">
						<br>
						<h4>les chapitre</h4>
						<table style="width: 100%;">
							<?php foreach ($result1 as $output) {
								echo "<tr><td><i class='far fa-file-alt'></i></td><td><a class='blackk' href=chapitre?id=" . $output['id_chapitre'] . " >" . $output['titre'] . "</a></td></tr>";
							} ?>
						</table>
						<br>
					</div>
					<br>


				</div>

			</div>
			<br>
	</div>


	<!--background-->
<?php
		}
		include '../include/footer.inc.php';
?>

</body>


</html>