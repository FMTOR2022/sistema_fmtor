CREATE TABLE `t_empleados` (
  `id_empleado` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `apellidoP` varchar(255),
  `apellidoM` varchar(255),
  `fechaNacimiento` date,
  `telefono` int,
  `correo` varchar(255),
  `fechaIngreso` date,
  `curp` varchar(255),
  `rfc` varchar(255),
  `nss` varchar(255),
  `estado` varchar(255),
  `foto` longblob,
  `id_puesto` int
);

CREATE TABLE `t_usuario` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `id_empleado` int,
  `usuario` varchar(255),
  `contrasena` varchar(255),
  `id_rol` int
);

CREATE TABLE `t_direccion` (
  `id_empleado` int,
  `calle` varchar(255),
  `noInt` int,
  `noExt` int,
  `colonia` varchar(255),
  `cp` int,
  `alcaldia` varchar(255)
);

CREATE TABLE `t_prestamos` (
  `id_presamos` int PRIMARY KEY AUTO_INCREMENT,
  `fechaSolicitud` date,
  `monto` int,
  `interes` int,
  `semana` int,
  `pagos` int,
  `saldo` int,
  `totalP` int,
  `acumuladoP` int
);

CREATE TABLE `t_prestamosPendientes` (
  `id_prestamoP` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` date,
  `monto` int,
  `totalPP` int,
  `acumuladoPP` int
);

CREATE TABLE `t_cajaAhorro` (
  `id_cajaAhorro` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` date,
  `monto` int,
  `semana` int,
  `totalCA` int,
  `acumuladoCA` int
);

CREATE TABLE `t_aportacionEmpresa` (
  `id_aportacion` int PRIMARY KEY AUTO_INCREMENT,
  `semana` int,
  `monto` int,
  `totalA` int,
  `acumuladoA` int
);

CREATE TABLE `t_estatus` (
  `id_estatus` int PRIMARY KEY AUTO_INCREMENT,
  `id_presamos` int,
  `id_aportacion` int,
  `id_cajaAhorro` int
);

CREATE TABLE `t_bitacora` (
  `id_empleado` int PRIMARY KEY AUTO_INCREMENT,
  `monto` int,
  `fecha` datetime,
  `tipoMovimiento` varchar(255)
);

CREATE TABLE `t_puesto` (
  `id_puesto` int PRIMARY KEY AUTO_INCREMENT,
  `nombrePuesto` varchar(255),
  `id_departamento` int
);

CREATE TABLE `t_rol` (
  `id_rol` int PRIMARY KEY AUTO_INCREMENT,
  `nombreRol` varchar(255)
);

CREATE TABLE `t_horario` (
  `id_horario` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int,
  `entrada` timestamp,
  `almuerzoS` timestamp,
  `almuerzoR` timestamp,
  `salida` timestamp
);

CREATE TABLE `t_datos_bancarios` (
  `id_bancarios` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int,
  `id_empleado` int,
  `sueldo_semanal` double,
  `periodo_pago` varchar(255),
  `clave_interbancaria` int
);

CREATE TABLE `t_fecha` (
  `id_fecha` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int,
  `fecha_entrada` timestamp,
  `fecha_salida` timestamp,
  `fecha_almuerzoR` timestamp,
  `fecha_almuerzoS` timestamp
);

CREATE TABLE `t_foto_entrada` (
  `id_foto_entrada` int PRIMARY KEY AUTO_INCREMENT,
  `foto_entrada` longblob,
  `id_fecha` int,
  `id_usuario` int
);

CREATE TABLE `t_foto_salida` (
  `id_foto_salida` int PRIMARY KEY AUTO_INCREMENT,
  `foto_salida` longblob,
  `id_fecha` int,
  `id_usuario` int
);

CREATE TABLE `t_clientes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nip` int,
  `nombre` varchar(255),
  `direccion` varchar(255),
  `empresa` varchar(255),
  `dateadd` datetime,
  `telefono` int
);

CREATE TABLE `t_orden_de_produccion` (
  `op` int PRIMARY KEY AUTO_INCREMENT,
  `n_pedido` int,
  `fecha` date,
  `cantidad` bigint,
  `codigo_dibujo` varchar(255),
  `autorizacion` varchar(255),
  `agente` varchar(255),
  `id_tornillo` int,
  `id_cliente` int
);

CREATE TABLE `t_estados` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `estado` varchar(255)
);

CREATE TABLE `t_tornillo` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_descripcion` int,
  `id_acabado` int,
  `id_medida` int,
  `precio` float,
  `id_material` int,
  `id_ubicacion` int
);

CREATE TABLE `t_descripcion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(255)
);

CREATE TABLE `t_material` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `calibre` double
);

CREATE TABLE `t_acabados` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `i_e` varchar(255)
);

CREATE TABLE `t_medida` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `espesor` varchar(255),
  `longitud` varchar(255),
  `factor` double
);

CREATE TABLE `t_control_de_produccion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `kilos_acumulados` double,
  `pzas_acumuladas` int,
  `op` int,
  `id_estado` int
);

CREATE TABLE `t_registro_diario` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `no_maquina` int,
  `fecha` date,
  `botes` int,
  `pzas` int,
  `kilos` double,
  `turno` int,
  `observaciones` varchar(255),
  `id_control` int,
  `id_estado` int
);

CREATE TABLE `t_cotizacion` (
  `id_cliente` int PRIMARY KEY AUTO_INCREMENT,
  `nom_cliente` varchar(255),
  `fecha` date,
  `clave` varchar(255),
  `cantidad_millares` bigint,
  `precio_millar` int,
  `total` int
);

CREATE TABLE `t_reportes_cliente` (
  `id_cliente` int PRIMARY KEY AUTO_INCREMENT,
  `fecha_entrega` date,
  `num_parte` int,
  `ub_orden_trab_sufijo` varchar(255),
  `can_ordenada` int,
  `can_recibida` int,
  `can_abierta` int,
  `recibido_inspeccionado` varchar(255),
  `costo_unitario` float,
  `monto_extendido` float,
  `op` int
);

CREATE TABLE `t_salida_almacen` (
  `fecha` date,
  `cantidad` int,
  `parte` varchar(255),
  `pedido` int,
  `medida` int,
  `descripcion` varchar(255),
  `acabado` varchar(255),
  `costo` int,
  `factura` varchar(255),
  `empaque` varchar(255),
  `num_plano` int,
  `autorizacion` varchar(255),
  `despacho` varchar(255),
  `recibido` varchar(255),
  `op` int
);

CREATE TABLE `t_op` (
  `op` int PRIMARY KEY AUTO_INCREMENT,
  `num_pedido` int,
  `precio` int,
  `fecha` date,
  `descripcion` varchar(255),
  `cantidad` bigint,
  `codigo_dibujo` varchar(255),
  `autorizacion` varchar(255),
  `agente` varchar(255),
  `id_tornillo` int,
  `id_cliente` int
);

CREATE TABLE `t_ubicacion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255)
);

CREATE TABLE `t_certificados` (
  `id_certificado` int PRIMARY KEY AUTO_INCREMENT,
  `no_parte` varchar(255),
  `pedido` varchar(255),
  `factura` varchar(255),
  `cantidad` varchar(255),
  `med_tornillo` varchar(255),
  `acabado` varchar(255),
  `fecha_registro` date
);

CREATE TABLE `t_departamento` (
  `id_departamento` int PRIMARY KEY AUTO_INCREMENT,
  `nom_departamento` varchar(255)
);

CREATE TABLE `t_maquina` (
  `id_maquina` int PRIMARY KEY AUTO_INCREMENT,
  `tipo_de_maquina` varchar(50),
  `nombre_maquina` varchar(50)
);

CREATE TABLE `t_refacciones` (
  `id_refaccion` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(50),
  `clave_modelo` varchar(15),
  `existencia` int,
  `id_maquina` int
);

CREATE TABLE `t_mantenimiemto_correctivo` (
  `id_mantenimiento_co` varchar(30) PRIMARY KEY,
  `id_maquina` int,
  `fecha_aprobacion` date,
  `version` varchar(15),
  `solicitado_por` char(50),
  `autorizado_por` char(50),
  `prioridad` boolean,
  `anomalia` text,
  `causa_amomalia` text,
  `solucion` text,
  `autorizacion` varchar(50),
  `realizado_por` char(50),
  `aprobado_por` char(50),
  `liberado_por` char(50)
);

CREATE TABLE `t_mantenimiento_preventivo` (
  `id_mantenimiento_preventivo` varchar(30) PRIMARY KEY,
  `id_maquina` int,
  `fecha_aprobacion` date,
  `frecuencia` varchar(30),
  `estado_maquina` int,
  `realizado_por` char(50),
  `aprobado_por` char(50),
  `liberado_por` char(50),
  `observaciones` text
);

CREATE TABLE `t_criterio_inspeccion` (
  `id_criterio_inspeccion` int PRIMARY KEY AUTO_INCREMENT,
  `nom_criterio` varchar(60),
  `estado_funcionalidad` int,
  `id_maquina` int,
  `id_mantenimiento_preventivo` varchar(30)
);

CREATE TABLE `t_materiales_empleados` (
  `id_material_empleado` int PRIMARY KEY,
  `cantidad` int,
  `descripcion` varchar(50),
  `costo` float,
  `fecha` date,
  `total` float,
  `id_maquina` int,
  `id_mantenimiento_co` varchar(30)
);

CREATE TABLE `t_foto_inspeccion` (
  `id_foto` int PRIMARY KEY AUTO_INCREMENT,
  `foto` blob,
  `id_criterio_inspeccion` int,
  `id_material_empleado` int
);

CREATE TABLE `t_reportes_maquina` (
  `id_reporte` int PRIMARY KEY AUTO_INCREMENT,
  `tipo_de_reporte` varchar(30),
  `fecha_creacion` date,
  `hora_creacion` time,
  `archivo` longblob,
  `id_mantenimiento_co` varchar(30),
  `id_mantenimiento_preventivo` varchar(30)
);

CREATE TABLE `t_localizacion_inventario` (
  `id_localizacion` int PRIMARY KEY AUTO_INCREMENT,
  `anaquel` int,
  `no_caja_fila` varchar(20),
  `no_cajas_rollos` int,
  `no_cliente_proveedor` varchar(20)
);

CREATE TABLE `t_cantidad` (
  `id_cantidad` int PRIMARY KEY AUTO_INCREMENT,
  `inventario_inicial` int,
  `inventario_final` int,
  `precio_por_milla` varchar(20)
);

CREATE TABLE `t_inventario_mensual` (
  `id_mes` int PRIMARY KEY AUTO_INCREMENT,
  `nom_mes` char(15),
  `no_inv_mes` int
);

CREATE TABLE `t_inventario_mantenimiento` (
  `id_producto` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(30),
  `medida` varchar(20),
  `cantidad_pieza` char(10),
  `cantidad_kilo` char(10),
  `id_localizacion` int,
  `id_cantidad` int,
  `costo` int,
  `total` int,
  `id_mes` int,
  `total_ocupado` int,
  `compra` int
);

CREATE TABLE `t_residentes` (
  `id_residente` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_residente` varchar(255),
  `apellidoP` varchar(255),
  `apellidoM` varchar(255),
  `fechaNacimiento` date,
  `telefono` int,
  `correo` varchar(255),
  `fechaIngreso` date,
  `curp` varchar(255),
  `rfc` varchar(255),
  `nss` varchar(255),
  `foto` longblob,
  `periodo` varchar(255),
  `id_usuario` int,
  `id_fecha` int
);

ALTER TABLE `t_empleados` ADD FOREIGN KEY (`id_puesto`) REFERENCES `t_puesto` (`id_puesto`);

ALTER TABLE `t_usuario` ADD FOREIGN KEY (`id_empleado`) REFERENCES `t_empleados` (`id_empleado`);

ALTER TABLE `t_usuario` ADD FOREIGN KEY (`id_rol`) REFERENCES `t_rol` (`id_rol`);

ALTER TABLE `t_direccion` ADD FOREIGN KEY (`id_empleado`) REFERENCES `t_empleados` (`id_empleado`);

ALTER TABLE `t_estatus` ADD FOREIGN KEY (`id_presamos`) REFERENCES `t_prestamos` (`id_presamos`);

ALTER TABLE `t_estatus` ADD FOREIGN KEY (`id_aportacion`) REFERENCES `t_aportacionEmpresa` (`id_aportacion`);

ALTER TABLE `t_estatus` ADD FOREIGN KEY (`id_cajaAhorro`) REFERENCES `t_cajaAhorro` (`id_cajaAhorro`);

ALTER TABLE `t_puesto` ADD FOREIGN KEY (`id_departamento`) REFERENCES `t_departamento` (`id_departamento`);

ALTER TABLE `t_horario` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_datos_bancarios` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_datos_bancarios` ADD FOREIGN KEY (`id_empleado`) REFERENCES `t_empleados` (`id_empleado`);

ALTER TABLE `t_fecha` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_foto_entrada` ADD FOREIGN KEY (`id_fecha`) REFERENCES `t_fecha` (`id_fecha`);

ALTER TABLE `t_foto_entrada` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_foto_salida` ADD FOREIGN KEY (`id_fecha`) REFERENCES `t_fecha` (`id_fecha`);

ALTER TABLE `t_foto_salida` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_orden_de_produccion` ADD FOREIGN KEY (`id_tornillo`) REFERENCES `t_tornillo` (`id`);

ALTER TABLE `t_orden_de_produccion` ADD FOREIGN KEY (`id_cliente`) REFERENCES `t_clientes` (`id`);

ALTER TABLE `t_tornillo` ADD FOREIGN KEY (`id_descripcion`) REFERENCES `t_descripcion` (`id`);

ALTER TABLE `t_tornillo` ADD FOREIGN KEY (`id_acabado`) REFERENCES `t_acabados` (`id`);

ALTER TABLE `t_tornillo` ADD FOREIGN KEY (`id_medida`) REFERENCES `t_medida` (`id`);

ALTER TABLE `t_tornillo` ADD FOREIGN KEY (`id_material`) REFERENCES `t_material` (`id`);

ALTER TABLE `t_tornillo` ADD FOREIGN KEY (`id_ubicacion`) REFERENCES `t_ubicacion` (`id`);

ALTER TABLE `t_control_de_produccion` ADD FOREIGN KEY (`op`) REFERENCES `t_orden_de_produccion` (`op`);

ALTER TABLE `t_control_de_produccion` ADD FOREIGN KEY (`id_estado`) REFERENCES `t_estados` (`id`);

ALTER TABLE `t_registro_diario` ADD FOREIGN KEY (`id_control`) REFERENCES `t_control_de_produccion` (`id`);

ALTER TABLE `t_registro_diario` ADD FOREIGN KEY (`id_estado`) REFERENCES `t_estados` (`id`);

ALTER TABLE `t_reportes_cliente` ADD FOREIGN KEY (`op`) REFERENCES `t_op` (`op`);

ALTER TABLE `t_salida_almacen` ADD FOREIGN KEY (`op`) REFERENCES `t_op` (`op`);

ALTER TABLE `t_op` ADD FOREIGN KEY (`id_tornillo`) REFERENCES `t_tornillo` (`id`);

ALTER TABLE `t_op` ADD FOREIGN KEY (`id_cliente`) REFERENCES `t_clientes` (`id`);

ALTER TABLE `t_refacciones` ADD FOREIGN KEY (`id_maquina`) REFERENCES `t_maquina` (`id_maquina`);

ALTER TABLE `t_mantenimiemto_correctivo` ADD FOREIGN KEY (`id_maquina`) REFERENCES `t_maquina` (`id_maquina`);

ALTER TABLE `t_mantenimiento_preventivo` ADD FOREIGN KEY (`id_maquina`) REFERENCES `t_maquina` (`id_maquina`);

ALTER TABLE `t_criterio_inspeccion` ADD FOREIGN KEY (`id_maquina`) REFERENCES `t_maquina` (`id_maquina`);

ALTER TABLE `t_criterio_inspeccion` ADD FOREIGN KEY (`id_mantenimiento_preventivo`) REFERENCES `t_mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

ALTER TABLE `t_materiales_empleados` ADD FOREIGN KEY (`id_maquina`) REFERENCES `t_maquina` (`id_maquina`);

ALTER TABLE `t_materiales_empleados` ADD FOREIGN KEY (`id_mantenimiento_co`) REFERENCES `t_mantenimiemto_correctivo` (`id_mantenimiento_co`);

ALTER TABLE `t_foto_inspeccion` ADD FOREIGN KEY (`id_criterio_inspeccion`) REFERENCES `t_criterio_inspeccion` (`id_criterio_inspeccion`);

ALTER TABLE `t_foto_inspeccion` ADD FOREIGN KEY (`id_material_empleado`) REFERENCES `t_materiales_empleados` (`id_material_empleado`);

ALTER TABLE `t_reportes_maquina` ADD FOREIGN KEY (`id_mantenimiento_co`) REFERENCES `t_mantenimiemto_correctivo` (`id_mantenimiento_co`);

ALTER TABLE `t_reportes_maquina` ADD FOREIGN KEY (`id_mantenimiento_preventivo`) REFERENCES `t_mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

ALTER TABLE `t_inventario_mantenimiento` ADD FOREIGN KEY (`id_localizacion`) REFERENCES `t_localizacion_inventario` (`id_localizacion`);

ALTER TABLE `t_inventario_mantenimiento` ADD FOREIGN KEY (`id_cantidad`) REFERENCES `t_cantidad` (`id_cantidad`);

ALTER TABLE `t_inventario_mantenimiento` ADD FOREIGN KEY (`id_mes`) REFERENCES `t_inventario_mensual` (`id_mes`);

ALTER TABLE `t_residentes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `t_usuario` (`id_usuario`);

ALTER TABLE `t_residentes` ADD FOREIGN KEY (`id_fecha`) REFERENCES `t_fecha` (`id_fecha`);
