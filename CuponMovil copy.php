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

					<div class="row">
						<div class="col-12">
							<div class="card bg-light text-dark shadow mt-2">
								<h1><i class="fas fa-user"></i><b> Perfil</b></h1>
							</div>
							<div class="card bg-light text-dark shadow mt-2">
								<div class="card-body">

									<div class="row">
										<div class="col-4">
											<img class="img-suc" src="assets/img/movil/1.png" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
										</div>
										<div class="col-8">
											<h5 class="text-left"><b>Usuario:</b><br>Brandon Manuel Gutierrez Lechuga</h5>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-6">
							<a href="#">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-user-circle"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Datos del <br>Perfil
										</b>
									</h3>
								</div>
							</a>
						</div>
						<br>
						<div class="col-6">
							<a href="#">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-headset"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Centro de <br>Ayuda
										</b>
									</h3>
								</div>
							</a>
						</div>
						<br>
						<br>
						<div class="col-6">
							<a href="#">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-lock"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Cambiar <br>Contraseña
										</b>
									</h3>
								</div>
							</a>
						</div>
						<br>
						<br>
						<div class="col-6">
							<a href="#">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-door-open"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Cerrar <br>Sesion
										</b>
									</h3>
								</div>
							</a>
						</div>
						<br>

					</div>
					<br>
				</div>
			</div>

		</div>

		<!-- End content -->
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