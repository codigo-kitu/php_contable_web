//<script type="text/javascript" language="javascript">



//var lista_precioJQueryPaginaWebInteraccion= function (lista_precio_control) {
//this.,this.,this.

import {lista_precio_constante,lista_precio_constante1} from '../util/lista_precio_constante.js';

import {lista_precio_funcion,lista_precio_funcion1} from '../util/lista_precio_funcion.js';


class lista_precio_webcontrol extends GeneralEntityWebControl {
	
	lista_precio_control=null;
	lista_precio_controlInicial=null;
	lista_precio_controlAuxiliar=null;
		
	//if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_precio_control) {
		super();
		
		this.lista_precio_control=lista_precio_control;
	}
		
	actualizarVariablesPagina(lista_precio_control) {
		
		if(lista_precio_control.action=="index" || lista_precio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_precio_control);
			
		} 
		
		
		else if(lista_precio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_precio_control);
		
		} else if(lista_precio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(lista_precio_control);
		
		} else if(lista_precio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_precio_control);
		
		} else if(lista_precio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(lista_precio_control);
			
		} else if(lista_precio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(lista_precio_control);
			
		} else if(lista_precio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_precio_control);
		
		} else if(lista_precio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_precio_control);		
		
		} else if(lista_precio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(lista_precio_control);
		
		} else if(lista_precio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(lista_precio_control);
		
		} else if(lista_precio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(lista_precio_control);
		
		} else if(lista_precio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(lista_precio_control);
		
		}  else if(lista_precio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_precio_control);
		
		} else if(lista_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lista_precio_control);
		
		} else if(lista_precio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(lista_precio_control);
		
		} else if(lista_precio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(lista_precio_control);
		
		} else if(lista_precio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(lista_precio_control);
		
		} else if(lista_precio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_precio_control);
		
		} else if(lista_precio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_precio_control);
		
		} else if(lista_precio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(lista_precio_control);
		
		} else if(lista_precio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_precio_control);
		
		} else if(lista_precio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_precio_control);		
		
		} else if(lista_precio_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_precio_control);		
		
		} else if(lista_precio_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_precio_control);		
		
		} else if(lista_precio_control.action.includes("Busqueda") ||
				  lista_precio_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(lista_precio_control);
			
		} else if(lista_precio_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_precio_control)
		}
		
		
		
	
		else if(lista_precio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_precio_control);	
		
		} else if(lista_precio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_precio_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_precio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_precio_control) {
		this.actualizarPaginaAccionesGenerales(lista_precio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_precio_control) {
		
		this.actualizarPaginaCargaGeneral(lista_precio_control);
		this.actualizarPaginaOrderBy(lista_precio_control);
		this.actualizarPaginaTablaDatos(lista_precio_control);
		this.actualizarPaginaCargaGeneralControles(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_precio_control);
		this.actualizarPaginaAreaBusquedas(lista_precio_control);
		this.actualizarPaginaCargaCombosFK(lista_precio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_precio_control) {
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_precio_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_precio_control) {
		
		this.actualizarPaginaCargaGeneral(lista_precio_control);
		this.actualizarPaginaTablaDatos(lista_precio_control);
		this.actualizarPaginaCargaGeneralControles(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_precio_control);
		this.actualizarPaginaAreaBusquedas(lista_precio_control);
		this.actualizarPaginaCargaCombosFK(lista_precio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(lista_precio_control) {
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_precio_control) {
		this.actualizarPaginaAbrirLink(lista_precio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);				
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(lista_precio_control) {
		//this.actualizarPaginaFormulario(lista_precio_control);
		this.onLoadCombosDefectoFK(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);
		this.onLoadCombosDefectoFK(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_precio_control) {
		this.actualizarPaginaAbrirLink(lista_precio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(lista_precio_control) {
		this.actualizarPaginaTablaDatos(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_precio_control) {
					//super.actualizarPaginaImprimir(lista_precio_control,"lista_precio");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_precio_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("lista_precio_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_precio_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_precio_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_precio_control) {
		//super.actualizarPaginaImprimir(lista_precio_control,"lista_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("lista_precio_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(lista_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_precio_control) {
		//super.actualizarPaginaImprimir(lista_precio_control,"lista_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("lista_precio_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_precio_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_precio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_precio_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(lista_precio_control);
			
		this.actualizarPaginaAbrirLink(lista_precio_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_precio_control) {
		
		if(lista_precio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_precio_control);
		}
		
		if(lista_precio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_precio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_precio_control) {
		if(lista_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_precioReturnGeneral",JSON.stringify(lista_precio_control.lista_precioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_precio_control) {
		if(lista_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_precio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_precio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_precio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_precio_control, mostrar) {
		
		if(mostrar==true) {
			lista_precio_funcion1.resaltarRestaurarDivsPagina(false,"lista_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_precio");
			}			
			
			lista_precio_funcion1.mostrarDivMensaje(true,lista_precio_control.strAuxiliarMensaje,lista_precio_control.strAuxiliarCssMensaje);
		
		} else {
			lista_precio_funcion1.mostrarDivMensaje(false,lista_precio_control.strAuxiliarMensaje,lista_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_precio_control) {
		if(lista_precio_funcion1.esPaginaForm(lista_precio_constante1)==true) {
			window.opener.lista_precio_webcontrol1.actualizarPaginaTablaDatos(lista_precio_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_precio_control) {
		lista_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_precio_control.strAuxiliarUrlPagina);
				
		lista_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_precio_control.strAuxiliarTipo,lista_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_precio_control) {
		lista_precio_funcion1.resaltarRestaurarDivMensaje(true,lista_precio_control.strAuxiliarMensajeAlert,lista_precio_control.strAuxiliarCssMensaje);
			
		if(lista_precio_funcion1.esPaginaForm(lista_precio_constante1)==true) {
			window.opener.lista_precio_funcion1.resaltarRestaurarDivMensaje(true,lista_precio_control.strAuxiliarMensajeAlert,lista_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_precio_control) {
		this.lista_precio_controlInicial=lista_precio_control;
			
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_precio_control.strStyleDivArbol,lista_precio_control.strStyleDivContent
																,lista_precio_control.strStyleDivOpcionesBanner,lista_precio_control.strStyleDivExpandirColapsar
																,lista_precio_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=lista_precio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",lista_precio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_precio_control) {
		this.actualizarCssBotonesPagina(lista_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_precio_control.tiposReportes,lista_precio_control.tiposReporte
															 	,lista_precio_control.tiposPaginacion,lista_precio_control.tiposAcciones
																,lista_precio_control.tiposColumnasSelect,lista_precio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_precio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_precio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_precio_control) {
	
		var indexPosition=lista_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosempresasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosbodegasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosproductosFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosproveedorsFK(lista_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_precio_control.strRecargarFkTiposNinguno!=null && lista_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosempresasFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosbodegasFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosproductosFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosproveedorsFK(lista_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.empresasFK);
	}

	cargarComboEditarTablabodegaFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.productosFK);
	}

	cargarComboEditarTablaproveedorFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(lista_precio_control) {
		jQuery("#divBusquedalista_precioAjaxWebPart").css("display",lista_precio_control.strPermisoBusqueda);
		jQuery("#trlista_precioCabeceraBusquedas").css("display",lista_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_precio").css("display",lista_precio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(lista_precio_control.htmlTablaOrderBy!=null
			&& lista_precio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylista_precioAjaxWebPart").html(lista_precio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//lista_precio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(lista_precio_control.htmlTablaOrderByRel!=null
			&& lista_precio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellista_precioAjaxWebPart").html(lista_precio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(lista_precio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalista_precioAjaxWebPart").css("display","none");
			jQuery("#trlista_precioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalista_precio").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(lista_precio_control) {
		
		if(!lista_precio_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(lista_precio_control);
		} else {
			jQuery("#divTablaDatoslista_preciosAjaxWebPart").html(lista_precio_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslista_precios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslista_precios=jQuery("#tblTablaDatoslista_precios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("lista_precio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',lista_precio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			lista_precio_webcontrol1.registrarControlesTableEdition(lista_precio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		lista_precio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(lista_precio_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("lista_precio_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_precio_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoslista_preciosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(lista_precio_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(lista_precio_control);
		
		const divOrderBy = document.getElementById("divOrderBylista_precioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(lista_precio_control);
		
		const divOrderByRel = document.getElementById("divOrderByRellista_precioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(lista_precio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(lista_precio_control.lista_precioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(lista_precio_control);			
		}
	}
	
	actualizarCamposFilaTabla(lista_precio_control) {
		var i=0;
		
		i=lista_precio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(lista_precio_control.lista_precioActual.id);
		jQuery("#t-version_row_"+i+"").val(lista_precio_control.lista_precioActual.versionRow);
		
		if(lista_precio_control.lista_precioActual.id_empresa!=null && lista_precio_control.lista_precioActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != lista_precio_control.lista_precioActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(lista_precio_control.lista_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_bodega!=null && lista_precio_control.lista_precioActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != lista_precio_control.lista_precioActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(lista_precio_control.lista_precioActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_producto!=null && lista_precio_control.lista_precioActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != lista_precio_control.lista_precioActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(lista_precio_control.lista_precioActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_proveedor!=null && lista_precio_control.lista_precioActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != lista_precio_control.lista_precioActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_5").val(lista_precio_control.lista_precioActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(lista_precio_control.lista_precioActual.precio_compra);
		jQuery("#t-cel_"+i+"_7").val(lista_precio_control.lista_precioActual.rango_inicial);
		jQuery("#t-cel_"+i+"_8").val(lista_precio_control.lista_precioActual.rango_final);
		jQuery("#t-cel_"+i+"_9").val(lista_precio_control.lista_precioActual.precio_dolar);
		jQuery("#t-cel_"+i+"_10").val(lista_precio_control.lista_precioActual.precio_compra2);
		jQuery("#t-cel_"+i+"_11").val(lista_precio_control.lista_precioActual.precio_dolar2);
		jQuery("#t-cel_"+i+"_12").val(lista_precio_control.lista_precioActual.rango_inicial2);
		jQuery("#t-cel_"+i+"_13").val(lista_precio_control.lista_precioActual.rango_final2);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(lista_precio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(lista_precio_control) {
		lista_precio_funcion1.registrarControlesTableValidacionEdition(lista_precio_control,lista_precio_webcontrol1,lista_precio_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(lista_precio_control) {
		jQuery("#divResumenlista_precioActualAjaxWebPart").html(lista_precio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(lista_precio_control) {
		//jQuery("#divAccionesRelacioneslista_precioAjaxWebPart").html(lista_precio_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("lista_precio_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_precio_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneslista_precioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		lista_precio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(lista_precio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(lista_precio_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(lista_precio_control) {
		
		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lista_precio_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lista_precio_control.strVisibleFK_Idbodega);
		}

		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",lista_precio_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",lista_precio_control.strVisibleFK_Idempresa);
		}

		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_precio_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_precio_control.strVisibleFK_Idproducto);
		}

		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",lista_precio_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",lista_precio_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlista_precio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("lista_precio",id,"inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		lista_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_precio","empresa","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		lista_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_precio","bodega","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		lista_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_precio","producto","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		lista_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_precio","proveedor","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precioConstante,strParametros);
		
		//lista_precio_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa",lista_precio_control.empresasFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_2",lista_precio_control.empresasFK);
		}
	};

	cargarCombosbodegasFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega",lista_precio_control.bodegasFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_3",lista_precio_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lista_precio_control.bodegasFK);

	};

	cargarCombosproductosFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto",lista_precio_control.productosFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_4",lista_precio_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_precio_control.productosFK);

	};

	cargarCombosproveedorsFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor",lista_precio_control.proveedorsFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_5",lista_precio_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",lista_precio_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosproductosFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(lista_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val() != lista_precio_control.idempresaDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val(lista_precio_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idbodegaDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val() != lista_precio_control.idbodegaDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val(lista_precio_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lista_precio_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val() != lista_precio_control.idproductoDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val(lista_precio_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_precio_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idproveedorDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val() != lista_precio_control.idproveedorDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val(lista_precio_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(lista_precio_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosempresasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosbodegasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosproductosFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosproveedorsFK(lista_precio_control);
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
	onLoadCombosEventosFK(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosbodegasFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosproveedorsFK(lista_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(lista_precio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_precio","FK_Idbodega","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_precio","FK_Idempresa","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_precio","FK_Idproducto","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_precio","FK_Idproveedor","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
		
			
			if(lista_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_precio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_precio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,"lista_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_precio_control) {
		
		jQuery("#divBusquedalista_precioAjaxWebPart").css("display",lista_precio_control.strPermisoBusqueda);
		jQuery("#trlista_precioCabeceraBusquedas").css("display",lista_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_precio").css("display",lista_precio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelista_precio").css("display",lista_precio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslista_precio").attr("style",lista_precio_control.strPermisoMostrarTodos);		
		
		if(lista_precio_control.strPermisoNuevo!=null) {
			jQuery("#tdlista_precioNuevo").css("display",lista_precio_control.strPermisoNuevo);
			jQuery("#tdlista_precioNuevoToolBar").css("display",lista_precio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlista_precioDuplicar").css("display",lista_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_precioDuplicarToolBar").css("display",lista_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_precioNuevoGuardarCambios").css("display",lista_precio_control.strPermisoNuevo);
			jQuery("#tdlista_precioNuevoGuardarCambiosToolBar").css("display",lista_precio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(lista_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_precioCopiar").css("display",lista_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_precioCopiarToolBar").css("display",lista_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_precioConEditar").css("display",lista_precio_control.strPermisoActualizar);
		}
		
		jQuery("#tdlista_precioGuardarCambios").css("display",lista_precio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlista_precioGuardarCambiosToolBar").css("display",lista_precio_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdlista_precioCerrarPagina").css("display",lista_precio_control.strPermisoPopup);		
		jQuery("#tdlista_precioCerrarPaginaToolBar").css("display",lista_precio_control.strPermisoPopup);
		//jQuery("#trlista_precioAccionesRelaciones").css("display",lista_precio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Precioses";
		sTituloBanner+=" - " + lista_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_precioRelacionesToolBar").css("display",lista_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_precio").css("display",lista_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_precio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_precio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_precio_webcontrol1.registrarEventosControles();
		
		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			lista_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_precio_constante1.STR_ES_RELACIONES=="true") {
			if(lista_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				lista_precio_webcontrol1.onLoad();
			
			//} else {
				//if(lista_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			lista_precio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);	
	}
}

var lista_precio_webcontrol1 = new lista_precio_webcontrol();

export {lista_precio_webcontrol,lista_precio_webcontrol1};

//Para ser llamado desde window.opener
window.lista_precio_webcontrol1 = lista_precio_webcontrol1;


if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_precio_webcontrol1.onLoadWindow; 
}

//</script>