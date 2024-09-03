//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {contador_auxiliar_constante,contador_auxiliar_constante1} from '../util/contador_auxiliar_constante.js';

class contador_auxiliar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(contador_auxiliar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"contador_auxiliar");
		
		super.procesarInicioProceso(contador_auxiliar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"contador_auxiliar");
		
		super.procesarInicioProceso(contador_auxiliar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(contador_auxiliar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(contador_auxiliar_constante1.STR_ES_RELACIONES,contador_auxiliar_constante1.STR_ES_RELACIONADO,contador_auxiliar_constante1.STR_RELATIVE_PATH,"contador_auxiliar");		
		
		if(super.esPaginaForm(contador_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(contador_auxiliar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"contador_auxiliar");
		
		super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
				
		if(super.esPaginaForm(contador_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocontador_auxiliar.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocontador_auxiliar.txtid_contador);
		jQuery('cmbcontador_auxiliarid_libro_auxiliar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocontador_auxiliar.txtperiodo_anual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocontador_auxiliar.txtmes);
		funcionGeneral.setEmptyControl(document.frmMantenimientocontador_auxiliar.txtcontador);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcontador_auxiliar.txtNumeroRegistroscontador_auxiliar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'contador_auxiliares',strNumeroRegistros,document.frmParamsBuscarcontador_auxiliar.txtNumeroRegistroscontador_auxiliar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(contador_auxiliar_constante1) {
		
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
		
		
		if(contador_auxiliar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_contador": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-periodo_anual": {
					required:true,
					digits:true
				},
					
				"form-mes": {
					required:true,
					digits:true
				},
					
				"form-contador": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_contador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-periodo_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-mes": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-contador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(contador_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_contador_auxiliar-id_contador": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_contador_auxiliar-id_libro_auxiliar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_contador_auxiliar-periodo_anual": {
					required:true,
					digits:true
				},
					
				"form_contador_auxiliar-mes": {
					required:true,
					digits:true
				},
					
				"form_contador_auxiliar-contador": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_contador_auxiliar-id_contador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_contador_auxiliar-id_libro_auxiliar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_contador_auxiliar-periodo_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_contador_auxiliar-mes": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_contador_auxiliar-contador": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(contador_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocontador_auxiliar").validate(arrRules);
		
		if(contador_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescontador_auxiliar").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			contador_auxiliarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"contador_auxiliar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtid_contador,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtperiodo_anual,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtmes,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtcontador,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtid_contador,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtperiodo_anual,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtmes,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocontador_auxiliar.txtcontador,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,contador_auxiliar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,contador_auxiliar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"contador_auxiliar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(contador_auxiliar_constante1.STR_RELATIVE_PATH,"contador_auxiliar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"contador_auxiliar");
		
		super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(contador_auxiliar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(contador_auxiliar_constante1,"contador_auxiliar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"contador_auxiliar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(contador_auxiliar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(contador_auxiliar_constante1,"contador_auxiliar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,contador_auxiliar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var contador_auxiliar_funcion1=new contador_auxiliar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {contador_auxiliar_funcion,contador_auxiliar_funcion1};

//Para ser llamado desde window.opener
window.contador_auxiliar_funcion1 = contador_auxiliar_funcion1;



//</script>
