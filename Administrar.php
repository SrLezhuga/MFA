<?php include("assets/controler/conexion.php"); ?>
<!doctype html>
<html lang="es">

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
							<li class="nav-item">
								<a class="nav-link" id="Marcas-tab" data-toggle="tab" href="#Marcas" role="tab" aria-controls="Marcas" aria-selected="false">Marcas</a>
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
							<div class="tab-pane fade" id="Promocion" role="tabpanel" aria-labelledby="Promocion-tab">
								<!-- Promociones -->
								<?php include("assets/controler/promocion/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Galeria" role="tabpanel" aria-labelledby="Galeria-tab">
								<!-- Galeria -->
								<?php include("assets/controler/galeria/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Productos" role="tabpanel" aria-labelledby="Productos-tab">
								<!-- Categorias -->
								<?php include("assets/controler/categoria/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Catalogos" role="tabpanel" aria-labelledby="Catalogos-tab">
								<!-- Catalogos -->
								<?php include("assets/controler/catalogo/config.php");  ?>
							</div>
							<div class="tab-pane fade" id="Marcas" role="tabpanel" aria-labelledby="Marcas-tab">
								<!-- Marcas -->
								<?php include("assets/controler/marca/config.php");  ?>
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
	<!-- End wrapper -->
	<script type="text/javascript"> 
		$(function() {

			//banner 1
			$('#imgBanner').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Banner').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Banner').attr('src', 'assets/img/upload.gif');
				}
			});
			//web 1
			$('#img_logo').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.img-logo-web').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]); 
				} else {
					$('.img-logo-web').attr('src', 'assets/img/upload.gif');
				}
			});
			//web 2
			$('#img_suc').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.img-suc-web').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.img-suc-web').attr('src', 'assets/img/upload.gif');
				}
			});
			//promocion 1
			$('#imgPromocion').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.img-promocion').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.img-promocion').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 1
			$('#imgGaleria1').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-uno').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-uno').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 2 
			$('#imgGaleria2').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-dos').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-dos').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 3 
			$('#imgGaleria3').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-tres').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-tres').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 4
			$('#imgGaleria4').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-cuatro').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-cuatro').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 5 
			$('#imgGaleria5').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-cinco').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-cinco').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 6
			$('#imgGaleria6').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-seis').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-seis').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 7
			$('#imgGaleria7').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-siete').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-siete').attr('src', 'assets/img/upload.gif');
				}
			});
			//galeria 8
			$('#imgGaleria8').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Gal-ocho').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Gal-ocho').attr('src', 'assets/img/upload.gif');
				}
			});
			//categoria 1 
			$('#imgCategoria').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Categoria').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Categoria').attr('src', 'assets/img/upload.gif');
				}
			});
			//catalogo 1 
			$('#imgCatalogo').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-Catalogo').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-Catalogo').attr('src', 'assets/img/upload.gif');
				}
			});
			//marca 1 
			$('#imgMarca').change(function() {
				var input = this;
				var url = $(this).val();
				var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
				if (input.files && input.files[0] && (ext == "webp" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('.Img-marca').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('.Img-marca').attr('src', 'assets/img/upload.gif');
				}
			});
		});

		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

</body>

</html>