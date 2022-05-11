/*------------------------------------------ Vista ordenes ---------------------------------------------------*/
CREATE
OR REPLACE VIEW v_ordenes AS
SELECT
    t_clientes.Razon_social AS razon_social,
    t_orden_produccion.Calibre AS calibre,
    t_orden_produccion.Id_Produccion as Id_Folio,
    t_orden_produccion.Id_Catalogo_FK as Id_Catalogo,
    t_orden_produccion.Cantidad AS cantidad_elaborar,
    t_orden_produccion.Estado_general AS estado_general,
    t_salida_almacen.Fecha,
    t_cotizacion.Id_Clientes_FK AS Clientes,
    t_pedido.Factor AS factor,
    t_salida_almacen.Id_Folio AS Id_Salida_FK,
    t_pedido.Id_Pedido,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Tratamiento AS tratamiento,
    t_pedido.Material AS material,
    t_pedido.Acabado AS acabados,
    t_pedido.Precio_millar AS precio_millar,
    t_pedido.Precio_millar * t_orden_produccion.Cantidad AS TOTAL,
    t_pedido.Fecha_entrega AS fecha_entrega,
    t_pedido.Codigo AS codigo,
    t_pedido.Pedido_pza
from
    t_salida_almacen,
    t_pedido,
    t_orden_produccion,
    t_clientes,
    t_cotizacion
WHERE
    t_pedido.Id_Pedido = t_orden_produccion.Id_Pedido_FK
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_clientes.Id_Clientes = t_cotizacion.Id_Clientes_FK
ORDER BY
    t_orden_produccion.Id_Produccion DESC;

/*------------------------------------------ Vista Control --------------------------------------------------*/
CREATE
OR REPLACE VIEW v_control AS
SELECT
    t_orden_produccion.Id_Produccion AS Orden_Produccion,
    t_pedido.Factor,
    t_cotizacion.Id_Clientes_FK as Cliente,
    t_clientes.Razon_social AS razon_social,
    t_salida_almacen.Fecha,
    t_orden_produccion.cantidad AS cantidad_elaborar,
    CONCAT(t_pedido.Descripcion, " ", t_pedido.Medida) AS descripcion,
    t_pedido.Tratamiento AS tratamiento,
    t_pedido.Material AS material,
    t_pedido.Acabado AS acabados,
    t_orden_produccion.Id_Catalogo_FK AS plano
FROM
    t_salida_almacen,
    t_pedido,
    t_orden_produccion,
    t_clientes,
    t_cotizacion
WHERE
    t_pedido.Id_Pedido = t_orden_produccion.Id_Pedido_FK
AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
AND t_clientes.Id_Clientes = t_cotizacion.Id_Clientes_FK
AND t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK;
/*------------------------------------------ Informacion registro diario -----------------------------------------------*/

CREATE
OR REPLACE VIEW v_info_registro_diario AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.bote,
    t_registro_diario.no_maquina,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.turno,
    t_registro_diario.observaciones,
    t_control_produccion.Id_estado_1,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.Id_control_produccion = t_registro_diario.Id_control_produccion_1;

/*------------------------------------------ Vista Reporte Diario Por Kilos -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_reporte_forjado_kilos AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 1
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_ranurado_kilos AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 2
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_shank_kilos AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 4
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_rolado_kilos AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 3
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_acabado_kilos AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 6
ORDER BY
    id_registro_diario ASC;

/*------------------------------------------ Vista Reporte Diario Por Piezas -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_reporte_forjado_pzas AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.pzas,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 1
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_ranurado_pzas AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.pzas,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 2
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_shank_pzas AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.pzas,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 4
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_rolado_pzas AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.pzas,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 3
ORDER BY
    id_registro_diario ASC;

CREATE
OR REPLACE VIEW v_reporte_acabado_pzas AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_registro_diario.pzas,
    t_registro_diario.observaciones,
    t_registro_diario.no_maquina
FROM
    t_registro_diario,
    t_control_produccion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
    AND t_control_produccion.id_estado_1 = 6
ORDER BY
    id_registro_diario ASC;

/*------------------------------------------ Vista Reporte Diario -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_reportediario AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.fecha,
    t_registro_diario.turno,
    t_estados.estados AS estado_general,
    t_control_produccion.Id_Produccion_FK_1 AS Id_Folio,
    t_cotizacion.Id_Clientes_FK AS Clientes,
    t_registro_diario.kilos,
    t_registro_diario.pzas,
    t_registro_diario.no_maquina AS Maquina,
    t_pedido.Descripcion AS descripcion,
    t_registro_diario.observaciones
FROM
    t_control_produccion,
    t_registro_diario,
    t_estados,
    t_orden_produccion,
    t_pedido,
    t_cotizacion
WHERE
    t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_orden_produccion.Id_Produccion = t_control_produccion.Id_Produccion_FK_1
    AND t_orden_produccion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_control_produccion.Id_estado_1 = t_estados.id_estados
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK;  

/*------------------------------------------------ Vista Forjado -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_forjado AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'FORJADO';

/*------------------------------------------------ Vista ranurado -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_ranurado AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'RANURADO';

/*------------------------------------------------ Vista rolado -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_rolado AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'ROLADO';

/*------------------------------------------------ Vista shank -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_shank AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'SHANK';

/*------------------------------------------------ Vista cementado -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_cementado AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'CEMENTADO';

/*------------------------------------------------ Vista acabado -----------------------------------------------*/
CREATE
OR REPLACE VIEW v_acabado AS
SELECT
    t_registro_diario.id_registro_diario,
    t_registro_diario.no_maquina,
    t_registro_diario.bote,
    t_registro_diario.fecha,
    t_registro_diario.pzas,
    t_registro_diario.kilos,
    t_registro_diario.observaciones,
    t_control_produccion.Id_Produccion_FK_1
FROM
    t_registro_diario,
    t_estados,
    t_control_produccion
WHERE
    t_estados.id_estados = t_control_produccion.Id_estado_1
    AND t_control_produccion.id_control_produccion = t_registro_diario.Id_control_produccion_1
    AND t_estados.estados = 'ACABADO';

/* ------------------------------------------------- ESTADO DE LAS O.P. -------------------------------------------------*/
CREATE
OR REPLACE VIEW v_estado_op AS
SELECT
    t_orden_produccion.Id_Produccion AS Id_Folio,
    t_salida_almacen.Fecha,
    t_cotizacion.Id_Clientes_FK AS Clientes,
    CONCAT(t_pedido.Descripcion, " ", t_pedido.Medida) AS descripcion,
    t_pedido.Tratamiento AS tratamiento,
    t_pedido.Material AS material,
    t_orden_produccion.Cantidad AS cantidad_elaborar,
    t_pedido.Precio_millar AS precio_millar,
    t_pedido.Precio_millar * t_orden_produccion.cantidad AS TOTAL,
    t_orden_produccion.Estado_general AS estado_general
from
    t_salida_almacen,
    t_orden_produccion,
    t_pedido,
    t_cotizacion
WHERE
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_pedido.Id_Pedido = t_orden_produccion.Id_Pedido_FK
    AND t_orden_produccion.Estado_general != 'TERMINADO'
    AND t_orden_produccion.Estado_general != 'TERMINADA'
    AND t_orden_produccion.Estado_general != 'CANCELADA'
    AND t_orden_produccion.Estado_general != 'CANCELADO'
    AND t_salida_almacen.Fecha != '0000-00-00'
ORDER BY
    t_orden_produccion.Id_Produccion,t_salida_almacen.Fecha ASC;

/* ------------------------------------------------- PROGRAMA DE FORJADO -------------------------------------------------*/

CREATE 
OR REPLACE VIEW v_programa_forjado AS
SELECT 
    t_programa_forjado.Id_Programa_Forjado,
    t_orden_produccion.Calibre,
    t_pedido.Factor AS factor,
    t_orden_produccion.Id_Produccion,
    t_salida_almacen.Fecha,
    t_cotizacion.Id_Clientes_FK AS Clientes,
    t_pedido.Medida AS medida,
    t_pedido.Descripcion AS descripcion,
    t_pedido.Acabado AS acabados,
    t_orden_produccion.Cantidad AS cantidad_elaborar,
    t_pedido.Precio_millar AS precio_millar,
    t_programa_forjado.Fecha_entrega,
    t_programa_forjado.Herramental,
    t_programa_forjado.producto_desc,
    t_pedido.Tratamiento AS tratamiento,
    t_pedido.Precio_millar * t_pedido.Cantidad_millares AS TOTAL,
    t_programa_forjado.no_maquina
FROM 
    t_cotizacion,
    t_salida_almacen,
    t_pedido,
    t_programa_forjado,
    t_orden_produccion
WHERE 
    t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
    AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
    AND t_orden_produccion.Id_Pedido_FK = t_pedido.Id_Pedido
    AND t_orden_produccion.Id_Produccion = t_programa_forjado.Id_Produccion_FK;

/* ------------------------------------------------- LOGIN -------------------------------------------------*/
CREATE
OR REPLACE VIEW v_login AS
SELECT
    t_empleados.id_empleados,
    t_usuario.usuario,
    t_empleados.foto,
    concat(
        t_empleados.nombre,
        ' ',
        t_empleados.apellidoP,
        ' ',
        t_empleados.apellidoM
    ) AS nombre_completo,
    t_rol.nombreRol,
    t_departamento.nombre_departamento,
    t_puesto.nombrePuesto
FROM
    t_empleados,
    t_rol,
    t_departamento,
    t_usuario,
    t_puesto
WHERE
    t_empleados.id_empleados = t_usuario.id_empleado_1
    AND t_rol.id_rol = t_usuario.id_rol_1
    AND t_departamento.id_departamento = t_empleados.id_departamento_2
    AND t_puesto.id_puesto = t_empleados.id_puesto_1
ORDER BY
    t_empleados.id_empleados;


/* ------------------------------------------------- INFORMACIÓN NECESARIA. -------------------------------------------------*/
INSERT INTO
    t_clientes
VALUES
    (1, '-', '-', '-', '-', '-');

INSERT INTO
    t_salida_almacen
VALUES
    (
        1,
        1,
        '0000-00-00',
        0,
        0,
        '-',
        '-',
        '-',
        0.0,
        '0000-00-00',
        '-',
        '-',
        0,
        0.0,
        0.0,
        '-',
        0.0,
        '-',
        '-',
        '-',
        '-',
        '-'
    )