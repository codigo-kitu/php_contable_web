//<script type="text/javascript" language="javascript">


import {kit_producto_constante,kit_producto_constante1} from '../util/kit_producto_constante.js';

class kit_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(kit_producto_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"kit_producto");
		
		super.procesarInicioProceso(kit_producto_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"kit_producto");
		
		super.procesarInicioProceso(kit_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(kit_producto_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(kit_producto_constante1.STR_ES_RELACIONES,kit_producto_constante1.STR_ES_RELACIONADO,kit_producto_constante1.STR_RELATIVE_PATH,"kit_producto");		
		
		if(super.esPaginaForm(kit_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(kit_producto_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"kit_producto");
		
		super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
				
		if(super.esPaginaForm(kit_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientokit_producto.hdnIdActual);
		funcionGeneral.setEmptyControl(document.frmMantenimientokit_producto.txtid_padre);
		funcionGeneral.setEmptyControl(document.frmMantenimientokit_producto.txtid_hijo);
		funcionGeneral.setEmptyControl(document.frmMantenimientokit_producto.txtcantidad);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarkit_producto.txtNumeroRegistroskit_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'kit_productoes',strNumeroRegistros,document.frmParamsBuscarkit_producto.txtNumeroRegistroskit_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(kit_producto_constante1) {
		
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
		
		
		if(kit_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_padre": {
					required:true,
					digits:true
				},
					
				"form-id_hijo": {
					required:true,
					digits:true
				},
					
				"form-cantidad": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_padre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_hijo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(kit_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_kit_producto-id_padre": {
					required:true,
					digits:true
				},
					
				"form_kit_producto-id_hijo": {
					required:true,
					digits:true
				},
					
				"form_kit_producto-cantidad": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_kit_producto-id_padre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kit_producto-id_hijo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_kit_producto-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(kit_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientokit_producto").validate(arrRules);
		
		if(kit_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleskit_producto").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			kit_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"kit_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtid_padre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtid_hijo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtcantidad,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtid_padre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtid_hijo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientokit_producto.txtcantidad,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,kit_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,kit_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"kit_producto");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(kit_producto_constante1.STR_RELATIVE_PATH,"kit_producto");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"kit_producto");
		
		super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(kit_producto_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(kit_producto_constante1,"kit_producto");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(kit_producto_constante1,"kit_producto");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"kit_producto");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(kit_producto_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(kit_producto_constante1,"kit_producto");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,kit_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var kit_producto_funcion1=new kit_producto_funcion(); //var

export {kit_producto_funcion,kit_producto_funcion1};

//Para ser llamado desde window.opener
window.kit_producto_funcion1 = kit_producto_funcion1;



//</script>
