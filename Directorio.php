<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Directorio</title>
</head>

<body>

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
									<h1><b>Horarios de Servicio</b> <i class="far fa-clock"></i></h1>
									<h4>Lunes a Viernes 8:30 AM - 6:30 PM<br>Dabados 8:30 AM - 2:00 PM</h4>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<br><br>

			<!-- Section 4 -->
			<div class="section-4-container section-container section-container-image-bg" id="section-4" style="border-bottom: 5px solid #dc3545!important; border-top: 5px solid #dc3545!important;">
				<div class="container">

					<div class="card bg-secondary social-card" style="top: -53px;">
						<div class="card-body">
							<h1 class="display-3 text-white">Directorio</h1>
						</div>
					</div>
					<br>
					<br>
					<br>

					<?php
					$querySucursal = "SELECT * FROM tab_sucursal ORDER BY nombre_sucursal DESC";
					$rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
					while ($Sucursal = mysqli_fetch_array($rsSucursal)) {
						echo '
						<div class="card shadow">
							<h1 class="card-title"><b>' . $Sucursal['nombre_sucursal'] . '</b></h1>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="row">
											<div class="col-12 text-left">
												<p class="card-text">
													<b>Dirección:</b>
													<br><i class="fas fa-map-marker-alt"></i> ' . $Sucursal['direccion'] . ', ' . $Sucursal['colonia'] . '
													<br><i class="fas fa-map-marker-alt"></i> C.P. ' . $Sucursal['codigo_postal'] . ', ' . $Sucursal['municipio'] . '
												</p>
											</div>
											<div class="col-12 text-left">
												<p class="card-text">
													<b>Contacto:</b>
													<br><i class="fa fa-envelope fa-fw"></i><a href="mailto:' . $Sucursal['correo'] . '">' . $Sucursal['correo'] . '</a>
													<br><i class="fa fa-phone fa-fw"></i><a href="tel:' . str_replace(" ", "", $Sucursal['telefono']) . '"> ' . $Sucursal['telefono'] . '</a>
												</p>
											</div>
											<div class="col-12">
												<br>
												<a href="https://www.google.com/maps/place/' . $Sucursal['mapa_cel'] . '" target="_blank" class="btn btn-danger"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<br>
										<div class="map-responsive">
											<iframe src="https://www.google.com/maps/embed?pb=' . $Sucursal['mapa'] . '" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
										</div>
									</div>
									<br>
								</div>
							</div>
						</div>
						<br>
						';
					}
					?>

				</div>
			</div>
		</div>

	</div>
	<!-- End content -->

	<?php include("assets/common/footer.php"); ?>
</body>

</html>