<?php
echo '
<script>
$(document).ready(function() {
    $(".upload").on("click", function() {
        var formData = new FormData();
        var sucursal = $("#fromSuc").val();
        var files = $("#image")[0].files[0];
        if (sucursal == null || sucursal.length == 0 || files == null) {
            Swal.fire(
                "Mensaje de confirmación",
                "Seleciona sucursal y banner!.",
                "error"
            );
        } else {
            formData.append("file", files);
            formData.append("Suc", sucursal);
            $.ajax({
                url: "assets/controler/banner/carga.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $(".card-img-top").attr("src", response);
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se subio la imagen",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Formato de imagen incorrecto.",
                            "success"
                        );
                    }
                }
            });
            return false;
        }
    });
});

function getBanner() {
    var formData = new FormData();
    var sucursal = $("#fromSuc").val();
    formData.append("Suc", sucursal);
    $.ajax({
        url: "assets/controler/banner/precarga.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
            success: function(response) {
            $(".card-img-top").attr("src", response);
        }
    });
}
</script>

<fieldset class="border p-2">
<legend class="w-auto"><b>Banners:</b></legend>
<form name="formBanner" method="post" action="#" enctype="multipart/form-data">
    <div class="row">
        <div class="col-3">
            <label>Sucursal:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-store"></i>
                    </span>
                </div>
                <select id="fromSuc" name="fromSuc" class="custom-select" onchange="getBanner();">
                    <option value="" selected disabled>Seleccione</option>';
                    $list = "SELECT * FROM tab_banner_sucursal";
                    $rs = mysqli_query($con, $list) or die("Error de consulta");
                    while ($item = mysqli_fetch_array($rs)) {
                        echo '<option value="' . $item["Url"] . '">' . $item["Url"] . '</option>';
                    }
                    echo '
                </select>
            </div>
        </div>
        <div class="col-5">
            <label>Imagen:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                </div>
                <input type="file" class="form-control-file border" name="image" id="image">
            </div>
        </div>
        <div class="col-2">
            <img class="card-img-top" src="assets/img/banners/default.png" style="width: 100%;">
        </div>
        <div class="col-2">
            <label>Guardar:</label>
            <button type="button" class="btn btn-outline-danger btn-block upload"><i class="fas fa-save"></i></button>
        </div>
    </div>

</form>
</fieldset>
';
?>

