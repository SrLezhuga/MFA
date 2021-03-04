                                <fieldset class="border p-2">
                                	<legend class="w-auto"><b>Galeria por sucursal:</b></legend>
                                	<form name="formBanner" method="post" action="#" enctype="multipart/form-data">
                                		<div class="row">
                                			<div class="col-4">
                                				<label>Sucursal:</label>
                                				<div class="input-group ">
                                					<div class="input-group-prepend">
                                						<span class="input-group-text">
                                							<i class="fas fa-store"></i>
                                						</span>
                                					</div>
                                					<select id="formGaleria" name="formGaleria" class="custom-select" onchange="getGaleria();">
                                						<option value="" selected disabled>Seleccione</option>
                                						<?php

														$list = "SELECT * FROM tab_galeria";
														$rs = mysqli_query($con, $list) or die("Error de consulta");
														while ($item = mysqli_fetch_array($rs)) {
															echo '<option value="' . $item["Sucursal"] . '">' . $item["Sucursal"] . '</option>';
														}
														?>
                                					</select>
                                				</div>
                                			</div>
                                			<div class="col-8"></div>
                                			<div class="col-3">
                                				<label>Imagen 1:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-uno" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria1" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 2:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-dos" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria2" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 3:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-tres" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria3" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 4:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-cuatro" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria4" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 5:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-cinco" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria5" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 6:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-seis" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria6" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 7:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-siete" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria7" class="fileo .fileInput3">
                                				</div>
                                			</div>
                                			<div class="col-3">
                                				<label>Imagen 8:</label>
                                				<div class="file-field">
                                					<img class="Img-Gal-ocho" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="150px" width="200px">
                                					<input type="file" id="imgGaleria8" class="fileo .fileInput3">
                                				</div>
                                			</div>

                                			<div class="col-10"></div>
                                			<div class="col-2">
                                				<label>Guardar Datos:</label>
                                				<button type="button" class="btn btn-outline-danger btn-block" onclick="guardarGaleria()" disabled id="btn_guardar_galeria" value=""><i class="fas fa-save"></i></button>
                                			</div>
                                </fieldset>

                                <script>
                                	function getGaleria() {
                                		var galeria = $("#formGaleria").val();
                                		$.ajax({
                                			url: "assets/controler/galeria/precarga.php",
                                			type: "post",
                                			data: {
                                				Gal: galeria
                                			},
                                			success: function(data) {
                                				var obj = JSON.parse(data);
                                				if (obj.status == "ok") {
                                					$(".Img-Gal-uno").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgUno);
                                					$(".Img-Gal-dos").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgDos);
                                					$(".Img-Gal-tres").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgTres);
                                					$(".Img-Gal-cuatro").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgCuatro);
                                					$(".Img-Gal-cinco").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgCinco);
                                					$(".Img-Gal-seis").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgSeis);
                                					$(".Img-Gal-siete").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgSiete);
                                					$(".Img-Gal-ocho").attr("src", "assets/img/" + galeria + "/galeria/" + obj.ImgOcho);
                                					document.getElementById("btn_guardar_galeria").disabled = false;
                                				} else {
                                					alert("error");
                                				}
                                			}
                                		});
                                	}

                                	function guardarGaleria() {
                                		var formData = new FormData();
                                		var sucursal = $("#formGaleria").val();


                                		var imgGaleria1 = $("#imgGaleria1")[0].files[0];
                                		var imgGaleria2 = $("#imgGaleria2")[0].files[0];
                                		var imgGaleria3 = $("#imgGaleria3")[0].files[0];
                                		var imgGaleria4 = $("#imgGaleria4")[0].files[0];
                                		var imgGaleria5 = $("#imgGaleria5")[0].files[0];
                                		var imgGaleria6 = $("#imgGaleria6")[0].files[0];
                                		var imgGaleria7 = $("#imgGaleria7")[0].files[0];
                                		var imgGaleria8 = $("#imgGaleria8")[0].files[0];

                                		formData.append("sucursal", sucursal);

                                		formData.append("imgGaleria1", imgGaleria1);
                                		formData.append("imgGaleria2", imgGaleria2);
                                		formData.append("imgGaleria3", imgGaleria3);
                                		formData.append("imgGaleria4", imgGaleria4);
                                		formData.append("imgGaleria5", imgGaleria5);
                                		formData.append("imgGaleria6", imgGaleria6);
                                		formData.append("imgGaleria7", imgGaleria7);
                                		formData.append("imgGaleria8", imgGaleria8);

                                		$.ajax({
                                			url: "assets/controler/galeria/carga.php",
                                			type: "post",
                                			data: formData,
                                			contentType: false,
                                			processData: false,
                                			success: function(data) {
                                				if (data == 0) {
                                					$("#imgGaleria1").val("");
                                					$("#imgGaleria2").val("");
                                					$("#imgGaleria3").val("");
                                					$("#imgGaleria4").val("");
                                					$("#imgGaleria5").val("");
                                					$("#imgGaleria6").val("");
                                					$("#imgGaleria7").val("");
                                					$("#imgGaleria8").val("");
                                					document.getElementById("btn_guardar_galeria").disabled = true;
                                					Swal.fire(
                                						"Mensaje de confirmación",
                                						"Se actualizaron los datos de la sucursal.",
                                						"success"
                                					);
                                				} else {
                                					Swal.fire(
                                						"Mensaje de confirmación",
                                						"Error:" + data,
                                						"error"
                                					);
                                				}
                                			}
                                		});
                                	}
                                </script>