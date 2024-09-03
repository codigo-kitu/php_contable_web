//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_cuenta_pagar_constante,parametro_cuenta_pagar_constante1} from '../util/parametro_cuenta_pagar_constante.js';


class parametro_cuenta_pagar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_cuenta_pagar_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_cuenta_pagar");		
		super.procesarInicioProceso(parametro_cuenta_pagar_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_cuenta_pagar");		
		super.procesarInicioProceso(parametro_cuenta_pagar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_cuenta_pagar_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_cuenta_pagar_constante1.STR_ES_RELACIONES,parametro_cuenta_pagar_constante1.STR_ES_RELACIONADO,parametro_cuenta_pagar_constante1.STR_RELATIVE_PATH,"parametro_cuenta_pagar");		
		
		if(super.esPaginaForm(parametro_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_cuenta_pagar_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_cuenta_pagar");		
		super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar");
				
		if(super.esPaginaForm(parametro_cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_cuenta_pagarid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_cuenta_pagar);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_debito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_pago);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_cuenta_pagar.chbmostrar_anulado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_proveedor);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_cuenta_pagar.chbcon_proveedor_inactivo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_cuenta_pagar.txtNumeroRegistrosparametro_cuenta_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_cuenta_pagars',strNumeroRegistros,document.frmParamsBuscarparametro_cuenta_pagar.txtNumeroRegistrosparametro_cuenta_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_cuenta_pagar_constante1) {
		
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
		
		
		if(parametro_cuenta_pagar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_cuenta_pagar": {
					required:true,
					digits:true
				},
					
				"form-numero_credito": {
					required:true,
					digits:true
				},
					
				"form-numero_debito": {
					required:true,
					digits:true
				},
					
				"form-numero_pago": {
					required:true,
					digits:true
				},
					
					
				"form-numero_proveedor": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-numero_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_cuenta_pagar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_cuenta_pagar-numero_cuenta_pagar": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuenta_pagar-numero_credito": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuenta_pagar-numero_debito": {
					required:true,
					digits:true
				},
					
				"form_parametro_cuenta_pagar-numero_pago": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_cuenta_pagar-numero_proveedor": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_parametro_cuenta_pagar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuenta_pagar-numero_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuenta_pagar-numero_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuenta_pagar-numero_debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_cuenta_pagar-numero_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_cuenta_pagar-numero_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(parametro_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_cuenta_pagar").validate(arrRules);
		
		if(parametro_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_cuenta_pagar").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_cuenta_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_cuenta_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_cuenta_pagar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_debito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_pago,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_cuenta_pagar.chbmostrar_anulado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_proveedor,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_cuenta_pagar.chbcon_proveedor_inactivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_cuenta_pagar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_debito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_pago,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_cuenta_pagar.chbmostrar_anulado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_cuenta_pagar.txtnumero_proveedor,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_cuenta_pagar.chbcon_proveedor_inactivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_cuenta_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_cuenta_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_cuenta_pagar"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_cuenta_pagar_constante1.STR_RELATIVE_PATH,"parametro_cuenta_pagar"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_cuenta_pagar");
	
		super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_cuenta_pagar_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_cuenta_pagar"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_cuenta_pagar_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_cuenta_pagar_constante1,"parametro_cuenta_pagar");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_cuenta_pagar_webcontrol1) {
	
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

var parametro_cuenta_pagar_funcion1=new parametro_cuenta_pagar_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_cuenta_pagar_funcion,parametro_cuenta_pagar_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_cuenta_pagar_funcion1 = parametro_cuenta_pagar_funcion1;



//</script>
