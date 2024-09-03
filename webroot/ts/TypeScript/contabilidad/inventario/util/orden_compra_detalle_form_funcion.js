//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {orden_compra_detalle_constante,orden_compra_detalle_constante1} from '../util/orden_compra_detalle_constante.js';

class orden_compra_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(orden_compra_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra_detalle");
		
		super.procesarInicioProceso(orden_compra_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"orden_compra_detalle");
		
		super.procesarInicioProceso(orden_compra_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(orden_compra_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(orden_compra_detalle_constante1.STR_ES_RELACIONES,orden_compra_detalle_constante1.STR_ES_RELACIONADO,orden_compra_detalle_constante1.STR_RELATIVE_PATH,"orden_compra_detalle");		
		
		if(super.esPaginaForm(orden_compra_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(orden_compra_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"orden_compra_detalle");
		
		super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
				
		if(super.esPaginaForm(orden_compra_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.hdnIdActual);
		jQuery('cmborden_compra_detalleid_orden_compra').val("");
		jQuery('cmborden_compra_detalleid_bodega').val("");
		jQuery('cmborden_compra_detalleid_producto').val("");
		jQuery('cmborden_compra_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtrecibido);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_monto);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarorden_compra_detalle.txtNumeroRegistrosorden_compra_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'orden_compra_detalles',strNumeroRegistros,document.frmParamsBuscarorden_compra_detalle.txtNumeroRegistrosorden_compra_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(orden_compra_detalle_constante1) {
		
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
		
		
		if(orden_compra_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_orden_compra": {
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
					
				"form-sub_total": {
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
					
				"form-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-recibido": {
					required:true,
					number:true
				},
					
				"form-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form-impuesto2_monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_orden_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(orden_compra_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_orden_compra_detalle-id_orden_compra": {
					digits:true
				
				},
					
				"form_orden_compra_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_orden_compra_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-precio": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-sub_total": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-iva_monto": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-total": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_orden_compra_detalle-recibido": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_orden_compra_detalle-impuesto2_monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_orden_compra_detalle-id_orden_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_orden_compra_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_orden_compra_detalle-recibido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_orden_compra_detalle-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(orden_compra_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoorden_compra_detalle").validate(arrRules);
		
		if(orden_compra_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesorden_compra_detalle").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			orden_compra_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"orden_compra_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtrecibido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_monto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtrecibido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoorden_compra_detalle.txtimpuesto2_monto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,orden_compra_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,orden_compra_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"orden_compra_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(orden_compra_detalle_constante1.STR_RELATIVE_PATH,"orden_compra_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"orden_compra_detalle");
		
		super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(orden_compra_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(orden_compra_detalle_constante1,"orden_compra_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"orden_compra_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(orden_compra_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(orden_compra_detalle_constante1,"orden_compra_detalle");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,orden_compra_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var orden_compra_detalle_funcion1=new orden_compra_detalle_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {orden_compra_detalle_funcion,orden_compra_detalle_funcion1};

//Para ser llamado desde window.opener
window.orden_compra_detalle_funcion1 = orden_compra_detalle_funcion1;



//</script>
