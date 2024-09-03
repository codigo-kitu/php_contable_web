//<script type="text/javascript" language="javascript">


//var proveedorFuncionGeneral= function () {

class proveedor_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(proveedor_constante1.STR_RELATIVE_PATH,proveedor_constante1.STR_NOMBRE_OPCION,"proveedor");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("proveedor",this);
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
		funcionGeneral.generarReporteFinalizacion(proveedor_constante1.STR_RELATIVE_PATH,proveedor_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(proveedor_constante1.STR_ES_RELACIONES,proveedor_constante1.STR_ES_RELACIONADO,proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
		
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
		funcionGeneral.eliminarOnClick(proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.hdnIdActual);
		jQuery('cmbproveedorid_empresa').val("");
		jQuery('cmbproveedorid_categoria_proveedor').val("");
		jQuery('cmbproveedorid_giro_negocio_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtregistro_empresarial);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtprimer_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtsegundo_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtprimer_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtsegundo_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txte_mail2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtimagen);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbactivo,false);
		jQuery('cmbproveedorid_pais').val("");
		jQuery('cmbproveedorid_provincia').val("");
		jQuery('cmbproveedorid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcontacto);
		jQuery('cmbproveedorid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmaximo_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmaximo_descuento);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtinteres_anual);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtbalance);
		jQuery('cmbproveedorid_termino_pago_proveedor').val("");
		jQuery('cmbproveedorid_cuenta').val("");
		jQuery('cmbproveedorid_impuesto').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,false);
		jQuery('dtproveedorcreado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcuenta_contable_compras);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtretencion_impuesto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtretencion_ica);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtretencion_fuente);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtsegundo_impuesto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtimpuesto_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtcampo3);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txttipo_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion);
		jQuery('dtproveedorfecha_ultima_transaccion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion);	
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
		funcionGeneral.procesarInicioProceso(proveedor_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(proveedor_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(proveedor_constante1.STR_RELATIVE_PATH,"proveedor");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(proveedor_constante1.STR_RELATIVE_PATH,"proveedor");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"proveedor");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproveedor.txtNumeroRegistrosproveedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'proveedores',strNumeroRegistros,document.frmParamsBuscarproveedor.txtNumeroRegistrosproveedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(proveedor_constante1.BIT_CON_PAGINA_FORM==true && proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Categoria") {
				jQuery(".col_id_categoria_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Giro Negocio") {
				jQuery(".col_id_giro_negocio_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_giro_negocio_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_giro_negocio_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Registro Empresarial") {
				jQuery(".col_registro_empresarial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Primer Apellido") {
				jQuery(".col_primer_apellido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Segundo Apellido") {
				jQuery(".col_segundo_apellido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Primer Nombre") {
				jQuery(".col_primer_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Segundo Nombre") {
				jQuery(".col_segundo_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Completo") {
				jQuery(".col_nombre_completo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Direccion") {
				jQuery(".col_direccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono") {
				jQuery(".col_telefono").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Telefono Movil") {
				jQuery(".col_telefono_movil").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="E Mail") {
				jQuery(".col_e_mail").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="E Mail2") {
				jQuery(".col_e_mail2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Pais") {
				jQuery(".col_id_pais").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_pais_img').trigger("click" );
				} else {
					jQuery('#form-id_pais_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Provincia") {
				jQuery(".col_id_provincia").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_provincia_img').trigger("click" );
				} else {
					jQuery('#form-id_provincia_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Ciudad") {
				jQuery(".col_id_ciudad").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ciudad_img').trigger("click" );
				} else {
					jQuery('#form-id_ciudad_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo Postal") {
				jQuery(".col_codigo_postal").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fax") {
				jQuery(".col_fax").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Contacto") {
				jQuery(".col_contacto").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Maximo Credito") {
				jQuery(".col_maximo_credito").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Maximo Descuento") {
				jQuery(".col_maximo_descuento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Interes Anual") {
				jQuery(".col_interes_anual").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Termino Pago") {
				jQuery(".col_id_termino_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Impuesto") {
				jQuery(".col_id_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Aplica Impuesto Compras") {
				jQuery(".col_aplica_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica Retencion Impuesto") {
				jQuery(".col_aplica_retencion_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica Retencion Fuente") {
				jQuery(".col_aplica_retencion_fuente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica Retencion Ica") {
				jQuery(".col_aplica_retencion_ica").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica 2do Impuesto") {
				jQuery(".col_aplica_2do_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Creado") {
				jQuery(".col_creado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Contable Compras") {
				jQuery(".col_cuenta_contable_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Impuesto") {
				jQuery(".col_retencion_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Ica") {
				jQuery(".col_retencion_ica").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Fuente") {
				jQuery(".col_retencion_fuente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Segundo Impuesto") {
				jQuery(".col_segundo_impuesto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto") {
				jQuery(".col_impuesto_codigo").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Tipo Empresa") {
				jQuery(".col_tipo_empresa").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Ultima Transaccion") {
				jQuery(".col_monto_ultima_transaccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Ultima Transaccion") {
				jQuery(".col_fecha_ultima_transaccion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion Ultima Transaccion") {
				jQuery(".col_descripcion_ultima_transaccion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,proveedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque" || strValueTipoRelacion=="Cheque") {
			proveedor_webcontrol1.registrarSesionParacheques(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra_detalle" || strValueTipoRelacion=="Compras Detalle") {
			proveedor_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cotizacion" || strValueTipoRelacion=="Cotizacion") {
			proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			proveedor_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_pagar" || strValueTipoRelacion=="Cuenta Pagar") {
			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_detalle" || strValueTipoRelacion=="Devolucion Detalle") {
			proveedor_webcontrol1.registrarSesionParadevolucion_detalles(idActual);
		}
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_pagar" || strValueTipoRelacion=="Documentos Cuentas por Pagar") {
			proveedor_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		}
		else if(strValueTipoRelacion=="documento_proveedor" || strValueTipoRelacion=="Documentos Proveedores") {
			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			proveedor_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="imagen_proveedor" || strValueTipoRelacion=="Imagenes Proveedores") {
			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="kardex" || strValueTipoRelacion=="Kardex") {
			proveedor_webcontrol1.registrarSesionParakardexes(idActual);
		}
		else if(strValueTipoRelacion=="lista_precio" || strValueTipoRelacion=="Lista Precios") {
			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		}
		else if(strValueTipoRelacion=="lote_producto" || strValueTipoRelacion=="Lotes Producto") {
			proveedor_webcontrol1.registrarSesionParalote_productoes(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		}
		else if(strValueTipoRelacion=="otro_suplidor" || strValueTipoRelacion=="Otro Suplidor") {
			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			proveedor_webcontrol1.registrarSesionParaproductos(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(proveedor_constante1) {
		
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
		
		
		if(proveedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_giro_negocio_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-ruc": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-registro_empresarial": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-maximo_credito": {
					required:true,
					number:true
				},
					
				"form-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form-interes_anual": {
					required:true,
					number:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
				"form-creado": {
					required:true,
					date:true
				},
					
				"form-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-retencion_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-retencion_ica": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-retencion_fuente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-segundo_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-impuesto_codigo": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-campo1": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-campo2": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-campo3": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-tipo_empresa": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-monto_ultima_transaccion": {
					number:true
				},
					
				"form-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form-descripcion_ultima_transaccion": {
					maxlength:80
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_giro_negocio_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ruc": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_empresarial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_ica": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_fuente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_proveedor-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_categoria_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_giro_negocio_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-ruc": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-registro_empresarial": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_proveedor-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_proveedor-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_proveedor-telefono": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_proveedor-telefono_movil": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_proveedor-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form_proveedor-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form_proveedor-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_proveedor-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_proveedor-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form_proveedor-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form_proveedor-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_proveedor-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-maximo_credito": {
					required:true,
					number:true
				},
					
				"form_proveedor-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form_proveedor-interes_anual": {
					required:true,
					number:true
				},
					
				"form_proveedor-balance": {
					required:true,
					number:true
				},
					
				"form_proveedor-id_termino_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_proveedor-id_cuenta": {
					digits:true
				
				},
					
				"form_proveedor-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
					
					
					
					
					
				"form_proveedor-creado": {
					required:true,
					date:true
				},
					
				"form_proveedor-cuenta_contable_compras": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-retencion_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-retencion_ica": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-retencion_fuente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-segundo_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-impuesto_codigo": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_proveedor-campo1": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-campo2": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-campo3": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_proveedor-tipo_empresa": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_proveedor-monto_ultima_transaccion": {
					number:true
				},
					
				"form_proveedor-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form_proveedor-descripcion_ultima_transaccion": {
					maxlength:80
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_proveedor-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_categoria_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_giro_negocio_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-ruc": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-registro_empresarial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-telefono": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_proveedor-telefono_movil": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_proveedor-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_proveedor-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_proveedor-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_proveedor-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_proveedor-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_proveedor-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-id_termino_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_proveedor-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form_proveedor-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_proveedor-cuenta_contable_compras": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-retencion_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-retencion_ica": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-retencion_fuente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-segundo_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-impuesto_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-campo2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-tipo_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_proveedor-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_proveedor-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_proveedor-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoproveedor").validate(arrRules);
		
		if(proveedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproveedor").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-creado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-fecha_ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"proveedor");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			proveedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"proveedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtregistro_empresarial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimagen,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcontacto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_descuento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtinteres_anual,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtbalance,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcuenta_contable_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_ica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_fuente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimpuesto_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttipo_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtregistro_empresarial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtprimer_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txte_mail2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimagen,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcontacto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmaximo_descuento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtinteres_anual,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtbalance,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_impuesto_compras,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_impuesto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_fuente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_retencion_ica,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproveedor.chbaplica_2do_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcuenta_contable_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_ica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtretencion_fuente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtsegundo_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtimpuesto_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtcampo3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txttipo_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtmonto_ultima_transaccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproveedor.txtdescripcion_ultima_transaccion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,proveedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,proveedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"proveedor");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"proveedor");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"proveedor");
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

	registrarControlesTableValidacionEdition(proveedor_control,proveedor_webcontrol1,proveedor_constante1) {
		
		var strSuf=proveedor_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_40";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });

				control_name="t"+strSuf+"-cel_"+i+"_52";
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
					control_name="t"+strSuf+"-cel_"+i+"_21";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_22";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_23";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_27";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_32";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_33";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_34";
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
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:15';
					strRules=strRules+'\r\n,regexpPostalMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpFaxMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
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
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_POSTAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FAX_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_53";
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

				if(proveedor_control.idempresaDefaultForeignKey!=null && proveedor_control.idempresaDefaultForeignKey>-1) {
					idActual=proveedor_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablaempresaFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablaempresaFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idcategoria_proveedorDefaultForeignKey!=null && proveedor_control.idcategoria_proveedorDefaultForeignKey>-1) {
					idActual=proveedor_control.idcategoria_proveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablacategoria_proveedorFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablacategoria_proveedorFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idgiro_negocio_proveedorDefaultForeignKey!=null && proveedor_control.idgiro_negocio_proveedorDefaultForeignKey>-1) {
					idActual=proveedor_control.idgiro_negocio_proveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablagiro_negocio_proveedorFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablagiro_negocio_proveedorFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_21";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idpaisDefaultForeignKey!=null && proveedor_control.idpaisDefaultForeignKey>-1) {
					idActual=proveedor_control.idpaisDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablapaisFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablapaisFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_22";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idprovinciaDefaultForeignKey!=null && proveedor_control.idprovinciaDefaultForeignKey>-1) {
					idActual=proveedor_control.idprovinciaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablaprovinciaFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablaprovinciaFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_23";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idciudadDefaultForeignKey!=null && proveedor_control.idciudadDefaultForeignKey>-1) {
					idActual=proveedor_control.idciudadDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablaciudadFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablaciudadFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_27";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idvendedorDefaultForeignKey!=null && proveedor_control.idvendedorDefaultForeignKey>-1) {
					idActual=proveedor_control.idvendedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablavendedorFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablavendedorFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_32";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idtermino_pago_proveedorDefaultForeignKey!=null && proveedor_control.idtermino_pago_proveedorDefaultForeignKey>-1) {
					idActual=proveedor_control.idtermino_pago_proveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablatermino_pago_proveedorFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablatermino_pago_proveedorFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_33";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idcuentaDefaultForeignKey!=null && proveedor_control.idcuentaDefaultForeignKey>-1) {
					idActual=proveedor_control.idcuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablacuentaFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablacuentaFK(proveedor_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_34";
				idActual=jQuery("#"+control_name).val();

				if(proveedor_control.idimpuestoDefaultForeignKey!=null && proveedor_control.idimpuestoDefaultForeignKey>-1) {
					idActual=proveedor_control.idimpuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					proveedor_webcontrol1.cargarComboEditarTablaimpuestoFK(proveedor_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						proveedor_webcontrol1.cargarComboEditarTablaimpuestoFK(proveedor_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosproveedor").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var proveedor_funcion1=new proveedor_funcion(); //var


//</script>
