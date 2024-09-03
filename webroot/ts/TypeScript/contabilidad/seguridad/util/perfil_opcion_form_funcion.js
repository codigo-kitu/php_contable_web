//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_opcion_constante,perfil_opcion_constante1} from '../util/perfil_opcion_constante.js';

class perfil_opcion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(perfil_opcion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_opcion");
		
		super.procesarInicioProceso(perfil_opcion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_opcion");
		
		super.procesarInicioProceso(perfil_opcion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(perfil_opcion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(perfil_opcion_constante1.STR_ES_RELACIONES,perfil_opcion_constante1.STR_ES_RELACIONADO,perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
		
		if(super.esPaginaForm(perfil_opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(perfil_opcion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_opcion");
		
		super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
				
		if(super.esPaginaForm(perfil_opcion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoperfil_opcion.hdnIdActual);
		jQuery('cmbperfil_opcionid_perfil').val("");
		jQuery('cmbperfil_opcionid_opcion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbtodo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbingreso,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbmodificacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbeliminacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbconsulta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbbusqueda,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbreporte,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoperfil_opcion.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarperfil_opcion.txtNumeroRegistrosperfil_opcion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'perfil_opciones',strNumeroRegistros,document.frmParamsBuscarperfil_opcion.txtNumeroRegistrosperfil_opcion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(perfil_opcion_constante1) {
		
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
		
		
		if(perfil_opcion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
					
					
				},
				
				messages: {
					"form-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
					
					
				}		
			};	
		
			
			if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_perfil_opcion-id_perfil": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_perfil_opcion-id_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
					
					
				},
				
				messages: {
					"form_perfil_opcion-id_perfil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_perfil_opcion-id_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					
					
					
				}		
			};	



			if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoperfil_opcion").validate(arrRules);
		
		if(perfil_opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesperfil_opcion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			perfil_opcionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"perfil_opcion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbtodo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbingreso,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbmodificacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbeliminacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbconsulta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbbusqueda,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbreporte,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbestado,false);
		} else {
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbtodo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbingreso,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbmodificacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbeliminacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbconsulta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbbusqueda,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbreporte,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoperfil_opcion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,perfil_opcion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,perfil_opcion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"perfil_opcion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(perfil_opcion_constante1.STR_RELATIVE_PATH,"perfil_opcion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"perfil_opcion");
		
		super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(perfil_opcion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(perfil_opcion_constante1,"perfil_opcion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(perfil_opcion_constante1,"perfil_opcion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_opcion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(perfil_opcion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(perfil_opcion_constante1,"perfil_opcion");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_opcion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var perfil_opcion_funcion1=new perfil_opcion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {perfil_opcion_funcion,perfil_opcion_funcion1};

//Para ser llamado desde window.opener
window.perfil_opcion_funcion1 = perfil_opcion_funcion1;



//</script>
