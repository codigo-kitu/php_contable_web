//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_consignacion_constante,imagen_consignacion_constante1} from '../util/imagen_consignacion_constante.js';

class imagen_consignacion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_consignacion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_consignacion");
		
		super.procesarInicioProceso(imagen_consignacion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_consignacion");
		
		super.procesarInicioProceso(imagen_consignacion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_consignacion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_consignacion_constante1.STR_ES_RELACIONES,imagen_consignacion_constante1.STR_ES_RELACIONADO,imagen_consignacion_constante1.STR_RELATIVE_PATH,"imagen_consignacion");		
		
		if(super.esPaginaForm(imagen_consignacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_consignacion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_consignacion");
		
		super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
				
		if(super.esPaginaForm(imagen_consignacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_consignacion.hdnIdActual);
		jQuery('cmbimagen_consignacionid_consignacion').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_consignacion.txtimagen);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_consignacion.txtNumeroRegistrosimagen_consignacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_consignaciones',strNumeroRegistros,document.frmParamsBuscarimagen_consignacion.txtNumeroRegistrosimagen_consignacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_consignacion_constante1) {
		
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
		
		
		if(imagen_consignacion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_consignacion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_imagen_consignacion-id_consignacion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_imagen_consignacion-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_consignacion-id_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_imagen_consignacion-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_consignacion").validate(arrRules);
		
		if(imagen_consignacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_consignacion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_consignacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_consignacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_consignacion.txtimagen,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_consignacion.txtimagen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_consignacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_consignacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_consignacion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_consignacion_constante1.STR_RELATIVE_PATH,"imagen_consignacion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_consignacion");
		
		super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_consignacion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_consignacion_constante1,"imagen_consignacion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_consignacion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_consignacion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_consignacion_constante1,"imagen_consignacion");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_consignacion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_consignacion_funcion1=new imagen_consignacion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {imagen_consignacion_funcion,imagen_consignacion_funcion1};

//Para ser llamado desde window.opener
window.imagen_consignacion_funcion1 = imagen_consignacion_funcion1;



//</script>
