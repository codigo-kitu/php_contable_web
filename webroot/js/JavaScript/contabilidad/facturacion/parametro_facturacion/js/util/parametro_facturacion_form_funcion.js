//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_facturacion_constante,parametro_facturacion_constante1} from '../util/parametro_facturacion_constante.js';


class parametro_facturacion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_facturacion_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_facturacion");		
		super.procesarInicioProceso(parametro_facturacion_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_facturacion");		
		super.procesarInicioProceso(parametro_facturacion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_facturacion_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_facturacion_constante1.STR_ES_RELACIONES,parametro_facturacion_constante1.STR_ES_RELACIONADO,parametro_facturacion_constante1.STR_RELATIVE_PATH,"parametro_facturacion");		
		
		if(super.esPaginaForm(parametro_facturacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_facturacion_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_facturacion");		
		super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion");
				
		if(super.esPaginaForm(parametro_facturacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbparametro_facturacionid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnombre_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_devolucion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_devolucion);
		jQuery('cmbparametro_facturacionid_termino_pago_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnombre_estimado);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_estimado);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_estimado);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_estimado,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnombre_consignacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_consignacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_consignacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_consignacion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_facturacion.chbcon_recibo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnombre_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtnumero_recibo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_facturacion.txtincremento_recibo);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_facturacion.chbcon_impuesto_recibo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_facturacion.txtNumeroRegistrosparametro_facturacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_facturacions',strNumeroRegistros,document.frmParamsBuscarparametro_facturacion.txtNumeroRegistrosparametro_facturacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_facturacion_constante1) {
		
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
		
		
		if(parametro_facturacion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_factura": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-numero_factura": {
					required:true,
					digits:true
				},
					
				"form-incremento_factura": {
					required:true,
					digits:true
				},
					
					
				"form-numero_factura_lote": {
					required:true,
					digits:true
				},
					
				"form-incremento_factura_lote": {
					required:true,
					digits:true
				},
					
				"form-numero_devolucion": {
					required:true,
					digits:true
				},
					
				"form-incremento_devolucion": {
					required:true,
					digits:true
				},
					
				"form-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre_estimado": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-numero_estimado": {
					required:true,
					digits:true
				},
					
				"form-incremento_estimado": {
					required:true,
					digits:true
				},
					
					
				"form-nombre_consignacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-numero_consignacion": {
					required:true,
					digits:true
				},
					
				"form-incremento_consignacion": {
					required:true,
					digits:true
				},
					
					
					
				"form-nombre_recibo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-numero_recibo": {
					required:true,
					digits:true
				},
					
				"form-incremento_recibo": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-numero_factura_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_factura_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-nombre_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-nombre_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_facturacion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_facturacion-nombre_factura": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_parametro_facturacion-numero_factura": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_factura": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_facturacion-numero_factura_lote": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_factura_lote": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-numero_devolucion": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_devolucion": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_facturacion-nombre_estimado": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_parametro_facturacion-numero_estimado": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_estimado": {
					required:true,
					digits:true
				},
					
					
				"form_parametro_facturacion-nombre_consignacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_parametro_facturacion-numero_consignacion": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_consignacion": {
					required:true,
					digits:true
				},
					
					
					
				"form_parametro_facturacion-nombre_recibo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_parametro_facturacion-numero_recibo": {
					required:true,
					digits:true
				},
					
				"form_parametro_facturacion-incremento_recibo": {
					required:true,
					digits:true
				},
					
				},
				
				messages: {
					"form_parametro_facturacion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-nombre_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_facturacion-numero_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_facturacion-numero_factura_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_factura_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-numero_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_devolucion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-nombre_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_facturacion-numero_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_estimado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_parametro_facturacion-nombre_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_facturacion-numero_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_consignacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_parametro_facturacion-nombre_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_facturacion-numero_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_facturacion-incremento_recibo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
				}		
			};	



			if(parametro_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_facturacion").validate(arrRules);
		
		if(parametro_facturacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_facturacion").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_facturacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_facturacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_devolucion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_devolucion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_estimado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_estimado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_estimado,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_estimado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_consignacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_consignacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_consignacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_consignacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbcon_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_recibo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_recibo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbcon_impuesto_recibo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_factura_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_factura_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_devolucion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_devolucion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_estimado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_estimado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_estimado,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_estimado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_consignacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_consignacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_consignacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbsolo_costo_producto_consignacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbcon_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnombre_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtnumero_recibo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_facturacion.txtincremento_recibo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_facturacion.chbcon_impuesto_recibo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_facturacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_facturacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_facturacion"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_facturacion_constante1.STR_RELATIVE_PATH,"parametro_facturacion"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_facturacion");
	
		super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_facturacion_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_facturacion_constante1,"parametro_facturacion"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_facturacion_constante1,"parametro_facturacion"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_facturacion"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_facturacion_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_facturacion_constante1,"parametro_facturacion");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_facturacion_webcontrol1) {
	
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

var parametro_facturacion_funcion1=new parametro_facturacion_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_facturacion_funcion,parametro_facturacion_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_facturacion_funcion1 = parametro_facturacion_funcion1;



//</script>
