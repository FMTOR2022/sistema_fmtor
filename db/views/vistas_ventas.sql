/*------------------------------------------ Vista Salida de Almacen ---------------------------------------------------*/
-- PRODUCTO INTERNO
CREATE
OR REPLACE VIEW v_salidas_almacen AS
SELECT
    t_salida_almacen.Id_Folio AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_salida_almacen.Fecha AS fecha,
    t_salida_almacen.Estado AS estado,
    t_cotizacion.Id_Cotizacion AS id_cotizacion
FROM
    t_cotizacion,
    t_salida_almacen,
    t_clientes
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
ORDER BY
    t_salida_almacen.Id_Folio DESC;


-- PRODUCTO EXTERNO

CREATE
OR REPLACE VIEW v_salidas_almacen_externo AS
SELECT
    t_salida_almacen.Id_Folio AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_informacion_empresa.Id_Empresa AS id_empresa,
    t_informacion_empresa.Empresa AS empresa,
    t_salida_almacen.Fecha AS fecha,
    t_salida_almacen.Estado AS estado,
    t_cotizacion.Id_Cotizacion AS id_cotizacion
FROM
    t_cotizacion,
    t_informacion_empresa,
    t_salida_almacen,
    t_clientes
WHERE t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
ORDER BY
    t_salida_almacen.Id_Folio DESC;

CREATE
OR REPLACE VIEW v_facuracion_salida AS
SELECT
    t_salida_almacen.Id_Folio AS id_folio,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_facturacion.Concepto AS concepto,
    t_facturacion.Id_Empresa_FK AS id_empresa,
    t_informacion_empresa.Empresa AS empresa
FROM
    t_salida_almacen,
    t_facturacion,
    t_informacion_empresa,
    t_pedido
WHERE
    t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_facturacion.Id_Empresa_FK = t_informacion_empresa.Id_Empresa
ORDER BY
    t_salida_almacen.Id_Folio DESC;

/*------------------------------------------ Vista Historial ---------------------------------------------------*/

CREATE 
OR REPLACE VIEW v_historial_salidas_almacen AS
SELECT 
    t_salida_almacen.Id_Folio AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_salida_almacen.Fecha AS fecha,
    t_pedido.Cantidad_millares AS cantidad,
    t_pedido.Codigo AS no_parte,
    t_pedido.Pedido_pza AS pedido_cliente,
    t_pedido.Precio_millar AS costo,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Acabado AS acabados,
    t_pedido.Material AS material,
    t_pedido.Id_Pedido,
    t_pedido.Kardex AS kardex,
    t_pedido.Factor
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
ORDER BY
    t_salida_almacen.Id_Folio DESC;

CREATE 
OR REPLACE VIEW v_historial_cliente AS
SELECT 
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_cotizacion.Fecha AS fecha,
    t_pedido.Cantidad_millares AS cantidad,
    t_pedido.Codigo AS no_parte,
    t_pedido.Pedido_pza AS pedido_cliente,
    t_pedido.Precio_millar AS costo,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Acabado AS acabados,
    t_pedido.Material AS material,
    t_pedido.Id_Pedido,
    t_pedido.Kardex AS kardex,
    t_pedido.Factor
FROM
    t_clientes,
    t_pedido,
    t_cotizacion
WHERE
    t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK;

-- FACTURACIÓN TERMINADAS FORJADORA

CREATE
OR REPLACE VIEW v_salidas_almacen_terminadas AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_facturacion.concepto = 0
    AND t_facturacion.Id_Empresa_FK = 1
ORDER BY
    t_salida_almacen.Id_Folio DESC;

-- FACTURACIÓN TERMINADAS RDG

CREATE
OR REPLACE VIEW v_salidas_almacen_terminadas_rdg AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_facturacion.concepto = 0
    AND t_facturacion.Id_Empresa_FK = 2
ORDER BY
    t_salida_almacen.Id_Folio DESC;

-- FACTURACIÓN CANCELADAS

CREATE
OR REPLACE VIEW v_salidas_almacen_canceladas AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_facturacion.Concepto = 4
ORDER BY
    t_salida_almacen.Id_Folio DESC;

-- FACTURACIÓN COMPRAS
CREATE
OR REPLACE VIEW v_salidas_almacen_compra AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_facturacion.Concepto = 3
ORDER BY
    t_salida_almacen.Id_Folio DESC;

-- FACTURACIÓN POR COMISIÓN

CREATE
OR REPLACE VIEW v_salidas_almacen_comision AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_salida_almacen.Estado = 0
    AND t_facturacion.Concepto = 2
ORDER BY
    t_salida_almacen.Id_Folio DESC;

CREATE
OR REPLACE VIEW v_salidas_almacen_notas AS
SELECT
    t_facturacion.Factura AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_facturacion.Fecha AS fecha,
    t_facturacion.Cantidad_Entregada AS cantidad,
    t_facturacion.Kilos_Entregados AS kilos,
    t_pedido.Precio_millar AS costo,
    t_facturacion.Factura AS factura,
    t_facturacion.Empaque AS empaque,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_salida_almacen.Estado
FROM
    t_salida_almacen,
    t_clientes,
    t_pedido,
    t_cotizacion,
    t_facturacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_salida_almacen.Estado = 0
    AND t_facturacion.Concepto = 1
ORDER BY
    t_salida_almacen.Id_Folio DESC;

CREATE
OR REPLACE VIEW v_salidas_disponibles AS
SELECT
    t_salida_almacen.Id_Folio AS id_folio,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social
FROM
    t_salida_almacen,
    t_clientes,
    t_cotizacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_salida_almacen.Estado != 1
ORDER BY
    t_salida_almacen.Id_Folio DESC;

CREATE
OR REPLACE VIEW v_informacion_pedido AS
SELECT
    t_pedido.Cantidad_millares AS cantidad,
    t_pedido.Codigo AS no_parte,
    t_pedido.Pedido_pza AS pedido_cliente,
    t_pedido.Precio_millar AS costo,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Acabado AS acabados,
    t_pedido.Material AS material,
    t_pedido.Id_Pedido,
    t_pedido.Factor,
    t_orden_produccion.Id_Produccion,
    t_orden_produccion.Id_Catalogo_FK,
    t_orden_produccion.cantidad AS cantidad_elaborar
FROM
    t_pedido,
    t_orden_produccion
WHERE
    t_pedido.Id_Pedido = t_orden_produccion.Id_Pedido_FK
ORDER BY
    t_pedido.Id_Pedido DESC;

/*        COTIZACIONES       */

CREATE 
OR REPLACE VIEW v_cotizaciones AS
SELECT 
    t_cotizacion.Id_Cotizacion AS id_cotizacion,
    t_clientes.Id_Clientes AS Id_Clientes,
    t_clientes.Razon_social AS razon_social,
    t_clientes.Nombre AS nombre,
    t_clientes.Telefono AS telefono,
    t_clientes.Correo AS correo,
    t_cotizacion.Fecha AS fecha,
    t_pedido.Cantidad_millares AS cantidad,
    t_pedido.Codigo AS no_parte,
    t_pedido.Pedido_pza AS pedido_cliente,
    t_pedido.Precio_millar AS costo,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Acabado AS acabado,
    t_pedido.Material AS material,
    t_pedido.Factor AS factor,
    t_pedido.Tratamiento AS tratamiento,
    t_pedido.Id_Pedido
FROM
    t_clientes,
    t_pedido,
    t_cotizacion
WHERE
    t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
ORDER BY
    t_cotizacion.Id_Cotizacion DESC;

CREATE
OR REPLACE VIEW v_cotizacion AS
SELECT
    t_cotizacion.Id_Cotizacion AS id_cotizacion,
    t_clientes.Id_Clientes AS id_clientes,
    t_clientes.Razon_social AS razon_social,
    t_cotizacion.Fecha AS fecha
FROM
    t_clientes,
    t_cotizacion
WHERE
    t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
ORDER BY
    t_cotizacion.Id_Cotizacion DESC;

/*------------------------------------------ Vista Orden de Compra ---------------------------------------------------*/

CREATE
OR REPLACE VIEW v_orden_compra AS 
SELECT
    t_orden_compra.Id_Compra,
    t_orden_compra.Fecha,
    t_orden_compra.Solicitado,
    t_orden_compra.Terminos,
    t_orden_compra.Contacto,
    t_proveedores.Proveedor,
    t_informacion_empresa.Empresa,
    t_orden_compra.FK_Empresa,
    t_orden_compra.FK_Proveedor
FROM 
    t_orden_compra,
    t_proveedores,
    t_informacion_empresa
WHERE 
    t_orden_compra.FK_Proveedor = t_proveedores.Id_Proveedor 
    AND t_orden_compra.FK_Empresa = t_informacion_empresa.Id_Empresa
ORDER BY Id_Compra DESC;

CREATE 
OR REPLACE VIEW v_historial_compra AS 
SELECT
    t_salida_almacen.Id_Folio AS id_folio,
    t_orden_compra.Id_Compra AS id_compra,
    t_informacion_empresa.Empresa AS empresa,
    t_orden_compra.FK_Empresa AS fk_empresa,
    t_pedido_compra.Codigo AS codigo,
    t_pedido_compra.Producto AS producto,
    t_pedido_compra.Factor AS factor,
    t_pedido_compra.Medida AS medida,
    t_pedido_compra.Cantidad AS cantidad,
    t_pedido_compra.Precio AS precio,
    t_pedido_compra.Id_Pedido_Compra AS id_pedido_compra,
    t_pedido.Id_Pedido AS id_pedido,
    t_proveedores.Proveedor AS proveedor
FROM
    t_salida_almacen,
    t_orden_compra,
    t_informacion_empresa,
    t_pedido_compra,
    t_pedido,
    t_cotizacion,
    t_proveedores
WHERE
    t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_orden_compra.FK_Proveedor = t_proveedores.Id_Proveedor
    AND t_salida_almacen.Id_Cotizacion_FK = t_cotizacion.Id_Cotizacion
    AND t_pedido.Id_Pedido = t_pedido_compra.Id_Pedido_FK
    AND t_informacion_empresa.Id_Empresa = t_orden_compra.FK_Empresa
    AND t_orden_compra.Id_Compra = t_pedido_compra.FK_Orden_Compra
ORDER BY t_orden_compra.Id_Compra;

/*------------------------------------------ Vista Empresas ---------------------------------------------------*/

CREATE
OR REPLACE VIEW v_empresa AS 
SELECT
    Id_Empresa,
    Empresa
FROM 
    t_informacion_empresa;

/*------------------------------------------ Vista Proveedor ---------------------------------------------------*/

CREATE
OR REPLACE VIEW v_proveedor AS 
SELECT
    Id_Proveedor,
    Proveedor
FROM 
    t_proveedores;

/*------------------------------------------ Vista Clientes ---------------------------------------------------*/
CREATE
OR REPLACE VIEW v_clientes AS
SELECT
    Id_Clientes,
    Razon_social
FROM
    t_clientes
ORDER BY
    Razon_social ASC;
