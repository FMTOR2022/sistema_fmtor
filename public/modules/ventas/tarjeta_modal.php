<div id="modal-actualizar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Ingresa Bote de Tarjeta de Flujo </h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_act_tarjeta">
        <input type="number" name="id_folio_edit" id="id_folio_edit" hidden>
        <p>Bote:</p>
            <input class="input" type="number" name="Bote_edit" id="Bote_edit" placeholder="Ingresa el Bote">

            <div class="opciones d-flex flex-column">
                <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
            </div>
        </form>
    </div>
</div>