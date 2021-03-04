<fieldset class="border p-2">
    <legend class="w-auto"><b>Promociones:</b></legend>

    <div class="row">
        <div class="col-4">
            <label>Imagen:</label>
            <div class="file-field">
                <img class="img-promocion" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="auto" width="100%">
                <input type="file" id="imgPromocion" class="fileo .fileInput3">
            </div>
        </div>
        <div class="col-8">
        <label>Promociones:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-ad"></i>
                    </span>
                </div>
                <select id="formPromocion" name="formPromocion" class="custom-select" onchange="getPromocion();">
                    <option value="" selected disabled>Seleccione</option>
<?php
                $list = "SELECT Id_promocion, Imagen_url, Url FROM tab_modal_promocion";
                $rs = mysqli_query($con, $list) or die(mysqli_error($con));
                while ($item = mysqli_fetch_array($rs)) {
                    echo '<option value="' . $item["Id_promocion"] . '">Promoción ' . $item["Id_promocion"] . '</option>';
                } 
?>
                </select>
             </div>
            <label>Link:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-link"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="url_link" id="url_link" checked="false">
            </div>

            <label>Ver promoción:</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switchShow" name="switchShow">
                <label class="custom-control-label" for="switchShow"> Desactivado / Activado</label>
            </div>

        </div>
        <div class="col-12">

        </div>
        <div class="col-10"></div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarPromocion()" disabled id="btn_promocion_guardar" value=""><i class="fas fa-save"></i></button>
        </div>
    </div>

    <script>
        function getPromocion() {
            var IdPromocion = $("#formPromocion").val();
            $.ajax({
                url: "assets/controler/promocion/precarga.php",
                type: "post",
                data: {
                    promocion: IdPromocion
                },
                success: function(data) {

                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {

                        $("#url_link").val(obj.Url);
                        if (obj.visible == "true") {
                            $("input:checkbox[name=switchShow]").attr("checked",true);
                        }else{
                            $("input:checkbox[name=switchShow]").attr("checked",false);
                        }
                        $(".img-promocion").attr("src", "assets/img/promocion/" + obj.Imagen_url);
                        document.getElementById("btn_promocion_guardar").disabled = false;
                    } else {
                        alert("error");
                    }

                }
            });
        }

        function guardarPromocion() {
            var formData = new FormData();
            var promocion = $("#formPromocion").val();
            var link = $("#url_link").val();
            var visible = $("input:checkbox[name=switchShow]:checked").val();
            if (visible == "on") {
                visible = "true";	
            }else{
                visible = "false";
            }
            var imgPromocion = $("#imgPromocion")[0].files[0];

            formData.append("promocion", promocion);
            formData.append("link", link);
            formData.append("visible", visible);
            formData.append("imgPromocion", imgPromocion);

            $.ajax({
                url: "assets/controler/promocion/carga.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 0) {
                        getPromocion();
                        $("#imgPromocion").val("");
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
