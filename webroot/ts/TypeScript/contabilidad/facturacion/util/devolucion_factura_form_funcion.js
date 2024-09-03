//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_factura_constante,devolucion_factura_constante1} from '../util/devolucion_factura_constante.js';

class devolucion_factura_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(devolucion_factura_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion_factura");
		
		super.procesarInicioProceso(devolucion_factura_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion_factura");
		
		super.procesarInicioProceso(devolucion_factura_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(devolucion_factura_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(devolucion_factura_constante1.STR_ES_RELACIONES,devolucion_factura_constante1.STR_ES_RELACIONADO,devolucion_factura_constante1.STR_RELATIVE_PATH,"devolucion_factura");		
		
		if(super.esPaginaForm(devolucion_factura_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(devolucion_factura_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion_factura");
		
		super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
				
		if(super.esPaginaForm(devolucion_factura_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.hdnIdActual);
		jQuery('cmbdevolucion_facturaid_empresa').val("");
		jQuery('cmbdevolucion_facturaid_sucursal').val("");
		jQuery('cmbdevolucion_facturaid_ejercicio').val("");
		jQuery('cmbdevolucion_facturaid_periodo').val("");
		jQuery('cmbdevolucion_facturaid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtnumero);
		jQuery('cmbdevolucion_facturaid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtreferencia_cliente);
		jQuery('dtdevolucion_facturafecha_emision').val(new Date());
		jQuery('cmbdevolucion_facturaid_vendedor').val("");
		jQuery('cmbdevolucion_facturaid_termino_pago_cliente').val("");
		jQuery('dtdevolucion_facturafecha_vence').val(new Date());
		jQuery('cmbdevolucion_facturaid_moneda').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtcotizacion);
		jQuery('cmbdevolucion_facturaid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtenviar_a);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientodevolucion_factura.chbimpuesto_en_precio,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretecion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtotro_porciento);
		jQuery('dtdevolucion_facturahora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_monto);
		jQuery('cmbdevolucion_facturaid_asiento').val("");
		jQuery('cmbdevolucion_facturaid_documento_cuenta_cobrar').val("");
		jQuery('cmbdevolucion_facturaid_kardex').val("");	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardevolucion_factura.txtNumeroRegistrosdevolucion_factura,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'devolucion_facturas',strNumeroRegistros,document.frmParamsBuscardevolucion_factura.txtNumeroRegistrosdevolucion_factura);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(devolucion_factura_constante1) {
		
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
		
		
		if(devolucion_factura_constante1.STR_SUFIJO=="") {
			
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
					required:true,
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
					
				"form-id_estado": {
					digits:true
				
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
					
				"form-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_monto": {
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
					"form-referencia_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
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
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(devolucion_factura_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_devolucion_factura-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_devolucion_factura-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_devolucion_factura-referencia_cliente": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_devolucion_factura-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_devolucion_factura-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_devolucion_factura-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_factura-cotizacion": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-id_estado": {
					digits:true
				
				},
					
				"form_devolucion_factura-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_devolucion_factura-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_devolucion_factura-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_devolucion_factura-sub_total": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-iva_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-total": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-otro_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-hora": {
					required:true,
					date:true
				},
					
				"form_devolucion_factura-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_factura-id_asiento": {
					digits:true
				
				},
					
				"form_devolucion_factura-id_documento_cuenta_cobrar": {
					digits:true
				
				},
					
				"form_devolucion_factura-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form_devolucion_factura-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_factura-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_factura-referencia_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_factura-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_devolucion_factura-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_devolucion_factura-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_factura-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_factura-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_devolucion_factura-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_devolucion_factura-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_factura-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_factura-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(devolucion_factura_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodevolucion_factura").validate(arrRules);
		
		if(devolucion_factura_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdevolucion_factura").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			devolucion_facturaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"devolucion_factura");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtreferencia_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtenviar_a,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientodevolucion_factura.chbimpuesto_en_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretecion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_monto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtreferencia_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtenviar_a,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientodevolucion_factura.chbimpuesto_en_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretecion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_factura.txtretencion_ica_monto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,devolucion_factura_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,devolucion_factura_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"devolucion_factura");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(devolucion_factura_constante1.STR_RELATIVE_PATH,"devolucion_factura");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion_factura");
		
		super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(devolucion_factura_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(devolucion_factura_constante1,"devolucion_factura");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(devolucion_factura_constante1,"devolucion_factura");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"devolucion_factura");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(devolucion_factura_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(devolucion_factura_constante1,"devolucion_factura");
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
			else if(strValueTipoColumna=="Iva") {
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
			else if(strValueTipoColumna=="Miscel") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscel %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Hora") {
				jQuery(".col_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
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

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,devolucion_factura_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="devolucion_factura_detalle" || strValueTipoRelacion=="Devolucion Factura Detalle") {
			devolucion_factura_webcontrol1.registrarSesionParadevolucion_factura_detalles(idActual);
		}
	}
	
	
	
}

var devolucion_factura_funcion1=new devolucion_factura_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {devolucion_factura_funcion,devolucion_factura_funcion1};

//Para ser llamado desde window.opener
window.devolucion_factura_funcion1 = devolucion_factura_funcion1;



//</script>
