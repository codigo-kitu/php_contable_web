//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sistema_constante,sistema_constante1} from '../util/sistema_constante.js';

class sistema_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(sistema_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(sistema_constante1,"sistema");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sistema");
		
		super.procesarInicioProceso(sistema_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(sistema_constante1,"sistema");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"sistema");
		
		super.procesarInicioProceso(sistema_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(sistema_constante1,"sistema");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(sistema_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(sistema_constante1.STR_ES_RELACIONES,sistema_constante1.STR_ES_RELACIONADO,sistema_constante1.STR_RELATIVE_PATH,"sistema");		
		
		if(super.esPaginaForm(sistema_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(sistema_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sistema");
		
		super.procesarFinalizacionProceso(sistema_constante1,"sistema");
				
		if(super.esPaginaForm(sistema_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientosistema.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientosistema.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientosistema.txtnombre_principal);
		funcionGeneral.setEmptyControl(document.frmMantenimientosistema.txtnombre_secundario);
		funcionGeneral.setCheckControl(document.frmMantenimientosistema.chbestado,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarsistema.txtNumeroRegistrossistema,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'sistemas',strNumeroRegistros,document.frmParamsBuscarsistema.txtNumeroRegistrossistema);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(sistema_constante1) {
		
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
		
		
		if(sistema_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-nombre_principal": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-nombre_secundario": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_secundario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(sistema_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_sistema-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_sistema-nombre_principal": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_sistema-nombre_secundario": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_sistema-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sistema-nombre_principal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sistema-nombre_secundario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(sistema_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientosistema").validate(arrRules);
		
		if(sistema_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalessistema").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			sistemaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"sistema");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtnombre_principal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtnombre_secundario,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientosistema.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtnombre_principal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosistema.txtnombre_secundario,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientosistema.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,sistema_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,sistema_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"sistema");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(sistema_constante1.STR_RELATIVE_PATH,"sistema");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"sistema");
		
		super.procesarFinalizacionProceso(sistema_constante1,"sistema");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(sistema_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(sistema_constante1,"sistema");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(sistema_constante1,"sistema");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"sistema");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(sistema_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(sistema_constante1,"sistema");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="A") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="A") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Principal") {
				jQuery(".col_nombre_principal").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Secundario") {
				jQuery(".col_nombre_secundario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,sistema_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="modulo" || strValueTipoRelacion=="Modulo") {
			sistema_webcontrol1.registrarSesionParamodulos(idActual);
		}
		else if(strValueTipoRelacion=="opcion" || strValueTipoRelacion=="Opcion") {
			sistema_webcontrol1.registrarSesionParaopciones(idActual);
		}
		else if(strValueTipoRelacion=="paquete" || strValueTipoRelacion=="Paquete") {
			sistema_webcontrol1.registrarSesionParapaquetes(idActual);
		}
		else if(strValueTipoRelacion=="perfil" || strValueTipoRelacion=="Perfil") {
			sistema_webcontrol1.registrarSesionParaperfiles(idActual);
		}
	}
	
	
	
}

var sistema_funcion1=new sistema_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {sistema_funcion,sistema_funcion1};

//Para ser llamado desde window.opener
window.sistema_funcion1 = sistema_funcion1;



//</script>
