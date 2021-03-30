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
			<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="position: fixed; filter: opacity(0.2); left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); padding: 0px 5px 0px 2px;;">
			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">
					<div class="card bg-light text-dark shadow mt-2 md-2">
						<h1><i class="fas fa-book-open"></i><b> Catalogos</b></h1>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<?php
							$querySucursal = "SELECT DISTINCT Sucursal FROM tab_catalogo";
							$rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
							while ($Sucursal = mysqli_fetch_array($rsSucursal)) {
								echo '
							<div class="card bg-light text-dark shadow">
								<h1><i class="fas fa-store"></i><b> ' . $Sucursal['Sucursal'] . '</b></h1>
							</div>
							<br>
							';

							?>
								<div class="carousel" style="background: transparent;" data-flickity='{ "draggable": true,
									"autoPlay": true,
									"bgLazyLoad": true,
									"autoPlay": 2000,
									"freeScroll": true,
									"wrapAround": true,
									"contain": true,
									"prevNextButtons": true,
									"pageDots": false}'>

								<?php
								$queryCatalogo = "SELECT * FROM tab_catalogo WHERE Sucursal = '" . $Sucursal['Sucursal'] . "'";
								$rsCatalogo = mysqli_query($con, $queryCatalogo) or die("Error de consulta");
								while ($Catalogo = mysqli_fetch_array($rsCatalogo)) {
									echo '
										<div class="carousel-catalogos" style="height: 400px !important">
											<center><a href="' . $Catalogo['href'] . '" target="_blank"><img src="assets/img/catalogos/' . $Catalogo['img'] . '" width="80%" class="img-responsive"></a></center>
											<span class="count-description">' . $Catalogo['desc'] . '</span>
										</div>
										';
								}
								echo '
							</div>
							<br>
							';
							}
								?>
								</div>

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