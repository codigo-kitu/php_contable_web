//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_auxiliar_facturacion_constante,parametro_auxiliar_facturacion_constante1} from '../util/parametro_auxiliar_facturacion_constante.js';

class parametro_auxiliar_facturacion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_auxiliar_facturacion");
		
		super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_auxiliar_facturacion");
		
		super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONES,parametro_auxiliar_facturacion_constante1.STR_ES_RELACIONADO,parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
		
		if(super.esPaginaForm(parametro_auxiliar_facturacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar_facturacion");
		
		super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
				
		if(super.esPaginaForm(parametro_auxiliar_facturacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.hdnIdActual);
		jQuery('cmbparametro_auxiliar_facturacionid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_auxiliar_facturacion.txtNumeroRegistrosparametro_auxiliar_facturacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_auxiliar_facturaciones',strNumeroRegistros,document.frmParamsBuscarparametro_auxiliar_facturacion.txtNumeroRegistrosparametro_auxiliar_facturacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_auxiliar_facturacion_constante1) {
		
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
		
		
		if(parametro_auxiliar_facturacion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_tipo_factura": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form-incremento": {
					required:true,
					digits:true
				},
					
					
					
					
					
				"form-nombre_tipo_factura_recibo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo_recibo": {
					required:true,
					digits:true
				},
					
				"form-incremento_recibo": {
					required:true,
					digits:true
				},
					
					
					
				"form-nombre_tipo_factura_ticket": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-siguiente_numero_correlativo_ticket": {
					required:true,
					digits:true
				},
					
				"form-incremento_ticket": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form-nombre_tipo_factura_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-nombre_tipo_factura_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_auxiliar_facturacion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento": {
					required:true,
					digits:true
				},
					
					
					
					
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura_recibo": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_recibo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento_recibo": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar_facturacion-nombre_tipo_factura_ticket": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_ticket": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar_facturacion-incremento_ticket": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_parametro_auxiliar_facturacion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar_facturacion-nombre_tipo_factura_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-siguiente_numero_correlativo_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar_facturacion-incremento_ticket": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_auxiliar_facturacion").validate(arrRules);
		
		if(parametro_auxiliar_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_auxiliar_facturacion").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_auxiliar_facturacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_auxiliar_facturacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_creacion_rapida_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_busqueda_producto_fabricante,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_solo_costo_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_recibo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_boleta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_ticket,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtnombre_tipo_factura_tickets,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtsiguiente_numero_correlativo_ticket,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar_facturacion.txtincremento_ticket,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar_facturacion.chbcon_impuesto_final_ticket,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_auxiliar_facturacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_auxiliar_facturacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_auxiliar_facturacion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(parametro_auxiliar_facturacion_constante1.STR_RELATIVE_PATH,"parametro_auxiliar_facturacion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar_facturacion");
		
		super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(parametro_auxiliar_facturacion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_auxiliar_facturacion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(parametro_auxiliar_facturacion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(parametro_auxiliar_facturacion_constante1,"parametro_auxiliar_facturacion");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_auxiliar_facturacion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var parametro_auxiliar_facturacion_funcion1=new parametro_auxiliar_facturacion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {parametro_auxiliar_facturacion_funcion,parametro_auxiliar_facturacion_funcion1};

//Para ser llamado desde window.opener
window.parametro_auxiliar_facturacion_funcion1 = parametro_auxiliar_facturacion_funcion1;



//</script>
