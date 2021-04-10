<?php
include("../conexion.php");
$query = "SELECT id_cupon, concepto, creditos, valor, vigencia FROM movil_cupon WHERE vigencia = ".date('Y')." ORDER BY creditos ";
$rs = mysqli_query($con, $query) or die(mysqli_error($con));
while ($item = mysqli_fetch_array($rs)) {
    echo '
    
    <div class="col-12">
        <a onclick="show(' . $item['id_cupon'] . ')">
            <div class="card shadow border-left-danger" style="margin-bottom: 5px; margin-left: 5px; margin-right: 5px; margin-top: 5px;">
                <div class="card-body card-gif">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-left" style="color: #dc3545;">' . $item['concepto'] . '</h5>
                        </div>
                        <div class="col-6">
                            <h3 class="text-right"><b>' . $item['creditos'] . ' MFA</b></h3>
                        </div>
                        <div class="col-12">
                            <p class="display-2" style="color: #dc3545;"><b>' . $item['valor'] . '</b></p>
                        </div>
                        <div class="col-12 text-right" style="color: black;">
                        <p class="display-6"><b>Vigencia ' . $item['vigencia'] . '</b></p>
                    </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    ';
}
?>


<script>
    function show(cupon) {
        var id_cupon = cupon;
        $.ajax({
            url: "assets/controler/movil_cupon/showCupon.php",
            type: "post",
            data: {
                id_cupon: id_cupon
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj.status == "ok") {
                    $("#cupon_code").html("Cupón " + obj.codigo);
                    $("#concepto_cupon").html(obj.concepto);
                    $("#creditos_cupon").html("Costo de canje: " + obj.creditos + " MFA");
                    $("#valor_cupon").html(obj.valor);
                    $("#base1_cupon").html(obj.base1);
                    $("#base2_cupon").html(obj.base2);
                    $("#base3_cupon").html(obj.base3);
                    $("#vigencia_cupon").html("Vigencia: " + obj.vigencia);
                    $("#ModalCupon").modal("toggle");
                } else {
                    alert("error");
                }
            }
        });
    }

    function canjear() {
        alert("canjeado!");
    }
</script>

<!-- The Modal -->
<div class="modal fade" id="ModalCupon">
    <div class="modal-dialog modal-sm modal-dialog-centered ">
        <div class="modal-content border-left-danger">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="modal-title"><b id="cupon_code"></b></h4>
                        <button style="right: 15px; top: 0; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
                        <br>
                    </div>
                    <div class="col-12">
                        <h2 style="color: #dc3545;"><b id="concepto_cupon"></b></h2>
                        <p class="display-2" style="color: #dc3545;"><b id="valor_cupon"></b></p>
                    </div>
                    <div class="col-12 text-left" style="color: black;">
                        <p class="display-6" style="margin-bottom: 0rem;">
                            <b>Términos y condiciones:</b>
                        </p>
                        <lu class="small">
                            <li id="base1_cupon" style="line-height: 1.2;"></li>
                            <li id="base2_cupon" style="line-height: 1.2;"></li>
                            <li id="base3_cupon" style="line-height: 1.2;"></li>
                        </lu>
                    </div>
                    <div class="col-12 text-left" style="color: black;">
                        <p class="display-6"><b id="vigencia_cupon"></b></p>
                    </div>
                    <div class="col-12">
                        <p id="creditos_cupon"> </p>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-danger btn-block" onclick="canjear()">Canjear</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-dark btn-block" data-dismiss="modal">Clancelar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>