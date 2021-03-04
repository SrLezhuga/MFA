<?php

$id = $_GET['id'];

echo '
    <div class="col-4">
        <button type="button" class="btn btn-outline-success btn-block" onclick="aprobarCV(this)" value="'.$id.'"><i class="fas fa-user-check"></i> Revisado y Aprobado</button>
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-outline-warning btn-block" onclick="archivarCV(this)" value="'.$id.'"><i class="fas fa-archive"></i> Archivar Curriculum</button>
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-outline-danger btn-block" onclick="rechazarCV(this)" value="'.$id.'"><i class="fas fa-user-times"></i> Revisado y Rechazar</button>
    </div>
';