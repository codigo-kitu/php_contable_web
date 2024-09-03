//<script type="text/javascript" language="javascript">


//var parametro_auxiliarFuncionGeneral= function () {

class parametro_auxiliar_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(parametro_auxiliar_constante1.STR_RELATIVE_PATH,parametro_auxiliar_constante1.STR_NOMBRE_OPCION,"parametro_auxiliar");		
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
		funcionGeneral.generarReporteFinalizacion(parametro_auxiliar_constante1.STR_RELATIVE_PATH,parametro_auxiliar_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(parametro_auxiliar_constante1.STR_ES_RELACIONES,parametro_auxiliar_constante1.STR_ES_RELACIONADO,parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
		
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
		funcionGeneral.eliminarOnClick(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.hdnIdActual);
		jQuery('cmbparametro_auxiliarid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto);
		jQuery('cmbparametro_auxiliarid_tipo_costeo_kardex').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,false);	
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
		funcionGeneral.procesarInicioProceso(parametro_auxiliar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(parametro_auxiliar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_auxiliar");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_auxiliar.txtNumeroRegistrosparametro_auxiliar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_auxiliares',strNumeroRegistros,document.frmParamsBuscarparametro_auxiliar.txtNumeroRegistrosparametro_auxiliar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(parametro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true && parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_auxiliar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_auxiliar_constante1) {
		
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
		
		
		if(parametro_auxiliar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_asignado": {
					required:true,
					maxlength:30
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
					
					
					
				"form-contador_producto": {
					required:true,
					digits:true
				},
					
				"form-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
				"form-numero_decimales_unidades": {
					required:true,
					digits:true
				},
					
					
				"form-siguiente_numero_correlativo_cc": {
					required:true,
					digits:true
				},
					
					
				"form-siguiente_numero_correlativo_asiento": {
					required:true,
					digits:true
				},
					
					
					
				"form-contador_cliente": {
					required:true,
					digits:true
				},
					
					
					
				"form-contador_proveedor": {
					required:true,
					digits:true
				},
					
					
				"form-abreviatura_registro_tributario": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_asignado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form-numero_decimales_unidades": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-siguiente_numero_correlativo_cc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-siguiente_numero_correlativo_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-abreviatura_registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_auxiliar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_auxiliar-nombre_asignado": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar-incremento": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_producto": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
				"form_parametro_auxiliar-numero_decimales_unidades": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-siguiente_numero_correlativo_cc": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-siguiente_numero_correlativo_asiento": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_cliente": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_proveedor": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-abreviatura_registro_tributario": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_parametro_auxiliar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-nombre_asignado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form_parametro_auxiliar-numero_decimales_unidades": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-siguiente_numero_correlativo_cc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-siguiente_numero_correlativo_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-abreviatura_registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_auxiliar").validate(arrRules);
		
		if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_auxiliar").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"parametro_auxiliar");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_auxiliarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_auxiliar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_auxiliar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_auxiliar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_auxiliar");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"parametro_auxiliar");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"parametro_auxiliar");
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

	registrarControlesTableValidacionEdition(parametro_auxiliar_control,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1) {
		
		var strSuf=parametro_auxiliar_constante1.STR_SUFIJO;
		
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

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_9";
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
					strRules=strRules+'\r\nmaxlength:30';
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

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
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

				if(parametro_auxiliar_control.idempresaDefaultForeignKey!=null && parametro_auxiliar_control.idempresaDefaultForeignKey>-1) {
					idActual=parametro_auxiliar_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					parametro_auxiliar_webcontrol1.cargarComboEditarTablaempresaFK(parametro_auxiliar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						parametro_auxiliar_webcontrol1.cargarComboEditarTablaempresaFK(parametro_auxiliar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_9";
				idActual=jQuery("#"+control_name).val();

				if(parametro_auxiliar_control.idtipo_costeo_kardexDefaultForeignKey!=null && parametro_auxiliar_control.idtipo_costeo_kardexDefaultForeignKey>-1) {
					idActual=parametro_auxiliar_control.idtipo_costeo_kardexDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					parametro_auxiliar_webcontrol1.cargarComboEditarTablatipo_costeo_kardexFK(parametro_auxiliar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						parametro_auxiliar_webcontrol1.cargarComboEditarTablatipo_costeo_kardexFK(parametro_auxiliar_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosparametro_auxiliar").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var parametro_auxiliar_funcion1=new parametro_auxiliar_funcion(); //var


//</script>
