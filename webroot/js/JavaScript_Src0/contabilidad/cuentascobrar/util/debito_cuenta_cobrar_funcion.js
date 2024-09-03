//<script type="text/javascript" language="javascript">


//var debito_cuenta_cobrarFuncionGeneral= function () {

class debito_cuenta_cobrar_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,debito_cuenta_cobrar_constante1.STR_NOMBRE_OPCION,"debito_cuenta_cobrar");		
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
		funcionGeneral.generarReporteFinalizacion(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,debito_cuenta_cobrar_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(debito_cuenta_cobrar_constante1.STR_ES_RELACIONES,debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO,debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");		
		
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
		funcionGeneral.eliminarOnClick(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.hdnIdActual);
		jQuery('cmbdebito_cuenta_cobrarid_empresa').val("");
		jQuery('cmbdebito_cuenta_cobrarid_sucursal').val("");
		jQuery('cmbdebito_cuenta_cobrarid_ejercicio').val("");
		jQuery('cmbdebito_cuenta_cobrarid_periodo').val("");
		jQuery('cmbdebito_cuenta_cobrarid_usuario').val("");
		jQuery('cmbdebito_cuenta_cobrarid_cuenta_cobrar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtnumero);
		jQuery('dtdebito_cuenta_cobrarfecha_emision').val(new Date());
		jQuery('dtdebito_cuenta_cobrarfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtreferencia);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientodebito_cuenta_cobrar.chbes_balance_inicial,false);
		jQuery('cmbdebito_cuenta_cobrarid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_cobrar.txtcredito);	
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
		funcionGeneral.procesarInicioProceso(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(debito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"debito_cuenta_cobrar");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"debito_cuenta_cobrar");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardebito_cuenta_cobrar.txtNumeroRegistrosdebito_cuenta_cobrar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'debito_cuenta_cobrars',strNumeroRegistros,document.frmParamsBuscardebito_cuenta_cobrar.txtNumeroRegistrosdebito_cuenta_cobrar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(debito_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true && debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,debito_cuenta_cobrar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(debito_cuenta_cobrar_constante1) {
		
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
		
		
		if(debito_cuenta_cobrar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta_cobrar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-referencia": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-debito": {
					required:true,
					number:true
				},
					
				"form-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-referencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(debito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_debito_cuenta_cobrar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-id_cuenta_cobrar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_debito_cuenta_cobrar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_debito_cuenta_cobrar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_debito_cuenta_cobrar-referencia": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_debito_cuenta_cobrar-monto": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_cobrar-saldo": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_cobrar-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_debito_cuenta_cobrar-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_cobrar-debito": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_cobrar-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_debito_cuenta_cobrar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-id_cuenta_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_debito_cuenta_cobrar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_debito_cuenta_cobrar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_debito_cuenta_cobrar-referencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_debito_cuenta_cobrar-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_cobrar-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_cobrar-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_debito_cuenta_cobrar-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_cobrar-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_cobrar-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(debito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodebito_cuenta_cobrar").validate(arrRules);
		
		if(debito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdebito_cuenta_cobrar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"debito_cuenta_cobrar");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			debito_cuenta_cobrarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"debito_cuenta_cobrar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtreferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientodebito_cuenta_cobrar.chbes_balance_inicial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtreferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientodebito_cuenta_cobrar.chbes_balance_inicial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_cobrar.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,debito_cuenta_cobrar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,debito_cuenta_cobrar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"debito_cuenta_cobrar");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"debito_cuenta_cobrar");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"debito_cuenta_cobrar");
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

	registrarControlesTableValidacionEdition(debito_cuenta_cobrar_control,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1) {
		
		var strSuf=debito_cuenta_cobrar_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_9";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_10";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_4";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_5";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_6";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_7";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_16";
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
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:12';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:25';
					strRules=strRules+'\r\n,regexpStringMethod:true';
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
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idempresaDefaultForeignKey!=null && debito_cuenta_cobrar_control.idempresaDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaempresaFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaempresaFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idsucursalDefaultForeignKey!=null && debito_cuenta_cobrar_control.idsucursalDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idsucursalDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablasucursalFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablasucursalFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idejercicioDefaultForeignKey!=null && debito_cuenta_cobrar_control.idejercicioDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idejercicioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaejercicioFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaejercicioFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idperiodoDefaultForeignKey!=null && debito_cuenta_cobrar_control.idperiodoDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idperiodoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaperiodoFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaperiodoFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_6";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idusuarioDefaultForeignKey!=null && debito_cuenta_cobrar_control.idusuarioDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablausuarioFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablausuarioFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_7";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey!=null && debito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablacuenta_cobrarFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablacuenta_cobrarFK(debito_cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_16";
				idActual=jQuery("#"+control_name).val();

				if(debito_cuenta_cobrar_control.idestadoDefaultForeignKey!=null && debito_cuenta_cobrar_control.idestadoDefaultForeignKey>-1) {
					idActual=debito_cuenta_cobrar_control.idestadoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaestadoFK(debito_cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						debito_cuenta_cobrar_webcontrol1.cargarComboEditarTablaestadoFK(debito_cuenta_cobrar_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosdebito_cuenta_cobrar").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var debito_cuenta_cobrar_funcion1=new debito_cuenta_cobrar_funcion(); //var


//</script>
