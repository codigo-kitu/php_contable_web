<script type="text/javascript" language="javascript">


class transacciones_cuenta_cobrar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta_cobrar");
		
		super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"transacciones_cuenta_cobrar");
		
		super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONES,transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO,transacciones_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"transacciones_cuenta_cobrar");		
		
		if(super.esPaginaForm(transacciones_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
				
		if(super.esPaginaForm(transacciones_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.hdnIdActual);
		jQuery('cmbtransacciones_cuenta_cobrarid_empresa').val("");
		jQuery('cmbtransacciones_cuenta_cobrarid_sucursal').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtnumero_cuenta);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcliente);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txttipo);
		jQuery('dttransacciones_cuenta_cobrarfecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcredito);
		funcionGeneral.setEmptyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdescripcion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartransacciones_cuenta_cobrar.txtNumeroRegistrostransacciones_cuenta_cobrar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'transacciones_cuenta_cobrars',strNumeroRegistros,document.frmParamsBuscartransacciones_cuenta_cobrar.txtNumeroRegistrostransacciones_cuenta_cobrar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(transacciones_cuenta_cobrar_constante1) {
		
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
		
		
		if(transacciones_cuenta_cobrar_constante1.STR_SUFIJO=="") {
			
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
					
				"form-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-cliente": {
					required:true,
					maxlength:50
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
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(transacciones_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_transacciones_cuenta_cobrar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_transacciones_cuenta_cobrar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_transacciones_cuenta_cobrar-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_transacciones_cuenta_cobrar-cliente": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_transacciones_cuenta_cobrar-tipo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_transacciones_cuenta_cobrar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_transacciones_cuenta_cobrar-debito": {
					required:true,
					number:true
				},
					
				"form_transacciones_cuenta_cobrar-credito": {
					required:true,
					number:true
				},
					
				"form_transacciones_cuenta_cobrar-descripcion": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_transacciones_cuenta_cobrar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_transacciones_cuenta_cobrar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_transacciones_cuenta_cobrar-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_transacciones_cuenta_cobrar-cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_transacciones_cuenta_cobrar-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_transacciones_cuenta_cobrar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_transacciones_cuenta_cobrar-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_transacciones_cuenta_cobrar-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_transacciones_cuenta_cobrar-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(transacciones_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotransacciones_cuenta_cobrar").validate(arrRules);
		
		if(transacciones_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestransacciones_cuenta_cobrar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			transacciones_cuenta_cobrarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"transacciones_cuenta_cobrar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtnumero_cuenta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txttipo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcredito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtnumero_cuenta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txttipo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtcredito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotransacciones_cuenta_cobrar.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,transacciones_cuenta_cobrar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,transacciones_cuenta_cobrar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"transacciones_cuenta_cobrar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(transacciones_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"transacciones_cuenta_cobrar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(transacciones_cuenta_cobrar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"transacciones_cuenta_cobrar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(transacciones_cuenta_cobrar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(transacciones_cuenta_cobrar_constante1,"transacciones_cuenta_cobrar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,transacciones_cuenta_cobrar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var transacciones_cuenta_cobrar_funcion1=new transacciones_cuenta_cobrar_funcion(); //var


</script>
