<?php 
    if ($_SESSION['ZGVwdG8='] != 'Produccion' && $_SESSION['cm9s'] != 'SuperUsuario') {
        header('Location: ' . $this->url_server . '/usuario/principal');
    }
?>
<div class="d-grid g2-5-5">
    <div style="padding-top: 0px;" class="tarjeta-transparente">
        <h1>Explosión de Alambre</h1>
    </div>
    <div style="padding-top: 0px;" class="tarjeta-transparente d-flex justify-right align-content-center flex-wrap">
        <button id="btn_resetear" class="btn btn-transparent btn-icon-self material-icons-outlined">loop</button>
        <button class="btn btn-transparent btn-icon-self btn_filtrar_open material-icons-outlined" data-modal="modal-filtrar">filter_alt</button>
        <button class="btn-impresion btn btn-icon" data-impresion="documento">
            <i class="material-icons" data-impresion="documento">description</i>
            Generar Documento
        </button>
    </div>
</div>
<div class="tarjeta">
    <div class="main">
        <div class="row-con">
            <div class="tabla">
                <table id="table">
                    <thead class="cabecera">
                        <th>CAL.</th>
                        <th style="min-width: 80px;">Kg.</th>
                        <th>Factor</th>
                        <th style="min-width: 80px;">N° O.P.</th>
                        <th style="min-width: 110px;">Fecha de O.P.</th>
                        <th style="min-width: 80px;">Cliente</th>
                        <th style="min-width: 120px;">Medida</th>
                        <th style="min-width: 190px;">Descripción</th>
                        <th style="min-width: 80px;">Tratamiento</th>
                        <th style="min-width: 80px;">Material</th>
                        <th style="min-width: 130px;">Acabado</th>
                        <th>Cant.</th>
                        <th style="min-width: 80px;">Precio</th>
                        <th style="min-width: 120px;">Total</th>
                        <th style="min-width: 150px;">Acumulado</th>
                        <th>Estado</th>
                    </thead>
                    <tbody class="body"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once 'public/modules/produccion/ordenes_modal.php';
    // require_once 'public/modules/produccion/plano_modal.php'; 
    require_once 'public/modules/produccion/calibre_modal.php'; 
?>
<script src="../public/js/produccion/filtros.js"></script>
<script src="../public/js/produccion/ordenes.js"></script>