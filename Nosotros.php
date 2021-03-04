<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Nosotros</title>
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
							<div class="jumbotron jumbotron-fluid" style="background-color: #dc3545;">
								<div class="container">
									<a>
										<img src="assets/img/Logo/logo.png" class="img-fluid mx-auto d-block logo-mfa">
									</a>
									<p class="lead">
										<img src="assets/img/Logo/logo-mfa.png" class="img-fluid mx-auto d-block">
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
									<img src="assets/img/ph.jpg" class="img-fluid mx-auto d-block wow slideInUp">
								</div>
								<div class="col-12 text-center wow slideInUp">
									<h1><b>Mayoreo Ferretero Atlas S.A. de C.V.</b></h1>
								</div>
							</div>

						</div>
					</div>

					<div class="card bg-light text-dark shadow mb-3 mt-3">
						<div class="card-body">

							<div class="row">
								<div class="col-12">
									<h1><i class="fas fa-users"></i></h1>
									<h3>Somos una empresa de Distribución Mayorista , líder en la Industria, Ramo Ferretero, Automotriz y Eléctrico. Especialistas en todo tipo de Industria. Nuestra permanencia y trayectoria en el mercado nos proporciona una alta experiencia que nos avala como una empresa preocupada por la calidad y el servicio en nuestros productos, que complementamos con un rápido, eficaz y excelente precio.
									</h3>
								</div>
							</div>

						</div>
					</div>

					<div class="card bg-light text-dark shadow mb-3 mt-3">
						<div class="card-body">

							<div class="row">
								<div class="col-lg-2 col-sm-12">
									<img src="assets/img/Logo/logo.png" class="img-fluid mx-auto d-block logo-shop wow  slideInLeft">
								</div>
								<div class="col-lg-10 col-sm-12 text-left wow slideInRight">
									<h3>Un Inventario de más de 30,000 artículos, servicio de urgencia, calidad y asesoría técnica, son nuestra carta de presentación.
										Trabajando de la mano con nuestros proveedores y una fuerza de ventas que se encuentra en constante capacitación para brindar el servicio que se requiera. Es por eso que actualmente Mayoreo Ferretero Atlas es considerada una empresa que cuenta con la mejor mezcla de precio, servicio, variedad de productos y surtido.
									</h3>
								</div>
							</div>

						</div>
					</div>

					<div class="card bg-light text-dark shadow mb-3 mt-3">
						<div class="card-body">

							<div class="row">

								<div class="col-lg-4 col-sm-12 col-md-12 wow  slideInLeft">
									<h1><b>Misión</b></h1>
									<h1><i class="fas fa-bullseye"></i></h1>
									<h4>Somos un empresa con cobertura Nacional en la comercialización de herramientas y suministro industriales de marcas líderes en el mercado, creando una experiencia de compra y buscando exceder las expectativas de nuestros clientes, potencializando el talento y desarrollo colectivo.</h4>
								</div>

								<div class="col-lg-4 col-sm-12 col-md-12 wow  slideInUp">
									<h1><b>Valores</b></h1>
									<h1><i class="fas fa-hands-helping"></i></h1>
									<h4><b>ORIENTACIÒN AL SERVICIO</b></h4>
									<h4><b>INTEGRIDAD</b></h4>
									<h4><b>COMPROMISO</b></h4>
									<h4><b>ADAPTABILIDAD</b></h4>
									<h4><b>INNOVACIÒN</b></h4>
									<h4><b>CONSTANCIA</b></h4>
								</div>

								<div class="col-lg-4 col-sm-12 col-md-12 wow slideInRight">
									<h1><b>Visión</b></h1>
									<h1><i class="far fa-eye"></i></h1>
									<h4>Seguiremos siendo una empresa dinámica, reinventándonos las veces que sean necesarias para crecer de la mano de nuestros clientes y proveedores. Siendo buscadores de talento, anteponiendo el trato humano de calidad con calidez, excediendo las expectativas de nuestros clientes.</h4>
								</div>

							</div>
						</div>
					</div>


				</div>
			</div>


		</div>


		<?php include("assets/common/footer.php"); ?>

	</div>
	<!-- End content -->

	</div>
	<!-- End wrapper -->

	<script type="text/javascript">
		$(function() {

			//PDF
			$('#imgPDF').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && ext == "pdf") {
					$('.Img-PDF').attr('src', 'assets/img/ok.gif');
					Swal.fire(
						"Mensaje de confirmación",
						"PDF cargado!!.",
						"success"
					);
				} else {
					$('.Img-PDF').attr('src', 'assets/img/pdf.gif');
					$('#imgPDF').val('');
					Swal.fire(
						"Mensaje de confirmación",
						"Error: Solo se admiten PDF",
						"error"
					);
				}
			});

		});
	</script>

</body>

</html>