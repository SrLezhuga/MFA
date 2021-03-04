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
                        $("#formVacantes").val(vacante);
                        getVacante();
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
        <div class="col-6">
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
        <div class="col-6"></div>
        <div class="col-8">
            <label>Requisitos:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <a data-toggle="tooltip" title="Copiar" data-placement="top" onclick="copyToClipboard(this)"> ● </a>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="requisitos" name="requisitos"></textarea>
            </div>
        </div>
        <div class="col-4">
            <label>Imagen:</label>
            <div class="file-field">
                <img class="img-vacante" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="160px" width="100%">
                <input type="file" id="imgVacante" class="fileo .fileInput3">
            </div>
        </div>
        <div class="col-12">
            <label>Ofrecemos:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <a data-toggle="tooltip" title="Copiar" data-placement="top" onclick="copyToClipboard(this)"> ✔ </a>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="ofrecemos" name="ofrecemos "></textarea>
            </div>
        </div>
        <div class="col-7"></div>
        <div class="col-3">
            <label>Ver vacante:</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="switchVacante" name="switchVacante">
                <label class="custom-control-label" for="switchVacante"> Desactivado / Activado</label>
            </div>
        </div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatosVacante()" disabled id="btn_vacante_guardar" value=""><i class="fas fa-save"></i></button>
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

                        $("#requisitos").val(obj.requisitos);
                        $("#ofrecemos").val(obj.ofrecemos);
                        $(".img-vacante").attr("src", "assets/img/vacantes/" + obj.img);
                        if (obj.visible == "true") {
                            $("input:checkbox[name=switchVacante]").attr("checked",true);
                        }else{
                            $("input:checkbox[name=switchVacante]").attr("checked",false);
                        }
                        document.getElementById("btn_vacante_guardar").disabled = false;
                    } else {
                        alert("error");
                    }
                }
            });
        }

        function guardarDatosVacante() {
            var formData = new FormData();
            var vacante = $("#formVacantes").val();
            var requisitos = $("#requisitos").val();
            var ofrecemos = $("#ofrecemos").val();
            var visible = $("input:checkbox[name=switchVacante]:checked").val();
            if (visible == "on") {
                visible = "true";	
            }else{
                visible = "false";
            }
            var imgVacante = $("#imgVacante")[0].files[0];

            formData.append("vacante", vacante);
            formData.append("requisitos", requisitos);
            formData.append("ofrecemos", ofrecemos);
            formData.append("visible", visible);
            formData.append("imgVacante", imgVacante);

            $.ajax({
                url: "assets/controler/vacante/carga.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 0) {
                        getVacante();
                        $("#imgVacante").val("");
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

        function copyToClipboard(elemento) {
            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
          }

    </script>
</fieldset>

';
?>