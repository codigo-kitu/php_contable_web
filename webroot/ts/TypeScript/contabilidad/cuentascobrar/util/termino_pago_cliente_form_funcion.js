//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {termino_pago_cliente_constante,termino_pago_cliente_constante1} from '../util/termino_pago_cliente_constante.js';

class termino_pago_cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"termino_pago_cliente");
		
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"termino_pago_cliente");
		
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(termino_pago_cliente_constante1.STR_ES_RELACIONES,termino_pago_cliente_constante1.STR_ES_RELACIONADO,termino_pago_cliente_constante1.STR_RELATIVE_PATH,"termino_pago_cliente");		
		
		if(super.esPaginaForm(termino_pago_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"termino_pago_cliente");
		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
				
		if(super.esPaginaForm(termino_pago_cliente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.hdnIdActual);
		jQuery('cmbtermino_pago_clienteid_empresa').val("");
		jQuery('cmbtermino_pago_clienteid_tipo_termino_pago').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtdias);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtinicial);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtcuotas);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtdescuento_pronto_pago);
		funcionGeneral.setCheckControl(document.frmMantenimientotermino_pago_cliente.chbpredeterminado,false);
		jQuery('cmbtermino_pago_clienteid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_cliente.txtcuenta_contable);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartermino_pago_cliente.txtNumeroRegistrostermino_pago_cliente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'termino_pago_clientes',strNumeroRegistros,document.frmParamsBuscartermino_pago_cliente.txtNumeroRegistrostermino_pago_cliente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(termino_pago_cliente_constante1) {
		
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
		
		
		if(termino_pago_cliente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-dias": {
					required:true,
					digits:true
				},
					
				"form-inicial": {
					required:true,
					number:true
				},
					
				"form-cuotas": {
					required:true,
					digits:true
				},
					
				"form-descuento_pronto_pago": {
					required:true,
					number:true
				},
					
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-dias": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cuotas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descuento_pronto_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(termino_pago_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_termino_pago_cliente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_termino_pago_cliente-id_tipo_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_termino_pago_cliente-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_termino_pago_cliente-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_termino_pago_cliente-monto": {
					required:true,
					number:true
				},
					
				"form_termino_pago_cliente-dias": {
					required:true,
					digits:true
				},
					
				"form_termino_pago_cliente-inicial": {
					required:true,
					number:true
				},
					
				"form_termino_pago_cliente-cuotas": {
					required:true,
					digits:true
				},
					
				"form_termino_pago_cliente-descuento_pronto_pago": {
					required:true,
					number:true
				},
					
					
				"form_termino_pago_cliente-id_cuenta": {
					digits:true
				
				},
					
				"form_termino_pago_cliente-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_termino_pago_cliente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_cliente-id_tipo_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_cliente-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_termino_pago_cliente-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_termino_pago_cliente-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_termino_pago_cliente-dias": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_cliente-inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_termino_pago_cliente-cuotas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_cliente-descuento_pronto_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_termino_pago_cliente-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_cliente-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(termino_pago_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotermino_pago_cliente").validate(arrRules);
		
		if(termino_pago_cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestermino_pago_cliente").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			termino_pago_clienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"termino_pago_cliente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdias,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtinicial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcuotas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdescuento_pronto_pago,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientotermino_pago_cliente.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcuenta_contable,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdias,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtinicial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcuotas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtdescuento_pronto_pago,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientotermino_pago_cliente.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_cliente.txtcuenta_contable,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,termino_pago_cliente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,termino_pago_cliente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"termino_pago_cliente");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(termino_pago_cliente_constante1.STR_RELATIVE_PATH,"termino_pago_cliente");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"termino_pago_cliente");
		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"termino_pago_cliente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(termino_pago_cliente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(termino_pago_cliente_constante1,"termino_pago_cliente");
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
			else if(strValueTipoColumna=="Tipo Termino Pago") {
				jQuery(".col_id_tipo_termino_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_termino_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_termino_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Dias") {
				jQuery(".col_dias").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Inicial") {
				jQuery(".col_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuotas") {
				jQuery(".col_cuotas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Pronto Pago") {
				jQuery(".col_descuento_pronto_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Cuenta Contable") {
				jQuery(".col_cuenta_contable").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,termino_pago_cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			termino_pago_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			termino_pago_cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_cobrar" || strValueTipoRelacion=="Cuenta Cobrar") {
			termino_pago_cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="debito_cuenta_cobrar" || strValueTipoRelacion=="Debito Cuenta Cobrar") {
			termino_pago_cliente_webcontrol1.registrarSesionParadebito_cuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			termino_pago_cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			termino_pago_cliente_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			termino_pago_cliente_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			termino_pago_cliente_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="parametro_facturacion" || strValueTipoRelacion=="Parametro Facturacion") {
			termino_pago_cliente_webcontrol1.registrarSesionParaparametro_facturacions(idActual);
		}
	}
	
	
	
}

var termino_pago_cliente_funcion1=new termino_pago_cliente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {termino_pago_cliente_funcion,termino_pago_cliente_funcion1};

//Para ser llamado desde window.opener
window.termino_pago_cliente_funcion1 = termino_pago_cliente_funcion1;



//</script>
