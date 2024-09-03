//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {resumen_usuario_constante,resumen_usuario_constante1} from '../util/resumen_usuario_constante.js';


class resumen_usuario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(resumen_usuario_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"resumen_usuario");		
		super.procesarInicioProceso(resumen_usuario_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"resumen_usuario");		
		super.procesarInicioProceso(resumen_usuario_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(resumen_usuario_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(resumen_usuario_constante1.STR_ES_RELACIONES,resumen_usuario_constante1.STR_ES_RELACIONADO,resumen_usuario_constante1.STR_RELATIVE_PATH,"resumen_usuario");		
		
		if(super.esPaginaForm(resumen_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(resumen_usuario_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"resumen_usuario");		
		super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario");
				
		if(super.esPaginaForm(resumen_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbresumen_usuarioid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingresos);
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_error_ingreso);
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_intentos);
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_cierres);
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_reinicios);
		funcionGeneral.setEmptyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingreso_actual);
		jQuery('dtresumen_usuariofecha_ultimo_ingreso').val(new Date());
		jQuery('dtresumen_usuariofecha_ultimo_error_ingreso').val(new Date());
		jQuery('dtresumen_usuariofecha_ultimo_intento').val(new Date());
		jQuery('dtresumen_usuariofecha_ultimo_cierre').val(new Date());	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarresumen_usuario.txtNumeroRegistrosresumen_usuario,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'resumen_usuarios',strNumeroRegistros,document.frmParamsBuscarresumen_usuario.txtNumeroRegistrosresumen_usuario);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(resumen_usuario_constante1) {
		
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
		
		
		if(resumen_usuario_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_ingresos": {
					required:true,
					digits:true
				},
					
				"form-numero_error_ingreso": {
					required:true,
					digits:true
				},
					
				"form-numero_intentos": {
					required:true,
					digits:true
				},
					
				"form-numero_cierres": {
					required:true,
					digits:true
				},
					
				"form-numero_reinicios": {
					required:true,
					digits:true
				},
					
				"form-numero_ingreso_actual": {
					required:true,
					digits:true
				},
					
				"form-fecha_ultimo_ingreso": {
					required:true,
					date:true
				},
					
				"form-fecha_ultimo_error_ingreso": {
					required:true,
					date:true
				},
					
				"form-fecha_ultimo_intento": {
					required:true,
					date:true
				},
					
				"form-fecha_ultimo_cierre": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_ingresos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_error_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_intentos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cierres": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_reinicios": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_ingreso_actual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_ultimo_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_ultimo_error_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_ultimo_intento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_ultimo_cierre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	
		
			
			if(resumen_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_resumen_usuario-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_resumen_usuario-numero_ingresos": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-numero_error_ingreso": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-numero_intentos": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-numero_cierres": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-numero_reinicios": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-numero_ingreso_actual": {
					required:true,
					digits:true
				},
					
				"form_resumen_usuario-fecha_ultimo_ingreso": {
					required:true,
					date:true
				},
					
				"form_resumen_usuario-fecha_ultimo_error_ingreso": {
					required:true,
					date:true
				},
					
				"form_resumen_usuario-fecha_ultimo_intento": {
					required:true,
					date:true
				},
					
				"form_resumen_usuario-fecha_ultimo_cierre": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form_resumen_usuario-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_ingresos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_error_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_intentos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_cierres": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_reinicios": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-numero_ingreso_actual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_resumen_usuario-fecha_ultimo_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_resumen_usuario-fecha_ultimo_error_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_resumen_usuario-fecha_ultimo_intento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_resumen_usuario-fecha_ultimo_cierre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	



			if(resumen_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoresumen_usuario").validate(arrRules);
		
		if(resumen_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesresumen_usuario").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_ultimo_ingreso").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_ultimo_error_ingreso").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_ultimo_intento").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_ultimo_cierre").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			resumen_usuarioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"resumen_usuario");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingresos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_error_ingreso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_intentos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_cierres,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_reinicios,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingreso_actual,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingresos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_error_ingreso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_intentos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_cierres,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_reinicios,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoresumen_usuario.txtnumero_ingreso_actual,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,resumen_usuario_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,resumen_usuario_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"resumen_usuario"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(resumen_usuario_constante1.STR_RELATIVE_PATH,"resumen_usuario"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"resumen_usuario");
	
		super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(resumen_usuario_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(resumen_usuario_constante1,"resumen_usuario"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(resumen_usuario_constante1,"resumen_usuario"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"resumen_usuario"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(resumen_usuario_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(resumen_usuario_constante1,"resumen_usuario");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,resumen_usuario_webcontrol1) {
	
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

var resumen_usuario_funcion1=new resumen_usuario_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {resumen_usuario_funcion,resumen_usuario_funcion1};

/*Para ser llamado desde window.opener*/
window.resumen_usuario_funcion1 = resumen_usuario_funcion1;



//</script>
