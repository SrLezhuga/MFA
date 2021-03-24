<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Bolsa de Trabajo</title>
</head>

<body>
	<script src="assets/js/loader.js"></script>

	<!-- Wrapper -->
	<div class="wrapper">

		<?php include("assets/common/sidebar.php"); ?>

		<!-- Content -->
		<div class="content">

			<?php include("assets/common/topbar.php"); ?>

			<!-- Top content -->
			<div class="top-content section-container" id="top-content" style="border-bottom: 5px solid #dc3545!important;">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- Jumbotron -->
							<div class="jumbotron jumbotron-fluid" style="background-color: transparent;">
								<div class="container">
									<a>
										<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block logo-mfa">
									</a>
									<p class="lead">
										<img src="assets/img/logo/logo-mfa.png" class="img-fluid mx-auto d-block">
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">

					<div class="card bg-light text-dark shadow mb-3 mt-3">
						<div class="card-body">

							<div class="row">
								<div class="col-12">
									<h1><b>Forma parte del equipo</b></h1>
									<h1><i class="fas fa-users"></i></h1>
									<h4>En Mayoreo Ferretero Atlas estamos convecidos de que cada uno de nuestros exitos, son compartidos con cada uno de nuestros colaboradores y amigos. Queremos que formes parte de nuestro equipo de trabajo y que juntos hagamos que suceda lo mejor.
										Si te interesan los retos, quieres superarte profesionalmente y laboralmente, eres resposable y te gusta el trabajo en equipo, entonces tienes el perfil para ser parte de nuestra familia de Mayoreo Ferretero Atlas
									</h4>
									<br>
									<p><b>Te invitamos a que conozcas los diferentes puestos que tenemos para ti.</b></p>

								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<br><br>

			<!-- Section 4 -->
			<div class="section-4-container section-container section-container-image-bg" id="section-4" style="border-top: 5px solid #dc3545!important;">
				<div class="container">

					<div class="card bg-secondary" style="top: -55px;">
						<div class="card-body">
							<h1 class="display-3 text-white">VACANTES</h1>
						</div>
					</div>
					<br>


					<!-- Carusel/slider marcas -->
					<div class="carousel" data-flickity='{ "draggable": true,
							"autoPlay": true,
							"bgLazyLoad": true,
							"autoPlay": 5000,
							"freeScroll": true,
							"wrapAround": true,
							"contain": true,
							"prevNextButtons": false,
							"adaptiveHeight": true,
							"pageDots": true}'>

						<?php
						$queryVacantes = "SELECT * FROM tab_vacantes WHERE visible = 'true'";
						$rsVacantes = mysqli_query($con, $queryVacantes) or die("Error de consulta");
						while ($Vacantes = mysqli_fetch_array($rsVacantes)) {
							echo '
							<div class="carousel-vacantes">
							<div class="card shadow">
								<h1 class="card-title"><b>' . $Vacantes['vacante'] . '</b></h1>
								<div class="card-body text-left">
									<div class="row">
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
											<fieldset>
												<legend class="w-auto"><b>Requisitos:</b></legend>
												<p class="card-text">' . nl2br($Vacantes['requisitos']) . '</p>
											</fieldset>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<img class="img-suc-web" src="assets/img/vacantes/' . $Vacantes['img'] . '" style="width: 200px; height: 150px;">
										</div>
										<div class="col-12">
											<fieldset>
												<legend class="w-auto"><b>Ofrecemos:</b></legend>
												<p class="card-text">' . nl2br($Vacantes['ofrecemos']) . '</p>
											</fieldset>
										</div>
									</div>
									<center>
										<button type="button" class="btn btn-outline-danger mt-2 BtnVacante" data-toggle="modal" data-target="#modalVacante" value="' . $Vacantes['Id'] . '">
											<i class="far fa-thumbs-up"></i> Postularme
										</button>
									</center>
								</div>
							</div>
						</div>
							';
						}
						?>
					</div>

				</div>
			</div>

			<!-- Section 5 -->
			<div class="section-5-container section-container" id="section-5" style="border-top: 5px solid #dc3545!important;">
				<div class="container">
					<div class="card bg-secondary" style="top: -55px;">
						<div class="card-body">
							<h1 class="display-3 text-white">RECURSOS HUMANOS</h1>
						</div>
					</div>
					<div class="row">
						<?php
						$queryRC = "SELECT * FROM tab_rrhh";
						$rsRC = mysqli_query($con, $queryRC) or die("Error de consulta");
						while ($RC = mysqli_fetch_array($rsRC)) {
							echo '
							<div class="col-lg-6 col-md-6 col-sm-12 wow  slideInUp">
								<p><i class="fas fa-user"></i> ' . $RC['nombre'] . '
									<br><a href="mailto:' . $RC['correo'] . '"><i class="far fa-envelope"></i> ' . $RC['correo'] . '</a>
									<br><a href="tel:' . str_replace(" ", "", $RC['telefono']) . '"><i class="fas fa-mobile-alt"></i> ' . $RC['telefono'] . '</a>
								</p>
								<a href="https://wa.me/52' . str_replace(" ", "", $RC['telefono']) . '?text=' . str_replace(" ", "%20", $RC['wp_txt']) . '" target="_blank">
									<img alt="Whatsapp" src="assets/img/whatsapp.png" style="width: 250px; height: auto;">
								</a>
								<br>
								<a href="' . $RC['fb'] . '" target="_blank">
									<img alt="RH Ferretero" src="assets/img/facebook.png" style="width: 250px; height: auto;">
								</a>
							</div>

							';
						}

						?>
					</div>
				</div>
			</div>


			<br>


		</div>


		<?php include("assets/common/footer.php"); ?>
		<div class="social-button tiktok-button active" style="z-index: 88;">
			<a data-toggle="tooltip" title="Tik Tok" data-placement="left" href="https://www.tiktok.com/@culturamfa" target="_blank"><i class="fab fa-tiktok"></i></a>
		</div>
		<div class="social-button telefono-button active" style="bottom: 135px; z-index: 89;">
			<a data-toggle="tooltip" title="Carlos Grajeda" data-placement="left" href="tel:3329724073"><i class="fas fa-phone-alt"></i></a>
		</div>
		<div class="social-button telefono-button active">
			<a data-toggle="tooltip" title="Stephany Lopez" data-placement="left" href="tel:3329724073"><i class="fa fa-phone fa-fw"></i></a>
		</div>

	</div>
	<!-- End content -->

	</div>
	<!-- End wrapper -->


</body>

</html>

<!-- The Modal -->
<div class="modal fade" id="modalVacante">
	<div class="modal-dialog modal-sm">
		<div class="modal-content border-left-danger shadow">
			<div class="getVacante"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// Modal tarjeta Orden

	$('.BtnVacante').on('click', function() {
		var id_button = $(this).val();
		$('.getVacante').load('./assets/controler/vacante/getvacante.php?id=' + id_button, function() {
			$('#modalVacante').modal({
				show: true
			});
		});
	});

	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>