//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cuenta_corriente_detalle_constante,cuenta_corriente_detalle_constante1} from '../util/cuenta_corriente_detalle_constante.js';


class cuenta_corriente_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cuenta_corriente_detalle_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_corriente_detalle");		
		super.procesarInicioProceso(cuenta_corriente_detalle_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_corriente_detalle");		
		super.procesarInicioProceso(cuenta_corriente_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_detalle_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_corriente_detalle_constante1.STR_ES_RELACIONES,cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO,cuenta_corriente_detalle_constante1.STR_RELATIVE_PATH,"cuenta_corriente_detalle");		
		
		if(super.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_detalle_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente_detalle");		
		super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle");
				
		if(super.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcuenta_corriente_detalleid_empresa').val("");
		jQuery('cmbcuenta_corriente_detalleid_ejercicio').val("");
		jQuery('cmbcuenta_corriente_detalleid_periodo').val("");
		jQuery('cmbcuenta_corriente_detalleid_usuario').val("");
		jQuery('cmbcuenta_corriente_detalleid_cuenta_corriente').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_corriente_detalle.chbes_balance_inicial,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_corriente_detalle.chbes_cheque,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_corriente_detalle.chbes_deposito,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_corriente_detalle.chbes_retiro,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtnumero_cheque);
		jQuery('dtcuenta_corriente_detallefecha_emision').val(new Date());
		jQuery('cmbcuenta_corriente_detalleid_cliente').val("");
		jQuery('cmbcuenta_corriente_detalleid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtcredito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtbalance);
		jQuery('dtcuenta_corriente_detallefecha_hora').val(new Date());
		jQuery('cmbcuenta_corriente_detalleid_tabla').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtid_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtdescripcion);
		jQuery('cmbcuenta_corriente_detalleid_estado').val("");
		jQuery('cmbcuenta_corriente_detalleid_asiento').val("");
		jQuery('cmbcuenta_corriente_detalleid_cuenta_pagar').val("");
		jQuery('cmbcuenta_corriente_detalleid_cuenta_cobrar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txttabla_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtmotivo_anulacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_dato);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente_detalle.txtcomputador_origen);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_corriente_detalle.txtNumeroRegistroscuenta_corriente_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_corriente_detalles',strNumeroRegistros,document.frmParamsBuscarcuenta_corriente_detalle.txtNumeroRegistroscuenta_corriente_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cuenta_corriente_detalle_constante1) {
		
		/*VALIDACION*/
		/* NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT */
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
		
		
		if(cuenta_corriente_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
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
					
					
					
					
					
				"form-numero_cheque": {
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-id_cliente": {
					digits:true
				
				},
					
				"form-id_proveedor": {
					digits:true
				
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-debito": {
					required:true,
					number:true
				},
					
				"form-credito": {
					required:true,
					number:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-fecha_hora": {
					required:true,
					date:true
				},
					
				"form-id_tabla": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_origen": {
					required:true,
					digits:true
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
					
				"form-id_asiento": {
					digits:true
				
				},
					
				"form-id_cuenta_pagar": {
					digits:true
				
				},
					
				"form-id_cuenta_cobrar": {
					digits:true
				
				},
					
				"form-tabla_origen": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-origen_empresa": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-motivo_anulacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-origen_dato": {
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form-computador_origen": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form-numero_cheque": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tabla_origen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-origen_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-motivo_anulacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-origen_dato": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-computador_origen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_corriente_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_corriente_detalle-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
				"form_cuenta_corriente_detalle-numero_cheque": {
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cuenta_corriente_detalle-id_cliente": {
					digits:true
				
				},
					
				"form_cuenta_corriente_detalle-id_proveedor": {
					digits:true
				
				},
					
				"form_cuenta_corriente_detalle-monto": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente_detalle-debito": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente_detalle-credito": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente_detalle-balance": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente_detalle-fecha_hora": {
					required:true,
					date:true
				},
					
				"form_cuenta_corriente_detalle-id_tabla": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_origen": {
					required:true,
					digits:true
				},
					
				"form_cuenta_corriente_detalle-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente_detalle-id_asiento": {
					digits:true
				
				},
					
				"form_cuenta_corriente_detalle-id_cuenta_pagar": {
					digits:true
				
				},
					
				"form_cuenta_corriente_detalle-id_cuenta_cobrar": {
					digits:true
				
				},
					
				"form_cuenta_corriente_detalle-tabla_origen": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-origen_empresa": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-motivo_anulacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-origen_dato": {
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente_detalle-computador_origen": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cuenta_corriente_detalle-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form_cuenta_corriente_detalle-numero_cheque": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_corriente_detalle-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente_detalle-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente_detalle-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente_detalle-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente_detalle-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_corriente_detalle-id_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-id_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente_detalle-tabla_origen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-origen_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-motivo_anulacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-origen_dato": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente_detalle-computador_origen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cuenta_corriente_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocuenta_corriente_detalle").validate(arrRules);
		
		if(cuenta_corriente_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_corriente_detalle").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_corriente_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_corriente_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_balance_inicial,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_cheque,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_deposito,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_retiro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtnumero_cheque,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtcredito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtid_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txttabla_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtmotivo_anulacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_dato,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtcomputador_origen,false);
		} else {
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_balance_inicial,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_cheque,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_deposito,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_corriente_detalle.chbes_retiro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtnumero_cheque,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtcredito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtid_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txttabla_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtmotivo_anulacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtorigen_dato,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente_detalle.txtcomputador_origen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_corriente_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_corriente_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_corriente_detalle"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cuenta_corriente_detalle_constante1.STR_RELATIVE_PATH,"cuenta_corriente_detalle"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente_detalle");
	
		super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_detalle_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_corriente_detalle"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cuenta_corriente_detalle_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cuenta_corriente_detalle_constante1,"cuenta_corriente_detalle");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Cliente") {
				jQuery(".col_id_cuenta_corriente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_corriente_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_corriente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Es Balance Inicial") {
				jQuery(".col_es_balance_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Cheque") {
				jQuery(".col_es_cheque").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Deposito") {
				jQuery(".col_es_deposito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Retiro") {
				jQuery(".col_es_retiro").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Numero Cheque") {
				jQuery(".col_numero_cheque").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cliente") {
				jQuery(".col_id_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Debito") {
				jQuery(".col_debito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Credito") {
				jQuery(".col_credito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Hora") {
				jQuery(".col_fecha_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Tabla") {
				jQuery(".col_id_tabla").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tabla_img').trigger("click" );
				} else {
					jQuery('#form-id_tabla_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Origen") {
				jQuery(".col_id_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Asiento") {
				jQuery(".col_id_asiento").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_asiento_img').trigger("click" );
				} else {
					jQuery('#form-id_asiento_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Pagar") {
				jQuery(".col_id_cuenta_pagar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_pagar_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_pagar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Cobrar") {
				jQuery(".col_id_cuenta_cobrar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_cobrar_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_cobrar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tabla Origen") {
				jQuery(".col_tabla_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Origen Empresa") {
				jQuery(".col_origen_empresa").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Motivo Anulacion") {
				jQuery(".col_motivo_anulacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Origen Dato") {
				jQuery(".col_origen_dato").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Computador Origen") {
				jQuery(".col_computador_origen").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_corriente_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="clasificacion_cheque" || strValueTipoRelacion=="Clasificacion Cheque") {
			cuenta_corriente_detalle_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		}
	}
	
		
	
	/*
		Nuevo: nuevoOnClick,nuevoOnComplete,nuevoPrepararPaginaFormOnClick,nuevoPrepararPaginaFormOnComplete
		Seleccionar: seleccionarPaginaFormOnClick,seleccionarPaginaFormOnComplete
		Actualizar: actualizarOnClick,actualizarOnComplete
		Cancelar: cancelarOnClick,cancelarOnComplete,cancelarControles
		Validar-Formulario: validarFormularioParametrosNumeroRegistros,validarFormularioJQuery
		MostrarOcultar-Controles: mostrarOcultarControlesMantenimiento,habilitarDeshabilitarControles
		Estado-Botones: actualizarEstadoBotones
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClicks,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar-Simple: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Combos-Campos-Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
}

var cuenta_corriente_detalle_funcion1=new cuenta_corriente_detalle_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cuenta_corriente_detalle_funcion,cuenta_corriente_detalle_funcion1};

/*Para ser llamado desde window.opener*/
window.cuenta_corriente_detalle_funcion1 = cuenta_corriente_detalle_funcion1;



//</script>
