//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {serial_producto_constante,serial_producto_constante1} from '../util/serial_producto_constante.js';


class serial_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(serial_producto_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"serial_producto");		
		super.procesarInicioProceso(serial_producto_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"serial_producto");		
		super.procesarInicioProceso(serial_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(serial_producto_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(serial_producto_constante1.STR_ES_RELACIONES,serial_producto_constante1.STR_ES_RELACIONADO,serial_producto_constante1.STR_RELATIVE_PATH,"serial_producto");		
		
		if(super.esPaginaForm(serial_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(serial_producto_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"serial_producto");		
		super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto");
				
		if(super.esPaginaForm(serial_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbserial_productoid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtnro_serial);
		jQuery('dtserial_productoingresado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtproveedor_mid);
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtmodulo_ingreso);
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtnro_documento_ingreso);
		jQuery('dtserial_productosalida').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtcliente_mid);
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtmodulo_salida);
		jQuery('cmbserial_productoid_bodega').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtnro_item);
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtnro_documento_salida);
		funcionGeneral.setEmptyControl(document.frmMantenimientoserial_producto.txtnro_items);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarserial_producto.txtNumeroRegistrosserial_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'serial_producto',strNumeroRegistros,document.frmParamsBuscarserial_producto.txtNumeroRegistrosserial_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(serial_producto_constante1) {
		
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
		
		
		if(serial_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_serial": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-ingresado": {
					required:true,
					date:true
				},
					
				"form-proveedor_mid": {
					required:true,
					digits:true
				},
					
				"form-modulo_ingreso": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form-nro_documento_ingreso": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-salida": {
					required:true,
					date:true
				},
					
				"form-cliente_mid": {
					required:true,
					digits:true
				},
					
				"form-modulo_salida": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_item": {
					required:true,
					digits:true
				},
					
				"form-nro_documento_salida": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-nro_items": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_serial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ingresado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-proveedor_mid": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_documento_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cliente_mid": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_documento_salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_items": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(serial_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_serial_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_serial_producto-nro_serial": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_serial_producto-ingresado": {
					required:true,
					date:true
				},
					
				"form_serial_producto-proveedor_mid": {
					required:true,
					digits:true
				},
					
				"form_serial_producto-modulo_ingreso": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form_serial_producto-nro_documento_ingreso": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_serial_producto-salida": {
					required:true,
					date:true
				},
					
				"form_serial_producto-cliente_mid": {
					required:true,
					digits:true
				},
					
				"form_serial_producto-modulo_salida": {
					required:true,
					maxlength:3
					,regexpStringMethod:true
				},
					
				"form_serial_producto-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_serial_producto-nro_item": {
					required:true,
					digits:true
				},
					
				"form_serial_producto-nro_documento_salida": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_serial_producto-nro_items": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_serial_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_serial_producto-nro_serial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_serial_producto-ingresado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_serial_producto-proveedor_mid": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_serial_producto-modulo_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_serial_producto-nro_documento_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_serial_producto-salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_serial_producto-cliente_mid": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_serial_producto-modulo_salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_serial_producto-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_serial_producto-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_serial_producto-nro_documento_salida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_serial_producto-nro_items": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(serial_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoserial_producto").validate(arrRules);
		
		if(serial_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesserial_producto").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-ingresado").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-salida").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			serial_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"serial_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_serial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtproveedor_mid,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtmodulo_ingreso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_documento_ingreso,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtcliente_mid,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtmodulo_salida,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_item,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_documento_salida,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_items,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_serial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtproveedor_mid,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtmodulo_ingreso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_documento_ingreso,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtcliente_mid,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtmodulo_salida,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_item,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_documento_salida,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoserial_producto.txtnro_items,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,serial_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,serial_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"serial_producto"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(serial_producto_constante1.STR_RELATIVE_PATH,"serial_producto"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"serial_producto");
	
		super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(serial_producto_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(serial_producto_constante1,"serial_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(serial_producto_constante1,"serial_producto"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"serial_producto"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(serial_producto_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(serial_producto_constante1,"serial_producto");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,serial_producto_webcontrol1) {
	
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

var serial_producto_funcion1=new serial_producto_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {serial_producto_funcion,serial_producto_funcion1};

/*Para ser llamado desde window.opener*/
window.serial_producto_funcion1 = serial_producto_funcion1;



//</script>
