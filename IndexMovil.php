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
						<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="max-width: 25% !important;">
					</a>
					<p class="lead">
						<img src="assets/img/logo/logo-mfa.png" class="img-fluid mx-auto d-block">
					</p>
					<div class="row">
						<div class="col-6">
							<a class="link" href="index">
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
							<a class="link" href="CatalogoMovil">
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
							</a>
						</div>
						<div class="col-6">
							<a class="link" href="ContactoMovil">
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
							</a>
						</div>
						<div class="col-6">
							<a class="link" href="BolsaMovil">
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
							</a>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer-container" style="bottom: 0; left: 0; position: absolute; width: 100%;">
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
<div class="modal fade" id="ModalPromociones">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<div class="row">
					<div class="col-12">
						<h4 class="modal-title"><b>Suscribete a nuestras promociones</b></h4>
						<button style="right: 15px; top: 0; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
						<br>
					</div>
					<div class="col-12">
						<form>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Nombre Completo">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Correo">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Teléfono">
							</div>
							<button type="button" class="btn btn-outline-danger">Suscribirse</button>
							<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Clancelar</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


</html>