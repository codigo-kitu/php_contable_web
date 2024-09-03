//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {instrumento_pago_constante,instrumento_pago_constante1} from '../util/instrumento_pago_constante.js';


class instrumento_pago_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(instrumento_pago_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"instrumento_pago");		
		super.procesarInicioProceso(instrumento_pago_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"instrumento_pago");		
		super.procesarInicioProceso(instrumento_pago_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(instrumento_pago_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(instrumento_pago_constante1.STR_ES_RELACIONES,instrumento_pago_constante1.STR_ES_RELACIONADO,instrumento_pago_constante1.STR_RELATIVE_PATH,"instrumento_pago");		
		
		if(super.esPaginaForm(instrumento_pago_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(instrumento_pago_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"instrumento_pago");		
		super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago");
				
		if(super.esPaginaForm(instrumento_pago_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.txtpredeterminado);
		jQuery('cmbinstrumento_pagoid_cuenta_compras').val("");
		jQuery('cmbinstrumento_pagoid_cuenta_ventas').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_compra);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_ventas);
		jQuery('cmbinstrumento_pagoid_cuenta_corriente').val("");	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarinstrumento_pago.txtNumeroRegistrosinstrumento_pago,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'instrumento_pagos',strNumeroRegistros,document.frmParamsBuscarinstrumento_pago.txtNumeroRegistrosinstrumento_pago);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(instrumento_pago_constante1) {
		
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
		
		
		if(instrumento_pago_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-predeterminado": {
					required:true,
					digits:true
				},
					
				"form-id_cuenta_compras": {
					digits:true
				
				},
					
				"form-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form-cuenta_contable_compra": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cuenta_contable_ventas": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-predeterminado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_contable_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(instrumento_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_instrumento_pago-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_instrumento_pago-descripcion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_instrumento_pago-predeterminado": {
					required:true,
					digits:true
				},
					
				"form_instrumento_pago-id_cuenta_compras": {
					digits:true
				
				},
					
				"form_instrumento_pago-id_cuenta_ventas": {
					digits:true
				
				},
					
				"form_instrumento_pago-cuenta_contable_compra": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_instrumento_pago-cuenta_contable_ventas": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_instrumento_pago-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_instrumento_pago-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_instrumento_pago-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_instrumento_pago-predeterminado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_instrumento_pago-id_cuenta_compras": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_instrumento_pago-id_cuenta_ventas": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_instrumento_pago-cuenta_contable_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_instrumento_pago-cuenta_contable_ventas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_instrumento_pago-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(instrumento_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoinstrumento_pago").validate(arrRules);
		
		if(instrumento_pago_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesinstrumento_pago").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			instrumento_pagoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"instrumento_pago");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_ventas,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinstrumento_pago.txtcuenta_contable_ventas,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,instrumento_pago_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,instrumento_pago_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"instrumento_pago"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(instrumento_pago_constante1.STR_RELATIVE_PATH,"instrumento_pago"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"instrumento_pago");
	
		super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(instrumento_pago_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(instrumento_pago_constante1,"instrumento_pago"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(instrumento_pago_constante1,"instrumento_pago"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"instrumento_pago"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(instrumento_pago_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(instrumento_pago_constante1,"instrumento_pago");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,instrumento_pago_webcontrol1) {
	
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

var instrumento_pago_funcion1=new instrumento_pago_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {instrumento_pago_funcion,instrumento_pago_funcion1};

/*Para ser llamado desde window.opener*/
window.instrumento_pago_funcion1 = instrumento_pago_funcion1;



//</script>
