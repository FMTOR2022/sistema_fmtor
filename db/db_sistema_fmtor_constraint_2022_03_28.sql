CREATE TABLE t_catalogo (  
  Id_Catalogo VARCHAR(50),
  Descripcion VARCHAR(50),
  Medida VARCHAR(50),
  Acabado VARCHAR(50),
  PDF LONGBLOB,
  CONSTRAINT PK_catalogo PRIMARY KEY (Id_Catalogo)
);

create table t_certificado (
  Id_Certificado int auto_increment,
  Factura varchar(50),
  Fecha date,
  Cant_Ent varchar(50),
  Empaquetado varchar(50),
  No_DeParte varchar(50),
  Tornillo varchar(50),
  Material varchar(50),
  OP varchar(50),
  Cant_Inspecc varchar(50),
  Diametro_Cuerda varchar(12),
  Long_Cuerda varchar(12),
  Diametro_Cabeza varchar(12),
  Altura_Cabeza varchar(12),
  Diametro_Entre_Caras varchar(20),
  Espesor_Arand varchar(20),
  Diametro_Arand varchar(20),
  Diametro_Cuerda_1 varchar(20),
  Long_Cuerda_1 varchar(20),
  Diametro_Cabeza_1 varchar(20),
  Altura_Cabeza_1 varchar(20),
  Diametro_Entre_Caras_1 varchar(20),
  Espesor_Arand_1 varchar(20),
  Diametro_Arand_1 varchar(20),
  Acabado varchar(12),
  Notas varchar(100),
  CONSTRAINT PK_certificado PRIMARY KEY (Id_Certificado)
);

create table t_iso(
  Id_Iso int auto_increment,
  Mes_de_creacion varchar(50),
  PDF longblob,
  CONSTRAINT PK_iso PRIMARY KEY (Id_Iso)
);

CREATE
OR REPLACE TABLE t_clientes (
  Id_Clientes int (11),
  Razon_social varchar(50),
  Nombre varchar(50),
  Telefono varchar(50),
  Correo varchar(50),
  Direccion varchar(50),
  CONSTRAINT PK_Id_Clientes PRIMARY KEY (Id_Clientes)
);

CREATE
OR REPLACE TABLE t_proveedores (
  Id_Proveedor INT AUTO_INCREMENT,
  Proveedor VARCHAR(150),
  Direccion VARCHAR(80),
  Ciudad VARCHAR(20),
  Telefono VARCHAR(15),
  Correo VARCHAR(110),
  CONSTRAINT PK_Proveedor PRIMARY KEY (Id_Proveedor)
);

CREATE
OR REPLACE TABLE t_informacion_empresa (
  Id_Empresa INT AUTO_INCREMENT,
  Empresa VARCHAR(150),
  Direccion VARCHAR(80),
  Ciudad VARCHAR(20),
  Codigo_Postal VARCHAR(10),
  Telefono VARCHAR(15),
  Correo VARCHAR(110),
  CONSTRAINT PK_Empresa PRIMARY KEY (Id_Empresa)
);

CREATE
OR REPLACE TABLE t_estados (
  id_estados INT AUTO_INCREMENT,
  estados VARCHAR (25),
  CONSTRAINT PK_Id_estados PRIMARY KEY (id_estados)
);

CREATE
OR REPLACE TABLE t_cotizacion (
  Id_Cotizacion INT AUTO_INCREMENT,
  Fecha date,
  Id_Clientes_FK int(11),
  CONSTRAINT PK_Cotizacion PRIMARY KEY (Id_Cotizacion),
  CONSTRAINT FK_Id_Clientes_1 FOREIGN KEY (Id_Clientes_FK) REFERENCES t_clientes(Id_Clientes) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_salida_almacen (
  Id_Folio INT AUTO_INCREMENT,
  Fecha DATE,
  Estado BOOLEAN DEFAULT 0,
  Id_Cotizacion_FK INT,
  CONSTRAINT Pk_salida_almacen PRIMARY KEY (Id_Folio),
  CONSTRAINT FK_Id_Cotizacion_3 FOREIGN KEY (Id_Cotizacion_FK) REFERENCES t_cotizacion(Id_Cotizacion) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_orden_compra (
  Id_Compra INT AUTO_INCREMENT,
  Fecha DATE,
  Solicitado VARCHAR(50),
  Terminos VARCHAR(350),
  Contacto VARCHAR(350),
  FK_Proveedor INT,
  FK_Empresa INT,
  CONSTRAINT PK_Compra PRIMARY KEY (Id_Compra),
  CONSTRAINT FK_Proveedor FOREIGN KEY (FK_Proveedor) REFERENCES t_proveedores(Id_Proveedor),
  CONSTRAINT FK_Empresa FOREIGN KEY (FK_Empresa) REFERENCES t_informacion_empresa(Id_Empresa)
);

CREATE
OR REPLACE TABLE t_pedido (
  Id_Pedido BIGINT AUTO_INCREMENT,
  Descripcion VARCHAR(50),
  Medida VARCHAR(50),
  Acabado VARCHAR(50),
  Factor FLOAT,
  Material VARCHAR(100) DEFAULT '-',
  Cantidad_millares int(11),
  Pedido_pza VARCHAR(100) DEFAULT '-',
  Fecha_entrega date,
  Precio_millar double,
  Codigo varchar(50),
  Tratamiento VARCHAR(100) DEFAULT '0',
  Kardex INT,
  Id_Cotizacion_FK INT,
  CONSTRAINT PK_Pedido PRIMARY KEY (Id_Pedido),
  CONSTRAINT FK_Id_Cotizacion_1 FOREIGN KEY (Id_Cotizacion_FK) REFERENCES t_cotizacion(Id_Cotizacion) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_pedido_compra (
  Id_Pedido_Compra INT AUTO_INCREMENT,
  Codigo VARCHAR(50),
  Producto VARCHAR(350),
  Factor FLOAT,
  Medida VARCHAR(50),
  Cantidad BIGINT,
  Precio FLOAT,
  FK_Orden_Compra INT,
  Id_Pedido_FK BIGINT,
  CONSTRAINT PK_Compra PRIMARY KEY (Id_Pedido_Compra),
  CONSTRAINT FK_Orden_Compra_2 FOREIGN KEY (FK_Orden_Compra) REFERENCES t_orden_compra(Id_Compra) ON DELETE CASCADE,
  CONSTRAINT FK_Id_Pedido_FK_2 FOREIGN KEY (Id_Pedido_FK) REFERENCES t_pedido(Id_Pedido) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_facturacion (
  Id_Facutracion BIGINT AUTO_INCREMENT,
  Fecha DATE,
  Factura VARCHAR(30) DEFAULT '-',
  Empaque VARCHAR(30) DEFAULT '-',
  Cantidad_Entregada BIGINT,
  Kilos_Entregados FLOAT,
  Concepto BOOLEAN DEFAULT 0,
  Id_Pedido_FK BIGINT,
  Id_Empresa_FK INT,
  CONSTRAINT PK_Id_Facturacion PRIMARY KEY (Id_Facutracion),
  CONSTRAINT FK_Id_Pedido_FK FOREIGN KEY (Id_Pedido_FK) REFERENCES t_pedido(Id_Pedido) ON DELETE CASCADE,
  CONSTRAINT FK_Id_Empresa_2 FOREIGN KEY (Id_Empresa_FK) REFERENCES t_informacion_empresa(Id_Empresa) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_orden_produccion (
  Id_Produccion BIGINT AUTO_INCREMENT,
  Id_Catalogo_FK VARCHAR(50),
  Calibre FLOAT DEFAULT 0.0,
  Cantidad DOUBLE,
  Estado_general varchar(25) DEFAULT 'PENDIENTE',
  Id_Pedido_FK BIGINT,
  CONSTRAINT PK_Id_Produccion PRIMARY KEY (Id_Produccion),
  CONSTRAINT FK_Id_Pedido_FK_1 FOREIGN KEY (Id_Pedido_FK) REFERENCES t_pedido(Id_Pedido) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_control_produccion (
  id_control_produccion BIGINT AUTO_INCREMENT,
  factor float,
  Id_estado_1 INT,
  Id_Produccion_FK_1 BIGINT,
  CONSTRAINT PK_Id_control_produccion PRIMARY KEY (id_control_produccion),
  CONSTRAINT FK_Id_Produccion_FK FOREIGN KEY (Id_Produccion_FK_1) REFERENCES t_orden_produccion(Id_Produccion) ON DELETE CASCADE,
  CONSTRAINT FK_Id_estado_2 FOREIGN KEY (Id_estado_1) REFERENCES t_estados(id_estados) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_registro_diario (
  id_registro_diario BIGINT AUTO_INCREMENT,
  bote int,
  no_maquina int,
  fecha date,
  pzas int,
  kilos float,
  turno int,
  observaciones VARCHAR(25),
  Id_control_produccion_1 BIGINT,
  CONSTRAINT PK_Id_registro_diario PRIMARY KEY (id_registro_diario),
  CONSTRAINT FK_Id_control_produccion_1 FOREIGN KEY (Id_control_produccion_1) REFERENCES t_control_produccion(Id_control_produccion) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_programa_forjado (
  Id_Programa_Forjado BIGINT auto_increment,
  Id_Produccion_FK BIGINT,
  Fecha_entrega VARCHAR(15),
  Herramental VARCHAR(250),
  no_maquina INT,
  producto_desc VARCHAR(100) DEFAULT '',
  CONSTRAINT Pk_programa_forjado PRIMARY KEY (Id_Programa_Forjado),
  CONSTRAINT FK_Id_Produccion_FK_1 FOREIGN KEY (Id_Produccion_FK) REFERENCES t_orden_produccion(Id_Produccion) ON DELETE CASCADE
);

create
OR REPLACE TABLE t_inventario_productos_finalizados(
  Id_productos_finalizados INT NOT NULL,
  Kardex_pf INT NOT NULL,
  Anaquel_fila_pf VARCHAR(50) NOT NULL,
  Inventario_inicial_pf FLOAT,
  Inventario_final_pf FLOAT,
  Explosion_pf FLOAT,
  Kilos_pf FLOAT,
  Id_pedido_FK BIGINT,
  Id_Folio_FK INT,
  CONSTRAINT PK_Inventario PRIMARY KEY (Id_productos_finalizados),
  CONSTRAINT FK_Id_Pedido FOREIGN KEY (Id_pedido_FK) REFERENCES t_pedido(Id_Pedido) ON DELETE CASCADE,
  CONSTRAINT FK_Id_Salida_FK_3 FOREIGN KEY (Id_Folio_FK) REFERENCES t_salida_almacen(Id_Folio) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_inventario_productos_comprados(
  Id_productos_comprados INT NOT NULL,
  Kardex_pc INT NOT NULL,
  Id_Proveedor_FK INT,
  Medida_pc VARCHAR(50),
  Descripcion VARCHAR(50),
  Num_parte VARCHAR(50),
  Precio_pc FLOAT,
  Costo_total_pc FLOAT,
  Anaquel_fila_pc VARCHAR(50) NOT NULL,
  Inventario_inicial_pc FLOAT,
  Inventario_final_pc FLOAT,
  Explosion_pc FLOAT,
  Factor_pc FLOAT,
  Kilos_pc FLOAT,
  CONSTRAINT PK_Inventario_Productos_Comprados PRIMARY KEY (Id_productos_comprados),
  CONSTRAINT FK_Proveedores FOREIGN KEY (Id_Proveedor_FK) REFERENCES t_proveedores(Id_Proveedor) ON DELETE CASCADE
);

CREATE
OR REPLACE TABLE t_materia_prima(
  Id_materia_prima INT NOT NULL,
  Medida_mp VARCHAR(50) NOT NULL,
  Num_rollo INT NOT NULL,
  Fecha DATE NOT NULL,
  Referencia VARCHAR(50) NOT NULL,
  Entrada INT,
  Salida INT,
  Saldo INT NOT NULL,
  Saldo_rollo VARCHAR(2) DEFAULT '1R',
  CONSTRAINT PK_Materia_Prima PRIMARY KEY(Id_materia_prima)
);

CREATE TABLE t_puesto (
  id_puesto INT AUTO_INCREMENT,
  nombrePuesto varchar(255),
  CONSTRAINT PK_Id_puesto PRIMARY KEY (id_puesto)
);

CREATE TABLE t_departamento (
  id_departamento int(11) NOT NULL,
  nombre_departamento varchar(50) DEFAULT NULL,
  CONSTRAINT PK_Id_departamento PRIMARY KEY(id_departamento)
);

CREATE TABLE t_empleados (
  id_empleados INT AUTO_INCREMENT,
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
  id_puesto_1 int,
  foto longblob,
  id_departamento_2 int,
  CONSTRAINT PK_Id_empleados PRIMARY KEY (id_empleados),
  CONSTRAINT FK_Id_puesto_1 FOREIGN KEY (id_puesto_1) REFERENCES t_puesto(id_puesto),
  CONSTRAINT FK_Id_departamento_2 FOREIGN KEY (id_departamento_2) REFERENCES t_departamento(id_departamento)
 );

CREATE TABLE t_direccion (
  id_direccion int AUTO_INCREMENT,
  id_empleados_1 int(11) DEFAULT NULL,
  calle varchar(255),
  noInt int,
  noExt int,
  colonia varchar(255),
  cp int,
  alcaldia varchar(255),
  CONSTRAINT PK_Id_direccion PRIMARY KEY (id_direccion),
  CONSTRAINT FK_Id_empleado_1 FOREIGN KEY (id_empleados_1) REFERENCES t_empleados(id_empleados)
);

CREATE TABLE t_contacto(
  id_contacto INT AUTO_INCREMENT,
  Nombre_contacto VARCHAR (50),
  telefono INT,
  CONSTRAINT PK_Id_contacto PRIMARY KEY (id_contacto)
);

CREATE TABLE t_rol (
  id_rol INT AUTO_INCREMENT,
  nombreRol varchar(255),
  CONSTRAINT PK_Id_rol PRIMARY KEY (id_rol)
);

CREATE TABLE t_usuario (
  usuario VARCHAR(50),
  id_empleado_1 INT, 
  id_rol_1 INT,
  contrasena VARCHAR(65),
  CONSTRAINT PK_Id_usuario PRIMARY KEY (usuario),
  CONSTRAINT FK_Id_empleado FOREIGN KEY (id_empleado_1) REFERENCES t_empleados(id_empleados),
  CONSTRAINT FK_Id_rol FOREIGN KEY (id_rol_1) REFERENCES t_rol(id_rol)
);

CREATE TABLE t_registro (
  id_registro INT AUTO_INCREMENT,
  usuario VARCHAR(50),
  fecha timestamp,
  tipo_registro VARCHAR (10),
  CONSTRAINT PK_Id_registro PRIMARY KEY (id_registro),
  CONSTRAINT FK_Id_usuario_1 FOREIGN KEY (usuario) REFERENCES t_usuario(usuario)
);

CREATE OR REPLACE TABLE t_horario (
  id_horario INT AUTO_INCREMENT,
  usuario VARCHAR(50),
  entrada time,
  almuerzoS time,
  almuerzoR time,
  salida time,
  CONSTRAINT PK_Id_horario PRIMARY KEY (id_horario),
  CONSTRAINT FK_Id_usuario_2 FOREIGN KEY (usuario) REFERENCES t_usuario(usuario)
);

CREATE TABLE t_incidencias (
  id_incidencias INT AUTO_INCREMENT,
  id_empleados_2 INT,
  tipo_incidencia VARCHAR(255),
  inicio_in date,
  fin_in date,
  CONSTRAINT PK_Id_incidencias PRIMARY KEY (id_incidencias),
  CONSTRAINT FK_Id_empleados_2 FOREIGN KEY (id_empleados_2) REFERENCES t_empleados(id_empleados) 
);

CREATE TABLE t_prestamos(
  id_prestamos INT AUTO_INCREMENT,
  fecha_solicitud_P date,
  fecha_cierre_P date,
  monto_P int,
  porcentaje_interes_P varchar(255),
  acumulado_P bigint,
  estatus varchar(255),
  semana bigint,
  id_empelados_4 int,
  CONSTRAINT PK_Id_prestamos PRIMARY KEY (id_prestamos),
  CONSTRAINT FK_Id_empleados_4 FOREIGN KEY (id_empelados_4) REFERENCES t_empleados(id_empleados) 
);

CREATE TABLE t_prestamosPendientes (
  id_prestamoP INT AUTO_INCREMENT,
  monto_P int,
  porcentaje_interes_P varchar(255),
  fecha_inicio_P date,
  fecha_cierre_P date,
  acumulado_semanal_P bigint,
  acumulado_total_P bigint,
  total_final_P bigint,
  CONSTRAINT PK_Id_prestamoP PRIMARY KEY (id_prestamoP)
);

CREATE TABLE t_cajaAhorro(
  id_cajaAhorro INT AUTO_INCREMENT,
  fecha_ultimo_abono_CA date,
  monto_apertura_CA int,
  acumulado_CA bigint,
  id_empleado_3 int,
  CONSTRAINT FK_Id_empleado_3 FOREIGN KEY (id_empleado_3) REFERENCES t_empleados(id_empleados),
  CONSTRAINT PK_Id_cajaAhorro PRIMARY KEY (id_cajaAhorro)
);

CREATE TABLE t_periodo (
  id_periodo int AUTO_INCREMENT,
  fecha_inicio_AP date,
  fecha_cierre_AP date,
  CONSTRAINT PK_Id_periodo PRIMARY KEY (id_periodo)
);

CREATE TABLE t_aportacionEmpresa (
  id_aportacion INT AUTO_INCREMENT,
  monto_AE int,
  fecha_ultimo_abono_AE date,
  acumulado_AE bigint,
  id_empleados_5 int,
  CONSTRAINT PK_Id_aportacion PRIMARY KEY (id_aportacion),
  CONSTRAINT FK_Id_empleado_5 FOREIGN KEY (id_empleados_5) REFERENCES t_empleados(id_empleados)
);

CREATE TABLE t_reportes_prestamos (
  id_reporte_p INT AUTO_INCREMENT,
  id_prestamos_1 int,
  id_aportacion_1 int,
  id_cajaAhorro_1 int,
  CONSTRAINT PK_Id_reporte_p PRIMARY KEY (id_reporte_p),
  CONSTRAINT FK_Id_prestamos FOREIGN KEY (id_prestamos_1) REFERENCES t_prestamos(id_prestamos),
  CONSTRAINT FK_Id_aportacion FOREIGN KEY (id_aportacion_1) REFERENCES t_aportacionEmpresa(id_aportacion),
  CONSTRAINT FK_Id_cajaAhorro FOREIGN KEY (id_cajaAhorro_1) REFERENCES t_cajaAhorro(id_cajaAhorro)
);

CREATE TABLE t_bitacora (
  id_bitacora INT AUTO_INCREMENT,
  monto int,
  fecha datetime,
  tipoMovimiento varchar(255),
  CONSTRAINT PK_Id_bitacora PRIMARY KEY (id_bitacora)
);

CREATE TABLE maquina (
  id_maquina  INT AUTO_INCREMENT,  
  tipo_de_maquina varchar(50),
  nombre_maquina varchar(50),
  CONSTRAINT PK_Id_maquina PRIMARY KEY (id_maquina)
);

CREATE TABLE refacciones (
  id_refaccion INT AUTO_INCREMENT,
  descripcion varchar(50),
  clave_modelo varchar(15),
  existencia int,
  id_maquina_1 int,
  CONSTRAINT PK_Id_refaccion PRIMARY KEY (id_refaccion),
  CONSTRAINT FK_Id_maquina1 FOREIGN KEY (id_maquina_1) REFERENCES maquina(id_maquina)
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
  liberado_por char(50),
  CONSTRAINT PK_Id_mantenimiento_co PRIMARY KEY (id_mantenimiento_co),
  CONSTRAINT FK_Id_maquina2 FOREIGN KEY (id_maquina_1) REFERENCES maquina(id_maquina)
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
  observaciones text,
  CONSTRAINT PK_Id_mantenimiento_preventivo PRIMARY KEY (id_mantenimiento_preventivo),
  CONSTRAINT FK_Id_maquina3 FOREIGN KEY (id_maquina_1) REFERENCES maquina(id_maquina)
);

CREATE TABLE criterio_inspeccion (
  id_criterio_inspeccion int AUTO_INCREMENT,
  nom_criterio varchar(60),
  estado_funcionalidad int,
  id_maquina_1 int,
  id_mantenimiento_preventivo_1 varchar(30),
  CONSTRAINT PK_Id_criterio_inspeccion PRIMARY KEY (id_criterio_inspeccion),
  CONSTRAINT FK_Id_maquina4 FOREIGN KEY (id_maquina_1) REFERENCES maquina(id_maquina)
);

CREATE TABLE materiales_empleados(
  id_material_empleado int,
  cantidad int,
  descripcion varchar(50),
  costo float,
  fecha date,
  total float,
  id_mantenimiento_co_1 varchar(30),
  id_maquina_1 int,
  CONSTRAINT PK_Id_material_empleado PRIMARY KEY (id_material_empleado),
  CONSTRAINT FK_Id_mantenimiento_co1 FOREIGN KEY (id_mantenimiento_co_1) REFERENCES mantenimiemto_correctivo(id_mantenimiento_co),
  CONSTRAINT FK_Id_maquina5 FOREIGN KEY (id_maquina_1) REFERENCES maquina(id_maquina)
);

CREATE TABLE foto(
  id_foto int AUTO_INCREMENT,
  foto blob,
  id_criterio_inspeccion_1 int, 
  id_material_empleado_1 int,
  CONSTRAINT PK_Id_foto PRIMARY KEY (id_foto),
  CONSTRAINT FK_Id_criterio FOREIGN KEY (id_criterio_inspeccion_1) REFERENCES criterio_inspeccion(id_criterio_inspeccion)
);

CREATE TABLE reportes(
  id_reporte int,
  tipo_de_reporte varchar(30),
  fecha_creacion date,
  hora_creacion time,
  archivo longblob,
  id_mantenimiento_co_1 varchar(30),
  id_mantenimiento_preventivo_1 varchar(30),
  CONSTRAINT PK_Id_reporte PRIMARY KEY (id_reporte),
  CONSTRAINT FK_Id_mantenimiento_co2 FOREIGN KEY (id_mantenimiento_co_1) REFERENCES mantenimiemto_correctivo(id_mantenimiento_co),
  CONSTRAINT FK_Id_mantenimiento_preventivo FOREIGN KEY (id_mantenimiento_preventivo_1) REFERENCES mantenimiento_preventivo(id_mantenimiento_preventivo)
);

CREATE TABLE localizacion_inventario (
  id_localizacion int,
  anaquel int,
  no_caja_fila varchar(20),
  no_cajas_rollos int,
  no_cliente_proveedor varchar(20),
  CONSTRAINT PK_Id_localizacion PRIMARY KEY (id_localizacion)
);

CREATE TABLE cantidad(
  id_cantidad int AUTO_INCREMENT,
  inventario_inicial int,
  inventario_final int,
  precio_por_milla varchar(20),
  CONSTRAINT PK_Id_cantidad PRIMARY KEY (id_cantidad)
);

CREATE TABLE inventario_mensual (
  id_mes int AUTO_INCREMENT,
  nom_mes char(15),
  no_inv_mes int,
  CONSTRAINT PK_Id_mes PRIMARY KEY (id_mes)
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
  compra int,
  CONSTRAINT PK_Id_producto PRIMARY KEY (id_producto),
  CONSTRAINT FK_Id_localizacion FOREIGN KEY (id_localizacion_1) REFERENCES localizacion_inventario(id_localizacion),
  CONSTRAINT FK_Id_cantidad FOREIGN KEY (id_cantidad_1) REFERENCES cantidad(id_cantidad),
  CONSTRAINT FK_Id_mes FOREIGN KEY (id_mes_1) REFERENCES inventario_mensual(id_mes)
);