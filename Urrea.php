<?php include("assets/controler/conexion.php");
$Sucursal = "Urrea";

$queryWeb = "SELECT * FROM tab_web WHERE Sucursal = '" . $Sucursal . "'";
$rsWeb = mysqli_query($con, $queryWeb) or die("Error de consulta");
$Web = mysqli_fetch_array($rsWeb);

?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | <?php echo $Sucursal; ?></title>
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
							<div class="jumbotron jumbotron-fluid <?php echo $Sucursal; ?>">
								<div class="container">
									<a>
										<img <?php echo 'src="assets/img/' . $Sucursal . '/' . $Web['Img_logo'] . '"'; ?> class="img-fluid mx-auto d-block logo-miilwaukee">
									</a>
									<h1 class="wow  slideInDown" style="visibility: visible; animation-name: slideInDown;"><b><?php echo $Web['Titulo']; ?></b></h1>
									<p class="lead intro-text wow  slideInUp" style="visibility: visible; color: white; animation-name: slideInUp;"><?php echo $Web['Sub_titulo']; ?></p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Section 1 -->
			<div class="section-1-container section-container-gray-bg" id="section-1">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<h2 style="color:black; text-align: center;"><b><?php echo $Web['Slogan']; ?></b></h2>
							<h3 class="caption">Nuestra mayor prioridad es satisfacer la necesidad al cliente con nuestra extensa gama en herramientas a la hora de adquirir su herramienta.</h3>
						</div>
					</div>
				</div>
			</div>

			<!-- Section 2 -->
			<div class="section-2-container section-container section-container-gray-bg" id="section-2">

				<div class="card bg-secondary tarjeta-tienda card-productos">
					<div class="card-body border-left-danger">
						<h1 class="display-3 text-white ">Productos</h1>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-12">

							<div class="col-md-12" id="panel">
								<h2 class="white">&nbsp;
									<br>&nbsp;
									<br>&nbsp;
								</h2>
							</div>
							<h3 class="caption">Somos una empresa distribuidora de la marca <?php echo $Sucursal; ?>, nuestro extenso catálogo e inventarios en herramientas nos ayuda en la opción de brindarte varias alternativas al momento de adquirir tu herramienta de trabajo.</h3>

							<div class="row">

								<div class="col-12">
									<!-- Carusel/slider marcas -->
									<div class="carousel" style="background: transparent;" data-flickity='{ "draggable": true,
									"autoPlay": true,
									"bgLazyLoad": true,
									"autoPlay": 2000,
									"freeScroll": true,
									"wrapAround": true,
									"contain": true,
									"prevNextButtons": false,
									"pageDots": true}'>

										<?php
										$queryCategoria = "SELECT * FROM tab_categoria WHERE Sucursal = '" . $Sucursal . "'";
										$rsCategoria = mysqli_query($con, $queryCategoria) or die("Error de consulta");
										while ($Categoria = mysqli_fetch_array($rsCategoria)) {
											echo '
										<div class="carousel-categorias">
											<div class="caja_8">
											<img class="rounded" src=" assets/img/categorias/' . $Categoria['Img'] . '" alt="' . $Categoria['Desc'] . '">
												<div class="ovrly"></div>
												<div class="buttons">
													<a class="fa" href="' . $Categoria['Href'] . '" target="_blank"><button type="button" class="btn btn-danger">
													<i class="fas fa-link"></i><br>Ver Productos</button></a>
												</div>
											</div>
											<h4 class="mt-2"><kbd>' . $Categoria['Desc'] . '</kbd></h4>
										</div>
										';
										}
										?>
									</div>

								</div>

							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Section 3 -->
			<div class="section-3-container section-container section-container-gray-bg" id="section-3">

				<div class="card bg-secondary tarjeta-tienda card-catalogo">
					<div class="card-body">
						<h1 class="display-3 text-white ">Nuestros Catálogos</h1>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-12">

							<div class="col-md-12" id="panel">
								<h2 class="white">&nbsp;</h2>
								<h3 class="caption"><?php echo $Web['Sub_slogan']; ?></h3>
							</div>

							<div class="row">

								<div class="col-12">
									<!-- Carusel/slider marcas -->
									<div class="carousel" style="background: transparent;" data-flickity='{ "draggable": true,
									"autoPlay": true,
									"bgLazyLoad": true,
									"autoPlay": 2000,
									"freeScroll": true,
									"wrapAround": true,
									"contain": true,
									"prevNextButtons": false,
									"pageDots": true}'>

										<?php
										$queryCatalogo = "SELECT * FROM tab_catalogo WHERE Sucursal ='" . $Sucursal . "'";
										$rsCatalogo = mysqli_query($con, $queryCatalogo) or die("Error de consulta");
										while ($Catalogo = mysqli_fetch_array($rsCatalogo)) {
											echo '
										<div class="carousel-catalogos">
											<center><a href="' . $Catalogo['href'] . '" target="_blank"><img src="assets/img/catalogos/' . $Catalogo['img'] . '" width="80%" class="img-responsive"></a></center>
											<span class="count-description">' . $Catalogo['desc'] . '</span>
										</div>
										';
										}
										?>
									</div>

								</div>

							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Section 4 -->
			<div class="section-4-container section-container" id="section-4" style="padding-bottom: 0px; border-top: 5px solid #dc3545!important;">

				<div class="card bg-secondary tarjeta-tienda mt-4 card-sucursal" style="top: -80px;">
					<div class="card-body">
						<h1 class="display-3 text-white ">Sucursal <?php echo $Sucursal; ?></h1>
					</div>
				</div>


				<div class="container">
					<div class="row">
						<div class="col-12">

							<div class="col-md-12" id="panel">
								<h2 class="white">&nbsp;</h2>
								<h3 class="caption">&nbsp;</h3>
							</div>

						</div>


						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<img <?php echo 'src="assets/img/' . $Sucursal . '/' . $Web['Img_sucursal'] . '"'; ?> class="img-fluid mx-auto d-block wow slideInLeft">
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="wow slideInRight" data-wow-offset="10" style="visibility: visible; animation-name: slideInLeft;">
								<h2><b>Mayoreo Ferretero Atlas</b></h2>
								<h3 class="caption gray">Distribuidor Autorizado <?php echo $Sucursal; ?>.</h3>
								<p style="text-align:justify;"><?php echo $Web['Mfa_texto']; ?></p>
							</div>

						</div>
					</div>
				</div>

				<!-- Section 5 -->
				<div class="section-5-container section-container" id="section-5">

					<div class="card bg-secondary mt-4 tarjeta-tienda card-galeria">
						<div class="card-body">
							<h1 class="display-3 text-white ">Galeria</h1>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-12">

								<div class="col-md-12" id="panel">
									<h2 class="white"><b>&nbsp;
											<br>&nbsp;
											<br>&nbsp;
										</b></h2>
									<h3 class="caption">Nuestro principal objetivo es permanecer siempre a la vanguardia y ofrecerte las mejores herramientas y el mejor servicio.</h3>
								</div>

							</div>


							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<div class="container-fluid">
									<!-- Carusel/slider marcas -->
									<div class="carousel" style="background: transparent;" data-flickity='{ "draggable": true,
										"autoPlay": true,
										"bgLazyLoad": true,
										"autoPlay": 2000,
										"freeScroll": true,
										"wrapAround": true,
										"contain": true,
										"prevNextButtons": true,
										"pageDots": true}'>

										<?php
										$queryGaleria = "SELECT * FROM tab_galeria WHERE Sucursal ='" . $Sucursal . "'";
										$rsGaleria = mysqli_query($con, $queryGaleria) or die("Error de consulta");
										$Galeria = mysqli_fetch_array($rsGaleria);

										if ($Galeria['Img0'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img0'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img1'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img1'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img2'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img2'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img3'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img3'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img4'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img4'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img5'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img5'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img6'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img6'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
										if ($Galeria['Img7'] != null) {
											echo '
											<div class="carousel-galeria">
												<img class="rounded" src="assets/img/' . $Galeria['Sucursal'] . '/galeria/' . $Galeria['Img7'] . '" style="width:100%; height: 250px; border-radius: 15px;">
											</div>';
										}
									 

										?>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 40px;">
								<?php
								$queryFacebook = "SELECT * FROM tab_facebook WHERE Sucursal ='" . $Sucursal . "'";
								$rsFacebook = mysqli_query($con, $queryFacebook) or die("Error de consulta");
								while ($Facebook = mysqli_fetch_array($rsFacebook)) {
									echo '
									<iframe src="' . $Facebook['Url'] . '" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
									';
								}
								?>
							</div>


						</div>
					</div>
				</div>

				<!-- Section 6 -->

				<div class="section-6-container section-container section-container-image-bg" id="section-6" style="border-top: 5px solid #dc3545!important; border-bottom: 5px solid #dc3545!important;">

					<div class="card bg-secondary mt-4 tarjeta-tienda card-mapa" style="top: -80px;">
						<div class="card-body">
							<h1 class="display-3 text-white ">Mapa</h1>
						</div>
					</div>
					<div class="container">
						<div class="row">



							<div class="col-12">

								<div class="col-md-12">
									<h2 class="white">&nbsp;</h2>
									<h3 class="caption" style="color: white !important;">Estamos a la orden para atender tus dudas, visitanos en nuestra sucursal.</h3>
								</div>

								<div class="map-responsive">
									<?php
									$queryMapa = "SELECT * FROM tab_sucursal WHERE nombre_sucursal = 'Tienda " . $Sucursal . "'";
									$rsMapa = mysqli_query($con, $queryMapa) or die("Error de consulta");
									$Mapa = mysqli_fetch_array($rsMapa);
									?>
									<iframe src="https://www.google.com/maps/embed?pb=<?php echo $Mapa['mapa']; ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
								<br>
								<a href="https://www.google.com/maps/place/<?php echo $Mapa['mapa_cel']; ?>" target="_blank" class="btn btn-danger"><i class="fas fa-map-marker-alt"></i> Ver el mapa de Google</a>
							</div>
						</div>
					</div>
				</div>


				<footer id="footer-container">
					<div class="container">
						<div class="row text-center">
							<div class="col-md-6 segment">
								<a href="<?php echo $Sucursal; ?>">
									<h2>
										<!-- replace with your brand logo/text -->
										<center><img <?php echo 'src="assets/img/' . $Sucursal . '/' . $Web['Img_logo-back'] . '"'; ?> width="40%" alt="<?php echo $Sucursal; ?>" title="<?php echo $Sucursal; ?>" class="img-responsive">
											<center>
											</center>
										</center>
									</h2>
								</a>
							</div><!-- /.col-md-6 -->
							<div class="col-md-6 social segment">
								<p><b><?php echo $Mapa['direccion']; ?>
										<br> <?php echo $Mapa['colonia']; ?>, C.P. <?php echo $Mapa['codigo_postal']; ?>
										<br> <?php echo $Mapa['municipio']; ?>
								</p></b>

								<p><b><i class="fa fa-envelope fa-fw"></i> <?php echo '<a href="mailto:' . $Mapa['correo'] . '">' . $Mapa['correo'] . '</a>'; ?><br>
										<i class="fa fa-phone fa-fw"></i> <?php echo '<a  href="tel:' . str_replace(" ", "", $Mapa['telefono']) . '"> ' . $Mapa['telefono'] . '</a>'; ?>
								</p></b>

							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->

					</div><!-- /.container -->

				</footer>

				<?php include("assets/common/footer.php"); ?>

				<div class="social-button telefono-button active"><?php echo '<a  href="tel:' . str_replace(" ", "", $Mapa['telefono']) . '"><i class="fa fa-phone fa-fw"></i></a>'; ?></div>

			</div>
			<!-- End content -->

		</div>
		<!-- End wrapper -->

</body>

</html>