//<script type="text/javascript" language="javascript">



//var imagen_cotizacionJQueryPaginaWebInteraccion= function (imagen_cotizacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_cotizacion_constante,imagen_cotizacion_constante1} from '../util/imagen_cotizacion_constante.js';

import {imagen_cotizacion_funcion,imagen_cotizacion_funcion1} from '../util/imagen_cotizacion_funcion.js';


class imagen_cotizacion_webcontrol extends GeneralEntityWebControl {
	
	imagen_cotizacion_control=null;
	imagen_cotizacion_controlInicial=null;
	imagen_cotizacion_controlAuxiliar=null;
		
	//if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_cotizacion_control) {
		super();
		
		this.imagen_cotizacion_control=imagen_cotizacion_control;
	}
		
	actualizarVariablesPagina(imagen_cotizacion_control) {
		
		if(imagen_cotizacion_control.action=="index" || imagen_cotizacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control);
			
		} 
		
		
		else if(imagen_cotizacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_cotizacion_control);
		
		}  else if(imagen_cotizacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action.includes("Busqueda") ||
				  imagen_cotizacion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_cotizacion_control);
			
		} else if(imagen_cotizacion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_cotizacion_control)
		}
		
		
		
	
		else if(imagen_cotizacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control);	
		
		} else if(imagen_cotizacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_cotizacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_cotizacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_cotizacion_control) {
		this.actualizarPaginaAccionesGenerales(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);
		this.actualizarPaginaOrderBy(imagen_cotizacion_control);
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control) {
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_cotizacion_control) {
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);				
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_cotizacion_control) {
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cotizacion_control) {
					//super.actualizarPaginaImprimir(imagen_cotizacion_control,"imagen_cotizacion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cotizacion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_cotizacion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_cotizacion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cotizacion_control) {
		//super.actualizarPaginaImprimir(imagen_cotizacion_control,"imagen_cotizacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_cotizacion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_cotizacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cotizacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_cotizacion_control) {
		//super.actualizarPaginaImprimir(imagen_cotizacion_control,"imagen_cotizacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_cotizacion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_cotizacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cotizacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_cotizacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_cotizacion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_cotizacion_control);
			
		this.actualizarPaginaAbrirLink(imagen_cotizacion_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_cotizacion_control) {
		
		if(imagen_cotizacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_cotizacion_control);
		}
		
		if(imagen_cotizacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_cotizacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_cotizacion_control) {
		if(imagen_cotizacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_cotizacionReturnGeneral",JSON.stringify(imagen_cotizacion_control.imagen_cotizacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cotizacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_cotizacion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_cotizacion_funcion1.resaltarRestaurarDivsPagina(false,"imagen_cotizacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_cotizacion_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_cotizacion");
			}			
			
			imagen_cotizacion_funcion1.mostrarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_cotizacion_funcion1.mostrarDivMensaje(false,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_funcion1.esPaginaForm(imagen_cotizacion_constante1)==true) {
			window.opener.imagen_cotizacion_webcontrol1.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_cotizacion_control) {
		imagen_cotizacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_cotizacion_control.strAuxiliarUrlPagina);
				
		imagen_cotizacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_cotizacion_control.strAuxiliarTipo,imagen_cotizacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_cotizacion_control) {
		imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
			
		if(imagen_cotizacion_funcion1.esPaginaForm(imagen_cotizacion_constante1)==true) {
			window.opener.imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_cotizacion_control) {
		this.imagen_cotizacion_controlInicial=imagen_cotizacion_control;
			
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_cotizacion_control.strStyleDivArbol,imagen_cotizacion_control.strStyleDivContent
																,imagen_cotizacion_control.strStyleDivOpcionesBanner,imagen_cotizacion_control.strStyleDivExpandirColapsar
																,imagen_cotizacion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_cotizacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_cotizacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_cotizacion_control) {
		this.actualizarCssBotonesPagina(imagen_cotizacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_cotizacion_control.tiposReportes,imagen_cotizacion_control.tiposReporte
															 	,imagen_cotizacion_control.tiposPaginacion,imagen_cotizacion_control.tiposAcciones
																,imagen_cotizacion_control.tiposColumnasSelect,imagen_cotizacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_cotizacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_cotizacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_cotizacion_control) {
	
		var indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_cotizacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_cotizacion_control.strRecargarFkTiposNinguno!=null && imagen_cotizacion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_cotizacion_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_cotizacion_control) {
		jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_cotizacion_control.htmlTablaOrderBy!=null
			&& imagen_cotizacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_cotizacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_cotizacion_control.htmlTablaOrderByRel!=null
			&& imagen_cotizacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display","none");
			jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_cotizacion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_cotizacion_control) {
		
		if(!imagen_cotizacion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_cotizacion_control);
		} else {
			jQuery("#divTablaDatosimagen_cotizacionsAjaxWebPart").html(imagen_cotizacion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_cotizacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_cotizacions=jQuery("#tblTablaDatosimagen_cotizacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_cotizacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_cotizacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_cotizacion_webcontrol1.registrarControlesTableEdition(imagen_cotizacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_cotizacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_cotizacion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_cotizacion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_cotizacion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_cotizacionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_cotizacion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_cotizacion_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_cotizacionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_cotizacion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_cotizacionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_cotizacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_cotizacion_control.imagen_cotizacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_cotizacion_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_cotizacion_control) {
		var i=0;
		
		i=imagen_cotizacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_cotizacion_control.imagen_cotizacionActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_cotizacion_control.imagen_cotizacionActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_cotizacion_control.imagen_cotizacionActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_cotizacion_control.imagen_cotizacionActual.nro_cotizacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_cotizacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_cotizacion_control) {
		imagen_cotizacion_funcion1.registrarControlesTableValidacionEdition(imagen_cotizacion_control,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_cotizacion_control) {
		jQuery("#divResumenimagen_cotizacionActualAjaxWebPart").html(imagen_cotizacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_cotizacion_control) {
		//jQuery("#divAccionesRelacionesimagen_cotizacionAjaxWebPart").html(imagen_cotizacion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_cotizacion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_cotizacion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_cotizacionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_cotizacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_cotizacion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_cotizacion_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_cotizacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_cotizacion",id,"inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacionConstante,strParametros);
		
		//imagen_cotizacion_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_cotizacion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_cotizacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
			
			
		
			
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_cotizacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_cotizacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,"imagen_cotizacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_cotizacion_control) {
		
		jQuery("#divBusquedaimagen_cotizacionAjaxWebPart").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trimagen_cotizacionCabeceraBusquedas").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_cotizacion").attr("style",imagen_cotizacion_control.strPermisoMostrarTodos);		
		
		if(imagen_cotizacion_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_cotizacionNuevo").css("display",imagen_cotizacion_control.strPermisoNuevo);
			jQuery("#tdimagen_cotizacionNuevoToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_cotizacionDuplicar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_cotizacionDuplicarToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_cotizacionNuevoGuardarCambios").css("display",imagen_cotizacion_control.strPermisoNuevo);
			jQuery("#tdimagen_cotizacionNuevoGuardarCambiosToolBar").css("display",imagen_cotizacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_cotizacion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_cotizacionCopiar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_cotizacionCopiarToolBar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_cotizacionConEditar").css("display",imagen_cotizacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_cotizacionGuardarCambios").css("display",imagen_cotizacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_cotizacionGuardarCambiosToolBar").css("display",imagen_cotizacion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_cotizacionCerrarPagina").css("display",imagen_cotizacion_control.strPermisoPopup);		
		jQuery("#tdimagen_cotizacionCerrarPaginaToolBar").css("display",imagen_cotizacion_control.strPermisoPopup);
		//jQuery("#trimagen_cotizacionAccionesRelaciones").css("display",imagen_cotizacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Cotizaciones";
		sTituloBanner+=" - " + imagen_cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cotizacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_cotizacionRelacionesToolBar").css("display",imagen_cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_cotizacion").css("display",imagen_cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_cotizacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_cotizacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarEventosControles();
		
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_cotizacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_cotizacion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cotizacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_cotizacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_cotizacion_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_cotizacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
	}
}

var imagen_cotizacion_webcontrol1 = new imagen_cotizacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_cotizacion_webcontrol,imagen_cotizacion_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_cotizacion_webcontrol1 = imagen_cotizacion_webcontrol1;


if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_cotizacion_webcontrol1.onLoadWindow; 
}

//</script>