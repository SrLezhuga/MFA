<fieldset class="border p-2">
    <legend class="w-auto"><b>Reclutadores:</b></legend>

    <div class="row">
        <div class="col-4">
            <label>Reclutador:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-users"></i>
                    </span>
                </div>
                <select id="formReclutador" name="formReclutador" class="custom-select" onchange="getReclutador();">
                    <option value="" selected disabled>Seleccione</option>
                    <?php
                    $list = "SELECT * FROM tab_rrhh";
                    $rs = mysqli_query($con, $list) or die("Error de consulta");
                    while ($item = mysqli_fetch_array($rs)) {
                        echo '<option value="' . $item["nombre"] . '">' . $item["nombre"] . '</option>';
                    } ?>
                </select>
            </div>
        </div>
        <div class="col-8"></div>
        <div class="col-4">
            <label>Nombre:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="nombre_rec" id="nombre_rec" value="">
            </div>
        </div>
        <div class="col-3">
            <label>Telèfono:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="telefono_rec" id="telefono_rec" value="">
            </div>
        </div>
        <div class="col-5">
            <label>Correo:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-at"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="correo_rec" id="correo_rec" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Facebook:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fab fa-facebook-messenger"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="fb_rec" id="fb_rec" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Whatsapp Texto:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="wp_rec" id="wp_rec" value="">
            </div>
        </div>

        <div class="col-10"></div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatosRec()" disabled id="btn_rec_guardar" value=""><i class="fas fa-save"></i></button>
        </div>
    </div>

    <script>
        function getReclutador() {
            var reclutador = $("#formReclutador").val();
            $.ajax({
                url: "assets/controler/reclutador/precarga.php",
                type: "post",
                data: {
                    Rec: reclutador
                },
                success: function(data) {

                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        $("#nombre_rec").val(obj.Nombre);
                        $("#telefono_rec").val(obj.Telefono);
                        $("#correo_rec").val(obj.Correo);
                        $("#fb_rec").val(obj.Fb);
                        $("#wp_rec").val(obj.Wp);
                        document.getElementById("btn_rec_guardar").disabled = false;
                    } else {
                        alert("error");
                    }
                }
            });
        }

        function guardarDatosRec() {
            var formData = new FormData();
            var reclutador = $("#nombre_rec").val();
            var telefono = $("#telefono_rec").val();
            var correo = $("#correo_rec").val();
            var fb = $("#fb_rec").val();
            var wp = $("#wp_rec").val();

            formData.append("reclutador", reclutador);
            formData.append("telefono", telefono);
            formData.append("correo", correo);
            formData.append("fb", fb);
            formData.append("wp", wp);

            $.ajax({
                url: "assets/controler/reclutador/carga.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 0) {
                        getReclutador();
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