<div id="modal-actualizar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Actualizar Horario</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_actualizar">
            <p>Id:</p>
                <select name="id" id="id_usuario"> </select> 
            <p>Usuario:</p>
                <select name="usuario" id="usuario"> </select> 
            <p>Entrada:</p>
            <input class="input" type="time" name="entrada" id="entrada">
            <p>Almuerzo Salida:</p>
            <input class="input" type="time" name="almuerzoS" id="almuerzoS">
            <p>Almuerzo Regreso:</p>
            <input class="input " type="time" name="almuerzoR" id="almuerzoR">
            <p>Salida:</p>
            <input class="input " type="time" name="salida" id="salida">
            
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Actualizar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
            </div>
        </form>
    </div>
</div>

