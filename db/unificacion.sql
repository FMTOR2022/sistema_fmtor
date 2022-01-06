-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2021 a las 19:21:10
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_rdg_fmtor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE `cantidad` (
  `id_cantidad` int(11) NOT NULL,
  `inventario_inicial` int(11) DEFAULT NULL,
  `inventario_final` int(11) DEFAULT NULL,
  `precio_por_milla` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio_inspeccion`
--

CREATE TABLE `criterio_inspeccion` (
  `id_criterio_inspeccion` int(11) NOT NULL,
  `nom_criterio` varchar(60) DEFAULT NULL,
  `estado_funcionalidad` int(11) DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL,
  `id_mantenimiento_preventivo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto` blob DEFAULT NULL,
  `id_criterio_inspeccion` int(11) DEFAULT NULL,
  `id_material_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_mantenimiento`
--

CREATE TABLE `inventario_mantenimiento` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `medida` varchar(20) DEFAULT NULL,
  `cantidad_pieza` char(10) DEFAULT NULL,
  `cantidad_kilo` char(10) DEFAULT NULL,
  `id_localizacion` int(11) DEFAULT NULL,
  `id_cantidad` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_mes` int(11) DEFAULT NULL,
  `total_ocupado` int(11) DEFAULT NULL,
  `compra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_mensual`
--

CREATE TABLE `inventario_mensual` (
  `id_mes` int(11) NOT NULL,
  `nom_mes` char(15) DEFAULT NULL,
  `no_inv_mes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion_inventario`
--

CREATE TABLE `localizacion_inventario` (
  `id_localizacion` int(11) NOT NULL,
  `anaquel` int(11) DEFAULT NULL,
  `no_caja_fila` varchar(20) DEFAULT NULL,
  `no_cajas_rollos` int(11) DEFAULT NULL,
  `no_cliente_proveedor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiemto_correctivo`
--

CREATE TABLE `mantenimiemto_correctivo` (
  `id_mantenimiento_co` varchar(30) NOT NULL,
  `nombre_maquina` varchar(50) DEFAULT NULL,
  `fecha_aprobacion` date DEFAULT NULL,
  `version` varchar(15) DEFAULT NULL,
  `solicitado_por` char(50) DEFAULT NULL,
  `autorizado_por` char(50) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `anomalia` text DEFAULT NULL,
  `causa_amomalia` text DEFAULT NULL,
  `solucion` text DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL,
  `autorizacion` varchar(50) DEFAULT NULL,
  `realizado_por` char(50) DEFAULT NULL,
  `aprobado_por` char(50) DEFAULT NULL,
  `liberado_por` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_preventivo`
--

CREATE TABLE `mantenimiento_preventivo` (
  `id_mantenimiento_preventivo` varchar(30) NOT NULL,
  `nombre_maquina` varchar(50) DEFAULT NULL,
  `fecha_aprobacion` date DEFAULT NULL,
  `frecuencia` varchar(30) DEFAULT NULL,
  `estado_maquina` int(11) DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL,
  `realizado_por` char(50) DEFAULT NULL,
  `aprobado_por` char(50) DEFAULT NULL,
  `liberado_por` char(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `id_maquina` int(11) NOT NULL,
  `tipo_de_maquina` varchar(50) DEFAULT NULL,
  `nombre_maquina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_empleados`
--

CREATE TABLE `materiales_empleados` (
  `id_material_empleado` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_mantenimiento_co` varchar(30) DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones`
--

CREATE TABLE `refacciones` (
  `id_refaccion` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `clave_modelo` varchar(15) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `id_maquina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `tipo_de_reporte` varchar(30) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `hora_creacion` time DEFAULT NULL,
  `archivo` longblob DEFAULT NULL,
  `id_mantenimiento_co` varchar(30) DEFAULT NULL,
  `id_mantenimiento_preventivo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_aportacionempresa`
--

CREATE TABLE `t_aportacionempresa` (
  `id_aportacion` int(11) NOT NULL,
  `monto` int(11) DEFAULT NULL,
  `fecha_inicio_CA` date DEFAULT NULL,
  `fecha_cierre_CA` date DEFAULT NULL,
  `acumulado_semanal_CA` bigint(20) DEFAULT NULL,
  `acumulado_total_CA` bigint(20) DEFAULT NULL,
  `total_final_CA` bigint(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_bitacora`
--

CREATE TABLE `t_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `monto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipoMovimiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cajaahorro`
--

CREATE TABLE `t_cajaahorro` (
  `id_cajaAhorro` int(11) NOT NULL,
  `fecha_inicio_CA` date DEFAULT NULL,
  `fecha_cierre_CA` date DEFAULT NULL,
  `acumulado_semanal_CA` bigint(20) DEFAULT NULL,
  `acumulado_total_CA` bigint(20) DEFAULT NULL,
  `total_final_CA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_catalogo`
--

CREATE TABLE `t_catalogo` (
  `Id_Catalogo` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Medida` varchar(30) DEFAULT NULL,
  `Id_Acabados` int(11) DEFAULT NULL,
  `PDF` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_certificado`
--

CREATE TABLE `t_certificado` (
  `Id_Certificado` int(11) NOT NULL,
  `No_DeParte` varchar(50) DEFAULT NULL,
  `Tornillo` varchar(50) DEFAULT NULL,
  `Factura` varchar(50) DEFAULT NULL,
  `Material` varchar(50) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Id_Folio` int(11) DEFAULT NULL,
  `Cant_Ent` varchar(50) DEFAULT NULL,
  `Cant_Inspecc` varchar(50) DEFAULT NULL,
  `Paquete` varchar(50) DEFAULT NULL,
  `Tolerancia` varchar(50) DEFAULT NULL,
  `Lectura_Verificada` varchar(50) DEFAULT NULL,
  `Id_Acabados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_clientes`
--

CREATE TABLE `t_clientes` (
  `Id_Clientes` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Razon_social` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `c_p` varchar(50) DEFAULT NULL,
  `alcaldia` varchar(50) DEFAULT NULL,
  `Telefono` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contacto`
--

CREATE TABLE `t_contacto` (
  `id_contacto` int(11) NOT NULL,
  `Nombre_contacto` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cotizacion`
--

CREATE TABLE `t_cotizacion` (
  `Id_Cotizacion` int(11) NOT NULL,
  `Id_Clientes` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Id_Catalogo` int(11) DEFAULT NULL,
  `Cantidad_millares` int(11) DEFAULT NULL,
  `Precio_millar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_direccion`
--

CREATE TABLE `t_direccion` (
  `id_direccion` int(11) NOT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `noInt` int(11) DEFAULT NULL,
  `noExt` int(11) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `alcaldia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empleados`
--

CREATE TABLE `t_empleados` (
  `id_empleados` int(11) NOT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `foto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estados`
--

CREATE TABLE `t_estados` (
  `id_estados` int(11) NOT NULL,
  `estados` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horario`
--

CREATE TABLE `t_horario` (
  `id_horario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `almuerzoS` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `almuerzoR` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `salida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_incidencias`
--

CREATE TABLE `t_incidencias` (
  `id_incidencias` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `tipo_incidencia` varchar(255) DEFAULT NULL,
  `inicio_in` date DEFAULT NULL,
  `fin_in` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_iso`
--

CREATE TABLE `t_iso` (
  `Id_empleados` int(11) DEFAULT NULL,
  `Observaciones` varchar(150) DEFAULT NULL,
  `Id_ISO` int(11) NOT NULL,
  `Tipo_herramienta` varchar(50) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_orden_produccion`
--

CREATE TABLE `t_orden_produccion` (
  `Id_Folio` int(11) NOT NULL,
  `Id_salida_almacen` int(11) DEFAULT NULL,
  `Fecha_entrega` datetime DEFAULT NULL,
  `cantidad_elaborar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pedido`
--

CREATE TABLE `t_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Id_Clientes` int(11) DEFAULT NULL,
  `id_empleados` int(11) DEFAULT NULL,
  `Id_Folio` int(11) DEFAULT NULL,
  `Factura` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prestamos`
--

CREATE TABLE `t_prestamos` (
  `id_prestamos` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `monto_P` int(11) DEFAULT NULL,
  `porcentaje_interes_P` varchar(255) DEFAULT NULL,
  `fecha_inicio_P` date DEFAULT NULL,
  `fecha_cierre_P` date DEFAULT NULL,
  `acumulado_semanal_P` bigint(20) DEFAULT NULL,
  `acumulado_total_P` bigint(20) DEFAULT NULL,
  `total_final_P` bigint(20) DEFAULT NULL,
  `historial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prestamospendientes`
--

CREATE TABLE `t_prestamospendientes` (
  `id_prestamoP` int(11) NOT NULL,
  `monto_P` int(11) DEFAULT NULL,
  `porcentaje_interes_P` varchar(255) DEFAULT NULL,
  `fecha_inicio_P` date DEFAULT NULL,
  `fecha_cierre_P` date DEFAULT NULL,
  `acumulado_semanal_P` bigint(20) DEFAULT NULL,
  `acumulado_total_P` bigint(20) DEFAULT NULL,
  `total_final_P` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_puesto`
--

CREATE TABLE `t_puesto` (
  `id_puesto` int(11) NOT NULL,
  `nombrePuesto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_registro`
--

CREATE TABLE `t_registro` (
  `id_registro` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_registro` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_registro_diario`
--

CREATE TABLE `t_registro_diario` (
  `id_registro_diario` int(11) NOT NULL,
  `no_maquina` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `botes` int(11) DEFAULT NULL,
  `pzas` int(11) DEFAULT NULL,
  `kilos` double DEFAULT NULL,
  `turno` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `id_estados` int(11) DEFAULT NULL,
  `Id_Folio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reportes_prestamos`
--

CREATE TABLE `t_reportes_prestamos` (
  `id_reporte_p` int(11) NOT NULL,
  `id_prestamos` int(11) DEFAULT NULL,
  `id_aportacion` int(11) DEFAULT NULL,
  `id_cajaAhorro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_rol`
--

CREATE TABLE `t_rol` (
  `id_rol` int(11) NOT NULL,
  `nombreRol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_salida_almacen`
--

CREATE TABLE `t_salida_almacen` (
  `Id_Folio` int(11) NOT NULL,
  `Id_Clientes` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Cantidad_millares` int(11) DEFAULT NULL,
  `Pedido_pza` int(11) DEFAULT NULL,
  `Precio_millar` double DEFAULT NULL,
  `Empaque` double DEFAULT NULL,
  `Id_Catalogo` int(11) DEFAULT NULL,
  `Autorizacion` varchar(50) DEFAULT NULL,
  `Despachado` varchar(50) DEFAULT NULL,
  `Recibido` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `usuario` varchar(50) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD PRIMARY KEY (`id_cantidad`);

--
-- Indices de la tabla `criterio_inspeccion`
--
ALTER TABLE `criterio_inspeccion`
  ADD PRIMARY KEY (`id_criterio_inspeccion`),
  ADD KEY `id_maquina` (`id_maquina`),
  ADD KEY `id_mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_criterio_inspeccion` (`id_criterio_inspeccion`),
  ADD KEY `id_material_empleado` (`id_material_empleado`);

--
-- Indices de la tabla `inventario_mantenimiento`
--
ALTER TABLE `inventario_mantenimiento`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_localizacion` (`id_localizacion`),
  ADD KEY `id_cantidad` (`id_cantidad`),
  ADD KEY `id_mes` (`id_mes`);

--
-- Indices de la tabla `inventario_mensual`
--
ALTER TABLE `inventario_mensual`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `localizacion_inventario`
--
ALTER TABLE `localizacion_inventario`
  ADD PRIMARY KEY (`id_localizacion`);

--
-- Indices de la tabla `mantenimiemto_correctivo`
--
ALTER TABLE `mantenimiemto_correctivo`
  ADD PRIMARY KEY (`id_mantenimiento_co`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `mantenimiento_preventivo`
--
ALTER TABLE `mantenimiento_preventivo`
  ADD PRIMARY KEY (`id_mantenimiento_preventivo`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id_maquina`);

--
-- Indices de la tabla `materiales_empleados`
--
ALTER TABLE `materiales_empleados`
  ADD PRIMARY KEY (`id_material_empleado`),
  ADD KEY `id_mantenimiento_co` (`id_mantenimiento_co`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD PRIMARY KEY (`id_refaccion`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_mantenimiento_co` (`id_mantenimiento_co`),
  ADD KEY `id_mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

--
-- Indices de la tabla `t_aportacionempresa`
--
ALTER TABLE `t_aportacionempresa`
  ADD PRIMARY KEY (`id_aportacion`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `t_cajaahorro`
--
ALTER TABLE `t_cajaahorro`
  ADD PRIMARY KEY (`id_cajaAhorro`);

--
-- Indices de la tabla `t_catalogo`
--
ALTER TABLE `t_catalogo`
  ADD PRIMARY KEY (`Id_Catalogo`);

--
-- Indices de la tabla `t_certificado`
--
ALTER TABLE `t_certificado`
  ADD PRIMARY KEY (`Id_Certificado`),
  ADD KEY `Id_Folio` (`Id_Folio`);

--
-- Indices de la tabla `t_clientes`
--
ALTER TABLE `t_clientes`
  ADD PRIMARY KEY (`Id_Clientes`);

--
-- Indices de la tabla `t_contacto`
--
ALTER TABLE `t_contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `t_cotizacion`
--
ALTER TABLE `t_cotizacion`
  ADD PRIMARY KEY (`Id_Cotizacion`),
  ADD KEY `Id_Clientes` (`Id_Clientes`),
  ADD KEY `Id_Catalogo` (`Id_Catalogo`);

--
-- Indices de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  ADD PRIMARY KEY (`id_empleados`),
  ADD KEY `id_puesto` (`id_puesto`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `t_estados`
--
ALTER TABLE `t_estados`
  ADD PRIMARY KEY (`id_estados`);

--
-- Indices de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `t_incidencias`
--
ALTER TABLE `t_incidencias`
  ADD PRIMARY KEY (`id_incidencias`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `t_iso`
--
ALTER TABLE `t_iso`
  ADD PRIMARY KEY (`Id_ISO`),
  ADD KEY `Id_empleados` (`Id_empleados`);

--
-- Indices de la tabla `t_orden_produccion`
--
ALTER TABLE `t_orden_produccion`
  ADD PRIMARY KEY (`Id_Folio`),
  ADD KEY `Id_salida_almacen` (`Id_salida_almacen`);

--
-- Indices de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `Id_Clientes` (`Id_Clientes`),
  ADD KEY `id_empleados` (`id_empleados`),
  ADD KEY `Id_Folio` (`Id_Folio`);

--
-- Indices de la tabla `t_prestamos`
--
ALTER TABLE `t_prestamos`
  ADD PRIMARY KEY (`id_prestamos`);

--
-- Indices de la tabla `t_prestamospendientes`
--
ALTER TABLE `t_prestamospendientes`
  ADD PRIMARY KEY (`id_prestamoP`);

--
-- Indices de la tabla `t_puesto`
--
ALTER TABLE `t_puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `t_registro`
--
ALTER TABLE `t_registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `t_registro_diario`
--
ALTER TABLE `t_registro_diario`
  ADD PRIMARY KEY (`id_registro_diario`),
  ADD KEY `id_estados` (`id_estados`),
  ADD KEY `Id_Folio` (`Id_Folio`);

--
-- Indices de la tabla `t_reportes_prestamos`
--
ALTER TABLE `t_reportes_prestamos`
  ADD PRIMARY KEY (`id_reporte_p`),
  ADD KEY `id_prestamos` (`id_prestamos`),
  ADD KEY `id_aportacion` (`id_aportacion`),
  ADD KEY `id_cajaAhorro` (`id_cajaAhorro`);

--
-- Indices de la tabla `t_rol`
--
ALTER TABLE `t_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_salida_almacen`
--
ALTER TABLE `t_salida_almacen`
  ADD PRIMARY KEY (`Id_Folio`),
  ADD KEY `Id_Clientes` (`Id_Clientes`),
  ADD KEY `Id_Catalogo` (`Id_Catalogo`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  MODIFY `id_cantidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `criterio_inspeccion`
--
ALTER TABLE `criterio_inspeccion`
  MODIFY `id_criterio_inspeccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_mantenimiento`
--
ALTER TABLE `inventario_mantenimiento`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_mensual`
--
ALTER TABLE `inventario_mensual`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localizacion_inventario`
--
ALTER TABLE `localizacion_inventario`
  MODIFY `id_localizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  MODIFY `id_refaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_aportacionempresa`
--
ALTER TABLE `t_aportacionempresa`
  MODIFY `id_aportacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cajaahorro`
--
ALTER TABLE `t_cajaahorro`
  MODIFY `id_cajaAhorro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_certificado`
--
ALTER TABLE `t_certificado`
  MODIFY `Id_Certificado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_clientes`
--
ALTER TABLE `t_clientes`
  MODIFY `Id_Clientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_contacto`
--
ALTER TABLE `t_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cotizacion`
--
ALTER TABLE `t_cotizacion`
  MODIFY `Id_Cotizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_estados`
--
ALTER TABLE `t_estados`
  MODIFY `id_estados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_incidencias`
--
ALTER TABLE `t_incidencias`
  MODIFY `id_incidencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_iso`
--
ALTER TABLE `t_iso`
  MODIFY `Id_ISO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_orden_produccion`
--
ALTER TABLE `t_orden_produccion`
  MODIFY `Id_Folio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prestamos`
--
ALTER TABLE `t_prestamos`
  MODIFY `id_prestamos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prestamospendientes`
--
ALTER TABLE `t_prestamospendientes`
  MODIFY `id_prestamoP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_puesto`
--
ALTER TABLE `t_puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_registro`
--
ALTER TABLE `t_registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_registro_diario`
--
ALTER TABLE `t_registro_diario`
  MODIFY `id_registro_diario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reportes_prestamos`
--
ALTER TABLE `t_reportes_prestamos`
  MODIFY `id_reporte_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_rol`
--
ALTER TABLE `t_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_salida_almacen`
--
ALTER TABLE `t_salida_almacen`
  MODIFY `Id_Folio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `criterio_inspeccion`
--
ALTER TABLE `criterio_inspeccion`
  ADD CONSTRAINT `criterio_inspeccion_ibfk_1` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`),
  ADD CONSTRAINT `criterio_inspeccion_ibfk_2` FOREIGN KEY (`id_mantenimiento_preventivo`) REFERENCES `mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_criterio_inspeccion`) REFERENCES `criterio_inspeccion` (`id_criterio_inspeccion`),
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`id_material_empleado`) REFERENCES `materiales_empleados` (`id_material_empleado`);

--
-- Filtros para la tabla `inventario_mantenimiento`
--
ALTER TABLE `inventario_mantenimiento`
  ADD CONSTRAINT `inventario_mantenimiento_ibfk_1` FOREIGN KEY (`id_localizacion`) REFERENCES `localizacion_inventario` (`id_localizacion`),
  ADD CONSTRAINT `inventario_mantenimiento_ibfk_2` FOREIGN KEY (`id_cantidad`) REFERENCES `cantidad` (`id_cantidad`),
  ADD CONSTRAINT `inventario_mantenimiento_ibfk_3` FOREIGN KEY (`id_mes`) REFERENCES `inventario_mensual` (`id_mes`);

--
-- Filtros para la tabla `mantenimiemto_correctivo`
--
ALTER TABLE `mantenimiemto_correctivo`
  ADD CONSTRAINT `mantenimiemto_correctivo_ibfk_1` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`);

--
-- Filtros para la tabla `mantenimiento_preventivo`
--
ALTER TABLE `mantenimiento_preventivo`
  ADD CONSTRAINT `mantenimiento_preventivo_ibfk_1` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`);

--
-- Filtros para la tabla `materiales_empleados`
--
ALTER TABLE `materiales_empleados`
  ADD CONSTRAINT `materiales_empleados_ibfk_1` FOREIGN KEY (`id_mantenimiento_co`) REFERENCES `mantenimiemto_correctivo` (`id_mantenimiento_co`),
  ADD CONSTRAINT `materiales_empleados_ibfk_2` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`);

--
-- Filtros para la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD CONSTRAINT `refacciones_ibfk_1` FOREIGN KEY (`id_maquina`) REFERENCES `maquina` (`id_maquina`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`id_mantenimiento_co`) REFERENCES `mantenimiemto_correctivo` (`id_mantenimiento_co`),
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`id_mantenimiento_preventivo`) REFERENCES `mantenimiento_preventivo` (`id_mantenimiento_preventivo`);

--
-- Filtros para la tabla `t_aportacionempresa`
--
ALTER TABLE `t_aportacionempresa`
  ADD CONSTRAINT `t_aportacionempresa_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `t_usuario` (`usuario`);

--
-- Filtros para la tabla `t_certificado`
--
ALTER TABLE `t_certificado`
  ADD CONSTRAINT `t_certificado_ibfk_1` FOREIGN KEY (`Id_Folio`) REFERENCES `t_orden_produccion` (`Id_Folio`);

--
-- Filtros para la tabla `t_cotizacion`
--
ALTER TABLE `t_cotizacion`
  ADD CONSTRAINT `t_cotizacion_ibfk_1` FOREIGN KEY (`Id_Clientes`) REFERENCES `t_clientes` (`Id_Clientes`),
  ADD CONSTRAINT `t_cotizacion_ibfk_2` FOREIGN KEY (`Id_Catalogo`) REFERENCES `t_catalogo` (`Id_Catalogo`);

--
-- Filtros para la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  ADD CONSTRAINT `t_empleados_ibfk_1` FOREIGN KEY (`id_puesto`) REFERENCES `t_puesto` (`id_puesto`),
  ADD CONSTRAINT `t_empleados_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `t_direccion` (`id_direccion`),
  ADD CONSTRAINT `t_empleados_ibfk_3` FOREIGN KEY (`id_contacto`) REFERENCES `t_contacto` (`id_contacto`);

--
-- Filtros para la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD CONSTRAINT `t_horario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `t_usuario` (`usuario`);

--
-- Filtros para la tabla `t_incidencias`
--
ALTER TABLE `t_incidencias`
  ADD CONSTRAINT `t_incidencias_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `t_usuario` (`usuario`);

--
-- Filtros para la tabla `t_iso`
--
ALTER TABLE `t_iso`
  ADD CONSTRAINT `t_iso_ibfk_1` FOREIGN KEY (`Id_empleados`) REFERENCES `t_empleados` (`id_empleados`);

--
-- Filtros para la tabla `t_orden_produccion`
--
ALTER TABLE `t_orden_produccion`
  ADD CONSTRAINT `t_orden_produccion_ibfk_1` FOREIGN KEY (`Id_salida_almacen`) REFERENCES `t_salida_almacen` (`Id_Folio`);

--
-- Filtros para la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD CONSTRAINT `t_pedido_ibfk_1` FOREIGN KEY (`Id_Clientes`) REFERENCES `t_salida_almacen` (`Id_Clientes`),
  ADD CONSTRAINT `t_pedido_ibfk_2` FOREIGN KEY (`id_empleados`) REFERENCES `t_empleados` (`id_empleados`),
  ADD CONSTRAINT `t_pedido_ibfk_3` FOREIGN KEY (`Id_Folio`) REFERENCES `t_salida_almacen` (`Id_Folio`);

--
-- Filtros para la tabla `t_registro`
--
ALTER TABLE `t_registro`
  ADD CONSTRAINT `t_registro_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `t_usuario` (`usuario`);

--
-- Filtros para la tabla `t_registro_diario`
--
ALTER TABLE `t_registro_diario`
  ADD CONSTRAINT `t_registro_diario_ibfk_1` FOREIGN KEY (`id_estados`) REFERENCES `t_estados` (`id_estados`),
  ADD CONSTRAINT `t_registro_diario_ibfk_2` FOREIGN KEY (`Id_Folio`) REFERENCES `t_orden_produccion` (`Id_Folio`);

--
-- Filtros para la tabla `t_reportes_prestamos`
--
ALTER TABLE `t_reportes_prestamos`
  ADD CONSTRAINT `t_reportes_prestamos_ibfk_1` FOREIGN KEY (`id_prestamos`) REFERENCES `t_prestamos` (`id_prestamos`),
  ADD CONSTRAINT `t_reportes_prestamos_ibfk_2` FOREIGN KEY (`id_aportacion`) REFERENCES `t_aportacionempresa` (`id_aportacion`),
  ADD CONSTRAINT `t_reportes_prestamos_ibfk_3` FOREIGN KEY (`id_cajaAhorro`) REFERENCES `t_cajaahorro` (`id_cajaAhorro`);

--
-- Filtros para la tabla `t_salida_almacen`
--
ALTER TABLE `t_salida_almacen`
  ADD CONSTRAINT `t_salida_almacen_ibfk_1` FOREIGN KEY (`Id_Clientes`) REFERENCES `t_cotizacion` (`Id_Clientes`),
  ADD CONSTRAINT `t_salida_almacen_ibfk_2` FOREIGN KEY (`Id_Catalogo`) REFERENCES `t_cotizacion` (`Id_Catalogo`);

--
-- Filtros para la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD CONSTRAINT `t_usuario_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `t_empleados` (`id_empleados`),
  ADD CONSTRAINT `t_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `t_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
