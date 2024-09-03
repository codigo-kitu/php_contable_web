//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {kardex_detalle_constante,kardex_detalle_constante1} from '../util/kardex_detalle_constante.js';


class kardex_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(kardex_detalle_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"kardex_detalle");		
		super.procesarInicioProceso(kardex_detalle_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"kardex_detalle");		
		super.procesarInicioProceso(kardex_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(kardex_detalle_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(kardex_detalle_constante1.STR_ES_RELACIONES,kardex_detalle_constante1.STR_ES_RELACIONADO,kardex_detalle_constante1.STR_RELATIVE_PATH,"kardex_detalle");		
		
		if(super.esPaginaForm(kardex_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(kardex_detalle_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"kardex_detalle");		
		super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle");
				
		if(super.esPaginaForm(kardex_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbkardex_detalleid_kardex').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtnumero_item);
		jQuery('cmbkardex_detalleid_bodega').val("");
		jQuery('cmbkardex_detalleid_producto').val("");
		jQuery('cmbkardex_detalleid_unidad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtcosto);
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txttotal);
		jQuery('cmbkardex_detalleid_lote_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible);
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientokardex_detalle.txtcosto_anterior);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarkardex_detalle.txtNumeroRegistroskardex_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'kardex_detalles',strNumeroRegistros,document.frmParamsBuscarkardex_detalle.txtNumeroRegistroskardex_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(kardex_detalle_constante1) {
		
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
		
		
		if(kardex_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_kardex": {
					digits:true
				
				},
					
				"form-numero_item": {
					required:true,
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
					
				"form-costo": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-id_lote_producto": {
					digits:true
				
				},
					
				"form-descripcion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-cantidad_disponible": {
					required:true,
					number:true
				},
					
				"form-cantidad_disponible_total": {
					required:true,
					number:true
				},
					
				"form-costo_anterior": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_lote_producto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cantidad_disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_disponible_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo_anterior": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(kardex_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_kardex_detalle-id_kardex": {
					digits:true
				
				},
					
				"form_kardex_detalle-numero_item": {
					required:true,
					digits:true
				},
					
				"form_kardex_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_kardex_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_kardex_detalle-id_unidad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_kardex_detalle-cantidad": {
					required:true,
					number:true
				},
					
				"form_kardex_detalle-costo": {
					required:true,
					number:true
				},
					
				"form_kardex_detalle-total": {
					required:true,
					number:true
				},
					
				"form_kardex_detalle-id_lote_producto": {
					digits:true
				
				},
					
				"form_kardex_detalle-descripcion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_kardex_detalle-cantidad_disponible": {
					required:true,
					number:true
				},
					
				"form_kardex_detalle-cantidad_disponible_total": {
					required:true,
					number:true
				},
					
				"form_kardex_detalle-costo_anterior": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_kardex_detalle-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-numero_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-id_unidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_kardex_detalle-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_kardex_detalle-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_kardex_detalle-id_lote_producto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kardex_detalle-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_kardex_detalle-cantidad_disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_kardex_detalle-cantidad_disponible_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_kardex_detalle-costo_anterior": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(kardex_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientokardex_detalle").validate(arrRules);
		
		if(kardex_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleskardex_detalle").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			kardex_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"kardex_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtnumero_item,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcosto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcosto_anterior,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtnumero_item,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcosto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcantidad_disponible_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokardex_detalle.txtcosto_anterior,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,kardex_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,kardex_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"kardex_detalle"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(kardex_detalle_constante1.STR_RELATIVE_PATH,"kardex_detalle"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"kardex_detalle");
	
		super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(kardex_detalle_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(kardex_detalle_constante1,"kardex_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(kardex_detalle_constante1,"kardex_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"kardex_detalle"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(kardex_detalle_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(kardex_detalle_constante1,"kardex_detalle");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,kardex_detalle_webcontrol1) {
	
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

var kardex_detalle_funcion1=new kardex_detalle_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {kardex_detalle_funcion,kardex_detalle_funcion1};

/*Para ser llamado desde window.opener*/
window.kardex_detalle_funcion1 = kardex_detalle_funcion1;



//</script>
