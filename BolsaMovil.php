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
			<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="position: fixed; filter: opacity(0.2); left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); padding: 0px 5px 0px 2px;;">
			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">
					<div class="col-12 text-left" style="margin-top: 10px;">
						<a value="Página anterior" onClick="history.go(-1);">
							<div class="btn btn-outline-light text-dark btn-customized" style="top: 10px; left: 10px;">
								<i class="fas fa-arrow-left"></i>
							</div>
						</a>
						<h1 style="margin-top: 0; margin-bottom: 0;"><b>Vacantes</b></h1>
					</div>
					<div class="row">
						<?php
						$queryBolsa = "SELECT Id, vacante FROM tab_vacantes WHERE visible = 'true' ORDER BY vacante ASC";
						$rsBolsa = mysqli_query($con, $queryBolsa) or die("Error de consulta");
						while ($Bolsa = mysqli_fetch_array($rsBolsa)) {
							echo '
							<div class="col-12">
								<div class="card shadow" onclick="bolsa(' . "'" . $Bolsa["Id"] . "'" . ')" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-user-tie"></i>
									</h1>
									<h3 class="card-title" >
										<b>
										' . $Bolsa['vacante'] . '
										</b>
									</h3>
								</div>
							</div>
						<br>
						';
						}
						?>
						<div class="col-12 text-left">
							<h1 style="margin-top: 0; margin-bottom: 0;"><b>Informes</b></h1>
						</div>
						<br>
						<div class="col-6">
							<div class="card shadow" onclick="reclutador1()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-user"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Lic. Carlos Grajeda
									</b>
								</h3>
							</div>
						</div>
						<div class="col-6">
							<div class="card shadow" onclick="reclutador2()" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
								<h1>
									<i class="fas fa-user"></i>
								</h1>
								<h3 class="card-title">
									<b>
										Lic. Stephany Lopez
									</b>
								</h3>
							</div>
						</div>
						<br>
					</div>
					<br>
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
							<img class="img-vacante" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" width="90%">
						</div>

						<div class="col-12 text-left">
							<p class="card-text"><b>Requisitos:</b>
								<br><a id="requisitosModal"></a>
							</p>
						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Ofrecemos:</b>
								<br><a id="ofrecemosModal"></a>
							</p>
						</div>
						<br>
						<div class="col-12">
							<center>
								<a href="Bolsa" class="btn btn-outline-danger mt-2" role="button"><i class="far fa-thumbs-up"></i> Postularme en la Web</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="ModalReclutador1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"><b>Lic. Carlos Grajeda</b></h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12 text-left">
							<p class="card-text"><b>Datos de contacto:</b>
								<br><a href="mailto:karlos@mayoreoferreteroatlas.com"><i class="far fa-envelope"></i> karlos@mayoreoferreteroatlas.com</a>
								<br><a href="tel:3318898437"><i class="fas fa-mobile-alt"></i> 33 1889 8437</a>
							</p>
						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Whatsapp:</b></p>
							<center>
								<a href="https://wa.me/523318898437?text=Quiero%20ser%20parte%20del%20equipo!" target="_blank" class="btn btn-outline-success mt-2" role="button"><i class="fab fa-whatsapp"></i> Informes</a>
							</center>

						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Facebooks:</b></p>
							<center>
								<a href="https://www.messenger.com/t/100040982919290/" target="_blank" class="btn btn-outline-primary mt-2 " role="button"><i class="fab fa-facebook-square"></i> RH Ferretero</a>
								<a href="https://www.messenger.com/t/100055884110792/" target="_blank" class="btn btn-outline-primary mt-2 " role="button"><i class="fab fa-facebook-square"></i> Atlas Tools</a>
							</center>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="ModalReclutador2">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"><b>Lic. Stephany Lopez</b></h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-12 text-left">
							<p class="card-text"><b>Datos de contacto:</b>
								<br><a href="mailto:fany@mayoreoferreteroatlas.com"><i class="far fa-envelope"></i> fany@mayoreoferreteroatlas.com</a>
								<br><a href="tel:33 2972 4073"><i class="fas fa-mobile-alt"></i> 33 2972 4073</a>
							</p>
						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Whatsapp:</b></p>
							<center>
								<a href="https://wa.me/523329724073?text=Quiero%20ser%20parte%20del%20equipo!" target="_blank" class="btn btn-outline-success mt-2" role="button"><i class="fab fa-whatsapp"></i> Informes</a>
							</center>

						</div>
						<div class="col-12 text-left">
							<p class="card-text"><b>Facebooks:</b></p>
							<center>
								<a href="https://www.messenger.com/t/100040982919290/" target="_blank" class="btn btn-outline-primary mt-2 " role="button"><i class="fab fa-facebook-square"></i> RH Ferretero</a>
								<a href="https://www.messenger.com/t/100055884110792/" target="_blank" class="btn btn-outline-primary mt-2 " role="button"><i class="fab fa-facebook-square"></i> Atlas Tools</a>
							</center>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Social Media Btn -->
	<script>
		function nl2br(str, is_xhtml) {
			if (typeof str === 'undefined' || str === null) {
				return '';
			}
			var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
			return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
		}

		function bolsa(id) {
			$.ajax({
				url: "assets/controler/movil/getBolsa.php",
				type: "post",
				data: {
					vacante: id
				},
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj.status == "ok") {

						$("#tituloModal").html(obj.vacante);
						$("#requisitosModal").html(nl2br(obj.requisitos));
						$("#ofrecemosModal").html(nl2br(obj.ofrecemos));

						$(".img-vacante").attr("src", "assets/img/vacantes/" + obj.img);

						$('#ModalSucursales').modal({
							show: true
						});
					} else {
						alert("error");
					}
				}
			});

		}

		function reclutador1() {
			$("#ModalReclutador1").modal("toggle");
		}

		function reclutador2() {
			$("#ModalReclutador2").modal("toggle");
		}
	</script>

</body>

</html>