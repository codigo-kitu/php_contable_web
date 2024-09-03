//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {retiro_cuenta_corriente_constante,retiro_cuenta_corriente_constante1} from '../util/retiro_cuenta_corriente_constante.js';


class retiro_cuenta_corriente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(retiro_cuenta_corriente_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"retiro_cuenta_corriente");		
		super.procesarInicioProceso(retiro_cuenta_corriente_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"retiro_cuenta_corriente");		
		super.procesarInicioProceso(retiro_cuenta_corriente_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(retiro_cuenta_corriente_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(retiro_cuenta_corriente_constante1.STR_ES_RELACIONES,retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO,retiro_cuenta_corriente_constante1.STR_RELATIVE_PATH,"retiro_cuenta_corriente");		
		
		if(super.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(retiro_cuenta_corriente_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"retiro_cuenta_corriente");		
		super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente");
				
		if(super.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbretiro_cuenta_corrienteid_empresa').val("");
		jQuery('cmbretiro_cuenta_corrienteid_sucursal').val("");
		jQuery('cmbretiro_cuenta_corrienteid_ejercicio').val("");
		jQuery('cmbretiro_cuenta_corrienteid_periodo').val("");
		jQuery('cmbretiro_cuenta_corrienteid_usuario').val("");
		jQuery('cmbretiro_cuenta_corrienteid_cuenta_corriente').val("");
		jQuery('dtretiro_cuenta_corrientefecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto_texto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdescripcion);
		jQuery('cmbretiro_cuenta_corrienteid_estado_deposito_retiro').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoretiro_cuenta_corriente.txtcredito);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarretiro_cuenta_corriente.txtNumeroRegistrosretiro_cuenta_corriente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'retiro_cuenta_corrientes',strNumeroRegistros,document.frmParamsBuscarretiro_cuenta_corriente.txtNumeroRegistrosretiro_cuenta_corriente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(retiro_cuenta_corriente_constante1) {
		
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
		
		
		if(retiro_cuenta_corriente_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-monto_texto": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado_deposito_retiro": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-debito": {
					required:true,
					number:true
				},
					
				"form-credito": {
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
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-monto_texto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado_deposito_retiro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(retiro_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_retiro_cuenta_corriente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_retiro_cuenta_corriente-monto": {
					required:true,
					number:true
				},
					
				"form_retiro_cuenta_corriente-monto_texto": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_retiro_cuenta_corriente-saldo": {
					required:true,
					number:true
				},
					
				"form_retiro_cuenta_corriente-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_retiro_cuenta_corriente-id_estado_deposito_retiro": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_retiro_cuenta_corriente-debito": {
					required:true,
					number:true
				},
					
				"form_retiro_cuenta_corriente-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_retiro_cuenta_corriente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_retiro_cuenta_corriente-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_retiro_cuenta_corriente-monto_texto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retiro_cuenta_corriente-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_retiro_cuenta_corriente-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_retiro_cuenta_corriente-id_estado_deposito_retiro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_retiro_cuenta_corriente-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_retiro_cuenta_corriente-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(retiro_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoretiro_cuenta_corriente").validate(arrRules);
		
		if(retiro_cuenta_corriente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesretiro_cuenta_corriente").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			retiro_cuenta_corrienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"retiro_cuenta_corriente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto_texto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtmonto_texto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoretiro_cuenta_corriente.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,retiro_cuenta_corriente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,retiro_cuenta_corriente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"retiro_cuenta_corriente"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(retiro_cuenta_corriente_constante1.STR_RELATIVE_PATH,"retiro_cuenta_corriente"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"retiro_cuenta_corriente");
	
		super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(retiro_cuenta_corriente_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"retiro_cuenta_corriente"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(retiro_cuenta_corriente_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(retiro_cuenta_corriente_constante1,"retiro_cuenta_corriente");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,retiro_cuenta_corriente_webcontrol1) {
	
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

var retiro_cuenta_corriente_funcion1=new retiro_cuenta_corriente_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {retiro_cuenta_corriente_funcion,retiro_cuenta_corriente_funcion1};

/*Para ser llamado desde window.opener*/
window.retiro_cuenta_corriente_funcion1 = retiro_cuenta_corriente_funcion1;



//</script>
