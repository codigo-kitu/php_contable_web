//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_inventario_constante,parametro_inventario_constante1} from '../util/parametro_inventario_constante.js';


class parametro_inventario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_inventario_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_inventario");		
		super.procesarInicioProceso(parametro_inventario_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_inventario");		
		super.procesarInicioProceso(parametro_inventario_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_inventario_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_inventario_constante1.STR_ES_RELACIONES,parametro_inventario_constante1.STR_ES_RELACIONADO,parametro_inventario_constante1.STR_RELATIVE_PATH,"parametro_inventario");		
		
		if(super.esPaginaForm(parametro_inventario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_inventario_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_inventario");		
		super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario");
				
		if(super.esPaginaForm(parametro_inventario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_inventarioid_empresa').val("");
		jQuery('cmbparametro_inventarioid_termino_pago_proveedor').val("");
		jQuery('cmbparametro_inventarioid_tipo_costeo_kardex').val("");
		jQuery('cmbparametro_inventarioid_tipo_kardex').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.txtnumero_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.txtnumero_orden_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.txtnumero_devolucion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.txtnumero_cotizacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_inventario.txtnumero_kardex);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_inventario.chbcon_producto_inactivo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_inventario.txtNumeroRegistrosparametro_inventario,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_inventarios',strNumeroRegistros,document.frmParamsBuscarparametro_inventario.txtNumeroRegistrosparametro_inventario);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_inventario_constante1) {
		
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
		
		
		if(parametro_inventario_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					digits:true
				
				},
					
				"form-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_producto": {
					required:true,
					digits:true
				},
					
				"form-numero_orden_compra": {
					required:true,
					digits:true
				},
					
				"form-numero_devolucion": {
					required:true,
					digits:true
				},
					
				"form-numero_cotizacion": {
					required:true,
					digits:true
				},
					
				"form-numero_kardex": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_empresa": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_orden_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_inventario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_inventario-id_empresa": {
					digits:true
				
				},
					
				"form_parametro_inventario-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_inventario-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_inventario-id_tipo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_inventario-numero_producto": {
					required:true,
					digits:true
				},
					
				"form_parametro_inventario-numero_orden_compra": {
					required:true,
					digits:true
				},
					
				"form_parametro_inventario-numero_devolucion": {
					required:true,
					digits:true
				},
					
				"form_parametro_inventario-numero_cotizacion": {
					required:true,
					digits:true
				},
					
				"form_parametro_inventario-numero_kardex": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_parametro_inventario-id_empresa": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-id_tipo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-numero_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-numero_orden_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-numero_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-numero_cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_inventario-numero_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(parametro_inventario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_inventario").validate(arrRules);
		
		if(parametro_inventario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_inventario").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_inventarioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_inventario");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_orden_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_devolucion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_cotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_kardex,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_inventario.chbcon_producto_inactivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_orden_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_devolucion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_cotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_inventario.txtnumero_kardex,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_inventario.chbcon_producto_inactivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_inventario_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_inventario_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_inventario"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_inventario_constante1.STR_RELATIVE_PATH,"parametro_inventario"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_inventario");
	
		super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_inventario_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_inventario_constante1,"parametro_inventario"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_inventario_constante1,"parametro_inventario"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_inventario"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_inventario_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_inventario_constante1,"parametro_inventario");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_inventario_webcontrol1) {
	
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

var parametro_inventario_funcion1=new parametro_inventario_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_inventario_funcion,parametro_inventario_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_inventario_funcion1 = parametro_inventario_funcion1;



//</script>
