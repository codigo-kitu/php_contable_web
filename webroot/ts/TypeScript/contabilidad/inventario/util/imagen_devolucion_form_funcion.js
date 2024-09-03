//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_devolucion_constante,imagen_devolucion_constante1} from '../util/imagen_devolucion_constante.js';

class imagen_devolucion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_devolucion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_devolucion");
		
		super.procesarInicioProceso(imagen_devolucion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_devolucion");
		
		super.procesarInicioProceso(imagen_devolucion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_devolucion_constante1.STR_ES_RELACIONES,imagen_devolucion_constante1.STR_ES_RELACIONADO,imagen_devolucion_constante1.STR_RELATIVE_PATH,"imagen_devolucion");		
		
		if(super.esPaginaForm(imagen_devolucion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion");
		
		super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
				
		if(super.esPaginaForm(imagen_devolucion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_devolucion.txtnro_devolucion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_devolucion.txtNumeroRegistrosimagen_devolucion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_devoluciones',strNumeroRegistros,document.frmParamsBuscarimagen_devolucion.txtNumeroRegistrosimagen_devolucion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_devolucion_constante1) {
		
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
		
		
		if(imagen_devolucion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nro_devolucion": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_imagen_devolucion-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_imagen_devolucion-nro_devolucion": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_devolucion-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_imagen_devolucion-nro_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_devolucion").validate(arrRules);
		
		if(imagen_devolucion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_devolucion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_devolucionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_devolucion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion.txtnro_devolucion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_devolucion.txtnro_devolucion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_devolucion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_devolucion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_devolucion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_devolucion_constante1.STR_RELATIVE_PATH,"imagen_devolucion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion");
		
		super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_devolucion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_devolucion_constante1,"imagen_devolucion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_devolucion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_devolucion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_devolucion_constante1,"imagen_devolucion");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_devolucion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_devolucion_funcion1=new imagen_devolucion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {imagen_devolucion_funcion,imagen_devolucion_funcion1};

//Para ser llamado desde window.opener
window.imagen_devolucion_funcion1 = imagen_devolucion_funcion1;



//</script>
