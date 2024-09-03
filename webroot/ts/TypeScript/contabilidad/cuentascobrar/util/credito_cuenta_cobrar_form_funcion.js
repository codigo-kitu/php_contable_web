//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {credito_cuenta_cobrar_constante,credito_cuenta_cobrar_constante1} from '../util/credito_cuenta_cobrar_constante.js';

class credito_cuenta_cobrar_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"credito_cuenta_cobrar");
		
		super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"credito_cuenta_cobrar");
		
		super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(credito_cuenta_cobrar_constante1.STR_ES_RELACIONES,credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO,credito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"credito_cuenta_cobrar");		
		
		if(super.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"credito_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
				
		if(super.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.hdnIdActual);
		jQuery('cmbcredito_cuenta_cobrarid_empresa').val("");
		jQuery('cmbcredito_cuenta_cobrarid_sucursal').val("");
		jQuery('cmbcredito_cuenta_cobrarid_ejercicio').val("");
		jQuery('cmbcredito_cuenta_cobrarid_periodo').val("");
		jQuery('cmbcredito_cuenta_cobrarid_usuario').val("");
		jQuery('cmbcredito_cuenta_cobrarid_cuenta_cobrar').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtnumero);
		jQuery('cmbcredito_cuenta_cobrarid_forma_pago_cliente').val("");
		jQuery('dtcredito_cuenta_cobrarfecha_emision').val(new Date());
		jQuery('dtcredito_cuenta_cobrarfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtabono);
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdescripcion);
		jQuery('cmbcredito_cuenta_cobrarid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtreferencia);
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdebito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocredito_cuenta_cobrar.txtcredito);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcredito_cuenta_cobrar.txtNumeroRegistroscredito_cuenta_cobrar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'credito_cuenta_cobrars',strNumeroRegistros,document.frmParamsBuscarcredito_cuenta_cobrar.txtNumeroRegistroscredito_cuenta_cobrar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(credito_cuenta_cobrar_constante1) {
		
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
		
		
		if(credito_cuenta_cobrar_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_cuenta_cobrar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-id_forma_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-abono": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado": {
					digits:true
				
				},
					
				"form-referencia": {
					maxlength:25
					,regexpStringMethod:true
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
					"form-id_cuenta_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_forma_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-abono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(credito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_credito_cuenta_cobrar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-id_cuenta_cobrar": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_credito_cuenta_cobrar-id_forma_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_credito_cuenta_cobrar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_credito_cuenta_cobrar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_credito_cuenta_cobrar-abono": {
					required:true,
					number:true
				},
					
				"form_credito_cuenta_cobrar-saldo": {
					required:true,
					number:true
				},
					
				"form_credito_cuenta_cobrar-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_credito_cuenta_cobrar-id_estado": {
					digits:true
				
				},
					
				"form_credito_cuenta_cobrar-referencia": {
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_credito_cuenta_cobrar-debito": {
					required:true,
					number:true
				},
					
				"form_credito_cuenta_cobrar-credito": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_credito_cuenta_cobrar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_cuenta_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_forma_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_credito_cuenta_cobrar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_credito_cuenta_cobrar-abono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_credito_cuenta_cobrar-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_credito_cuenta_cobrar-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_credito_cuenta_cobrar-id_estado": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_credito_cuenta_cobrar-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_credito_cuenta_cobrar-debito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_credito_cuenta_cobrar-credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(credito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocredito_cuenta_cobrar").validate(arrRules);
		
		if(credito_cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescredito_cuenta_cobrar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			credito_cuenta_cobrarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"credito_cuenta_cobrar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtabono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtreferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdebito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtcredito,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtabono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtreferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtdebito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocredito_cuenta_cobrar.txtcredito,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,credito_cuenta_cobrar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,credito_cuenta_cobrar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"credito_cuenta_cobrar");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(credito_cuenta_cobrar_constante1.STR_RELATIVE_PATH,"credito_cuenta_cobrar");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"credito_cuenta_cobrar");
		
		super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(credito_cuenta_cobrar_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"credito_cuenta_cobrar");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(credito_cuenta_cobrar_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(credito_cuenta_cobrar_constante1,"credito_cuenta_cobrar");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,credito_cuenta_cobrar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var credito_cuenta_cobrar_funcion1=new credito_cuenta_cobrar_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {credito_cuenta_cobrar_funcion,credito_cuenta_cobrar_funcion1};

//Para ser llamado desde window.opener
window.credito_cuenta_cobrar_funcion1 = credito_cuenta_cobrar_funcion1;



//</script>
