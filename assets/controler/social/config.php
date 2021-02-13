<?php
echo '
<fieldset class="border p-2">
    <legend class="w-auto"><b>Redes Sociales:</b></legend>

    <form name="formBanner" method="post" action="#" enctype="multipart/form-data">
        <div class="row">
    ';
      
            $list = "SELECT * FROM tab_social";
            $rs = mysqli_query($con, $list) or die("Error de consulta");
            while ($social = mysqli_fetch_array($rs)) {
                echo '
                <div class="col-10">
                    <label>' . ucfirst($social['red_social']) . ':</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-link"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="' . $social['red_social'] . '" id="' . $social['red_social'] . '" value="' . $social['Url_social'] . '">
                    </div>
                </div>
                <div class="col-2">
                    <label>Guardar Url:</label>
                    <button type="button" class="btn btn-outline-danger btn-block Btn' . $social['red_social'] . '" value="' . $social['red_social'] . '"><i class="fas fa-save"></i></button>
                </div>
                ';
            }
    
echo '
        </div>
        <script type="text/javascript">
            // facebook
            $(".Btnfacebook").on("click", function() {
                var red_social = $(this).val();
                var url_link = $("#facebook").val();
                var formData = new FormData();
                formData.append("social", red_social);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/social/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("facebook").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link de Facebook",
                            "success"
                        );
                    }
                });
            });
            // whatsapp
            $(".Btnwhatsapp").on("click", function() {
                var red_social = $(this).val();
                var url_link = $("#whatsapp").val();
                var formData = new FormData();
                formData.append("social", red_social);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/social/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("whatsapp").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link de Whatsapp",
                            "success"
                        );
                    }
                });
            });
            // youtube
            $(".Btnyoutube").on("click", function() {
                var red_social = $(this).val();
                var url_link = $("#youtube").val();
                var formData = new FormData();
                formData.append("social", red_social);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/social/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("youtube").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link de Youtube",
                            "success"
                        );
                    }
                });
            });
            // twitter
            $(".Btntwitter").on("click", function() {
                var red_social = $(this).val();
                var url_link = $("#twitter").val();
                var formData = new FormData();
                formData.append("social", red_social);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/social/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("twitter").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link de Twitter",
                            "success"
                        );
                    }
                });
            });
        </script>

    </form>
</fieldset>

';
?>