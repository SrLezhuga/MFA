<script>
    $(document).ready(function() {
        $(".upload").on("click", function() {
            var formData = new FormData();
            var sucursal = $("#fromSuc").val();
            var files = $("#imgBanner")[0].files[0];
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
                            $(".Img-Banner").attr("src", response);
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
                $(".Img-Banner").attr("src", response);
            }
        });
    }
</script>

<fieldset class="border p-2">
    <legend class="w-auto"><b>Banners:</b></legend>
    <form name="formBanner" method="post" action="#" enctype="multipart/form-data">
        <div class="row">
            <div class="col-7">
                <label>Imagen:</label>
                <div class="file-field">
                    <img class="Img-Banner" src="assets/img/upload.gif" onerror="this.src='assets/img/upload.gif';" height="250px" width="500px">
                    <input type="file" id="imgBanner" class="fileo .fileInput3">
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <label>Sucursal:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-store"></i>
                                </span>
                            </div>
                            <select id="fromSuc" name="fromSuc" class="custom-select" onchange="getBanner();">
                                <option value="" selected disabled>Seleccione</option>
                                <?php
                                $list = "SELECT * FROM tab_banner_sucursal";
                                $rs = mysqli_query($con, $list) or die("Error de consulta");
                                while ($item = mysqli_fetch_array($rs)) {
                                    echo '<option value="' . $item["Url"] . '">' . $item["Url"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-5">
                        <label>Guardar:</label>
                        <button type="button" class="btn btn-outline-danger btn-block upload"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</fieldset>