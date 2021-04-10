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
							<div class="col-12 text-left" style="margin-top: 10px;">
								<h1 style="margin-top: 0; margin-bottom: 0;"><b>Perfil</b></h1>
								<br>
							</div>
							<div class="card bg-light border-left-danger text-dark shadow mt-2">
								<div class="card-body card-gif">

									<div class="row">
										<div class="col-3">
											<img class="img-suc" src="assets/img/movil/1.png" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
										</div>
										<div class="col-9">
											<h5 class="text-left" style="margin-bottom: 0"><b>Usuario:</b>
												<br>MFA@XXXXX
											</h5>
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
						<br>
						<div class="col-6">
							<a href="#">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-history"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Historial <br>Cupones
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
										<i class="fas fa-book-open"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Manual de<br>Usuario
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
							<br>
						</div>

						<!--Info -->
						<div class="col-12 text-left">
							<h1 style="margin-top: 0; margin-bottom: 0;"><b>Información</b></h1>
							<div class="card border-left-danger shadow">
								<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-sm mb-1"><b>¿Qué son los creditos MFA?</b></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-chevron-right"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card border-left-danger shadow">
								<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-sm mb-1"><b>¿Como ganar creditos MFA?</b></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-chevron-right"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card border-left-danger shadow">
								<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-sm mb-1"><b>Soporte Técnico</b></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-chevron-right"></i>
										</div>
									</div>
								</div>
							</div>
							<a href="PoliticaMovil">
							<div class="card border-left-danger shadow">
								<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-sm mb-1"><b>Condiciones y Privacidad</b></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-chevron-right"></i>
										</div>
									</div>
								</div>
							</div>
							</a>
							<a href="InfoMovil">
								<div class="card border-left-danger shadow">
									<div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-sm mb-1"><b>Info. de la aplicación</b></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-chevron-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
							<br>
							<br>
							<br>
						</div>
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