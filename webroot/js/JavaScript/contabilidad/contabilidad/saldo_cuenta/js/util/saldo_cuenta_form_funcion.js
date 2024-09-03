//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {saldo_cuenta_constante,saldo_cuenta_constante1} from '../util/saldo_cuenta_constante.js';


class saldo_cuenta_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(saldo_cuenta_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"saldo_cuenta");		
		super.procesarInicioProceso(saldo_cuenta_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"saldo_cuenta");		
		super.procesarInicioProceso(saldo_cuenta_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(saldo_cuenta_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(saldo_cuenta_constante1.STR_ES_RELACIONES,saldo_cuenta_constante1.STR_ES_RELACIONADO,saldo_cuenta_constante1.STR_RELATIVE_PATH,"saldo_cuenta");		
		
		if(super.esPaginaForm(saldo_cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(saldo_cuenta_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"saldo_cuenta");		
		super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta");
				
		if(super.esPaginaForm(saldo_cuenta_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbsaldo_cuentaid_empresa').val("");
		jQuery('cmbsaldo_cuentaid_ejercicio').val("");
		jQuery('cmbsaldo_cuentaid_periodo').val("");
		jQuery('cmbsaldo_cuentaid_tipo_cuenta').val("");
		jQuery('cmbsaldo_cuentaid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtsuma_debe);
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtsuma_haber);
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtdeudor);
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtacreedor);
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtsaldo);
		jQuery('dtsaldo_cuentafecha_proceso').val(new Date());
		jQuery('dtsaldo_cuentafecha_fin_mes').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txttipo_cuenta_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientosaldo_cuenta.txtcuenta_contable);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarsaldo_cuenta.txtNumeroRegistrossaldo_cuenta,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'saldo_cuentas',strNumeroRegistros,document.frmParamsBuscarsaldo_cuenta.txtNumeroRegistrossaldo_cuenta);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(saldo_cuenta_constante1) {
		
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
		
		
		if(saldo_cuenta_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
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
					
				"form-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-suma_debe": {
					required:true,
					number:true
				},
					
				"form-suma_haber": {
					required:true,
					number:true
				},
					
				"form-deudor": {
					required:true,
					number:true
				},
					
				"form-acreedor": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-fecha_proceso": {
					required:true,
					date:true
				},
					
				"form-fecha_fin_mes": {
					required:true,
					date:true
				},
					
				"form-tipo_cuenta_codigo": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-suma_debe": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-suma_haber": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-deudor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-acreedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_proceso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_fin_mes": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-tipo_cuenta_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(saldo_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_saldo_cuenta-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_saldo_cuenta-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_saldo_cuenta-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_saldo_cuenta-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_saldo_cuenta-id_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_saldo_cuenta-suma_debe": {
					required:true,
					number:true
				},
					
				"form_saldo_cuenta-suma_haber": {
					required:true,
					number:true
				},
					
				"form_saldo_cuenta-deudor": {
					required:true,
					number:true
				},
					
				"form_saldo_cuenta-acreedor": {
					required:true,
					number:true
				},
					
				"form_saldo_cuenta-saldo": {
					required:true,
					number:true
				},
					
				"form_saldo_cuenta-fecha_proceso": {
					required:true,
					date:true
				},
					
				"form_saldo_cuenta-fecha_fin_mes": {
					required:true,
					date:true
				},
					
				"form_saldo_cuenta-tipo_cuenta_codigo": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_saldo_cuenta-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_saldo_cuenta-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_saldo_cuenta-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_saldo_cuenta-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_saldo_cuenta-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_saldo_cuenta-id_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_saldo_cuenta-suma_debe": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_saldo_cuenta-suma_haber": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_saldo_cuenta-deudor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_saldo_cuenta-acreedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_saldo_cuenta-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_saldo_cuenta-fecha_proceso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_saldo_cuenta-fecha_fin_mes": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_saldo_cuenta-tipo_cuenta_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_saldo_cuenta-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(saldo_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientosaldo_cuenta").validate(arrRules);
		
		if(saldo_cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalessaldo_cuenta").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-fecha_proceso").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_fin_mes").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			saldo_cuentaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"saldo_cuenta");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsuma_debe,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsuma_haber,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtdeudor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtacreedor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txttipo_cuenta_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtcuenta_contable,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsuma_debe,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsuma_haber,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtdeudor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtacreedor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txttipo_cuenta_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosaldo_cuenta.txtcuenta_contable,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,saldo_cuenta_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,saldo_cuenta_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"saldo_cuenta"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(saldo_cuenta_constante1.STR_RELATIVE_PATH,"saldo_cuenta"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"saldo_cuenta");
	
		super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(saldo_cuenta_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(saldo_cuenta_constante1,"saldo_cuenta"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(saldo_cuenta_constante1,"saldo_cuenta"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"saldo_cuenta"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(saldo_cuenta_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(saldo_cuenta_constante1,"saldo_cuenta");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,saldo_cuenta_webcontrol1) {
	
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

var saldo_cuenta_funcion1=new saldo_cuenta_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {saldo_cuenta_funcion,saldo_cuenta_funcion1};

/*Para ser llamado desde window.opener*/
window.saldo_cuenta_funcion1 = saldo_cuenta_funcion1;



//</script>
