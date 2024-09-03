//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_tecla_mascara_constante,tipo_tecla_mascara_constante1} from '../util/tipo_tecla_mascara_constante.js';

class tipo_tecla_mascara_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_tecla_mascara");
		
		super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"tipo_tecla_mascara");
		
		super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(tipo_tecla_mascara_constante1.STR_ES_RELACIONES,tipo_tecla_mascara_constante1.STR_ES_RELACIONADO,tipo_tecla_mascara_constante1.STR_RELATIVE_PATH,"tipo_tecla_mascara");		
		
		if(super.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_tecla_mascara");
		
		super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
				
		if(super.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_tecla_mascara.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_tecla_mascara.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_tecla_mascara.txtnombre);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartipo_tecla_mascara.txtNumeroRegistrostipo_tecla_mascara,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'tipo_tecla_mascaras',strNumeroRegistros,document.frmParamsBuscartipo_tecla_mascara.txtNumeroRegistrostipo_tecla_mascara);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(tipo_tecla_mascara_constante1) {
		
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
		
		
		if(tipo_tecla_mascara_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(tipo_tecla_mascara_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_tipo_tecla_mascara-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_tipo_tecla_mascara-nombre": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_tipo_tecla_mascara-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_tipo_tecla_mascara-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(tipo_tecla_mascara_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotipo_tecla_mascara").validate(arrRules);
		
		if(tipo_tecla_mascara_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestipo_tecla_mascara").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			tipo_tecla_mascaraFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"tipo_tecla_mascara");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_tecla_mascara.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_tecla_mascara.txtnombre,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_tecla_mascara.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_tecla_mascara.txtnombre,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,tipo_tecla_mascara_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,tipo_tecla_mascara_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"tipo_tecla_mascara");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(tipo_tecla_mascara_constante1.STR_RELATIVE_PATH,"tipo_tecla_mascara");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"tipo_tecla_mascara");
		
		super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(tipo_tecla_mascara_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_tecla_mascara");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(tipo_tecla_mascara_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(tipo_tecla_mascara_constante1,"tipo_tecla_mascara");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_tecla_mascara_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var tipo_tecla_mascara_funcion1=new tipo_tecla_mascara_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {tipo_tecla_mascara_funcion,tipo_tecla_mascara_funcion1};

//Para ser llamado desde window.opener
window.tipo_tecla_mascara_funcion1 = tipo_tecla_mascara_funcion1;



//</script>
