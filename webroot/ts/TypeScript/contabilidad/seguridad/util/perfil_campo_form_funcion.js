//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_campo_constante,perfil_campo_constante1} from '../util/perfil_campo_constante.js';

class perfil_campo_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(perfil_campo_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_campo");
		
		super.procesarInicioProceso(perfil_campo_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_campo");
		
		super.procesarInicioProceso(perfil_campo_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(perfil_campo_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(perfil_campo_constante1.STR_ES_RELACIONES,perfil_campo_constante1.STR_ES_RELACIONADO,perfil_campo_constante1.STR_RELATIVE_PATH,"perfil_campo");		
		
		if(super.esPaginaForm(perfil_campo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(perfil_campo_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_campo");
		
		super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
				
		if(super.esPaginaForm(perfil_campo_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoperfil_campo.hdnIdActual);
		jQuery('cmbperfil_campoid_perfil').val("");
		jQuery('cmbperfil_campoid_campo').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbtodo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbingreso,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbmodificacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbeliminacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbconsulta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_campo.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarperfil_campo.txtNumeroRegistrosperfil_campo,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'perfil_campos',strNumeroRegistros,document.frmParamsBuscarperfil_campo.txtNumeroRegistrosperfil_campo);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(perfil_campo_constante1) {
		
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
		
		
		if(perfil_campo_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_campo": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
				},
				
				messages: {
					"form-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_campo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
				}		
			};	
		
			
			if(perfil_campo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_perfil_campo-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_perfil_campo-id_campo": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
				},
				
				messages: {
					"form_perfil_campo-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_perfil_campo-id_campo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
				}		
			};	



			if(perfil_campo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoperfil_campo").validate(arrRules);
		
		if(perfil_campo_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesperfil_campo").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			perfil_campoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"perfil_campo");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbtodo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbingreso,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbmodificacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbeliminacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbconsulta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbestado,false);
		} else {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbtodo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbingreso,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbmodificacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbeliminacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbconsulta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_campo.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,perfil_campo_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,perfil_campo_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"perfil_campo");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(perfil_campo_constante1.STR_RELATIVE_PATH,"perfil_campo");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_campo");
		
		super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(perfil_campo_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(perfil_campo_constante1,"perfil_campo");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(perfil_campo_constante1,"perfil_campo");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_campo");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(perfil_campo_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(perfil_campo_constante1,"perfil_campo");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_campo_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var perfil_campo_funcion1=new perfil_campo_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {perfil_campo_funcion,perfil_campo_funcion1};

//Para ser llamado desde window.opener
window.perfil_campo_funcion1 = perfil_campo_funcion1;



//</script>
