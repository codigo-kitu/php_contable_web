//<script type="text/javascript" language="javascript">


//var factura_loteFuncionGeneral= function () {

class factura_lote_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(factura_lote_constante1.STR_RELATIVE_PATH,factura_lote_constante1.STR_NOMBRE_OPCION,"factura_lote");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("factura_lote",this);
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
		funcionGeneral.generarReporteFinalizacion(factura_lote_constante1.STR_RELATIVE_PATH,factura_lote_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(factura_lote_constante1.STR_ES_RELACIONES,factura_lote_constante1.STR_ES_RELACIONADO,factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
		
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
		funcionGeneral.eliminarOnClick(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.hdnIdActual);
		jQuery('cmbfactura_loteid_empresa').val("");
		jQuery('cmbfactura_loteid_sucursal').val("");
		jQuery('cmbfactura_loteid_ejercicio').val("");
		jQuery('cmbfactura_loteid_periodo').val("");
		jQuery('cmbfactura_loteid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtnumero);
		jQuery('cmbfactura_loteid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente);
		jQuery('dtfactura_lotefecha_emision').val(new Date());
		jQuery('cmbfactura_loteid_vendedor').val("");
		jQuery('cmbfactura_loteid_termino_pago').val("");
		jQuery('dtfactura_lotefecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttipo_cambio);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtmoneda);
		jQuery('cmbfactura_loteid_estado').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtenviar_a);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtobservacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtsub_total);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdescuento_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtiva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtiva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttotal);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtotro_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtotro_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcomprobante);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtimpuesto_en_precio);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtnota);
		jQuery('dtfactura_lotehora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttipo_envio);
		jQuery('dtfactura_loteactualizado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcomputador);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtmonto_base);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtdescuento_parcial_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtimpuesto2_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtimpuesto2_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtnro_estimado);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttipo_factura);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txttipo_doc);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtenviar);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txten_anexo);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtpagos);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtanulada);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcausa_anulacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtncf);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientofactura_lote.txtcampo3);
		jQuery('cmbfactura_loteid_asiento').val("");
		jQuery('cmbfactura_loteid_documento_cuenta_cobrar').val("");
		jQuery('cmbfactura_loteid_kardex').val("");	
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
		funcionGeneral.procesarInicioProceso(factura_lote_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(factura_lote_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(factura_lote_constante1.STR_RELATIVE_PATH,"factura_lote");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"factura_lote");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarfactura_lote.txtNumeroRegistrosfactura_lote,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'factura_lotees',strNumeroRegistros,document.frmParamsBuscarfactura_lote.txtNumeroRegistrosfactura_lote);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(factura_lote_constante1.BIT_CON_PAGINA_FORM==true && factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cliente") {
				jQuery(".col_id_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia Cliente") {
				jQuery(".col_referencia_cliente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Vendedor") {
				jQuery(".col_id_vendedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_vendedor_img').trigger("click" );
				} else {
					jQuery('#form-id_vendedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Cambio") {
				jQuery(".col_tipo_cambio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_moneda").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_id_estado").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Enviar a") {
				jQuery(".col_enviar_a").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Sub Total") {
				jQuery(".col_sub_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Monto") {
				jQuery(".col_descuento_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento %") {
				jQuery(".col_descuento_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva Monto") {
				jQuery(".col_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Iva %") {
				jQuery(".col_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente Monto") {
				jQuery(".col_retencion_fuente_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Fuente %") {
				jQuery(".col_retencion_fuente_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva Monto") {
				jQuery(".col_retencion_iva_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Iva %") {
				jQuery(".col_retencion_iva_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total") {
				jQuery(".col_total").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos") {
				jQuery(".col_otro_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Miscelaneos %") {
				jQuery(".col_otro_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comprobante") {
				jQuery(".col_comprobante").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto En Precio") {
				jQuery(".col_impuesto_en_precio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nota") {
				jQuery(".col_nota").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Hora") {
				jQuery(".col_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Envio") {
				jQuery(".col_tipo_envio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Actualizado") {
				jQuery(".col_actualizado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Computador") {
				jQuery(".col_computador").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Base") {
				jQuery(".col_monto_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Parcial Monto") {
				jQuery(".col_descuento_parcial_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto2 Monto") {
				jQuery(".col_impuesto2_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto2 %") {
				jQuery(".col_impuesto2_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica Monto") {
				jQuery(".col_retencion_ica_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ret.Ica %") {
				jQuery(".col_retencion_ica_porciento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Estimado") {
				jQuery(".col_nro_estimado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Factura") {
				jQuery(".col_tipo_factura").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Documento") {
				jQuery(".col_tipo_doc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Enviar") {
				jQuery(".col_enviar").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="En Anexo") {
				jQuery(".col_en_anexo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pagos") {
				jQuery(".col_pagos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Anulada") {
				jQuery(".col_anulada").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Causa Anulacion") {
				jQuery(".col_causa_anulacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ncf") {
				jQuery(".col_ncf").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Asiento") {
				jQuery(".col_id_asiento").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_asiento_img').trigger("click" );
				} else {
					jQuery('#form-id_asiento_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Docs Cc") {
				jQuery(".col_id_documento_cuenta_cobrar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_documento_cuenta_cobrar_img').trigger("click" );
				} else {
					jQuery('#form-id_documento_cuenta_cobrar_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Kardex") {
				jQuery(".col_id_kardex").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_kardex_img').trigger("click" );
				} else {
					jQuery('#form-id_kardex_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,factura_lote_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="factura_lote_detalle" || strValueTipoRelacion=="Factura Lote Detalle") {
			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		}
		else if(strValueTipoRelacion=="factura_modelo" || strValueTipoRelacion=="Facturas Modelos") {
			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(factura_lote_constante1) {
		
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
		
		
		if(factura_lote_constante1.STR_SUFIJO=="") {
			
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
					
				"form-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-ruc": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-referencia_cliente": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form-moneda": {
					required:true,
					digits:true
				},
					
				"form-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-direccion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-sub_total": {
					required:true,
					number:true
				},
					
				"form-descuento_monto": {
					required:true,
					number:true
				},
					
				"form-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form-iva_monto": {
					required:true,
					number:true
				},
					
				"form-iva_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form-total": {
					required:true,
					number:true
				},
					
				"form-otro_monto": {
					required:true,
					number:true
				},
					
				"form-otro_porciento": {
					required:true,
					number:true
				},
					
				"form-comprobante": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-impuesto_en_precio": {
					required:true,
					digits:true
				},
					
				"form-nota": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-hora": {
					required:true,
					date:true
				},
					
				"form-tipo_envio": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-actualizado": {
					required:true,
					date:true
				},
					
				"form-computador": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-monto_base": {
					required:true,
					number:true
				},
					
				"form-descuento_parcial_monto": {
					required:true,
					number:true
				},
					
				"form-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form-nro_estimado": {
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-tipo_factura": {
					required:true,
					digits:true
				},
					
				"form-tipo_doc": {
					required:true,
					digits:true
				},
					
				"form-enviar": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-en_anexo": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-pagos": {
					required:true,
					number:true
				},
					
				"form-anulada": {
					required:true,
					digits:true
				},
					
				"form-causa_anulacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-ncf": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-campo1": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-campo2": {
					required:true,
					number:true
				},
					
				"form-campo3": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-id_asiento": {
					digits:true
				
				},
					
				"form-id_documento_cuenta_cobrar": {
					digits:true
				
				},
					
				"form-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comprobante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_en_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nota": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-tipo_envio": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-computador": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descuento_parcial_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-nro_estimado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo_doc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-en_anexo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-anulada": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-causa_anulacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ncf": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_factura_lote-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-numero": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_factura_lote-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-ruc": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_factura_lote-referencia_cliente": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_factura_lote-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_factura_lote-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-id_termino_pago": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_factura_lote-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form_factura_lote-moneda": {
					required:true,
					digits:true
				},
					
				"form_factura_lote-id_estado": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_factura_lote-direccion": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_factura_lote-enviar_a": {
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_factura_lote-observacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_factura_lote-sub_total": {
					required:true,
					number:true
				},
					
				"form_factura_lote-descuento_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-descuento_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_fuente_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_fuente_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_iva_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_iva_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-total": {
					required:true,
					number:true
				},
					
				"form_factura_lote-otro_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-otro_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-comprobante": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_factura_lote-impuesto_en_precio": {
					required:true,
					digits:true
				},
					
				"form_factura_lote-nota": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_factura_lote-hora": {
					required:true,
					date:true
				},
					
				"form_factura_lote-tipo_envio": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_factura_lote-actualizado": {
					required:true,
					date:true
				},
					
				"form_factura_lote-computador": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_factura_lote-monto_base": {
					required:true,
					number:true
				},
					
				"form_factura_lote-descuento_parcial_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-impuesto2_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-impuesto2_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_ica_monto": {
					required:true,
					number:true
				},
					
				"form_factura_lote-retencion_ica_porciento": {
					required:true,
					number:true
				},
					
				"form_factura_lote-nro_estimado": {
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_factura_lote-tipo_factura": {
					required:true,
					digits:true
				},
					
				"form_factura_lote-tipo_doc": {
					required:true,
					digits:true
				},
					
				"form_factura_lote-enviar": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_factura_lote-en_anexo": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_factura_lote-pagos": {
					required:true,
					number:true
				},
					
				"form_factura_lote-anulada": {
					required:true,
					digits:true
				},
					
				"form_factura_lote-causa_anulacion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_factura_lote-ncf": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_factura_lote-campo1": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_factura_lote-campo2": {
					required:true,
					number:true
				},
					
				"form_factura_lote-campo3": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_factura_lote-id_asiento": {
					digits:true
				
				},
					
				"form_factura_lote-id_documento_cuenta_cobrar": {
					digits:true
				
				},
					
				"form_factura_lote-id_kardex": {
					digits:true
				
				}
				},
				
				messages: {
					"form_factura_lote-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-ruc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-referencia_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_termino_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_estado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-direccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-enviar_a": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-observacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-sub_total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-descuento_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-descuento_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_fuente_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_fuente_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_iva_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_iva_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-total": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-otro_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-otro_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-comprobante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-impuesto_en_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-nota": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-tipo_envio": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_factura_lote-computador": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-monto_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-descuento_parcial_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-impuesto2_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-impuesto2_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_ica_monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-retencion_ica_porciento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-nro_estimado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-tipo_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-tipo_doc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-enviar": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-en_anexo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-anulada": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-causa_anulacion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-ncf": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-campo2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_factura_lote-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_factura_lote-id_asiento": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_documento_cuenta_cobrar": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_factura_lote-id_kardex": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientofactura_lote").validate(arrRules);
		
		if(factura_lote_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesfactura_lote").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-actualizado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"factura_lote");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			factura_loteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"factura_lote");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_cambio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtmoneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar_a,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtobservacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtsub_total,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttotal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcomprobante,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto_en_precio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnota,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_envio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcomputador,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtmonto_base,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_parcial_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto2_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto2_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnro_estimado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_doc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txten_anexo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtpagos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtanulada,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcausa_anulacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtncf,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo3,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtreferencia_cliente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_cambio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtmoneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar_a,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtobservacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtsub_total,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtiva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_fuente_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_iva_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttotal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtotro_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcomprobante,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto_en_precio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnota,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_envio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcomputador,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtmonto_base,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtdescuento_parcial_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto2_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtimpuesto2_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_monto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtretencion_ica_porciento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtnro_estimado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txttipo_doc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtenviar,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txten_anexo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtpagos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtanulada,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcausa_anulacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtncf,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientofactura_lote.txtcampo3,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,factura_lote_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,factura_lote_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"factura_lote");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"factura_lote");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"factura_lote");
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

	registrarControlesTableValidacionEdition(factura_lote_control,factura_lote_webcontrol1,factura_lote_constante1) {
		
		var strSuf=factura_lote_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_11";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_14";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_36";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });

				control_name="t"+strSuf+"-cel_"+i+"_38";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
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
					control_name="t"+strSuf+"-cel_"+i+"_4";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_5";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_6";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_8";
					jQuery("#"+control_name).select2();

					factura_lote_webcontrol1.registrarComboActionChangeid_cliente(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_12";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_13";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_17";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_58";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_59";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_60";
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
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:250';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:250';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_56";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_57";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_58";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_59";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_60";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_56";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_57";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_58";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_59";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_60";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idempresaDefaultForeignKey!=null && factura_lote_control.idempresaDefaultForeignKey>-1) {
					idActual=factura_lote_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaempresaFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaempresaFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idsucursalDefaultForeignKey!=null && factura_lote_control.idsucursalDefaultForeignKey>-1) {
					idActual=factura_lote_control.idsucursalDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablasucursalFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablasucursalFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idejercicioDefaultForeignKey!=null && factura_lote_control.idejercicioDefaultForeignKey>-1) {
					idActual=factura_lote_control.idejercicioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaejercicioFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaejercicioFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idperiodoDefaultForeignKey!=null && factura_lote_control.idperiodoDefaultForeignKey>-1) {
					idActual=factura_lote_control.idperiodoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaperiodoFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaperiodoFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_6";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idusuarioDefaultForeignKey!=null && factura_lote_control.idusuarioDefaultForeignKey>-1) {
					idActual=factura_lote_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablausuarioFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablausuarioFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idclienteDefaultForeignKey!=null && factura_lote_control.idclienteDefaultForeignKey>-1) {
					idActual=factura_lote_control.idclienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaclienteFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaclienteFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_12";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idvendedorDefaultForeignKey!=null && factura_lote_control.idvendedorDefaultForeignKey>-1) {
					idActual=factura_lote_control.idvendedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablavendedorFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablavendedorFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_13";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idtermino_pagoDefaultForeignKey!=null && factura_lote_control.idtermino_pagoDefaultForeignKey>-1) {
					idActual=factura_lote_control.idtermino_pagoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablatermino_pagoFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablatermino_pagoFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_17";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idestadoDefaultForeignKey!=null && factura_lote_control.idestadoDefaultForeignKey>-1) {
					idActual=factura_lote_control.idestadoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaestadoFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaestadoFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_58";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idasientoDefaultForeignKey!=null && factura_lote_control.idasientoDefaultForeignKey>-1) {
					idActual=factura_lote_control.idasientoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablaasientoFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablaasientoFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_59";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.iddocumento_cuenta_cobrarDefaultForeignKey!=null && factura_lote_control.iddocumento_cuenta_cobrarDefaultForeignKey>-1) {
					idActual=factura_lote_control.iddocumento_cuenta_cobrarDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_lote_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_60";
				idActual=jQuery("#"+control_name).val();

				if(factura_lote_control.idkardexDefaultForeignKey!=null && factura_lote_control.idkardexDefaultForeignKey>-1) {
					idActual=factura_lote_control.idkardexDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					factura_lote_webcontrol1.cargarComboEditarTablakardexFK(factura_lote_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						factura_lote_webcontrol1.cargarComboEditarTablakardexFK(factura_lote_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosfactura_lote").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var factura_lote_funcion1=new factura_lote_funcion(); //var


//</script>
