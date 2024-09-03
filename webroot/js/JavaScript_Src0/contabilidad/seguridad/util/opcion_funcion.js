//<script type="text/javascript" language="javascript">


//var opcionFuncionGeneral= function () {

class opcion_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(opcion_constante1.STR_RELATIVE_PATH,"opcion");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(opcion_constante1.STR_RELATIVE_PATH,opcion_constante1.STR_NOMBRE_OPCION,"opcion");		
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
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("opcion",this);
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
		funcionGeneral.generarReporteFinalizacion(opcion_constante1.STR_RELATIVE_PATH,opcion_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(opcion_constante1.STR_ES_RELACIONES,opcion_constante1.STR_ES_RELACIONADO,opcion_constante1.STR_RELATIVE_PATH,"opcion");		
		
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
		funcionGeneral.eliminarOnClick(opcion_constante1.STR_RELATIVE_PATH,"opcion");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.hdnIdActual);
		jQuery('cmbopcionid_sistema').val("");
		jQuery('cmbopcionid_opcion').val("");
		jQuery('cmbopcionid_grupo_opcion').val("");
		jQuery('cmbopcionid_modulo').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtposicion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txticon_name);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtnombre_clase);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtmodulo0);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtsub_modulo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoopcion.txtpaquete);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbes_para_menu,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,false);
		funcionGeneral.setCheckControl(document.frmMantenimientoopcion.chbestado,false);	
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
		funcionGeneral.procesarInicioProceso(opcion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(opcion_constante1.STR_RELATIVE_PATH,"opcion");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(opcion_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(opcion_constante1.STR_RELATIVE_PATH,"opcion");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(opcion_constante1.STR_RELATIVE_PATH,"opcion");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"opcion");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscaropcion.txtNumeroRegistrosopcion,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'opciones',strNumeroRegistros,document.frmParamsBuscaropcion.txtNumeroRegistrosopcion);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(opcion_constante1.BIT_CON_PAGINA_FORM==true && opcion_constante1.BIT_ES_PAGINA_FORM==true) {
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
			
			else if(strValueTipoColumna=="A") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="A") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Sistema") {
				jQuery(".col_id_sistema").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sistema_img').trigger("click" );
				} else {
					jQuery('#form-id_sistema_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Opcion") {
				jQuery(".col_id_opcion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_opcion_img').trigger("click" );
				} else {
					jQuery('#form-id_opcion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Grupo Opcion") {
				jQuery(".col_id_grupo_opcion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_grupo_opcion_img').trigger("click" );
				} else {
					jQuery('#form-id_grupo_opcion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Modulo") {
				jQuery(".col_id_modulo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_modulo_img').trigger("click" );
				} else {
					jQuery('#form-id_modulo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Posicion") {
				jQuery(".col_posicion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Path Del Icono") {
				jQuery(".col_icon_name").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre De Clase") {
				jQuery(".col_nombre_clase").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Modulo 0") {
				jQuery(".col_modulo0").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Sub Modulo") {
				jQuery(".col_sub_modulo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Paquete") {
				jQuery(".col_paquete").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Para Menu") {
				jQuery(".col_es_para_menu").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Es Guardar Relaciones") {
				jQuery(".col_es_guardar_relaciones").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Mostrar Acciones Campo") {
				jQuery(".col_con_mostrar_acciones_campo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,opcion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="accion" || strValueTipoRelacion=="Accion") {
			opcion_webcontrol1.registrarSesionParaacciones(idActual);
		}
		else if(strValueTipoRelacion=="campo" || strValueTipoRelacion=="Campo") {
			opcion_webcontrol1.registrarSesionParacampos(idActual);
		}
		else if(strValueTipoRelacion=="opcion" || strValueTipoRelacion=="Opcion") {
			opcion_webcontrol1.registrarSesionParaopciones(idActual);
		}
		else if(strValueTipoRelacion=="perfil_opcion" || strValueTipoRelacion=="Perfil Opcion") {
			opcion_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(opcion_constante1) {
		
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
		
		
		if(opcion_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_opcion": {
					digits:true
				
				},
					
				"form-id_grupo_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-posicion": {
					required:true,
					digits:true
				},
					
				"form-icon_name": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-nombre_clase": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form-modulo0": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-sub_modulo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form-paquete": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
					
				},
				
				messages: {
					"form-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_opcion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_grupo_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-posicion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-icon_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_clase": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-modulo0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
				}		
			};	
		
			
			if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_opcion-id_sistema": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-id_opcion": {
					digits:true
				
				},
					
				"form_opcion-id_grupo_opcion": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-id_modulo": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_opcion-codigo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-nombre": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-posicion": {
					required:true,
					digits:true
				},
					
				"form_opcion-icon_name": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_opcion-nombre_clase": {
					required:true,
					maxlength:100
					,regexpStringMethod:true
				},
					
				"form_opcion-modulo0": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-sub_modulo": {
					required:true,
					maxlength:50
					,regexpStringMethod:true
				},
					
				"form_opcion-paquete": {
					required:true,
					maxlength:200
					,regexpStringMethod:true
				},
					
					
					
					
				},
				
				messages: {
					"form_opcion-id_sistema": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_opcion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_grupo_opcion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-id_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-posicion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_opcion-icon_name": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-nombre_clase": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-modulo0": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-sub_modulo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_opcion-paquete": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					
					
					
					
				}		
			};	



			if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoopcion").validate(arrRules);
		
		if(opcion_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesopcion").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"opcion");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			opcionFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"opcion");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtposicion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txticon_name,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre_clase,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtmodulo0,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtsub_modulo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtpaquete,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_para_menu,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,false);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbestado,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtposicion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txticon_name,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtnombre_clase,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtmodulo0,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtsub_modulo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoopcion.txtpaquete,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_para_menu,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbes_guardar_relaciones,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbcon_mostrar_acciones_campo,true);
			funcionGeneral.setDisabledControl(document.frmMantenimientoopcion.chbestado,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,opcion_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,opcion_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"opcion");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"opcion");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"opcion");
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

	registrarControlesTableValidacionEdition(opcion_control,opcion_webcontrol1,opcion_constante1) {
		
		var strSuf=opcion_constante1.STR_SUFIJO;
		
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
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
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
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:200';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				
				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				
				
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(opcion_control.idsistemaDefaultForeignKey!=null && opcion_control.idsistemaDefaultForeignKey>-1) {
					idActual=opcion_control.idsistemaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					opcion_webcontrol1.cargarComboEditarTablasistemaFK(opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						opcion_webcontrol1.cargarComboEditarTablasistemaFK(opcion_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(opcion_control.idopcionDefaultForeignKey!=null && opcion_control.idopcionDefaultForeignKey>-1) {
					idActual=opcion_control.idopcionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					opcion_webcontrol1.cargarComboEditarTablaopcionFK(opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						opcion_webcontrol1.cargarComboEditarTablaopcionFK(opcion_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(opcion_control.idgrupo_opcionDefaultForeignKey!=null && opcion_control.idgrupo_opcionDefaultForeignKey>-1) {
					idActual=opcion_control.idgrupo_opcionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					opcion_webcontrol1.cargarComboEditarTablagrupo_opcionFK(opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						opcion_webcontrol1.cargarComboEditarTablagrupo_opcionFK(opcion_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_5";
				idActual=jQuery("#"+control_name).val();

				if(opcion_control.idmoduloDefaultForeignKey!=null && opcion_control.idmoduloDefaultForeignKey>-1) {
					idActual=opcion_control.idmoduloDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					opcion_webcontrol1.cargarComboEditarTablamoduloFK(opcion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						opcion_webcontrol1.cargarComboEditarTablamoduloFK(opcion_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosopcion").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var opcion_funcion1=new opcion_funcion(); //var


//</script>
