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

					<div class="card bg-light text-dark shadow mb-3 mt-3">
						<div class="card-body">

							<div class="row">
								<div class="col-12">
									<h2><b>Horarios de Servicio</b> <i class="far fa-clock"></i></h2>
									<h6>Lunes a Viernes 8:30 AM - 6:30 PM<br>Sabados 8:30 AM - 2:00 PM</h6>
								</div>
							</div>

						</div>
					</div>
					<div class="row">

						<?php
						$querySucursal = "SELECT nombre_sucursal FROM tab_sucursal ORDER BY nombre_sucursal DESC";
						$rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
						while ($Sucursal = mysqli_fetch_array($rsSucursal)) {
							echo '
						<div class="col-6">
							<div class="card shadow" onclick="abrir(' . "'" . $Sucursal["nombre_sucursal"] . "'" . ')" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-store"></i>
								</h1>
								<h3 class="card-title" >
									<b>
									 Tienda <br>' . str_replace("Tienda ", "", $Sucursal['nombre_sucursal']) . '
									</b>
								</h3>
							</div>
						</div>
						<br>
						';
						}
						?>

					</div>
				</div>
			</div>

		</div>
		<br>

	</div>
	<!-- End content -->

	<!-- The Modal -->
	<div class="modal fade" id="ModalSucursales">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"><b id="tituloModal"></b></h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<img class="img-suc" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Dirección:</b>
								<br><a id="directorioModal"> </a>
								<br><a id="coloniaModal"> </a>
								<br><a id="cpModal"> </a> <a id="municipioModal"> </a>
							</p>
						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Contacto:</b>
								<br><a class="emailModal" href="mailto:''" id="emailModal"></a>
								<br><a class="telefonoModal" href="tel:''" id="telefonoModal"></a>
							</p>
						</div>
						<br>
						<div class="col-12">
							<div class="map-responsive">
								<iframe class="mapaModal" src="" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</div>
							<br>
							<a href="" target="_blank" class="btn btn-danger mapacelModal"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Social Media Btn -->
	<script>
		function abrir(id) {
			$.ajax({
				url: "assets/controler/movil/getDirectorio.php",
				type: "post",
				data: {
					sucursal: id
				},
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj.status == "ok") {
						$("#tituloModal").html(obj.nombre_sucursal);
						$("#directorioModal").html(obj.direccion);
						$("#coloniaModal").html(obj.colonia);
						$("#cpModal").html("C.P. " + obj.codigo_postal + ",");
						$("#municipioModal").html(obj.municipio);
						$("#emailModal").html("<i class='fas fa-envelope'></i> " + obj.correo);
						$(".emailModal").attr("href", "mailto:'" + obj.correo + "'");
						$("#telefonoModal").html("<i class='fas fa-phone-alt'></i> " + obj.telefono);
						$(".telefonoModal").attr("href", "tel:'" + obj.telefono + "'");
						$(".mapaModal").attr("src", "https://www.google.com/maps/embed?pb=" + obj.mapa);
						$(".mapacelModal").attr("href", "https://www.google.com/maps/place/" + obj.mapa_cel);
						$(".img-suc").attr("src", "assets/img/" + obj.sucursal + "/" + obj.img);

						$('#ModalSucursales').modal({
							show: true
						});
					} else {
						alert("error");
					}
				}
			});
		}

		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
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

</html>