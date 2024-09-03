//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {parametro_general_sg_constante,parametro_general_sg_constante1} from '../util/parametro_general_sg_constante.js';


class parametro_general_sg_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(parametro_general_sg_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general_sg");		
		super.procesarInicioProceso(parametro_general_sg_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general_sg");		
		super.procesarInicioProceso(parametro_general_sg_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(parametro_general_sg_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_general_sg_constante1.STR_ES_RELACIONES,parametro_general_sg_constante1.STR_ES_RELACIONADO,parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg");		
		
		if(super.esPaginaForm(parametro_general_sg_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(parametro_general_sg_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general_sg");		
		super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg");
				
		if(super.esPaginaForm(parametro_general_sg_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,false);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_general_sg.txtNumeroRegistrosparametro_general_sg,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_general_sges',strNumeroRegistros,document.frmParamsBuscarparametro_general_sg.txtNumeroRegistrosparametro_general_sg);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(parametro_general_sg_constante1) {
		
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
		
		
		if(parametro_general_sg_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nombre_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_simple_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_empresa": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-version_sistema": {
					required:true,
					number:true
				},
					
				"form-siglas_sistema": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form-mail_sistema": {
					maxlength:100
					,email:true
				},
					
				"form-telefono_sistema": {
					maxlength:50
					,regexpTelefonoMethod:true
				},
					
				"form-fax_sistema": {
					maxlength:50
					,regexpFaxMethod:true
				},
					
				"form-representante_nombre": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-codigo_proceso_actualizacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form-nombre_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_simple_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-version_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-siglas_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-mail_sistema": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-telefono_sistema": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-fax_sistema": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-representante_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_proceso_actualizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	
		
			
			if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_general_sg-nombre_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-nombre_simple_sistema": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-nombre_empresa": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-version_sistema": {
					required:true,
					number:true
				},
					
				"form_parametro_general_sg-siglas_sistema": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-mail_sistema": {
					maxlength:100
					,email:true
				},
					
				"form_parametro_general_sg-telefono_sistema": {
					maxlength:50
					,regexpTelefonoMethod:true
				},
					
				"form_parametro_general_sg-fax_sistema": {
					maxlength:50
					,regexpFaxMethod:true
				},
					
				"form_parametro_general_sg-representante_nombre": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_parametro_general_sg-codigo_proceso_actualizacion": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				},
				
				messages: {
					"form_parametro_general_sg-nombre_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-nombre_simple_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-nombre_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-version_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_parametro_general_sg-siglas_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-mail_sistema": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_parametro_general_sg-telefono_sistema": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_parametro_general_sg-fax_sistema": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_parametro_general_sg-representante_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_parametro_general_sg-codigo_proceso_actualizacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
				}		
			};	



			if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientoparametro_general_sg").validate(arrRules);
		
		if(parametro_general_sg_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_general_sg").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_general_sgFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_general_sg");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_simple_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtnombre_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtversion_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtsiglas_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtmail_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txttelefono_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtfax_sistema,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtrepresentante_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_sg.txtcodigo_proceso_actualizacion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_sg.chbesta_activo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_general_sg_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_general_sg_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_general_sg"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(parametro_general_sg_constante1.STR_RELATIVE_PATH,"parametro_general_sg"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general_sg");
	
		super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(parametro_general_sg_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(parametro_general_sg_constante1,"parametro_general_sg"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(parametro_general_sg_constante1,"parametro_general_sg"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_general_sg"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(parametro_general_sg_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(parametro_general_sg_constante1,"parametro_general_sg");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_general_sg_webcontrol1) {
	
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

var parametro_general_sg_funcion1=new parametro_general_sg_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {parametro_general_sg_funcion,parametro_general_sg_funcion1};

/*Para ser llamado desde window.opener*/
window.parametro_general_sg_funcion1 = parametro_general_sg_funcion1;



//</script>
