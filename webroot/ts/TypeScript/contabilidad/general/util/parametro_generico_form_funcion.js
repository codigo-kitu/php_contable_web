//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_generico_constante,parametro_generico_constante1} from '../util/parametro_generico_constante.js';

class parametro_generico_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(parametro_generico_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_generico");
		
		super.procesarInicioProceso(parametro_generico_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_generico");
		
		super.procesarInicioProceso(parametro_generico_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(parametro_generico_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_generico_constante1.STR_ES_RELACIONES,parametro_generico_constante1.STR_ES_RELACIONADO,parametro_generico_constante1.STR_RELATIVE_PATH,"parametro_generico");		
		
		if(super.esPaginaForm(parametro_generico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(parametro_generico_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_generico");
		
		super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
				
		if(super.esPaginaForm(parametro_generico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtparametro);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtdescripcion_pantalla);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor_caracteristica);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor2_caracteristica);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor3_caracteristica);
		jQuery('dtparametro_genericovalor_fecha').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor_numerico);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor2_numerico);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_generico.txtvalor_binario);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_generico.txtNumeroRegistrosparametro_generico,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_genericoes',strNumeroRegistros,document.frmParamsBuscarparametro_generico.txtNumeroRegistrosparametro_generico);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_generico_constante1) {
		
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
		
		
		if(parametro_generico_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-parametro": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-descripcion_pantalla": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-valor_caracteristica": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-valor2_caracteristica": {
					required:true,
					maxlength:254
					,regexpStringMethod:true
				},
					
				"form-valor3_caracteristica": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-valor_fecha": {
					required:true,
					date:true
				},
					
				"form-valor_numerico": {
					required:true,
					number:true
				},
					
				"form-valor2_numerico": {
					required:true,
					number:true
				},
					
				"form-valor_binario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-parametro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion_pantalla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor2_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor3_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-valor_fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-valor_numerico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-valor2_numerico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-valor_binario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(parametro_generico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_generico-parametro": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_parametro_generico-descripcion_pantalla": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_parametro_generico-valor_caracteristica": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_parametro_generico-valor2_caracteristica": {
					required:true,
					maxlength:254
					,regexpStringMethod:true
				},
					
				"form_parametro_generico-valor3_caracteristica": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_parametro_generico-valor_fecha": {
					required:true,
					date:true
				},
					
				"form_parametro_generico-valor_numerico": {
					required:true,
					number:true
				},
					
				"form_parametro_generico-valor2_numerico": {
					required:true,
					number:true
				},
					
				"form_parametro_generico-valor_binario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_parametro_generico-parametro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_generico-descripcion_pantalla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_generico-valor_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_generico-valor2_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_generico-valor3_caracteristica": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_generico-valor_fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_parametro_generico-valor_numerico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_parametro_generico-valor2_numerico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_parametro_generico-valor_binario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(parametro_generico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_generico").validate(arrRules);
		
		if(parametro_generico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_generico").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-valor_fecha").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_genericoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_generico");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtparametro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtdescripcion_pantalla,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_caracteristica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor2_caracteristica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor3_caracteristica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_numerico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor2_numerico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_binario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtparametro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtdescripcion_pantalla,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_caracteristica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor2_caracteristica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor3_caracteristica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_numerico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor2_numerico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_generico.txtvalor_binario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_generico_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_generico_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_generico");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(parametro_generico_constante1.STR_RELATIVE_PATH,"parametro_generico");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_generico");
		
		super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(parametro_generico_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(parametro_generico_constante1,"parametro_generico");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(parametro_generico_constante1,"parametro_generico");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_generico");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(parametro_generico_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(parametro_generico_constante1,"parametro_generico");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_generico_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var parametro_generico_funcion1=new parametro_generico_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {parametro_generico_funcion,parametro_generico_funcion1};

//Para ser llamado desde window.opener
window.parametro_generico_funcion1 = parametro_generico_funcion1;



//</script>
