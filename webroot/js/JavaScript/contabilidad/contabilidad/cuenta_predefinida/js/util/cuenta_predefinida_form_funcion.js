//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cuenta_predefinida_constante,cuenta_predefinida_constante1} from '../util/cuenta_predefinida_constante.js';


class cuenta_predefinida_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cuenta_predefinida_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_predefinida");		
		super.procesarInicioProceso(cuenta_predefinida_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_predefinida");		
		super.procesarInicioProceso(cuenta_predefinida_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cuenta_predefinida_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_predefinida_constante1.STR_ES_RELACIONES,cuenta_predefinida_constante1.STR_ES_RELACIONADO,cuenta_predefinida_constante1.STR_RELATIVE_PATH,"cuenta_predefinida");		
		
		if(super.esPaginaForm(cuenta_predefinida_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cuenta_predefinida_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_predefinida");		
		super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida");
				
		if(super.esPaginaForm(cuenta_predefinida_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbcuenta_predefinidaid_empresa').val("");
		jQuery('cmbcuenta_predefinidaid_tipo_cuenta_predefinida').val("");
		jQuery('cmbcuenta_predefinidaid_tipo_cuenta').val("");
		jQuery('cmbcuenta_predefinidaid_tipo_nivel_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_tabla);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_cuenta);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtnombre_cuenta);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtmonto_minimo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtvalor_retencion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtbalance);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtporcentaje_base);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtseleccionar);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_predefinida.chbcentro_costos,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_predefinida.chbretencion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_predefinida.chbusa_base,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_predefinida.chbnit,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta_predefinida.chbmodifica,false);
		jQuery('dtcuenta_predefinidaultima_transaccion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtcomenta1);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_predefinida.txtcomenta2);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_predefinida.txtNumeroRegistroscuenta_predefinida,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_predefinidaes',strNumeroRegistros,document.frmParamsBuscarcuenta_predefinida.txtNumeroRegistroscuenta_predefinida);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cuenta_predefinida_constante1) {
		
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
		
		
		if(cuenta_predefinida_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_cuenta_predefinida": {
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
					
				"form-codigo_tabla": {
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-codigo_cuenta": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-nombre_cuenta": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-monto_minimo": {
					required:true,
					number:true
				},
					
				"form-valor_retencion": {
					required:true,
					number:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-porcentaje_base": {
					required:true,
					number:true
				},
					
				"form-seleccionar": {
					required:true,
					digits:true
				},
					
					
					
					
					
					
				"form-ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form-comenta1": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-comenta2": {
					maxlength:60
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_cuenta_predefinida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo_tabla": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto_minimo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-seleccionar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-comenta1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comenta2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_predefinida-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_predefinida-id_tipo_cuenta_predefinida": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_predefinida-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_predefinida-id_tipo_nivel_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_predefinida-codigo_tabla": {
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_cuenta_predefinida-codigo_cuenta": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cuenta_predefinida-nombre_cuenta": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cuenta_predefinida-monto_minimo": {
					required:true,
					number:true
				},
					
				"form_cuenta_predefinida-valor_retencion": {
					required:true,
					number:true
				},
					
				"form_cuenta_predefinida-balance": {
					required:true,
					number:true
				},
					
				"form_cuenta_predefinida-porcentaje_base": {
					required:true,
					number:true
				},
					
				"form_cuenta_predefinida-seleccionar": {
					required:true,
					digits:true
				},
					
					
					
					
					
					
				"form_cuenta_predefinida-ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form_cuenta_predefinida-comenta1": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cuenta_predefinida-comenta2": {
					maxlength:60
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cuenta_predefinida-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_predefinida-id_tipo_cuenta_predefinida": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_predefinida-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_predefinida-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_predefinida-codigo_tabla": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_predefinida-codigo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_predefinida-nombre_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_predefinida-monto_minimo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_predefinida-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_predefinida-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_predefinida-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_predefinida-seleccionar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form_cuenta_predefinida-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_predefinida-comenta1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_predefinida-comenta2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocuenta_predefinida").validate(arrRules);
		
		if(cuenta_predefinida_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_predefinida").validate(arrRulesTotales);
		}
				
		
		jQuery("#form-ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd' });
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_predefinidaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_predefinida");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_tabla,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_cuenta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtnombre_cuenta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtmonto_minimo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtvalor_retencion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtporcentaje_base,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtseleccionar,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbcentro_costos,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbretencion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbusa_base,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbnit,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbmodifica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcomenta1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcomenta2,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_tabla,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcodigo_cuenta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtnombre_cuenta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtmonto_minimo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtvalor_retencion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtporcentaje_base,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtseleccionar,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbcentro_costos,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbretencion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbusa_base,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbnit,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta_predefinida.chbmodifica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcomenta1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_predefinida.txtcomenta2,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_predefinida_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_predefinida_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_predefinida"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cuenta_predefinida_constante1.STR_RELATIVE_PATH,"cuenta_predefinida"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_predefinida");
	
		super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cuenta_predefinida_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_predefinida_constante1,"cuenta_predefinida"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cuenta_predefinida_constante1,"cuenta_predefinida"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_predefinida"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cuenta_predefinida_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cuenta_predefinida_constante1,"cuenta_predefinida");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_predefinida_webcontrol1) {
	
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

var cuenta_predefinida_funcion1=new cuenta_predefinida_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cuenta_predefinida_funcion,cuenta_predefinida_funcion1};

/*Para ser llamado desde window.opener*/
window.cuenta_predefinida_funcion1 = cuenta_predefinida_funcion1;



//</script>
