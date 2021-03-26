<fieldset class="border p-2">
    <legend class="w-auto"><b>Suscripciones:</b></legend>

    <a href="assets/controler/exportar/excel.php" class="btn btn-outline-success" role="button"><i class="fas fa-file-excel"></i> Descargar Excel</a>
    <br><br>

    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $list = "SELECT Nombre, Correo, Telefono FROM tab_suscripcion";
            $rs = mysqli_query($con, $list) or die(mysqli_error($con));
            while ($item = mysqli_fetch_array($rs)) {
                echo " 
            <tr>
                <td>" . $item['Nombre'] . "</td>
                <td>" . $item['Correo'] . "</td>
                <td>" . $item['Telefono'] . "</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</fieldset>