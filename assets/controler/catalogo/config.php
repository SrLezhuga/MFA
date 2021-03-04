<fieldset class="border p-2">
    <legend class="w-auto"><b>Catalogos:</b></legend>
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
                    <select id="formCatalogo" name="formCatalogo" class="custom-select" onchange="getCatalogo();">
                        <option value="" selected disabled>Seleccione</option>
                        <?php
                        $list = "SELECT Id, Sucursal FROM tab_catalogo";
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
                    <img class="Img-Catalogo" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
                    <input type="file" id="imgCatalogo" class="fileo .fileInput3">
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
                    <input type="text" class="form-control" name="tituloCatalogo" id="tituloCatalogo" value="">
                </div>
                <label>Link:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-link"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="linkCatalogo" id="linkCatalogo" value="">
                </div>
                <label>Sucursal:</label>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-store"></i>
                        </span>
                    </div>
                    <select id="list_Catalogo" name="list_Catalogo" class="custom-select" style="visibility:visible;">
                        <option value="" selected disabled>Seleccione</option>
                        <?php
                        $list = "SELECT DISTINCT Sucursal FROM tab_catalogo";
                        $rs = mysqli_query($con, $list) or die("Error de consulta");
                        while ($item = mysqli_fetch_array($rs)) {
                            echo '<option value="' . $item["Sucursal"] . '">' . $item["Sucursal"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-8"></div>
            <div class="col-2">
                <label>Nueva:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="crearCatalogos()" id="btn_crear_Catalogo" value=""><i class="fas fa-plus"></i></button>
            </div>
            <div class="col-2">
                <label>Guardar Datos:</label>
                <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarCatalogos()" disabled id="btn_guardar_Catalogo" value=""><i class="fas fa-save"></i></button>
            </div>
</fieldset>


<script>
    function getCatalogo() {
        var Catalogo = $("#formCatalogo").val();
        $.ajax({
            url: "assets/controler/catalogo/precarga.php",
            type: "post",
            data: {
                Cat: Catalogo
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $(".Img-Catalogo").attr("src", "assets/img/catalogos/" + obj.Img);
                    $("#tituloCatalogo").val(obj.Desc);
                    $("#linkCatalogo").val(obj.Url_img);
                    $("#list_Catalogo").val(obj.Sucursal);
                    $("#btn_guardar_Catalogo").val(obj.Id);
                    document.getElementById("btn_guardar_Catalogo").disabled = false;
                    document.getElementById("btn_crear_Catalogo").disabled = true;
                } else {
                    alert("error");
                }
            }
        });
    }

    function guardarCatalogos() {
        var formData = new FormData();
        var titulo = $("#tituloCatalogo").val();
        var link = $("#linkCatalogo").val();
        var id = $("#btn_guardar_Catalogo").val();

        var imgCategoria = $("#imgCatalogo")[0].files[0];

        formData.append("titulo", titulo);
        formData.append("link", link);
        formData.append("id", id);

        formData.append("imgCatalogo", imgCategoria);

        $.ajax({
            url: "assets/controler/catalogo/carga.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#formCatalogo").val("");
                    $("#tituloCatalogo").val("");
                    $("#linkCatalogo").val("");
                    $("#list_Catalogo").val("");
                    $("#imgCatalogo").val("");
                    $("#btn_guardar_Catalogo").val("");
                    document.getElementById("btn_guardar_Catalogo").disabled = true;
                    document.getElementById("btn_crear_Catalogo").disabled = false;
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

    function crearCatalogos() {
        var formData = new FormData();
        var sucursal = $("#list_Catalogo").val();
        var titulo = $("#tituloCatalogo").val();
        var link = $("#linkCatalogo").val();

        var imgCategoria = $("#imgCatalogo")[0].files[0];

        formData.append("sucursal", sucursal);
        formData.append("titulo", titulo);
        formData.append("link", link);

        formData.append("imgCatalogo", imgCategoria);

        $.ajax({
            url: "assets/controler/catalogo/crear.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    $("#tituloCatalogo").val("");
                    $("#linkCatalogo").val("");
                    $("#list_Catalogo").val("");
                    $("#formCatalogo").val("");
                    $("#imgCatalogo").val("");
                    $("#btn_guardar_Catalogo").val("");
                    $(".Img-Catalogo").attr("src", "assets/img/upload.gif");
                    document.getElementById("btn_guardar_Catalogo").disabled = true;
                    document.getElementById("btn_crear_Catalogo").disabled = false;
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
