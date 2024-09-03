//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {orden_compra_constante,orden_compra_constante1} from '../util/orden_compra_constante.js';

class orden_compra_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(orden_compra_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra");
		
		super.procesarInicioProceso(orden_compra_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra");
		
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(orden_compra_constante1.STR_ES_RELACIONES,orden_compra_constante1.STR_ES_RELACIONADO,orden_compra_constante1.STR_RELATIVE_PATH,"orden_compra");		
		
		if(super.esPaginaForm(orden_compra_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"orden_compra");
		
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
				
		if(super.esPaginaForm(orden_compra_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.hdnIdActual);
		jQuery('cmborden_compraid_empresa').val("");
		jQuery('cmborden_compraid_sucursal').val("");
		jQuery('cmborden_compraid_ejercicio').val("");
		jQuery('cmborden_compraid_periodo').val("");
		jQuery('cmborden_compraid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtnumero);
		jQuery('cmborden_compraid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtruc);
		jQuery('dtorden_comprafecha_emision').val(new Date());
		jQuery('cmborden_compraid_vendedor').val("");
		jQuery('cmborden_compraid_termino_pago_proveedor').val("");
		jQuery('dtorden_comprafecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtcotizacion);
		jQuery('cmborden_compraid_moneda').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoorden_compra.chbimpuesto_en_precio,false);
		jQuery('cmborden_compraid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtenviar);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtotro_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_ica_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtretencion_ica_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtfactura_proveedor);
		funcionGeneral.setCheckControl(document.frmMantenimientoorden_compra.chbrecibida,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra.txtpagos);
		jQuery('cmborden_compraid_asiento').val("");
		jQuery('cmborden_compraid_documento_cuenta_pagar').val("");
		jQuery('cmborden_compraid_kardex').val("");	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarorden_compra.txtNumeroRegistrosorden_compra,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'orden_compras',strNumeroRegistros,document.frmParamsBuscarorden_compra.txtNumeroRegistrosorden_compra);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(orden_compra_constante1) {
		
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
		
		
		if(orden_compra_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ruc": {
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
					
				"form-id_termino_pago_proveedor": {
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
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-enviar": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:200
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
					
				"form-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form-factura_proveedor": {
					maxlength:20
					,regexpStringMethod:true
				},
					
					
				"form-pagos": {
					required:true,
					number:true
				},
					
				"form-id_asiento": {
					digits:true
				
				},
					
				"form-id_documento_cuenta_pagar": {
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
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
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
					"form-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-factura_proveedor": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_orden_compra-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_orden_compra-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_orden_compra-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_orden_compra-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_orden_compra-cotizacion": {
					required:true,
					number:true
				},
					
				"form_orden_compra-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
					
				"form_orden_compra-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra-direccion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_orden_compra-enviar": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_orden_compra-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_orden_compra-sub_total": {
					required:true,
					number:true
				},
					
				"form_orden_compra-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-iva_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-total": {
					required:true,
					number:true
				},
					
				"form_orden_compra-otro_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra-factura_proveedor": {
					maxlength:20
					,regexpStringMethod:true
				},
					
					
				"form_orden_compra-pagos": {
					required:true,
					number:true
				},
					
				"form_orden_compra-id_asiento": {
					digits:true
				
				},
					
				"form_orden_compra-id_documento_cuenta_pagar": {
					digits:true
				
				},
					
				"form_orden_compra-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form_orden_compra-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_orden_compra-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_orden_compra-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_orden_compra-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-factura_proveedor": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_orden_compra-pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_documento_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoorden_compra").validate(arrRules);
		
		if(orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesorden_compra").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			orden_compraFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"orden_compra");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtcotizacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoorden_compra.chbimpuesto_en_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtenviar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_ica_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_ica_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtfactura_proveedor,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoorden_compra.chbrecibida,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtpagos,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtcotizacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoorden_compra.chbimpuesto_en_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtenviar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_ica_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtretencion_ica_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtfactura_proveedor,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoorden_compra.chbrecibida,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra.txtpagos,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,orden_compra_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,orden_compra_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"orden_compra");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(orden_compra_constante1.STR_RELATIVE_PATH,"orden_compra");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"orden_compra");
		
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(orden_compra_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(orden_compra_constante1,"orden_compra");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(orden_compra_constante1,"orden_compra");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"orden_compra");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(orden_compra_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(orden_compra_constante1,"orden_compra");
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
			else if(strValueTipoColumna==" Usuario") {
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
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Impuesto En Precio") {
				jQuery(".col_impuesto_en_precio").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Enviar") {
				jQuery(".col_enviar").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Factura Proveedor") {
				jQuery(".col_factura_proveedor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Recibida") {
				jQuery(".col_recibida").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pagos") {
				jQuery(".col_pagos").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Docuemento Cuenta por Pagar") {
				jQuery(".col_id_documento_cuenta_pagar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_cuenta_pagar_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_cuenta_pagar_img_busqueda').trigger("click" );
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,orden_compra_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="orden_compra_detalle" || strValueTipoRelacion=="Compras Detalle") {
			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_pagar" || strValueTipoRelacion=="Cuenta Pagar") {
			orden_compra_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		}
	}
	
	
	
}

var orden_compra_funcion1=new orden_compra_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {orden_compra_funcion,orden_compra_funcion1};

//Para ser llamado desde window.opener
window.orden_compra_funcion1 = orden_compra_funcion1;



//</script>
