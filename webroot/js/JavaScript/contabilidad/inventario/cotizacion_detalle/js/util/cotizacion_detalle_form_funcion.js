//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cotizacion_detalle_constante,cotizacion_detalle_constante1} from '../util/cotizacion_detalle_constante.js';


class cotizacion_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cotizacion_detalle_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cotizacion_detalle");		
		super.procesarInicioProceso(cotizacion_detalle_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cotizacion_detalle");		
		super.procesarInicioProceso(cotizacion_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cotizacion_detalle_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cotizacion_detalle_constante1.STR_ES_RELACIONES,cotizacion_detalle_constante1.STR_ES_RELACIONADO,cotizacion_detalle_constante1.STR_RELATIVE_PATH,"cotizacion_detalle");		
		
		if(super.esPaginaForm(cotizacion_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cotizacion_detalle_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cotizacion_detalle");		
		super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle");
				
		if(super.esPaginaForm(cotizacion_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcotizacion_detalleid_cotizacion').val("");
		jQuery('cmbcotizacion_detalleid_bodega').val("");
		jQuery('cmbcotizacion_detalleid_producto').val("");
		jQuery('cmbcotizacion_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_monto);
		jQuery('cmbcotizacion_detalleid_otro_suplidor').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcotizacion_detalle.txtNumeroRegistroscotizacion_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cotizacion_detalles',strNumeroRegistros,document.frmParamsBuscarcotizacion_detalle.txtNumeroRegistroscotizacion_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cotizacion_detalle_constante1) {
		
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
		
		
		if(cotizacion_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_cotizacion": {
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
					
				"form-id_otro_suplidor": {
					digits:true
				
				}
				},
				
				messages: {
					"form-id_cotizacion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
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
					"form-total": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_otro_suplidor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(cotizacion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cotizacion_detalle-id_cotizacion": {
					digits:true
				
				},
					
				"form_cotizacion_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-precio": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-sub_total": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-iva_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-total": {
					number:true
				},
					
				"form_cotizacion_detalle-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cotizacion_detalle-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion_detalle-id_otro_suplidor": {
					digits:true
				
				}
				},
				
				messages: {
					"form_cotizacion_detalle-id_cotizacion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-total": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion_detalle-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion_detalle-id_otro_suplidor": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(cotizacion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocotizacion_detalle").validate(arrRules);
		
		if(cotizacion_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescotizacion_detalle").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cotizacion_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cotizacion_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_monto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion_detalle.txtimpuesto2_monto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cotizacion_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cotizacion_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cotizacion_detalle"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cotizacion_detalle_constante1.STR_RELATIVE_PATH,"cotizacion_detalle"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cotizacion_detalle");
	
		super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cotizacion_detalle_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cotizacion_detalle_constante1,"cotizacion_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cotizacion_detalle_constante1,"cotizacion_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cotizacion_detalle"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cotizacion_detalle_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cotizacion_detalle_constante1,"cotizacion_detalle");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cotizacion_detalle_webcontrol1) {
	
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

var cotizacion_detalle_funcion1=new cotizacion_detalle_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cotizacion_detalle_funcion,cotizacion_detalle_funcion1};

/*Para ser llamado desde window.opener*/
window.cotizacion_detalle_funcion1 = cotizacion_detalle_funcion1;



//</script>
