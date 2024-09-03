//<script type="text/javascript" language="javascript">


//var cuentaFuncionGeneral= function () {

class cuenta_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(cuenta_constante1.STR_RELATIVE_PATH,cuenta_constante1.STR_NOMBRE_OPCION,"cuenta");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("cuenta",this);
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
		funcionGeneral.generarReporteFinalizacion(cuenta_constante1.STR_RELATIVE_PATH,cuenta_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(cuenta_constante1.STR_ES_RELACIONES,cuenta_constante1.STR_ES_RELACIONADO,cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
		
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
		funcionGeneral.eliminarOnClick(cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.hdnIdActual);
		jQuery('cmbcuentaid_empresa').val("");
		jQuery('cmbcuentaid_tipo_cuenta').val("");
		jQuery('cmbcuentaid_tipo_nivel_cuenta').val("");
		jQuery('cmbcuentaid_cuenta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtnivel_cuenta);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbes_detalle,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_centro_costos,false);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_ruc,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtporcentaje_base);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbusa_monto_minimo,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtmonto_minimo);
		funcionGeneral.setCheckControl(document.frmMantenimientocuenta.chbcon_retencion,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtvalor_retencion);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtbalance);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta.txtcomentario);
		jQuery('dtcuentaultima_transaccion').val(new Date());	
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
		funcionGeneral.procesarInicioProceso(cuenta_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(cuenta_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(cuenta_constante1.STR_RELATIVE_PATH,"cuenta");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(cuenta_constante1.STR_RELATIVE_PATH,"cuenta");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta.txtNumeroRegistroscuenta,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuentaes',strNumeroRegistros,document.frmParamsBuscarcuenta.txtNumeroRegistroscuenta);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(cuenta_constante1.BIT_CON_PAGINA_FORM==true && cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Tipo Cuenta") {
				jQuery(".col_id_tipo_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Tipo Nivel Cuenta") {
				jQuery(".col_id_tipo_nivel_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_nivel_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_nivel_cuenta_img_busqueda').trigger("click" );
				}
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
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nivel Cuenta") {
				jQuery(".col_nivel_cuenta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Detalle") {
				jQuery(".col_es_detalle").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Con Centro Costos") {
				jQuery(".col_con_centro_costos").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ruc") {
				jQuery(".col_con_ruc").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Porcentaje Base") {
				jQuery(".col_porcentaje_base").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Usa Monto Minimo") {
				jQuery(".col_usa_monto_minimo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto Minimo") {
				jQuery(".col_monto_minimo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Con Retencion") {
				jQuery(".col_con_retencion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Valor Retencion") {
				jQuery(".col_valor_retencion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Balance") {
				jQuery(".col_balance").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultima Transaccion") {
				jQuery(".col_ultima_transaccion").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="asiento_automatico_detalle" || strValueTipoRelacion=="Detalle Asiento Automatico") {
			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		}
		else if(strValueTipoRelacion=="asiento_detalle" || strValueTipoRelacion=="Detalle Asiento") {
			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		}
		else if(strValueTipoRelacion=="asiento_predefinido_detalle" || strValueTipoRelacion=="Detalle Asiento Predefinido") {
			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		}
		else if(strValueTipoRelacion=="categoria_cheque" || strValueTipoRelacion=="Categoria Cheque") {
			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		}
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente" || strValueTipoRelacion=="Cuenta Corriente") {
			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		}
		else if(strValueTipoRelacion=="cuenta" || strValueTipoRelacion=="Cuentas") {
			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		}
		else if(strValueTipoRelacion=="forma_pago_cliente" || strValueTipoRelacion=="Forma Pago Cliente") {
			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		}
		else if(strValueTipoRelacion=="forma_pago_proveedor" || strValueTipoRelacion=="Forma Pago Proveedor") {
			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		}
		else if(strValueTipoRelacion=="impuesto" || strValueTipoRelacion=="Impuesto") {
			cuenta_webcontrol1.registrarSesionParaimpuestos(idActual);
		}
		else if(strValueTipoRelacion=="instrumento_pago" || strValueTipoRelacion=="Instrumento Pago") {
			cuenta_webcontrol1.registrarSesionParainstrumento_pagos(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			cuenta_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="otro_impuesto" || strValueTipoRelacion=="Otro Impuesto") {
			cuenta_webcontrol1.registrarSesionParaotro_impuestos(idActual);
		}
		else if(strValueTipoRelacion=="producto" || strValueTipoRelacion=="Producto") {
			cuenta_webcontrol1.registrarSesionParaproductos(idActual);
		}
		else if(strValueTipoRelacion=="proveedor" || strValueTipoRelacion=="Proveedor") {
			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		}
		else if(strValueTipoRelacion=="retencion" || strValueTipoRelacion=="Retencion") {
			cuenta_webcontrol1.registrarSesionPararetenciones(idActual);
		}
		else if(strValueTipoRelacion=="retencion_fuente" || strValueTipoRelacion=="Retencion Fuente") {
			cuenta_webcontrol1.registrarSesionPararetencion_fuentees(idActual);
		}
		else if(strValueTipoRelacion=="retencion_ica" || strValueTipoRelacion=="Retencion Ica") {
			cuenta_webcontrol1.registrarSesionPararetencion_icas(idActual);
		}
		else if(strValueTipoRelacion=="saldo_cuenta" || strValueTipoRelacion=="Saldo Cuenta") {
			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		}
		else if(strValueTipoRelacion=="termino_pago_cliente" || strValueTipoRelacion=="Terminos Pago Cliente") {
			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		}
		else if(strValueTipoRelacion=="termino_pago_proveedor" || strValueTipoRelacion=="Terminos Pago Proveedores") {
			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cuenta_constante1) {
		
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
		
		
		if(cuenta_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_tipo_nivel_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_cuenta": {
					digits:true
				
				},
					
				"form-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form-nivel_cuenta": {
					required:true,
					digits:true
				},
					
					
					
					
				"form-porcentaje_base": {
					required:true,
					number:true
				},
					
					
				"form-monto_minimo": {
					required:true,
					number:true
				},
					
					
				"form-valor_retencion": {
					required:true,
					number:true
				},
					
				"form-balance": {
					required:true,
					number:true
				},
					
				"form-comentario": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-ultima_transaccion": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-monto_minimo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	
		
			
			if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_tipo_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_tipo_nivel_cuenta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta-id_cuenta": {
					digits:true
				
				},
					
				"form_cuenta-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_cuenta-nombre": {
					required:true,
					maxlength:60
					,regexpStringMethod:true
				},
					
				"form_cuenta-nivel_cuenta": {
					required:true,
					digits:true
				},
					
					
					
					
				"form_cuenta-porcentaje_base": {
					required:true,
					number:true
				},
					
					
				"form_cuenta-monto_minimo": {
					required:true,
					number:true
				},
					
					
				"form_cuenta-valor_retencion": {
					required:true,
					number:true
				},
					
				"form_cuenta-balance": {
					required:true,
					number:true
				},
					
				"form_cuenta-comentario": {
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_cuenta-ultima_transaccion": {
					required:true,
					date:true
				}
				},
				
				messages: {
					"form_cuenta-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_tipo_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_tipo_nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-id_cuenta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta-nivel_cuenta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					"form_cuenta-porcentaje_base": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_cuenta-monto_minimo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_cuenta-valor_retencion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta-balance": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta-ultima_transaccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO
				}		
			};	



			if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocuenta").validate(arrRules);
		
		if(cuenta_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-ultima_transaccion").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"cuenta");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuentaFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnivel_cuenta,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbes_detalle,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_centro_costos,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_ruc,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtporcentaje_base,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbusa_monto_minimo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtmonto_minimo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_retencion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtvalor_retencion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtbalance,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcomentario,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtnivel_cuenta,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbes_detalle,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_centro_costos,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_ruc,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtporcentaje_base,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbusa_monto_minimo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtmonto_minimo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientocuenta.chbcon_retencion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtvalor_retencion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtbalance,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta.txtcomentario,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"cuenta");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"cuenta");
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

	registrarControlesTableValidacionEdition(cuenta_control,cuenta_webcontrol1,cuenta_constante1) {
		
		var strSuf=cuenta_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_19";
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
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:60';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_control.idempresaDefaultForeignKey!=null && cuenta_control.idempresaDefaultForeignKey>-1) {
					idActual=cuenta_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_webcontrol1.cargarComboEditarTablaempresaFK(cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_webcontrol1.cargarComboEditarTablaempresaFK(cuenta_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_control.idtipo_cuentaDefaultForeignKey!=null && cuenta_control.idtipo_cuentaDefaultForeignKey>-1) {
					idActual=cuenta_control.idtipo_cuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_webcontrol1.cargarComboEditarTablatipo_cuentaFK(cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_webcontrol1.cargarComboEditarTablatipo_cuentaFK(cuenta_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_control.idtipo_nivel_cuentaDefaultForeignKey!=null && cuenta_control.idtipo_nivel_cuentaDefaultForeignKey>-1) {
					idActual=cuenta_control.idtipo_nivel_cuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_webcontrol1.cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_webcontrol1.cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_control.idcuentaDefaultForeignKey!=null && cuenta_control.idcuentaDefaultForeignKey>-1) {
					idActual=cuenta_control.idcuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_webcontrol1.cargarComboEditarTablacuentaFK(cuenta_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_webcontrol1.cargarComboEditarTablacuentaFK(cuenta_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatoscuenta").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var cuenta_funcion1=new cuenta_funcion(); //var


//</script>
