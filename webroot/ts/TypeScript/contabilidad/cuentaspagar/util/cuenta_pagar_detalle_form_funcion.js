//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_pagar_detalle_constante,cuenta_pagar_detalle_constante1} from '../util/cuenta_pagar_detalle_constante.js';

class cuenta_pagar_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_pagar_detalle");
		
		super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cuenta_pagar_detalle");
		
		super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cuenta_pagar_detalle_constante1.STR_ES_RELACIONES,cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO,cuenta_pagar_detalle_constante1.STR_RELATIVE_PATH,"cuenta_pagar_detalle");		
		
		if(super.esPaginaForm(cuenta_pagar_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar_detalle");
		
		super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
				
		if(super.esPaginaForm(cuenta_pagar_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.hdnIdActual);
		jQuery('cmbcuenta_pagar_detalleid_empresa').val("");
		jQuery('cmbcuenta_pagar_detalleid_sucursal').val("");
		jQuery('cmbcuenta_pagar_detalleid_ejercicio').val("");
		jQuery('cmbcuenta_pagar_detalleid_periodo').val("");
		jQuery('cmbcuenta_pagar_detalleid_usuario').val("");
		jQuery('cmbcuenta_pagar_detalleid_cuenta_pagar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtnumero);
		jQuery('dtcuenta_pagar_detallefecha_emision').val(new Date());
		jQuery('dtcuenta_pagar_detallefecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtreferencia);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtcredito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_pagar_detalle.txtdescripcion);
		jQuery('cmbcuenta_pagar_detalleid_estado').val("");	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_pagar_detalle.txtNumeroRegistroscuenta_pagar_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_pagar_detalles',strNumeroRegistros,document.frmParamsBuscarcuenta_pagar_detalle.txtNumeroRegistroscuenta_pagar_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cuenta_pagar_detalle_constante1) {
		
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
		
		
		if(cuenta_pagar_detalle_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_cuenta_pagar": {
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
					
				"form-referencia": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-debito": {
					required:true,
					number:true
				},
					
				"form-credito": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-referencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_pagar_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_pagar_detalle-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-id_cuenta_pagar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_pagar_detalle-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cuenta_pagar_detalle-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cuenta_pagar_detalle-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_cuenta_pagar_detalle-referencia": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_cuenta_pagar_detalle-monto": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar_detalle-debito": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar_detalle-credito": {
					required:true,
					number:true
				},
					
				"form_cuenta_pagar_detalle-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_pagar_detalle-id_estado": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_cuenta_pagar_detalle-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_cuenta_pagar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_pagar_detalle-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_pagar_detalle-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_pagar_detalle-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_pagar_detalle-referencia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_pagar_detalle-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar_detalle-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar_detalle-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_pagar_detalle-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_pagar_detalle-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(cuenta_pagar_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocuenta_pagar_detalle").validate(arrRules);
		
		if(cuenta_pagar_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_pagar_detalle").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_pagar_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_pagar_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtreferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtcredito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtreferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtcredito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_pagar_detalle.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_pagar_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_pagar_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_pagar_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(cuenta_pagar_detalle_constante1.STR_RELATIVE_PATH,"cuenta_pagar_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar_detalle");
		
		super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(cuenta_pagar_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_pagar_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(cuenta_pagar_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(cuenta_pagar_detalle_constante1,"cuenta_pagar_detalle");
	}

	//------------- Formulario-Combo-Accion -------------------

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

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_pagar_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var cuenta_pagar_detalle_funcion1=new cuenta_pagar_detalle_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {cuenta_pagar_detalle_funcion,cuenta_pagar_detalle_funcion1};

//Para ser llamado desde window.opener
window.cuenta_pagar_detalle_funcion1 = cuenta_pagar_detalle_funcion1;



//</script>
