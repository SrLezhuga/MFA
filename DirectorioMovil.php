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

		<!-- Content -->
		<div class="content">



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
					<div class="row">

						<?php
						$querySucursal = "SELECT * FROM tab_sucursal ORDER BY nombre_sucursal DESC";
						$rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
						while ($Sucursal = mysqli_fetch_array($rsSucursal)) {
							echo '
						<div class="col-6">
							<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-store"></i>
								</h1>
								<h3 class="card-title">
									<b>
									 Tienda <br>' . str_replace("Tienda", "", $Sucursal['nombre_sucursal']) . '
									</b>
								</h3>
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

	</div>
	<!-- End content -->

	<!-- Social Media Btn -->
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	<div class="plus-button"></div>

	<?php
	$querySocial = "SELECT * FROM tab_social";
	$rsSocial = mysqli_query($con, $querySocial) or die("Error de consulta");
	while ($Social = mysqli_fetch_array($rsSocial)) {
		echo '
        <div class="social-button ' . $Social['red_social'] . '-button"><a data-toggle="tooltip" title="' . ucfirst($Social['red_social']) . '" data-placement="left" href="' . $Social['Url_social'] . '" target="_blank"><i class="fab fa-' . $Social['red_social'] . '"></i></a></div>
    ';
	}
	?>
</body>

</html>