//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_sql_constante,parametro_sql_constante1} from '../util/parametro_sql_constante.js';


class parametro_sql_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_sql_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_sql");		
		super.procesarInicioProceso(parametro_sql_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_sql");		
		super.procesarInicioProceso(parametro_sql_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_sql_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_sql_constante1.STR_ES_RELACIONES,parametro_sql_constante1.STR_ES_RELACIONADO,parametro_sql_constante1.STR_RELATIVE_PATH,"parametro_sql");		
		
		if(super.esPaginaForm(parametro_sql_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_sql_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_sql");		
		super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql");
				
		if(super.esPaginaForm(parametro_sql_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.txtbinario1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.txtbinario2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.txtbinario3);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.txtbinario4);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_sql.txtbinario5);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_sql.txtNumeroRegistrosparametro_sql,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_sqles',strNumeroRegistros,document.frmParamsBuscarparametro_sql.txtNumeroRegistrosparametro_sql);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_sql_constante1) {
		
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
		
		
		if(parametro_sql_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-binario1": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-binario2": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-binario3": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-binario4": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-binario5": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-binario1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-binario2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-binario3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-binario4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-binario5": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(parametro_sql_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_sql-binario1": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_parametro_sql-binario2": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_parametro_sql-binario3": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_parametro_sql-binario4": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_parametro_sql-binario5": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_parametro_sql-binario1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_sql-binario2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_sql-binario3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_sql-binario4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_sql-binario5": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(parametro_sql_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_sql").validate(arrRules);
		
		if(parametro_sql_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_sql").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_sqlFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_sql");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario5,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_sql.txtbinario5,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_sql_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_sql_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_sql"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_sql_constante1.STR_RELATIVE_PATH,"parametro_sql"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_sql");
	
		super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_sql_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_sql_constante1,"parametro_sql"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_sql_constante1,"parametro_sql"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_sql"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_sql_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_sql_constante1,"parametro_sql");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_sql_webcontrol1) {
	
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

var parametro_sql_funcion1=new parametro_sql_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_sql_funcion,parametro_sql_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_sql_funcion1 = parametro_sql_funcion1;



//</script>
