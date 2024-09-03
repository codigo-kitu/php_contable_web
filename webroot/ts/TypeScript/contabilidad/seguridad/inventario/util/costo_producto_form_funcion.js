//<script type="text/javascript" language="javascript">


import {costo_producto_constante,costo_producto_constante1} from '../util/costo_producto_constante.js';

class costo_producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(costo_producto_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"costo_producto");
		
		super.procesarInicioProceso(costo_producto_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"costo_producto");
		
		super.procesarInicioProceso(costo_producto_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(costo_producto_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(costo_producto_constante1.STR_ES_RELACIONES,costo_producto_constante1.STR_ES_RELACIONADO,costo_producto_constante1.STR_RELATIVE_PATH,"costo_producto");		
		
		if(super.esPaginaForm(costo_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(costo_producto_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"costo_producto");
		
		super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
				
		if(super.esPaginaForm(costo_producto_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.hdnIdActual);
		jQuery('cmbcosto_productoid_empresa').val("");
		jQuery('cmbcosto_productoid_sucursal').val("");
		jQuery('cmbcosto_productoid_ejercicio').val("");
		jQuery('cmbcosto_productoid_periodo').val("");
		jQuery('cmbcosto_productoid_usuario').val("");
		jQuery('cmbcosto_productoid_producto').val("");
		jQuery('cmbcosto_productoid_tabla').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtidn_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtidn_detalle_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtnro_documento);
		jQuery('dtcosto_productofecha').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcosto_unitario);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcosto_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcantidad_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcosto_unitario_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientocosto_producto.txtcosto_total_origen);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcosto_producto.txtNumeroRegistroscosto_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'costo_productos',strNumeroRegistros,document.frmParamsBuscarcosto_producto.txtNumeroRegistroscosto_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(costo_producto_constante1) {
		
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
		
		
		if(costo_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
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
					
				"form-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tabla": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-idn_origen": {
					required:true,
					digits:true
				},
					
				"form-idn_detalle_origen": {
					required:true,
					digits:true
				},
					
				"form-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-fecha": {
					required:true,
					date:true
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-costo_unitario": {
					required:true,
					number:true
				},
					
				"form-costo_total": {
					required:true,
					number:true
				},
					
				"form-cantidad_origen": {
					required:true,
					number:true
				},
					
				"form-costo_unitario_origen": {
					required:true,
					number:true
				},
					
				"form-costo_total_origen": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-idn_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-idn_detalle_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo_unitario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo_unitario_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo_total_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(costo_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_costo_producto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-id_tabla": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_costo_producto-idn_origen": {
					required:true,
					digits:true
				},
					
				"form_costo_producto-idn_detalle_origen": {
					required:true,
					digits:true
				},
					
				"form_costo_producto-nro_documento": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_costo_producto-fecha": {
					required:true,
					date:true
				},
					
				"form_costo_producto-cantidad": {
					required:true,
					number:true
				},
					
				"form_costo_producto-costo_unitario": {
					required:true,
					number:true
				},
					
				"form_costo_producto-costo_total": {
					required:true,
					number:true
				},
					
				"form_costo_producto-cantidad_origen": {
					required:true,
					number:true
				},
					
				"form_costo_producto-costo_unitario_origen": {
					required:true,
					number:true
				},
					
				"form_costo_producto-costo_total_origen": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_costo_producto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-id_tabla": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-idn_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-idn_detalle_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_costo_producto-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_costo_producto-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_costo_producto-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_costo_producto-costo_unitario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_costo_producto-costo_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_costo_producto-cantidad_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_costo_producto-costo_unitario_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_costo_producto-costo_total_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(costo_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocosto_producto").validate(arrRules);
		
		if(costo_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescosto_producto").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			costo_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"costo_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtidn_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtidn_detalle_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtnro_documento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_unitario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcantidad_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_unitario_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_total_origen,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtidn_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtidn_detalle_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtnro_documento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_unitario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcantidad_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_unitario_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocosto_producto.txtcosto_total_origen,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,costo_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,costo_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"costo_producto");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(costo_producto_constante1.STR_RELATIVE_PATH,"costo_producto");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"costo_producto");
		
		super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(costo_producto_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(costo_producto_constante1,"costo_producto");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(costo_producto_constante1,"costo_producto");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"costo_producto");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(costo_producto_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(costo_producto_constante1,"costo_producto");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,costo_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var costo_producto_funcion1=new costo_producto_funcion(); //var

export {costo_producto_funcion,costo_producto_funcion1};

//Para ser llamado desde window.opener
window.costo_producto_funcion1 = costo_producto_funcion1;



//</script>
