//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {debito_cuenta_pagar_constante,debito_cuenta_pagar_constante1} from '../util/debito_cuenta_pagar_constante.js';


class debito_cuenta_pagar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(debito_cuenta_pagar_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"debito_cuenta_pagar");		
		super.procesarInicioProceso(debito_cuenta_pagar_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"debito_cuenta_pagar");		
		super.procesarInicioProceso(debito_cuenta_pagar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(debito_cuenta_pagar_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(debito_cuenta_pagar_constante1.STR_ES_RELACIONES,debito_cuenta_pagar_constante1.STR_ES_RELACIONADO,debito_cuenta_pagar_constante1.STR_RELATIVE_PATH,"debito_cuenta_pagar");		
		
		if(super.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(debito_cuenta_pagar_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"debito_cuenta_pagar");		
		super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar");
				
		if(super.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbdebito_cuenta_pagarid_empresa').val("");
		jQuery('cmbdebito_cuenta_pagarid_sucursal').val("");
		jQuery('cmbdebito_cuenta_pagarid_ejercicio').val("");
		jQuery('cmbdebito_cuenta_pagarid_periodo').val("");
		jQuery('cmbdebito_cuenta_pagarid_usuario').val("");
		jQuery('cmbdebito_cuenta_pagarid_cuenta_pagar').val("");
		jQuery('cmbdebito_cuenta_pagarid_forma_pago_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtnumero);
		jQuery('dtdebito_cuenta_pagarfecha_emision').val(new Date());
		jQuery('dtdebito_cuenta_pagarfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtabono);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtdescripcion);
		jQuery('cmbdebito_cuenta_pagarid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtreferencia);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientodebito_cuenta_pagar.txtcredito);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardebito_cuenta_pagar.txtNumeroRegistrosdebito_cuenta_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'debito_cuenta_pagars',strNumeroRegistros,document.frmParamsBuscardebito_cuenta_pagar.txtNumeroRegistrosdebito_cuenta_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(debito_cuenta_pagar_constante1) {
		
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
		
		
		if(debito_cuenta_pagar_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_cuenta_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_forma_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-abono": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
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
					
				"form-referencia": {
					maxlength:25
					,regexpStringMethod:true
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
					"form-id_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_forma_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-abono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(debito_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_debito_cuenta_pagar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_cuenta_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-id_forma_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_debito_cuenta_pagar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_debito_cuenta_pagar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_debito_cuenta_pagar-abono": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_pagar-saldo": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_pagar-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_debito_cuenta_pagar-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_debito_cuenta_pagar-referencia": {
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_debito_cuenta_pagar-debito": {
					required:true,
					number:true
				},
					
				"form_debito_cuenta_pagar-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_debito_cuenta_pagar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-id_forma_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_debito_cuenta_pagar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_debito_cuenta_pagar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_debito_cuenta_pagar-abono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_pagar-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_pagar-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_debito_cuenta_pagar-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_debito_cuenta_pagar-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_debito_cuenta_pagar-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_debito_cuenta_pagar-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(debito_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientodebito_cuenta_pagar").validate(arrRules);
		
		if(debito_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdebito_cuenta_pagar").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			debito_cuenta_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"debito_cuenta_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtabono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtreferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtabono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtreferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodebito_cuenta_pagar.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,debito_cuenta_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,debito_cuenta_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"debito_cuenta_pagar"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(debito_cuenta_pagar_constante1.STR_RELATIVE_PATH,"debito_cuenta_pagar"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"debito_cuenta_pagar");
	
		super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(debito_cuenta_pagar_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(debito_cuenta_pagar_constante1,"debito_cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(debito_cuenta_pagar_constante1,"debito_cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"debito_cuenta_pagar"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(debito_cuenta_pagar_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(debito_cuenta_pagar_constante1,"debito_cuenta_pagar");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,debito_cuenta_pagar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
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

var debito_cuenta_pagar_funcion1=new debito_cuenta_pagar_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {debito_cuenta_pagar_funcion,debito_cuenta_pagar_funcion1};

/*Para ser llamado desde window.opener*/
window.debito_cuenta_pagar_funcion1 = debito_cuenta_pagar_funcion1;



//</script>
