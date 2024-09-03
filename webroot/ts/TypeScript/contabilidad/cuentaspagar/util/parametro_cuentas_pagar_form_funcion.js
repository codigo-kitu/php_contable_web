<script type="text/javascript" language="javascript">


class parametro_cuentas_pagar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_cuentas_pagar");
		
		super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_cuentas_pagar");
		
		super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_cuentas_pagar_constante1.STR_ES_RELACIONES,parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO,parametro_cuentas_pagar_constante1.STR_RELATIVE_PATH,"parametro_cuentas_pagar");		
		
		if(super.esPaginaForm(parametro_cuentas_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(parametro_cuentas_pagar_constante1.STR_RELATIVE_PATH,"parametro_cuentas_pagar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_cuentas_pagar");
		
		super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_cuentas_pagar");
		
		super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
				
		if(super.esPaginaForm(parametro_cuentas_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuentas_pagar.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_cuenta_pagar);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_detalle);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_credito);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_cuentas_pagar.txtNumeroRegistrosparametro_cuentas_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_cuentas_pagars',strNumeroRegistros,document.frmParamsBuscarparametro_cuentas_pagar.txtNumeroRegistrosparametro_cuentas_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_cuentas_pagar_constante1) {
		
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
		
		
		if(parametro_cuentas_pagar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-numero_cuenta_pagar": {
					required:true,
					digits:true
				},
					
				"form-numero_detalle": {
					required:true,
					digits:true
				},
					
				"form-numero_pago": {
					required:true,
					digits:true
				},
					
				"form-numero_credito": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-numero_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(parametro_cuentas_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_cuentas_pagar-numero_cuenta_pagar": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuentas_pagar-numero_detalle": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuentas_pagar-numero_pago": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuentas_pagar-numero_credito": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_parametro_cuentas_pagar-numero_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuentas_pagar-numero_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuentas_pagar-numero_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuentas_pagar-numero_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(parametro_cuentas_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_cuentas_pagar").validate(arrRules);
		
		if(parametro_cuentas_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_cuentas_pagar").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_cuentas_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_cuentas_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_cuenta_pagar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_detalle,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_credito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_cuenta_pagar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_detalle,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuentas_pagar.txtnumero_credito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_cuentas_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_cuentas_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_cuentas_pagar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(parametro_cuentas_pagar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_cuentas_pagar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(parametro_cuentas_pagar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(parametro_cuentas_pagar_constante1,"parametro_cuentas_pagar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_cuentas_pagar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var parametro_cuentas_pagar_funcion1=new parametro_cuentas_pagar_funcion(); //var


</script>
