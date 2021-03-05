<fieldset class="border p-2">
    <legend class="w-auto"><b>Datos Sucursal:</b></legend>
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
                    <select id="formCategoria" name="formCategoria" class="custom-select" onchange="getCategorias();">
                        <option value="" selected disabled>Seleccione</option>
                        <?php
                        $list = "SELECT Id, Sucursal FROM tab_categoria";
                        $rs = mysqli_query($con, $list) or die("Error de consulta");
                        while ($item = mysqli_fetch_array($rs)) {
                            echo '<option value="' . $item["Id"] . '">' . $item["Id"] . " | " . $item["Sucursal"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-8"></div>
            <div class="col-3">
                <label>Imagen:</label>
                <div class="file-field">
                    <img class="Img-Categoria" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="200px" width="200px">
                    <input type="file" id="imgCategoria" class="fileo .fileInput3">
                </div>
            </div>
            <div class="col-9">
                <label>Titulo:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-heading"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="tituloCategoria" id="tituloCategoria" value="">
                </div>
                <label>Link:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-link"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="linkCategoria" id="linkCategoria" value="">
                </div>
                <label>Sucursal:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-store"></i>
                        </span>
                    </div>
                    <select id="listCategoria" name="listCategoria" class="custom-select" style="visibility:visible;">
                        <option value="" selected disabled>Seleccione</option>
                        <?php
                        $list = "SELECT DISTINCT Sucursal FROM tab_categoria";
                        $rs = mysqli_query($con, $list) or die("Error de consulta");
                        while ($item = mysqli_fetch_array($rs)) {
                            echo '<option value="' . $item[" Sucursal"] . '">' . $item["Sucursal"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-8"></div>
            <div class="col-2">
                <label>Nueva:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="crearCategorias()" id="btn_crear_categoria" value=""><i class="fas fa-plus"></i></button>
            </div>
            <div class="col-2">
                <label>Guardar Datos:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarCategorias()" disabled id="btn_guardar_categoria" value=""><i class="fas fa-save"></i></button>
            </div>
</fieldset>

<script>
    function getCategorias() {
        var categoria = $("#formCategoria").val();
        $.ajax({
            url: "assets/controler/categoria/precarga.php",
            type: "post",
            data: {
                Cat: categoria
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".Img-Categoria").attr("src", "assets/img/categorias/" + obj.Img);
                    $("#tituloCategoria").val(obj.Desc);
                    $("#linkCategoria").val(obj.Url_img);
                    $("#listCategoria").val(obj.Sucursal);
                    $("#btn_guardar_categoria").val(obj.Id);
                    document.getElementById("btn_guardar_categoria").disabled = false;
                    document.getElementById("btn_crear_categoria").disabled = true;
                } else {
                    alert("error");
                }
            }
        });
    }

    function guardarCategorias() {
        var formData = new FormData();
        var titulo = $("#tituloCategoria").val();
        var link = $("#linkCategoria").val();
        var id = $("#btn_guardar_categoria").val();

        var imgCategoria = $("#imgCategoria")[0].files[0];

        formData.append("titulo", titulo);
        formData.append("link", link);
        formData.append("id", id);

        formData.append("imgCategoria", imgCategoria);

        $.ajax({
            url: "assets/controler/categoria/carga.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#tab_categoria").val("");
                    $("#tituloCategoria").val("");
                    $("#linkCategoria").val("");
                    $("#listCategoria").val("");
                    $("#formCategoria").val("");
                    $("#btn_guardar_categoria").val("");
                    document.getElementById("btn_guardar_categoria").disabled = true;
                    document.getElementById("btn_crear_categoria").disabled = false;
                    getCategorias();
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

    function crearCategorias() {
        var formData = new FormData();
        var sucursal = $("#listCategoria").val();
        var titulo = $("#tituloCategoria").val();
        var link = $("#linkCategoria").val();

        var imgCategoria = $("#imgCategoria")[0].files[0];

        formData.append("sucursal", sucursal);
        formData.append("titulo", titulo);
        formData.append("link", link);

        formData.append("imgCategoria", imgCategoria);

        $.ajax({
            url: "assets/controler/categoria/crear.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#tab_categoria").val("");
                    $("#tituloCategoria").val("");
                    $("#linkCategoria").val("");
                    $("#listCategoria").val("");
                    $("#formCategoria").val("");
                    $("#btn_guardar_categoria").val("");
                    document.getElementById("btn_guardar_categoria").disabled = true;
                    document.getElementById("btn_crear_categoria").disabled = false;
                    getCategorias();
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