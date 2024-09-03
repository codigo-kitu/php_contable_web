//<script type="text/javascript" language="javascript">


import {imagen_kardex_constante,imagen_kardex_constante1} from '../util/imagen_kardex_constante.js';

class imagen_kardex_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_kardex");
		
		super.procesarInicioProceso(imagen_kardex_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_kardex");
		
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_kardex_constante1.STR_ES_RELACIONES,imagen_kardex_constante1.STR_ES_RELACIONADO,imagen_kardex_constante1.STR_RELATIVE_PATH,"imagen_kardex");		
		
		if(super.esPaginaForm(imagen_kardex_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_kardex");
		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
				
		if(super.esPaginaForm(imagen_kardex_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_kardex.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_kardex.txtnro_documento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_kardex.txtimagen);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_kardex.txtNumeroRegistrosimagen_kardex,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_kardexes',strNumeroRegistros,document.frmParamsBuscarimagen_kardex.txtNumeroRegistrosimagen_kardex);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_kardex_constante1) {
		
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
		
		
		if(imagen_kardex_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_imagen_kardex-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_imagen_kardex-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_kardex-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_imagen_kardex-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_kardex").validate(arrRules);
		
		if(imagen_kardex_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_kardex").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_kardexFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_kardex");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_kardex.txtnro_documento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_kardex.txtimagen,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_kardex.txtnro_documento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_kardex.txtimagen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_kardex_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_kardex_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_kardex");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_kardex_constante1.STR_RELATIVE_PATH,"imagen_kardex");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_kardex");
		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_kardex_constante1,"imagen_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_kardex");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_kardex_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_kardex_constante1,"imagen_kardex");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_kardex_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_kardex_funcion1=new imagen_kardex_funcion(); //var

export {imagen_kardex_funcion,imagen_kardex_funcion1};

//Para ser llamado desde window.opener
window.imagen_kardex_funcion1 = imagen_kardex_funcion1;



//</script>
