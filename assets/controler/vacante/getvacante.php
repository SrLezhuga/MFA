<?php
include("../conexion.php");
$Id = $_GET['id'];

$queryItem = "SELECT vacante FROM tab_vacantes WHERE Id=" . $Id;
$rsItem = mysqli_query($con, $queryItem) or die(mysqli_error($con));
$Item = mysqli_fetch_array($rsItem);

?>
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="card-color text-left">

    <h1 class="modal-title text-center h3 text-gray-900 "><b><?php echo $Item['vacante']; ?></b></h1>

    <div class="p-4">
        <label>Nombre:</label>
        <div class="input-group ">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user-alt"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="candidato_form" placeholder="Nombre" required>
            <input type="hidden" id="vacante_form" value="<?php echo $Item['vacante']; ?>">
        </div>

        <label>Teléfono:</label>
        <div class="input-group ">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-phone"></i>
                </span>
            </div>
            <input type="number" class="form-control validar" id="telefono_form" placeholder="Teléfono" pattern='[0-9]{12}' title="Solo números, sin espacios" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
        </div>

        <label>Currículum:</label>
        <div class="file-field">
            <img class="Img-PDF" src="assets/img/pdf.jpg" onerror="this.src='assets/img/pdf.jpg';" height="auto" width="100%">
            <input type="file" id="cv_form" class="fileo .fileInput3" required>
        </div>
        <span>Arrastra y suelta el CV aquí</span>

        <br>
        <button type="submit" onclick="postularCV()" class="btn btn-outline-danger btn-block btn-lg"><i class="fas fa-file-pdf"></i> Enviar Currículum</button>
    </div>
</div>

<script>
    function postularCV() {
        var formData = new FormData();
        var candidato = $("#candidato_form").val();
        var vacante = $("#vacante_form").val();
        var telefono = $("#telefono_form").val();
        var curriculum = $("#cv_form")[0].files[0];

        formData.append("candidato", candidato);
        formData.append("vacante", vacante);
        formData.append("telefono", telefono);
        formData.append("curriculum", curriculum);

        $.ajax({
            url: "assets/controler/vacante/postular.php",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 0) {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Te postulaste para la vacante!",
                        "success"
                    );
                    $('#modalVacante').modal("hide");
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Falto capturar datos o subir CV",
                        "error"
                    );
                }
            }
        });

    }

    $(function() {

        //PDF
        $('#cv_form').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if ((input.files && input.files[0] && ext == "pdf") ||
                (input.files && input.files[0] && ext == "docx") ||
                (input.files && input.files[0] && ext == "doc")) {
                $('.Img-PDF').attr('src', 'assets/img/ok.gif');
                Swal.fire(
                    "Mensaje de confirmación",
                    "Curriculum cargado!!.",
                    "success"
                );
            } else {
                $('.Img-PDF').attr('src', 'assets/img/pdf.jpg');
                $('#cv_form').val('');
                Swal.fire(
                    "Mensaje de confirmación",
                    "Error: Solo se admiten PDF y WORD",
                    "error"
                );
            }
        });

    });
</script>

<script>
    $(".validar").keydown(function(event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
</script>