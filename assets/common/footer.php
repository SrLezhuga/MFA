<!-- Footer -->
<?php include("assets/controler/conexion.php"); ?>
<footer id="footer-container">
    <div class="copynote bg-dark text-white border border-right-0 border-bottom-0 border-left-0 " style="border-top: 5px solid #dc3545!important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    © <script>
                        var f = new Date();
                        document.write(f.getFullYear());
                    </script> 
                    Mayoreo Ferretero. Todos los derechos Reservados.
                    <br>
                    <a href="Politicas">Políticas</a>&nbsp;|&nbsp;<a href="Cookies">Cookies</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.copynote -->
</footer>

<!-- Social Media Btn -->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<div class="plus-button"></div>
<div class="to-top">
    <div class="social-button top-button active"><a data-toggle="tooltip" title="Subir" data-placement="left" href="#"><i class="fas fa-arrow-up"></i></a></div>
</div>
<?php
$querySocial = "SELECT * FROM tab_social";
$rsSocial = mysqli_query($con, $querySocial) or die("Error de consulta");
while ($Social = mysqli_fetch_array($rsSocial)) {
    echo '
        <div class="social-button ' . $Social['red_social'] . '-button"><a data-toggle="tooltip" title="' . ucfirst($Social['red_social']) . '" data-placement="left" href="' . $Social['Url_social'] . '" target="_blank"><i class="fab fa-' . $Social['red_social'] . '"></i></a></div>
    ';
}
?>