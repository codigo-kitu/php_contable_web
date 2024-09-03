//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {municipio_constante,municipio_constante1} from '../util/municipio_constante.js';


class municipio_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*super.procesarInicioProceso(municipio_constante1);*/ 
	}
	
	nuevoOnComplete() { 
		/*super.procesarFinalizacionProceso(municipio_constante1,"municipio");*/ 
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"municipio");		
		super.procesarInicioProceso(municipio_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(municipio_constante1,"municipio"); 
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"municipio");		
		super.procesarInicioProceso(municipio_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		super.procesarFinalizacionProceso(municipio_constante1,"municipio"); 
	}
/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		super.procesarInicioProceso(municipio_constante1); 
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(municipio_constante1.STR_ES_RELACIONES,municipio_constante1.STR_ES_RELACIONADO,municipio_constante1.STR_RELATIVE_PATH,"municipio");		
		
		if(super.esPaginaForm(municipio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		super.procesarInicioProceso(municipio_constante1); 
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"municipio");		
		super.procesarFinalizacionProceso(municipio_constante1,"municipio");
				
		if(super.esPaginaForm(municipio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.txtmunicipio);
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.txtdepartamento);
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.txtcodigo_departamento);
		funcionGeneral.setEmptyControl(document.frmMantenimientomunicipio.txtcodigo_municipio);	
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/
	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarmunicipio.txtNumeroRegistrosmunicipio,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'municipios',strNumeroRegistros,document.frmParamsBuscarmunicipio.txtNumeroRegistrosmunicipio);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	/*------------- Formulario-Archivos -------------------*/






/*------------- Formulario-Validacion -------------------*/
	validarFormularioJQuery(municipio_constante1) {
		
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
		
		
		if(municipio_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-municipio": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-departamento": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-codigo_departamento": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form-codigo_municipio": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-municipio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-departamento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_departamento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_municipio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(municipio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_municipio-codigo": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_municipio-municipio": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_municipio-departamento": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_municipio-codigo_departamento": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_municipio-codigo_municipio": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_municipio-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_municipio-municipio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_municipio-departamento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_municipio-codigo_departamento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_municipio-codigo_municipio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(municipio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}						
		
		/*DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)*/
		
		jQuery("#frmMantenimientomunicipio").validate(arrRules);
		
		if(municipio_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesmunicipio").validate(arrRulesTotales);
		}
				
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			municipioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"municipio");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtmunicipio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtdepartamento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo_departamento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo_municipio,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtmunicipio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtdepartamento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo_departamento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientomunicipio.txtcodigo_municipio,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,municipio_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,municipio_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"municipio"); 
	}
	
		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(municipio_constante1.STR_RELATIVE_PATH,"municipio"); 
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"municipio");
	
		super.procesarFinalizacionProceso(municipio_constante1,"municipio");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(municipio_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(municipio_constante1,"municipio"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(municipio_constante1,"municipio"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"municipio"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(municipio_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(municipio_constante1,"municipio");	
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
	setTipoRelacionAccion(strValueTipoRelacion,idActual,municipio_webcontrol1) {
	
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

var municipio_funcion1=new municipio_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {municipio_funcion,municipio_funcion1};

/*Para ser llamado desde window.opener*/
window.municipio_funcion1 = municipio_funcion1;



//</script>
