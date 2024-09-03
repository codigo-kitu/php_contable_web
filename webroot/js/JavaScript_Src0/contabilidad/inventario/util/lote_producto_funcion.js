//<script type="text/javascript" language="javascript">


//var lote_productoFuncionGeneral= function () {

class lote_producto_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(lote_producto_constante1.STR_RELATIVE_PATH,lote_producto_constante1.STR_NOMBRE_OPCION,"lote_producto");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("lote_producto",this);
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
		funcionGeneral.generarReporteFinalizacion(lote_producto_constante1.STR_RELATIVE_PATH,lote_producto_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(lote_producto_constante1.STR_ES_RELACIONES,lote_producto_constante1.STR_ES_RELACIONADO,lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
		
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
		funcionGeneral.eliminarOnClick(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.hdnIdActual);
		jQuery('cmblote_productoid_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_lote);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtdescripcion);
		jQuery('cmblote_productoid_bodega').val("");
		jQuery('dtlote_productofecha_ingreso').val(new Date());
		jQuery('dtlote_productofecha_expiracion').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtubicacion);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtcomentario);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_documento);
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtdisponible);
		jQuery('dtlote_productoagotado_en').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientolote_producto.txtnro_item);
		jQuery('cmblote_productoid_proveedor').val("");	
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
		funcionGeneral.procesarInicioProceso(lote_producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(lote_producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(lote_producto_constante1.STR_RELATIVE_PATH,"lote_producto");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"lote_producto");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarlote_producto.txtNumeroRegistroslote_producto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'lote_productoes',strNumeroRegistros,document.frmParamsBuscarlote_producto.txtNumeroRegistroslote_producto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(lote_producto_constante1.BIT_CON_PAGINA_FORM==true && lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna=="Producto") {
				jQuery(".col_id_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Nro Lote") {
				jQuery(".col_nro_lote").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Bodega") {
				jQuery(".col_id_bodega").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha Ingreso") {
				jQuery(".col_fecha_ingreso").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Fecha Expiracion") {
				jQuery(".col_fecha_expiracion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ubicacion") {
				jQuery(".col_ubicacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad") {
				jQuery(".col_cantidad").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Documento") {
				jQuery(".col_nro_documento").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Disponible") {
				jQuery(".col_disponible").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Agotado En") {
				jQuery(".col_agotado_en").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nro Item") {
				jQuery(".col_nro_item").css({"border-color":"red"});
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
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,lote_producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="kardex_detalle" || strValueTipoRelacion=="Detalle") {
			lote_producto_webcontrol1.registrarSesionParakardex_detalles(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(lote_producto_constante1) {
		
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
		
		
		if(lote_producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nro_lote": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-descripcion": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-fecha_ingreso": {
					required:true,
					date:true
				},
					
				"form-fecha_expiracion": {
					required:true,
					date:true
				},
					
				"form-ubicacion": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-cantidad": {
					required:true,
					number:true
				},
					
				"form-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-nro_documento": {
					required:true,
					digits:true
				},
					
				"form-disponible": {
					required:true,
					number:true
				},
					
				"form-agotado_en": {
					required:true,
					date:true
				},
					
				"form-nro_item": {
					required:true,
					digits:true
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nro_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-fecha_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-fecha_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-ubicacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-agotado_en": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_lote_producto-id_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lote_producto-nro_lote": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_lote_producto-descripcion": {
					required:true,
					maxlength:30
					,regexpStringMethod:true
				},
					
				"form_lote_producto-id_bodega": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_lote_producto-fecha_ingreso": {
					required:true,
					date:true
				},
					
				"form_lote_producto-fecha_expiracion": {
					required:true,
					date:true
				},
					
				"form_lote_producto-ubicacion": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_lote_producto-cantidad": {
					required:true,
					number:true
				},
					
				"form_lote_producto-comentario": {
					required:true,
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_lote_producto-nro_documento": {
					required:true,
					digits:true
				},
					
				"form_lote_producto-disponible": {
					required:true,
					number:true
				},
					
				"form_lote_producto-agotado_en": {
					required:true,
					date:true
				},
					
				"form_lote_producto-nro_item": {
					required:true,
					digits:true
				},
					
				"form_lote_producto-id_proveedor": {
					required:true,
					digits:true
					,min:0
				}
				},
				
				messages: {
					"form_lote_producto-id_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-nro_lote": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-descripcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-id_bodega": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-fecha_ingreso": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-fecha_expiracion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-ubicacion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-cantidad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lote_producto-comentario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_lote_producto-nro_documento": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-disponible": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_lote_producto-agotado_en": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_lote_producto-nro_item": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_lote_producto-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientolote_producto").validate(arrRules);
		
		if(lote_producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotaleslote_producto").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-fecha_ingreso").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-fecha_expiracion").datepicker({ dateFormat: 'yy-mm-dd' });
		jQuery("#form-agotado_en").datepicker({ dateFormat: 'yy-mm-dd' });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"lote_producto");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			lote_productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"lote_producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdescripcion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtubicacion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcomentario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_documento,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdisponible,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_item,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdescripcion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtubicacion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtcomentario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_documento,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtdisponible,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientolote_producto.txtnro_item,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,lote_producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,lote_producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"lote_producto");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"lote_producto");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"lote_producto");
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

	registrarControlesTableValidacionEdition(lote_producto_control,lote_producto_webcontrol1,lote_producto_constante1) {
		
		var strSuf=lote_producto_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_6";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });

				control_name="t"+strSuf+"-cel_"+i+"_7";
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
					control_name="t"+strSuf+"-cel_"+i+"_5";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_15";
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
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:30';
					strRules=strRules+'\r\n,regexpStringMethod:true';
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
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
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

				if(lote_producto_control.idproductoDefaultForeignKey!=null && lote_producto_control.idproductoDefaultForeignKey>-1) {
					idActual=lote_producto_control.idproductoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lote_producto_webcontrol1.cargarComboEditarTablaproductoFK(lote_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lote_producto_webcontrol1.cargarComboEditarTablaproductoFK(lote_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(lote_producto_control.idbodegaDefaultForeignKey!=null && lote_producto_control.idbodegaDefaultForeignKey>-1) {
					idActual=lote_producto_control.idbodegaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lote_producto_webcontrol1.cargarComboEditarTablabodegaFK(lote_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lote_producto_webcontrol1.cargarComboEditarTablabodegaFK(lote_producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_15";
				idActual=jQuery("#"+control_name).val();

				if(lote_producto_control.idproveedorDefaultForeignKey!=null && lote_producto_control.idproveedorDefaultForeignKey>-1) {
					idActual=lote_producto_control.idproveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					lote_producto_webcontrol1.cargarComboEditarTablaproveedorFK(lote_producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						lote_producto_webcontrol1.cargarComboEditarTablaproveedorFK(lote_producto_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatoslote_producto").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var lote_producto_funcion1=new lote_producto_funcion(); //var


//</script>
