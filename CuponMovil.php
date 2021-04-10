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
						<div class="col-12 text-left" style="margin-top: 10px;">
							<h1 style="margin-top: 0; margin-bottom: 0;"><b>Cupones</b></h1>
							<br>
						</div>
						<div class="col-6">
							<a href="MonederoMovil">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-coins"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Creditos <br>MFA
										</b>
									</h3>
								</div>
							</a>
						</div>
						<div class="col-6">
							<a href="CanjeMovil">
								<div class="card shadow" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
									<h1>
										<i class="fas fa-gift"></i>
									</h1>
									<h3 class="card-title">
										<b>
											Centro de <br>Canje
										</b>
									</h3>
								</div>
							</a>
						</div>
						<div class="col-12">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#home"><b>Disponibles</b></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1"><b>Vencidos</b></a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active container" id="home">
									<div class="col-12">
										<div data-toggle="collapse" data-target="#demo" class="card shadow border-left-danger" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
											<div class="card-body card-gif">
												<div class="row">
													<div class="col-12">
														<h5 class="text-left" style="color: #dc3545;">Descuento</h5>
													</div>
													<div class="col-12">
														<p class="display-3" style="color: #dc3545;"><b>$ 200</b></p>
													</div>
													<div id="demo" class="collapse col-12 text-left" style="color: black;">
														<hr class="recorte">
														<p class="small" id="base1_cupon" style="line-height: 1.2; margin-bottom: 0;">* En compras mayores a $ 2000</p>
														<p class="small" id="base2_cupon" style="line-height: 1.2; margin-bottom: 0;">* En compras menores a $ 5000</p>
														<p class="small" id="base3_cupon" style="line-height: 1.2; margin-bottom: 0;">* Cupon no acumulable</p>
														<h6 class="text-right"><b>Vigencia 2021</b></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div data-toggle="collapse" data-target="#demo" class="card shadow border-left-danger" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
											<div class="card-body card-gif">
												<div class="row">
													<div class="col-12">
														<h5 class="text-left" style="color: #dc3545;">Descuento</h5>
													</div>
													<div class="col-12">
														<p class="display-3" style="color: #dc3545;"><b>% 10</b></p>
													</div>
													<div id="demo" class="collapse col-12 text-left" style="color: black;">
														<hr class="recorte">
														<p class="small" id="base1_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 1</p>
														<p class="small" id="base2_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 2</p>
														<p class="small" id="base3_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 3</p>
														<h6 class="text-right"><b>Vigencia 2021</b></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div data-toggle="collapse" data-target="#demo" class="card shadow border-left-danger" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
											<div class="card-body card-gif">
												<div class="row">
													<div class="col-12">
														<h5 class="text-left" style="color: #dc3545;">Descuento</h5>
													</div>
													<div class="col-12">
														<p class="display-3" style="color: #dc3545;"><b>$ 500</b></p>
													</div>
													<div id="demo" class="collapse col-12 text-left" style="color: black;">
														<hr class="recorte">
														<p class="small" id="base1_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 1</p>
														<p class="small" id="base2_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 2</p>
														<p class="small" id="base3_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 3</p>
														<h6 class="text-right"><b>Vigencia 2021</b></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane container" id="menu1">
									<div class="col-12">
										<div data-toggle="collapse" data-target="#demo" class="card shadow border-left-danger" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
											<div class="card-body card-gif">
												<div class="row">
													<div class="col-12">
														<h5 class="text-left" style="color: #dc3545;">Descuento</h5>
													</div>
													<div class="col-12">
														<p class="display-3" style="color: #dc3545;"><b>$ 100</b></p>
													</div>
													<div id="demo" class="collapse col-12 text-left" style="color: black;">
														<hr class="recorte">
														<p class="small" id="base1_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 1</p>
														<p class="small" id="base2_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 2</p>
														<p class="small" id="base3_cupon" style="line-height: 1.2; margin-bottom: 0;">* condicion 3</p>
														<h6 class="text-right"><b>Vigencia 2020</b></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br><br>
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