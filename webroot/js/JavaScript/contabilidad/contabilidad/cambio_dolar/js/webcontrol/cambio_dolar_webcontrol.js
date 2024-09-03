//<script type="text/javascript" language="javascript">



//var cambio_dolarJQueryPaginaWebInteraccion= function (cambio_dolar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cambio_dolar_constante,cambio_dolar_constante1} from '../util/cambio_dolar_constante.js';

import {cambio_dolar_funcion,cambio_dolar_funcion1} from '../util/cambio_dolar_funcion.js';


class cambio_dolar_webcontrol extends GeneralEntityWebControl {
	
	cambio_dolar_control=null;
	cambio_dolar_controlInicial=null;
	cambio_dolar_controlAuxiliar=null;
		
	//if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cambio_dolar_control) {
		super();
		
		this.cambio_dolar_control=cambio_dolar_control;
	}
		
	actualizarVariablesPagina(cambio_dolar_control) {
		
		if(cambio_dolar_control.action=="index" || cambio_dolar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cambio_dolar_control);
			
		} 
		
		
		else if(cambio_dolar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cambio_dolar_control);
		
		}  else if(cambio_dolar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action.includes("Busqueda") ||
				  cambio_dolar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cambio_dolar_control);
			
		} else if(cambio_dolar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cambio_dolar_control)
		}
		
		
		
	
		else if(cambio_dolar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cambio_dolar_control);	
		
		} else if(cambio_dolar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cambio_dolar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cambio_dolar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cambio_dolar_control) {
		this.actualizarPaginaAccionesGenerales(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cambio_dolar_control) {
		
		this.actualizarPaginaCargaGeneral(cambio_dolar_control);
		this.actualizarPaginaOrderBy(cambio_dolar_control);
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
		this.actualizarPaginaAreaBusquedas(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cambio_dolar_control) {
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cambio_dolar_control) {
		
		this.actualizarPaginaCargaGeneral(cambio_dolar_control);
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
		this.actualizarPaginaAreaBusquedas(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cambio_dolar_control) {
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);				
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cambio_dolar_control) {
		//this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		//this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cambio_dolar_control) {
		this.actualizarPaginaTablaDatos(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cambio_dolar_control) {
					//super.actualizarPaginaImprimir(cambio_dolar_control,"cambio_dolar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cambio_dolar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cambio_dolar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cambio_dolar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cambio_dolar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cambio_dolar_control) {
		//super.actualizarPaginaImprimir(cambio_dolar_control,"cambio_dolar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cambio_dolar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cambio_dolar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cambio_dolar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cambio_dolar_control) {
		//super.actualizarPaginaImprimir(cambio_dolar_control,"cambio_dolar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cambio_dolar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cambio_dolar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cambio_dolar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cambio_dolar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cambio_dolar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cambio_dolar_control);
			
		this.actualizarPaginaAbrirLink(cambio_dolar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cambio_dolar_control) {
		
		if(cambio_dolar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cambio_dolar_control);
		}
		
		if(cambio_dolar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cambio_dolar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cambio_dolar_control) {
		if(cambio_dolar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cambio_dolarReturnGeneral",JSON.stringify(cambio_dolar_control.cambio_dolarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cambio_dolar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cambio_dolar_control, mostrar) {
		
		if(mostrar==true) {
			cambio_dolar_funcion1.resaltarRestaurarDivsPagina(false,"cambio_dolar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cambio_dolar_funcion1.resaltarRestaurarDivMantenimiento(false,"cambio_dolar");
			}			
			
			cambio_dolar_funcion1.mostrarDivMensaje(true,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		
		} else {
			cambio_dolar_funcion1.mostrarDivMensaje(false,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_funcion1.esPaginaForm(cambio_dolar_constante1)==true) {
			window.opener.cambio_dolar_webcontrol1.actualizarPaginaTablaDatos(cambio_dolar_control);
		} else {
			this.actualizarPaginaTablaDatos(cambio_dolar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cambio_dolar_control) {
		cambio_dolar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cambio_dolar_control.strAuxiliarUrlPagina);
				
		cambio_dolar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cambio_dolar_control.strAuxiliarTipo,cambio_dolar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cambio_dolar_control) {
		cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
			
		if(cambio_dolar_funcion1.esPaginaForm(cambio_dolar_constante1)==true) {
			window.opener.cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cambio_dolar_control) {
		this.cambio_dolar_controlInicial=cambio_dolar_control;
			
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cambio_dolar_control.strStyleDivArbol,cambio_dolar_control.strStyleDivContent
																,cambio_dolar_control.strStyleDivOpcionesBanner,cambio_dolar_control.strStyleDivExpandirColapsar
																,cambio_dolar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cambio_dolar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cambio_dolar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cambio_dolar_control) {
		this.actualizarCssBotonesPagina(cambio_dolar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cambio_dolar_control.tiposReportes,cambio_dolar_control.tiposReporte
															 	,cambio_dolar_control.tiposPaginacion,cambio_dolar_control.tiposAcciones
																,cambio_dolar_control.tiposColumnasSelect,cambio_dolar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cambio_dolar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cambio_dolar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cambio_dolar_control) {
	
		var indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cambio_dolar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cambio_dolar_control.strRecargarFkTiposNinguno!=null && cambio_dolar_control.strRecargarFkTiposNinguno!='NINGUNO' && cambio_dolar_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cambio_dolar_control) {
		jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trcambio_dolarCabeceraBusquedas").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trBusquedacambio_dolar").css("display",cambio_dolar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cambio_dolar_control.htmlTablaOrderBy!=null
			&& cambio_dolar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cambio_dolar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cambio_dolar_control.htmlTablaOrderByRel!=null
			&& cambio_dolar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display","none");
			jQuery("#trcambio_dolarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacambio_dolar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cambio_dolar_control) {
		
		if(!cambio_dolar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cambio_dolar_control);
		} else {
			jQuery("#divTablaDatoscambio_dolarsAjaxWebPart").html(cambio_dolar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscambio_dolars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscambio_dolars=jQuery("#tblTablaDatoscambio_dolars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cambio_dolar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cambio_dolar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cambio_dolar_webcontrol1.registrarControlesTableEdition(cambio_dolar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cambio_dolar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cambio_dolar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cambio_dolar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cambio_dolar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscambio_dolarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cambio_dolar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cambio_dolar_control);
		
		const divOrderBy = document.getElementById("divOrderBycambio_dolarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cambio_dolar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcambio_dolarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cambio_dolar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cambio_dolar_control.cambio_dolarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cambio_dolar_control);			
		}
	}
	
	actualizarCamposFilaTabla(cambio_dolar_control) {
		var i=0;
		
		i=cambio_dolar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cambio_dolar_control.cambio_dolarActual.id);
		jQuery("#t-version_row_"+i+"").val(cambio_dolar_control.cambio_dolarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(cambio_dolar_control.cambio_dolarActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(cambio_dolar_control.cambio_dolarActual.fecha_cambio);
		jQuery("#t-cel_"+i+"_4").val(cambio_dolar_control.cambio_dolarActual.dolar_compra);
		jQuery("#t-cel_"+i+"_5").val(cambio_dolar_control.cambio_dolarActual.dolar_venta);
		jQuery("#t-cel_"+i+"_6").val(cambio_dolar_control.cambio_dolarActual.origen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cambio_dolar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cambio_dolar_control) {
		cambio_dolar_funcion1.registrarControlesTableValidacionEdition(cambio_dolar_control,cambio_dolar_webcontrol1,cambio_dolar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cambio_dolar_control) {
		jQuery("#divResumencambio_dolarActualAjaxWebPart").html(cambio_dolar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cambio_dolar_control) {
		//jQuery("#divAccionesRelacionescambio_dolarAjaxWebPart").html(cambio_dolar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cambio_dolar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cambio_dolar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescambio_dolarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cambio_dolar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cambio_dolar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cambio_dolar_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncambio_dolar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cambio_dolar",id,"contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolarConstante,strParametros);
		
		//cambio_dolar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cambio_dolar_control
		
	
	}
	
	onLoadCombosDefectoFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cambio_dolar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
			
			
		
			
			if(cambio_dolar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cambio_dolar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cambio_dolar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cambio_dolar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,"cambio_dolar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cambio_dolar_control) {
		
		jQuery("#divBusquedacambio_dolarAjaxWebPart").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trcambio_dolarCabeceraBusquedas").css("display",cambio_dolar_control.strPermisoBusqueda);
		jQuery("#trBusquedacambio_dolar").css("display",cambio_dolar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecambio_dolar").css("display",cambio_dolar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscambio_dolar").attr("style",cambio_dolar_control.strPermisoMostrarTodos);		
		
		if(cambio_dolar_control.strPermisoNuevo!=null) {
			jQuery("#tdcambio_dolarNuevo").css("display",cambio_dolar_control.strPermisoNuevo);
			jQuery("#tdcambio_dolarNuevoToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcambio_dolarDuplicar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcambio_dolarDuplicarToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcambio_dolarNuevoGuardarCambios").css("display",cambio_dolar_control.strPermisoNuevo);
			jQuery("#tdcambio_dolarNuevoGuardarCambiosToolBar").css("display",cambio_dolar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cambio_dolar_control.strPermisoActualizar!=null) {
			jQuery("#tdcambio_dolarCopiar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcambio_dolarCopiarToolBar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcambio_dolarConEditar").css("display",cambio_dolar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcambio_dolarGuardarCambios").css("display",cambio_dolar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcambio_dolarGuardarCambiosToolBar").css("display",cambio_dolar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcambio_dolarCerrarPagina").css("display",cambio_dolar_control.strPermisoPopup);		
		jQuery("#tdcambio_dolarCerrarPaginaToolBar").css("display",cambio_dolar_control.strPermisoPopup);
		//jQuery("#trcambio_dolarAccionesRelaciones").css("display",cambio_dolar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cambio_dolar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cambio_dolar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cambio_dolar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cambio Dolares";
		sTituloBanner+=" - " + cambio_dolar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cambio_dolar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcambio_dolarRelacionesToolBar").css("display",cambio_dolar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscambio_dolar").css("display",cambio_dolar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cambio_dolar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cambio_dolar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarEventosControles();
		
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			cambio_dolar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cambio_dolar_constante1.STR_ES_RELACIONES=="true") {
			if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				cambio_dolar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cambio_dolar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cambio_dolar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cambio_dolar_webcontrol1.onLoad();
			
			//} else {
				//if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cambio_dolar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina: actualizarVariablesPagina(AccionesGenerales,AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionIndex)
		Variables-Pagina: actualizarVariablesPagina(AccionRecargarInformacion,AccionBusquedas,AccionBuscarPorIdGeneral,AccionAnteriores)
		Variables-Pagina: actualizarVariablesPagina(AccionSiguientes,AccionRecargarUltimaInformacion,AccionSeleccionarLoteFk)
		Variables-Pagina: actualizarVariablesPagina(AccionGuardarCambios,AccionDuplicar,AccionCopiar,AccionSeleccionarActual)
		Variables-Pagina: actualizarVariablesPagina(AccionEliminarCascada,AccionEliminarTabla,AccionQuitarElementosTabla,AccionNuevoPreparar)
		Variables-Pagina: actualizarVariablesPagina(AccionNuevoTablaPreparar,AccionNuevoPrepararAbrirPaginaForm,AccionEditarTablaDatos)
		Variables-Pagina: actualizarVariablesPagina(AccionGenerarHtmlReporte,AccionGenerarHtmlFormReporte,AccionGenerarHtmlRelacionesReporte)
		Variables-Pagina: actualizarVariablesPagina(AccionQuitarRelacionesReporte,AccionGenerarReporteAbrirPaginaForm,AccionEliminarCascada)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla,TablaDatosAuxiliar)
		Pagina: actualizarPagina(AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles,CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaBusquedas,TablaDatos,TablaDatosJsTemplate,OrderBy,TablaFilaActual)
		Campos: actualizarCamposFilaTabla
		Combos: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Defecto: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		TablaAccionesControles-Sesion: registrarTablaAcciones,registrarSesion_defectoParaproductos,registrarControlesTableEdition
		Css: actualizarCssBusquedas,actualizarCssBotonesPagina
		Recargar-Buscar: recargarUltimaInformacion,buscarPorIdGeneral
		Abrir: abrirBusquedaParaempresa
		Registrar-Seleccionar: registrarDivAccionesRelaciones,manejarSeleccionarLoteFk
		Eventos: registrarEventosControles
		Registrar: registrarAccionesEventos,registrarPropiedadesPagina
		OnLoad: onLoadRecargarRelacionado,onLoadCombosDefectoFK,onLoadCombosEventosFK
		OnLoad: onLoad,onUnLoadWindow,onLoadWindow,registrarEventosOnLoadGlobal
	*/
}

var cambio_dolar_webcontrol1 = new cambio_dolar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cambio_dolar_webcontrol,cambio_dolar_webcontrol1};

//Para ser llamado desde window.opener
window.cambio_dolar_webcontrol1 = cambio_dolar_webcontrol1;


if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cambio_dolar_webcontrol1.onLoadWindow; 
}

//</script>