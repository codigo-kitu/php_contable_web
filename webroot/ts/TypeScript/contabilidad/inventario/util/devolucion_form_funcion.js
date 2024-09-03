//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_constante,devolucion_constante1} from '../util/devolucion_constante.js';

class devolucion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(devolucion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion");
		
		super.procesarInicioProceso(devolucion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion");
		
		super.procesarInicioProceso(devolucion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(devolucion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(devolucion_constante1.STR_ES_RELACIONES,devolucion_constante1.STR_ES_RELACIONADO,devolucion_constante1.STR_RELATIVE_PATH,"devolucion");		
		
		if(super.esPaginaForm(devolucion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(devolucion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion");
		
		super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
				
		if(super.esPaginaForm(devolucion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.hdnIdActual);
		jQuery('cmbdevolucionid_empresa').val("");
		jQuery('cmbdevolucionid_sucursal').val("");
		jQuery('cmbdevolucionid_ejercicio').val("");
		jQuery('cmbdevolucionid_periodo').val("");
		jQuery('cmbdevolucionid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtnumero);
		jQuery('cmbdevolucionid_proveedor').val("");
		jQuery('cmbdevolucionid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtruc);
		jQuery('dtdevolucionfecha_emision').val(new Date());
		jQuery('cmbdevolucionid_termino_pago_proveedor').val("");
		jQuery('dtdevolucionfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtcotizacion);
		jQuery('cmbdevolucionid_moneda').val("");
		jQuery('cmbdevolucionid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtenvia);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientodevolucion.chbimpuesto_en_precio,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtotro_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtfactura_proveedor);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion.txtpago);
		jQuery('cmbdevolucionid_asiento').val("");
		jQuery('cmbdevolucionid_documento_cuenta_pagar').val("");
		jQuery('cmbdevolucionid_kardex').val("");	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardevolucion.txtNumeroRegistrosdevolucion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'devoluciones',strNumeroRegistros,document.frmParamsBuscardevolucion.txtNumeroRegistrosdevolucion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(devolucion_constante1) {
		
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
		
		
		if(devolucion_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_vendedor": {
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
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-envia": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:100
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
					
				"form-factura_proveedor": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-pago": {
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
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-envia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-factura_proveedor": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_devolucion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_devolucion-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_devolucion-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_devolucion-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_devolucion-cotizacion": {
					required:true,
					number:true
				},
					
				"form_devolucion-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_devolucion-envia": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_devolucion-observacion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
					
				"form_devolucion-sub_total": {
					required:true,
					number:true
				},
					
				"form_devolucion-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion-iva_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion-total": {
					required:true,
					number:true
				},
					
				"form_devolucion-otro_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion-factura_proveedor": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_devolucion-pago": {
					required:true,
					number:true
				},
					
				"form_devolucion-id_asiento": {
					digits:true
				
				},
					
				"form_devolucion-id_documento_cuenta_pagar": {
					digits:true
				
				},
					
				"form_devolucion-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form_devolucion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_devolucion-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_devolucion-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion-envia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_devolucion-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-factura_proveedor": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion-pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_documento_cuenta_pagar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodevolucion").validate(arrRules);
		
		if(devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdevolucion").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			devolucionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"devolucion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtenvia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientodevolucion.chbimpuesto_en_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtfactura_proveedor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtpago,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtenvia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientodevolucion.chbimpuesto_en_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtfactura_proveedor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion.txtpago,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,devolucion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,devolucion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"devolucion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(devolucion_constante1.STR_RELATIVE_PATH,"devolucion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion");
		
		super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(devolucion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(devolucion_constante1,"devolucion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(devolucion_constante1,"devolucion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"devolucion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(devolucion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(devolucion_constante1,"devolucion");
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
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Envia") {
				jQuery(".col_envia").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Factura Proveedor") {
				jQuery(".col_factura_proveedor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pago") {
				jQuery(".col_pago").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Docs Cp") {
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,devolucion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="devolucion_detalle" || strValueTipoRelacion=="Devolucion Detalle") {
			devolucion_webcontrol1.registrarSesionParadevolucion_detalles(idActual);
		}
	}
	
	
	
}

var devolucion_funcion1=new devolucion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {devolucion_funcion,devolucion_funcion1};

//Para ser llamado desde window.opener
window.devolucion_funcion1 = devolucion_funcion1;



//</script>
