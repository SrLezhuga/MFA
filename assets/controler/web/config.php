<?php
$comita="'";
echo '

<fieldset class="border p-2">
    <legend class="w-auto"><b>Sociales:</b></legend>

    <div class="row">
        <div class="col-4">
            <label>Sucursal:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-store"></i>
                    </span>
                </div>
                <select id="formwebSuc" name="formwebSuc" class="custom-select" onchange="getWeb();">
                    <option value="" selected disabled>Seleccione</option>
';
                    $list = "SELECT * FROM tab_web";
                    $rs = mysqli_query($con, $list) or die("Error de consulta");
                    while ($item = mysqli_fetch_array($rs)) {
                        echo '<option value="' . $item["Sucursal"] . '">' . $item["Sucursal"] . '</option>';
                    }
echo '
                </select>
            </div>
        </div>
        <div class="col-8"></div>
        <div class="col-6">
            <label>Titulo:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="titulo_web" id="titulo_web" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Sub Titulo:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="sub_titulo_web" id="sub_titulo_web" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Slogan:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="slogan_web" id="slogan_web" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Sub Slogan:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="sub_slogan" id="sub_slogan" value="">
            </div>
        </div>
        <div class="col-12">
            <label>Texto MFA:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-align-center"></i>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="texto_web" name="texto_web"></textarea>
            </div>
        </div>
        <div class="col-6">
            <label>Imagen Logo:</label>
            <div class="file-field">
                <img class="img-logo-web" src="assets/img/upload.gif" onerror="this.src='.$comita.'assets/img/upload.gif'.$comita.';" height="auto" width="100%">
                <input type="file" id="img_logo" class="fileo .fileInput3">
            </div>
        </div>
        <div class="col-6">
            <label>Imagen Sucursal:</label>
            <div class="file-field">
                <img class="img-suc-web" src="assets/img/upload.gif" onerror="this.src='.$comita.'assets/img/upload.gif'.$comita.';" height="auto" width="100%">
                <input type="file" id="img_suc" class="fileo .fileInput3">
            </div>
        </div>
        <div class="col-10"></div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatosWeb()" disabled id="btn_web_guardar" value=""><i class="fas fa-save"></i></button>
        </div>
    </div>


    <script>
        function getWeb() {
            var web = $("#formwebSuc").val();
            $.ajax({
                url: "assets/controler/web/precarga.php",
                type: "post",
                data: {
                    Suc: web
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        $("#titulo_web").val(obj.Titulo);
                        $("#sub_titulo_web").val(obj.Sub_titulo);
                        $("#slogan_web").val(obj.Slogan);
                        $("#sub_slogan").val(obj.Sub_slogan);
                        $("#texto_web").val(obj.Mfa_texto);
                        $(".img-logo-web").attr("src", "assets/img/" + web + "/" + obj.Img_logo);
                        $(".img-suc-web").attr("src", "assets/img/" + web + "/" + obj.Img_sucursal);
                        document.getElementById("btn_web_guardar").disabled = false;
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
                        $("#img_logo").val("");
                        $("#img_suc").val("");
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

';
?>