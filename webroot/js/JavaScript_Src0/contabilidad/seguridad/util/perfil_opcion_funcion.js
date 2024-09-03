//<script type="text/javascript" language="javascript">


//var perfil_opcionFuncionGeneral= function () {

class perfil_opcion_funcion {
	
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
	
	buscarFkopcionperfil_opcionsOnComplete() {
	perfil_opcionFuncionGeneral.procesarFinalizacionProcesoperfil_opcion();
	document.getElementById("trFkopcionBusqueda").style.display="none";
	document.getElementById("tropcionTablaNavegacion").style.display="none";
	document.getElementById("tropcionTablaDatos").style.display="none";
	document.getElementById("tropcionPaginacion").style.display="none";
	document.getElementById("trperfil_opcionCabeceraBusquedas").style.display="table-row";
	document.getElementById("trperfil_opcionBusquedas").style.display="table-row";
	document.getElementById("trRecargarInformacionperfil_opcion").style.display="table-row";
	document.getElementById("trperfil_opcionTablaDatos").style.display="table-row";
	document.getElementById("trperfil_opcionPaginacion").style.display="table-row";
	document.getElementById("trperfil_opcionElementosFormulario").style.display="table-row";
}

abrirBusquedaFkopcionperfil_opcionsOnClick() {
	document.getElementById("trFkopcionBusqueda").style.display="table-row";
	document.getElementById("tropcionTablaNavegacion").style.display="table-row";
	document.getElementById("tropcionTablaDatos").style.display="table-row";
	document.getElementById("tropcionPaginacion").style.display="table-row";
	document.getElementById("trperfil_opcionCabeceraBusquedas").style.display="none";
	document.getElementById("trperfil_opcionBusquedas").style.display="none";
	document.getElementById("trRecargarInformacionperfil_opcion").style.display="none";
	document.getElementById("trperfil_opcionTablaDatos").style.display="none";
	document.getElementById("trperfil_opcionPaginacion").style.display="none";
	document.getElementById("trperfil_opcionElementosFormulario").style.display="none";
}



//---------- Clic-Buscar-Auxiliar ----------

	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(perfil_opcion_constante1.STR_RELATIVE_PATH,perfil_opcion_constante1.STR_NOMBRE_OPCION,"perfil_opcion");		
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
		funcionGeneral.generarReporteFinalizacion(perfil_opcion_constante1.STR_RELATIVE_PATH,perfil_opcion_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(perfil_opcion_constante1.STR_ES_RELACIONES,perfil_opcion_constante1.STR_ES_RELACIONADO,perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
		
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
		funcionGeneral.eliminarOnClick(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoperfil_opcion.hdnIdActual);
		jQuery('cmbperfil_opcionid_perfil').val("");
		jQuery('cmbperfil_opcionid_opcion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbtodo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbingreso,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbmodificacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbeliminacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbconsulta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbbusqueda,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbreporte,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbestado,false);	
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
		funcionGeneral.procesarInicioProceso(perfil_opcion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(perfil_opcion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_opcion");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarperfil_opcion.txtNumeroRegistrosperfil_opcion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'perfil_opciones',strNumeroRegistros,document.frmParamsBuscarperfil_opcion.txtNumeroRegistrosperfil_opcion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(perfil_opcion_constante1.BIT_CON_PAGINA_FORM==true && perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_opcion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(perfil_opcion_constante1) {
		
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
		
		
		if(perfil_opcion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
					
					
				},
				
				messages: {
					"form-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
					
					
				}		
			};	
		
			
			if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_perfil_opcion-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_perfil_opcion-id_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
					
					
				},
				
				messages: {
					"form_perfil_opcion-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_perfil_opcion-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
					
					
				}		
			};	



			if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoperfil_opcion").validate(arrRules);
		
		if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesperfil_opcion").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"perfil_opcion");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			perfil_opcionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"perfil_opcion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbtodo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbingreso,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbmodificacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbeliminacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbconsulta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbbusqueda,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbreporte,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbestado,false);
		} else {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbtodo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbingreso,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbmodificacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbeliminacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbconsulta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbbusqueda,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbreporte,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,perfil_opcion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,perfil_opcion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"perfil_opcion");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"perfil_opcion");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"perfil_opcion");
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

	registrarControlesTableValidacionEdition(perfil_opcion_control,perfil_opcion_webcontrol1,perfil_opcion_constante1) {
		
		var strSuf=perfil_opcion_constante1.STR_SUFIJO;
		
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
					control_name="t"+strSuf+"-cel_"+i+"_3";
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

				
				
				
				
				
				
				
				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
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

				if(perfil_opcion_control.idperfilDefaultForeignKey!=null && perfil_opcion_control.idperfilDefaultForeignKey>-1) {
					idActual=perfil_opcion_control.idperfilDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_opcion_webcontrol1.cargarComboEditarTablaperfilFK(perfil_opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_opcion_webcontrol1.cargarComboEditarTablaperfilFK(perfil_opcion_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(perfil_opcion_control.idopcionDefaultForeignKey!=null && perfil_opcion_control.idopcionDefaultForeignKey>-1) {
					idActual=perfil_opcion_control.idopcionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_opcion_webcontrol1.cargarComboEditarTablaopcionFK(perfil_opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_opcion_webcontrol1.cargarComboEditarTablaopcionFK(perfil_opcion_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosperfil_opcion").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var perfil_opcion_funcion1=new perfil_opcion_funcion(); //var


//</script>
