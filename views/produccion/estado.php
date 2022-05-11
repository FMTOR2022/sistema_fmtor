<?php 
    if ($_SESSION['ZGVwdG8='] != 'Produccion' && $_SESSION['cm9s'] != 'SuperUsuario') {
        header('Location: ' . $this->url_server . '/usuario/principal');
    }
?>
<div class="d-grid g2-7-3">
    <div style="padding-top: 0px;" class="tarjeta-transparente">
        <h1>Estado de las Ordenes de Producción</h1>
    </div>
    <div style="padding-top: 0px;" class="tarjeta-transparente d-flex justify-right align-content-center flex-wrap">
        <button class="btn-impresion btn btn-icon btn-transparent" data-impresion="documento">
            <i class="material-icons">description</i>
            Generar Documento 
        </button>
    </div>
</div>
<div class="tarjeta-transparente d-grid g-1" id="estados">
</div>
<script src="../public/js/produccion/estado_op.js"></script>