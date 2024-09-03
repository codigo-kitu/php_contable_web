//<script type="text/javascript" language="javascript">


//var productoFuncionGeneral= function () {

class producto_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(producto_constante1.STR_RELATIVE_PATH,"producto");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(producto_constante1.STR_RELATIVE_PATH,producto_constante1.STR_NOMBRE_OPCION,"producto");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("producto",this);
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
		funcionGeneral.generarReporteFinalizacion(producto_constante1.STR_RELATIVE_PATH,producto_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(producto_constante1.STR_ES_RELACIONES,producto_constante1.STR_ES_RELACIONADO,producto_constante1.STR_RELATIVE_PATH,"producto");		
		
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
		funcionGeneral.eliminarOnClick(producto_constante1.STR_RELATIVE_PATH,"producto");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.hdnIdActual);
		jQuery('cmbproductoid_empresa').val("");
		jQuery('cmbproductoid_proveedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcosto);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbactivo,false);
		jQuery('cmbproductoid_tipo_producto').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_inicial);
		jQuery('cmbproductoid_impuesto').val("");
		jQuery('cmbproductoid_otro_impuesto').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbimpuesto_en_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbimpuesto_en_compras,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,false);
		jQuery('cmbproductoid_categoria_producto').val("");
		jQuery('cmbproductoid_sub_categoria_producto').val("");
		jQuery('cmbproductoid_bodega_defecto').val("");
		jQuery('cmbproductoid_unidad_compra').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtequivalencia_en_compra);
		jQuery('cmbproductoid_unidad_venta').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtequivalencia_en_venta);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtincremento1);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtincremento2);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtincremento3);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtincremento4);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtnotas);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtimagen);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcomentario);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbcomenta_factura,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcodigo_fabricante);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_maxima);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtcantidad_minima);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbfactura_sin_stock,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbmostrar_componente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbproducto_equivalente,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbavisa_expiracion,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbrequiere_nro_serie,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbacepta_lote,false);
		jQuery('cmbproductoid_cuenta_venta').val("");
		jQuery('cmbproductoid_cuenta_compra').val("");
		jQuery('cmbproductoid_cuenta_inventario').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtvalor_inventario);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtproducto_fisico);
		jQuery('dtproductoultima_venta').val(new Date());
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtprecio_de_compra_0);
		jQuery('dtproductoprecio_actualizado').val(new Date());
		jQuery('cmbproductoid_retencion').val("");
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbretencion_ventas,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoproducto.chbretencion_compras,false);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtsituacion_producto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoproducto.txtfactura_con_precio);	
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
		funcionGeneral.procesarInicioProceso(producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(producto_constante1.STR_RELATIVE_PATH,"producto");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(producto_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(producto_constante1.STR_RELATIVE_PATH,"producto");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(producto_constante1.STR_RELATIVE_PATH,"producto");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"producto");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarproducto.txtNumeroRegistrosproducto,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'productos',strNumeroRegistros,document.frmParamsBuscarproducto.txtNumeroRegistrosproducto);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(producto_constante1.BIT_CON_PAGINA_FORM==true && producto_constante1.BIT_ES_PAGINA_FORM==true) {
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
			else if(strValueTipoColumna==" Proveedores") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Costo") {
				jQuery(".col_costo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Producto") {
				jQuery(".col_id_tipo_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cantidad Inicial") {
				jQuery(".col_cantidad_inicial").css({"border-color":"red"});
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
			else if(strValueTipoColumna=="Otro Impuesto") {
				jQuery(".col_id_otro_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_otro_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_otro_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Impuesto En Ventas") {
				jQuery(".col_impuesto_en_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Ventas") {
				jQuery(".col_otro_impuesto_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto En Compras") {
				jQuery(".col_impuesto_en_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Compras") {
				jQuery(".col_otro_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Categoria Producto") {
				jQuery(".col_id_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sub Categoria Producto") {
				jQuery(".col_id_sub_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sub_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_sub_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Bodega Defecto") {
				jQuery(".col_id_bodega_defecto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_defecto_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_defecto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Unidad Compra") {
				jQuery(".col_id_unidad_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Compra") {
				jQuery(".col_equivalencia_en_compra").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Unidad Venta") {
				jQuery(".col_id_unidad_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Venta") {
				jQuery(".col_equivalencia_en_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento1") {
				jQuery(".col_incremento1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento2") {
				jQuery(".col_incremento2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento3") {
				jQuery(".col_incremento3").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Incremento4") {
				jQuery(".col_incremento4").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Notas") {
				jQuery(".col_notas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comentario") {
				jQuery(".col_comentario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comenta Factura") {
				jQuery(".col_comenta_factura").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo Fabricante") {
				jQuery(".col_codigo_fabricante").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad") {
				jQuery(".col_cantidad").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Maxima") {
				jQuery(".col_cantidad_maxima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Minima") {
				jQuery(".col_cantidad_minima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Sin Stock") {
				jQuery(".col_factura_sin_stock").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Mostrar Componente") {
				jQuery(".col_mostrar_componente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Equivalente") {
				jQuery(".col_producto_equivalente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Avisa Expiracion") {
				jQuery(".col_avisa_expiracion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Requiere Nro Serie") {
				jQuery(".col_requiere_nro_serie").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Acepta Lote") {
				jQuery(".col_acepta_lote").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Venta") {
				jQuery(".col_id_cuenta_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Compra") {
				jQuery(".col_id_cuenta_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Inventario") {
				jQuery(".col_id_cuenta_inventario").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_inventario_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_inventario_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Valor Inventario") {
				jQuery(".col_valor_inventario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Fisico") {
				jQuery(".col_producto_fisico").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultima Venta") {
				jQuery(".col_ultima_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Precio De Compra 0") {
				jQuery(".col_precio_de_compra_0").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Precio Actualizado") {
				jQuery(".col_precio_actualizado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencione") {
				jQuery(".col_id_retencion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Retencion Ventas") {
				jQuery(".col_retencion_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Compras") {
				jQuery(".col_retencion_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Situacion Producto") {
				jQuery(".col_situacion_producto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Con Precio") {
				jQuery(".col_factura_con_precio").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="imagen_producto" || strValueTipoRelacion=="Imagenes Producto") {
			producto_webcontrol1.registrarSesionParaimagen_productos(idActual);
		}
		else if(strValueTipoRelacion=="lista_cliente" || strValueTipoRelacion=="Lista Cliente") {
			producto_webcontrol1.registrarSesionParalista_clientes(idActual);
		}
		else if(strValueTipoRelacion=="lista_precio" || strValueTipoRelacion=="Lista Precios") {
			producto_webcontrol1.registrarSesionParalista_precioes(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="otro_suplidor" || strValueTipoRelacion=="Otro Suplidor") {
			producto_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		}
		else if(strValueTipoRelacion=="producto_bodega" || strValueTipoRelacion=="Producto Bodega") {
			producto_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(producto_constante1) {
		
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
		
		
		if(producto_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form-costo": {
					required:true,
					number:true
				},
					
					
				"form-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-cantidad_inicial": {
					required:true,
					number:true
				},
					
				"form-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_otro_impuesto": {
					digits:true
				
				},
					
					
					
					
					
				"form-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_bodega_defecto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form-incremento1": {
					required:true,
					number:true
				},
					
				"form-incremento2": {
					required:true,
					number:true
				},
					
				"form-incremento3": {
					required:true,
					number:true
				},
					
				"form-incremento4": {
					required:true,
					number:true
				},
					
				"form-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form-codigo_fabricante": {
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form-cantidad": {
					number:true
				},
					
				"form-cantidad_maxima": {
					required:true,
					number:true
				},
					
				"form-cantidad_minima": {
					required:true,
					number:true
				},
					
					
					
					
					
					
					
				"form-id_cuenta_venta": {
					digits:true
				
				},
					
				"form-id_cuenta_compra": {
					digits:true
				
				},
					
				"form-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form-valor_inventario": {
					required:true,
					number:true
				},
					
				"form-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form-ultima_venta": {
					required:true,
					date:true
				},
					
				"form-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form-id_retencion": {
					digits:true
				
				},
					
					
					
				"form-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form-factura_con_precio": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-cantidad_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_bodega_defecto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form-codigo_fabricante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-cantidad": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_maxima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					
					
					
					
					"form-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	
		
			
			if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_producto-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_proveedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-codigo": {
					required:true,
					maxlength:26
					,regexpStringMethod:true
				},
					
				"form_producto-nombre": {
					required:true,
					maxlength:70
					,regexpStringMethod:true
				},
					
				"form_producto-costo": {
					required:true,
					number:true
				},
					
					
				"form_producto-id_tipo_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-cantidad_inicial": {
					required:true,
					number:true
				},
					
				"form_producto-id_impuesto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_otro_impuesto": {
					digits:true
				
				},
					
					
					
					
					
				"form_producto-id_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_sub_categoria_producto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_bodega_defecto": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-id_unidad_compra": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-equivalencia_en_compra": {
					required:true,
					number:true
				},
					
				"form_producto-id_unidad_venta": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_producto-equivalencia_en_venta": {
					required:true,
					number:true
				},
					
				"form_producto-incremento1": {
					required:true,
					number:true
				},
					
				"form_producto-incremento2": {
					required:true,
					number:true
				},
					
				"form_producto-incremento3": {
					required:true,
					number:true
				},
					
				"form_producto-incremento4": {
					required:true,
					number:true
				},
					
				"form_producto-notas": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_producto-imagen": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_producto-comentario": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
					
				"form_producto-codigo_fabricante": {
					maxlength:24
					,regexpStringMethod:true
				},
					
				"form_producto-cantidad": {
					number:true
				},
					
				"form_producto-cantidad_maxima": {
					required:true,
					number:true
				},
					
				"form_producto-cantidad_minima": {
					required:true,
					number:true
				},
					
					
					
					
					
					
					
				"form_producto-id_cuenta_venta": {
					digits:true
				
				},
					
				"form_producto-id_cuenta_compra": {
					digits:true
				
				},
					
				"form_producto-id_cuenta_inventario": {
					digits:true
				
				},
					
				"form_producto-valor_inventario": {
					required:true,
					number:true
				},
					
				"form_producto-producto_fisico": {
					required:true,
					digits:true
				},
					
				"form_producto-ultima_venta": {
					required:true,
					date:true
				},
					
				"form_producto-precio_de_compra_0": {
					required:true,
					number:true
				},
					
				"form_producto-precio_actualizado": {
					required:true,
					date:true
				},
					
				"form_producto-id_retencion": {
					digits:true
				
				},
					
					
					
				"form_producto-situacion_producto": {
					required:true,
					digits:true
				},
					
				"form_producto-factura_con_precio": {
					required:true,
					digits:true
				}
				},
				
				messages: {
					"form_producto-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_proveedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-costo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					"form_producto-id_tipo_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-cantidad_inicial": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-id_impuesto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_otro_impuesto": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					
					
					"form_producto-id_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_sub_categoria_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_bodega_defecto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_unidad_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-equivalencia_en_compra": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-id_unidad_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-equivalencia_en_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-incremento1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-incremento2": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-incremento3": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-incremento4": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-notas": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-imagen": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-comentario": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					"form_producto-codigo_fabricante": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_producto-cantidad": ""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-cantidad_maxima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-cantidad_minima": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					
					
					
					
					
					
					"form_producto-id_cuenta_venta": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_cuenta_compra": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-id_cuenta_inventario": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-valor_inventario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-producto_fisico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-ultima_venta": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_producto-precio_de_compra_0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_producto-precio_actualizado": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FECHA_INCORRECTO,
					"form_producto-id_retencion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					
					
					"form_producto-situacion_producto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_producto-factura_con_precio": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO
				}		
			};	



			if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoproducto").validate(arrRules);
		
		if(producto_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesproducto").validate(arrRulesTotales);
		}
		
		
		
		jQuery("#form-ultima_venta").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		jQuery("#form-precio_actualizado").datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"producto");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			productoFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"producto");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcosto,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbactivo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_inicial,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_en_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_en_compras,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_en_compra,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_en_venta,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento4,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnotas,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtimagen,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcomentario,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbcomenta_factura,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo_fabricante,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_maxima,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_minima,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbfactura_sin_stock,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbmostrar_componente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbproducto_equivalente,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbavisa_expiracion,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbrequiere_nro_serie,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbacepta_lote,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtvalor_inventario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtproducto_fisico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtprecio_de_compra_0,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_ventas,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_compras,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtsituacion_producto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtfactura_con_precio,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcosto,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbactivo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_inicial,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_en_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbimpuesto_en_compras,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbotro_impuesto_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_en_compra,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtequivalencia_en_venta,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtincremento4,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtnotas,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtimagen,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcomentario,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbcomenta_factura,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcodigo_fabricante,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_maxima,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtcantidad_minima,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbfactura_sin_stock,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbmostrar_componente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbproducto_equivalente,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbavisa_expiracion,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbrequiere_nro_serie,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbacepta_lote,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtvalor_inventario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtproducto_fisico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtprecio_de_compra_0,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_ventas,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoproducto.chbretencion_compras,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtsituacion_producto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoproducto.txtfactura_con_precio,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,producto_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,producto_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"producto");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"producto");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"producto");
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

	registrarControlesTableValidacionEdition(producto_control,producto_webcontrol1,producto_constante1) {
		
		var strSuf=producto_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_46";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });

				control_name="t"+strSuf+"-cel_"+i+"_48";
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
					control_name="t"+strSuf+"-cel_"+i+"_8";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_10";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_11";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_16";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_17";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_18";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_19";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_21";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_41";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_42";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_43";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_49";
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
					strRules=strRules+'\r\nmaxlength:26';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:70';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
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
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
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
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:24';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_53";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
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
				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_31";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_32";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_33";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_34";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_45";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_46";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_48";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_49";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_52";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_53";
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

				if(producto_control.idempresaDefaultForeignKey!=null && producto_control.idempresaDefaultForeignKey>-1) {
					idActual=producto_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idproveedorDefaultForeignKey!=null && producto_control.idproveedorDefaultForeignKey>-1) {
					idActual=producto_control.idproveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idtipo_productoDefaultForeignKey!=null && producto_control.idtipo_productoDefaultForeignKey>-1) {
					idActual=producto_control.idtipo_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_10";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idimpuestoDefaultForeignKey!=null && producto_control.idimpuestoDefaultForeignKey>-1) {
					idActual=producto_control.idimpuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_11";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idotro_impuestoDefaultForeignKey!=null && producto_control.idotro_impuestoDefaultForeignKey>-1) {
					idActual=producto_control.idotro_impuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_16";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcategoria_productoDefaultForeignKey!=null && producto_control.idcategoria_productoDefaultForeignKey>-1) {
					idActual=producto_control.idcategoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_17";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idsub_categoria_productoDefaultForeignKey!=null && producto_control.idsub_categoria_productoDefaultForeignKey>-1) {
					idActual=producto_control.idsub_categoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_18";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idbodega_defectoDefaultForeignKey!=null && producto_control.idbodega_defectoDefaultForeignKey>-1) {
					idActual=producto_control.idbodega_defectoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_19";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idunidad_compraDefaultForeignKey!=null && producto_control.idunidad_compraDefaultForeignKey>-1) {
					idActual=producto_control.idunidad_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_21";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idunidad_ventaDefaultForeignKey!=null && producto_control.idunidad_ventaDefaultForeignKey>-1) {
					idActual=producto_control.idunidad_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_41";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_ventaDefaultForeignKey!=null && producto_control.idcuenta_ventaDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_42";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_compraDefaultForeignKey!=null && producto_control.idcuenta_compraDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_43";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_inventarioDefaultForeignKey!=null && producto_control.idcuenta_inventarioDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_inventarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_inventarioFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_inventarioFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_49";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idretencionDefaultForeignKey!=null && producto_control.idretencionDefaultForeignKey>-1) {
					idActual=producto_control.idretencionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosproducto").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var producto_funcion1=new producto_funcion(); //var


//</script>
