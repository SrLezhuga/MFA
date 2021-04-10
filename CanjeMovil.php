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
					<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="position: fixed; filter: opacity(0.2); left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); padding: 0px 5px 0px 2px;;">

					<div class="row">
						<div class="col-12 text-left" style="margin-top: 10px;">
							<a value="Página anterior" onClick="history.go(-1);">
								<div class="btn btn-outline-light text-dark btn-customized" style="top: 10px; left: 10px;">
									<i class="fas fa-arrow-left"></i>
								</div>
							</a>
							<h1 style="margin-top: 0; margin-bottom: 0;"><b>Centro de canje</b></h1>
						</div>
						<div class="col-12 text-left">
							<div class="card border-left-danger shadow" onclick="codigo()">
								<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-sm mb-1"><b>Canjear Codigo</b></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-chevron-right"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 text-left">
							<!-- Canje -->
							<div class="row text-center" id="precarga-cupones"></div>
							<br>
						</div>

					</div>
					<br>
				</div>
				<br>

			</div>

		</div>

</body>


<!-- The Modal -->
<div class="modal fade" id="ModalCodigo">
	<div class="modal-dialog modal-sm modal-dialog-centered ">
		<div class="modal-content border-left-danger">

			<!-- Modal Header -->
			<div class="modal-header">
				<div class="row">
					<div class="col-12">
						<h4 class="modal-title"><b>Ingresa Código</b></h4>
						<button style="right: 15px; top: 0; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
						<br>
					</div>
					<div class="col-12">
						<div class="form-group">
							<input type="text" class="form-control" id="usr">
							<br>
						</div>
					</div>
					<div class="col-6">
						<button type="button" class="btn btn-outline-danger btn-block" onclick="canjear()">Canjear</button>
					</div>
					<div class="col-6">
						<button type="button" class="btn btn-outline-dark btn-block" data-dismiss="modal">Clancelar</button>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

</html>

<script>
	$(document).ready(function() {
		$.ajax({
			type: "POST",
			url: "assets/controler/movil_cupon/getCupon.php",
			dataType: "html",
			success: function(data) {
				$("#precarga-cupones").empty();
				$("#precarga-cupones").append(data);

			}
		});
	});

	function codigo() {
		$("#ModalCodigo").modal("toggle");
	}
</script>