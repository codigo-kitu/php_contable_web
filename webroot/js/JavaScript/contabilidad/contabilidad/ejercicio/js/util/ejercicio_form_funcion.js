//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {ejercicio_constante,ejercicio_constante1} from '../util/ejercicio_constante.js';


class ejercicio_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(ejercicio_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"ejercicio");		
		super.procesarInicioProceso(ejercicio_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"ejercicio");		
		super.procesarInicioProceso(ejercicio_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(ejercicio_constante1.STR_ES_RELACIONES,ejercicio_constante1.STR_ES_RELACIONADO,ejercicio_constante1.STR_RELATIVE_PATH,"ejercicio");		
		
		if(super.esPaginaForm(ejercicio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"ejercicio");		
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio");
				
		if(super.esPaginaForm(ejercicio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoejercicio.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('dtejerciciofecha_inicio').val(new Date());
		jQuery('dtejerciciofecha_fin').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoejercicio.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientoejercicio.chbactivo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarejercicio.txtNumeroRegistrosejercicio,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'ejercicios',strNumeroRegistros,document.frmParamsBuscarejercicio.txtNumeroRegistrosejercicio);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(ejercicio_constante1) {
		
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
		
		
		if(ejercicio_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-fecha_inicio": {
					required:true,
					date:true
				},
					
				"form-fecha_fin": {
					required:true,
					date:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-fecha_inicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_fin": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(ejercicio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_ejercicio-fecha_inicio": {
					required:true,
					date:true
				},
					
				"form_ejercicio-fecha_fin": {
					required:true,
					date:true
				},
					
				"form_ejercicio-descripcion": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_ejercicio-fecha_inicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_ejercicio-fecha_fin": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_ejercicio-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(ejercicio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoejercicio").validate(arrRules);
		
		if(ejercicio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesejercicio").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_inicio").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_fin").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			ejercicioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"ejercicio");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoejercicio.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoejercicio.chbactivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoejercicio.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoejercicio.chbactivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,ejercicio_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,ejercicio_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"ejercicio"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(ejercicio_constante1.STR_RELATIVE_PATH,"ejercicio"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"ejercicio");
	
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(ejercicio_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(ejercicio_constante1,"ejercicio"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(ejercicio_constante1,"ejercicio"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"ejercicio"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(ejercicio_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(ejercicio_constante1,"ejercicio");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,ejercicio_webcontrol1) {
	
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

var ejercicio_funcion1=new ejercicio_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {ejercicio_funcion,ejercicio_funcion1};

/*Para ser llamado desde window.opener*/
window.ejercicio_funcion1 = ejercicio_funcion1;



//</script>
