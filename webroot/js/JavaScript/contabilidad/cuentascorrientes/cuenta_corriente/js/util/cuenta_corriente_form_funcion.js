//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cuenta_corriente_constante,cuenta_corriente_constante1} from '../util/cuenta_corriente_constante.js';


class cuenta_corriente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cuenta_corriente_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_corriente");		
		super.procesarInicioProceso(cuenta_corriente_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_corriente");		
		super.procesarInicioProceso(cuenta_corriente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_corriente_constante1.STR_ES_RELACIONES,cuenta_corriente_constante1.STR_ES_RELACIONADO,cuenta_corriente_constante1.STR_RELATIVE_PATH,"cuenta_corriente");		
		
		if(super.esPaginaForm(cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente");		
		super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente");
				
		if(super.esPaginaForm(cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcuenta_corrienteid_empresa').val("");
		jQuery('cmbcuenta_corrienteid_usuario').val("");
		jQuery('cmbcuenta_corrienteid_banco').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txtnumero_cuenta);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txtbalance_inicial);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txtcontador_cheque);
		jQuery('cmbcuenta_corrienteid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_corriente.txticono);
		jQuery('cmbcuenta_corrienteid_estado_cuentas_corrientes').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_corriente.txtNumeroRegistroscuenta_corriente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_corrientes',strNumeroRegistros,document.frmParamsBuscarcuenta_corriente.txtNumeroRegistroscuenta_corriente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cuenta_corriente_constante1) {
		
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
		
		
		if(cuenta_corriente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_banco": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-balance_inicial": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-contador_cheque": {
					required:true,
					digits:true
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-descripcion": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-icono": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado_cuentas_corrientes": {
					digits:true
				
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_banco": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-balance_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-contador_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-icono": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado_cuentas_corrientes": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_corriente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente-id_banco": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_corriente-numero_cuenta": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente-balance_inicial": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente-saldo": {
					required:true,
					number:true
				},
					
				"form_cuenta_corriente-contador_cheque": {
					required:true,
					digits:true
				},
					
				"form_cuenta_corriente-id_cuenta": {
					digits:true
				
				},
					
				"form_cuenta_corriente-descripcion": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente-icono": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_corriente-id_estado_cuentas_corrientes": {
					digits:true
				
				}
				},
				
				messages: {
					"form_cuenta_corriente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente-id_banco": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente-numero_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente-balance_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_corriente-contador_cheque": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_corriente-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente-icono": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_corriente-id_estado_cuentas_corrientes": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocuenta_corriente").validate(arrRules);
		
		if(cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_corriente").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_corrienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_corriente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtnumero_cuenta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtbalance_inicial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtcontador_cheque,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txticono,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtnumero_cuenta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtbalance_inicial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtcontador_cheque,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_corriente.txticono,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_corriente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_corriente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_corriente"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cuenta_corriente_constante1.STR_RELATIVE_PATH,"cuenta_corriente"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente");
	
		super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cuenta_corriente_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_corriente_constante1,"cuenta_corriente"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cuenta_corriente_constante1,"cuenta_corriente"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_corriente"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cuenta_corriente_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cuenta_corriente_constante1,"cuenta_corriente");	
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
			else if(strValueTipoColumna=="Id Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Banco") {
				jQuery(".col_id_banco").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_banco_img').trigger("click" );
				} else {
					jQuery('#form-id_banco_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nro Cuenta") {
				jQuery(".col_numero_cuenta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance Inicial") {
				jQuery(".col_balance_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Saldo") {
				jQuery(".col_saldo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Contador Cheque") {
				jQuery(".col_contador_cheque").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Cuenta Contable") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Icono") {
				jQuery(".col_icono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Estado") {
				jQuery(".col_id_estado_cuentas_corrientes").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_cuentas_corrientes_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_cuentas_corrientes_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_corriente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque_cuenta_corriente" || strValueTipoRelacion=="Cheque") {
			cuenta_corriente_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			cuenta_corriente_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="deposito_cuenta_corriente" || strValueTipoRelacion=="Deposito Cta Corriente") {
			cuenta_corriente_webcontrol1.registrarSesionParadeposito_cuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_cobrar" || strValueTipoRelacion=="Documentos Cuentas por Cobrar") {
			cuenta_corriente_webcontrol1.registrarSesionParadocumento_cuenta_cobrares(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_pagar" || strValueTipoRelacion=="Documentos Cuentas por Pagar") {
			cuenta_corriente_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		}
		else if(strValueTipoRelacion=="instrumento_pago" || strValueTipoRelacion=="Instrumento Pago") {
			cuenta_corriente_webcontrol1.registrarSesionParainstrumento_pagos(idActual);
		}
		else if(strValueTipoRelacion=="retiro_cuenta_corriente" || strValueTipoRelacion=="Retiro Cta Corriente") {
			cuenta_corriente_webcontrol1.registrarSesionPararetiro_cuenta_corrientes(idActual);
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

var cuenta_corriente_funcion1=new cuenta_corriente_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cuenta_corriente_funcion,cuenta_corriente_funcion1};

/*Para ser llamado desde window.opener*/
window.cuenta_corriente_funcion1 = cuenta_corriente_funcion1;



//</script>
