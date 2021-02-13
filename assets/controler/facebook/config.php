<?php
echo'

<fieldset class="border p-2">
    <legend class="w-auto"><b>Redes Sociales:</b></legend>

    <div class="row">
        <div class="col-4">
            <label>Sucursal:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-store"></i>
                    </span>
                </div>
                <select id="formFbSuc" name="formFbSuc" class="custom-select" onchange="getFb();">
                    <option value="" selected disabled>Seleccione</option>
';
$list = "SELECT * FROM tab_facebook";
$rs = mysqli_query($con, $list) or die("Error de consulta");
while ($item = mysqli_fetch_array($rs)) {
    echo '<option value="' . $item["Sucursal"] . '">' . $item["Sucursal"] . '</option>';
}
echo '
                </select>
            </div>
        </div>
        <div class="col-8"></div>
        <div class="col-12">
            <br>
            <center>
                <iframe class="facebook-url" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </center>
        </div>
        <div class="col-12">
            <label>Url Facebook:</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-link"></i>
                    </span>
                </div>
                <textarea class="form-control" rows="6" id="UrlFb" name="UrlFb"></textarea>
            </div>
        </div>
        <div class="col-10"></div>
        <div class="col-2">
            <label>Guardar Datos:</label>
            <button type="button" class="btn btn-outline-danger btn-block" onclick="guardarDatosFb()" disabled id="btn_fb_guardar" value=""><i class="fas fa-save"></i></button>
        </div>
    </div>

    <script>
        function getFb() {
            var facebook = $("#formFbSuc").val();
            $.ajax({
                url: "assets/controler/facebook/precarga.php",
                type: "post",
                data: {
                    Suc: facebook
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        $("#UrlFb").val(obj.Url);
                        $(".facebook-url").attr("src", obj.Url);
                        document.getElementById("btn_fb_guardar").disabled = false;
                    } else {
                        alert("error");
                    }
                }
            });
        }

        function guardarDatosFb() {
            var sucursal = $("#formFbSuc").val();
            var url = $("#UrlFb").val();

            $.ajax({
                url: "assets/controler/facebook/carga.php",
                type: "post",
                data: {
                    Suc: sucursal,
                    Url: url
                },
                success: function(data) {
                    if (data == 0) {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el facebook de la sucursal.",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Error:" + data,
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