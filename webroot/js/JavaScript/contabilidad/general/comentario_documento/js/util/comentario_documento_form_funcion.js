//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {comentario_documento_constante,comentario_documento_constante1} from '../util/comentario_documento_constante.js';


class comentario_documento_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(comentario_documento_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"comentario_documento");		
		super.procesarInicioProceso(comentario_documento_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"comentario_documento");		
		super.procesarInicioProceso(comentario_documento_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(comentario_documento_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(comentario_documento_constante1.STR_ES_RELACIONES,comentario_documento_constante1.STR_ES_RELACIONADO,comentario_documento_constante1.STR_RELATIVE_PATH,"comentario_documento");		
		
		if(super.esPaginaForm(comentario_documento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(comentario_documento_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"comentario_documento");		
		super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento");
				
		if(super.esPaginaForm(comentario_documento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocomentario_documento.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocomentario_documento.txttipo_documento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocomentario_documento.txtcomentario);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcomentario_documento.txtNumeroRegistroscomentario_documento,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'comentario_documentos',strNumeroRegistros,document.frmParamsBuscarcomentario_documento.txtNumeroRegistroscomentario_documento);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(comentario_documento_constante1) {
		
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
		
		
		if(comentario_documento_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-tipo_documento": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-tipo_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(comentario_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_comentario_documento-tipo_documento": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_comentario_documento-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_comentario_documento-tipo_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_comentario_documento-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(comentario_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocomentario_documento").validate(arrRules);
		
		if(comentario_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescomentario_documento").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			comentario_documentoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"comentario_documento");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocomentario_documento.txttipo_documento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocomentario_documento.txtcomentario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocomentario_documento.txttipo_documento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocomentario_documento.txtcomentario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,comentario_documento_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,comentario_documento_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"comentario_documento"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(comentario_documento_constante1.STR_RELATIVE_PATH,"comentario_documento"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"comentario_documento");
	
		super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(comentario_documento_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(comentario_documento_constante1,"comentario_documento"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(comentario_documento_constante1,"comentario_documento"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"comentario_documento"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(comentario_documento_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(comentario_documento_constante1,"comentario_documento");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,comentario_documento_webcontrol1) {
	
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

var comentario_documento_funcion1=new comentario_documento_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {comentario_documento_funcion,comentario_documento_funcion1};

/*Para ser llamado desde window.opener*/
window.comentario_documento_funcion1 = comentario_documento_funcion1;



//</script>
