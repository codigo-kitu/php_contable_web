//<script type="text/javascript" language="javascript">


//var documento_cuenta_pagarFuncionGeneral= function () {

class documento_cuenta_pagar_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,documento_cuenta_pagar_constante1.STR_NOMBRE_OPCION,"documento_cuenta_pagar");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("documento_cuenta_pagar",this);
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
		funcionGeneral.generarReporteFinalizacion(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,documento_cuenta_pagar_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(documento_cuenta_pagar_constante1.STR_ES_RELACIONES,documento_cuenta_pagar_constante1.STR_ES_RELACIONADO,documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");		
		
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
		funcionGeneral.eliminarOnClick(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.hdnIdActual);
		jQuery('cmbdocumento_cuenta_pagarid_empresa').val("");
		jQuery('cmbdocumento_cuenta_pagarid_sucursal').val("");
		jQuery('cmbdocumento_cuenta_pagarid_ejercicio').val("");
		jQuery('cmbdocumento_cuenta_pagarid_periodo').val("");
		jQuery('cmbdocumento_cuenta_pagarid_usuario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero);
		jQuery('cmbdocumento_cuenta_pagarid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo);
		jQuery('dtdocumento_cuenta_pagarfecha_emision').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdescripcion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_parcial);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmoneda);
		jQuery('dtdocumento_cuenta_pagarfecha_vence').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_de_pagos);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance_mon);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_pagado);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_pagado);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_origen);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_destino);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_destino);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnombre_pc);
		jQuery('dtdocumento_cuenta_pagarhora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinteres_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdias_gracia_mora);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinstrumento_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo_cambio);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_documento_proveedor);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtclase_registro);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtestado_registro);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmotivo_anulacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_1);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_2);
		funcionGeneral.setCheckControl(document.frmMantenimientodocumento_cuenta_pagar.chbimpuesto_incluido,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtobservaciones);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtgrupo_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txttermino_idpv);
		jQuery('cmbdocumento_cuenta_pagarid_forma_pago_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_pago);
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtreferencia_pago);
		jQuery('dtdocumento_cuenta_pagarfecha_hora').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_base);
		jQuery('cmbdocumento_cuenta_pagarid_cuenta_corriente').val("");	
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
		funcionGeneral.procesarInicioProceso(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(documento_cuenta_pagar_constante1.STR_RELATIVE_PATH,"documento_cuenta_pagar");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"documento_cuenta_pagar");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscardocumento_cuenta_pagar.txtNumeroRegistrosdocumento_cuenta_pagar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'documento_cuenta_pagares',strNumeroRegistros,document.frmParamsBuscardocumento_cuenta_pagar.txtNumeroRegistrosdocumento_cuenta_pagar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(documento_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true && documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Proveedor") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tipo") {
				jQuery(".col_tipo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Parcial") {
				jQuery(".col_monto_parcial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Moneda") {
				jQuery(".col_moneda").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Vencimiento") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro De Pagos") {
				jQuery(".col_numero_de_pagos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance Mon") {
				jQuery(".col_balance_mon").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento Pagado") {
				jQuery(".col_numero_pagado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Pagado") {
				jQuery(".col_id_pagado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo Origen") {
				jQuery(".col_modulo_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Origen") {
				jQuery(".col_id_origen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo Destino") {
				jQuery(".col_modulo_destino").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Destino") {
				jQuery(".col_id_destino").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre Pc") {
				jQuery(".col_nombre_pc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Hora") {
				jQuery(".col_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Mora") {
				jQuery(".col_monto_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Interes Mora") {
				jQuery(".col_interes_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Dias Gracia Mora") {
				jQuery(".col_dias_gracia_mora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Instrumento Pago") {
				jQuery(".col_instrumento_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Cambio") {
				jQuery(".col_tipo_cambio").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento Proveedor") {
				jQuery(".col_nro_documento_proveedor").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Clase Registro") {
				jQuery(".col_clase_registro").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado Registro") {
				jQuery(".col_estado_registro").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Motivo Anulacion") {
				jQuery(".col_motivo_anulacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto 1") {
				jQuery(".col_impuesto_1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto 2") {
				jQuery(".col_impuesto_2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto Incluido") {
				jQuery(".col_impuesto_incluido").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observaciones") {
				jQuery(".col_observaciones").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Grupo Pago") {
				jQuery(".col_grupo_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Termino Idpv") {
				jQuery(".col_termino_idpv").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Forma Pago Proveedor") {
				jQuery(".col_id_forma_pago_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_forma_pago_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_forma_pago_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nro Pago") {
				jQuery(".col_nro_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia Pago") {
				jQuery(".col_referencia_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Hora") {
				jQuery(".col_fecha_hora").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Base") {
				jQuery(".col_id_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Cliente") {
				jQuery(".col_id_cuenta_corriente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_corriente_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_corriente_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,documento_cuenta_pagar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="devolucion" || strValueTipoRelacion=="Devolucion") {
			documento_cuenta_pagar_webcontrol1.registrarSesionParadevoluciones(idActual);
		}
		else if(strValueTipoRelacion=="imagen_documento_cuenta_pagar" || strValueTipoRelacion=="Imagenes Documentos Cuentas por Pagar") {
			documento_cuenta_pagar_webcontrol1.registrarSesionParaimagen_documento_cuenta_pagares(idActual);
		}
		else if(strValueTipoRelacion=="orden_compra" || strValueTipoRelacion=="Orden Compra") {
			documento_cuenta_pagar_webcontrol1.registrarSesionParaorden_compras(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(documento_cuenta_pagar_constante1) {
		
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
		
		
		if(documento_cuenta_pagar_constante1.STR_SUFIJO=="") {
			
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
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-tipo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-monto_parcial": {
					required:true,
					number:true
				},
					
				"form-moneda": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-numero_de_pagos": {
					required:true,
					digits:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-balance_mon": {
					required:true,
					number:true
				},
					
				"form-numero_pagado": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form-id_pagado": {
					required:true,
					digits:true
				},
					
				"form-modulo_origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_origen": {
					required:true,
					digits:true
				},
					
				"form-modulo_destino": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-id_destino": {
					required:true,
					digits:true
				},
					
				"form-nombre_pc": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-hora": {
					required:true,
					date:true
				},
					
				"form-monto_mora": {
					required:true,
					number:true
				},
					
				"form-interes_mora": {
					required:true,
					number:true
				},
					
				"form-dias_gracia_mora": {
					required:true,
					digits:true
				},
					
				"form-instrumento_pago": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form-nro_documento_proveedor": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-clase_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-estado_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form-motivo_anulacion": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-impuesto_1": {
					required:true,
					number:true
				},
					
				"form-impuesto_2": {
					required:true,
					number:true
				},
					
					
				"form-observaciones": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-grupo_pago": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-termino_idpv": {
					required:true,
					digits:true
				},
					
				"form-id_forma_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_pago": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-referencia_pago": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-fecha_hora": {
					required:true,
					date:true
				},
					
				"form-id_base": {
					required:true,
					digits:true
				},
					
				"form-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-monto_parcial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-numero_de_pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance_mon": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-numero_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-modulo_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-interes_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-dias_gracia_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-instrumento_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-nro_documento_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-clase_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-estado_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-motivo_anulacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-impuesto_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-impuesto_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-observaciones": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-grupo_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-termino_idpv": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_forma_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_documento_cuenta_pagar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-numero": {
					required:true,
					maxlength:250
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-tipo": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_pagar-descripcion": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-monto": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-monto_parcial": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-moneda": {
					required:true,
					maxlength:1
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_pagar-numero_de_pagos": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-balance": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-balance_mon": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-numero_pagado": {
					required:true,
					maxlength:10
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-id_pagado": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-modulo_origen": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-id_origen": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-modulo_destino": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-id_destino": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-nombre_pc": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-hora": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_pagar-monto_mora": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-interes_mora": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-dias_gracia_mora": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-instrumento_pago": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-tipo_cambio": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-nro_documento_proveedor": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-clase_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-estado_registro": {
					required:true,
					maxlength:2
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-motivo_anulacion": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-impuesto_1": {
					required:true,
					number:true
				},
					
				"form_documento_cuenta_pagar-impuesto_2": {
					required:true,
					number:true
				},
					
					
				"form_documento_cuenta_pagar-observaciones": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-grupo_pago": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-termino_idpv": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-id_forma_pago_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_documento_cuenta_pagar-nro_pago": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-referencia_pago": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_documento_cuenta_pagar-fecha_hora": {
					required:true,
					date:true
				},
					
				"form_documento_cuenta_pagar-id_base": {
					required:true,
					digits:true
				},
					
				"form_documento_cuenta_pagar-id_cuenta_corriente": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_documento_cuenta_pagar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-tipo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_pagar-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-monto_parcial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-moneda": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_pagar-numero_de_pagos": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-balance_mon": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-numero_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-id_pagado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-modulo_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-id_origen": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-modulo_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-id_destino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-nombre_pc": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_pagar-monto_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-interes_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-dias_gracia_mora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-instrumento_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-tipo_cambio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-nro_documento_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-clase_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-estado_registro": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-motivo_anulacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-impuesto_1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_documento_cuenta_pagar-impuesto_2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_documento_cuenta_pagar-observaciones": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-grupo_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-termino_idpv": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_forma_pago_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-nro_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-referencia_pago": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_documento_cuenta_pagar-fecha_hora": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_documento_cuenta_pagar-id_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_documento_cuenta_pagar-id_cuenta_corriente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientodocumento_cuenta_pagar").validate(arrRules);
		
		if(documento_cuenta_pagar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesdocumento_cuenta_pagar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-hora").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_hora").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"documento_cuenta_pagar");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			documento_cuenta_pagarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"documento_cuenta_pagar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_parcial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmoneda,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_de_pagos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance_mon,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_pagado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_pagado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_origen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_destino,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_destino,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnombre_pc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinteres_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdias_gracia_mora,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinstrumento_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo_cambio,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_documento_proveedor,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtclase_registro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtestado_registro,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmotivo_anulacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_2,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientodocumento_cuenta_pagar.chbimpuesto_incluido,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtobservaciones,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtgrupo_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttermino_idpv,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtreferencia_pago,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_base,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_parcial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmoneda,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_de_pagos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtbalance_mon,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnumero_pagado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_pagado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_origen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmodulo_destino,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_destino,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnombre_pc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmonto_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinteres_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtdias_gracia_mora,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtinstrumento_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttipo_cambio,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_documento_proveedor,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtclase_registro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtestado_registro,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtmotivo_anulacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtimpuesto_2,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientodocumento_cuenta_pagar.chbimpuesto_incluido,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtobservaciones,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtgrupo_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txttermino_idpv,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtnro_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtreferencia_pago,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientodocumento_cuenta_pagar.txtid_base,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,documento_cuenta_pagar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,documento_cuenta_pagar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"documento_cuenta_pagar");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"documento_cuenta_pagar");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"documento_cuenta_pagar");
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

	registrarControlesTableValidacionEdition(documento_cuenta_pagar_control,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1) {
		
		var strSuf=documento_cuenta_pagar_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_10";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_15";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_26";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_45";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
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
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_42";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_47";
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
					strRules=strRules+'\r\nmaxlength:250';
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
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
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
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:2';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_26";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_35";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_36";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idempresaDefaultForeignKey!=null && documento_cuenta_pagar_control.idempresaDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaempresaFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaempresaFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idsucursalDefaultForeignKey!=null && documento_cuenta_pagar_control.idsucursalDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idsucursalDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablasucursalFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablasucursalFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idejercicioDefaultForeignKey!=null && documento_cuenta_pagar_control.idejercicioDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idejercicioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaejercicioFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaejercicioFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idperiodoDefaultForeignKey!=null && documento_cuenta_pagar_control.idperiodoDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idperiodoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaperiodoFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaperiodoFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_6";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idusuarioDefaultForeignKey!=null && documento_cuenta_pagar_control.idusuarioDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablausuarioFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablausuarioFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idproveedorDefaultForeignKey!=null && documento_cuenta_pagar_control.idproveedorDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idproveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaproveedorFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaproveedorFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_42";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey!=null && documento_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaforma_pago_proveedorFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablaforma_pago_proveedorFK(documento_cuenta_pagar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_47";
				idActual=jQuery("#"+control_name).val();

				if(documento_cuenta_pagar_control.idcuenta_corrienteDefaultForeignKey!=null && documento_cuenta_pagar_control.idcuenta_corrienteDefaultForeignKey>-1) {
					idActual=documento_cuenta_pagar_control.idcuenta_corrienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					documento_cuenta_pagar_webcontrol1.cargarComboEditarTablacuenta_corrienteFK(documento_cuenta_pagar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						documento_cuenta_pagar_webcontrol1.cargarComboEditarTablacuenta_corrienteFK(documento_cuenta_pagar_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosdocumento_cuenta_pagar").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var documento_cuenta_pagar_funcion1=new documento_cuenta_pagar_funcion(); //var


//</script>
