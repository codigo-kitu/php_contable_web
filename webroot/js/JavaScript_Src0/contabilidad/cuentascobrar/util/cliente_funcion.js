//<script type="text/javascript" language="javascript">


//var clienteFuncionGeneral= function () {

class cliente_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(cliente_constante1.STR_RELATIVE_PATH,"cliente");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(cliente_constante1.STR_RELATIVE_PATH,cliente_constante1.STR_NOMBRE_OPCION,"cliente");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("cliente",this);
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
		funcionGeneral.generarReporteFinalizacion(cliente_constante1.STR_RELATIVE_PATH,cliente_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(cliente_constante1.STR_ES_RELACIONES,cliente_constante1.STR_ES_RELACIONADO,cliente_constante1.STR_RELATIVE_PATH,"cliente");		
		
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
		funcionGeneral.eliminarOnClick(cliente_constante1.STR_RELATIVE_PATH,"cliente");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.hdnIdActual);
		jQuery('cmbclienteid_empresa').val("");
		jQuery('cmbclienteid_categoria_cliente').val("");
		jQuery('cmbclienteid_tipo_precio').val("");
		jQuery('cmbclienteid_giro_negocio_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtruc);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtregistro_empresarial);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtprimer_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtsegundo_apellido);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtprimer_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtsegundo_nombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txttelefono_movil);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txte_mail2);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtimagen);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbactivo,false);
		jQuery('cmbclienteid_pais').val("");
		jQuery('cmbclienteid_provincia').val("");
		jQuery('cmbclienteid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcontacto);
		jQuery('cmbclienteid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmaximo_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmaximo_descuento);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtinteres_anual);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtbalance);
		jQuery('cmbclienteid_termino_pago_cliente').val("");
		jQuery('cmbclienteid_cuenta').val("");
		jQuery('cmbclienteid_impuesto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtfacturar_con);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_retencion_ica,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,false);
		jQuery('dtclientecreado').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcuenta_contable_ventas);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtretencion_impuesto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtretencion_ica);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtretencion_fuente);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtsegundo_impuesto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtimpuesto_codigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtimpuesto_incluido);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcampo1);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcampo2);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtcampo3);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txttipo_empresa);
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion);
		jQuery('dtclientefecha_ultima_transaccion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion);	
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
		funcionGeneral.procesarInicioProceso(cliente_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(cliente_constante1.STR_RELATIVE_PATH,"cliente");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(cliente_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(cliente_constante1.STR_RELATIVE_PATH,"cliente");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(cliente_constante1.STR_RELATIVE_PATH,"cliente");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cliente");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcliente.txtNumeroRegistroscliente,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'clientes',strNumeroRegistros,document.frmParamsBuscarcliente.txtNumeroRegistroscliente);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(cliente_constante1.BIT_CON_PAGINA_FORM==true && cliente_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Categorias Cliente") {
				jQuery(".col_id_categoria_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Tipo Precio") {
				jQuery(".col_id_tipo_precio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_precio_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_precio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Giro Negocio") {
				jQuery(".col_id_giro_negocio_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_giro_negocio_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_giro_negocio_cliente_img_busqueda').trigger("click" );
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
			else if(strValueTipoColumna=="Terminos Pago") {
				jQuery(".col_id_termino_pago_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_termino_pago_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_termino_pago_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Contable Ventas") {
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
			else if(strValueTipoColumna=="Facturar Con") {
				jQuery(".col_facturar_con").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Aplica Impuesto Ventas") {
				jQuery(".col_aplica_impuesto_ventas").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Cuenta Contable Ventas") {
				jQuery(".col_cuenta_contable_ventas").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Impuesto Incluido") {
				jQuery(".col_impuesto_incluido").css({"border-color":"red"});
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cheque" || strValueTipoRelacion=="Cheque") {
			cliente_webcontrol1.registrarSesionParacheques(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="consignacion_detalle" || strValueTipoRelacion=="Consignacion Detalle") {
			cliente_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_cobrar" || strValueTipoRelacion=="Cuenta Cobrar") {
			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			cliente_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura_detalle" || strValueTipoRelacion=="Devolucion Factura Detalle") {
			cliente_webcontrol1.registrarSesionParadevolucion_factura_detalles(idActual);
		}
		else if(strValueTipoRelacion=="documento_cliente" || strValueTipoRelacion=="Documentos Clientes") {
			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		}
		else if(strValueTipoRelacion=="documento_cuenta_cobrar" || strValueTipoRelacion=="Documentos Cuentas por Cobrar") {
			cliente_webcontrol1.registrarSesionParadocumento_cuenta_cobrares(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="estimado_detalle" || strValueTipoRelacion=="Estimado Detalle") {
			cliente_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="factura_detalle" || strValueTipoRelacion=="Factura Detalle") {
			cliente_webcontrol1.registrarSesionParafactura_detalles(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			cliente_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="factura_modelo" || strValueTipoRelacion=="Facturas Modelos") {
			cliente_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		}
		else if(strValueTipoRelacion=="imagen_cliente" || strValueTipoRelacion=="Imagenes Cliente") {
			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		}
		else if(strValueTipoRelacion=="kardex" || strValueTipoRelacion=="Kardex") {
			cliente_webcontrol1.registrarSesionParakardexes(idActual);
		}
		else if(strValueTipoRelacion=="lista_cliente" || strValueTipoRelacion=="Lista Cliente") {
			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cliente_constante1) {
		
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
		
		
		if(cliente_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_categoria_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_precio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_giro_negocio_cliente": {
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
					,regexpDirMethod:true
				},
					
				"form-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-telefono_movil": {
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
					
				"form-id_termino_pago_cliente": {
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
					
				"form-facturar_con": {
					required:true,
					digits:true
				},
					
					
					
					
					
					
				"form-creado": {
					required:true,
					date:true
				},
					
				"form-cuenta_contable_ventas": {
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
					
				"form-impuesto_incluido": {
					maxlength:1
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
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_categoria_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_giro_negocio_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ruc": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_empresarial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_REGEXPDIRMETHOD_INCORRECTO,
					"form-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-telefono_movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
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
					"form-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-facturar_con": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_ica": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-retencion_fuente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-segundo_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_incluido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cliente-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_categoria_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_tipo_precio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_giro_negocio_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-ruc": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-registro_empresarial": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-primer_apellido": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-segundo_apellido": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-primer_nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-segundo_nombre": {
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cliente-nombre_completo": {
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_cliente-direccion": {
					required:true,
					maxlength:150
					,regexpDirMethod:true
				},
					
				"form_cliente-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_cliente-telefono_movil": {
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_cliente-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form_cliente-e_mail2": {
					maxlength:100
					,email:true
				},
					
				"form_cliente-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cliente-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_cliente-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_provincia": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-codigo_postal": {
					maxlength:15
					,regexpPostalMethod:true
				},
					
				"form_cliente-fax": {
					maxlength:20
					,regexpFaxMethod:true
				},
					
				"form_cliente-contacto": {
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_cliente-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-maximo_credito": {
					required:true,
					number:true
				},
					
				"form_cliente-maximo_descuento": {
					required:true,
					number:true
				},
					
				"form_cliente-interes_anual": {
					required:true,
					number:true
				},
					
				"form_cliente-balance": {
					required:true,
					number:true
				},
					
				"form_cliente-id_termino_pago_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-id_cuenta": {
					digits:true
				
				},
					
				"form_cliente-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cliente-facturar_con": {
					required:true,
					digits:true
				},
					
					
					
					
					
					
				"form_cliente-creado": {
					required:true,
					date:true
				},
					
				"form_cliente-cuenta_contable_ventas": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-retencion_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-retencion_ica": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-retencion_fuente": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-segundo_impuesto": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-impuesto_codigo": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cliente-impuesto_incluido": {
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_cliente-campo1": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-campo2": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-campo3": {
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_cliente-tipo_empresa": {
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_cliente-monto_ultima_transaccion": {
					number:true
				},
					
				"form_cliente-fecha_ultima_transaccion": {
					required:true,
					date:true
				},
					
				"form_cliente-descripcion_ultima_transaccion": {
					maxlength:100
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_cliente-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_categoria_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_tipo_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_giro_negocio_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-ruc": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-registro_empresarial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-primer_apellido": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-segundo_apellido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-primer_nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-segundo_nombre": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-nombre_completo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_REGEXPDIRMETHOD_INCORRECTO,
					"form_cliente-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_cliente-telefono_movil": ""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_cliente-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_cliente-e_mail2": ""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_cliente-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_cliente-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_provincia": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_cliente-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_cliente-contacto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-maximo_descuento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-interes_anual": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-id_termino_pago_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cliente-facturar_con": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					
					"form_cliente-creado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cliente-cuenta_contable_ventas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-retencion_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-retencion_ica": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-retencion_fuente": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-segundo_impuesto": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-impuesto_codigo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-impuesto_incluido": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-campo1": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-campo2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-campo3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-tipo_empresa": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cliente-monto_ultima_transaccion": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cliente-fecha_ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cliente-descripcion_ultima_transaccion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocliente").validate(arrRules);
		
		if(cliente_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescliente").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-creado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-fecha_ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"cliente");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			clienteFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cliente");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtregistro_empresarial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_apellido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_nombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono_movil,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimagen,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcontacto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_descuento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtinteres_anual,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfacturar_con,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_ica,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcuenta_contable_ventas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_ica,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_fuente,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_impuesto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimpuesto_codigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimpuesto_incluido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttipo_empresa,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtregistro_empresarial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_apellido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtprimer_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_nombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttelefono_movil,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txte_mail2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimagen,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcontacto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmaximo_descuento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtinteres_anual,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtfacturar_con,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_impuesto_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_impuesto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_fuente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_retencion_ica,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocliente.chbaplica_2do_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcuenta_contable_ventas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_ica,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtretencion_fuente,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtsegundo_impuesto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimpuesto_codigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtimpuesto_incluido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtcampo3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txttipo_empresa,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtmonto_ultima_transaccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocliente.txtdescri_ultima_transaccion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cliente_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cliente_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cliente");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"cliente");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"cliente");
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

	registrarControlesTableValidacionEdition(cliente_control,cliente_webcontrol1,cliente_constante1) {
		
		var strSuf=cliente_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_42";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });

				control_name="t"+strSuf+"-cel_"+i+"_55";
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
					control_name="t"+strSuf+"-cel_"+i+"_22";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_23";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_24";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_28";
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

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_35";
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
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpDirMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,email:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
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
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:15';
					strRules=strRules+'\r\n,regexpPostalMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpFaxMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
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
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
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
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_50";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_51";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_56";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_REGEXPDIRMETHOD_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_MAIL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_POSTAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FAX_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_54";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_55";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_56";
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

				if(cliente_control.idempresaDefaultForeignKey!=null && cliente_control.idempresaDefaultForeignKey>-1) {
					idActual=cliente_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablaempresaFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablaempresaFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idcategoria_clienteDefaultForeignKey!=null && cliente_control.idcategoria_clienteDefaultForeignKey>-1) {
					idActual=cliente_control.idcategoria_clienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablacategoria_clienteFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablacategoria_clienteFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idtipo_precioDefaultForeignKey!=null && cliente_control.idtipo_precioDefaultForeignKey>-1) {
					idActual=cliente_control.idtipo_precioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablatipo_precioFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablatipo_precioFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idgiro_negocio_clienteDefaultForeignKey!=null && cliente_control.idgiro_negocio_clienteDefaultForeignKey>-1) {
					idActual=cliente_control.idgiro_negocio_clienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablagiro_negocio_clienteFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablagiro_negocio_clienteFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_22";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idpaisDefaultForeignKey!=null && cliente_control.idpaisDefaultForeignKey>-1) {
					idActual=cliente_control.idpaisDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablapaisFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablapaisFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_23";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idprovinciaDefaultForeignKey!=null && cliente_control.idprovinciaDefaultForeignKey>-1) {
					idActual=cliente_control.idprovinciaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablaprovinciaFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablaprovinciaFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_24";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idciudadDefaultForeignKey!=null && cliente_control.idciudadDefaultForeignKey>-1) {
					idActual=cliente_control.idciudadDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablaciudadFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablaciudadFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_28";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idvendedorDefaultForeignKey!=null && cliente_control.idvendedorDefaultForeignKey>-1) {
					idActual=cliente_control.idvendedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablavendedorFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablavendedorFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_33";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idtermino_pago_clienteDefaultForeignKey!=null && cliente_control.idtermino_pago_clienteDefaultForeignKey>-1) {
					idActual=cliente_control.idtermino_pago_clienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablatermino_pago_clienteFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablatermino_pago_clienteFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_34";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idcuentaDefaultForeignKey!=null && cliente_control.idcuentaDefaultForeignKey>-1) {
					idActual=cliente_control.idcuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablacuentaFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablacuentaFK(cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_35";
				idActual=jQuery("#"+control_name).val();

				if(cliente_control.idimpuestoDefaultForeignKey!=null && cliente_control.idimpuestoDefaultForeignKey>-1) {
					idActual=cliente_control.idimpuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cliente_webcontrol1.cargarComboEditarTablaimpuestoFK(cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cliente_webcontrol1.cargarComboEditarTablaimpuestoFK(cliente_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatoscliente").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var cliente_funcion1=new cliente_funcion(); //var


//</script>
