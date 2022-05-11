INSERT INTO t_clientes VALUES (1, '-', '-', '-', '-', '-');
INSERT INTO `t_cotizacion` (`Id_Cotizacion`, `Fecha`, `Id_Clientes_FK`) VALUES (999999, '0000-00-00', 1);
INSERT INTO `t_pedido` (`Id_Pedido`, `Descripcion`, `Medida`, `Acabado`, `Factor`, `Material`, `Cantidad_millares`, `Pedido_pza`, `Fecha_entrega`, `Precio_millar`, `Codigo`, `Tratamiento`, `Id_Cotizacion_FK`) VALUES
(999999, '', '', '', 0, '', 0, '', '0000-00-00', 0, '0', '0', 999999);
INSERT INTO t_orden_produccion VALUES (1, '-', 1, 1, 'PENDIENTE', 999999);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (1,0.0,1,1);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (2,0.0,2,1);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (3,0.0,3,1);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (4,0.0,4,1);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (5,0.0,5,1);
INSERT INTO t_control_produccion (Id_control_produccion,factor,Id_estado_1,Id_Produccion_FK_1) VALUES (6,0.0,6,1);