//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {consignacion_constante,consignacion_constante1} from '../util/consignacion_constante.js';


class consignacion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(consignacion_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(consignacion_constante1,"consignacion");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"consignacion");		
		super.procesarInicioProceso(consignacion_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(consignacion_constante1,"consignacion"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"consignacion");		
		super.procesarInicioProceso(consignacion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(consignacion_constante1,"consignacion"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(consignacion_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(consignacion_constante1.STR_ES_RELACIONES,consignacion_constante1.STR_ES_RELACIONADO,consignacion_constante1.STR_RELATIVE_PATH,"consignacion");		
		
		if(super.esPaginaForm(consignacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(consignacion_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"consignacion");		
		super.procesarFinalizacionProceso(consignacion_constante1,"consignacion");
				
		if(super.esPaginaForm(consignacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbconsignacionid_empresa').val("");
		jQuery('cmbconsignacionid_sucursal').val("");
		jQuery('cmbconsignacionid_ejercicio').val("");
		jQuery('cmbconsignacionid_periodo').val("");
		jQuery('cmbconsignacionid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtnumero);
		jQuery('cmbconsignacionid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtreferencia_cliente);
		jQuery('dtconsignacionfecha_emision').val(new Date());
		jQuery('cmbconsignacionid_vendedor').val("");
		jQuery('cmbconsignacionid_termino_pago_cliente').val("");
		jQuery('dtconsignacionfecha_vence').val(new Date());
		jQuery('cmbconsignacionid_moneda').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtcotizacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtenviar_a);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoconsignacion.chbimpuesto_en_precio,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoconsignacion.chbgenero_factura,false);
		jQuery('cmbconsignacionid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtotro_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_ica_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoconsignacion.txtretencion_ica_monto);
		jQuery('cmbconsignacionid_kardex').val("");
		jQuery('cmbconsignacionid_asiento').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarconsignacion.txtNumeroRegistrosconsignacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'consignaciones',strNumeroRegistros,document.frmParamsBuscarconsignacion.txtNumeroRegistrosconsignacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(consignacion_constante1) {
		
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
		
		
		if(consignacion_constante1.STR_SUFIJO=="") {
			
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
					
				"form-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-referencia_cliente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cotizacion": {
					required:true,
					number:true
				},
					
				"form-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-sub_total": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-iva_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-otro_monto": {
					required:true,
					number:true
				},
					
				"form-otro_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form-id_kardex": {
					digits:true
				
				},
					
				"form-id_asiento": {
					digits:true
				
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia_cliente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_consignacion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_consignacion-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_consignacion-referencia_cliente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_consignacion-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_consignacion-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_consignacion-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-cotizacion": {
					required:true,
					number:true
				},
					
				"form_consignacion-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_consignacion-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_consignacion-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
				"form_consignacion-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_consignacion-sub_total": {
					required:true,
					number:true
				},
					
				"form_consignacion-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-iva_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-total": {
					required:true,
					number:true
				},
					
				"form_consignacion-otro_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form_consignacion-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_consignacion-id_kardex": {
					digits:true
				
				},
					
				"form_consignacion-id_asiento": {
					digits:true
				
				}
				},
				
				messages: {
					"form_consignacion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_consignacion-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_consignacion-referencia_cliente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_consignacion-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_consignacion-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_consignacion-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_consignacion-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_consignacion-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form_consignacion-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_consignacion-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_consignacion-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoconsignacion").validate(arrRules);
		
		if(consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesconsignacion").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			consignacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"consignacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtreferencia_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtenviar_a,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoconsignacion.chbimpuesto_en_precio,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoconsignacion.chbgenero_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_ica_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_ica_monto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtreferencia_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtenviar_a,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoconsignacion.chbimpuesto_en_precio,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoconsignacion.chbgenero_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_ica_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoconsignacion.txtretencion_ica_monto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,consignacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,consignacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"consignacion"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(consignacion_constante1.STR_RELATIVE_PATH,"consignacion"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"consignacion");
	
		super.procesarFinalizacionProceso(consignacion_constante1,"consignacion");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(consignacion_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(consignacion_constante1,"consignacion"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(consignacion_constante1,"consignacion"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"consignacion"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(consignacion_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(consignacion_constante1,"consignacion");	
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
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia Cliente") {
				jQuery(".col_referencia_cliente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_id_moneda").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_moneda_img').trigger("click" );
				} else {
					jQuery('#form-id_moneda_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cotizacion") {
				jQuery(".col_cotizacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Enviar a") {
				jQuery(".col_enviar_a").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto En Precio") {
				jQuery(".col_impuesto_en_precio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Genero Factura") {
				jQuery(".col_genero_factura").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sub Total") {
				jQuery(".col_sub_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descto") {
				jQuery(".col_descuento_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descto %") {
				jQuery(".col_descuento_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva") {
				jQuery(".col_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva %") {
				jQuery(".col_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente") {
				jQuery(".col_retencion_fuente_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente %") {
				jQuery(".col_retencion_fuente_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva") {
				jQuery(".col_retencion_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva %") {
				jQuery(".col_retencion_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscel") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscel. %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Kardex") {
				jQuery(".col_id_kardex").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_kardex_img').trigger("click" );
				} else {
					jQuery('#form-id_kardex_img_busqueda').trigger("click" );
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
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,consignacion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="consignacion_detalle" || strValueTipoRelacion=="Consignacion Detalle") {
			consignacion_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		}
		else if(strValueTipoRelacion=="imagen_consignacion" || strValueTipoRelacion=="Imagenes Consignacion") {
			consignacion_webcontrol1.registrarSesionParaimagen_consignaciones(idActual);
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

var consignacion_funcion1=new consignacion_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {consignacion_funcion,consignacion_funcion1};

/*Para ser llamado desde window.opener*/
window.consignacion_funcion1 = consignacion_funcion1;



//</script>
