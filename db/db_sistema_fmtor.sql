create database db_sistema_fmtor;
use db_sistema_fmtor;

CREATE TABLE t_materia_prima (
  id_materia_prima INT auto_increment,
  materia_prima VARCHAR(30),
  calibre float,
  cantidad float
);

CREATE TABLE t_catalogo (  
  Id_Catalogo INT auto_increment,
  Descripcion VARCHAR(50),
  Medida VARCHAR(50),
  Acabados VARCHAR(50),
  PDF LONGBLOB 
);

create table t_certificado (
  Id_Certificado INT auto_increment,
  No_DeParte VARCHAR(50),
  Tornillo VARCHAR(50),
  Factura VARCHAR(50),
  Material VARCHAR(50),
  Fecha DATETIME,
  Id_Folio_1 INT,
  Cant_Ent VARCHAR(50),
  Cant_Inspecc VARCHAR(50),
  Paquete VARCHAR(50),
  Tolerancia VARCHAR(50),
  Lectura_Verificada VARCHAR(50),
  Acabados VARCHAR(50)
);

create table t_ISO(
  Id_ISO INT auto_increment,
  Id_empleados_1 INT,
  Observaciones VARCHAR (150),
  Tipo_herramienta VARCHAR (50),
  Fecha DATETIME
);

create table t_cotizacion (
  Id_Cotizacion INT auto_increment,
  Id_Clientes_1 INT,
  Fecha DATETIME, 
  Id_Catalogo_1 INT,
  Cantidad_millares INT,
  Precio_millar DOUBLE
);

CREATE TABLE t_salida_almacen(
  Id_Folio INT auto_increment,
  Id_Clientes_1 INT,
  Fecha DATETIME,
  Cantidad_millares INT,
  Pedido_pza INT,
  Precio_millar DOUBLE,
  Empaque DOUBLE,
  Id_Catalogo_1 INT,
  Autorizacion VARCHAR(50),
  Despacho VARCHAR(50),
  Recibido VARCHAR(50)
);

CREATE TABLE t_orden_produccion(
  Id_Folio INT,
  Id_salida_almacen_1 INT,
  Fecha_entrega DATETIME,
  cantidad_elaborar INT 
  
);

CREATE TABLE t_clientes (
  Id_Clientes INT auto_increment,
  Nombre VARCHAR(50),
  Razon_social VARCHAR(50),
  calle VARCHAR(50),
  colonia VARCHAR(50),
  c_p VARCHAR(50),
  alcaldia VARCHAR(50),
  Telefono VARCHAR (50)
);


CREATE TABLE t_pedido(
  Id_Pedido  INT auto_increment,
  Id_Clientes_1 INT, 
  id_empleados_1 INT, 
  Id_Folio_1 INT, 
  Id_salida_almacen_1 INT,
  Id_cotizacion_1 INT,
  Factura VARCHAR(50)
);

CREATE TABLE t_estados (
  id_estados INT AUTO_INCREMENT,
  estados VARCHAR (25)
);

CREATE TABLE t_registro_diario (
  id_registro_diario INT AUTO_INCREMENT,
  factor float,
  no_maquina int,
  fecha date,
  botes int,
  pzas int,
  kilos float,
  turno int,
  observaciones VARCHAR(25),
  estado_general VARCHAR(20),
  id_estados_1 INT,
  Id_Folio_1 INT 
);

CREATE TABLE t_registro (
  id_registro INT AUTO_INCREMENT,
  usuario VARCHAR(50),
  fecha timestamp,
  tipo_registro VARCHAR (10)
);

CREATE TABLE t_horario (
  id_horario INT AUTO_INCREMENT,
  usuario VARCHAR(50),
  entrada timestamp,
  almuerzoS timestamp,
  almuerzoR timestamp,
  salida timestamp
  
);

CREATE TABLE t_incidencias (
  id_incidencias INT AUTO_INCREMENT,
  usuario VARCHAR(50),
  tipo_incidencia VARCHAR(255),
  inicio_in date,
  fin_in date
);

CREATE TABLE t_usuario (
  usuario VARCHAR(50) AUTO_INCREMENT,
  id_empleado_1 INT, 
  id_rol_1 INT,
  contrasena VARCHAR(50)
);

CREATE TABLE t_empleados (
  id_empleados INT AUTO_INCREMENT,
  id_puesto_1 int,
  id_direccion_1 int,
  id_contacto_1 INT,
  nombre varchar(255),
  apellidoP varchar(255),
  apellidoM varchar(255),
  fechaNacimiento date,
  telefono int,
  correo varchar(255),
  fechaIngreso date,
  curp varchar(255),
  rfc varchar(255),
  nss varchar(255),
  estado varchar(255),
  foto longblob
  
);

CREATE TABLE t_direccion (
  id_direccion int AUTO_INCREMENT,
  calle varchar(255),
  noInt int,
  noExt int,
  colonia varchar(255),
  cp int,
  alcaldia varchar(255)
);

CREATE TABLE t_contacto(
  id_contacto INT AUTO_INCREMENT,
  Nombre_contacto VARCHAR (50),
  telefono INT 
);

CREATE TABLE t_prestamos(
  id_prestamos INT AUTO_INCREMENT,
  concepto varchar(255),
  monto_P int,
  porcentaje_interes_P varchar(255),
  fecha_inicio_P date,
  fecha_cierre_P date,
  acumulado_semanal_P bigint,
  acumulado_total_P bigint,
  total_final_P bigint,
  historial int
);

CREATE TABLE t_prestamosPendientes (
  id_prestamoP INT AUTO_INCREMENT,
  monto_P int,
  porcentaje_interes_P varchar(255),
  fecha_inicio_P date,
  fecha_cierre_P date,
  acumulado_semanal_P bigint,
  acumulado_total_P bigint,
  total_final_P bigint
);

CREATE TABLE t_cajaAhorro(
  id_cajaAhorro INT AUTO_INCREMENT,
  fecha_inicio_CA date,
  fecha_cierre_CA date,
  acumulado_semanal_CA bigint,
  acumulado_total_CA bigint,
  total_final_CA bigint
);

CREATE TABLE t_aportacionEmpresa (
  id_aportacion INT AUTO_INCREMENT,
  monto int,
  fecha_inicio_CA date,
  fecha_cierre_CA date,
  acumulado_semanal_CA bigint,
  acumulado_total_CA bigint,
  total_final_CA bigint,
  Id_usuario_1 varchar(50)
);

CREATE TABLE t_reportes_prestamos (
  id_reporte_p INT AUTO_INCREMENT,
  id_prestamos_1 int,
  id_aportacion_1 int,
  id_cajaAhorro_1 int
);

CREATE TABLE t_bitacora (
  id_bitacora INT AUTO_INCREMENT,
  monto int,
  fecha datetime,
  tipoMovimiento varchar(255)
);

CREATE TABLE t_puesto (
  id_puesto INT AUTO_INCREMENT,
  nombrePuesto varchar(255)
);

CREATE TABLE t_rol (
  id_rol INT AUTO_INCREMENT,
  nombreRol varchar(255)
);

CREATE TABLE maquina (
  id_maquina  INT AUTO_INCREMENT,  
  tipo_de_maquina varchar(50),
  nombre_maquina varchar(50)
);

CREATE TABLE refacciones (
  id_refaccion INT AUTO_INCREMENT,
  descripcion varchar(50),
  clave_modelo varchar(15),
  existencia int,
  id_maquina_1 int
);

CREATE TABLE mantenimiemto_correctivo (
  id_mantenimiento_co varchar(30),
  nombre_maquina varchar(50),
  fecha_aprobacion date,
  version varchar(15),
  solicitado_por char(50),
  autorizado_por char(50),
  prioridad boolean,
  anomalia text,
  causa_amomalia text,
  solucion text,
  id_maquina_1 int,
  autorizacion varchar(50),
  realizado_por char(50),
  aprobado_por char(50),
  liberado_por char(50)
);

 CREATE TABLE mantenimiento_preventivo (
  id_mantenimiento_preventivo varchar(30),
  nombre_maquina varchar(50),
  fecha_aprobacion date,
  frecuencia varchar(30),
  estado_maquina int,
  id_maquina_1 int,
  realizado_por char(50),
  aprobado_por char(50),
  liberado_por char(50),
  observaciones text
 );

 CREATE TABLE criterio_inspeccion (
  id_criterio_inspeccion int AUTO_INCREMENT,
  nom_criterio varchar(60),
  estado_funcionalidad int,
  id_maquina_1 int,
  id_mantenimiento_preventivo_1 varchar(30)
 );

 CREATE TABLE materiales_empleados(
  id_material_empleado int,
  cantidad int,
  descripcion varchar(50),
  costo float,
  fecha date,
  total float,
  id_mantenimiento_co_1 varchar(30),
  id_maquina_1 int
 );

 CREATE TABLE foto(
  id_foto int AUTO_INCREMENT,
  foto blob,
  id_criterio_inspeccion_1 int, 
  id_material_empleado_1 int
 );

CREATE TABLE reportes(
  id_reporte int,
  tipo_de_reporte varchar(30),
  fecha_creacion date,
  hora_creacion time,
  archivo longblob,
  id_mantenimiento_co varchar(30),
  id_mantenimiento_preventivo varchar(30)
);

 CREATE TABLE localizacion_inventario (
  id_localizacion int,
  anaquel int,
  no_caja_fila varchar(20),
  no_cajas_rollos int,
  no_cliente_proveedor varchar(20)
);

 CREATE TABLE cantidad(
  id_cantidad int AUTO_INCREMENT,
  inventario_inicial int,
  inventario_final int,
  precio_por_milla varchar(20)
);

 CREATE TABLE inventario_mensual (
  id_mes int AUTO_INCREMENT,
  nom_mes char(15),
  no_inv_mes int
);

 CREATE TABLE inventario_mantenimiento(
  id_producto int AUTO_INCREMENT,
  descripcion varchar(30),
  medida varchar(20),
  cantidad_pieza char(10),
  cantidad_kilo char(10),
  id_localizacion_1 int,
  id_cantidad_1 int,
  costo int,
  total int,
  id_mes_1 int,
  total_ocupado int,
  compra int
);


