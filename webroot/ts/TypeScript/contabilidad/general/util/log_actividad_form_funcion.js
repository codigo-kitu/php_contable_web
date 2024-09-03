//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {log_actividad_constante,log_actividad_constante1} from '../util/log_actividad_constante.js';

class log_actividad_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(log_actividad_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"log_actividad");
		
		super.procesarInicioProceso(log_actividad_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"log_actividad");
		
		super.procesarInicioProceso(log_actividad_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(log_actividad_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(log_actividad_constante1.STR_ES_RELACIONES,log_actividad_constante1.STR_ES_RELACIONADO,log_actividad_constante1.STR_RELATIVE_PATH,"log_actividad");		
		
		if(super.esPaginaForm(log_actividad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(log_actividad_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"log_actividad");
		
		super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
				
		if(super.esPaginaForm(log_actividad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.txtlog_id);
		jQuery('dtlog_actividadfecha').val(new Date());
		jQuery('dtlog_actividadhora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.txtcomputador);
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.txtusuario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientolog_actividad.txtmodulo);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlog_actividad.txtNumeroRegistroslog_actividad,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'log_actividades',strNumeroRegistros,document.frmParamsBuscarlog_actividad.txtNumeroRegistroslog_actividad);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(log_actividad_constante1) {
		
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
		
		
		if(log_actividad_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-log_id": {
					required:true,
					digits:true
				},
					
				"form-fecha": {
					required:true,
					date:true
				},
					
				"form-hora": {
					required:true,
					date:true
				},
					
				"form-computador": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-usuario": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-modulo": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-log_id": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-computador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(log_actividad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_log_actividad-log_id": {
					required:true,
					digits:true
				},
					
				"form_log_actividad-fecha": {
					required:true,
					date:true
				},
					
				"form_log_actividad-hora": {
					required:true,
					date:true
				},
					
				"form_log_actividad-computador": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_log_actividad-usuario": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_log_actividad-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_log_actividad-modulo": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_log_actividad-log_id": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_log_actividad-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_log_actividad-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_log_actividad-computador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_log_actividad-usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_log_actividad-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_log_actividad-modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(log_actividad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientolog_actividad").validate(arrRules);
		
		if(log_actividad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslog_actividad").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			log_actividadFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"log_actividad");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtlog_id,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtcomputador,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtusuario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtmodulo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtlog_id,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtcomputador,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtusuario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolog_actividad.txtmodulo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,log_actividad_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,log_actividad_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"log_actividad");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(log_actividad_constante1.STR_RELATIVE_PATH,"log_actividad");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"log_actividad");
		
		super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(log_actividad_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(log_actividad_constante1,"log_actividad");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(log_actividad_constante1,"log_actividad");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"log_actividad");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(log_actividad_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(log_actividad_constante1,"log_actividad");
	}

	//------------- Formulario-Combo-Accion -------------------

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

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,log_actividad_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var log_actividad_funcion1=new log_actividad_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {log_actividad_funcion,log_actividad_funcion1};

//Para ser llamado desde window.opener
window.log_actividad_funcion1 = log_actividad_funcion1;



//</script>
