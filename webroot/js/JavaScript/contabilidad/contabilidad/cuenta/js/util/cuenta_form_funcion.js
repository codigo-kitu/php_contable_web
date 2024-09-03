//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cuenta_constante,cuenta_constante1} from '../util/cuenta_constante.js';


class cuenta_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cuenta_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cuenta_constante1,"cuenta");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta");		
		super.procesarInicioProceso(cuenta_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_constante1,"cuenta"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta");		
		super.procesarInicioProceso(cuenta_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_constante1,"cuenta"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cuenta_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_constante1.STR_ES_RELACIONES,cuenta_constante1.STR_ES_RELACIONADO,cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
		
		if(super.esPaginaForm(cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cuenta_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta");		
		super.procesarFinalizacionProceso(cuenta_constante1,"cuenta");
				
		if(super.esPaginaForm(cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcuentaid_empresa').val("");
		jQuery('cmbcuentaid_tipo_cuenta').val("");
		jQuery('cmbcuentaid_tipo_nivel_cuenta').val("");
		jQuery('cmbcuentaid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtnivel_cuenta);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbusa_monto_base,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtmonto_base);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtporcentaje_base);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_centro_costos,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_ruc,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtbalance);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtdescripcion);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_retencion,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtvalor_retencion);
		jQuery('dtcuentaultima_transaccion').val(new Date());	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta.txtNumeroRegistroscuenta,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuentaes',strNumeroRegistros,document.frmParamsBuscarcuenta.txtNumeroRegistroscuenta);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cuenta_constante1) {
		
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
		
		
		if(cuenta_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_nivel_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-nivel_cuenta": {
					required:true,
					digits:true
				},
					
					
				"form-monto_base": {
					required:true,
					number:true
				},
					
				"form-porcentaje_base": {
					required:true,
					number:true
				},
					
					
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:150
					,regexpStringMethod:true
				},
					
					
				"form-valor_retencion": {
					required:true,
					number:true
				},
					
				"form-ultima_transaccion": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form-monto_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	
		
			
			if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_tipo_nivel_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_cuenta": {
					digits:true
				
				},
					
				"form_cuenta-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cuenta-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cuenta-nivel_cuenta": {
					required:true,
					digits:true
				},
					
					
				"form_cuenta-monto_base": {
					required:true,
					number:true
				},
					
				"form_cuenta-porcentaje_base": {
					required:true,
					number:true
				},
					
					
					
				"form_cuenta-balance": {
					required:true,
					number:true
				},
					
				"form_cuenta-descripcion": {
					maxlength:150
					,regexpStringMethod:true
				},
					
					
				"form_cuenta-valor_retencion": {
					required:true,
					number:true
				},
					
				"form_cuenta-ultima_transaccion": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form_cuenta-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta-nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					"form_cuenta-monto_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					"form_cuenta-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_cuenta-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	



			if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocuenta").validate(arrRules);
		
		if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuentaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnivel_cuenta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbusa_monto_base,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtmonto_base,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtporcentaje_base,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_centro_costos,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_ruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtdescripcion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_retencion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtvalor_retencion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnivel_cuenta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbusa_monto_base,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtmonto_base,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtporcentaje_base,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_centro_costos,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_ruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtdescripcion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_retencion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtvalor_retencion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cuenta_constante1.STR_RELATIVE_PATH,"cuenta"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta");
	
		super.procesarFinalizacionProceso(cuenta_constante1,"cuenta");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cuenta_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_constante1,"cuenta"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cuenta_constante1,"cuenta"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cuenta_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cuenta_constante1,"cuenta");	
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
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tipo Cuenta") {
				jQuery(".col_id_tipo_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Tipo Nivel Cuenta") {
				jQuery(".col_id_tipo_nivel_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_nivel_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_nivel_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nivel Cuenta") {
				jQuery(".col_nivel_cuenta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Usa Monto Minimo") {
				jQuery(".col_usa_monto_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Minimo") {
				jQuery(".col_monto_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Porcentaje Minimo") {
				jQuery(".col_porcentaje_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Con Centro Costos") {
				jQuery(".col_con_centro_costos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_con_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Con Retencion") {
				jQuery(".col_con_retencion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Valor Retencion") {
				jQuery(".col_valor_retencion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultima Transaccion") {
				jQuery(".col_ultima_transaccion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento_automatico_detalle" || strValueTipoRelacion=="Detalle Asiento Automatico") {
			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		}
		else if(strValueTipoRelacion=="asiento_detalle" || strValueTipoRelacion=="Detalle Asiento") {
			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		}
		else if(strValueTipoRelacion=="asiento_predefinido_detalle" || strValueTipoRelacion=="Detalle Asiento Predefinido") {
			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		}
		else if(strValueTipoRelacion=="categoria_cheque" || strValueTipoRelacion=="Categoria Cheque") {
			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		}
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente" || strValueTipoRelacion=="Cuenta Corriente") {
			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="cuenta" || strValueTipoRelacion=="Cuentas") {
			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		}
		else if(strValueTipoRelacion=="forma_pago_cliente" || strValueTipoRelacion=="Forma Pago Cliente") {
			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		}
		else if(strValueTipoRelacion=="forma_pago_proveedor" || strValueTipoRelacion=="Forma Pago Proveedor") {
			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="impuesto" || strValueTipoRelacion=="Impuesto") {
			cuenta_webcontrol1.registrarSesionParaimpuestos(idActual);
		}
		else if(strValueTipoRelacion=="instrumento_pago" || strValueTipoRelacion=="Instrumento Pago") {
			cuenta_webcontrol1.registrarSesionParainstrumento_pagos(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			cuenta_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="otro_impuesto" || strValueTipoRelacion=="Otro Impuesto") {
			cuenta_webcontrol1.registrarSesionParaotro_impuestos(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			cuenta_webcontrol1.registrarSesionParaproductos(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		}
		else if(strValueTipoRelacion=="retencion" || strValueTipoRelacion=="Retencion") {
			cuenta_webcontrol1.registrarSesionPararetenciones(idActual);
		}
		else if(strValueTipoRelacion=="retencion_fuente" || strValueTipoRelacion=="Retencion Fuente") {
			cuenta_webcontrol1.registrarSesionPararetencion_fuentees(idActual);
		}
		else if(strValueTipoRelacion=="retencion_ica" || strValueTipoRelacion=="Retencion Ica") {
			cuenta_webcontrol1.registrarSesionPararetencion_icas(idActual);
		}
		else if(strValueTipoRelacion=="saldo_cuenta" || strValueTipoRelacion=="Saldo Cuenta") {
			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		}
		else if(strValueTipoRelacion=="termino_pago_cliente" || strValueTipoRelacion=="Terminos Pago Cliente") {
			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		}
		else if(strValueTipoRelacion=="termino_pago_proveedor" || strValueTipoRelacion=="Terminos Pago Proveedores") {
			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
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

var cuenta_funcion1=new cuenta_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cuenta_funcion,cuenta_funcion1};

/*Para ser llamado desde window.opener*/
window.cuenta_funcion1 = cuenta_funcion1;



//</script>
