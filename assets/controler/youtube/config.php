<?php
echo '
<fieldset class="border p-2">
    <legend class="w-auto"><b>Videos Youtube:</b></legend>

    <form name="formBanner" method="post" action="#" enctype="multipart/form-data">
        <div class="row">
     ';       
        
            $list = "SELECT * FROM tab_youtube ORDER BY posicion ASC";
            $rs = mysqli_query($con, $list) or die("Error de consulta");
            while ($U2 = mysqli_fetch_array($rs)) {
                echo '
                <div class="col-10">
                    <label>Video ' . $U2['posicion'] . ':</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-link"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="Video' . $U2['posicion'] . '" id="Video' . $U2['posicion'] . '" value="' . $U2['Url'] . '">
                    </div>
                </div>
                <div class="col-2">
                    <label>Guardar Url:</label>
                    <button type="button" class="btn btn-outline-danger btn-block BtnVideo' .  $U2['posicion'] . '" value="' . $U2['posicion'] . '"><i class="fas fa-save"></i></button>
                </div>
                ';
            }
echo '
        </div>

        <script type="text/javascript">
            // Video 1
            $(".BtnVideo1").on("click", function() {
                var video = $(this).val();
                var url_link = $("#Video1").val();
                var formData = new FormData();
                formData.append("video", video);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/youtube/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("Video1").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link del video 1",
                            "success"
                        );
                    }
                });
            });
            // Video 2
            $(".BtnVideo2").on("click", function() {
                var video = $(this).val();
                var url_link = $("#Video2").val();
                var formData = new FormData();
                formData.append("video", video);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/youtube/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("Video2").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link del video 2",
                            "success"
                        );
                    }
                });
            });
            // Video 3
            $(".BtnVideo3").on("click", function() {
                var video = $(this).val();
                var url_link = $("#Video3").val();
                var formData = new FormData();
                formData.append("video", video);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/youtube/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("Video3").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link del video 3",
                            "success"
                        );
                    }
                });
            });
            // Video 4
            $(".BtnVideo4").on("click", function() {
                var video = $(this).val();
                var url_link = $("#Video4").val();
                var formData = new FormData();
                formData.append("video", video);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/youtube/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("Video4").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link del video 4",
                            "success"
                        );
                    }
                });
            });
            // Video 5
            $(".BtnVideo5").on("click", function() {
                var video = $(this).val();
                var url_link = $("#Video5").val();
                var formData = new FormData();
                formData.append("video", video);
                formData.append("url", url_link);

                $.ajax({
                    url: "assets/controler/youtube/carga.php",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById("Video5").value = response;
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizó el link del video 5",
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