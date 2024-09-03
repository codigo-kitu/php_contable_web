//<script type="text/javascript" language="javascript">


//var factura_lote_detalleFuncionGeneral= function () {

class factura_lote_detalle_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(factura_lote_detalle_constante1.STR_RELATIVE_PATH,factura_lote_detalle_constante1.STR_NOMBRE_OPCION,"factura_lote_detalle");		
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
		funcionGeneral.generarReporteFinalizacion(factura_lote_detalle_constante1.STR_RELATIVE_PATH,factura_lote_detalle_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(factura_lote_detalle_constante1.STR_ES_RELACIONES,factura_lote_detalle_constante1.STR_ES_RELACIONADO,factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
		
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
		funcionGeneral.eliminarOnClick(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.hdnIdActual);
		jQuery('cmbfactura_lote_detalleid_factura_lote').val("");
		jQuery('cmbfactura_lote_detalleid_bodega').val("");
		jQuery('cmbfactura_lote_detalleid_producto').val("");
		jQuery('cmbfactura_lote_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtcosto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto);
		jQuery('dtfactura_lote_detallefecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txttipo_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txttipo_cambio);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtanulada);	
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
		funcionGeneral.procesarInicioProceso(factura_lote_detalle_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(factura_lote_detalle_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"factura_lote_detalle");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarfactura_lote_detalle.txtNumeroRegistrosfactura_lote_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'factura_lote_detalles',strNumeroRegistros,document.frmParamsBuscarfactura_lote_detalle.txtNumeroRegistrosfactura_lote_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(factura_lote_detalle_constante1.BIT_CON_PAGINA_FORM==true && factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,factura_lote_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(factura_lote_detalle_constante1) {
		
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
		
		
		if(factura_lote_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_factura_lote": {
					digits:true
				
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-precio": {
					required:true,
					number:true
				},
					
				"form-sub_total": {
					required:true,
					number:true
				},
					
				"form-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-iva_porciento": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-recibido": {
					required:true,
					number:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
				"form-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-tipo_factura": {
					required:true,
					digits:true
				},
					
				"form-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form-moneda": {
					required:true,
					digits:true
				},
					
				"form-anulada": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_factura_lote": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-anulada": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_factura_lote_detalle-id_factura_lote": {
					digits:true
				
				},
					
				"form_factura_lote_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-precio": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-sub_total": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-total": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-recibido": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-costo": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_factura_lote_detalle-tipo_factura": {
					required:true,
					digits:true
				},
					
				"form_factura_lote_detalle-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-moneda": {
					required:true,
					digits:true
				},
					
				"form_factura_lote_detalle-anulada": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_factura_lote_detalle-id_factura_lote": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote_detalle-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-anulada": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientofactura_lote_detalle").validate(arrRules);
		
		if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesfactura_lote_detalle").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"factura_lote_detalle");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			factura_lote_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"factura_lote_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcosto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttipo_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttipo_cambio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtanulada,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcosto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttipo_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttipo_cambio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtanulada,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,factura_lote_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,factura_lote_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"factura_lote_detalle");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"factura_lote_detalle");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"factura_lote_detalle");
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

	registrarControlesTableValidacionEdition(factura_lote_detalle_control,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1) {
		
		var strSuf=factura_lote_detalle_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_18";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();

					factura_lote_detalle_webcontrol1.registrarComboActionChangeid_bodega(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_4";
					jQuery("#"+control_name).select2();

					factura_lote_detalle_webcontrol1.registrarComboActionChangeid_producto(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_5";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
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
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
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
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_detalle_control.idfactura_loteDefaultForeignKey!=null && factura_lote_detalle_control.idfactura_loteDefaultForeignKey>-1) {
					idActual=factura_lote_detalle_control.idfactura_loteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_detalle_webcontrol1.cargarComboEditarTablafactura_loteFK(factura_lote_detalle_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_detalle_webcontrol1.cargarComboEditarTablafactura_loteFK(factura_lote_detalle_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_detalle_control.idbodegaDefaultForeignKey!=null && factura_lote_detalle_control.idbodegaDefaultForeignKey>-1) {
					idActual=factura_lote_detalle_control.idbodegaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_detalle_webcontrol1.cargarComboEditarTablabodegaFK(factura_lote_detalle_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_detalle_webcontrol1.cargarComboEditarTablabodegaFK(factura_lote_detalle_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_detalle_control.idproductoDefaultForeignKey!=null && factura_lote_detalle_control.idproductoDefaultForeignKey>-1) {
					idActual=factura_lote_detalle_control.idproductoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_detalle_webcontrol1.cargarComboEditarTablaproductoFK(factura_lote_detalle_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_detalle_webcontrol1.cargarComboEditarTablaproductoFK(factura_lote_detalle_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_detalle_control.idunidadDefaultForeignKey!=null && factura_lote_detalle_control.idunidadDefaultForeignKey>-1) {
					idActual=factura_lote_detalle_control.idunidadDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_detalle_webcontrol1.cargarComboEditarTablaunidadFK(factura_lote_detalle_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_detalle_webcontrol1.cargarComboEditarTablaunidadFK(factura_lote_detalle_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosfactura_lote_detalle").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var factura_lote_detalle_funcion1=new factura_lote_detalle_funcion(); //var


//</script>
