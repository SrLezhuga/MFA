<?php
echo '
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
                <select id="formTiendaSuc" name="formTiendaSuc" class="custom-select" onchange="getSucursal();">
                    <option value="" selected disabled>Seleccione</option>
';
                    $list = "SELECT * FROM tab_sucursal";
                    $rs = mysqli_query($con, $list) or die("Error de consulta");
                    while ($item = mysqli_fetch_array($rs)) {
                        echo '<option value="' . $item["nombre_sucursal"] . '">' . $item["nombre_sucursal"] . '</option>';
                    }
echo '
                </select>
            </div>
        </div>
        <div class="col-8"></div>
        <div class="col-7">
            <label>Dirección:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="direccion" id="direccion" value="">
            </div>
        </div>
        <div class="col-3">
            <label>Colonia:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="colonia" id="colonia" value="">
            </div>
        </div>
        <div class="col-2">
            <label>C.P.:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" value="">
            </div>
        </div>
        <div class="col-7">
            <label>Municipio:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="municipio" id="municipio" value="">
            </div>
        </div>
        <div class="col-5">
            <label>Correo:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-envelope"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="correo" id="correo" value="">
            </div>
        </div>
        <div class="col-4">
            <label>Teléfono:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="telefono" id="telefono" value="">
            </div>
        </div>
        <div class="col-4">
            <label>Horario L-V:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-clock"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="horario1" id="horario1" value="">
            </div>
        </div>
        <div class="col-4">
            <label>Horario Sabado:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-clock"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="horario2" id="horario2" value="">
            </div>
        </div>
        <div class="col-6">
            <label>Mapa google:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="mapgoogle" name="mapgoogle"></textarea>
            </div>
        </div>
        <div class="col-6">
            <label>Mapa Celular:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="mapcel" name="mapcel"></textarea>
            </div>
        </div>
        <div class="col-10"></div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatos()" disabled id="btn_guardar" value=""><i class="fas fa-save"></i></button>
        </div>
</fieldset>

<script>
function getSucursal() {
    var sucursal = $("#formTiendaSuc").val();
    $.ajax({
        url: "assets/controler/directorio/precarga.php",
        type: "post",
        data: {
            Suc: sucursal
        },
        success: function(data) {
            var obj = JSON.parse(data);
            if (obj.status == "ok") {
                $("#direccion").val(obj.direccion);
                $("#colonia").val(obj.colonia);
                $("#codigo_postal").val(obj.codigo_postal);
                $("#municipio").val(obj.municipio);
                $("#correo").val(obj.correo);
                $("#telefono").val(obj.telefono);
                $("#horario1").val(obj.horario_1);
                $("#horario2").val(obj.horario_2);
                $("#mapgoogle").val(obj.mapa);
                $("#mapcel").val(obj.mapa_cel);
                document.getElementById("btn_guardar").disabled = false;
            } else {
                alert("error");
            }
        }
    });
}

function guardarDatos() {
    var sucursal = $("#formTiendaSuc").val();
    var dir = $("#direccion").val();
    var col = $("#colonia").val();
    var cp = $("#codigo_postal").val();
    var mun = $("#municipio").val();
    var cor = $("#correo").val();
    var tel = $("#telefono").val();
    var ho1 = $("#horario1").val();
    var ho2 = $("#horario2").val();
    var mpg = $("#mapgoogle").val();
    var mpc = $("#mapcel").val();

    $.ajax({
        url: "assets/controler/directorio/carga.php",
        type: "post",
        data: {
            Suc: sucursal,
            Dir: dir,
            Col: col,
            Cp: cp,
            Mun: mun,
            Cor: cor,
            Tel: tel,
            Ho1: ho1,
            Ho2: ho2,
            Mpg: mpg,
            Mpc: mpc
        },
        success: function(data) {
            if (data == 0) {
                Swal.fire(
                    "Mensaje de confirmación",
                    "Se actualizaron los datos de la sucursal.",
                    "success"
                );
            }else{
                Swal.fire(
                    "Mensaje de confirmación",
                    "Error:"+data,
                    "error"
                );
            }
        }
    });
}
</script>
';
?>