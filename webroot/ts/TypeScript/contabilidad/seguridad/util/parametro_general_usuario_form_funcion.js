//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_general_usuario_constante,parametro_general_usuario_constante1} from '../util/parametro_general_usuario_constante.js';

class parametro_general_usuario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(parametro_general_usuario_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general_usuario");
		
		super.procesarInicioProceso(parametro_general_usuario_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"parametro_general_usuario");
		
		super.procesarInicioProceso(parametro_general_usuario_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(parametro_general_usuario_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(parametro_general_usuario_constante1.STR_ES_RELACIONES,parametro_general_usuario_constante1.STR_ES_RELACIONADO,parametro_general_usuario_constante1.STR_RELATIVE_PATH,"parametro_general_usuario");		
		
		if(super.esPaginaForm(parametro_general_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(parametro_general_usuario_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general_usuario");
		
		super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
				
		if(super.esPaginaForm(parametro_general_usuario_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		document.frmMantenimientoparametro_general_usuario.hdnIdActual.value=""
		jQuery('cmbparametro_general_usuarioid_tipo_fondo').val("");
		jQuery('cmbparametro_general_usuarioid_empresa').val("");
		jQuery('cmbparametro_general_usuarioid_sucursal').val("");
		jQuery('cmbparametro_general_usuarioid_ejercicio').val("");
		jQuery('cmbparametro_general_usuarioid_periodo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoparametro_general_usuario.txtpath_exportar);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_cabecera,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_campo_version,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_botones_tool_bar,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_cargar_por_parte,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_guardar_relaciones,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_mostrar_acciones_campo_general,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoparametro_general_usuario.chbcon_mensaje_confirmacion,false);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarparametro_general_usuario.txtNumeroRegistrosparametro_general_usuario,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'parametro_general_usuarioes',strNumeroRegistros,document.frmParamsBuscarparametro_general_usuario.txtNumeroRegistrosparametro_general_usuario);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(parametro_general_usuario_constante1) {
		
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
		
		
		if(parametro_general_usuario_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_tipo_fondo": {
					required:true,
					digits:true
					,min:0
				},
					
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
					
				"form-path_exportar": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
					
					
					
					
					
					
				},
				
				messages: {
					"form-id_tipo_fondo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-path_exportar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
					
					
					
				}		
			};	
		
			
			if(parametro_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_parametro_general_usuario-id_tipo_fondo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general_usuario-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general_usuario-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general_usuario-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general_usuario-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_parametro_general_usuario-path_exportar": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
					
					
					
					
					
					
				},
				
				messages: {
					"form_parametro_general_usuario-id_tipo_fondo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general_usuario-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general_usuario-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general_usuario-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general_usuario-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_parametro_general_usuario-path_exportar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
					
					
					
				}		
			};	



			if(parametro_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoparametro_general_usuario").validate(arrRules);
		
		if(parametro_general_usuario_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesparametro_general_usuario").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			parametro_general_usuarioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"parametro_general_usuario");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_usuario.txtpath_exportar,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_cabecera,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_campo_version,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_botones_tool_bar,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_cargar_por_parte,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_guardar_relaciones,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_mostrar_acciones_campo_general,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_mensaje_confirmacion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoparametro_general_usuario.txtpath_exportar,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_cabecera,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_exportar_campo_version,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_botones_tool_bar,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_cargar_por_parte,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_guardar_relaciones,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_mostrar_acciones_campo_general,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoparametro_general_usuario.chbcon_mensaje_confirmacion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,parametro_general_usuario_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,parametro_general_usuario_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"parametro_general_usuario");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(parametro_general_usuario_constante1.STR_RELATIVE_PATH,"parametro_general_usuario");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"parametro_general_usuario");
		
		super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(parametro_general_usuario_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(parametro_general_usuario_constante1,"parametro_general_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"parametro_general_usuario");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(parametro_general_usuario_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(parametro_general_usuario_constante1,"parametro_general_usuario");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,parametro_general_usuario_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var parametro_general_usuario_funcion1=new parametro_general_usuario_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {parametro_general_usuario_funcion,parametro_general_usuario_funcion1};

//Para ser llamado desde window.opener
window.parametro_general_usuario_funcion1 = parametro_general_usuario_funcion1;



//</script>
