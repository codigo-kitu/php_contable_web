//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_lote_detalle_constante,factura_lote_detalle_constante1} from '../util/factura_lote_detalle_constante.js';

class factura_lote_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(factura_lote_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"factura_lote_detalle");
		
		super.procesarInicioProceso(factura_lote_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"factura_lote_detalle");
		
		super.procesarInicioProceso(factura_lote_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(factura_lote_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(factura_lote_detalle_constante1.STR_ES_RELACIONES,factura_lote_detalle_constante1.STR_ES_RELACIONADO,factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
		
		if(super.esPaginaForm(factura_lote_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(factura_lote_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"factura_lote_detalle");
		
		super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
				
		if(super.esPaginaForm(factura_lote_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.hdnIdActual);
		jQuery('cmbfactura_lote_detalleid_factura_lote').val("");
		jQuery('cmbfactura_lote_detalleid_bodega').val("");
		jQuery('cmbfactura_lote_detalleid_producto').val("");
		jQuery('cmbfactura_lote_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtcotizacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarfactura_lote_detalle.txtNumeroRegistrosfactura_lote_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'factura_lote_detalles',strNumeroRegistros,document.frmParamsBuscarfactura_lote_detalle.txtNumeroRegistrosfactura_lote_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(factura_lote_detalle_constante1) {
		
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
		
		
		if(factura_lote_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_factura_lote": {
					digits:true
				
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-precio": {
					required:true,
					number:true
				},
					
				"form-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-sub_total": {
					required:true,
					number:true
				},
					
				"form-iva_porciento": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-recibido": {
					required:true,
					number:true
				},
					
				"form-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form-cotizacion": {
					required:true,
					number:true
				},
					
				"form-moneda": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_factura_lote": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_factura_lote_detalle-id_factura_lote": {
					digits:true
				
				},
					
				"form_factura_lote_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-precio": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-sub_total": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-total": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-recibido": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_factura_lote_detalle-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-cotizacion": {
					required:true,
					number:true
				},
					
				"form_factura_lote_detalle-moneda": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_factura_lote_detalle-id_factura_lote": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote_detalle-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote_detalle-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientofactura_lote_detalle").validate(arrRules);
		
		if(factura_lote_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesfactura_lote_detalle").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			factura_lote_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"factura_lote_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtrecibido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtimpuesto2_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote_detalle.txtmoneda,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,factura_lote_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,factura_lote_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"factura_lote_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(factura_lote_detalle_constante1.STR_RELATIVE_PATH,"factura_lote_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"factura_lote_detalle");
		
		super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(factura_lote_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(factura_lote_detalle_constante1,"factura_lote_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"factura_lote_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(factura_lote_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(factura_lote_detalle_constante1,"factura_lote_detalle");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,factura_lote_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var factura_lote_detalle_funcion1=new factura_lote_detalle_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {factura_lote_detalle_funcion,factura_lote_detalle_funcion1};

//Para ser llamado desde window.opener
window.factura_lote_detalle_funcion1 = factura_lote_detalle_funcion1;



//</script>
