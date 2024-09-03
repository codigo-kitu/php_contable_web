//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {periodo_constante,periodo_constante1} from '../util/periodo_constante.js';


class periodo_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(periodo_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(periodo_constante1,"periodo");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"periodo");		
		super.procesarInicioProceso(periodo_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(periodo_constante1,"periodo"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"periodo");		
		super.procesarInicioProceso(periodo_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(periodo_constante1,"periodo"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(periodo_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(periodo_constante1.STR_ES_RELACIONES,periodo_constante1.STR_ES_RELACIONADO,periodo_constante1.STR_RELATIVE_PATH,"periodo");		
		
		if(super.esPaginaForm(periodo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(periodo_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"periodo");		
		super.procesarFinalizacionProceso(periodo_constante1,"periodo");
				
		if(super.esPaginaForm(periodo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoperiodo.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoperiodo.txtnombre);
		jQuery('dtperiodofecha_inicio').val(new Date());
		jQuery('dtperiodofecha_fin').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoperiodo.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientoperiodo.chbactivo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarperiodo.txtNumeroRegistrosperiodo,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'periodos',strNumeroRegistros,document.frmParamsBuscarperiodo.txtNumeroRegistrosperiodo);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(periodo_constante1) {
		
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
		
		
		if(periodo_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-fecha_inicio": {
					required:true,
					date:true
				},
					
				"form-fecha_fin": {
					required:true,
					date:true
				},
					
				"form-descripcion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_inicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_fin": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(periodo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_periodo-nombre": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_periodo-fecha_inicio": {
					required:true,
					date:true
				},
					
				"form_periodo-fecha_fin": {
					required:true,
					date:true
				},
					
				"form_periodo-descripcion": {
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_periodo-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_periodo-fecha_inicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_periodo-fecha_fin": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_periodo-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(periodo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoperiodo").validate(arrRules);
		
		if(periodo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesperiodo").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_inicio").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_fin").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			periodoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"periodo");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoperiodo.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoperiodo.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperiodo.chbactivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoperiodo.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoperiodo.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperiodo.chbactivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,periodo_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,periodo_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"periodo"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(periodo_constante1.STR_RELATIVE_PATH,"periodo"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"periodo");
	
		super.procesarFinalizacionProceso(periodo_constante1,"periodo");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(periodo_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(periodo_constante1,"periodo"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(periodo_constante1,"periodo"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"periodo"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(periodo_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(periodo_constante1,"periodo");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,periodo_webcontrol1) {
	
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

var periodo_funcion1=new periodo_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {periodo_funcion,periodo_funcion1};

/*Para ser llamado desde window.opener*/
window.periodo_funcion1 = periodo_funcion1;



//</script>
