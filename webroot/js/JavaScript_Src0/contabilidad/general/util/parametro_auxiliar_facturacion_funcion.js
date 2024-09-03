//<script type="text/javascript" language="javascript">


//var parametro_auxiliar_facturacionFuncionGeneral= function () {

class parametro_auxiliar_facturacion_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,parametro_auxiliar_facturacion_constante1.STR_NOMBRE_OPCION,"parametro_auxiliar_facturacion");		
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
		funcionGeneral.generarReporteFinalizacion(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,parametro_auxiliar_facturacion_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONES,parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO,parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
		
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
		funcionGeneral.eliminarOnClick(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.hdnIdActual);
		jQuery('cmbparametro_auxiliar_facturacionid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,false);	
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
		funcionGeneral.procesarInicioProceso(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_auxiliar_facturacion");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_auxiliar_facturacion.txtNumeroRegistrosparametro_auxiliar_facturacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_auxiliar_facturaciones',strNumeroRegistros,document.frmParamsBuscarparametro_auxiliar_facturacion.txtNumeroRegistrosparametro_auxiliar_facturacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(parametro_auxiliar_facturacion_constante1.BIT_CON_PAGINA_FORM==true && parametro_auxiliar_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_auxiliar_facturacion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_auxiliar_facturacion_constante1) {
		
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
		
		
		if(parametro_auxiliar_facturacion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_tipo_factura": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form-incremento": {
					required:true,
					digits:true
				},
					
					
					
					
					
				"form-nombre_tipo_factura_recibo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo_recibo": {
					required:true,
					digits:true
				},
					
				"form-incremento_recibo": {
					required:true,
					digits:true
				},
					
					
					
				"form-nombre_tipo_factura_ticket": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo_ticket": {
					required:true,
					digits:true
				},
					
				"form-incremento_ticket": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form-nombre_tipo_factura_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-nombre_tipo_factura_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_auxiliar_facturacion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento": {
					required:true,
					digits:true
				},
					
					
					
					
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura_recibo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_recibo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento_recibo": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura_ticket": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_ticket": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento_ticket": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_parametro_auxiliar_facturacion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_auxiliar_facturacion").validate(arrRules);
		
		if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_auxiliar_facturacion").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"parametro_auxiliar_facturacion");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_auxiliar_facturacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_auxiliar_facturacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_auxiliar_facturacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_auxiliar_facturacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_auxiliar_facturacion");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"parametro_auxiliar_facturacion");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"parametro_auxiliar_facturacion");
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

	registrarControlesTableValidacionEdition(parametro_auxiliar_facturacion_control,parametro_auxiliar_facturacion_webcontrol1,parametro_auxiliar_facturacion_constante1) {
		
		var strSuf=parametro_auxiliar_facturacion_constante1.STR_SUFIJO;
		
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
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
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
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
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

				if(parametro_auxiliar_facturacion_control.idempresaDefaultForeignKey!=null && parametro_auxiliar_facturacion_control.idempresaDefaultForeignKey>-1) {
					idActual=parametro_auxiliar_facturacion_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					parametro_auxiliar_facturacion_webcontrol1.cargarComboEditarTablaempresaFK(parametro_auxiliar_facturacion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						parametro_auxiliar_facturacion_webcontrol1.cargarComboEditarTablaempresaFK(parametro_auxiliar_facturacion_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosparametro_auxiliar_facturacion").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var parametro_auxiliar_facturacion_funcion1=new parametro_auxiliar_facturacion_funcion(); //var


//</script>
