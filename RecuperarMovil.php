<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero</title>
</head>

<body style="background: rgb(36,0,0); background: linear-gradient(135deg, rgba(36,0,0,1) 0%, rgba(220,53,69,1) 40%, rgba(220,53,69,1) 60%, rgba(36,0,0,1) 100%); background-attachment: fixed;">

	<!-- Wrapper -->
	<div class="wrapper">
		<!-- Content -->
		<div class="content">
			<div class="col-12 text-left" style="margin-top: 10px;">
				<a value="Página anterior" onClick="history.go(-1);">
					<div class="btn btn-customized" style="top: 10px; left: 10px;">
						<i class="fas fa-arrow-left" style="color:white;"></i>
					</div>
				</a>
				<h1 style="margin-top: 0; margin-bottom: 0; color:white;"><b>Recuperar Cuenta</b></h1>
			</div>
			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">
					<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="position: fixed; filter: opacity(0.3); left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); padding: 0px 5px 0px 2px;;">
					<div class="row">
						<div class="col-12">
							<form action="#" style="position: fixed; left: 5%; right: 5%; bottom: 25%; top: 25%;">
								<div class="form-group text-left">
									<label for="email" style="color: white;"><b>Correo:</b></label>
									<input type="email" class="form-control " placeholder="Ingresa Correo" id="email">
								</div>
								<p style="color: white;">Ingresa el correo que utilizaste para crear tu cuenta, se enviara un correo para restablecer tu contraseña, si necesitas mas ayuda contacta a soporte.</p>
								<br>
								<button type="submit" class="btn btn-outline-light btn-lg">Recuperar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>