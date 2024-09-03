//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {historial_cambio_clave_constante,historial_cambio_clave_constante1} from '../util/historial_cambio_clave_constante.js';

class historial_cambio_clave_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(historial_cambio_clave_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"historial_cambio_clave");
		
		super.procesarInicioProceso(historial_cambio_clave_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"historial_cambio_clave");
		
		super.procesarInicioProceso(historial_cambio_clave_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(historial_cambio_clave_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(historial_cambio_clave_constante1.STR_ES_RELACIONES,historial_cambio_clave_constante1.STR_ES_RELACIONADO,historial_cambio_clave_constante1.STR_RELATIVE_PATH,"historial_cambio_clave");		
		
		if(super.esPaginaForm(historial_cambio_clave_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(historial_cambio_clave_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"historial_cambio_clave");
		
		super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
				
		if(super.esPaginaForm(historial_cambio_clave_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientohistorial_cambio_clave.hdnIdActual);
		jQuery('cmbhistorial_cambio_claveid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientohistorial_cambio_clave.txtnombre);
		jQuery('dthistorial_cambio_clavefecha_hora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientohistorial_cambio_clave.txtobservacion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarhistorial_cambio_clave.txtNumeroRegistroshistorial_cambio_clave,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'historial_cambio_claves',strNumeroRegistros,document.frmParamsBuscarhistorial_cambio_clave.txtNumeroRegistroshistorial_cambio_clave);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(historial_cambio_clave_constante1) {
		
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
		
		
		if(historial_cambio_clave_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-fecha_hora": {
					required:true,
					date:true
				},
					
				"form-observacion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-observacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(historial_cambio_clave_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_historial_cambio_clave-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_historial_cambio_clave-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_historial_cambio_clave-fecha_hora": {
					required:true,
					date:true
				},
					
				"form_historial_cambio_clave-observacion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_historial_cambio_clave-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_historial_cambio_clave-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_historial_cambio_clave-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_historial_cambio_clave-observacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(historial_cambio_clave_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientohistorial_cambio_clave").validate(arrRules);
		
		if(historial_cambio_clave_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleshistorial_cambio_clave").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			historial_cambio_claveFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"historial_cambio_clave");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientohistorial_cambio_clave.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientohistorial_cambio_clave.txtobservacion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientohistorial_cambio_clave.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientohistorial_cambio_clave.txtobservacion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,historial_cambio_clave_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,historial_cambio_clave_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"historial_cambio_clave");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(historial_cambio_clave_constante1.STR_RELATIVE_PATH,"historial_cambio_clave");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"historial_cambio_clave");
		
		super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(historial_cambio_clave_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(historial_cambio_clave_constante1,"historial_cambio_clave");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"historial_cambio_clave");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(historial_cambio_clave_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(historial_cambio_clave_constante1,"historial_cambio_clave");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,historial_cambio_clave_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var historial_cambio_clave_funcion1=new historial_cambio_clave_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {historial_cambio_clave_funcion,historial_cambio_clave_funcion1};

//Para ser llamado desde window.opener
window.historial_cambio_clave_funcion1 = historial_cambio_clave_funcion1;



//</script>
