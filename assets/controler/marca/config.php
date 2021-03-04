<fieldset class="border p-2">
    <legend class="w-auto"><b>Marcas:</b></legend>
    <form name="formBanner" method="post" action="#" enctype="multipart/form-data">
        <div class="row">
            <div class="col-4">
                <label>Sucursal:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-copyright"></i>
                        </span>
                    </div>
                    <select id="formMarcas" name="formMarcas" class="custom-select" onchange="getMarcas();">
                        <option value="" selected disabled>Seleccione</option>
                        <?php
                        $list = "SELECT * FROM tab_marca";
                        $rs = mysqli_query($con, $list) or die("Error de consulta");
                        while ($item = mysqli_fetch_array($rs)) {
                            echo '<option value="' . $item["Nombre"] . '">' . $item["Nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-8"></div>
            <div class="col-5">
                <label>Imagen:</label>
                <div class="file-field">
                    <img class="Img-marca" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
                    <input type="file" id="imgMarca" class="fileo .fileInput3">
                </div>
            </div>
            <div class="col-7">
                <label>Titulo:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-heading"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="tituloMarca" id="tituloMarca" value="">
                </div>
                <label>Link:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-link"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="linkMarca" id="linkMarca" value="">
                </div>
            </div>

            <div class="col-8"></div>
            <div class="col-2">
                <label>Nueva:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="crearMarca()" id="btn_crear_Marca" value=""><i class="fas fa-plus"></i></button>
            </div>
            <div class="col-2">
                <label>Guardar Datos:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarMarca()" disabled id="btn_guardar_Marca" value=""><i class="fas fa-save"></i></button>
            </div>
</fieldset>


<script>
    function getMarcas() {
        var Marca = $("#formMarcas").val();
        $.ajax({
            url: "assets/controler/marca/precarga.php",
            type: "post",
            data: {
                Mar: Marca
            },
            success: function(data) {
               var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".Img-marca").attr("src", "assets/img/marcas/" + obj.Img);
                    $("#tituloMarca").val(obj.Nombre);
                    $("#linkMarca").val(obj.Link);
                    $("#btn_guardar_Marca").val(obj.Nombre);
                    document.getElementById("btn_guardar_Marca").disabled = false;
                    document.getElementById("btn_crear_Marca").disabled = true;
                } else {
                    alert("error");
                }
            }
        });
    }

    function guardarMarca() {
        var formData = new FormData();
        var titulo = $("#tituloMarca").val();
        var link = $("#linkMarca").val();
        var nombre = $("#btn_guardar_Marca").val();

        var imgMarca = $("#imgMarca")[0].files[0];

        formData.append("titulo", titulo);
        formData.append("link", link);
        formData.append("nombre", nombre);

        formData.append("imgMarca", imgMarca);

        $.ajax({
            url: "assets/controler/marca/carga.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#formMarcas").val("");
                    $("#tituloMarca").val("");
                    $("#linkMarca").val("");
                    $("#imgMarca").val("");
                    $("#btn_guardar_Marca").val("");
                    document.getElementById("btn_guardar_Marca").disabled = true;
                    document.getElementById("btn_crear_Marca").disabled = false;
                    getCatalogo();
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Se actualizaron los datos.",
                        "success"
                    );
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Error: No se guardaron los datos",
                        "error"
                    );
                }
            }
        });
    }

    function crearMarca() {
        var formData = new FormData();
        var sucursal = $("#list_Catalogo").val();
        var titulo = $("#tituloMarca").val();
        var link = $("#linkMarca").val();

        var imgCategoria = $("#imgMarca")[0].files[0];

        formData.append("sucursal", sucursal);
        formData.append("titulo", titulo);
        formData.append("link", link);

        formData.append("imgMarca", imgCategoria);

        $.ajax({
            url: "assets/controler/marca/crear.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#tituloMarca").val("");
                    $("#linkMarca").val("");
                    $("#formMarcas").val("");
                    $("#imgMarca").val("");
                    $("#btn_guardar_Marca").val("");
                    $(".Img-marca").attr("src", "assets/img/upload.gif");
                    document.getElementById("btn_guardar_Marca").disabled = true;
                    document.getElementById("btn_crear_Marca").disabled = false;
                    getCatalogo();
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Se actualizaron los datos.",
                        "success"
                    );
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Error: " + data,
                        "error"
                    );
                }
            }
        });

    }
</script>