//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {reporte_monica_constante,reporte_monica_constante1} from '../util/reporte_monica_constante.js';


class reporte_monica_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(reporte_monica_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"reporte_monica");		
		super.procesarInicioProceso(reporte_monica_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"reporte_monica");		
		super.procesarInicioProceso(reporte_monica_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(reporte_monica_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(reporte_monica_constante1.STR_ES_RELACIONES,reporte_monica_constante1.STR_ES_RELACIONADO,reporte_monica_constante1.STR_RELATIVE_PATH,"reporte_monica");		
		
		if(super.esPaginaForm(reporte_monica_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(reporte_monica_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"reporte_monica");		
		super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica");
				
		if(super.esPaginaForm(reporte_monica_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.txtestado);
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.txtmodulo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoreporte_monica.txtsub_modulo);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarreporte_monica.txtNumeroRegistrosreporte_monica,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'reporte_monicas',strNumeroRegistros,document.frmParamsBuscarreporte_monica.txtNumeroRegistrosreporte_monica);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(reporte_monica_constante1) {
		
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
		
		
		if(reporte_monica_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-estado": {
					required:true,
					digits:true
				},
					
				"form-modulo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-sub_modulo": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(reporte_monica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_reporte_monica-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_reporte_monica-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_reporte_monica-estado": {
					required:true,
					digits:true
				},
					
				"form_reporte_monica-modulo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_reporte_monica-sub_modulo": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_reporte_monica-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_reporte_monica-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_reporte_monica-estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_reporte_monica-modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_reporte_monica-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(reporte_monica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoreporte_monica").validate(arrRules);
		
		if(reporte_monica_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesreporte_monica").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			reporte_monicaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"reporte_monica");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtestado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtmodulo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtsub_modulo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtestado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtmodulo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoreporte_monica.txtsub_modulo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,reporte_monica_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,reporte_monica_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"reporte_monica"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(reporte_monica_constante1.STR_RELATIVE_PATH,"reporte_monica"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"reporte_monica");
	
		super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(reporte_monica_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(reporte_monica_constante1,"reporte_monica"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(reporte_monica_constante1,"reporte_monica"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"reporte_monica"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(reporte_monica_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(reporte_monica_constante1,"reporte_monica");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,reporte_monica_webcontrol1) {
	
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

var reporte_monica_funcion1=new reporte_monica_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {reporte_monica_funcion,reporte_monica_funcion1};

/*Para ser llamado desde window.opener*/
window.reporte_monica_funcion1 = reporte_monica_funcion1;



//</script>
