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

		<?php include("assets/common/sidebarMovil.php"); ?>

		<!-- Content -->
		<div class="content">
			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">
					<div class="col-12 text-left" style="margin-top: 10px;">
						<h1 style="margin-top: 0; margin-bottom: 0;"><b>Inicio</b></h1>
					</div>
					<br>
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

		function suscripcion() {
			var formData = new FormData();
			var sus_nombre = $("#Sus_Nombre").val();
			var sus_correo = $("#Sus_Correo").val();
			var sus_telefono = $("#Sus_Telefono").val();

			if ($('#Sus_Nombre').val().length == 0) {
				Swal.fire(
					"Mensaje de alerta",
					"El campo nombre esta vacío.",
					"error"
				);
				return false;
			}
			if ($("#Sus_Correo").val().indexOf('@', 0) == -1 || $("#Sus_Correo").val().indexOf('.', 0) == -1) {
				Swal.fire(
					"Mensaje de alerta",
					"El correo electrónico introducido no es correcto.",
					"error"
				);
				return false;
			}
			if ($('#Sus_Telefono').val().length != 10 || isNaN($('#Sus_Telefono').val())) {
				Swal.fire(
					"Mensaje de alerta",
					"El número de teléfono debe tener al menos 10 números.",
					"error"
				);
				return false;
			}

			formData.append("sus_nombre", sus_nombre);
			formData.append("sus_correo", sus_correo);
			formData.append("sus_telefono", sus_telefono);

			$.ajax({
				url: "assets/controler/movil/carga.php",
				type: "post",
				data: formData,
				contentType: false,
				processData: false,
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj.status == "ok") {
						Swal.fire(
							"Mensaje de confirmación",
							obj.msg,
							"success"
						);
					} else {
						Swal.fire(
							"Mensaje de alerta",
							obj.msg,
							"error"
						);
					}
				}
			});
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
	<div class="modal-dialog modal-sm modal-dialog-centered">
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
								<input type="text" class="form-control" placeholder="Nombre Completo" id="Sus_Nombre">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>
								<input type="email" class="form-control" placeholder="Correo" id="Sus_Correo">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
								</div>
								<input type="tel" class="form-control" placeholder="Teléfono/Whatsapp" id="Sus_Telefono">
							</div>
							<button type="button" class="btn btn-outline-danger" onclick="suscripcion()">Suscribirse</button>
							<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Clancelar</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


</html>