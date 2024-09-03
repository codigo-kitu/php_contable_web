//<script type="text/javascript" language="javascript">


import {devolucion_detalle_constante,devolucion_detalle_constante1} from '../util/devolucion_detalle_constante.js';

class devolucion_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(devolucion_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion_detalle");
		
		super.procesarInicioProceso(devolucion_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"devolucion_detalle");
		
		super.procesarInicioProceso(devolucion_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(devolucion_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(devolucion_detalle_constante1.STR_ES_RELACIONES,devolucion_detalle_constante1.STR_ES_RELACIONADO,devolucion_detalle_constante1.STR_RELATIVE_PATH,"devolucion_detalle");		
		
		if(super.esPaginaForm(devolucion_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(devolucion_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion_detalle");
		
		super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
				
		if(super.esPaginaForm(devolucion_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.hdnIdActual);
		jQuery('cmbdevolucion_detalleid_devolucion').val("");
		jQuery('cmbdevolucion_detalleid_bodega').val("");
		jQuery('cmbdevolucion_detalleid_producto').val("");
		jQuery('cmbdevolucion_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtnumero_item);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_monto);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardevolucion_detalle.txtNumeroRegistrosdevolucion_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'devolucion_detalles',strNumeroRegistros,document.frmParamsBuscardevolucion_detalle.txtNumeroRegistrosdevolucion_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(devolucion_detalle_constante1) {
		
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
		
		
		if(devolucion_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_devolucion": {
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
					
				"form-numero_item": {
					required:true,
					digits:true
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
					"form-id_devolucion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(devolucion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_devolucion_detalle-id_devolucion": {
					digits:true
				
				},
					
				"form_devolucion_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_devolucion_detalle-numero_item": {
					required:true,
					digits:true
				},
					
				"form_devolucion_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-precio": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-sub_total": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-iva_monto": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-total": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_devolucion_detalle-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_devolucion_detalle-impuesto2_monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_devolucion_detalle-id_devolucion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_detalle-numero_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_devolucion_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_devolucion_detalle-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_devolucion_detalle-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(devolucion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodevolucion_detalle").validate(arrRules);
		
		if(devolucion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdevolucion_detalle").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			devolucion_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"devolucion_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtnumero_item,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_monto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtnumero_item,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodevolucion_detalle.txtimpuesto2_monto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,devolucion_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,devolucion_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"devolucion_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(devolucion_detalle_constante1.STR_RELATIVE_PATH,"devolucion_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"devolucion_detalle");
		
		super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(devolucion_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(devolucion_detalle_constante1,"devolucion_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"devolucion_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(devolucion_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(devolucion_detalle_constante1,"devolucion_detalle");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,devolucion_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var devolucion_detalle_funcion1=new devolucion_detalle_funcion(); //var

export {devolucion_detalle_funcion,devolucion_detalle_funcion1};

//Para ser llamado desde window.opener
window.devolucion_detalle_funcion1 = devolucion_detalle_funcion1;



//</script>
