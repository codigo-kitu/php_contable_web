//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cotizacion_constante,cotizacion_constante1} from '../util/cotizacion_constante.js';

class cotizacion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cotizacion_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cotizacion");
		
		super.procesarInicioProceso(cotizacion_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cotizacion");
		
		super.procesarInicioProceso(cotizacion_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cotizacion_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cotizacion_constante1.STR_ES_RELACIONES,cotizacion_constante1.STR_ES_RELACIONADO,cotizacion_constante1.STR_RELATIVE_PATH,"cotizacion");		
		
		if(super.esPaginaForm(cotizacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cotizacion_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cotizacion");
		
		super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
				
		if(super.esPaginaForm(cotizacion_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.hdnIdActual);
		jQuery('cmbcotizacionid_empresa').val("");
		jQuery('cmbcotizacionid_sucursal').val("");
		jQuery('cmbcotizacionid_ejercicio').val("");
		jQuery('cmbcotizacionid_periodo').val("");
		jQuery('cmbcotizacionid_usuario').val("");
		jQuery('cmbcotizacionid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtnumero);
		jQuery('dtcotizacionfecha_emision').val(new Date());
		jQuery('cmbcotizacionid_vendedor').val("");
		jQuery('cmbcotizacionid_termino_pago_proveedor').val("");
		jQuery('dtcotizacionfecha_vence').val(new Date());
		jQuery('cmbcotizacionid_moneda').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtcotizacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtenviar);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtobservacion);
		jQuery('cmbcotizacionid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocotizacion.txtotro_porciento);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcotizacion.txtNumeroRegistroscotizacion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cotizaciones',strNumeroRegistros,document.frmParamsBuscarcotizacion.txtNumeroRegistroscotizacion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cotizacion_constante1) {
		
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
		
		
		if(cotizacion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cotizacion": {
					required:true,
					number:true
				},
					
				"form-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-enviar": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-id_estado": {
					digits:true
				
				},
					
				"form-sub_total": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-iva_porciento": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-otro_monto": {
					required:true,
					number:true
				},
					
				"form-otro_porciento": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(cotizacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cotizacion-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-ruc": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cotizacion-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_cotizacion-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cotizacion-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_cotizacion-id_moneda": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cotizacion-cotizacion": {
					required:true,
					number:true
				},
					
				"form_cotizacion-direccion": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_cotizacion-enviar": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_cotizacion-observacion": {
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_cotizacion-id_estado": {
					digits:true
				
				},
					
				"form_cotizacion-sub_total": {
					required:true,
					number:true
				},
					
				"form_cotizacion-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_cotizacion-iva_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_cotizacion-total": {
					required:true,
					number:true
				},
					
				"form_cotizacion-otro_monto": {
					required:true,
					number:true
				},
					
				"form_cotizacion-otro_porciento": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_cotizacion-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cotizacion-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cotizacion-id_moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-cotizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cotizacion-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cotizacion-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cotizacion-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(cotizacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocotizacion").validate(arrRules);
		
		if(cotizacion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescotizacion").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cotizacionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cotizacion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtcotizacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtenviar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtotro_porciento,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtcotizacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtenviar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocotizacion.txtotro_porciento,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cotizacion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cotizacion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cotizacion");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cotizacion_constante1.STR_RELATIVE_PATH,"cotizacion");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cotizacion");
		
		super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cotizacion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cotizacion_constante1,"cotizacion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cotizacion_constante1,"cotizacion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cotizacion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cotizacion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cotizacion_constante1,"cotizacion");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Proveedores") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_id_moneda").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_moneda_img').trigger("click" );
				} else {
					jQuery('#form-id_moneda_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cotizacion") {
				jQuery(".col_cotizacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Enviar") {
				jQuery(".col_enviar").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sub Total") {
				jQuery(".col_sub_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Monto") {
				jQuery(".col_descuento_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento %") {
				jQuery(".col_descuento_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva") {
				jQuery(".col_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva %") {
				jQuery(".col_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Monto") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cotizacion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cotizacion_detalle" || strValueTipoRelacion=="Cotizacion Detalle") {
			cotizacion_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		}
	}
	
	
	
}

var cotizacion_funcion1=new cotizacion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {cotizacion_funcion,cotizacion_funcion1};

//Para ser llamado desde window.opener
window.cotizacion_funcion1 = cotizacion_funcion1;



//</script>
