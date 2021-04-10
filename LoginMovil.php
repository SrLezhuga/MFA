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
			<div class="dropdown text-right">
				<button type="button" class="btn btn-lg" data-toggle="dropdown" style="color: white;">
					<i class="fas fa-bars"></i>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="PoliticaMovil">Condiciones y Privacidad</a>
					<a class="dropdown-item" href="InfoMovil">Info. de la aplicación</a>
				</div>
			</div>
			<!-- Section 1 -->
			<div class="section-1-container " id="section-1">
				<div class="container">
					<img src="assets/img/logo/logo.png" class="img-fluid mx-auto d-block" style="position: fixed; filter: opacity(0.3); left: 50%; top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); padding: 0px 5px 0px 2px;;">
					<div class="row">
						<div class="col-12" style="position: fixed; left: 0%; right: 0%; bottom: 25%; top: 25%;">

							<div class="form-group text-left">
								<label for="email" style="color: white;"><b>Usuario:</b></label>
								<input type="email" class="form-control form-control-lg" placeholder="Ingresa Correo" id="email" name="email" value='<?php if (isset($_COOKIE["usu_mvl"])) { echo $_COOKIE["usu_mvl"]; } ?>'>
							</div>
							<div class="form-group text-left">
								<label for="pwd" style="color: white;"><b>Contraseña:</b></label>
								<input type="password" class="form-control form-control-lg" placeholder="Ingresa Contraseña" id="pwd" name="pwd">
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="ckb" name="ckb" <?php if (isset($_COOKIE["usu_mvl"])) { echo "checked"; } ?>>
								<label class="custom-control-label" for="ckb" style="color: white;"><b>Recordar Usuario</b></label>
							</div>
							<br>
							<button type="btn" class="btn btn-outline-light btn-lg" onclick="login()">Ingresar</button>

						</div>
						<div class="col-12 text-center" style="color: white; position: fixed; bottom: 5%; left: 0%; right: 0%;">
							<a href="CrearMovil" style="color: white;">Crear una cuenta</a>
							<br>
							<a href="RecuperarMovil" style="color: white;">Olvidé mi contraseña</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>

</html>

<script>
	function login() {
		var correo = $("#email").val();
		var contra = $("#pwd").val();
		if ($("#ckb").is(':checked')) {
			var cookie = "si";
		} else {
			var cookie = "no";
		}

		if ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
			Swal.fire(
				"Mensaje de alerta",
				"El correo electrónico introducido no es correcto.",
				"error"
			);
			return false;
		}

		if ($('#pwd').val().length == 0) {
			Swal.fire(
				"Mensaje de alerta",
				"La contraseña esta vacía.",
				"error"
			);
			return false;
		}

		var formData = new FormData();
		formData.append("correo", correo);
		formData.append("contra", contra);
		formData.append("cookie", cookie);

		$.ajax({
			url: "assets/controler/movil_login/login.php",
			type: "post",
			data: formData,
			contentType: false,
			processData: false,
			success: function(data) {
				if (data == "ok") {
					Swal.fire({
						icon: 'success',
						title: 'Bienvenido',
						showConfirmButton: false,
						timer: 1500
					}).then((result) => {
						window.open("http://192.168.0.6/mfa/IndexMovilcopy", "_self");
					});
				} else {
					Swal.fire(
						"Mensaje de alerta",
						"No se encontro usuario, vuelte a intentarlo " + data,
						"error"
					);
				}
			}
		});
	}
</script>