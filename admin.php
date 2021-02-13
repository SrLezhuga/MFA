<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="en">

<head>
	<?php include("assets/common/header.php"); ?>
	<title>Mayoreo Ferretero | Configuracion</title>
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
						<h1 class="display-3 text-white ">Configuración de sitio</h1>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-2 mb-3">
						<ul class="nav nav-pills flex-column" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="Inicio-tab" data-toggle="tab" href="#Inicio" role="tab" aria-controls="Inicio" aria-selected="true">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Directorio-tab" data-toggle="tab" href="#Directorio" role="tab" aria-controls="Directorio" aria-selected="false">Directorio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Redes-tab" data-toggle="tab" href="#Redes" role="tab" aria-controls="Redes" aria-selected="false">Redes Sociales</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Sucursal-tab" data-toggle="tab" href="#Sucursal" role="tab" aria-controls="Sucursal" aria-selected="false">Sucursal</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="RH-tab" data-toggle="tab" href="#RH" role="tab" aria-controls="RH" aria-selected="false">RH</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Bolsa-tab" data-toggle="tab" href="#Bolsa" role="tab" aria-controls="Bolsa" aria-selected="false">Bolsa Trabajo</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Promocion-tab" data-toggle="tab" href="#Promocion" role="tab" aria-controls="Promocion" aria-selected="false">Promoción</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Galeria-tab" data-toggle="tab" href="#Galeria" role="tab" aria-controls="Galeria" aria-selected="false">Galeria</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Productos-tab" data-toggle="tab" href="#Productos" role="tab" aria-controls="Productos" aria-selected="false">Productos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Catalogos-tab" data-toggle="tab" href="#Catalogos" role="tab" aria-controls="Catalogos" aria-selected="false">Catalogos</a>
							</li>
						</ul>
					</div>
					<!-- /.col-md-4 -->
					<div class="col-md-10 text-left">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="Inicio" role="tabpanel" aria-labelledby="Inicio-tab">
								<!-- Banners -->
								<?php include("assets/controler/banner/config.php");  ?>
								<!-- Redes Sociales -->
								<?php include("assets/controler/social/config.php");  ?>
								<!-- Videos Youtube -->
								<?php include("assets/controler/youtube/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Directorio" role="tabpanel" aria-labelledby="Directorio-tab">
								<!-- Directorio -->
								<?php include("assets/controler/directorio/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Redes" role="tabpanel" aria-labelledby="Redes-tab">
								<!-- Facebook -->
								<?php include("assets/controler/facebook/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Sucursal" role="tabpanel" aria-labelledby="Sucursal-tab">
								<!-- Web -->
								<?php include("assets/controler/web/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="RH" role="tabpanel" aria-labelledby="RH-tab">


								<fieldset class="border p-2">
									<legend class="w-auto"><b>Alta Vacante:</b></legend>

									<div class="row">
										<div class="col-6">
											<label>Nueva Vacante:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-pencil-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="titulo_vacante" placeholder="Nombre vacante" onblur="checkVacante()" id="titulo_vacante" value="">
											</div>
										</div>
										<div class="col-4"></div>
										<div class="col-2">
											<label>Registrar:</label>
											<button type="button" class="btn btn-outline-danger btn-block" onclick="altaVacante()" disabled id="btn_alta_vacante" value=""><i class="fas fa-save"></i></button>
										</div>
									</div>


									<script>
										function checkVacante() {
											var vacante = $("#titulo_vacante").val();
											if (vacante == "") {
												Swal.fire(
													"Mensaje del sistema",
													"Captura el nombre de la vacante",
													"error"
												);
												document.getElementById("btn_alta_vacante").disabled = true;
											} else {
												document.getElementById("btn_alta_vacante").disabled = false;
											}
										}

										function altaVacante() {
											var vacante = $("#titulo_vacante").val();
											$.ajax({
												url: "assets/controler/vacante/alta.php",
												type: "post",
												data: {
													Vacante: vacante
												},
												success: function(data) {
													if (data == 0) {
														Swal.fire(
															"Mensaje del sistema",
															"Se capturo la vacante",
															"success"
														);
													} else {
														Swal.fire(
															"Mensaje del sistema",
															"No se registro la vacante, vuelte a intentarlo",
															"error"
														);
														document.getElementById("btn_alta_vacante").disabled = true;
													}
												}
											});
										}
									</script>
								</fieldset>

								<fieldset class="border p-2">
									<legend class="w-auto"><b>Ver Vacantes:</b></legend>

									<div class="row">
										<div class="col-4">
											<label>Vacante:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-store"></i>
													</span>
												</div>
												<select id="formVacantes" name="formVacantes" class="custom-select" onchange="getVacante();">
													<option value="" selected disabled>Seleccione</option>
													<?php
													$list = "SELECT Id, vacante FROM tab_vacantes";
													$rs = mysqli_query($con, $list) or die(mysqli_error($con));
													while ($item = mysqli_fetch_array($rs)) {
														echo '<option value="' . $item["Id"] . '">' . $item["vacante"] . '</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-8"></div>
										<div class="col-9">
											<label>Descripción:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<textarea class="form-control" rows="6" id="descripcion" name="descripcion"></textarea>
											</div>
										</div>
										<div class="col-3">
											<label>Imagen:</label>
											<img class="img-vacante" src="assets/img/banners/default.png" style="width: 100%;">
										</div>
										<div class="col-12">
											<label>Sexo:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="sexo" id="sexo" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Edad:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="edad" id="edad" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Escolaridad:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="escolaridad" id="escolaridad" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Experiencia:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="experiencia" id="experiencia" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Sueldo:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="sueldo" id="sueldo" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Beneficios:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="beneficios" id="beneficios" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Horario:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="horario" id="horario" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Lugar:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<input type="text" class="form-control" name="lugar" id="lugar" value="">
											</div>
										</div>
										<div class="col-12">
											<label>Observaciones:</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-map-marker-alt"></i>
													</span>
												</div>
												<textarea class="form-control" rows="6" id="observaciones" name="observaciones "></textarea>
											</div>
										</div>

										<div class="col-10"></div>
										<div class="col-2">
											<label>Guardar Datos:</label>
											<button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatosWeb()" disabled id="btn_vacante_guardar" value=""><i class="fas fa-save"></i></button>
										</div>
									</div>


									<script>
										function getVacante() {
											var NomVacante = $("#formVacantes").val();
											$.ajax({
												url: "assets/controler/vacante/precarga.php",
												type: "post",
												data: {
													vacante: NomVacante
												},
												success: function(data) {

													var obj = JSON.parse(data);
													if (obj.status == "ok") {

														$("#descripcion").val(obj.descripcion);
														$("#sexo").val(obj.r_sexo);
														$("#edad").val(obj.r_edad);
														$("#escolaridad").val(obj.r_escolaridad);
														$("#experiencia").val(obj.r_experiencia);
														$("#sueldo").val(obj.o_sueldo);
														$("#beneficios").val(obj.o_beneficios);
														$("#horario").val(obj.o_horario);
														$("#lugar").val(obj.o_lugar);
														$("#observaciones").val(obj.observaciones);
														$(".img-vacante").attr("src", "assets/img/vacantes/" + obj.img);
														document.getElementById("btn_vacante_guardar").disabled = false;
													} else {
														alert("error");
													}
												}
											});
										}

										function guardarDatosWeb() {
											var formData = new FormData();
											var sucursal = $("#formwebSuc").val();
											var titulo_web = $("#titulo_web").val();
											var sub_titulo_web = $("#sub_titulo_web").val();
											var slogan_web = $("#slogan_web").val();
											var sub_slogan = $("#sub_slogan").val();
											var texto_web = $("#texto_web").val();
											var img_logo = $("#img_logo")[0].files[0];
											var img_suc = $("#img_suc")[0].files[0];

											formData.append("sucursal", sucursal);
											formData.append("titulo_web", titulo_web);
											formData.append("sub_titulo_web", sub_titulo_web);
											formData.append("slogan_web", slogan_web);
											formData.append("sub_slogan", sub_slogan);
											formData.append("texto_web", texto_web);
											formData.append("img_logo", img_logo);
											formData.append("img_suc", img_suc);

											$.ajax({
												url: "assets/controler/web/carga.php",
												type: "post",
												data: formData,
												contentType: false,
												processData: false,
												success: function(data) {
													if (data == 0) {
														getWeb();
														Swal.fire(
															"Mensaje de confirmación",
															"Se actualizaron los datos",
															"success"
														);
													} else {
														Swal.fire(
															"Mensaje de confirmación",
															"Error al cargar datos",
															"error"
														);
													}
												}
											});
										}
									</script>
								</fieldset>

								<h2>RH</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
							<div class="tab-pane fade" id="Bolsa" role="tabpanel" aria-labelledby="Bolsa-tab">
								<h2>Bolsa Trabajo</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
							<div class="tab-pane fade" id="Promocion" role="tabpanel" aria-labelledby="Promocion-tab">
								<h2>Promoción</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
							<div class="tab-pane fade" id="Galeria" role="tabpanel" aria-labelledby="Galeria-tab">
								<h2>Promoción</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
							<div class="tab-pane fade" id="Productos" role="tabpanel" aria-labelledby="Productos-tab">
								<h2>Promoción</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
							<div class="tab-pane fade" id="Catalogos" role="tabpanel" aria-labelledby="Catalogos-tab">
								<h2>Promoción</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>

							</div>
						</div>
					</div>
					<!-- /.col-md-8 -->
				</div>

			</div>
			<!-- /.container -->

			<br>

		</div>
		<!-- End content -->
		<?php include("assets/common/footerAdmin.php"); ?>

	</div>
	<!-- End wrapper -->


</body>

</html>