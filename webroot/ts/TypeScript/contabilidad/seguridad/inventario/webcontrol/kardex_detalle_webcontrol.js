//<script type="text/javascript" language="javascript">



//var kardex_detalleJQueryPaginaWebInteraccion= function (kardex_detalle_control) {
//this.,this.,this.

import {kardex_detalle_constante,kardex_detalle_constante1} from '../util/kardex_detalle_constante.js';

import {kardex_detalle_funcion,kardex_detalle_funcion1} from '../util/kardex_detalle_funcion.js';


class kardex_detalle_webcontrol extends GeneralEntityWebControl {
	
	kardex_detalle_control=null;
	kardex_detalle_controlInicial=null;
	kardex_detalle_controlAuxiliar=null;
		
	//if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kardex_detalle_control) {
		super();
		
		this.kardex_detalle_control=kardex_detalle_control;
	}
		
	actualizarVariablesPagina(kardex_detalle_control) {
		
		if(kardex_detalle_control.action=="index" || kardex_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kardex_detalle_control);
			
		} 
		
		
		else if(kardex_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(kardex_detalle_control);
		
		}  else if(kardex_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action.includes("Busqueda") ||
				  kardex_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(kardex_detalle_control);
			
		} else if(kardex_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(kardex_detalle_control)
		}
		
		
		
	
		else if(kardex_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kardex_detalle_control);	
		
		} else if(kardex_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + kardex_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(kardex_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(kardex_detalle_control) {
		this.actualizarPaginaAccionesGenerales(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(kardex_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_detalle_control);
		this.actualizarPaginaOrderBy(kardex_detalle_control);
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
		this.actualizarPaginaAreaBusquedas(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(kardex_detalle_control) {
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(kardex_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_detalle_control);
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
		this.actualizarPaginaAreaBusquedas(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(kardex_detalle_control) {
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);				
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(kardex_detalle_control) {
		//this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(kardex_detalle_control) {
		this.actualizarPaginaTablaDatos(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(kardex_detalle_control) {
					//super.actualizarPaginaImprimir(kardex_detalle_control,"kardex_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kardex_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("kardex_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(kardex_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kardex_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kardex_detalle_control) {
		//super.actualizarPaginaImprimir(kardex_detalle_control,"kardex_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("kardex_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(kardex_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kardex_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(kardex_detalle_control) {
		//super.actualizarPaginaImprimir(kardex_detalle_control,"kardex_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("kardex_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(kardex_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kardex_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(kardex_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(kardex_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(kardex_detalle_control);
			
		this.actualizarPaginaAbrirLink(kardex_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(kardex_detalle_control) {
		
		if(kardex_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kardex_detalle_control);
		}
		
		if(kardex_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(kardex_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(kardex_detalle_control) {
		if(kardex_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("kardex_detalleReturnGeneral",JSON.stringify(kardex_detalle_control.kardex_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(kardex_detalle_control, mostrar) {
		
		if(mostrar==true) {
			kardex_detalle_funcion1.resaltarRestaurarDivsPagina(false,"kardex_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kardex_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"kardex_detalle");
			}			
			
			kardex_detalle_funcion1.mostrarDivMensaje(true,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			kardex_detalle_funcion1.mostrarDivMensaje(false,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_funcion1.esPaginaForm(kardex_detalle_constante1)==true) {
			window.opener.kardex_detalle_webcontrol1.actualizarPaginaTablaDatos(kardex_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(kardex_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(kardex_detalle_control) {
		kardex_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kardex_detalle_control.strAuxiliarUrlPagina);
				
		kardex_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kardex_detalle_control.strAuxiliarTipo,kardex_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kardex_detalle_control) {
		kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
			
		if(kardex_detalle_funcion1.esPaginaForm(kardex_detalle_constante1)==true) {
			window.opener.kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(kardex_detalle_control) {
		this.kardex_detalle_controlInicial=kardex_detalle_control;
			
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kardex_detalle_control.strStyleDivArbol,kardex_detalle_control.strStyleDivContent
																,kardex_detalle_control.strStyleDivOpcionesBanner,kardex_detalle_control.strStyleDivExpandirColapsar
																,kardex_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=kardex_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",kardex_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(kardex_detalle_control) {
		this.actualizarCssBotonesPagina(kardex_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kardex_detalle_control.tiposReportes,kardex_detalle_control.tiposReporte
															 	,kardex_detalle_control.tiposPaginacion,kardex_detalle_control.tiposAcciones
																,kardex_detalle_control.tiposColumnasSelect,kardex_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kardex_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kardex_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(kardex_detalle_control) {
	
		var indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(kardex_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kardex_detalle_control.strRecargarFkTiposNinguno!=null && kardex_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && kardex_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablakardexFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.kardexsFK);
	}

	cargarComboEditarTablabodegaFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.unidadsFK);
	}

	cargarComboEditarTablalote_productoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.lote_productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(kardex_detalle_control) {
		jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trkardex_detalleCabeceraBusquedas").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex_detalle").css("display",kardex_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(kardex_detalle_control.htmlTablaOrderBy!=null
			&& kardex_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBykardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//kardex_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(kardex_detalle_control.htmlTablaOrderByRel!=null
			&& kardex_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelkardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display","none");
			jQuery("#trkardex_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedakardex_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(kardex_detalle_control) {
		
		if(!kardex_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(kardex_detalle_control);
		} else {
			jQuery("#divTablaDatoskardex_detallesAjaxWebPart").html(kardex_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoskardex_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoskardex_detalles=jQuery("#tblTablaDatoskardex_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("kardex_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',kardex_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			kardex_detalle_webcontrol1.registrarControlesTableEdition(kardex_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		kardex_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(kardex_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("kardex_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(kardex_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoskardex_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(kardex_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(kardex_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBykardex_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(kardex_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelkardex_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(kardex_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(kardex_detalle_control.kardex_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(kardex_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(kardex_detalle_control) {
		var i=0;
		
		i=kardex_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(kardex_detalle_control.kardex_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(kardex_detalle_control.kardex_detalleActual.versionRow);
		
		if(kardex_detalle_control.kardex_detalleActual.id_kardex!=null && kardex_detalle_control.kardex_detalleActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != kardex_detalle_control.kardex_detalleActual.id_kardex) {
				jQuery("#t-cel_"+i+"_2").val(kardex_detalle_control.kardex_detalleActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_2").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(kardex_detalle_control.kardex_detalleActual.numero_item);
		
		if(kardex_detalle_control.kardex_detalleActual.id_bodega!=null && kardex_detalle_control.kardex_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != kardex_detalle_control.kardex_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(kardex_detalle_control.kardex_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_producto!=null && kardex_detalle_control.kardex_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != kardex_detalle_control.kardex_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(kardex_detalle_control.kardex_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_unidad!=null && kardex_detalle_control.kardex_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != kardex_detalle_control.kardex_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_6").val(kardex_detalle_control.kardex_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(kardex_detalle_control.kardex_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(kardex_detalle_control.kardex_detalleActual.costo);
		jQuery("#t-cel_"+i+"_9").val(kardex_detalle_control.kardex_detalleActual.total);
		
		if(kardex_detalle_control.kardex_detalleActual.id_lote_producto!=null && kardex_detalle_control.kardex_detalleActual.id_lote_producto>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != kardex_detalle_control.kardex_detalleActual.id_lote_producto) {
				jQuery("#t-cel_"+i+"_10").val(kardex_detalle_control.kardex_detalleActual.id_lote_producto).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(kardex_detalle_control.kardex_detalleActual.descripcion);
		jQuery("#t-cel_"+i+"_12").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible);
		jQuery("#t-cel_"+i+"_13").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible_total);
		jQuery("#t-cel_"+i+"_14").val(kardex_detalle_control.kardex_detalleActual.costo_anterior);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(kardex_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(kardex_detalle_control) {
		kardex_detalle_funcion1.registrarControlesTableValidacionEdition(kardex_detalle_control,kardex_detalle_webcontrol1,kardex_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(kardex_detalle_control) {
		jQuery("#divResumenkardex_detalleActualAjaxWebPart").html(kardex_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(kardex_detalle_control) {
		//jQuery("#divAccionesRelacioneskardex_detalleAjaxWebPart").html(kardex_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("kardex_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(kardex_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneskardex_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		kardex_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(kardex_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(kardex_detalle_control) {
		
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",kardex_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",kardex_detalle_control.strVisibleFK_Idbodega);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",kardex_detalle_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",kardex_detalle_control.strVisibleFK_Idkardex);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote").attr("style",kardex_detalle_control.strVisibleFK_Idlote);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote").attr("style",kardex_detalle_control.strVisibleFK_Idlote);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",kardex_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",kardex_detalle_control.strVisibleFK_Idproducto);
		}

		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",kardex_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",kardex_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionkardex_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("kardex_detalle",id,"inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);		
	}
	
	

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","kardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","bodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","unidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	abrirBusquedaParalote_producto(strNombreCampoBusqueda){//idActual
		kardex_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("kardex_detalle","lote_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalleConstante,strParametros);
		
		//kardex_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboskardexsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex",kardex_detalle_control.kardexsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_2",kardex_detalle_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",kardex_detalle_control.kardexsFK);

	};

	cargarCombosbodegasFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",kardex_detalle_control.bodegasFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_4",kardex_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",kardex_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",kardex_detalle_control.productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_5",kardex_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",kardex_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad",kardex_detalle_control.unidadsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_6",kardex_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",kardex_detalle_control.unidadsFK);

	};

	cargarComboslote_productosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto",kardex_detalle_control.lote_productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_10",kardex_detalle_control.lote_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto",kardex_detalle_control.lote_productosFK);

	};

	
	
	registrarComboActionChangeComboskardexsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeComboslote_productosFK(kardex_detalle_control) {

	};

	
	
	setDefectoValorComboskardexsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idkardexDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val() != kardex_detalle_control.idkardexDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(kardex_detalle_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(kardex_detalle_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != kardex_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(kardex_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(kardex_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != kardex_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(kardex_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(kardex_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != kardex_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(kardex_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(kardex_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslote_productosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idlote_productoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val() != kardex_detalle_control.idlote_productoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(kardex_detalle_control.idlote_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(kardex_detalle_control.idlote_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kardex_detalle_control
		
	

		var cantidad="form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

		var costo="form"+kardex_detalle_constante1.STR_SUFIJO+"-costo";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","costo",costo,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboslote_productosFK(kardex_detalle_control);
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
	onLoadCombosEventosFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboskardexsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboslote_productosFK(kardex_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(kardex_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idbodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idkardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idlote","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idproducto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("kardex_detalle","FK_Idunidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
		
			
			if(kardex_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kardex_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kardex_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(kardex_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,"kardex_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("lote_producto","id_lote_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParalote_producto("id_lote_producto");
				//alert(jQuery('#form-id_lote_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kardex_detalle_control) {
		
		jQuery("#divBusquedakardex_detalleAjaxWebPart").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trkardex_detalleCabeceraBusquedas").css("display",kardex_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedakardex_detalle").css("display",kardex_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportekardex_detalle").css("display",kardex_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoskardex_detalle").attr("style",kardex_detalle_control.strPermisoMostrarTodos);		
		
		if(kardex_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdkardex_detalleNuevo").css("display",kardex_detalle_control.strPermisoNuevo);
			jQuery("#tdkardex_detalleNuevoToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdkardex_detalleDuplicar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardex_detalleDuplicarToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkardex_detalleNuevoGuardarCambios").css("display",kardex_detalle_control.strPermisoNuevo);
			jQuery("#tdkardex_detalleNuevoGuardarCambiosToolBar").css("display",kardex_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(kardex_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdkardex_detalleCopiar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardex_detalleCopiarToolBar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkardex_detalleConEditar").css("display",kardex_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdkardex_detalleGuardarCambios").css("display",kardex_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdkardex_detalleGuardarCambiosToolBar").css("display",kardex_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdkardex_detalleCerrarPagina").css("display",kardex_detalle_control.strPermisoPopup);		
		jQuery("#tdkardex_detalleCerrarPaginaToolBar").css("display",kardex_detalle_control.strPermisoPopup);
		//jQuery("#trkardex_detalleAccionesRelaciones").css("display",kardex_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=kardex_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kardex_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + kardex_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalles";
		sTituloBanner+=" - " + kardex_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kardex_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdkardex_detalleRelacionesToolBar").css("display",kardex_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoskardex_detalle").css("display",kardex_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		kardex_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		kardex_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarEventosControles();
		
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			kardex_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kardex_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				kardex_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kardex_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(kardex_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				kardex_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			kardex_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
	}
}

var kardex_detalle_webcontrol1 = new kardex_detalle_webcontrol();

export {kardex_detalle_webcontrol,kardex_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.kardex_detalle_webcontrol1 = kardex_detalle_webcontrol1;


if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kardex_detalle_webcontrol1.onLoadWindow; 
}

//</script>