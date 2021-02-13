 <!-- open sidebar menu -->
 <a class="btn btn-primary btn-customized open-menu" href="#" role="button">
     <i class="fas fa-bars"></i>
 </a>

 
<!-- Modal -->
<div id="Creador" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content border-left-danger shadow">
            <div class="modal-body">
                <h1 class="modal-title text-center h4 text-gray-900 "><b>Mayoreo Ferretero</b></h1>
                <br>
                <div class="row card-color">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <div class="text-center">
                                        <center><img src="assets\img\Logo\logo.webp" class="mx-auto d-block" style="width: 75%;" onContextMenu="return false;" draggable="false" />
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="p-4">
                                    <form class="user" action="http://localhost/mfa/assets/controler/login" method="POST">
                                        <!-- Input Oculto del recaptcha-->
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg" name="formUser" placeholder="Usuario" required>
                                        </div>

                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg" name="formPass" placeholder="Contraseña" aria-describedby="passwordHelpInline" required>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-outline-danger btn-block btn-lg"><i class="fas fa-sign-in-alt"></i> Inicio Sesión</button>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("keydown", function(e) {
        if (e.altKey && e.which === 49) {
            $('#Creador').modal('toggle');
        }
    });
</script>