//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_auxiliar_constante,parametro_auxiliar_constante1} from '../util/parametro_auxiliar_constante.js';


class parametro_auxiliar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_auxiliar_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_auxiliar");		
		super.procesarInicioProceso(parametro_auxiliar_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_auxiliar");		
		super.procesarInicioProceso(parametro_auxiliar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_auxiliar_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_auxiliar_constante1.STR_ES_RELACIONES,parametro_auxiliar_constante1.STR_ES_RELACIONADO,parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar");		
		
		if(super.esPaginaForm(parametro_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_auxiliar_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar");		
		super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar");
				
		if(super.esPaginaForm(parametro_auxiliar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_auxiliarid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtincremento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto);
		jQuery('cmbparametro_auxiliarid_tipo_costeo_kardex').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_auxiliar.txtNumeroRegistrosparametro_auxiliar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_auxiliares',strNumeroRegistros,document.frmParamsBuscarparametro_auxiliar.txtNumeroRegistrosparametro_auxiliar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_auxiliar_constante1) {
		
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
		
		
		if(parametro_auxiliar_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_asignado": {
					required:true,
					maxlength:30
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
					
					
					
				"form-contador_producto": {
					required:true,
					digits:true
				},
					
				"form-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
				"form-numero_decimales_unidades": {
					required:true,
					digits:true
				},
					
					
				"form-siguiente_numero_correlativo_cc": {
					required:true,
					digits:true
				},
					
					
				"form-siguiente_numero_correlativo_asiento": {
					required:true,
					digits:true
				},
					
					
					
				"form-contador_cliente": {
					required:true,
					digits:true
				},
					
					
					
				"form-contador_proveedor": {
					required:true,
					digits:true
				},
					
					
				"form-abreviatura_registro_tributario": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_asignado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form-numero_decimales_unidades": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-siguiente_numero_correlativo_cc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-siguiente_numero_correlativo_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-contador_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-abreviatura_registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_auxiliar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_auxiliar-nombre_asignado": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_parametro_auxiliar-siguiente_numero_correlativo": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar-incremento": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_producto": {
					required:true,
					digits:true
				},
					
				"form_parametro_auxiliar-id_tipo_costeo_kardex": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
				"form_parametro_auxiliar-numero_decimales_unidades": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-siguiente_numero_correlativo_cc": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-siguiente_numero_correlativo_asiento": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_cliente": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_auxiliar-contador_proveedor": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_auxiliar-abreviatura_registro_tributario": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_parametro_auxiliar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-nombre_asignado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_auxiliar-siguiente_numero_correlativo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-incremento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_auxiliar-id_tipo_costeo_kardex": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form_parametro_auxiliar-numero_decimales_unidades": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-siguiente_numero_correlativo_cc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-siguiente_numero_correlativo_asiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_auxiliar-contador_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_auxiliar-abreviatura_registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_auxiliar").validate(arrRules);
		
		if(parametro_auxiliar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_auxiliar").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_auxiliarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_auxiliar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtincremento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnombre_asignado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtincremento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_solo_costo_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_producto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_producto_inactivo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_busqueda_incremental,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbpermitir_revisar_asiento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtnumero_decimales_unidades,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbmostrar_documento_anulado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_cc,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_eliminacion_fisica_asiento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtsiguiente_numero_correlativo_asiento,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_simple_factura,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_cliente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_cliente_inactivo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_codigo_secuencial_proveedor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtcontador_proveedor,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_proveedor_inactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_auxiliar.txtabreviatura_registro_tributario,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_auxiliar.chbcon_asiento_cheque,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_auxiliar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_auxiliar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_auxiliar"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_auxiliar_constante1.STR_RELATIVE_PATH,"parametro_auxiliar"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar");
	
		super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_auxiliar_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_auxiliar_constante1,"parametro_auxiliar"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_auxiliar_constante1,"parametro_auxiliar"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_auxiliar"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_auxiliar_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_auxiliar_constante1,"parametro_auxiliar");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_auxiliar_webcontrol1) {
	
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

var parametro_auxiliar_funcion1=new parametro_auxiliar_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_auxiliar_funcion,parametro_auxiliar_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_auxiliar_funcion1 = parametro_auxiliar_funcion1;



//</script>
