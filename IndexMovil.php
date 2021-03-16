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
					<br>
					<a>
						<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="max-width: 30% !important;">
					</a>
					<p class="lead">
						<img src="assets/img/logo/logo-mfa.png" class="img-fluid mx-auto d-block">
					</p>
					<div class="row">
						<div class="col-6">
							<a class="link" href="index" target="_blank">
								<div class="card shadow" onclick="web()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-globe"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Página Web
										</b>
									</h3>
								</div>
							</a>
						</div>
						<div class="col-6">
							<div class="card shadow" onclick="promociom()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-search-dollar"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Promociones
									</b>
								</h3>
							</div>
						</div>
						<div class="col-6">
							<a class="link" href="DirectorioMovil">
								<div class="card shadow" onclick="sucursal()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-store"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Sucursales
										</b>
									</h3>
								</div>
							</a>
						</div>
						<div class="col-6">
							<div class="card shadow" onclick="catalogo()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-book-open"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Catálogos
									</b>
								</h3>
							</div>

						</div>
						<div class="col-6">

							<div class="card shadow" onclick="contacto()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-comments"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Contáctanos
									</b>
								</h3>
							</div>

						</div>
						<div class="col-6">
							<div class="card shadow" onclick="bolsa()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-user-tie"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Reclutamiento
									</b>
								</h3>
							</div>

						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer-container">
		<div class="copynote bg-dark text-white border border-right-0 border-bottom-0 border-left-0 " style="border-top: 5px solid #dc3545!important;">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						© <script>
							var f = new Date();
							document.write(f.getFullYear());
						</script> Mayoreo Ferretero.<br> Todos los derechos Reservados.
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.copynote -->
	</footer>

	<!-- End content -->

	<script>
		function web() {
			Android.showWeb();
		}

		function promociom() {
			Android.showPromocion();
			$("#ModalPromociones").modal("toggle");
		}

		function sucursal() {
			Android.showSucursal();
		}

		function catalogo() {
			Android.showCatalogo();
		}

		function contacto() {
			Android.showContacto();
		}

		function bolsa() {
			Android.showBolsa();
		}
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
<!-- The Modal -->
<div class="modal" id="ModalPromociones">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content" style="background-color: transparent;">
			<button style="position: absolute; font-size: 30px; z-index: 2; right: 30px; top: 15px;" type="button" class="close" data-dismiss="modal">×</button>




			<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<?php
					$queryModalPromocion = "SELECT * FROM tab_modal_promocion WHERE Status = 'true' ORDER BY Id_promocion DESC";
					$rsModalPromocion = mysqli_query($con, $queryModalPromocion) or die("Error de consulta");
					while ($ModalPromocion = mysqli_fetch_array($rsModalPromocion)) {
						if ($ModalPromocion['Id_promocion'] == 1) {
							$active = "active";
						} else {
							$active = "";
						}
						echo '
									<div class="carousel-item ' . $active . ' data-interval="2000" ">
										<a href="' . $ModalPromocion['Url'] . '">
											<img src="assets/img/promocion/' . $ModalPromocion['Imagen_url'] . '" style="width:100%; border-radius: 15px;">
										</a>
									</div>
									';
					}
					?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>

</html>