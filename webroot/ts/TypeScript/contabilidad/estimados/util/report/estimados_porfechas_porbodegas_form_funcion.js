<script type="text/javascript" language="javascript">


class estimados_porfechas_porbodegas_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"estimados_porfechas_porbodegas");
		
		super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"estimados_porfechas_porbodegas");
		
		super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONES,estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO,estimados_porfechas_porbodegas_constante1.STR_RELATIVE_PATH,"estimados_porfechas_porbodegas");		
		
		if(super.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"estimados_porfechas_porbodegas");
		
		super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
				
		if(super.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.hdnIdActual);
		jQuery('dtestimados_porfechas_porbodegasfecha_emision_desde').val(new Date());
		jQuery('dtestimados_porfechas_porbodegasfecha_emision_hasta').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_desde);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_hasta);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnumero);
		jQuery('dtestimados_porfechas_porbodegasfecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttipo_cambio);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtmoneda);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtprecio);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_dato);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_productos);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtsubtotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcosto);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarestimados_porfechas_porbodegas.txtNumeroRegistrosestimados_porfechas_porbodegas,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'estimados_porfechas_porbodegases',strNumeroRegistros,document.frmParamsBuscarestimados_porfechas_porbodegas.txtNumeroRegistrosestimados_porfechas_porbodegas);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(estimados_porfechas_porbodegas_constante1) {
		
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
		
		
		if(estimados_porfechas_porbodegas_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-fecha_emision_desde": {
					required:true,
					date:true
				},
					
				"form-fecha_emision_hasta": {
					required:true,
					date:true
				},
					
				"form-codigo_desde": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-codigo_hasta": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-tipo_cambio": {
					required:true,
					digits:true
				},
					
				"form-moneda": {
					required:true,
					digits:true
				},
					
				"form-precio": {
					required:true,
					number:true
				},
					
				"form-total_iva_monto": {
					required:true,
					number:true
				},
					
				"form-codigo_dato": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-nombre_completo": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-codigo_productos": {
					required:true,
					digits:true
				},
					
				"form-subtotal": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-otro_monto": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-costo": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form-fecha_emision_desde": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_emision_hasta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-codigo_desde": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_hasta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-codigo_dato": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-codigo_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-subtotal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	
		
			
			if(estimados_porfechas_porbodegas_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_estimados_porfechas_porbodegas-fecha_emision_desde": {
					required:true,
					date:true
				},
					
				"form_estimados_porfechas_porbodegas-fecha_emision_hasta": {
					required:true,
					date:true
				},
					
				"form_estimados_porfechas_porbodegas-codigo_desde": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-codigo_hasta": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_estimados_porfechas_porbodegas-tipo_cambio": {
					required:true,
					digits:true
				},
					
				"form_estimados_porfechas_porbodegas-moneda": {
					required:true,
					digits:true
				},
					
				"form_estimados_porfechas_porbodegas-precio": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-total_iva_monto": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-codigo_dato": {
					required:true,
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-nombre": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-nombre_completo": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_estimados_porfechas_porbodegas-codigo_productos": {
					required:true,
					digits:true
				},
					
				"form_estimados_porfechas_porbodegas-subtotal": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-iva_monto": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-otro_monto": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-total": {
					required:true,
					number:true
				},
					
				"form_estimados_porfechas_porbodegas-costo": {
					required:true,
					number:true
				}
				},
				
				messages: {
					"form_estimados_porfechas_porbodegas-fecha_emision_desde": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimados_porfechas_porbodegas-fecha_emision_hasta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimados_porfechas_porbodegas-codigo_desde": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-codigo_hasta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_estimados_porfechas_porbodegas-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-total_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-codigo_dato": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-nombre_completo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-codigo_productos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_estimados_porfechas_porbodegas-subtotal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_estimados_porfechas_porbodegas-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO
				}		
			};	



			if(estimados_porfechas_porbodegas_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoestimados_porfechas_porbodegas").validate(arrRules);
		
		if(estimados_porfechas_porbodegas_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesestimados_porfechas_porbodegas").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision_desde").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_emision_hasta").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#Busquedaestimados_porfechas_porbodegas-dtfecha_emision_desde").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#Busquedaestimados_porfechas_porbodegas-dtfecha_emision_hasta").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorfechas-dtfecha_emision_desde").datepicker({ dateFormat: 'yy-mm-dd' });
	jQuery("#BusquedaPorfechas-dtfecha_emision_hasta").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			estimados_porfechas_porbodegasFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"estimados_porfechas_porbodegas");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_desde,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_hasta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttipo_cambio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtmoneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtprecio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_dato,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_productos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtsubtotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcosto,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_desde,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_hasta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttipo_cambio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtmoneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtprecio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_dato,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcodigo_productos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtsubtotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoestimados_porfechas_porbodegas.txtcosto,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,estimados_porfechas_porbodegas_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,estimados_porfechas_porbodegas_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"estimados_porfechas_porbodegas");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(estimados_porfechas_porbodegas_constante1.STR_RELATIVE_PATH,"estimados_porfechas_porbodegas");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"estimados_porfechas_porbodegas");
		
		super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(estimados_porfechas_porbodegas_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"estimados_porfechas_porbodegas");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(estimados_porfechas_porbodegas_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(estimados_porfechas_porbodegas_constante1,"estimados_porfechas_porbodegas");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,estimados_porfechas_porbodegas_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var estimados_porfechas_porbodegas_funcion1=new estimados_porfechas_porbodegas_funcion(); //var


</script>
