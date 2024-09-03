<script type="text/javascript" language="javascript">


class transacciones_cuenta_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta");
		
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta");
		
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(transacciones_cuenta_constante1.STR_ES_RELACIONES,transacciones_cuenta_constante1.STR_ES_RELACIONADO,transacciones_cuenta_constante1.STR_RELATIVE_PATH,"transacciones_cuenta");		
		
		if(super.esPaginaForm(transacciones_cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta");
		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
				
		if(super.esPaginaForm(transacciones_cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.hdnIdActual);
		jQuery('cmbtransacciones_cuentaid_empresa').val("");
		jQuery('cmbtransacciones_cuentaid_usuario').val("");
		jQuery('cmbtransacciones_cuentaid_banco').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.txtnumero_cuenta);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.txttipo);
		jQuery('dttransacciones_cuentafecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.txtcredito);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta.txtdescripcion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartransacciones_cuenta.txtNumeroRegistrostransacciones_cuenta,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'transacciones_cuentas',strNumeroRegistros,document.frmParamsBuscartransacciones_cuenta.txtNumeroRegistrostransacciones_cuenta);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(transacciones_cuenta_constante1) {
		
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
		
		
		if(transacciones_cuenta_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_banco": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-tipo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-debito": {
					required:true,
					number:true
				},
					
				"form-credito": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_banco": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(transacciones_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_transacciones_cuenta-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_transacciones_cuenta-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_transacciones_cuenta-id_banco": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_transacciones_cuenta-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_transacciones_cuenta-tipo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_transacciones_cuenta-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_transacciones_cuenta-debito": {
					required:true,
					number:true
				},
					
				"form_transacciones_cuenta-credito": {
					required:true,
					number:true
				},
					
				"form_transacciones_cuenta-descripcion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_transacciones_cuenta-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_transacciones_cuenta-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_transacciones_cuenta-id_banco": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_transacciones_cuenta-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_transacciones_cuenta-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_transacciones_cuenta-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_transacciones_cuenta-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_transacciones_cuenta-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_transacciones_cuenta-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(transacciones_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotransacciones_cuenta").validate(arrRules);
		
		if(transacciones_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestransacciones_cuenta").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			transacciones_cuentaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"transacciones_cuenta");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtnumero_cuenta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txttipo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtcredito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtnumero_cuenta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txttipo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtcredito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,transacciones_cuenta_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,transacciones_cuenta_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"transacciones_cuenta");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(transacciones_cuenta_constante1.STR_RELATIVE_PATH,"transacciones_cuenta");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta");
		
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(transacciones_cuenta_constante1,"transacciones_cuenta");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"transacciones_cuenta");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(transacciones_cuenta_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(transacciones_cuenta_constante1,"transacciones_cuenta");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,transacciones_cuenta_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var transacciones_cuenta_funcion1=new transacciones_cuenta_funcion(); //var


</script>
