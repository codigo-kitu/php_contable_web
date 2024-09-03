//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_predefinido_detalle_constante,asiento_predefinido_detalle_constante1} from '../util/asiento_predefinido_detalle_constante.js';

class asiento_predefinido_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_predefinido_detalle");
		
		super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"asiento_predefinido_detalle");
		
		super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(asiento_predefinido_detalle_constante1.STR_ES_RELACIONES,asiento_predefinido_detalle_constante1.STR_ES_RELACIONADO,asiento_predefinido_detalle_constante1.STR_RELATIVE_PATH,"asiento_predefinido_detalle");		
		
		if(super.esPaginaForm(asiento_predefinido_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido_detalle");
		
		super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
				
		if(super.esPaginaForm(asiento_predefinido_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido_detalle.hdnIdActual);
		jQuery('cmbasiento_predefinido_detalleid_asiento_predefinido').val("");
		jQuery('cmbasiento_predefinido_detalleid_cuenta').val("");
		jQuery('cmbasiento_predefinido_detalleid_centro_costo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido_detalle.txtorden);
		funcionGeneral.setEmptyControl(document.frmMantenimientoasiento_predefinido_detalle.txtcuenta_contable);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarasiento_predefinido_detalle.txtNumeroRegistrosasiento_predefinido_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'asiento_predefinido_detalles',strNumeroRegistros,document.frmParamsBuscarasiento_predefinido_detalle.txtNumeroRegistrosasiento_predefinido_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(asiento_predefinido_detalle_constante1) {
		
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
		
		
		if(asiento_predefinido_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_asiento_predefinido": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-orden": {
					required:true,
					digits:true
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_asiento_predefinido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(asiento_predefinido_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_asiento_predefinido_detalle-id_asiento_predefinido": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido_detalle-id_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido_detalle-id_centro_costo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_asiento_predefinido_detalle-orden": {
					required:true,
					digits:true
				},
					
				"form_asiento_predefinido_detalle-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_asiento_predefinido_detalle-id_asiento_predefinido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido_detalle-id_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido_detalle-id_centro_costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido_detalle-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_asiento_predefinido_detalle-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(asiento_predefinido_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoasiento_predefinido_detalle").validate(arrRules);
		
		if(asiento_predefinido_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesasiento_predefinido_detalle").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			asiento_predefinido_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"asiento_predefinido_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido_detalle.txtorden,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido_detalle.txtcuenta_contable,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido_detalle.txtorden,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoasiento_predefinido_detalle.txtcuenta_contable,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,asiento_predefinido_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,asiento_predefinido_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"asiento_predefinido_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(asiento_predefinido_detalle_constante1.STR_RELATIVE_PATH,"asiento_predefinido_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido_detalle");
		
		super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(asiento_predefinido_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"asiento_predefinido_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(asiento_predefinido_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(asiento_predefinido_detalle_constante1,"asiento_predefinido_detalle");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,asiento_predefinido_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var asiento_predefinido_detalle_funcion1=new asiento_predefinido_detalle_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {asiento_predefinido_detalle_funcion,asiento_predefinido_detalle_funcion1};

//Para ser llamado desde window.opener
window.asiento_predefinido_detalle_funcion1 = asiento_predefinido_detalle_funcion1;



//</script>
