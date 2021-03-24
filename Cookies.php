<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Nosotros</title>
</head>
<script src="assets/js/cookietool.js"></script>
<script>
	CookieTool.Config.set('link', 'cookies.html');
	CookieTool.API.ask();
</script>
<link rel="stylesheet" href="assets/css/cookietool.css">

<body>
	<div class="cookietool-message cookietool-message-top">
		<p>En este sitio se usan cookies para ofrecer una experiencia más personalizada. <a href="Cookies" target="_blank"><b>Más información</b></a>. ¿Aceptas usar cookies?</p><button type="button" class="btn btn-outline-danger" data-action="agree">Sí</button> <button type="button" class="btn btn-outline-danger" data-action="decline">No</button>
	</div>

	<?php print_r($_COOKIE); ?>
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
									<h1><br><i class="fas fa-cookie-bite"></i></h1>
									<h2>
										<b>COOKIES</b>
									</h2>
									<h3 class="text-justify">
										Las cookies son archivos con una pequeña cantidad de datos que se utilizan comúnmente como identificadores únicos anónimos. Estos se envían a su navegador desde los sitios web que visita y se almacenan en la memoria interna de su dispositivo.
										<br>Este <b>SERVICIO</b> no utiliza estas "cookies" explícitamente. Sin embargo, la aplicación puede utilizar código de terceros y bibliotecas que utilizan "cookies" para recopilar información y mejorar sus servicios. Tiene la opción de aceptar o rechazar estas cookies y saber cuándo se envía una cookie a su dispositivo. Si decide rechazar nuestras cookies, es posible que no pueda utilizar algunas partes de este <b>SERVICIO</b>.
										<br>
										<br>Cookies utilizadas en nuestra web y la finalidad de las mismas.
										<br> ● Google analytics: cuya finalidad es cuantificar el número de usuarios y así realizar la medición y análisis estadístico de la utilización que hacen los usuarios de los servicios prestados. Se trata de unas cookies gestionadas por Google, y contiene tanto cookies de sesión como persistentes. Puede encontrar más información sobre estas cookies visitando el siguiente enlace:
										<a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage.</a>
										<br> ● Cookies de Redes Sociales: Cuya finalidad es proporcionar acceso a los servicios que <b>Mayoreo Ferretero Atlas</b> ofrece en las mismas.
									</h3>
									<h1><br><i class="fas fa-cog"></i></h1>
									<h2>
										<b>CONFIGURACIÓN</b>
									</h2>
									<h3 class="text-justify">
										<div id="cookietool-settings"></div>
									</h3>
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