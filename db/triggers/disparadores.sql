DELIMITER |
CREATE OR REPLACE TRIGGER nueva_orden AFTER INSERT ON t_orden_produccion
FOR EACH ROW
BEGIN
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,1,NEW.Id_Produccion);
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,2,NEW.Id_Produccion);
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,3,NEW.Id_Produccion);
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,4,NEW.Id_Produccion);
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,5,NEW.Id_Produccion);
	INSERT INTO t_control_produccion (factor,Id_estado_1,Id_Produccion_FK_1) VALUES (0.0,6,NEW.Id_Produccion);
END |
DELIMITER ;

-- Nuevo

DELIMITER |
CREATE OR REPLACE TRIGGER actualizar_estado_general AFTER INSERT ON t_registro_diario
FOR EACH ROW
BEGIN
    DECLARE op INT;
	DECLARE p INT;
	DECLARE estado VARCHAR(25);
	DECLARE primer_registro INT;

	SET op  = (
				SELECT Cantidad
				FROM t_orden_produccion, t_control_produccion
				WHERE t_control_produccion.Id_Produccion_FK_1 = t_orden_produccion.Id_Produccion
				AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
				);
	
	SET p  = (
				SELECT SUM(pzas) 
				FROM t_registro_diario, t_control_produccion 
				WHERE t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
				AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
			);

	SET estado = (
					SELECT estados 
					FROM t_estados, t_control_produccion 
					WHERE t_estados.id_estados = t_control_produccion.Id_estado_1
					AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
				);

	SET primer_registro = (
							SELECT count(id_registro_diario) 
							FROM t_registro_diario, t_control_produccion 
							WHERE t_registro_diario.Id_control_produccion_1 = t_control_produccion.id_control_produccion
							AND t_registro_diario.Id_control_produccion_1 = NEW.id_control_produccion_1
							AND t_control_produccion.Id_estado_1 = 1
						);


	IF (p >= op) THEN
		UPDATE t_orden_produccion, t_control_produccion
		SET Estado_general = estado 
		WHERE id_control_produccion = NEW.Id_control_produccion_1
		AND t_orden_produccion.Id_Produccion = t_control_produccion.Id_Produccion_FK_1;
	ELSEIF (primer_registro = 1) THEN
		UPDATE t_orden_produccion, t_control_produccion
		SET Estado_general = 'FORJADO'
		WHERE id_control_produccion =  NEW.Id_control_produccion_1
		AND t_orden_produccion.Id_Produccion = t_control_produccion.Id_Produccion_FK_1;
	END IF;
END |
DELIMITER ;

DELIMITER |
CREATE OR REPLACE TRIGGER modificar_estado_general AFTER UPDATE ON t_registro_diario
FOR EACH ROW
BEGIN
    DECLARE op INT;
	DECLARE p INT;
	DECLARE estado VARCHAR(25);
	DECLARE primer_registro INT;

	SET op  = (
				SELECT Cantidad
				FROM t_orden_produccion, t_control_produccion
				WHERE t_control_produccion.Id_Produccion_FK_1 = t_orden_produccion.Id_Produccion
				AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
				);
	
	SET p  = (
				SELECT SUM(pzas) 
				FROM t_registro_diario, t_control_produccion 
				WHERE t_control_produccion.id_control_produccion = t_registro_diario.id_control_produccion_1
				AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
			);

	SET estado = (
					SELECT estados 
					FROM t_estados, t_control_produccion 
					WHERE t_estados.id_estados = t_control_produccion.Id_estado_1
					AND t_control_produccion.id_control_produccion = NEW.Id_control_produccion_1
				);

	SET primer_registro = (
							SELECT count(id_registro_diario) 
							FROM t_registro_diario, t_control_produccion 
							WHERE t_registro_diario.Id_control_produccion_1 = t_control_produccion.id_control_produccion
							AND t_registro_diario.Id_control_produccion_1 = NEW.id_control_produccion_1
							AND t_control_produccion.Id_estado_1 = 1
						);


	IF (p >= op) THEN
		UPDATE t_orden_produccion, t_control_produccion
		SET Estado_general = estado 
		WHERE id_control_produccion = NEW.Id_control_produccion_1
		AND t_orden_produccion.Id_Produccion = t_control_produccion.Id_Produccion_FK_1;
	ELSEIF (primer_registro = 1) THEN
		UPDATE t_orden_produccion, t_control_produccion
		SET Estado_general = 'FORJADO'
		WHERE id_control_produccion =  NEW.Id_control_produccion_1
		AND t_orden_produccion.Id_Produccion = t_control_produccion.Id_Produccion_FK_1;
	END IF;
END |
DELIMITER ;


DELIMITER |
CREATE OR REPLACE TRIGGER cancelar_factura AFTER UPDATE ON t_salida_almacen
FOR EACH ROW
BEGIN

	IF (NEW.Estado = 1) THEN
		UPDATE 
			t_salida_almacen,
			t_clientes,
			t_pedido,
			t_cotizacion,
			t_facturacion
		SET 
			t_facturacion.Concepto = 4 
		WHERE 
			t_cotizacion.Id_Cotizacion = t_salida_almacen.Id_Cotizacion_FK
			AND t_cotizacion.Id_Clientes_FK = t_clientes.Id_Clientes
			AND t_cotizacion.Id_Cotizacion = t_pedido.Id_Cotizacion_FK
			AND t_facturacion.Id_Pedido_FK = t_pedido.Id_Pedido
			AND t_cotizacion.Id_Cotizacion = NEW.Id_Cotizacion_FK;
	END IF;

END |
DELIMITER ;