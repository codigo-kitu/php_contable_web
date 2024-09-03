//<script type="text/javascript" language="javascript">


import {producto_bodega_constante,producto_bodega_constante1} from '../util/producto_bodega_constante.js';

class producto_bodega_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(producto_bodega_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto_bodega");
		
		super.procesarInicioProceso(producto_bodega_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto_bodega");
		
		super.procesarInicioProceso(producto_bodega_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(producto_bodega_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(producto_bodega_constante1.STR_ES_RELACIONES,producto_bodega_constante1.STR_ES_RELACIONADO,producto_bodega_constante1.STR_RELATIVE_PATH,"producto_bodega");		
		
		if(super.esPaginaForm(producto_bodega_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(producto_bodega_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto_bodega");
		
		super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
				
		if(super.esPaginaForm(producto_bodega_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_bodega.hdnIdActual);
		jQuery('cmbproducto_bodegaid_bodega').val("");
		jQuery('cmbproducto_bodegaid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_bodega.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_bodega.txtcosto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto_bodega.txtubicacion);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproducto_bodega.txtNumeroRegistrosproducto_bodega,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'producto_bodegas',strNumeroRegistros,document.frmParamsBuscarproducto_bodega.txtNumeroRegistrosproducto_bodega);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(producto_bodega_constante1) {
		
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
		
		
		if(producto_bodega_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
				"form-ubicacion": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-ubicacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(producto_bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_producto_bodega-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto_bodega-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto_bodega-cantidad": {
					required:true,
					number:true
				},
					
				"form_producto_bodega-costo": {
					required:true,
					number:true
				},
					
				"form_producto_bodega-ubicacion": {
					maxlength:30
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_producto_bodega-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_bodega-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto_bodega-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto_bodega-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto_bodega-ubicacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(producto_bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoproducto_bodega").validate(arrRules);
		
		if(producto_bodega_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproducto_bodega").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			producto_bodegaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"producto_bodega");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtcosto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtubicacion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtcosto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto_bodega.txtubicacion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,producto_bodega_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,producto_bodega_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"producto_bodega");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(producto_bodega_constante1.STR_RELATIVE_PATH,"producto_bodega");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"producto_bodega");
		
		super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(producto_bodega_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(producto_bodega_constante1,"producto_bodega");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(producto_bodega_constante1,"producto_bodega");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"producto_bodega");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(producto_bodega_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(producto_bodega_constante1,"producto_bodega");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,producto_bodega_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var producto_bodega_funcion1=new producto_bodega_funcion(); //var

export {producto_bodega_funcion,producto_bodega_funcion1};

//Para ser llamado desde window.opener
window.producto_bodega_funcion1 = producto_bodega_funcion1;



//</script>
