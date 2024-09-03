//<script type="text/javascript" language="javascript">


import {inventario_fisico_constante,inventario_fisico_constante1} from '../util/inventario_fisico_constante.js';

class inventario_fisico_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico");
		
		super.procesarInicioProceso(inventario_fisico_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico");
		
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(inventario_fisico_constante1.STR_ES_RELACIONES,inventario_fisico_constante1.STR_ES_RELACIONADO,inventario_fisico_constante1.STR_RELATIVE_PATH,"inventario_fisico");		
		
		if(super.esPaginaForm(inventario_fisico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"inventario_fisico");
		
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
				
		if(super.esPaginaForm(inventario_fisico_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.hdnIdActual);
		jQuery('cmbinventario_fisicoid_inventario_fisico').val("");
		jQuery('cmbinventario_fisicoid_bodega').val("");
		jQuery('dtinventario_fisicofecha').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtid_almacen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtprod_cont_almacen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txttotal_productos_almacen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoinventario_fisico.txtcampo3);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarinventario_fisico.txtNumeroRegistrosinventario_fisico,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'inventario_fisicos',strNumeroRegistros,document.frmParamsBuscarinventario_fisico.txtNumeroRegistrosinventario_fisico);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(inventario_fisico_constante1) {
		
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
		
		
		if(inventario_fisico_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_inventario_fisico": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha": {
					required:true,
					date:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form-id_almacen": {
					required:true,
					digits:true
				},
					
				"form-prod_cont_almacen": {
					required:true,
					number:true
				},
					
				"form-total_productos_almacen": {
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
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-prod_cont_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total_productos_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(inventario_fisico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_inventario_fisico-id_inventario_fisico": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_inventario_fisico-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_inventario_fisico-fecha": {
					required:true,
					date:true
				},
					
				"form_inventario_fisico-descripcion": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
				"form_inventario_fisico-id_almacen": {
					required:true,
					digits:true
				},
					
				"form_inventario_fisico-prod_cont_almacen": {
					required:true,
					number:true
				},
					
				"form_inventario_fisico-total_productos_almacen": {
					required:true,
					number:true
				},
					
				"form_inventario_fisico-campo1": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_inventario_fisico-campo2": {
					required:true,
					number:true
				},
					
				"form_inventario_fisico-campo3": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_inventario_fisico-id_inventario_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_inventario_fisico-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_inventario_fisico-id_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_inventario_fisico-prod_cont_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_inventario_fisico-total_productos_almacen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_inventario_fisico-campo1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_inventario_fisico-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_inventario_fisico-campo3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(inventario_fisico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoinventario_fisico").validate(arrRules);
		
		if(inventario_fisico_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesinventario_fisico").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			inventario_fisicoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"inventario_fisico");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtid_almacen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtprod_cont_almacen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txttotal_productos_almacen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo3,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtid_almacen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtprod_cont_almacen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txttotal_productos_almacen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoinventario_fisico.txtcampo3,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,inventario_fisico_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,inventario_fisico_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"inventario_fisico");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(inventario_fisico_constante1.STR_RELATIVE_PATH,"inventario_fisico");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"inventario_fisico");
		
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(inventario_fisico_constante1,"inventario_fisico");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"inventario_fisico");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(inventario_fisico_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(inventario_fisico_constante1,"inventario_fisico");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Inventario Fisico") {
				jQuery(".col_id_inventario_fisico").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_inventario_fisico_img').trigger("click" );
				} else {
					jQuery('#form-id_inventario_fisico_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Bodega") {
				jQuery(".col_id_bodega").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha") {
				jQuery(".col_fecha").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Almacen") {
				jQuery(".col_id_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Prod Cont Almacen") {
				jQuery(".col_prod_cont_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total Productos Almacen") {
				jQuery(".col_total_productos_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo1") {
				jQuery(".col_campo1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo2") {
				jQuery(".col_campo2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo3") {
				jQuery(".col_campo3").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,inventario_fisico_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="inventario_fisico_detalle" || strValueTipoRelacion=="Inventario Fisico Detalle") {
			inventario_fisico_webcontrol1.registrarSesionParainventario_fisico_detalles(idActual);
		}
		else if(strValueTipoRelacion=="inventario_fisico" || strValueTipoRelacion=="Inventario Fisico") {
			inventario_fisico_webcontrol1.registrarSesionParainventario_fisicos(idActual);
		}
	}
	
	
	
}

var inventario_fisico_funcion1=new inventario_fisico_funcion(); //var

export {inventario_fisico_funcion,inventario_fisico_funcion1};

//Para ser llamado desde window.opener
window.inventario_fisico_funcion1 = inventario_fisico_funcion1;



//</script>
