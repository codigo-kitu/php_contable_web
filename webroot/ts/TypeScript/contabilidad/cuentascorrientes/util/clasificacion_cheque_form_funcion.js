//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {clasificacion_cheque_constante,clasificacion_cheque_constante1} from '../util/clasificacion_cheque_constante.js';

class clasificacion_cheque_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(clasificacion_cheque_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"clasificacion_cheque");
		
		super.procesarInicioProceso(clasificacion_cheque_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"clasificacion_cheque");
		
		super.procesarInicioProceso(clasificacion_cheque_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(clasificacion_cheque_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(clasificacion_cheque_constante1.STR_ES_RELACIONES,clasificacion_cheque_constante1.STR_ES_RELACIONADO,clasificacion_cheque_constante1.STR_RELATIVE_PATH,"clasificacion_cheque");		
		
		if(super.esPaginaForm(clasificacion_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(clasificacion_cheque_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"clasificacion_cheque");
		
		super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
				
		if(super.esPaginaForm(clasificacion_cheque_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoclasificacion_cheque.hdnIdActual);
		jQuery('cmbclasificacion_chequeid_cuenta_corriente_detalle').val("");
		jQuery('cmbclasificacion_chequeid_categoria_cheque').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoclasificacion_cheque.txtmonto);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarclasificacion_cheque.txtNumeroRegistrosclasificacion_cheque,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'clasificacion_cheques',strNumeroRegistros,document.frmParamsBuscarclasificacion_cheque.txtNumeroRegistrosclasificacion_cheque);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(clasificacion_cheque_constante1) {
		
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
		
		
		if(clasificacion_cheque_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_cuenta_corriente_detalle": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_cheque": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_cuenta_corriente_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(clasificacion_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_clasificacion_cheque-id_cuenta_corriente_detalle": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_clasificacion_cheque-id_categoria_cheque": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_clasificacion_cheque-monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_clasificacion_cheque-id_cuenta_corriente_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_clasificacion_cheque-id_categoria_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_clasificacion_cheque-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(clasificacion_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoclasificacion_cheque").validate(arrRules);
		
		if(clasificacion_cheque_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesclasificacion_cheque").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			clasificacion_chequeFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"clasificacion_cheque");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclasificacion_cheque.txtmonto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclasificacion_cheque.txtmonto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,clasificacion_cheque_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,clasificacion_cheque_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"clasificacion_cheque");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(clasificacion_cheque_constante1.STR_RELATIVE_PATH,"clasificacion_cheque");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"clasificacion_cheque");
		
		super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(clasificacion_cheque_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(clasificacion_cheque_constante1,"clasificacion_cheque");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"clasificacion_cheque");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(clasificacion_cheque_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(clasificacion_cheque_constante1,"clasificacion_cheque");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,clasificacion_cheque_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var clasificacion_cheque_funcion1=new clasificacion_cheque_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {clasificacion_cheque_funcion,clasificacion_cheque_funcion1};

//Para ser llamado desde window.opener
window.clasificacion_cheque_funcion1 = clasificacion_cheque_funcion1;



//</script>
