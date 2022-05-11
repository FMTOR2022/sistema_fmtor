<div id="modal-ingresar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Nuevo Proveedor</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_reg_proveedor" style="padding: 0px 5px;">
            <p>Proveedor :</p>
            <input class="input " type="text" name="Proveedor" id="Proveedor" placeholder="Ingresar nombre del Proveedor">
            <p>Direccion:</p>
            <input class="input " type="text" name="Direccion" id="Direccion" placeholder="Ingresar la Direccion">
            <p>Ciudad:</p>
            <input class="input " type="text" name="Ciudad" id="Ciudad" placeholder="Ingresar la Ciudad">
            <p>Telefono :</p>
            <input class="input" type="text" name="Telefono" id="Telefono" placeholder="Ingrese numero de contacto">
            <p>Correo:</p>
            <input class="input " type="text" name="Correo" id="Correo" placeholder="Ingrese  Correo">
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-actualizar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Modificar Proveedor</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_act_proveedor" style="padding: 0px 5px;">
            <input class="input " type="text" name="Id_Proveedor" id="Id_Proveedor" hidden>
            <p>Proveedor :</p>
            <input class="input " type="text" name="Proveedor_m" id="Proveedor_m" placeholder="Ingresar nombre del Proveedor">
            <p>Direccion:</p>
            <input class="input " type="text" name="Direccion_m" id="Direccion_m" placeholder="Ingresar la Direccion">
            <p>Ciudad:</p>
            <input class="input " type="text" name="Ciudad_m" id="Ciudad_m" placeholder="Ingresar la Ciudad">
            <p>Telefono :</p>
            <input class="input" type="text" name="Telefono_m" id="Telefono_m" placeholder="Ingrese numero de contacto">
            <p>Correo:</p>
            <input class="input " type="text" name="Correo_m" id="Correo_m" placeholder="Ingrese  Correo">
            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Modificar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
            </div>
        </form>
    </div>
</div>