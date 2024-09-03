//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_contabilidad_constante,parametro_contabilidad_constante1} from '../util/parametro_contabilidad_constante.js';


class parametro_contabilidad_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_contabilidad_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_contabilidad");		
		super.procesarInicioProceso(parametro_contabilidad_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_contabilidad");		
		super.procesarInicioProceso(parametro_contabilidad_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_contabilidad_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_contabilidad_constante1.STR_ES_RELACIONES,parametro_contabilidad_constante1.STR_ES_RELACIONADO,parametro_contabilidad_constante1.STR_RELATIVE_PATH,"parametro_contabilidad");		
		
		if(super.esPaginaForm(parametro_contabilidad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_contabilidad_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_contabilidad");		
		super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad");
				
		if(super.esPaginaForm(parametro_contabilidad_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_contabilidad.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_contabilidadid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_contabilidad.txtnumero_asiento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_contabilidad.chbcon_asiento_simple_facturacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_contabilidad.chbcon_eliminacion_fisica_asiento,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_contabilidad.txtNumeroRegistrosparametro_contabilidad,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_contabilidads',strNumeroRegistros,document.frmParamsBuscarparametro_contabilidad.txtNumeroRegistrosparametro_contabilidad);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_contabilidad_constante1) {
		
		/*VALIDACION*/
		/* NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT */
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
		
		
		if(parametro_contabilidad_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_asiento": {
					required:true,
					digits:true
				},
					
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
				}		
			};	
		
			
			if(parametro_contabilidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_contabilidad-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_contabilidad-numero_asiento": {
					required:true,
					digits:true
				},
					
					
				},
				
				messages: {
					"form_parametro_contabilidad-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_contabilidad-numero_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
				}		
			};	



			if(parametro_contabilidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_contabilidad").validate(arrRules);
		
		if(parametro_contabilidad_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_contabilidad").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_contabilidadFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_contabilidad");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_contabilidad.txtnumero_asiento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_contabilidad.chbcon_asiento_simple_facturacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_contabilidad.chbcon_eliminacion_fisica_asiento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_contabilidad.txtnumero_asiento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_contabilidad.chbcon_asiento_simple_facturacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_contabilidad.chbcon_eliminacion_fisica_asiento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_contabilidad_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_contabilidad_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_contabilidad"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_contabilidad_constante1.STR_RELATIVE_PATH,"parametro_contabilidad"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_contabilidad");
	
		super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_contabilidad_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_contabilidad_constante1,"parametro_contabilidad"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_contabilidad_constante1,"parametro_contabilidad"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_contabilidad"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_contabilidad_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_contabilidad_constante1,"parametro_contabilidad");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_contabilidad_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
		
	
	/*
		Nuevo: nuevoOnClick,nuevoOnComplete,nuevoPrepararPaginaFormOnClick,nuevoPrepararPaginaFormOnComplete
		Seleccionar: seleccionarPaginaFormOnClick,seleccionarPaginaFormOnComplete
		Actualizar: actualizarOnClick,actualizarOnComplete
		Cancelar: cancelarOnClick,cancelarOnComplete,cancelarControles
		Validar-Formulario: validarFormularioParametrosNumeroRegistros,validarFormularioJQuery
		MostrarOcultar-Controles: mostrarOcultarControlesMantenimiento,habilitarDeshabilitarControles
		Estado-Botones: actualizarEstadoBotones
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClicks,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar-Simple: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Combos-Campos-Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
}

var parametro_contabilidad_funcion1=new parametro_contabilidad_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_contabilidad_funcion,parametro_contabilidad_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_contabilidad_funcion1 = parametro_contabilidad_funcion1;



//</script>
