//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {factura_lote_constante,factura_lote_constante1} from '../util/factura_lote_constante.js';


class factura_lote_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(factura_lote_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"factura_lote");		
		super.procesarInicioProceso(factura_lote_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"factura_lote");		
		super.procesarInicioProceso(factura_lote_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(factura_lote_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(factura_lote_constante1.STR_ES_RELACIONES,factura_lote_constante1.STR_ES_RELACIONADO,factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
		
		if(super.esPaginaForm(factura_lote_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(factura_lote_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"factura_lote");		
		super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote");
				
		if(super.esPaginaForm(factura_lote_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbfactura_loteid_empresa').val("");
		jQuery('cmbfactura_loteid_sucursal').val("");
		jQuery('cmbfactura_loteid_ejercicio').val("");
		jQuery('cmbfactura_loteid_periodo').val("");
		jQuery('cmbfactura_loteid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtnumero);
		jQuery('cmbfactura_loteid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente);
		jQuery('dtfactura_lotefecha_emision').val(new Date());
		jQuery('cmbfactura_loteid_vendedor').val("");
		jQuery('cmbfactura_loteid_termino_pago').val("");
		jQuery('dtfactura_lotefecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcotizacion);
		jQuery('cmbfactura_loteid_moneda').val("");
		jQuery('cmbfactura_loteid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtenviar_a);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientofactura_lote.chbimpuesto_en_precio,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtotro_porciento);
		jQuery('dtfactura_lotehora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento);
		jQuery('cmbfactura_loteid_asiento').val("");
		jQuery('cmbfactura_loteid_documento_cuenta_cobrar').val("");
		jQuery('cmbfactura_loteid_kardex').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarfactura_lote.txtNumeroRegistrosfactura_lote,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'factura_lotees',strNumeroRegistros,document.frmParamsBuscarfactura_lote.txtNumeroRegistrosfactura_lote);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(factura_lote_constante1) {
		
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
		
		
		if(factura_lote_constante1.STR_SUFIJO=="") {
			
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
					maxlength:250
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
					
				"form-id_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-cotizacion": {
					required:true,
					number:true
				},
					
				"form-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-direccion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:1000
					,regexpStringMethod:true
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
					
				"form-hora": {
					required:true,
					date:true
				},
					
				"form-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form-id_asiento": {
					digits:true
				
				},
					
				"form-id_documento_cuenta_cobrar": {
					digits:true
				
				},
					
				"form-id_kardex": {
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
					"form-id_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
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
					"form-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_factura_lote-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_factura_lote-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-ruc": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_factura_lote-referencia_cliente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_factura_lote-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_factura_lote-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_factura_lote-cotizacion": {
					required:true,
					number:true
				},
					
				"form_factura_lote-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-direccion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_factura_lote-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_factura_lote-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_factura_lote-sub_total": {
					required:true,
					number:true
				},
					
				"form_factura_lote-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-total": {
					required:true,
					number:true
				},
					
				"form_factura_lote-otro_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-hora": {
					required:true,
					date:true
				},
					
				"form_factura_lote-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-id_asiento": {
					digits:true
				
				},
					
				"form_factura_lote-id_documento_cuenta_cobrar": {
					digits:true
				
				},
					
				"form_factura_lote-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form_factura_lote-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-referencia_cliente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_factura_lote-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientofactura_lote").validate(arrRules);
		
		if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesfactura_lote").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			factura_loteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"factura_lote");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar_a,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientofactura_lote.chbimpuesto_en_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar_a,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientofactura_lote.chbimpuesto_en_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,factura_lote_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,factura_lote_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"factura_lote"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"factura_lote");
	
		super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(factura_lote_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(factura_lote_constante1,"factura_lote"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(factura_lote_constante1,"factura_lote"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"factura_lote"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(factura_lote_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(factura_lote_constante1,"factura_lote");	
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
				jQuery(".col_id_termino_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cotizacion") {
				jQuery(".col_cotizacion").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Sub Total") {
				jQuery(".col_sub_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Monto") {
				jQuery(".col_descuento_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento %") {
				jQuery(".col_descuento_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva Monto") {
				jQuery(".col_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva %") {
				jQuery(".col_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente Monto") {
				jQuery(".col_retencion_fuente_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente %") {
				jQuery(".col_retencion_fuente_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva Monto") {
				jQuery(".col_retencion_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva %") {
				jQuery(".col_retencion_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Hora") {
				jQuery(".col_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Docs Cc") {
				jQuery(".col_id_documento_cuenta_cobrar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_cuenta_cobrar_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_cuenta_cobrar_img_busqueda').trigger("click" );
				}
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
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,factura_lote_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="factura_lote_detalle" || strValueTipoRelacion=="Factura Lote Detalle") {
			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		}
		else if(strValueTipoRelacion=="factura_modelo" || strValueTipoRelacion=="Facturas Modelos") {
			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
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

var factura_lote_funcion1=new factura_lote_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {factura_lote_funcion,factura_lote_funcion1};

/*Para ser llamado desde window.opener*/
window.factura_lote_funcion1 = factura_lote_funcion1;



//</script>
