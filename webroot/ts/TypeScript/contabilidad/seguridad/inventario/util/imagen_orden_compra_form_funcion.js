//<script type="text/javascript" language="javascript">


import {imagen_orden_compra_constante,imagen_orden_compra_constante1} from '../util/imagen_orden_compra_constante.js';

class imagen_orden_compra_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(imagen_orden_compra_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_orden_compra");
		
		super.procesarInicioProceso(imagen_orden_compra_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_orden_compra");
		
		super.procesarInicioProceso(imagen_orden_compra_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(imagen_orden_compra_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(imagen_orden_compra_constante1.STR_ES_RELACIONES,imagen_orden_compra_constante1.STR_ES_RELACIONADO,imagen_orden_compra_constante1.STR_RELATIVE_PATH,"imagen_orden_compra");		
		
		if(super.esPaginaForm(imagen_orden_compra_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(imagen_orden_compra_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_orden_compra");
		
		super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
				
		if(super.esPaginaForm(imagen_orden_compra_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_orden_compra.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_orden_compra.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoimagen_orden_compra.txtnro_compra);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarimagen_orden_compra.txtNumeroRegistrosimagen_orden_compra,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'imagen_orden_compras',strNumeroRegistros,document.frmParamsBuscarimagen_orden_compra.txtNumeroRegistrosimagen_orden_compra);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(imagen_orden_compra_constante1) {
		
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
		
		
		if(imagen_orden_compra_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nro_compra": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(imagen_orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_imagen_orden_compra-imagen": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_imagen_orden_compra-nro_compra": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_imagen_orden_compra-imagen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_imagen_orden_compra-nro_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(imagen_orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoimagen_orden_compra").validate(arrRules);
		
		if(imagen_orden_compra_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesimagen_orden_compra").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			imagen_orden_compraFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"imagen_orden_compra");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_orden_compra.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_orden_compra.txtnro_compra,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_orden_compra.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoimagen_orden_compra.txtnro_compra,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,imagen_orden_compra_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,imagen_orden_compra_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"imagen_orden_compra");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_orden_compra_constante1.STR_RELATIVE_PATH,"imagen_orden_compra");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"imagen_orden_compra");
		
		super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_orden_compra_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_orden_compra_constante1,"imagen_orden_compra");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_orden_compra");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_orden_compra_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_orden_compra_constante1,"imagen_orden_compra");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_orden_compra_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_orden_compra_funcion1=new imagen_orden_compra_funcion(); //var

export {imagen_orden_compra_funcion,imagen_orden_compra_funcion1};

//Para ser llamado desde window.opener
window.imagen_orden_compra_funcion1 = imagen_orden_compra_funcion1;



//</script>
