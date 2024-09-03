<script type="text/javascript" language="javascript">


class cheque_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cheque_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cheque_constante1,"cheque");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cheque");
		
		super.procesarInicioProceso(cheque_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cheque_constante1,"cheque");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cheque");
		
		super.procesarInicioProceso(cheque_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cheque_constante1,"cheque");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cheque_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cheque_constante1.STR_ES_RELACIONES,cheque_constante1.STR_ES_RELACIONADO,cheque_constante1.STR_RELATIVE_PATH,"cheque");		
		
		if(super.esPaginaForm(cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cheque_constante1.STR_RELATIVE_PATH,"cheque");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cheque");
		
		super.procesarFinalizacionProceso(cheque_constante1,"cheque");
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cheque_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cheque");
		
		super.procesarFinalizacionProceso(cheque_constante1,"cheque");
				
		if(super.esPaginaForm(cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.hdnIdActual);
		jQuery('cmbchequeid_empresa').val("");
		jQuery('cmbchequeid_sucursal').val("");
		jQuery('cmbchequeid_ejercicio').val("");
		jQuery('cmbchequeid_periodo').val("");
		jQuery('cmbchequeid_usuario').val("");
		jQuery('cmbchequeid_cuenta_corriente').val("");
		jQuery('cmbchequeid_categoria_cheque').val("");
		jQuery('cmbchequeid_cliente').val("");
		jQuery('cmbchequeid_proveedor').val("");
		jQuery('cmbchequeid_beneficiario_ocacional_cheque').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtnumero_cheque);
		jQuery('dtchequefecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtmonto_texto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientocheque.chbcobrado,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocheque.chbimpreso,false);
		jQuery('cmbchequeid_estado_deposito_retiro').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque.txtcredito);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcheque.txtNumeroRegistroscheque,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cheques',strNumeroRegistros,document.frmParamsBuscarcheque.txtNumeroRegistroscheque);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cheque_constante1) {
		
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
		
		
		if(cheque_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_cheque": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cliente": {
					digits:true
				
				},
					
				"form-id_proveedor": {
					digits:true
				
				},
					
				"form-id_beneficiario_ocacional_cheque": {
					digits:true
				
				},
					
				"form-numero_cheque": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-monto_texto": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
					
				"form-id_estado_deposito_retiro": {
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
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_beneficiario_ocacional_cheque": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-monto_texto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form-id_estado_deposito_retiro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cheque-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_categoria_cheque": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-id_cliente": {
					digits:true
				
				},
					
				"form_cheque-id_proveedor": {
					digits:true
				
				},
					
				"form_cheque-id_beneficiario_ocacional_cheque": {
					digits:true
				
				},
					
				"form_cheque-numero_cheque": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cheque-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cheque-monto": {
					required:true,
					number:true
				},
					
				"form_cheque-monto_texto": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_cheque-saldo": {
					required:true,
					number:true
				},
					
				"form_cheque-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
					
				"form_cheque-id_estado_deposito_retiro": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque-debito": {
					required:true,
					number:true
				},
					
				"form_cheque-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_cheque-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_categoria_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-id_beneficiario_ocacional_cheque": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-numero_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cheque-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cheque-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque-monto_texto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cheque-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form_cheque-id_estado_deposito_retiro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocheque").validate(arrRules);
		
		if(cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescheque").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			chequeFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cheque");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtnumero_cheque,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtmonto_texto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque.chbcobrado,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque.chbimpreso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtnumero_cheque,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtmonto_texto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque.chbcobrado,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque.chbimpreso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cheque_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cheque_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cheque");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cheque_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cheque_constante1,"cheque");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cheque_constante1,"cheque");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cheque");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cheque_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cheque_constante1,"cheque");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cheque_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var cheque_funcion1=new cheque_funcion(); //var


</script>
