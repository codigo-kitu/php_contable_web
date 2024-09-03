//<script type="text/javascript" language="javascript">


//var sucursalFuncionGeneral= function () {

class sucursal_funcion {
	
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
		funcionGeneral.procesarInicioBusquedaPrincipal(sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(sucursal_constante1.STR_RELATIVE_PATH,sucursal_constante1.STR_NOMBRE_OPCION,"sucursal");		
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
		funcionGeneral.generarReporteFinalizacion(sucursal_constante1.STR_RELATIVE_PATH,sucursal_constante1.STR_NOMBRE_OPCION);
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
		funcionGeneralJQuery.actualizarOnComplete(sucursal_constante1.STR_ES_RELACIONES,sucursal_constante1.STR_ES_RELACIONADO,sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
		
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
		funcionGeneral.eliminarOnClick(sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
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
	
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.hdnIdActual);
		jQuery('cmbsucursalid_empresa').val("");
		jQuery('cmbsucursalid_pais').val("");
		jQuery('cmbsucursalid_ciudad').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtregistro_tributario);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion1);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion2);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtdireccion3);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txttelefono1);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcelular);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcorreo_electronico);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtsitio_web);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcodigo_postal);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtfax);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtbarrio_distrito);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtlogo);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtbase_de_datos);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtcondicion);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txticono_asociado);
		funcionGeneral.setEmptyControl(document.frmMantenimientosucursal.txtfolder_sucursal);	
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
		funcionGeneral.procesarInicioProceso(sucursal_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProceso() {
		funcionGeneralJQuery.procesarFinalizacionProceso(sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
	}	
	
	procesarInicioProcesoSimple() {		
		funcionGeneral.procesarInicioProcesoSimple(sucursal_constante1.STR_RELATIVE_PATH);				
	}
	
	procesarFinalizacionProcesoSimple() {
		funcionGeneralJQuery.procesarFinalizacionProcesoSimple(sucursal_constante1.STR_RELATIVE_PATH,"sucursal");
	}

//------------- Procesar-Link -------------------

	procesarFinalizacionProcesoAbrirLink() {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLink(sucursal_constante1.STR_RELATIVE_PATH,"sucursal");		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"sucursal");
	}
	
/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarsucursal.txtNumeroRegistrossucursal,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'sucursals',strNumeroRegistros,document.frmParamsBuscarsucursal.txtNumeroRegistrossucursal);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	esPaginaForm() {
		var bitRetorno =false;
		
		if(sucursal_constante1.BIT_CON_PAGINA_FORM==true && sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
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
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,sucursal_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}

//------------- Formulario-Archivos -------------------

	

//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(sucursal_constante1) {
		
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
		
		
		if(sucursal_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-registro_tributario": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form-registro_sucursalrial": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion1": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion2": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-direccion3": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-telefono1": {
					required:true,
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form-celular": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-correo_electronico": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-sitio_web": {
					maxlength:120
					,url:true
				},
					
				"form-codigo_postal": {
					maxlength:40
					,regexpPostalMethod:true
				},
					
				"form-fax": {
					maxlength:40
					,regexpFaxMethod:true
				},
					
				"form-barrio_distrito": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-base_de_datos": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-condicion": {
					digits:true
				},
					
				"form-icono_asociado": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form-folder_sucursal": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-registro_sucursalrial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-celular": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-correo_electronico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form-barrio_distrito": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-base_de_datos": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-condicion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-icono_asociado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-folder_sucursal": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
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
					
				"form_sucursal-id_empresa": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-id_pais": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-id_ciudad": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_sucursal-nombre": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_sucursal-registro_tributario": {
					required:true,
					maxlength:15
					,regexpStringMethod:true
				},
					
				"form_sucursal-registro_sucursalrial": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion1": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion2": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-direccion3": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-telefono1": {
					required:true,
					maxlength:40
					,regexpTelefonoMethod:true
				},
					
				"form_sucursal-celular": {
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_sucursal-correo_electronico": {
					required:true,
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-sitio_web": {
					maxlength:120
					,url:true
				},
					
				"form_sucursal-codigo_postal": {
					maxlength:40
					,regexpPostalMethod:true
				},
					
				"form_sucursal-fax": {
					maxlength:40
					,regexpFaxMethod:true
				},
					
				"form_sucursal-barrio_distrito": {
					maxlength:120
					,regexpStringMethod:true
				},
					
				"form_sucursal-logo": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_sucursal-base_de_datos": {
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_sucursal-condicion": {
					digits:true
				},
					
				"form_sucursal-icono_asociado": {
					maxlength:1000
					,regexpStringMethod:true
				},
					
				"form_sucursal-folder_sucursal": {
					maxlength:1000
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_sucursal-id_empresa": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-id_pais": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-id_ciudad": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-registro_tributario": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-registro_sucursalrial": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion2": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-direccion3": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-telefono1": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_sucursal-celular": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-correo_electronico": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-sitio_web": ""+constantes.STR_MENSAJE_URL_INCORRECTO,
					"form_sucursal-codigo_postal": ""+constantes.STR_MENSAJE_POSTAL_INCORRECTO,
					"form_sucursal-fax": ""+constantes.STR_MENSAJE_FAX_INCORRECTO,
					"form_sucursal-barrio_distrito": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-logo": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-base_de_datos": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-condicion": ""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_sucursal-icono_asociado": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_sucursal-folder_sucursal": ""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientosucursal").validate(arrRules);
		
		if(sucursal_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalessucursal").validate(arrRulesTotales);
		}
		
		
		
	}
	
/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	resaltarRestaurarDivMantenimiento(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMantenimiento(bitEsResaltar,"sucursal");
	}
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			sucursalFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"sucursal");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_tributario,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion2,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion3,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txttelefono1,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcelular,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcorreo_electronico,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtsitio_web,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcodigo_postal,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfax,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbarrio_distrito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtlogo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbase_de_datos,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcondicion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txticono_asociado,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfolder_sucursal,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_tributario,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtregistro_sucursalrial,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion2,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtdireccion3,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txttelefono1,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcelular,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcorreo_electronico,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtsitio_web,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcodigo_postal,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfax,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbarrio_distrito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtlogo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtbase_de_datos,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtcondicion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txticono_asociado,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientosucursal.txtfolder_sucursal,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,sucursal_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,sucursal_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"sucursal");		
	}
	
	resaltarRestaurarDivMensaje(bitEsResaltar,strMensaje,strTipo) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		var strNombreDivMensajePageDialog="divMensajePageDialog";
		
		funcionGeneral.resaltarRestaurarDivMensaje(strNombreDivMensajePageDialog,bitEsResaltar,strMensaje,strTipo,jQuery("#ParamsPostAccion-chbPostAccionSinMensaje"));
	}
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar) {
		funcionGeneralJQuery.resaltarRestaurarDivMensajePopup(bitEsResaltar,"sucursal");
	}
	
	resaltarRestaurarDivsPagina(bitEsResaltar) {
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,"sucursal");
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

	registrarControlesTableValidacionEdition(sucursal_control,sucursal_webcontrol1,sucursal_constante1) {
		
		var strSuf=sucursal_constante1.STR_SUFIJO;
		
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
					strRules=strRules+'\r\nmaxlength:80';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:15';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpTelefonoMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,url:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpPostalMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpFaxMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:120';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
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
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FONO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_14";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_URL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_15";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_POSTAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_FAX_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
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

				if(sucursal_control.idempresaDefaultForeignKey!=null && sucursal_control.idempresaDefaultForeignKey>-1) {
					idActual=sucursal_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					sucursal_webcontrol1.cargarComboEditarTablaempresaFK(sucursal_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						sucursal_webcontrol1.cargarComboEditarTablaempresaFK(sucursal_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(sucursal_control.idpaisDefaultForeignKey!=null && sucursal_control.idpaisDefaultForeignKey>-1) {
					idActual=sucursal_control.idpaisDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					sucursal_webcontrol1.cargarComboEditarTablapaisFK(sucursal_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						sucursal_webcontrol1.cargarComboEditarTablapaisFK(sucursal_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(sucursal_control.idciudadDefaultForeignKey!=null && sucursal_control.idciudadDefaultForeignKey>-1) {
					idActual=sucursal_control.idciudadDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					sucursal_webcontrol1.cargarComboEditarTablaciudadFK(sucursal_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						sucursal_webcontrol1.cargarComboEditarTablaciudadFK(sucursal_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatossucursal").validate(json_rules);
		
		//VALIDACION	
	}
	
}

var sucursal_funcion1=new sucursal_funcion(); //var


//</script>
