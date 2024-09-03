//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {auditoria_detalle_constante,auditoria_detalle_constante1} from '../util/auditoria_detalle_constante.js';


class auditoria_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(auditoria_detalle_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"auditoria_detalle");		
		super.procesarInicioProceso(auditoria_detalle_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"auditoria_detalle");		
		super.procesarInicioProceso(auditoria_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(auditoria_detalle_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(auditoria_detalle_constante1.STR_ES_RELACIONES,auditoria_detalle_constante1.STR_ES_RELACIONADO,auditoria_detalle_constante1.STR_RELATIVE_PATH,"auditoria_detalle");		
		
		if(super.esPaginaForm(auditoria_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(auditoria_detalle_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"auditoria_detalle");		
		super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle");
				
		if(super.esPaginaForm(auditoria_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria_detalle.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbauditoria_detalleid_auditoria').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria_detalle.txtnombre_campo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria_detalle.txtvalor_anterior);
		funcionGeneral.setEmptyControl(document.frmMantenimientoauditoria_detalle.txtvalor_actual);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarauditoria_detalle.txtNumeroRegistrosauditoria_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'auditoria_detalles',strNumeroRegistros,document.frmParamsBuscarauditoria_detalle.txtNumeroRegistrosauditoria_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(auditoria_detalle_constante1) {
		
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
		
		
		if(auditoria_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_auditoria": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_campo": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-valor_anterior": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-valor_actual": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_auditoria": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_campo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_anterior": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_actual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(auditoria_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_auditoria_detalle-id_auditoria": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_auditoria_detalle-nombre_campo": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_auditoria_detalle-valor_anterior": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_auditoria_detalle-valor_actual": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_auditoria_detalle-id_auditoria": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_auditoria_detalle-nombre_campo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria_detalle-valor_anterior": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_auditoria_detalle-valor_actual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(auditoria_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoauditoria_detalle").validate(arrRules);
		
		if(auditoria_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesauditoria_detalle").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			auditoria_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"auditoria_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtnombre_campo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtvalor_anterior,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtvalor_actual,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtnombre_campo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtvalor_anterior,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoauditoria_detalle.txtvalor_actual,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,auditoria_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,auditoria_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"auditoria_detalle"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(auditoria_detalle_constante1.STR_RELATIVE_PATH,"auditoria_detalle"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"auditoria_detalle");
	
		super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(auditoria_detalle_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(auditoria_detalle_constante1,"auditoria_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(auditoria_detalle_constante1,"auditoria_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"auditoria_detalle"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(auditoria_detalle_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(auditoria_detalle_constante1,"auditoria_detalle");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,auditoria_detalle_webcontrol1) {
	
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

var auditoria_detalle_funcion1=new auditoria_detalle_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {auditoria_detalle_funcion,auditoria_detalle_funcion1};

/*Para ser llamado desde window.opener*/
window.auditoria_detalle_funcion1 = auditoria_detalle_funcion1;



//</script>
