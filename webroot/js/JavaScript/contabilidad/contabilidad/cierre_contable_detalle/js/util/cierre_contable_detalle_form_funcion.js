//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {cierre_contable_detalle_constante,cierre_contable_detalle_constante1} from '../util/cierre_contable_detalle_constante.js';


class cierre_contable_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(cierre_contable_detalle_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cierre_contable_detalle");		
		super.procesarInicioProceso(cierre_contable_detalle_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"cierre_contable_detalle");		
		super.procesarInicioProceso(cierre_contable_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(cierre_contable_detalle_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(cierre_contable_detalle_constante1.STR_ES_RELACIONES,cierre_contable_detalle_constante1.STR_ES_RELACIONADO,cierre_contable_detalle_constante1.STR_RELATIVE_PATH,"cierre_contable_detalle");		
		
		if(super.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(cierre_contable_detalle_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cierre_contable_detalle");		
		super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle");
				
		if(super.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocierre_contable_detalle.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocierre_contable_detalle.txtid_detalle);
		jQuery('cmbcierre_contable_detalleid_cierre_contable').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocierre_contable_detalle.txtnro_doc);
		funcionGeneral.setEmptyControl(document.frmMantenimientocierre_contable_detalle.txttipo_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientocierre_contable_detalle.txtmonto);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcierre_contable_detalle.txtNumeroRegistroscierre_contable_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cierre_contable_detalles',strNumeroRegistros,document.frmParamsBuscarcierre_contable_detalle.txtNumeroRegistroscierre_contable_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(cierre_contable_detalle_constante1) {
		
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
		
		
		if(cierre_contable_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_detalle": {
					required:true,
					digits:true
				},
					
				"form-id_cierre_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-tipo_factura": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cierre_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(cierre_contable_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cierre_contable_detalle-id_detalle": {
					required:true,
					digits:true
				},
					
				"form_cierre_contable_detalle-id_cierre_contable": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cierre_contable_detalle-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_cierre_contable_detalle-tipo_factura": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_cierre_contable_detalle-monto": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_cierre_contable_detalle-id_detalle": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cierre_contable_detalle-id_cierre_contable": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cierre_contable_detalle-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cierre_contable_detalle-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cierre_contable_detalle-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(cierre_contable_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientocierre_contable_detalle").validate(arrRules);
		
		if(cierre_contable_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescierre_contable_detalle").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cierre_contable_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cierre_contable_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtid_detalle,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtnro_doc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txttipo_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtmonto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtid_detalle,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtnro_doc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txttipo_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocierre_contable_detalle.txtmonto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cierre_contable_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cierre_contable_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cierre_contable_detalle"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(cierre_contable_detalle_constante1.STR_RELATIVE_PATH,"cierre_contable_detalle"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"cierre_contable_detalle");
	
		super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(cierre_contable_detalle_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(cierre_contable_detalle_constante1,"cierre_contable_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(cierre_contable_detalle_constante1,"cierre_contable_detalle"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cierre_contable_detalle"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(cierre_contable_detalle_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(cierre_contable_detalle_constante1,"cierre_contable_detalle");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,cierre_contable_detalle_webcontrol1) {
	
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

var cierre_contable_detalle_funcion1=new cierre_contable_detalle_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {cierre_contable_detalle_funcion,cierre_contable_detalle_funcion1};

/*Para ser llamado desde window.opener*/
window.cierre_contable_detalle_funcion1 = cierre_contable_detalle_funcion1;



//</script>
