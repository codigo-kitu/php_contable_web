//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estimado_constante,estimado_constante1} from '../util/estimado_constante.js';

class estimado_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(estimado_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(estimado_constante1,"estimado");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"estimado");
		
		super.procesarInicioProceso(estimado_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(estimado_constante1,"estimado");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"estimado");
		
		super.procesarInicioProceso(estimado_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(estimado_constante1,"estimado");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(estimado_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(estimado_constante1.STR_ES_RELACIONES,estimado_constante1.STR_ES_RELACIONADO,estimado_constante1.STR_RELATIVE_PATH,"estimado");		
		
		if(super.esPaginaForm(estimado_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(estimado_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"estimado");
		
		super.procesarFinalizacionProceso(estimado_constante1,"estimado");
				
		if(super.esPaginaForm(estimado_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.hdnIdActual);
		jQuery('cmbestimadoid_empresa').val("");
		jQuery('cmbestimadoid_sucursal').val("");
		jQuery('cmbestimadoid_ejercicio').val("");
		jQuery('cmbestimadoid_periodo').val("");
		jQuery('cmbestimadoid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtnumero);
		jQuery('cmbestimadoid_cliente').val("");
		jQuery('cmbestimadoid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtreferencia_cliente);
		jQuery('dtestimadofecha_emision').val(new Date());
		jQuery('cmbestimadoid_vendedor').val("");
		jQuery('cmbestimadoid_termino_pago_cliente').val("");
		jQuery('dtestimadofecha_vence').val(new Date());
		jQuery('cmbestimadoid_moneda').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtcotizacion);
		jQuery('cmbestimadoid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtenviar_a);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtobservacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoestimado.chbimpuesto_en_precio,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoestimado.chbgenero_factura,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtotro_porciento);
		jQuery('dtestimadohora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_ica_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimado.txtretencion_ica_porciento);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarestimado.txtNumeroRegistrosestimado,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'estimados',strNumeroRegistros,document.frmParamsBuscarestimado.txtNumeroRegistrosestimado);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(estimado_constante1) {
		
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
		
		
		if(estimado_constante1.STR_SUFIJO=="") {
			
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
					digits:true
				
				},
					
				"form-id_proveedor": {
					digits:true
				
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
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
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
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia_cliente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
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
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(estimado_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_estimado-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_estimado-id_cliente": {
					digits:true
				
				},
					
				"form_estimado-id_proveedor": {
					digits:true
				
				},
					
				"form_estimado-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_estimado-referencia_cliente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_estimado-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_estimado-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_estimado-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-cotizacion": {
					required:true,
					number:true
				},
					
				"form_estimado-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_estimado-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_estimado-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_estimado-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
				"form_estimado-sub_total": {
					required:true,
					number:true
				},
					
				"form_estimado-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_estimado-iva_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_estimado-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_estimado-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_estimado-total": {
					required:true,
					number:true
				},
					
				"form_estimado-otro_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_estimado-hora": {
					required:true,
					date:true
				},
					
				"form_estimado-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_estimado-retencion_ica_porciento": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_estimado-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimado-id_cliente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_proveedor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimado-referencia_cliente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimado-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimado-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimado-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimado-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimado-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimado-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					"form_estimado-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimado-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimado-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(estimado_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoestimado").validate(arrRules);
		
		if(estimado_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesestimado").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			estimadoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"estimado");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtreferencia_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtenviar_a,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtobservacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoestimado.chbimpuesto_en_precio,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoestimado.chbgenero_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_ica_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_ica_porciento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtreferencia_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtenviar_a,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtobservacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoestimado.chbimpuesto_en_precio,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoestimado.chbgenero_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_ica_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimado.txtretencion_ica_porciento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,estimado_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,estimado_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"estimado");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(estimado_constante1.STR_RELATIVE_PATH,"estimado");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"estimado");
		
		super.procesarFinalizacionProceso(estimado_constante1,"estimado");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(estimado_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(estimado_constante1,"estimado");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(estimado_constante1,"estimado");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"estimado");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(estimado_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(estimado_constante1,"estimado");
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
			else if(strValueTipoColumna=="Ref. Cliente") {
				jQuery(".col_referencia_cliente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="F. Emision") {
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
			else if(strValueTipoColumna=="Pago") {
				jQuery(".col_id_termino_pago_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="F. Vence") {
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
			else if(strValueTipoColumna=="Observaciones") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto en Precio") {
				jQuery(".col_iva_en_precio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Genero Factura") {
				jQuery(".col_genero_factura").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Miscel %") {
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
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,estimado_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="estimado_detalle" || strValueTipoRelacion=="Estimado Detalle") {
			estimado_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		}
		else if(strValueTipoRelacion=="imagen_estimado" || strValueTipoRelacion=="Imagenes Estimado") {
			estimado_webcontrol1.registrarSesionParaimagen_estimados(idActual);
		}
	}
	
	
	
}

var estimado_funcion1=new estimado_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {estimado_funcion,estimado_funcion1};

//Para ser llamado desde window.opener
window.estimado_funcion1 = estimado_funcion1;



//</script>
