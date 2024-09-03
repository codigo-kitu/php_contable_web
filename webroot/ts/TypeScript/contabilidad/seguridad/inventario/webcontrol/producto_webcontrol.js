//<script type="text/javascript" language="javascript">



//var productoJQueryPaginaWebInteraccion= function (producto_control) {
//this.,this.,this.

import {producto_constante,producto_constante1} from '../util/producto_constante.js';

import {producto_funcion,producto_funcion1} from '../util/producto_funcion.js';


class producto_webcontrol extends GeneralEntityWebControl {
	
	producto_control=null;
	producto_controlInicial=null;
	producto_controlAuxiliar=null;
		
	//if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_control) {
		super();
		
		this.producto_control=producto_control;
	}
		
	actualizarVariablesPagina(producto_control) {
		
		if(producto_control.action=="index" || producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_control);
			
		} 
		
		
		else if(producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_control);
		
		} else if(producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(producto_control);
		
		} else if(producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_control);
		
		} else if(producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(producto_control);
			
		} else if(producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(producto_control);
			
		} else if(producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_control);
		
		} else if(producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_control);		
		
		} else if(producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(producto_control);
		
		} else if(producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(producto_control);
		
		} else if(producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(producto_control);
		
		} else if(producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(producto_control);
		
		}  else if(producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_control);
		
		} else if(producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_control);
		
		} else if(producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(producto_control);
		
		} else if(producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(producto_control);
		
		} else if(producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(producto_control);
		
		} else if(producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_control);
		
		} else if(producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_control);
		
		} else if(producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(producto_control);
		
		} else if(producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_control);
		
		} else if(producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_control);		
		
		} else if(producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(producto_control);		
		
		} else if(producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(producto_control);		
		
		} else if(producto_control.action.includes("Busqueda") ||
				  producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(producto_control);
			
		} else if(producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(producto_control)
		}
		
		
		
	
		else if(producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_control);	
		
		} else if(producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_control);		
		}
	
		else if(producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_control);		
		}
	
		else if(producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(producto_control) {
		this.actualizarPaginaAccionesGenerales(producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(producto_control) {
		
		this.actualizarPaginaCargaGeneral(producto_control);
		this.actualizarPaginaOrderBy(producto_control);
		this.actualizarPaginaTablaDatos(producto_control);
		this.actualizarPaginaCargaGeneralControles(producto_control);
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_control);
		this.actualizarPaginaAreaBusquedas(producto_control);
		this.actualizarPaginaCargaCombosFK(producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_control) {
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_control) {
		
		this.actualizarPaginaCargaGeneral(producto_control);
		this.actualizarPaginaTablaDatos(producto_control);
		this.actualizarPaginaCargaGeneralControles(producto_control);
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_control);
		this.actualizarPaginaAreaBusquedas(producto_control);
		this.actualizarPaginaCargaCombosFK(producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(producto_control) {
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_control) {
		this.actualizarPaginaAbrirLink(producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);				
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);
		//this.actualizarPaginaFormulario(producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);
		//this.actualizarPaginaFormulario(producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(producto_control) {
		//this.actualizarPaginaFormulario(producto_control);
		this.onLoadCombosDefectoFK(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);
		//this.actualizarPaginaFormulario(producto_control);
		this.onLoadCombosDefectoFK(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_control) {
		this.actualizarPaginaAbrirLink(producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_control) {
					//super.actualizarPaginaImprimir(producto_control,"producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_control) {
		//super.actualizarPaginaImprimir(producto_control,"producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(producto_control) {
		//super.actualizarPaginaImprimir(producto_control,"producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(producto_control);
			
		this.actualizarPaginaAbrirLink(producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(producto_control) {
		this.actualizarPaginaTablaDatos(producto_control);
		this.actualizarPaginaFormulario(producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(producto_control) {
		
		if(producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_control);
		}
		
		if(producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(producto_control) {
		if(producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("productoReturnGeneral",JSON.stringify(producto_control.productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(producto_control) {
		if(producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(producto_control, mostrar) {
		
		if(mostrar==true) {
			producto_funcion1.resaltarRestaurarDivsPagina(false,"producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_funcion1.resaltarRestaurarDivMantenimiento(false,"producto");
			}			
			
			producto_funcion1.mostrarDivMensaje(true,producto_control.strAuxiliarMensaje,producto_control.strAuxiliarCssMensaje);
		
		} else {
			producto_funcion1.mostrarDivMensaje(false,producto_control.strAuxiliarMensaje,producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_control) {
		if(producto_funcion1.esPaginaForm(producto_constante1)==true) {
			window.opener.producto_webcontrol1.actualizarPaginaTablaDatos(producto_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_control) {
		producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_control.strAuxiliarUrlPagina);
				
		producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_control.strAuxiliarTipo,producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_control) {
		producto_funcion1.resaltarRestaurarDivMensaje(true,producto_control.strAuxiliarMensajeAlert,producto_control.strAuxiliarCssMensaje);
			
		if(producto_funcion1.esPaginaForm(producto_constante1)==true) {
			window.opener.producto_funcion1.resaltarRestaurarDivMensaje(true,producto_control.strAuxiliarMensajeAlert,producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(producto_control) {
		this.producto_controlInicial=producto_control;
			
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_control.strStyleDivArbol,producto_control.strStyleDivContent
																,producto_control.strStyleDivOpcionesBanner,producto_control.strStyleDivExpandirColapsar
																,producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(producto_control) {
		this.actualizarCssBotonesPagina(producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_control.tiposReportes,producto_control.tiposReporte
															 	,producto_control.tiposPaginacion,producto_control.tiposAcciones
																,producto_control.tiposColumnasSelect,producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(producto_control.tiposRelaciones,producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(producto_control) {
	
		var indexPosition=producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosempresasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosproveedorsFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombostipo_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosimpuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosotro_impuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscategoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombossub_categoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosbodega_defectosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosunidad_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosunidad_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_costosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosretencionsFK(producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_control.strRecargarFkTiposNinguno!=null && producto_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosempresasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosproveedorsFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombostipo_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosimpuestosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosotro_impuestosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscategoria_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombossub_categoria_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosbodega_defectosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosunidad_comprasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosunidad_ventasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_ventasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_comprasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_costosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosretencionsFK(producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.empresasFK);
	}

	cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.proveedorsFK);
	}

	cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.tipo_productosFK);
	}

	cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.impuestosFK);
	}

	cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.otro_impuestosFK);
	}

	cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.categoria_productosFK);
	}

	cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.sub_categoria_productosFK);
	}

	cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.bodega_defectosFK);
	}

	cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.unidad_comprasFK);
	}

	cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.unidad_ventasFK);
	}

	cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_ventasFK);
	}

	cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_comprasFK);
	}

	cargarComboEditarTablacuenta_costoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_costosFK);
	}

	cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.retencionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(producto_control) {
		jQuery("#divBusquedaproductoAjaxWebPart").css("display",producto_control.strPermisoBusqueda);
		jQuery("#trproductoCabeceraBusquedas").css("display",producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto").css("display",producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(producto_control.htmlTablaOrderBy!=null
			&& producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproductoAjaxWebPart").html(producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(producto_control.htmlTablaOrderByRel!=null
			&& producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproductoAjaxWebPart").html(producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproductoAjaxWebPart").css("display","none");
			jQuery("#trproductoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproducto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(producto_control) {
		
		if(!producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(producto_control);
		} else {
			jQuery("#divTablaDatosproductosAjaxWebPart").html(producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproductos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproductos=jQuery("#tblTablaDatosproductos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			producto_webcontrol1.registrarControlesTableEdition(producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosproductosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(producto_control);
		
		const divOrderBy = document.getElementById("divOrderByproductoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelproductoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(producto_control.productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(producto_control) {
		var i=0;
		
		i=producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(producto_control.productoActual.id);
		jQuery("#t-version_row_"+i+"").val(producto_control.productoActual.versionRow);
		
		if(producto_control.productoActual.id_empresa!=null && producto_control.productoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != producto_control.productoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(producto_control.productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_proveedor!=null && producto_control.productoActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != producto_control.productoActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_3").val(producto_control.productoActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(producto_control.productoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(producto_control.productoActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(producto_control.productoActual.costo);
		jQuery("#t-cel_"+i+"_7").prop('checked',producto_control.productoActual.activo);
		
		if(producto_control.productoActual.id_tipo_producto!=null && producto_control.productoActual.id_tipo_producto>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != producto_control.productoActual.id_tipo_producto) {
				jQuery("#t-cel_"+i+"_8").val(producto_control.productoActual.id_tipo_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(producto_control.productoActual.cantidad_inicial);
		
		if(producto_control.productoActual.id_impuesto!=null && producto_control.productoActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != producto_control.productoActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_10").val(producto_control.productoActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_otro_impuesto!=null && producto_control.productoActual.id_otro_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != producto_control.productoActual.id_otro_impuesto) {
				jQuery("#t-cel_"+i+"_11").val(producto_control.productoActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_11").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").prop('checked',producto_control.productoActual.impuesto_ventas);
		jQuery("#t-cel_"+i+"_13").prop('checked',producto_control.productoActual.otro_impuesto_ventas);
		jQuery("#t-cel_"+i+"_14").prop('checked',producto_control.productoActual.impuesto_compras);
		jQuery("#t-cel_"+i+"_15").prop('checked',producto_control.productoActual.otro_impuesto_compras);
		
		if(producto_control.productoActual.id_categoria_producto!=null && producto_control.productoActual.id_categoria_producto>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != producto_control.productoActual.id_categoria_producto) {
				jQuery("#t-cel_"+i+"_16").val(producto_control.productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_sub_categoria_producto!=null && producto_control.productoActual.id_sub_categoria_producto>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != producto_control.productoActual.id_sub_categoria_producto) {
				jQuery("#t-cel_"+i+"_17").val(producto_control.productoActual.id_sub_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_bodega_defecto!=null && producto_control.productoActual.id_bodega_defecto>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != producto_control.productoActual.id_bodega_defecto) {
				jQuery("#t-cel_"+i+"_18").val(producto_control.productoActual.id_bodega_defecto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_unidad_compra!=null && producto_control.productoActual.id_unidad_compra>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != producto_control.productoActual.id_unidad_compra) {
				jQuery("#t-cel_"+i+"_19").val(producto_control.productoActual.id_unidad_compra).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(producto_control.productoActual.equivalencia_compra);
		
		if(producto_control.productoActual.id_unidad_venta!=null && producto_control.productoActual.id_unidad_venta>-1){
			if(jQuery("#t-cel_"+i+"_21").val() != producto_control.productoActual.id_unidad_venta) {
				jQuery("#t-cel_"+i+"_21").val(producto_control.productoActual.id_unidad_venta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_21").select2("val", null);
			if(jQuery("#t-cel_"+i+"_21").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_21").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_22").val(producto_control.productoActual.equivalencia_venta);
		jQuery("#t-cel_"+i+"_23").val(producto_control.productoActual.descripcion);
		jQuery("#t-cel_"+i+"_24").val(producto_control.productoActual.imagen);
		jQuery("#t-cel_"+i+"_25").val(producto_control.productoActual.observacion);
		jQuery("#t-cel_"+i+"_26").prop('checked',producto_control.productoActual.comenta_factura);
		jQuery("#t-cel_"+i+"_27").val(producto_control.productoActual.codigo_fabricante);
		jQuery("#t-cel_"+i+"_28").val(producto_control.productoActual.cantidad);
		jQuery("#t-cel_"+i+"_29").val(producto_control.productoActual.cantidad_minima);
		jQuery("#t-cel_"+i+"_30").val(producto_control.productoActual.cantidad_maxima);
		jQuery("#t-cel_"+i+"_31").prop('checked',producto_control.productoActual.factura_sin_stock);
		jQuery("#t-cel_"+i+"_32").prop('checked',producto_control.productoActual.mostrar_componente);
		jQuery("#t-cel_"+i+"_33").prop('checked',producto_control.productoActual.producto_equivalente);
		jQuery("#t-cel_"+i+"_34").prop('checked',producto_control.productoActual.avisa_expiracion);
		jQuery("#t-cel_"+i+"_35").prop('checked',producto_control.productoActual.requiere_serie);
		jQuery("#t-cel_"+i+"_36").prop('checked',producto_control.productoActual.acepta_lote);
		
		if(producto_control.productoActual.id_cuenta_venta!=null && producto_control.productoActual.id_cuenta_venta>-1){
			if(jQuery("#t-cel_"+i+"_37").val() != producto_control.productoActual.id_cuenta_venta) {
				jQuery("#t-cel_"+i+"_37").val(producto_control.productoActual.id_cuenta_venta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_37").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_37").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_cuenta_compra!=null && producto_control.productoActual.id_cuenta_compra>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != producto_control.productoActual.id_cuenta_compra) {
				jQuery("#t-cel_"+i+"_38").val(producto_control.productoActual.id_cuenta_compra).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_38").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_cuenta_costo!=null && producto_control.productoActual.id_cuenta_costo>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != producto_control.productoActual.id_cuenta_costo) {
				jQuery("#t-cel_"+i+"_39").val(producto_control.productoActual.id_cuenta_costo).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_40").val(producto_control.productoActual.valor_inventario);
		jQuery("#t-cel_"+i+"_41").val(producto_control.productoActual.producto_fisico);
		jQuery("#t-cel_"+i+"_42").val(producto_control.productoActual.ultima_venta);
		jQuery("#t-cel_"+i+"_43").val(producto_control.productoActual.precio_actualizado);
		
		if(producto_control.productoActual.id_retencion!=null && producto_control.productoActual.id_retencion>-1){
			if(jQuery("#t-cel_"+i+"_44").val() != producto_control.productoActual.id_retencion) {
				jQuery("#t-cel_"+i+"_44").val(producto_control.productoActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_44").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_44").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_45").prop('checked',producto_control.productoActual.retencion_ventas);
		jQuery("#t-cel_"+i+"_46").prop('checked',producto_control.productoActual.retencion_compras);
		jQuery("#t-cel_"+i+"_47").val(producto_control.productoActual.factura_con_precio);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("producto","inventario","",producto_funcion1,producto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_bodega").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionproducto_bodega", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_suplidor").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionotro_suplidor", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_producto").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionimagen_producto", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaimagen_productos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_precio").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionlista_precio", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_precioes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionlista_producto", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_cliente").click(function(){
		jQuery("#tblTablaDatosproductos").on("click",".imgrelacionlista_cliente", function () {

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_clientes(idActual);
		});				
	}
		
	

	registrarSesionParaproducto_bodegas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","producto_bodega","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"s","");
	}

	registrarSesionParaotro_suplidores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","otro_suplidor","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"es","");
	}

	registrarSesionParaimagen_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","imagen_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"s","");
	}

	registrarSesionParalista_precioes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","lista_precio","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"es","");
	}

	registrarSesionParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","lista_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"es","");
	}

	registrarSesionParalista_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto","lista_cliente","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1,"s","");
	}
	
	registrarControlesTableEdition(producto_control) {
		producto_funcion1.registrarControlesTableValidacionEdition(producto_control,producto_webcontrol1,producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(producto_control) {
		jQuery("#divResumenproductoActualAjaxWebPart").html(producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_control) {
		//jQuery("#divAccionesRelacionesproductoAjaxWebPart").html(producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesproductoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(producto_control) {
		
		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",producto_control.strVisibleFK_Idbodega);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",producto_control.strVisibleFK_Idcategoria_producto);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",producto_control.strVisibleFK_Idcategoria_producto);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra").attr("style",producto_control.strVisibleFK_Idcuenta_compra);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra").attr("style",producto_control.strVisibleFK_Idcuenta_compra);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario").attr("style",producto_control.strVisibleFK_Idcuenta_inventario);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario").attr("style",producto_control.strVisibleFK_Idcuenta_inventario);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta").attr("style",producto_control.strVisibleFK_Idcuenta_venta);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta").attr("style",producto_control.strVisibleFK_Idcuenta_venta);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",producto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",producto_control.strVisibleFK_Idempresa);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",producto_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",producto_control.strVisibleFK_Idimpuesto);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",producto_control.strVisibleFK_Idotro_impuesto);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",producto_control.strVisibleFK_Idotro_impuesto);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",producto_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",producto_control.strVisibleFK_Idproveedor);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",producto_control.strVisibleFK_Idretencion);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",producto_control.strVisibleFK_Idretencion);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto").attr("style",producto_control.strVisibleFK_Idsub_categoria_producto);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto").attr("style",producto_control.strVisibleFK_Idsub_categoria_producto);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto").attr("style",producto_control.strVisibleFK_Idtipo_producto);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto").attr("style",producto_control.strVisibleFK_Idtipo_producto);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra").attr("style",producto_control.strVisibleFK_Idunidad_compra);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra").attr("style",producto_control.strVisibleFK_Idunidad_compra);
		}

		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta").attr("style",producto_control.strVisibleFK_Idunidad_venta);
			jQuery("#tblstrVisible"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta").attr("style",producto_control.strVisibleFK_Idunidad_venta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproducto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("producto","inventario","",producto_funcion1,producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("producto",id,"inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","empresa","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","proveedor","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParatipo_producto(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","tipo_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","impuesto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","otro_impuesto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParacategoria_producto(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParasub_categoria_producto(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","sub_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","bodega","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","unidad","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","unidad","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","cuenta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","cuenta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","cuenta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto","retencion","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto_bodega").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});
		jQuery("#imgdivrelacionotro_suplidor").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});
		jQuery("#imgdivrelacionimagen_producto").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParaimagen_productos(idActual);
		});
		jQuery("#imgdivrelacionlista_precio").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_precioes(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionlista_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualproducto");

			producto_webcontrol1.registrarSesionParalista_clientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("producto","inventario","",producto_funcion1,producto_webcontrol1,productoConstante,strParametros);
		
		//producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_empresa",producto_control.empresasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_2",producto_control.empresasFK);
		}
	};

	cargarCombosproveedorsFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor",producto_control.proveedorsFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_3",producto_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",producto_control.proveedorsFK);

	};

	cargarCombostipo_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto",producto_control.tipo_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_8",producto_control.tipo_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto",producto_control.tipo_productosFK);

	};

	cargarCombosimpuestosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto",producto_control.impuestosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_10",producto_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",producto_control.impuestosFK);

	};

	cargarCombosotro_impuestosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto",producto_control.otro_impuestosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_11",producto_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",producto_control.otro_impuestosFK);

	};

	cargarComboscategoria_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto",producto_control.categoria_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_16",producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",producto_control.categoria_productosFK);

	};

	cargarCombossub_categoria_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto",producto_control.sub_categoria_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_17",producto_control.sub_categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto",producto_control.sub_categoria_productosFK);

	};

	cargarCombosbodega_defectosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto",producto_control.bodega_defectosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_18",producto_control.bodega_defectosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto",producto_control.bodega_defectosFK);

	};

	cargarCombosunidad_comprasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra",producto_control.unidad_comprasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_19",producto_control.unidad_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra",producto_control.unidad_comprasFK);

	};

	cargarCombosunidad_ventasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta",producto_control.unidad_ventasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_21",producto_control.unidad_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta",producto_control.unidad_ventasFK);

	};

	cargarComboscuenta_ventasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta",producto_control.cuenta_ventasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_37",producto_control.cuenta_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta",producto_control.cuenta_ventasFK);

	};

	cargarComboscuenta_comprasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra",producto_control.cuenta_comprasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_38",producto_control.cuenta_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra",producto_control.cuenta_comprasFK);

	};

	cargarComboscuenta_costosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo",producto_control.cuenta_costosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_39",producto_control.cuenta_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo",producto_control.cuenta_costosFK);

	};

	cargarCombosretencionsFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_retencion",producto_control.retencionsFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_44",producto_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",producto_control.retencionsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(producto_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(producto_control) {

	};

	registrarComboActionChangeCombostipo_productosFK(producto_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(producto_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(producto_control) {

	};

	registrarComboActionChangeCombossub_categoria_productosFK(producto_control) {

	};

	registrarComboActionChangeCombosbodega_defectosFK(producto_control) {

	};

	registrarComboActionChangeCombosunidad_comprasFK(producto_control) {

	};

	registrarComboActionChangeCombosunidad_ventasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_ventasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_comprasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_costosFK(producto_control) {

	};

	registrarComboActionChangeCombosretencionsFK(producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idempresaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val() != producto_control.idempresaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val(producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idproveedorDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val() != producto_control.idproveedorDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val(producto_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(producto_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idtipo_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != producto_control.idtipo_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(producto_control.idtipo_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(producto_control.idtipo_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idimpuestoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val() != producto_control.idimpuestoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val(producto_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(producto_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != producto_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(producto_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(producto_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossub_categoria_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idsub_categoria_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != producto_control.idsub_categoria_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(producto_control.idsub_categoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(producto_control.idsub_categoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodega_defectosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idbodega_defectoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val() != producto_control.idbodega_defectoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val(producto_control.idbodega_defectoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val(producto_control.idbodega_defectoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_comprasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idunidad_compraDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != producto_control.idunidad_compraDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(producto_control.idunidad_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(producto_control.idunidad_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_ventasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idunidad_ventaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != producto_control.idunidad_ventaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(producto_control.idunidad_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(producto_control.idunidad_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_ventaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != producto_control.idcuenta_ventaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(producto_control.idcuenta_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(producto_control.idcuenta_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_compraDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != producto_control.idcuenta_compraDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(producto_control.idcuenta_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(producto_control.idcuenta_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_costosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_costoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val() != producto_control.idcuenta_costoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val(producto_control.idcuenta_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val(producto_control.idcuenta_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idretencionDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val() != producto_control.idretencionDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val(producto_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(producto_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	














	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosempresasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosproveedorsFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombostipo_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosimpuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosotro_impuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscategoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombossub_categoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosbodega_defectosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosunidad_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosunidad_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_costosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosretencionsFK(producto_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosempresasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosproveedorsFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombostipo_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosimpuestosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombossub_categoria_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosbodega_defectosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosunidad_comprasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosunidad_ventasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_ventasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_comprasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_costosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosretencionsFK(producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("producto","inventario","",producto_funcion1,producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("producto","inventario","",producto_funcion1,producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("producto","inventario","",producto_funcion1,producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("producto","inventario","",producto_funcion1,producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idbodega","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idcategoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idcuenta_compra","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idcuenta_inventario","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idcuenta_venta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idempresa","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idimpuesto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idotro_impuesto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idproveedor","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idretencion","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idsub_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idtipo_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idunidad_compra","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto","FK_Idunidad_venta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
		
			
			if(producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("producto","inventario","",producto_funcion1,producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto","inventario","",producto_funcion1,producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(producto_funcion1,producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(producto_funcion1,producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto","inventario","",producto_funcion1,producto_webcontrol1,"producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_producto","id_tipo_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParatipo_producto("id_tipo_producto");
				//alert(jQuery('#form-id_tipo_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sub_categoria_producto","id_sub_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParasub_categoria_producto("id_sub_categoria_producto");
				//alert(jQuery('#form-id_sub_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega_defecto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParabodega("id_bodega_defecto");
				//alert(jQuery('#form-id_bodega_defecto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_compra","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_compra");
				//alert(jQuery('#form-id_unidad_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_venta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_venta");
				//alert(jQuery('#form-id_unidad_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_venta","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_venta");
				//alert(jQuery('#form-id_cuenta_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compra","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compra");
				//alert(jQuery('#form-id_cuenta_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_costo","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_costo");
				//alert(jQuery('#form-id_cuenta_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_control) {
		
		jQuery("#divBusquedaproductoAjaxWebPart").css("display",producto_control.strPermisoBusqueda);
		jQuery("#trproductoCabeceraBusquedas").css("display",producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto").css("display",producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproducto").css("display",producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproducto").attr("style",producto_control.strPermisoMostrarTodos);		
		
		if(producto_control.strPermisoNuevo!=null) {
			jQuery("#tdproductoNuevo").css("display",producto_control.strPermisoNuevo);
			jQuery("#tdproductoNuevoToolBar").css("display",producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproductoDuplicar").css("display",producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproductoDuplicarToolBar").css("display",producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproductoNuevoGuardarCambios").css("display",producto_control.strPermisoNuevo);
			jQuery("#tdproductoNuevoGuardarCambiosToolBar").css("display",producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(producto_control.strPermisoActualizar!=null) {
			jQuery("#tdproductoCopiar").css("display",producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproductoCopiarToolBar").css("display",producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproductoConEditar").css("display",producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdproductoGuardarCambios").css("display",producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproductoGuardarCambiosToolBar").css("display",producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdproductoCerrarPagina").css("display",producto_control.strPermisoPopup);		
		jQuery("#tdproductoCerrarPaginaToolBar").css("display",producto_control.strPermisoPopup);
		//jQuery("#trproductoAccionesRelaciones").css("display",producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Productos";
		sTituloBanner+=" - " + producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproductoRelacionesToolBar").css("display",producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproducto").css("display",producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto","inventario","",producto_funcion1,producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_webcontrol1.registrarEventosControles();
		
		if(producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_constante1.STR_ES_RELACIONES=="true") {
			if(producto_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				producto_webcontrol1.onLoad();
			
			//} else {
				//if(producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);	
	}
}

var producto_webcontrol1 = new producto_webcontrol();

export {producto_webcontrol,producto_webcontrol1};

//Para ser llamado desde window.opener
window.producto_webcontrol1 = producto_webcontrol1;


if(producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_webcontrol1.onLoadWindow; 
}

//</script>