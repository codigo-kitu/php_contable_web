//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {otro_parametro_constante,otro_parametro_constante1} from '../util/otro_parametro_constante.js';


class otro_parametro_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(otro_parametro_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_parametro");		
		super.procesarInicioProceso(otro_parametro_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"otro_parametro");		
		super.procesarInicioProceso(otro_parametro_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(otro_parametro_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(otro_parametro_constante1.STR_ES_RELACIONES,otro_parametro_constante1.STR_ES_RELACIONADO,otro_parametro_constante1.STR_RELATIVE_PATH,"otro_parametro");		
		
		if(super.esPaginaForm(otro_parametro_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(otro_parametro_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_parametro");		
		super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro");
				
		if(super.esPaginaForm(otro_parametro_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtcodigo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtgrupo);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txttexto1);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtorden);
		funcionGeneral.setEmptyControl(document.frmMantenimientootro_parametro.txtmonto1);
		funcionGeneral.setCheckControl(document.frmMantenimientootro_parametro.chbactivo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarotro_parametro.txtNumeroRegistrosotro_parametro,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'otro_parametroes',strNumeroRegistros,document.frmParamsBuscarotro_parametro.txtNumeroRegistrosotro_parametro);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(otro_parametro_constante1) {
		
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
		
		
		if(otro_parametro_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-codigo2": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-grupo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-texto1": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-orden": {
					required:true,
					digits:true
				},
					
				"form-monto1": {
					required:true,
					number:true
				},
					
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-grupo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-texto1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-monto1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
				}		
			};	
		
			
			if(otro_parametro_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_otro_parametro-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_otro_parametro-codigo2": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_otro_parametro-grupo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_otro_parametro-descripcion": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_otro_parametro-texto1": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_otro_parametro-orden": {
					required:true,
					digits:true
				},
					
				"form_otro_parametro-monto1": {
					required:true,
					number:true
				},
					
				},
				
				messages: {
					"form_otro_parametro-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_parametro-codigo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_parametro-grupo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_parametro-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_parametro-texto1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_otro_parametro-orden": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_otro_parametro-monto1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
				}		
			};	



			if(otro_parametro_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientootro_parametro").validate(arrRules);
		
		if(otro_parametro_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesotro_parametro").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			otro_parametroFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"otro_parametro");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtcodigo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtgrupo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txttexto1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtorden,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtmonto1,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientootro_parametro.chbactivo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtcodigo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtgrupo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txttexto1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtorden,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientootro_parametro.txtmonto1,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientootro_parametro.chbactivo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,otro_parametro_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,otro_parametro_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"otro_parametro"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(otro_parametro_constante1.STR_RELATIVE_PATH,"otro_parametro"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"otro_parametro");
	
		super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(otro_parametro_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(otro_parametro_constante1,"otro_parametro"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(otro_parametro_constante1,"otro_parametro"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"otro_parametro"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(otro_parametro_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(otro_parametro_constante1,"otro_parametro");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,otro_parametro_webcontrol1) {
	
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

var otro_parametro_funcion1=new otro_parametro_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {otro_parametro_funcion,otro_parametro_funcion1};

/*Para ser llamado desde window.opener*/
window.otro_parametro_funcion1 = otro_parametro_funcion1;



//</script>
