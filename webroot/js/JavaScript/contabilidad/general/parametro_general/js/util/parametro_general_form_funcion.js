//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_general_constante,parametro_general_constante1} from '../util/parametro_general_constante.js';


class parametro_general_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_general_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general");		
		super.procesarInicioProceso(parametro_general_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general");		
		super.procesarInicioProceso(parametro_general_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_general_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_general_constante1.STR_ES_RELACIONES,parametro_general_constante1.STR_ES_RELACIONADO,parametro_general_constante1.STR_RELATIVE_PATH,"parametro_general");		
		
		if(super.esPaginaForm(parametro_general_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_general_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general");		
		super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general");
				
		if(super.esPaginaForm(parametro_general_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_generalid_empresa').val("");
		jQuery('cmbparametro_generalid_pais').val("");
		jQuery('cmbparametro_generalid_moneda').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general.txtsimbolo_moneda);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general.txtnumero_decimales);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general.chbcon_formato_fecha_mda,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general.chbcon_formato_cantidad_coma,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general.txtiva_porciento);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_general.txtNumeroRegistrosparametro_general,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_generales',strNumeroRegistros,document.frmParamsBuscarparametro_general.txtNumeroRegistrosparametro_general);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_general_constante1) {
		
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
		
		
		if(parametro_general_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_pais": {
					digits:true
				
				},
					
				"form-id_modena": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-simbolo_moneda": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form-numero_decimales": {
					required:true,
					digits:true
				},
					
					
					
				"form-iva_porciento": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_pais": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_modena": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-simbolo_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_decimales": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(parametro_general_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_general-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general-id_pais": {
					digits:true
				
				},
					
				"form_parametro_general-id_modena": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general-simbolo_moneda": {
					required:true,
					maxlength:5
					,regexpStringMethod:true
				},
					
				"form_parametro_general-numero_decimales": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_general-iva_porciento": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_parametro_general-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general-id_pais": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general-id_modena": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general-simbolo_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general-numero_decimales": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_general-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(parametro_general_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_general").validate(arrRules);
		
		if(parametro_general_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_general").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_generalFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_general");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtsimbolo_moneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtnumero_decimales,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general.chbcon_formato_fecha_mda,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general.chbcon_formato_cantidad_coma,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtiva_porciento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtsimbolo_moneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtnumero_decimales,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general.chbcon_formato_fecha_mda,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general.chbcon_formato_cantidad_coma,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general.txtiva_porciento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_general_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_general_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_general"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_general_constante1.STR_RELATIVE_PATH,"parametro_general"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general");
	
		super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_general_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_general_constante1,"parametro_general"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_general_constante1,"parametro_general"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_general"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_general_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_general_constante1,"parametro_general");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_general_webcontrol1) {
	
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

var parametro_general_funcion1=new parametro_general_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_general_funcion,parametro_general_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_general_funcion1 = parametro_general_funcion1;



//</script>
