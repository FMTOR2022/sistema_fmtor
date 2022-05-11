<div id="modal-ingresar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Cliente Nuevo</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-ingresar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_reg_cliente" style="padding: 0px 5px;">
            <p>Numero de identificacion :</p>
            <input class="input " type="number" name="Id_Clientes" id="Id_Clientes" placeholder="Ingresa el numero de identificacion">
            <p>Razon Social :</p>
            <input class="input " type="text" name="Razon_social" id="Razon_social" placeholder="Ingresar nombre de la empresa">
            <p>Nombre del Cliente:</p>
            <input class="input " type="text" name="Nombre" id="Nombre" placeholder="Ingresar nombre del cliente">
            <p>Telefono:</p>
            <input class="input" type="text" name="Telefono" id="Telefono" placeholder="Ingrese numero de contacto">
            <p>Correo :</p>
            <input class="input " type="text" name="Correo" id="Correo" placeholder="Ingrese  Correo">
            <p>Direccion:</p>
            <input class="input " type="text" name="Direccion" id="Direccion" placeholder="Ingrese la Direccion">

            <div class="opciones d-flex flex-column">
                <button data-btn="insertar" class="btn" id="btn-form-control-registrar">Registrar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-ingresar">Cancelar</label>
            </div>
        </form>
    </div>
</div>

<div id="modal-actualizar" class="modal modal-derecha">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Actualizar Cliente</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-actualizar">close</button>
    </div>
    <div class="contenido_modal">
        <form id="form_act_cliente" style="padding: 0px 5px;">
            <p>Numero de identificacion :</p>
            <input class="input " type="number" name="Id_Clientes_edit" id="Id_Clientes_edit" placeholder="Ingresa el numero de identificacion">
            <p>Razon Social :</p>
            <input class="input " type="text" name="Razon_social_edit" id="Razon_social_edit" placeholder="Ingresar nombre de la empresa">
            <p>Nombre del Cliente:</p>
            <input class="input " type="text" name="Nombre_edit" id="Nombre_edit" placeholder="Ingresar nombre del cliente">
            <p>Telefono:</p>
            <input class="input" type="text" name="Telefono_edit" id="Telefono_edit" placeholder="Ingrese numero de contacto">
            <p>Correo :</p>
            <input class="input " type="text" name="Correo_edit" id="Correo_edit" placeholder="Ingrese  Correo">
            <p>Direccion </p>
            <input class="input " type="text" name="Direccion_edit" id="Direccion_edit" placeholder="Ingrese la Direccion">
            <div class="opciones d-flex flex-column">
                <button data-btn="actualizar" class="btn" id="btn-form-control-actualizar">Actualizar</button>
                <label class="btn btn-transparent txt-center" id="btn-form-control-cancel" data-modal="modal-actualizar">Cancelar</label>
            </div>
        </form>
    </div>
</div>
<div id="modal-historial-cliente" class="modal modal-derecha width-06">
    <div class="titulo_modal d-flex justify-between align-content-center">
        <h2>Historial del cliente</h2>
        <button class="btn btn-icon-self btn-transparent material-icons" id="close_modal" data-modal="modal-historial-cliente">close</button>
    </div>
    <div class="contenido_modal">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Medida</th>
                    <th>Acabado</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody id="body-historial">
            </tbody>
        </table>
    </div>
</div>