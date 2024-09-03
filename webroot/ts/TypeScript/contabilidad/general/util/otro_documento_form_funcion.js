//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_documento_constante,otro_documento_constante1} from '../util/otro_documento_constante.js';

class otro_documento_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(otro_documento_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_documento");
		
		super.procesarInicioProceso(otro_documento_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_documento");
		
		super.procesarInicioProceso(otro_documento_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(otro_documento_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(otro_documento_constante1.STR_ES_RELACIONES,otro_documento_constante1.STR_ES_RELACIONADO,otro_documento_constante1.STR_RELATIVE_PATH,"otro_documento");		
		
		if(super.esPaginaForm(otro_documento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(otro_documento_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_documento");
		
		super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
				
		if(super.esPaginaForm(otro_documento_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.hdnIdActual);
		jQuery('cmbotro_documentoid_archivo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.txtdata);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_documento.txtcampo3);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarotro_documento.txtNumeroRegistrosotro_documento,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'otro_documentoes',strNumeroRegistros,document.frmParamsBuscarotro_documento.txtNumeroRegistrosotro_documento);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(otro_documento_constante1) {
		
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
		
		
		if(otro_documento_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_archivo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-data": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-campo1": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-campo2": {
					required:true,
					number:true
				},
					
				"form-campo3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_archivo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-data": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(otro_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_otro_documento-id_archivo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_otro_documento-nombre": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_otro_documento-data": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_otro_documento-campo1": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_otro_documento-campo2": {
					required:true,
					number:true
				},
					
				"form_otro_documento-campo3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_otro_documento-id_archivo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_otro_documento-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_documento-data": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_documento-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_documento-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_otro_documento-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(otro_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientootro_documento").validate(arrRules);
		
		if(otro_documento_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesotro_documento").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			otro_documentoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"otro_documento");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtdata,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo3,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtdata,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_documento.txtcampo3,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,otro_documento_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,otro_documento_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"otro_documento");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(otro_documento_constante1.STR_RELATIVE_PATH,"otro_documento");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_documento");
		
		super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(otro_documento_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(otro_documento_constante1,"otro_documento");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(otro_documento_constante1,"otro_documento");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"otro_documento");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(otro_documento_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(otro_documento_constante1,"otro_documento");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,otro_documento_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var otro_documento_funcion1=new otro_documento_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {otro_documento_funcion,otro_documento_funcion1};

//Para ser llamado desde window.opener
window.otro_documento_funcion1 = otro_documento_funcion1;



//</script>
