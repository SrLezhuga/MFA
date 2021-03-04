<?php
include("../conexion.php");

$queryVacante = "SELECT DISTINCT vacante FROM tab_candidatos";
$rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
while ($Vacante = mysqli_fetch_array($rsVacante)) {

    echo '
    <fieldset class="border p-2">
        <legend class="w-auto"><span><i class="fas fa-user"></i></span> <b>' . $Vacante["vacante"] . '</b></legend>
        <table class="table table-sm table-hover">
            <tbody>
    ';

    $queryCV = "SELECT *  FROM tab_candidatos WHERE vacante = '" . $Vacante['vacante'] . "' AND (status = 'Revisado' OR status = 'Sin revisar')";
    $rsCV = mysqli_query($con, $queryCV) or die(mysqli_error($con));
    while ($CV = mysqli_fetch_array($rsCV)) {
        $extencion = explode('.', $CV['cv']);

        if ($extencion[1] == "pdf") {
            $ext = "pdf";
        } else {
            $ext = "word";
        }

        if ($CV['status'] == "Sin revisar") {
            $badge = "<span class='badge badge-danger'>Nuevo!</span>";
        } else {
            $badge = "";
        }

        echo '
    <tr>
        <td>' . $CV['nombre'] . $badge . '</td>
        <td><a href="https://wa.me/52' . $CV['telefono'] . '?text=Me%20interesa%20el%20auto%20que%20estás%20vendiendo" target="_blank" >' . $CV['telefono'] . '</a></td>
        <td>' . $CV['fecha'] . '</td>
        <td>' . $CV['status'] . '</td>
        <td>
            <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Descargar ' . $ext . '" data-placement="top" onclick="descargarCV(this)" value="' . $CV['Id'] . '"><i class="fas fa-file-' . $ext . '"></i></button>
            <span  data-toggle="modal" data-target="#modalOpcion">
                <button type="button" class="btn btn-outline-dark BtnOpcion" data-toggle="tooltip" title="Opciones" data-placement="top" value="' . $CV['Id'] . '"><i class="fas fa-cogs"></i></button>
            </span>	
        </td>
    </tr>
    ';
    }

    echo '
            </tbody>
        </table>

    </fieldset>
    ';
}

?>

<!-- The Modal -->
<div class="modal fade" id="modalOpcion">
    <div class="modal-dialog">
        <div class="modal-content border-left-danger shadow">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Opciones</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row getOpciones"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                    Cerrar</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    // Modal tarjeta Orden

    $('.BtnOpcion').on('click', function() {
        var id_button = $(this).val();
        $('.getOpciones').load('./assets/controler/bolsa/getOpcion.php?id=' + id_button, function() {
            $('#modalOpcion').modal({
                show: true
            });
        });
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    function descargarCV(Id) {
        var id = Id.value

        $.ajax({
            url: "assets/controler/bolsa/descargaCV.php",
            type: "get",
            data: {
                cv: id
            },
            success: function(data) {
                if (data != 0) {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "El archivo se descargara en breve.",
                        "success"
                    );
                    window.location = 'assets/controler/bolsa/descargaCV.php?cv=' + id;
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "El archivo no existe.",
                        "error"
                    );
                }

            }
        })
    }

    function aprobarCV(Id) {
        var id = Id.value

        $.ajax({
            url: "assets/controler/bolsa/aprobarCV.php",
            type: "post",
            data: {
                cv: id
            },
            success: function(data) {

                if (data == 0) {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Status actualizado",
                        "success"
                    );
                    $('#modalOpcion').modal("hide");
                    CargarCV();
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Vuelve a intentarlo.",
                        "error"
                    );
                }
            }
        })
    }

    function archivarCV(Id) {
        var id = Id.value

        $.ajax({
            url: "assets/controler/bolsa/archivarCV.php",
            type: "post",
            data: {
                cv: id
            },
            success: function(data) {

                if (data == 0) {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Status actualizado",
                        "success"
                    );
                    $('#modalOpcion').modal("hide");
                    CargarCV();
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Vuelve a intentarlo.",
                        "error"
                    );
                }
            }
        })
    }

    function rechazarCV(Id) {
        var id = Id.value

        $.ajax({
            url: "assets/controler/bolsa/rechazarCV.php",
            type: "post",
            data: {
                cv: id
            },
            success: function(data) {

                if (data == 0) {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Status actualizado",
                        "success"
                    );
                    $('#modalOpcion').modal("hide");
                    CargarCV();
                } else {
                    Swal.fire(
                        "Mensaje de confirmación",
                        "Vuelve a intentarlo.",
                        "error"
                    );
                }
            }
        })
    }

    function CargarCV() {
        $.ajax({
            type: "POST",
            url: "assets/controler/bolsa/precarga.php",
            dataType: "html",
            success: function(data) {
                $("#precarga-div").empty();
                $("#precarga-div").append(data);
                if ($('.modal-backdrop').is(':visible')) {
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                };
            }
        });
    }
</script>