//<script type="text/javascript" language="javascript">


//var lista_productoFuncionGeneral= function () {

class lista_producto_funcion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		this.procesarInicioProceso();
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------

	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(lista_producto_constante1.STR_RELATIVE_PATH,lista_producto_constante1.STR_NOMBRE_OPCION,"lista_producto");		
	}	
	
//---------- Clic-Siguiente ----------

	siguientesOnClick() {
		this.procesarInicioBusqueda();
	}
		
	siguientesOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
//----------- Clic-Anteriores ---------

	anterioresOnClick() {
		this.procesarInicioBusqueda();
	}
	
	anterioresOnComplete() {
		this.procesarFinalizacionBusqueda();
	}

//---------- Clic-Seleccionar ----------

	seleccionarOnClick() {
		this.resaltarRestaurarDivMantenimiento(true);
		
		this.procesarInicioProceso();
	}
	
	seleccionarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
	
	
//---------- Clic-Reporte ----------------

	generarReporteOnClick() {
		this.generarReporteInicio();
	}
		
	generarReporteOnComplete() {
		this.generarReporteFinalizacion();
	}
	
	generarReporteInicio() {
		funcionGeneral.mostrarOcultarProcesando(true,null);
	}	
	
	generarReporteFinalizacion() {
		funcionGeneral.generarReporteFinalizacion(lista_producto_constante1.STR_RELATIVE_PATH,lista_producto_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		this.procesarInicioProceso();
	}		
	
	generarHtmlReporteOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		this.resaltarRestaurarDivMantenimiento(true);
		
		this.procesarInicioProceso();
	}		
		
	nuevoPrepararOnComplete() {		
		this.procesarFinalizacionProceso();
	}
	
	nuevoTablaPrepararOnClick() {
		this.procesarInicioProceso();
	}
	
	nuevoTablaPrepararOnComplete() {		
		this.procesarFinalizacionProceso();
	}
	
	nuevoOnClick() {
		//this.procesarInicioProceso();
	}
	
	nuevoOnComplete() {
		//this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		this.procesarInicioProceso();
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(lista_producto_constante1.STR_ES_RELACIONES,lista_producto_constante1.STR_ES_RELACIONADO,lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
		
		if(this.esPaginaForm()==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	editarTablaDatosOnClick() {
		this.procesarInicioProceso();
	}		
	
	editarTablaDatosOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//this.resaltarRestaurarDivMantenimiento(true);		
		this.procesarInicioProceso();
	}
		
	eliminarTablaOnComplete() {
		this.procesarFinalizacionProceso();		
	}
	
	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
	}
	
	eliminarOnComplete() {
		this.resaltarRestaurarDivMantenimiento(false);
		
		this.procesarFinalizacionProceso();
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		this.procesarInicioProceso();
	}		
	
	guardarCambiosOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		this.procesarInicioProceso();
	}
	
	duplicarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		this.procesarInicioProceso();
	}
	
	copiarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		this.procesarInicioProceso();
	}
	
	cancelarOnComplete() {
		this.resaltarRestaurarDivMantenimiento(false);
		
		this.procesarFinalizacionProceso();
				
		if(this.esPaginaForm()==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.hdnIdActual);
		jQuery('cmblista_productoid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcodigo_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtdescripcion_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio1);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio3);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio4);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcosto);
		jQuery('cmblista_productoid_unidad_compra').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtunidad_en_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra);
		jQuery('cmblista_productoid_unidad_venta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtunidad_en_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcantidad_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcantidad_minima);
		jQuery('cmblista_productoid_categoria_producto').val("");
		jQuery('cmblista_productoid_sub_categoria_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtacepta_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtvalor_inventario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento1);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento2);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento3);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtincremento4);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtproducto_fisico);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtsituacion_producto);
		jQuery('cmblista_productoid_tipo_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo);
		jQuery('cmblista_productoid_bodega').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtmostrar_componente);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtavisa_expiracion);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtfactura_con_precio);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtproducto_equivalente);
		jQuery('cmblista_productoid_cuenta_compra').val("");
		jQuery('cmblista_productoid_cuenta_venta').val("");
		jQuery('cmblista_productoid_cuenta_inventario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo);
		jQuery('cmblista_productoid_otro_suplidor').val("");
		jQuery('cmblista_productoid_impuesto').val("");
		jQuery('cmblista_productoid_impuesto_ventas').val("");
		jQuery('cmblista_productoid_impuesto_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras);
		jQuery('dtlista_productoultima_venta').val(new Date());
		jQuery('cmblista_productoid_otro_impuesto').val("");
		jQuery('cmblista_productoid_otro_impuesto_ventas').val("");
		jQuery('cmblista_productoid_otro_impuesto_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0);
		jQuery('dtlista_productoprecio_actualizado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcosto_dolar);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtcomenta_factura);
		jQuery('cmblista_productoid_retencion').val("");
		jQuery('cmblista_productoid_retencion_ventas').val("");
		jQuery('cmblista_productoid_retencion_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientolista_producto.txtnotas);	
	}
	
/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		this.procesarInicioProceso();
	}
	
	procesarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		this.procesarFinalizacionProcesoAbrirLink();
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		this.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink);
	}
	
	procesarInicioProceso() {		
		funcionGeneral.procesarInicioProceso(lista_producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(lista_producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(lista_producto_constante1.STR_RELATIVE_PATH,"lista_producto");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"lista_producto");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlista_producto.txtNumeroRegistroslista_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'lista_productoes',strNumeroRegistros,document.frmParamsBuscarlista_producto.txtNumeroRegistroslista_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(lista_producto_constante1.BIT_CON_PAGINA_FORM==true && lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
			bitRetorno =true;
		}
		
		return bitRetorno;
	}
	
//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,lista_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(lista_producto_constante1) {
		
		//VALIDACION
		// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT		
		/*
		jQuery.validator.addMethod(
				"regexpStringMethod",
				function(value, element) {
					return value.match(constantes.STRREGX_STRING_GENERAL);
				},
				"Valor Incorrecto"
		);
		*/
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		var arrRules=null;
		var arrRulesTotales=null;		
		
		
		if(lista_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo_producto": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form-descripcion_producto": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form-precio1": {
					required:true,
					number:true
				},
					
				"form-precio2": {
					required:true,
					number:true
				},
					
				"form-precio3": {
					required:true,
					number:true
				},
					
				"form-precio4": {
					required:true,
					number:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
				"form-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-unidad_en_compra": {
					required:true,
					digits:true
				},
					
				"form-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-unidad_en_venta": {
					required:true,
					digits:true
				},
					
				"form-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form-cantidad_total": {
					required:true,
					number:true
				},
					
				"form-cantidad_minima": {
					required:true,
					number:true
				},
					
				"form-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-acepta_lote": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-valor_inventario": {
					required:true,
					number:true
				},
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-incremento1": {
					required:true,
					number:true
				},
					
				"form-incremento2": {
					required:true,
					number:true
				},
					
				"form-incremento3": {
					required:true,
					number:true
				},
					
				"form-incremento4": {
					required:true,
					number:true
				},
					
				"form-codigo_fabricante": {
					required:true,
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-tipo_producto_codigo": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-mostrar_componente": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-factura_sin_stock": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-avisa_expiracion": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-factura_con_precio": {
					required:true,
					digits:true
				},
					
				"form-producto_equivalente": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_cuenta_compra": {
					digits:true
				
				},
					
				"form-id_cuenta_venta": {
					digits:true
				
				},
					
				"form-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form-cuenta_compra_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-cuenta_venta_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-cuenta_inventario_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form-id_otro_suplidor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_impuesto_ventas": {
					digits:true
				
				},
					
				"form-id_impuesto_compras": {
					digits:true
				
				},
					
				"form-impuesto1_en_ventas": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-impuesto1_en_compras": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-ultima_venta": {
					required:true,
					date:true
				},
					
				"form-id_otro_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_otro_impuesto_ventas": {
					digits:true
				
				},
					
				"form-id_otro_impuesto_compras": {
					digits:true
				
				},
					
				"form-otro_impuesto_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-otro_impuesto_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form-requiere_nro_serie": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-costo_dolar": {
					required:true,
					number:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-comenta_factura": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_retencion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_retencion_ventas": {
					digits:true
				
				},
					
				"form-id_retencion_compras": {
					digits:true
				
				},
					
				"form-retencion_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-retencion_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-notas": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-precio1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-unidad_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-unidad_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-acepta_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-codigo_fabricante": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo_producto_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-mostrar_componente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-factura_sin_stock": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-avisa_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_compra_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_venta_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_inventario_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_otro_suplidor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-impuesto1_en_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto1_en_compras": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_otro_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-otro_impuesto_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-otro_impuesto_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-requiere_nro_serie": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-costo_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comenta_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_retencion_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_retencion_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-retencion_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-notas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}
			
		} else {

			arrRules= {
				
				rules: {
					
				"form_lista_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-codigo_producto": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form_lista_producto-descripcion_producto": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form_lista_producto-precio1": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio2": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio3": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio4": {
					required:true,
					number:true
				},
					
				"form_lista_producto-costo": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-unidad_en_compra": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-unidad_en_venta": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form_lista_producto-cantidad_total": {
					required:true,
					number:true
				},
					
				"form_lista_producto-cantidad_minima": {
					required:true,
					number:true
				},
					
				"form_lista_producto-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-acepta_lote": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-valor_inventario": {
					required:true,
					number:true
				},
					
				"form_lista_producto-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lista_producto-incremento1": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento2": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento3": {
					required:true,
					number:true
				},
					
				"form_lista_producto-incremento4": {
					required:true,
					number:true
				},
					
				"form_lista_producto-codigo_fabricante": {
					required:true,
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form_lista_producto-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-tipo_producto_codigo": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-mostrar_componente": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-factura_sin_stock": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-avisa_expiracion": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-factura_con_precio": {
					required:true,
					digits:true
				},
					
				"form_lista_producto-producto_equivalente": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_cuenta_compra": {
					digits:true
				
				},
					
				"form_lista_producto-id_cuenta_venta": {
					digits:true
				
				},
					
				"form_lista_producto-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form_lista_producto-cuenta_compra_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-cuenta_venta_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-cuenta_inventario_codigo": {
					required:true,
					maxlength:14
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_otro_suplidor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_impuesto_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_impuesto_compras": {
					digits:true
				
				},
					
				"form_lista_producto-impuesto1_en_ventas": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-impuesto1_en_compras": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-ultima_venta": {
					required:true,
					date:true
				},
					
				"form_lista_producto-id_otro_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_otro_impuesto_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_otro_impuesto_compras": {
					digits:true
				
				},
					
				"form_lista_producto-otro_impuesto_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-otro_impuesto_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form_lista_producto-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form_lista_producto-requiere_nro_serie": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_lista_producto-costo_dolar": {
					required:true,
					number:true
				},
					
				"form_lista_producto-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lista_producto-comenta_factura": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-id_retencion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lista_producto-id_retencion_ventas": {
					digits:true
				
				},
					
				"form_lista_producto-id_retencion_compras": {
					digits:true
				
				},
					
				"form_lista_producto-retencion_ventas_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-retencion_compras_codigo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_lista_producto-notas": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_lista_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-codigo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-descripcion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-precio1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-unidad_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-unidad_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-cantidad_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-acepta_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-codigo_fabricante": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-tipo_producto_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-mostrar_componente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-factura_sin_stock": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-avisa_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-producto_equivalente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-cuenta_compra_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-cuenta_venta_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-cuenta_inventario_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_otro_suplidor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-impuesto1_en_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-impuesto1_en_compras": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lista_producto-id_otro_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_otro_impuesto_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_otro_impuesto_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-otro_impuesto_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-otro_impuesto_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lista_producto-requiere_nro_serie": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-costo_dolar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lista_producto-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-comenta_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-id_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_retencion_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-id_retencion_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lista_producto-retencion_ventas_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-retencion_compras_codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lista_producto-notas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientolista_producto").validate(arrRules);
		
		if(lista_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslista_producto").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-ultima_venta").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-precio_actualizado").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"lista_producto");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			lista_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"lista_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtdescripcion_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_minima,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtacepta_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtvalor_inventario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_fisico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtsituacion_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtmostrar_componente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtavisa_expiracion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_con_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_equivalente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto_dolar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomenta_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtnotas,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtdescripcion_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtunidad_en_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtequivalencia_en_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcantidad_minima,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtacepta_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtvalor_inventario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtincremento4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcodigo_fabricante,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_fisico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtsituacion_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txttipo_producto_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtmostrar_componente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_sin_stock,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtavisa_expiracion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtfactura_con_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtproducto_equivalente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_compra_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_venta_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcuenta_inventario_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtimpuesto1_en_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_ventas_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtotro_impuesto_compras_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtprecio_de_compra_0,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtrequiere_nro_serie,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcosto_dolar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtcomenta_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_ventas_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtretencion_compras_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolista_producto.txtnotas,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,lista_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,lista_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"lista_producto");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"lista_producto");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"lista_producto");
	}

//------------- Auxiliar-Mostrar-Mensaje -------------------

	mostrarMensaje(bitEsResaltar,strMensaje,strTipo) {
		this.resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo);
		this.mostrarDivMensaje(bitEsResaltar,strMensaje,strTipo);
	}

	mostrarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		funcionGeneral.mostrarDivMensaje(jQuery("#divMensajePage"),jQuery("#spanIcoMensajePage"),jQuery("#spanMensajePage"),jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"),bitEsResaltar,strMensaje,strTipo);	
	}
	
/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(lista_producto_control,lista_producto_webcontrol1,lista_producto_constante1) {
		
		var strSuf=lista_producto_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				

				control_name="t"+strSuf+"-cel_"+i+"_50";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_57";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_10";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_13";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_18";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_19";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_30";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_32";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_38";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_39";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_40";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_44";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_45";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_46";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_47";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_51";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_52";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_53";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_62";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_63";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_64";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:26';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:70';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:24';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:14';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:14';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:14';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_56";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_57";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_58";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_59";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_60";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_61";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_62";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_63";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_64";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_65";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_66";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_67";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_56";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_57";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_58";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_59";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_60";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_61";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_62";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_63";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_64";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_65";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_66";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_67";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idproductoDefaultForeignKey!=null && lista_producto_control.idproductoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idproductoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaproductoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaproductoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_10";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idunidad_compraDefaultForeignKey!=null && lista_producto_control.idunidad_compraDefaultForeignKey>-1) {
					idActual=lista_producto_control.idunidad_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_13";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idunidad_ventaDefaultForeignKey!=null && lista_producto_control.idunidad_ventaDefaultForeignKey>-1) {
					idActual=lista_producto_control.idunidad_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_18";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idcategoria_productoDefaultForeignKey!=null && lista_producto_control.idcategoria_productoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idcategoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_19";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idsub_categoria_productoDefaultForeignKey!=null && lista_producto_control.idsub_categoria_productoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idsub_categoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_30";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idtipo_productoDefaultForeignKey!=null && lista_producto_control.idtipo_productoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idtipo_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablatipo_productoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablatipo_productoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_32";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idbodegaDefaultForeignKey!=null && lista_producto_control.idbodegaDefaultForeignKey>-1) {
					idActual=lista_producto_control.idbodegaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablabodegaFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablabodegaFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_38";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idcuenta_compraDefaultForeignKey!=null && lista_producto_control.idcuenta_compraDefaultForeignKey>-1) {
					idActual=lista_producto_control.idcuenta_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_39";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idcuenta_ventaDefaultForeignKey!=null && lista_producto_control.idcuenta_ventaDefaultForeignKey>-1) {
					idActual=lista_producto_control.idcuenta_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_40";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idcuenta_inventarioDefaultForeignKey!=null && lista_producto_control.idcuenta_inventarioDefaultForeignKey>-1) {
					idActual=lista_producto_control.idcuenta_inventarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablacuenta_inventarioFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablacuenta_inventarioFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_44";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idotro_suplidorDefaultForeignKey!=null && lista_producto_control.idotro_suplidorDefaultForeignKey>-1) {
					idActual=lista_producto_control.idotro_suplidorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaotro_suplidorFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaotro_suplidorFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_45";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idimpuestoDefaultForeignKey!=null && lista_producto_control.idimpuestoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idimpuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaimpuestoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaimpuestoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_46";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idimpuesto_ventasDefaultForeignKey!=null && lista_producto_control.idimpuesto_ventasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idimpuesto_ventasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaimpuesto_ventasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaimpuesto_ventasFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_47";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idimpuesto_comprasDefaultForeignKey!=null && lista_producto_control.idimpuesto_comprasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idimpuesto_comprasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaimpuesto_comprasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaimpuesto_comprasFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_51";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idotro_impuestoDefaultForeignKey!=null && lista_producto_control.idotro_impuestoDefaultForeignKey>-1) {
					idActual=lista_producto_control.idotro_impuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_52";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idotro_impuesto_ventasDefaultForeignKey!=null && lista_producto_control.idotro_impuesto_ventasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idotro_impuesto_ventasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaotro_impuesto_ventasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaotro_impuesto_ventasFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_53";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idotro_impuesto_comprasDefaultForeignKey!=null && lista_producto_control.idotro_impuesto_comprasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idotro_impuesto_comprasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaotro_impuesto_comprasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaotro_impuesto_comprasFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_62";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idretencionDefaultForeignKey!=null && lista_producto_control.idretencionDefaultForeignKey>-1) {
					idActual=lista_producto_control.idretencionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaretencionFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaretencionFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_63";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idretencion_ventasDefaultForeignKey!=null && lista_producto_control.idretencion_ventasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idretencion_ventasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaretencion_ventasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaretencion_ventasFK(lista_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_64";
				idActual=jQuery("#"+control_name).val();

				if(lista_producto_control.idretencion_comprasDefaultForeignKey!=null && lista_producto_control.idretencion_comprasDefaultForeignKey>-1) {
					idActual=lista_producto_control.idretencion_comprasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lista_producto_webcontrol1.cargarComboEditarTablaretencion_comprasFK(lista_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lista_producto_webcontrol1.cargarComboEditarTablaretencion_comprasFK(lista_producto_control,control_name,idActual,true);
					}
				});
				//FK CHECKBOX EVENTOS FIN
			}					
		}
		
		
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatoslista_producto").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var lista_producto_funcion1=new lista_producto_funcion(); //var


//</script>
