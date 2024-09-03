//<script type="text/javascript" language="javascript">


//var termino_pago_proveedorFuncionGeneral= function () {

class termino_pago_proveedor_funcion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/

//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		this.procesarInicioProceso();
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------

	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,termino_pago_proveedor_constante1.STR_NOMBRE_OPCION,"termino_pago_proveedor");		
	}	
	
//---------- Clic-Siguiente ----------

	siguientesOnClick() {
		this.procesarInicioBusqueda();
	}
		
	siguientesOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
//----------- Clic-Anteriores ---------

	anterioresOnClick() {
		this.procesarInicioBusqueda();
	}
	
	anterioresOnComplete() {
		this.procesarFinalizacionBusqueda();
	}

//---------- Clic-Seleccionar ----------

	seleccionarOnClick() {
		this.resaltarRestaurarDivMantenimiento(true);
		
		this.procesarInicioProceso();
	}
	
	seleccionarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		this.procesarInicioProceso();
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("termino_pago_proveedor",this);
	}
	
//---------- Clic-Reporte ----------------

	generarReporteOnClick() {
		this.generarReporteInicio();
	}
		
	generarReporteOnComplete() {
		this.generarReporteFinalizacion();
	}
	
	generarReporteInicio() {
		funcionGeneral.mostrarOcultarProcesando(true,null);
	}	
	
	generarReporteFinalizacion() {
		funcionGeneral.generarReporteFinalizacion(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,termino_pago_proveedor_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		this.procesarInicioProceso();
	}		
	
	generarHtmlReporteOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		this.resaltarRestaurarDivMantenimiento(true);
		
		this.procesarInicioProceso();
	}		
		
	nuevoPrepararOnComplete() {		
		this.procesarFinalizacionProceso();
	}
	
	nuevoTablaPrepararOnClick() {
		this.procesarInicioProceso();
	}
	
	nuevoTablaPrepararOnComplete() {		
		this.procesarFinalizacionProceso();
	}
	
	nuevoOnClick() {
		//this.procesarInicioProceso();
	}
	
	nuevoOnComplete() {
		//this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		this.procesarInicioProceso();
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(termino_pago_proveedor_constante1.STR_ES_RELACIONES,termino_pago_proveedor_constante1.STR_ES_RELACIONADO,termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");		
		
		if(this.esPaginaForm()==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	editarTablaDatosOnClick() {
		this.procesarInicioProceso();
	}		
	
	editarTablaDatosOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//this.resaltarRestaurarDivMantenimiento(true);		
		this.procesarInicioProceso();
	}
		
	eliminarTablaOnComplete() {
		this.procesarFinalizacionProceso();		
	}
	
	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");		
	}
	
	eliminarOnComplete() {
		this.resaltarRestaurarDivMantenimiento(false);
		
		this.procesarFinalizacionProceso();
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		this.procesarInicioProceso();
	}		
	
	guardarCambiosOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		this.procesarInicioProceso();
	}
	
	duplicarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		this.procesarInicioProceso();
	}
	
	copiarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		this.procesarInicioProceso();
	}
	
	cancelarOnComplete() {
		this.resaltarRestaurarDivMantenimiento(false);
		
		this.procesarFinalizacionProceso();
				
		if(this.esPaginaForm()==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.hdnIdActual);
		jQuery('cmbtermino_pago_proveedorid_empresa').val("");
		jQuery('cmbtermino_pago_proveedorid_tipo_termino_pago').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtdias);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtinicial);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtcuotas);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtdescuento_pronto_pago);
		funcionGeneral.setCheckControl(document.frmMantenimientotermino_pago_proveedor.chbpredeterminado,false);
		jQuery('cmbtermino_pago_proveedorid_cuenta').val("");
		jQuery('cmbtermino_pago_proveedorid_cuenta_corriente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_contable);
		funcionGeneral.setEmptyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_corriente_codigo);	
	}
	
/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		this.procesarInicioProceso();
	}
	
	procesarOnComplete() {
		this.procesarFinalizacionProceso();
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		this.procesarFinalizacionProcesoAbrirLink();
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		this.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink);
	}
	
	procesarInicioProceso() {		
		funcionGeneral.procesarInicioProceso(termino_pago_proveedor_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(termino_pago_proveedor_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(termino_pago_proveedor_constante1.STR_RELATIVE_PATH,"termino_pago_proveedor");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"termino_pago_proveedor");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscartermino_pago_proveedor.txtNumeroRegistrostermino_pago_proveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'termino_pago_proveedores',strNumeroRegistros,document.frmParamsBuscartermino_pago_proveedor.txtNumeroRegistrostermino_pago_proveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(termino_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true && termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
			bitRetorno =true;
		}
		
		return bitRetorno;
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
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tipo Termino Pago") {
				jQuery(".col_id_tipo_termino_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_termino_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_termino_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Dias") {
				jQuery(".col_dias").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Inicial") {
				jQuery(".col_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuotas") {
				jQuery(".col_cuotas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Pronto Pago") {
				jQuery(".col_descuento_pronto_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Cuenta Corriente") {
				jQuery(".col_id_cuenta_corriente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_corriente_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_corriente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Contable") {
				jQuery(".col_cuenta_contable").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Corriente") {
				jQuery(".col_cuenta_corriente_codigo").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,termino_pago_proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cotizacion" || strValueTipoRelacion=="Cotizacion") {
			termino_pago_proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		}
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			termino_pago_proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			termino_pago_proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		}
		else if(strValueTipoRelacion=="parametro_inventario" || strValueTipoRelacion=="Parametro Inventario") {
			termino_pago_proveedor_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			termino_pago_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(termino_pago_proveedor_constante1) {
		
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
		
		
		if(termino_pago_proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-dias": {
					required:true,
					digits:true
				},
					
				"form-inicial": {
					required:true,
					number:true
				},
					
				"form-cuotas": {
					required:true,
					digits:true
				},
					
				"form-descuento_pronto_pago": {
					required:true,
					number:true
				},
					
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-id_cuenta_corriente": {
					digits:true
				
				},
					
				"form-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cuenta_corriente_codigo": {
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-dias": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cuotas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-descuento_pronto_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_corriente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cuenta_corriente_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(termino_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_termino_pago_proveedor-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_termino_pago_proveedor-id_tipo_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_termino_pago_proveedor-codigo": {
					required:true,
					maxlength:4
					,regexpStringMethod:true
				},
					
				"form_termino_pago_proveedor-descripcion": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_termino_pago_proveedor-monto": {
					required:true,
					number:true
				},
					
				"form_termino_pago_proveedor-dias": {
					required:true,
					digits:true
				},
					
				"form_termino_pago_proveedor-inicial": {
					required:true,
					number:true
				},
					
				"form_termino_pago_proveedor-cuotas": {
					required:true,
					digits:true
				},
					
				"form_termino_pago_proveedor-descuento_pronto_pago": {
					required:true,
					number:true
				},
					
					
				"form_termino_pago_proveedor-id_cuenta": {
					digits:true
				
				},
					
				"form_termino_pago_proveedor-id_cuenta_corriente": {
					digits:true
				
				},
					
				"form_termino_pago_proveedor-cuenta_contable": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_termino_pago_proveedor-cuenta_corriente_codigo": {
					maxlength:40
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_termino_pago_proveedor-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-id_tipo_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_termino_pago_proveedor-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_termino_pago_proveedor-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_termino_pago_proveedor-dias": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_termino_pago_proveedor-cuotas": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-descuento_pronto_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_termino_pago_proveedor-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-id_cuenta_corriente": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_termino_pago_proveedor-cuenta_contable": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_termino_pago_proveedor-cuenta_corriente_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(termino_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientotermino_pago_proveedor").validate(arrRules);
		
		if(termino_pago_proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalestermino_pago_proveedor").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"termino_pago_proveedor");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			termino_pago_proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"termino_pago_proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdias,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtinicial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuotas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdescuento_pronto_pago,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientotermino_pago_proveedor.chbpredeterminado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_contable,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_corriente_codigo,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdias,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtinicial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuotas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtdescuento_pronto_pago,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientotermino_pago_proveedor.chbpredeterminado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_contable,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotermino_pago_proveedor.txtcuenta_corriente_codigo,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,termino_pago_proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,termino_pago_proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"termino_pago_proveedor");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"termino_pago_proveedor");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"termino_pago_proveedor");
	}

//------------- Auxiliar-Mostrar-Mensaje -------------------

	mostrarMensaje(bitEsResaltar,strMensaje,strTipo) {
		this.resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo);
		this.mostrarDivMensaje(bitEsResaltar,strMensaje,strTipo);
	}

	mostrarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		funcionGeneral.mostrarDivMensaje(jQuery("#divMensajePage"),jQuery("#spanIcoMensajePage"),jQuery("#spanMensajePage"),jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"),bitEsResaltar,strMensaje,strTipo);	
	}
	
/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(termino_pago_proveedor_control,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1) {
		
		var strSuf=termino_pago_proveedor_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_12";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_13";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:4';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_proveedor_control.idempresaDefaultForeignKey!=null && termino_pago_proveedor_control.idempresaDefaultForeignKey>-1) {
					idActual=termino_pago_proveedor_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_proveedor_webcontrol1.cargarComboEditarTablaempresaFK(termino_pago_proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_proveedor_webcontrol1.cargarComboEditarTablaempresaFK(termino_pago_proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey!=null && termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey>-1) {
					idActual=termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_proveedor_webcontrol1.cargarComboEditarTablatipo_termino_pagoFK(termino_pago_proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_proveedor_webcontrol1.cargarComboEditarTablatipo_termino_pagoFK(termino_pago_proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_12";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_proveedor_control.idcuentaDefaultForeignKey!=null && termino_pago_proveedor_control.idcuentaDefaultForeignKey>-1) {
					idActual=termino_pago_proveedor_control.idcuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_proveedor_webcontrol1.cargarComboEditarTablacuentaFK(termino_pago_proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_proveedor_webcontrol1.cargarComboEditarTablacuentaFK(termino_pago_proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_13";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_proveedor_control.idcuenta_corrienteDefaultForeignKey!=null && termino_pago_proveedor_control.idcuenta_corrienteDefaultForeignKey>-1) {
					idActual=termino_pago_proveedor_control.idcuenta_corrienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_proveedor_webcontrol1.cargarComboEditarTablacuenta_corrienteFK(termino_pago_proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_proveedor_webcontrol1.cargarComboEditarTablacuenta_corrienteFK(termino_pago_proveedor_control,control_name,idActual,true);
					}
				});
				//FK CHECKBOX EVENTOS FIN
			}					
		}
		
		
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatostermino_pago_proveedor").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var termino_pago_proveedor_funcion1=new termino_pago_proveedor_funcion(); //var


//</script>
