//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cuenta_pagar_constante,cuenta_pagar_constante1} from '../util/cuenta_pagar_constante.js';


class cuenta_pagar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cuenta_pagar_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_pagar");		
		super.procesarInicioProceso(cuenta_pagar_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_pagar");		
		super.procesarInicioProceso(cuenta_pagar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cuenta_pagar_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_pagar_constante1.STR_ES_RELACIONES,cuenta_pagar_constante1.STR_ES_RELACIONADO,cuenta_pagar_constante1.STR_RELATIVE_PATH,"cuenta_pagar");		
		
		if(super.esPaginaForm(cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cuenta_pagar_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar");		
		super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar");
				
		if(super.esPaginaForm(cuenta_pagar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcuenta_pagarid_empresa').val("");
		jQuery('cmbcuenta_pagarid_sucursal').val("");
		jQuery('cmbcuenta_pagarid_ejercicio').val("");
		jQuery('cmbcuenta_pagarid_periodo').val("");
		jQuery('cmbcuenta_pagarid_usuario').val("");
		jQuery('cmbcuenta_pagarid_orden_compra').val("");
		jQuery('cmbcuenta_pagarid_proveedor').val("");
		jQuery('cmbcuenta_pagarid_termino_pago_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtnumero);
		jQuery('dtcuenta_pagarfecha_emision').val(new Date());
		jQuery('dtcuenta_pagarfecha_vence').val(new Date());
		jQuery('dtcuenta_pagarfecha_ultimo_movimiento').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtporcentaje);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtdescripcion);
		jQuery('cmbcuenta_pagarid_estado_cuentas_pagar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar.txtreferencia);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_pagar.txtNumeroRegistroscuenta_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_pagars',strNumeroRegistros,document.frmParamsBuscarcuenta_pagar.txtNumeroRegistroscuenta_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cuenta_pagar_constante1) {
		
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
		
		
		if(cuenta_pagar_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_orden_compra": {
					digits:true
				
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-fecha_ultimo_movimiento": {
					required:true,
					date:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-porcentaje": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado_cuentas_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-referencia": {
					maxlength:25
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_orden_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_ultimo_movimiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-porcentaje": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado_cuentas_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_pagar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_orden_compra": {
					digits:true
				
				},
					
				"form_cuenta_pagar-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cuenta_pagar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cuenta_pagar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_cuenta_pagar-fecha_ultimo_movimiento": {
					required:true,
					date:true
				},
					
				"form_cuenta_pagar-monto": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar-saldo": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar-porcentaje": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_pagar-id_estado_cuentas_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar-referencia": {
					maxlength:25
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cuenta_pagar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_orden_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_pagar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_pagar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_pagar-fecha_ultimo_movimiento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_pagar-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar-porcentaje": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_pagar-id_estado_cuentas_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocuenta_pagar").validate(arrRules);
		
		if(cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_pagar").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_ultimo_movimiento").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtporcentaje,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtreferencia,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtporcentaje,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar.txtreferencia,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_pagar"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cuenta_pagar_constante1.STR_RELATIVE_PATH,"cuenta_pagar"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar");
	
		super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cuenta_pagar_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_pagar_constante1,"cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cuenta_pagar_constante1,"cuenta_pagar"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_pagar"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cuenta_pagar_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cuenta_pagar_constante1,"cuenta_pagar");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
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
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Orden Compra") {
				jQuery(".col_id_orden_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_orden_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_orden_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Termino Pago Proveedor") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Ultimo Mov.") {
				jQuery(".col_fecha_ultimo_movimiento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Saldo") {
				jQuery(".col_saldo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="% Interes") {
				jQuery(".col_porcentaje").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Estado Cuentas Pagar") {
				jQuery(".col_id_estado_cuentas_pagar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_cuentas_pagar_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_cuentas_pagar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Referencia") {
				jQuery(".col_referencia").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_pagar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="credito_cuenta_pagar" || strValueTipoRelacion=="Credito Cuenta Pagar") {
			cuenta_pagar_webcontrol1.registrarSesionParacredito_cuenta_pagars(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			cuenta_pagar_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_pagar_detalle" || strValueTipoRelacion=="Detalle Cuenta Pagar") {
			cuenta_pagar_webcontrol1.registrarSesionParacuenta_pagar_detalles(idActual);
		}
		else if(strValueTipoRelacion=="debito_cuenta_pagar" || strValueTipoRelacion=="Debito Cuenta Pagar") {
			cuenta_pagar_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		}
		else if(strValueTipoRelacion=="pago_cuenta_pagar" || strValueTipoRelacion=="Pago Cuenta Pagar") {
			cuenta_pagar_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
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

var cuenta_pagar_funcion1=new cuenta_pagar_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cuenta_pagar_funcion,cuenta_pagar_funcion1};

/*Para ser llamado desde window.opener*/
window.cuenta_pagar_funcion1 = cuenta_pagar_funcion1;



//</script>
