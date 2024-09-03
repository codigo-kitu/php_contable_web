//<script type="text/javascript" language="javascript">


//var beneficiario_ocacional_chequeFuncionGeneral= function () {

class beneficiario_ocacional_cheque_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,beneficiario_ocacional_cheque_constante1.STR_NOMBRE_OPCION,"beneficiario_ocacional_cheque");		
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
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		this.procesarInicioProceso();
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("beneficiario_ocacional_cheque",this);
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
		funcionGeneral.generarReporteFinalizacion(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,beneficiario_ocacional_cheque_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONES,beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO,beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
		
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
		funcionGeneral.eliminarOnClick(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional);
		funcionGeneral.setEmptyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario);	
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
		funcionGeneral.procesarInicioProceso(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(beneficiario_ocacional_cheque_constante1.STR_RELATIVE_PATH,"beneficiario_ocacional_cheque");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"beneficiario_ocacional_cheque");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarbeneficiario_ocacional_cheque.txtNumeroRegistrosbeneficiario_ocacional_cheque,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'beneficiario_ocacional_chequees',strNumeroRegistros,document.frmParamsBuscarbeneficiario_ocacional_cheque.txtNumeroRegistrosbeneficiario_ocacional_cheque);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(beneficiario_ocacional_cheque_constante1.BIT_CON_PAGINA_FORM==true && beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
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
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo Beneficiario") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 1") {
				jQuery(".col_direccion_1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 2") {
				jQuery(".col_direccion_2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion 3") {
				jQuery(".col_direccion_3").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono") {
				jQuery(".col_telefono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono Movil") {
				jQuery(".col_telefono_movil").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Email") {
				jQuery(".col_email").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Notas") {
				jQuery(".col_notas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Registro Ocacional") {
				jQuery(".col_registro_ocacional").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Registro Tributario") {
				jQuery(".col_registro_tributario").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,beneficiario_ocacional_cheque_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque" || strValueTipoRelacion=="Cheque") {
			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheques(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(beneficiario_ocacional_cheque_constante1) {
		
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
		
		
		if(beneficiario_ocacional_cheque_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_1": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_2": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-direccion_3": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					maxlength:15
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-email": {
					required:true,
					maxlength:60
					,email:true
				},
					
				"form-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-registro_ocacional": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-registro_tributario": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion_3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-email": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_ocacional": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_tributario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_beneficiario_ocacional_cheque-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_1": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_2": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-direccion_3": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-telefono": {
					maxlength:15
					,regexpTelefonoMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-email": {
					required:true,
					maxlength:60
					,email:true
				},
					
				"form_beneficiario_ocacional_cheque-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-registro_ocacional": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_beneficiario_ocacional_cheque-registro_tributario": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_beneficiario_ocacional_cheque-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-direccion_3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-email": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_beneficiario_ocacional_cheque-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-registro_ocacional": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_beneficiario_ocacional_cheque-registro_tributario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientobeneficiario_ocacional_cheque").validate(arrRules);
		
		if(beneficiario_ocacional_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesbeneficiario_ocacional_cheque").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"beneficiario_ocacional_cheque");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			beneficiario_ocacional_chequeFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"beneficiario_ocacional_cheque");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtdireccion_3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtemail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtnotas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_ocacional,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientobeneficiario_ocacional_cheque.txtregistro_tributario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,beneficiario_ocacional_cheque_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,beneficiario_ocacional_cheque_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"beneficiario_ocacional_cheque");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"beneficiario_ocacional_cheque");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"beneficiario_ocacional_cheque");
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

	registrarControlesTableValidacionEdition(beneficiario_ocacional_cheque_control,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1) {
		
		var strSuf=beneficiario_ocacional_cheque_constante1.STR_SUFIJO;
		
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
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:15';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
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
		
		jQuery("#frmTablaDatosbeneficiario_ocacional_cheque").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var beneficiario_ocacional_cheque_funcion1=new beneficiario_ocacional_cheque_funcion(); //var


//</script>
