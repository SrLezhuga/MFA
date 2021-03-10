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
								<button type="button" class="btn btn-outline-danger mt-2 BtnVacante" data-toggle="modal" data-target="#modalVacante" value="">
									<i class="far fa-thumbs-up"></i> Postularme
								</button>
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
						$(".BtnVacante").attr("value", obj.Id);

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

<!-- The Modal -->
<div class="modal fade" id="modalVacante">
	<div class="modal-dialog modal-sm">
		<div class="modal-content border-left-danger shadow">
			<div class="getVacante"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// Modal tarjeta Orden

	$('.BtnVacante').on('click', function() {
		var id_button = $(this).val();
		$('.getVacante').load('./assets/controler/vacante/getvacante.php?id=' + id_button, function() {
			$('#modalVacante').modal({
				show: true
			});
		});
	});

	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>