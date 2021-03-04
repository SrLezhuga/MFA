<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Reclutamiento</title>
</head>

<body>

	<!-- Wrapper -->
	<div class="wrapper">

		<!-- Content -->
		<div class="content">

			<div class="container">
				<br>
				<div class="card bg-secondary mt-4 tarjeta-tienda">
					<div class="card-body">
						<h1 class="display-3 text-white ">Recusos Humanos</h1>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-2 mb-3">
						<ul class="nav nav-pills flex-column" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="RH-tab" data-toggle="tab" href="#RH" role="tab" aria-controls="RH" aria-selected="true">RH</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Bolsa-tab" data-toggle="tab" href="#Bolsa" role="tab" aria-controls="Bolsa" aria-selected="false">Bolsa Trabajo</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Reclutadores-tab" data-toggle="tab" href="#Reclutadores" role="tab" aria-controls="Reclutadores" aria-selected="false">Reclutadores</a>
							</li>
						</ul>
					</div>
					<!-- /.col-md-4 -->
					<div class="col-md-10 text-left">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="RH" role="tabpanel" aria-labelledby="RH-tab">
								<div class="row">
									<div class="col-10"></div>
									<div class="col-1">
										<button type="button" class="btn btn-outline-warning btn-block btn-archivar"><i class="fas fa-archive"></i></button>
									</div>
									<div class="col-1">
										<button type="button" class="btn btn-outline-danger btn-block btn-trash"><i class="fas fa-trash-alt"></i></button>
									</div>
									<div class="col-12" id="precarga-div"></div>
								</div>

								<script>
									$(document).ready(function() {
										$.ajax({
											type: "POST",
											url: "assets/controler/bolsa/precarga.php",
											dataType: "html",
											success: function(data) {
												$("#precarga-div").empty();
												$("#precarga-div").append(data);

											}
										});
									});
								</script>
							</div>
							<div class="tab-pane fade" id="Bolsa" role="tabpanel" aria-labelledby="Bolsa-tab">
								<!-- Vacante -->
								<?php include("assets/controler/vacante/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Reclutadores" role="tabpanel" aria-labelledby="Reclutadores-tab">
								<!-- Vacante -->
								<?php include("assets/controler/reclutador/config.php");  ?>
							</div>
						</div>
					</div>
					<!-- /.col-md-8 -->
				</div>

			</div>
			<!-- /.container -->

			<br>

		</div>

	</div>

	<!-- The Modal -->
	<div class="modal fade" id="modalArchivo">
		<div class="modal-dialog">
			<div class="modal-content border-left-danger shadow">

				<!-- Modal Header -->
				<div class="modal-header">
					<h3 class="modal-title">Archivados</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<div class="getArchivo"></div>
						</div>
					</div>

				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
						Cerrar</button>
				</div>

			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="modalTrash">
		<div class="modal-dialog">
			<div class="modal-content border-left-danger shadow">

				<!-- Modal Header -->
				<div class="modal-header">
					<h3 class="modal-title">Rechazados</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<div class="getTrash"></div>
						</div>
					</div>

				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
						Cerrar</button>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(' .btn-archivar').on('click', function() {
			$('.getArchivo').load('./assets/controler/bolsa/getArchivo.php', function() {
				$('#modalArchivo').modal({
					show: true
				});
			});
		});
		$('.btn-trash').on('click', function() {
			$('.getTrash').load('./assets/controler/bolsa/getTrash.php', function() {
				$('#modalTrash').modal({
					show: true
				});
			});
		});
	</script>
	<!-- End wrapper -->
	<script type="text/javascript">
		
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

</body>

</html>