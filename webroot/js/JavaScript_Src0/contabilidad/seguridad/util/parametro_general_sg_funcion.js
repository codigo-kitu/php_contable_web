//<script type="text/javascript" language="javascript">


//var parametro_general_sgFuncionGeneral= function () {

class parametro_general_sg_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(parametro_general_sg_constante1.STR_RELATIVE_PATH,parametro_general_sg_constante1.STR_NOMBRE_OPCION,"parametro_general_sg");		
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
		funcionGeneral.generarReporteFinalizacion(parametro_general_sg_constante1.STR_RELATIVE_PATH,parametro_general_sg_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(parametro_general_sg_constante1.STR_ES_RELACIONES,parametro_general_sg_constante1.STR_ES_RELACIONADO,parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
		
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
		funcionGeneral.eliminarOnClick(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,false);	
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
		funcionGeneral.procesarInicioProceso(parametro_general_sg_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(parametro_general_sg_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_general_sg");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_general_sg.txtNumeroRegistrosparametro_general_sg,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_general_sges',strNumeroRegistros,document.frmParamsBuscarparametro_general_sg.txtNumeroRegistrosparametro_general_sg);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(parametro_general_sg_constante1.BIT_CON_PAGINA_FORM==true && parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_general_sg_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_general_sg_constante1) {
		
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
		
		
		if(parametro_general_sg_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_simple_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_empresa": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-version_sistema": {
					required:true,
					number:true
				},
					
				"form-siglas_sistema": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form-mail_sistema": {
					maxlength:100
					,email:true
				},
					
				"form-telefono_sistema": {
					maxlength:50
					,regexpTelefonoMethod:true
				},
					
				"form-fax_sistema": {
					maxlength:50
					,regexpFaxMethod:true
				},
					
				"form-representante_nombre": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-codigo_proceso_actualizacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-nombre_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_simple_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-version_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-siglas_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-mail_sistema": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-telefono_sistema": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-fax_sistema": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-representante_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_proceso_actualizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_general_sg-nombre_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-nombre_simple_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-nombre_empresa": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-version_sistema": {
					required:true,
					number:true
				},
					
				"form_parametro_general_sg-siglas_sistema": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-mail_sistema": {
					maxlength:100
					,email:true
				},
					
				"form_parametro_general_sg-telefono_sistema": {
					maxlength:50
					,regexpTelefonoMethod:true
				},
					
				"form_parametro_general_sg-fax_sistema": {
					maxlength:50
					,regexpFaxMethod:true
				},
					
				"form_parametro_general_sg-representante_nombre": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-codigo_proceso_actualizacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_parametro_general_sg-nombre_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-nombre_simple_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-version_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_parametro_general_sg-siglas_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-mail_sistema": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_parametro_general_sg-telefono_sistema": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_parametro_general_sg-fax_sistema": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_parametro_general_sg-representante_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-codigo_proceso_actualizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_general_sg").validate(arrRules);
		
		if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_general_sg").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"parametro_general_sg");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_general_sgFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_general_sg");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_general_sg_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_general_sg_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_general_sg");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"parametro_general_sg");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"parametro_general_sg");
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

	registrarControlesTableValidacionEdition(parametro_general_sg_control,parametro_general_sg_webcontrol1,parametro_general_sg_constante1) {
		
		var strSuf=parametro_general_sg_constante1.STR_SUFIJO;
		
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
				
				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
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
					strRules=strRules+'\r\nmaxlength:15';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpFaxMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FAX_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				
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
		
		jQuery("#frmTablaDatosparametro_general_sg").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var parametro_general_sg_funcion1=new parametro_general_sg_funcion(); //var


//</script>
