//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cheque_cuenta_corriente_constante,cheque_cuenta_corriente_constante1} from '../util/cheque_cuenta_corriente_constante.js';

class cheque_cuenta_corriente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cheque_cuenta_corriente");
		
		super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cheque_cuenta_corriente");
		
		super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cheque_cuenta_corriente_constante1.STR_ES_RELACIONES,cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO,cheque_cuenta_corriente_constante1.STR_RELATIVE_PATH,"cheque_cuenta_corriente");		
		
		if(super.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cheque_cuenta_corriente");
		
		super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
				
		if(super.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.hdnIdActual);
		jQuery('cmbcheque_cuenta_corrienteid_empresa').val("");
		jQuery('cmbcheque_cuenta_corrienteid_sucursal').val("");
		jQuery('cmbcheque_cuenta_corrienteid_ejercicio').val("");
		jQuery('cmbcheque_cuenta_corrienteid_periodo').val("");
		jQuery('cmbcheque_cuenta_corrienteid_usuario').val("");
		jQuery('cmbcheque_cuenta_corrienteid_cuenta_corriente').val("");
		jQuery('cmbcheque_cuenta_corrienteid_categoria_cheque').val("");
		jQuery('cmbcheque_cuenta_corrienteid_cliente').val("");
		jQuery('cmbcheque_cuenta_corrienteid_proveedor').val("");
		jQuery('cmbcheque_cuenta_corrienteid_beneficiario_ocacional_cheque').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtnumero_cheque);
		jQuery('dtcheque_cuenta_corrientefecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto_texto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientocheque_cuenta_corriente.chbcobrado,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocheque_cuenta_corriente.chbimpreso,false);
		jQuery('cmbcheque_cuenta_corrienteid_estado_deposito_retiro').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocheque_cuenta_corriente.txtcredito);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcheque_cuenta_corriente.txtNumeroRegistroscheque_cuenta_corriente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cheque_cuenta_corrientes',strNumeroRegistros,document.frmParamsBuscarcheque_cuenta_corriente.txtNumeroRegistroscheque_cuenta_corriente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cheque_cuenta_corriente_constante1) {
		
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
		
		
		if(cheque_cuenta_corriente_constante1.STR_SUFIJO=="") {
			
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
		
			
			if(cheque_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cheque_cuenta_corriente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_categoria_cheque": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-id_cliente": {
					digits:true
				
				},
					
				"form_cheque_cuenta_corriente-id_proveedor": {
					digits:true
				
				},
					
				"form_cheque_cuenta_corriente-id_beneficiario_ocacional_cheque": {
					digits:true
				
				},
					
				"form_cheque_cuenta_corriente-numero_cheque": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cheque_cuenta_corriente-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cheque_cuenta_corriente-monto": {
					required:true,
					number:true
				},
					
				"form_cheque_cuenta_corriente-monto_texto": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_cheque_cuenta_corriente-saldo": {
					required:true,
					number:true
				},
					
				"form_cheque_cuenta_corriente-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
					
				"form_cheque_cuenta_corriente-id_estado_deposito_retiro": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cheque_cuenta_corriente-debito": {
					required:true,
					number:true
				},
					
				"form_cheque_cuenta_corriente-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_cheque_cuenta_corriente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_categoria_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-id_beneficiario_ocacional_cheque": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-numero_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cheque_cuenta_corriente-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cheque_cuenta_corriente-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque_cuenta_corriente-monto_texto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cheque_cuenta_corriente-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque_cuenta_corriente-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form_cheque_cuenta_corriente-id_estado_deposito_retiro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cheque_cuenta_corriente-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cheque_cuenta_corriente-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(cheque_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocheque_cuenta_corriente").validate(arrRules);
		
		if(cheque_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescheque_cuenta_corriente").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cheque_cuenta_corrienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cheque_cuenta_corriente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtnumero_cheque,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto_texto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque_cuenta_corriente.chbcobrado,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque_cuenta_corriente.chbimpreso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtnumero_cheque,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtmonto_texto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque_cuenta_corriente.chbcobrado,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocheque_cuenta_corriente.chbimpreso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocheque_cuenta_corriente.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cheque_cuenta_corriente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cheque_cuenta_corriente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cheque_cuenta_corriente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cheque_cuenta_corriente_constante1.STR_RELATIVE_PATH,"cheque_cuenta_corriente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cheque_cuenta_corriente");
		
		super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cheque_cuenta_corriente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cheque_cuenta_corriente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cheque_cuenta_corriente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cheque_cuenta_corriente_constante1,"cheque_cuenta_corriente");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cheque_cuenta_corriente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var cheque_cuenta_corriente_funcion1=new cheque_cuenta_corriente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {cheque_cuenta_corriente_funcion,cheque_cuenta_corriente_funcion1};

//Para ser llamado desde window.opener
window.cheque_cuenta_corriente_funcion1 = cheque_cuenta_corriente_funcion1;



//</script>
