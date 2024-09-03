//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_accion_constante,perfil_accion_constante1} from '../util/perfil_accion_constante.js';

class perfil_accion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_accion");
		
		super.procesarInicioProceso(perfil_accion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_accion");
		
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(perfil_accion_constante1.STR_ES_RELACIONES,perfil_accion_constante1.STR_ES_RELACIONADO,perfil_accion_constante1.STR_RELATIVE_PATH,"perfil_accion");		
		
		if(super.esPaginaForm(perfil_accion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_accion");
		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
				
		if(super.esPaginaForm(perfil_accion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoperfil_accion.hdnIdActual);
		jQuery('cmbperfil_accionid_perfil').val("");
		jQuery('cmbperfil_accionid_accion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_accion.chbejecusion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_accion.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarperfil_accion.txtNumeroRegistrosperfil_accion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'perfil_acciones',strNumeroRegistros,document.frmParamsBuscarperfil_accion.txtNumeroRegistrosperfil_accion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(perfil_accion_constante1) {
		
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
		
		
		if(perfil_accion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_accion": {
					required:true,
					digits:true
					,min:0
				},
					
					
				},
				
				messages: {
					"form-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_accion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
				}		
			};	
		
			
			if(perfil_accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_perfil_accion-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_perfil_accion-id_accion": {
					required:true,
					digits:true
					,min:0
				},
					
					
				},
				
				messages: {
					"form_perfil_accion-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_perfil_accion-id_accion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
				}		
			};	



			if(perfil_accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoperfil_accion").validate(arrRules);
		
		if(perfil_accion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesperfil_accion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			perfil_accionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"perfil_accion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_accion.chbejecusion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_accion.chbestado,false);
		} else {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_accion.chbejecusion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_accion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,perfil_accion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,perfil_accion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"perfil_accion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(perfil_accion_constante1.STR_RELATIVE_PATH,"perfil_accion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_accion");
		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(perfil_accion_constante1,"perfil_accion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_accion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(perfil_accion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(perfil_accion_constante1,"perfil_accion");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_accion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var perfil_accion_funcion1=new perfil_accion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {perfil_accion_funcion,perfil_accion_funcion1};

//Para ser llamado desde window.opener
window.perfil_accion_funcion1 = perfil_accion_funcion1;



//</script>
