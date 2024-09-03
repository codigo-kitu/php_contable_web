//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cambio_dolar_constante,cambio_dolar_constante1} from '../util/cambio_dolar_constante.js';

class cambio_dolar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cambio_dolar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cambio_dolar");
		
		super.procesarInicioProceso(cambio_dolar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cambio_dolar");
		
		super.procesarInicioProceso(cambio_dolar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cambio_dolar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cambio_dolar_constante1.STR_ES_RELACIONES,cambio_dolar_constante1.STR_ES_RELACIONADO,cambio_dolar_constante1.STR_RELATIVE_PATH,"cambio_dolar");		
		
		if(super.esPaginaForm(cambio_dolar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cambio_dolar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cambio_dolar");
		
		super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
				
		if(super.esPaginaForm(cambio_dolar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocambio_dolar.hdnIdActual);
		jQuery('dtcambio_dolarfecha_cambio').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocambio_dolar.txtdolar_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientocambio_dolar.txtdolar_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientocambio_dolar.txtorigen);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcambio_dolar.txtNumeroRegistroscambio_dolar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cambio_dolares',strNumeroRegistros,document.frmParamsBuscarcambio_dolar.txtNumeroRegistroscambio_dolar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cambio_dolar_constante1) {
		
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
		
		
		if(cambio_dolar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-fecha_cambio": {
					required:true,
					date:true
				},
					
				"form-dolar_compra": {
					required:true,
					number:true
				},
					
				"form-dolar_venta": {
					required:true,
					number:true
				},
					
				"form-origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-fecha_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-dolar_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-dolar_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(cambio_dolar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cambio_dolar-fecha_cambio": {
					required:true,
					date:true
				},
					
				"form_cambio_dolar-dolar_compra": {
					required:true,
					number:true
				},
					
				"form_cambio_dolar-dolar_venta": {
					required:true,
					number:true
				},
					
				"form_cambio_dolar-origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cambio_dolar-fecha_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cambio_dolar-dolar_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cambio_dolar-dolar_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cambio_dolar-origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cambio_dolar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocambio_dolar").validate(arrRules);
		
		if(cambio_dolar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescambio_dolar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_cambio").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cambio_dolarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cambio_dolar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtdolar_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtdolar_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtorigen,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtdolar_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtdolar_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocambio_dolar.txtorigen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cambio_dolar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cambio_dolar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cambio_dolar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cambio_dolar_constante1.STR_RELATIVE_PATH,"cambio_dolar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cambio_dolar");
		
		super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cambio_dolar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cambio_dolar_constante1,"cambio_dolar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cambio_dolar_constante1,"cambio_dolar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cambio_dolar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cambio_dolar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cambio_dolar_constante1,"cambio_dolar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cambio_dolar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var cambio_dolar_funcion1=new cambio_dolar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {cambio_dolar_funcion,cambio_dolar_funcion1};

//Para ser llamado desde window.opener
window.cambio_dolar_funcion1 = cambio_dolar_funcion1;



//</script>
