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

					<div class="row">
						<div class="col-6">
							<a href="tel:">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-headset"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Ventas <br>Telemarketing
										</b>
									</h3>
								</div>
							</a>
						</div>
						<br>

						<?php
						$querySucursal = "SELECT nombre_sucursal, telefono FROM tab_sucursal ORDER BY nombre_sucursal DESC";
						$rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
						while ($Sucursal = mysqli_fetch_array($rsSucursal)) {
							$telefono = str_replace(" ", "", $Sucursal['telefono']);
							echo '
						<div class="col-6">
						<a href="tel:' . $telefono . '">
							<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-phone-alt"></i>
								</h1>
								<h3 class="card-title" >
									<b>
									 Tienda <br>' . str_replace("Tienda ", "", $Sucursal['nombre_sucursal']) . '
									</b>
								</h3>
							</div>
							</a>
						</div>
						<br>
						';
						}
						?>

					</div>
					<br>
				</div>
			</div>

		</div>
		<br>

	</div>
	<!-- End content -->

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