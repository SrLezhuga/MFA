<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Inicio</title>
</head>

<body>
	<script src="assets/js/loader.js"></script>

	<!-- Loader -->
	<div class="lds-ring loader-in" id="loader">
		<img border="0" class="mx-auto d-block" alt="Mayoreo Ferretero" src="assets/img/logo/logo.png" width="100px" height="100px" ;>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>

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


							<div class="row hero">
								<div class="col-lg-2 col-sm-12">
									<a>
										<img src="assets/img/logo/CARRITO-DE-COMPRAS.png" class="img-fluid mx-auto d-block logo-shop wow  slideInLeft">
									</a>

								</div>
								<div class="col-lg-10 col-sm-12">
									<h2 class="white wow  slideInRight"><b>Visita nuestra tienda en linea!</b></h2>
									<br>
									<a href="https://mechanicshop.com.mx/" class="btn btn-outline-danger btn-block btn-lg wow  slideInRight" role="button">
										<i class="fas fa-shopping-cart"></i> Ir a la tienda</a>


								</div>
							</div>


						</div>
					</div>




				</div>
			</div>

			<!-- Section 2 -->
			<div class="section-2-container section-container" id="section-2">

				<div class="card bg-secondary tarjeta-tienda">
					<div class="card-body">
						<h1 class="display-3 text-white ">Sucursales</h1>
					</div>
				</div>

				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="col-md-12" id="panel">
								<h2 class="white">&nbsp;</h2>
							</div>
							<!-- Carusel/slider marcas -->
							<div class="carousel" data-flickity='{ "draggable": true,
							"autoPlay": true,
							"bgLazyLoad": true,
							"autoPlay": 2000,
							"freeScroll": true,
							"wrapAround": true,
							"contain": true,
							"prevNextButtons": false,
							"pageDots": false}'>

								<?php
								$queryBannerSucursal = "SELECT * FROM tab_banner_sucursal";
								$rsBannerSucursal = mysqli_query($con, $queryBannerSucursal) or die("Error de consulta");
								while ($BannerSucursal = mysqli_fetch_array($rsBannerSucursal)) {
									echo '
									<div class="carousel-cell">
										<a href="' . $BannerSucursal['Url'] . '">
											<img border="0" src="assets/img/banners/' . $BannerSucursal['Url_imagen'] . '" alt="' . $BannerSucursal['Url'] . '" title="' . $BannerSucursal['Url'] . '" width="100%" height="100%">
										</a>
									</div>
								';
								}
								?>

							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Section 5 -->
			<div class="section-5-container section-container" id="section-5" style="padding-bottom: 0;">
				<div class="container">

					<div class="card bg-secondary social-card mt-4 ">
						<div class="card-body">
							<h1 class="display-3 text-white ">Redes sociales</h1>
						</div>
					</div>
					<br>

					<div class="row">


						<div class="col-md-8 col-sm-12 col-lg-8 offset-md-2 ">

							<!-- Carusel/slider marcas -->
							<div class="carousel y2carousel" data-flickity='{ "draggable": false,
							"autoPlay": false,
							"bgLazyLoad": true,
							"autoPlay": 5000,
							"freeScroll": true,
							"wrapAround": true,
							"contain": true,
							"prevNextButtons": true,
							"pageDots": true}'>

								<?php
								$queryYoutube = "SELECT * FROM tab_youtube ORDER BY posicion ASC";
								$rsYoutube = mysqli_query($con, $queryYoutube) or die("Error de consulta");
								while ($Youtube = mysqli_fetch_array($rsYoutube)) {
									echo '
								<div class="carousel-video">
									<iframe class="y2play" type="text/html" src="https://www.youtube.com/embed/' . $Youtube['Url'] . '" allowfullscreen></iframe>
								</div>
								';
								}
								?>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-lg-6" style="top: 35px; margin-bottom: 45px;">

							<?php
							$queryFacebook = "SELECT * FROM tab_facebook WHERE Sucursal = 'Mayoreo'";
							$rsFacebook = mysqli_query($con, $queryFacebook) or die("Error de consulta");
							while ($Facebook = mysqli_fetch_array($rsFacebook)) {
								echo '
								<iframe src="' . $Facebook['Url'] . '" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
								';
							}
							?>

						</div>
						<div class="col-md-6 col-sm-12 col-lg-6" style="top: 35px; margin-bottom: 45px;">
							<a href="Bolsa">
								<img src="assets/img/bolsa.png" class="img-fluid mx-auto d-block" style="width: 340px; height: 130px;">
							</a>
						</div>

					</div>
				</div>
			</div>


			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<!-- Carusel/slider marcas -->
						<div class="carousel" data-flickity='{ "draggable": true,
							"autoPlay": true,
							"bgLazyLoad": true,
							"autoPlay": 2000,
							"freeScroll": true,
							"wrapAround": true,
							"contain": true,
							"prevNextButtons": false,
							"pageDots": false}'>

							<?php
							$queryMarcas = "SELECT * FROM tab_marca";
							$rsMarcas = mysqli_query($con, $queryMarcas) or die("Error de consulta");
							while ($Marcas = mysqli_fetch_array($rsMarcas)) {
								echo '
									<div class="carousel-marca">
										<a href="' . $Marcas['Link'] . '" target="_blank">
											<img border="0" src="assets/img/marcas/' . $Marcas['Img_url'] . '" alt="' . $Marcas['Nombre'] . '" title="' . $Marcas['Nombre'] . '" width="100%" height="auto">
										</a>
									</div>
								';
							}
							?>

						</div>
					</div>
				</div>
			</div>

			<!-- Section 6 -->
			<div class="section-6-container section-container section-container-image-bg" id="section-6" style="border-top: 5px solid #dc3545!important;">
				<div class="container">
					<div class="card bg-secondary store-card">
						<div class="card-body">
							<h1 class="display-3 text-white">Nuestra App</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a data-toggle="tooltip" title="PROXIMAMENTE" data-placement="top">
								<img alt="App Store" src="assets/img/ios.png" class="store wow  slideInLeft">
							</a>
						</div>
						<br>
						<div class="col-md-6">
							<a href="https://play.google.com/store/apps/details?id=com.webmfa.movil" target="_blank"  data-toggle="tooltip" title="DESCARGAR" data-placement="top">
								<img alt="Play Store" src="assets/img/android.png" class="store wow  slideInRight">
							</a>
						</div>
					</div>
				</div>
			</div>

			<?php include("assets/common/footer.php"); ?>



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

		</div>
		<!-- End wrapper -->
	</div>
	<!-- End wrapper -->
	<script>
		$(document).ready(function() {
			$("#ModalPromociones").modal("toggle");
		});
	</script>

</body>

</html>