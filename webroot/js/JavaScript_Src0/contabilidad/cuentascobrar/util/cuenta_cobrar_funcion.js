//<script type="text/javascript" language="javascript">


//var cuenta_cobrarFuncionGeneral= function () {

class cuenta_cobrar_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(cuenta_cobrar_constante1.STR_RELATIVE_PATH,cuenta_cobrar_constante1.STR_NOMBRE_OPCION,"cuenta_cobrar");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("cuenta_cobrar",this);
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
		funcionGeneral.generarReporteFinalizacion(cuenta_cobrar_constante1.STR_RELATIVE_PATH,cuenta_cobrar_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(cuenta_cobrar_constante1.STR_ES_RELACIONES,cuenta_cobrar_constante1.STR_ES_RELACIONADO,cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");		
		
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
		funcionGeneral.eliminarOnClick(cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.hdnIdActual);
		jQuery('cmbcuenta_cobrarid_empresa').val("");
		jQuery('cmbcuenta_cobrarid_sucursal').val("");
		jQuery('cmbcuenta_cobrarid_ejercicio').val("");
		jQuery('cmbcuenta_cobrarid_periodo').val("");
		jQuery('cmbcuenta_cobrarid_usuario').val("");
		jQuery('cmbcuenta_cobrarid_factura').val("");
		jQuery('cmbcuenta_cobrarid_cliente').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtnumero);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtreferencia);
		jQuery('dtcuenta_cobrarfecha_emision').val(new Date());
		jQuery('dtcuenta_cobrarfecha_vence').val(new Date());
		jQuery('dtcuenta_cobrarultimo_movi').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtsaldo);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtporcentaje);
		funcionGeneral.setEmptyControl(document.frmMantenimientocuenta_cobrar.txtdescripcion);
		jQuery('cmbcuenta_cobrarid_estado_cuentas_cobrar').val("");	
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
		funcionGeneral.procesarInicioProceso(cuenta_cobrar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(cuenta_cobrar_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(cuenta_cobrar_constante1.STR_RELATIVE_PATH,"cuenta_cobrar");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"cuenta_cobrar");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarcuenta_cobrar.txtNumeroRegistroscuenta_cobrar,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'cuenta_cobrars',strNumeroRegistros,document.frmParamsBuscarcuenta_cobrar.txtNumeroRegistroscuenta_cobrar);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true && cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna==" Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Sucursal") {
				jQuery(".col_id_sucursal").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sucursal_img').trigger("click" );
				} else {
					jQuery('#form-id_sucursal_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Ejercicio") {
				jQuery(".col_id_ejercicio").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_ejercicio_img').trigger("click" );
				} else {
					jQuery('#form-id_ejercicio_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Periodo") {
				jQuery(".col_id_periodo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_periodo_img').trigger("click" );
				} else {
					jQuery('#form-id_periodo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Usuario") {
				jQuery(".col_id_usuario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_usuario_img').trigger("click" );
				} else {
					jQuery('#form-id_usuario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Factura") {
				jQuery(".col_id_factura").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_factura_img').trigger("click" );
				} else {
					jQuery('#form-id_factura_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Cliente") {
				jQuery(".col_id_cliente").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cliente_img').trigger("click" );
				} else {
					jQuery('#form-id_cliente_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Numero") {
				jQuery(".col_numero").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Referencia") {
				jQuery(".col_referencia").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Emision") {
				jQuery(".col_fecha_emision").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Vence") {
				jQuery(".col_fecha_vence").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultimo Mov.") {
				jQuery(".col_ultimo_movi").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Saldo") {
				jQuery(".col_saldo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="%") {
				jQuery(".col_porcentaje").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Estado Cuentas Cobrar") {
				jQuery(".col_id_estado_cuentas_cobrar").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_estado_cuentas_cobrar_img').trigger("click" );
				} else {
					jQuery('#form-id_estado_cuentas_cobrar_img_busqueda').trigger("click" );
				}
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,cuenta_cobrar_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cuenta_cobrar_detalle" || strValueTipoRelacion=="Detalle Cuenta Cobrar") {
			cuenta_cobrar_webcontrol1.registrarSesionParacuenta_cobrar_detalles(idActual);
		}
		else if(strValueTipoRelacion=="credito_cuenta_cobrar" || strValueTipoRelacion=="Credito Cuenta Cobrar") {
			cuenta_cobrar_webcontrol1.registrarSesionParacredito_cuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_corriente_detalle" || strValueTipoRelacion=="Cuenta Corriente Detalle") {
			cuenta_cobrar_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		}
		else if(strValueTipoRelacion=="debito_cuenta_cobrar" || strValueTipoRelacion=="Debito Cuenta Cobrar") {
			cuenta_cobrar_webcontrol1.registrarSesionParadebito_cuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="pago_cuenta_cobrar" || strValueTipoRelacion=="Pago Cuenta Cobrar") {
			cuenta_cobrar_webcontrol1.registrarSesionParapago_cuenta_cobrars(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(cuenta_cobrar_constante1) {
		
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
		
		
		if(cuenta_cobrar_constante1.STR_SUFIJO=="") {
			
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
					
				"form-id_factura": {
					required:true,
					digits:true
				
				},
					
				"form-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form-referencia": {
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form-fecha_emision": {
					required:true,
					date:true
				},
					
				"form-fecha_vence": {
					required:true,
					date:true
				},
					
				"form-ultimo_movi": {
					required:true,
					date:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-saldo": {
					required:true,
					number:true
				},
					
				"form-porcentaje": {
					required:true,
					number:true
				},
					
				"form-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-id_estado_cuentas_cobrar": {
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
					"form-id_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-ultimo_movi": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-porcentaje": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_estado_cuentas_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_cuenta_cobrar-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-id_sucursal": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-id_ejercicio": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-id_periodo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-id_usuario": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-id_factura": {
					required:true,
					digits:true
				
				},
					
				"form_cuenta_cobrar-id_cliente": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_cuenta_cobrar-numero": {
					required:true,
					maxlength:12
					,regexpStringMethod:true
				},
					
				"form_cuenta_cobrar-referencia": {
					maxlength:25
					,regexpStringMethod:true
				},
					
				"form_cuenta_cobrar-fecha_emision": {
					required:true,
					date:true
				},
					
				"form_cuenta_cobrar-fecha_vence": {
					required:true,
					date:true
				},
					
				"form_cuenta_cobrar-ultimo_movi": {
					required:true,
					date:true
				},
					
				"form_cuenta_cobrar-monto": {
					required:true,
					number:true
				},
					
				"form_cuenta_cobrar-saldo": {
					required:true,
					number:true
				},
					
				"form_cuenta_cobrar-porcentaje": {
					required:true,
					number:true
				},
					
				"form_cuenta_cobrar-descripcion": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_cuenta_cobrar-id_estado_cuentas_cobrar": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_cuenta_cobrar-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_sucursal": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_ejercicio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_periodo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_usuario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_factura": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-id_cliente": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_cuenta_cobrar-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_cobrar-referencia": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_cobrar-fecha_emision": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_cobrar-fecha_vence": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_cobrar-ultimo_movi": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_cuenta_cobrar-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_cobrar-saldo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_cobrar-porcentaje": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_cuenta_cobrar-descripcion": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_cuenta_cobrar-id_estado_cuentas_cobrar": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientocuenta_cobrar").validate(arrRules);
		
		if(cuenta_cobrar_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalescuenta_cobrar").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_emision").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_vence").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-ultimo_movi").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"cuenta_cobrar");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			cuenta_cobrarFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"cuenta_cobrar");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtreferencia,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtsaldo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtporcentaje,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtdescripcion,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtreferencia,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtsaldo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtporcentaje,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientocuenta_cobrar.txtdescripcion,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,cuenta_cobrar_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,cuenta_cobrar_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"cuenta_cobrar");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"cuenta_cobrar");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"cuenta_cobrar");
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

	registrarControlesTableValidacionEdition(cuenta_cobrar_control,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1) {
		
		var strSuf=cuenta_cobrar_constante1.STR_SUFIJO;
		
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

				control_name="t"+strSuf+"-cel_"+i+"_12";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_13";
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
					control_name="t"+strSuf+"-cel_"+i+"_7";
					jQuery("#"+control_name).select2();

					cuenta_cobrar_webcontrol1.registrarComboActionChangeid_factura(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_8";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_18";
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
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
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
					strRules=strRules+'\r\nmaxlength:12';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:25';
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
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
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
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
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

				if(cuenta_cobrar_control.idempresaDefaultForeignKey!=null && cuenta_cobrar_control.idempresaDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablaempresaFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablaempresaFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idsucursalDefaultForeignKey!=null && cuenta_cobrar_control.idsucursalDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idsucursalDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablasucursalFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablasucursalFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idejercicioDefaultForeignKey!=null && cuenta_cobrar_control.idejercicioDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idejercicioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablaejercicioFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablaejercicioFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idperiodoDefaultForeignKey!=null && cuenta_cobrar_control.idperiodoDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idperiodoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablaperiodoFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablaperiodoFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_6";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idusuarioDefaultForeignKey!=null && cuenta_cobrar_control.idusuarioDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablausuarioFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablausuarioFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_7";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idfacturaDefaultForeignKey!=null && cuenta_cobrar_control.idfacturaDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idfacturaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablafacturaFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablafacturaFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idclienteDefaultForeignKey!=null && cuenta_cobrar_control.idclienteDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idclienteDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablaclienteFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablaclienteFK(cuenta_cobrar_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_18";
				idActual=jQuery("#"+control_name).val();

				if(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultForeignKey!=null && cuenta_cobrar_control.idestado_cuentas_cobrarDefaultForeignKey>-1) {
					idActual=cuenta_cobrar_control.idestado_cuentas_cobrarDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					cuenta_cobrar_webcontrol1.cargarComboEditarTablaestado_cuentas_cobrarFK(cuenta_cobrar_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						cuenta_cobrar_webcontrol1.cargarComboEditarTablaestado_cuentas_cobrarFK(cuenta_cobrar_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatoscuenta_cobrar").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var cuenta_cobrar_funcion1=new cuenta_cobrar_funcion(); //var


//</script>
