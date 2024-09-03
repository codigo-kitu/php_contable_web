//<script type="text/javascript" language="javascript">


//var retencion_icaFuncionGeneral= function () {

class retencion_ica_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(retencion_ica_constante1.STR_RELATIVE_PATH,retencion_ica_constante1.STR_NOMBRE_OPCION,"retencion_ica");		
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
		funcionGeneral.generarReporteFinalizacion(retencion_ica_constante1.STR_RELATIVE_PATH,retencion_ica_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(retencion_ica_constante1.STR_ES_RELACIONES,retencion_ica_constante1.STR_ES_RELACIONADO,retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");		
		
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
		funcionGeneral.eliminarOnClick(retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.hdnIdActual);
		jQuery('cmbretencion_icaid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtvalor);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtvalor_base);
		funcionGeneral.setCheckControl(document.frmMantenimientoretencion_ica.chbpredeterminado,false);
		jQuery('cmbretencion_icaid_cuenta_ventas').val("");
		jQuery('cmbretencion_icaid_cuenta_compras').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_compras);	
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
		funcionGeneral.procesarInicioProceso(retencion_ica_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(retencion_ica_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(retencion_ica_constante1.STR_RELATIVE_PATH,"retencion_ica");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"retencion_ica");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarretencion_ica.txtNumeroRegistrosretencion_ica,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'retencion_icas',strNumeroRegistros,document.frmParamsBuscarretencion_ica.txtNumeroRegistrosretencion_ica);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(retencion_ica_constante1.BIT_CON_PAGINA_FORM==true && retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,retencion_ica_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(retencion_ica_constante1) {
		
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
		
		
		if(retencion_ica_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-valor": {
					required:true,
					number:true
				},
					
				"form-valor_base": {
					required:true,
					number:true
				},
					
					
				"form-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form-id_cuenta_compras": {
					digits:true
				
				},
					
				"form-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-valor_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(retencion_ica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_retencion_ica-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retencion_ica-codigo": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form_retencion_ica-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_retencion_ica-valor": {
					required:true,
					number:true
				},
					
				"form_retencion_ica-valor_base": {
					required:true,
					number:true
				},
					
					
				"form_retencion_ica-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form_retencion_ica-id_cuenta_compras": {
					digits:true
				
				},
					
				"form_retencion_ica-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_retencion_ica-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_retencion_ica-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_ica-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_ica-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_ica-valor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_retencion_ica-valor_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_retencion_ica-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_ica-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retencion_ica-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retencion_ica-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(retencion_ica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoretencion_ica").validate(arrRules);
		
		if(retencion_ica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesretencion_ica").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"retencion_ica");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			retencion_icaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"retencion_ica");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtvalor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtvalor_base,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoretencion_ica.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_compras,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtvalor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtvalor_base,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoretencion_ica.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretencion_ica.txtcuenta_contable_compras,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,retencion_ica_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,retencion_ica_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"retencion_ica");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"retencion_ica");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"retencion_ica");
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

	registrarControlesTableValidacionEdition(retencion_ica_control,retencion_ica_webcontrol1,retencion_ica_constante1) {
		
		var strSuf=retencion_ica_constante1.STR_SUFIJO;
		
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
					control_name="t"+strSuf+"-cel_"+i+"_8";
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
					strRules=strRules+'\r\nmaxlength:5';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:40';
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

				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
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
				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(retencion_ica_control.idempresaDefaultForeignKey!=null && retencion_ica_control.idempresaDefaultForeignKey>-1) {
					idActual=retencion_ica_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					retencion_ica_webcontrol1.cargarComboEditarTablaempresaFK(retencion_ica_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						retencion_ica_webcontrol1.cargarComboEditarTablaempresaFK(retencion_ica_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(retencion_ica_control.idcuenta_ventasDefaultForeignKey!=null && retencion_ica_control.idcuenta_ventasDefaultForeignKey>-1) {
					idActual=retencion_ica_control.idcuenta_ventasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					retencion_ica_webcontrol1.cargarComboEditarTablacuenta_ventasFK(retencion_ica_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						retencion_ica_webcontrol1.cargarComboEditarTablacuenta_ventasFK(retencion_ica_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_9";
				idActual=jQuery("#"+control_name).val();

				if(retencion_ica_control.idcuenta_comprasDefaultForeignKey!=null && retencion_ica_control.idcuenta_comprasDefaultForeignKey>-1) {
					idActual=retencion_ica_control.idcuenta_comprasDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					retencion_ica_webcontrol1.cargarComboEditarTablacuenta_comprasFK(retencion_ica_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						retencion_ica_webcontrol1.cargarComboEditarTablacuenta_comprasFK(retencion_ica_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosretencion_ica").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var retencion_ica_funcion1=new retencion_ica_funcion(); //var


//</script>
