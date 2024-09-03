//<script type="text/javascript" language="javascript">


import {inventario_fisico_detalle_constante,inventario_fisico_detalle_constante1} from '../util/inventario_fisico_detalle_constante.js';

class inventario_fisico_detalle_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico_detalle");
		
		super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico_detalle");
		
		super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(inventario_fisico_detalle_constante1.STR_ES_RELACIONES,inventario_fisico_detalle_constante1.STR_ES_RELACIONADO,inventario_fisico_detalle_constante1.STR_RELATIVE_PATH,"inventario_fisico_detalle");		
		
		if(super.esPaginaForm(inventario_fisico_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"inventario_fisico_detalle");
		
		super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
				
		if(super.esPaginaForm(inventario_fisico_detalle_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico_detalle.hdnIdActual);
		jQuery('cmbinventario_fisico_detalleid_inventario_fisico').val("");
		jQuery('cmbinventario_fisico_detalleid_producto').val("");
		jQuery('cmbinventario_fisico_detalleid_bodega').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico_detalle.txtunidades_contadas);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo3);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarinventario_fisico_detalle.txtNumeroRegistrosinventario_fisico_detalle,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'inventario_fisico_detalles',strNumeroRegistros,document.frmParamsBuscarinventario_fisico_detalle.txtNumeroRegistrosinventario_fisico_detalle);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(inventario_fisico_detalle_constante1) {
		
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
		
		
		if(inventario_fisico_detalle_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_inventario_fisico": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-unidades_contadas": {
					required:true,
					number:true
				},
					
				"form-campo1": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-campo2": {
					required:true,
					number:true
				},
					
				"form-campo3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_inventario_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-unidades_contadas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(inventario_fisico_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_inventario_fisico_detalle-id_inventario_fisico": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_inventario_fisico_detalle-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_inventario_fisico_detalle-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_inventario_fisico_detalle-unidades_contadas": {
					required:true,
					number:true
				},
					
				"form_inventario_fisico_detalle-campo1": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_inventario_fisico_detalle-campo2": {
					required:true,
					number:true
				},
					
				"form_inventario_fisico_detalle-campo3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_inventario_fisico_detalle-id_inventario_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico_detalle-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico_detalle-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico_detalle-unidades_contadas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_inventario_fisico_detalle-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_inventario_fisico_detalle-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_inventario_fisico_detalle-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(inventario_fisico_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoinventario_fisico_detalle").validate(arrRules);
		
		if(inventario_fisico_detalle_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesinventario_fisico_detalle").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			inventario_fisico_detalleFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"inventario_fisico_detalle");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtunidades_contadas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo3,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtunidades_contadas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico_detalle.txtcampo3,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,inventario_fisico_detalle_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,inventario_fisico_detalle_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"inventario_fisico_detalle");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(inventario_fisico_detalle_constante1.STR_RELATIVE_PATH,"inventario_fisico_detalle");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"inventario_fisico_detalle");
		
		super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(inventario_fisico_detalle_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"inventario_fisico_detalle");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(inventario_fisico_detalle_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(inventario_fisico_detalle_constante1,"inventario_fisico_detalle");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,inventario_fisico_detalle_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var inventario_fisico_detalle_funcion1=new inventario_fisico_detalle_funcion(); //var

export {inventario_fisico_detalle_funcion,inventario_fisico_detalle_funcion1};

//Para ser llamado desde window.opener
window.inventario_fisico_detalle_funcion1 = inventario_fisico_detalle_funcion1;



//</script>
