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
					<div class="col-12 text-left" style="margin-top: 10px;">
						<a value="Página anterior" onClick="history.go(-1);">
							<div class="btn btn-outline-light text-dark btn-customized" style="top: 10px; left: 10px;">
								<i class="fas fa-arrow-left"></i>
							</div>
						</a>
						<h1 style="margin-top: 0; margin-bottom: 0;"><b>Catalogos</b></h1>
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

</body>

</html>