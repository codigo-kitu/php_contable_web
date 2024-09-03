//<script type="text/javascript" language="javascript">



//var log_actividadJQueryPaginaWebInteraccion= function (log_actividad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {log_actividad_constante,log_actividad_constante1} from '../util/log_actividad_constante.js';

import {log_actividad_funcion,log_actividad_funcion1} from '../util/log_actividad_funcion.js';


class log_actividad_webcontrol extends GeneralEntityWebControl {
	
	log_actividad_control=null;
	log_actividad_controlInicial=null;
	log_actividad_controlAuxiliar=null;
		
	//if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(log_actividad_control) {
		super();
		
		this.log_actividad_control=log_actividad_control;
	}
		
	actualizarVariablesPagina(log_actividad_control) {
		
		if(log_actividad_control.action=="index" || log_actividad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(log_actividad_control);
			
		} 
		
		
		else if(log_actividad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(log_actividad_control);
		
		} else if(log_actividad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(log_actividad_control);
		
		} else if(log_actividad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(log_actividad_control);
		
		} else if(log_actividad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(log_actividad_control);
			
		} else if(log_actividad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(log_actividad_control);
			
		} else if(log_actividad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(log_actividad_control);		
		
		} else if(log_actividad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(log_actividad_control);
		
		} else if(log_actividad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(log_actividad_control);
		
		} else if(log_actividad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(log_actividad_control);
		
		}  else if(log_actividad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(log_actividad_control);
		
		} else if(log_actividad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(log_actividad_control);
		
		} else if(log_actividad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(log_actividad_control);
		
		} else if(log_actividad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(log_actividad_control);		
		
		} else if(log_actividad_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(log_actividad_control);		
		
		} else if(log_actividad_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(log_actividad_control);		
		
		} else if(log_actividad_control.action.includes("Busqueda") ||
				  log_actividad_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(log_actividad_control);
			
		} else if(log_actividad_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(log_actividad_control)
		}
		
		
		
	
		else if(log_actividad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(log_actividad_control);	
		
		} else if(log_actividad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + log_actividad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(log_actividad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(log_actividad_control) {
		this.actualizarPaginaAccionesGenerales(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(log_actividad_control) {
		
		this.actualizarPaginaCargaGeneral(log_actividad_control);
		this.actualizarPaginaOrderBy(log_actividad_control);
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
		this.actualizarPaginaAreaBusquedas(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(log_actividad_control) {
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(log_actividad_control) {
		
		this.actualizarPaginaCargaGeneral(log_actividad_control);
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
		this.actualizarPaginaAreaBusquedas(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(log_actividad_control) {
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(log_actividad_control) {
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);				
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(log_actividad_control) {
		//this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		//this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(log_actividad_control) {
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(log_actividad_control) {
		this.actualizarPaginaTablaDatos(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(log_actividad_control) {
					//super.actualizarPaginaImprimir(log_actividad_control,"log_actividad");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",log_actividad_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("log_actividad_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(log_actividad_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(log_actividad_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(log_actividad_control) {
		//super.actualizarPaginaImprimir(log_actividad_control,"log_actividad");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("log_actividad_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(log_actividad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",log_actividad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(log_actividad_control) {
		//super.actualizarPaginaImprimir(log_actividad_control,"log_actividad");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("log_actividad_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(log_actividad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",log_actividad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(log_actividad_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(log_actividad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(log_actividad_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(log_actividad_control);
			
		this.actualizarPaginaAbrirLink(log_actividad_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(log_actividad_control) {
		
		if(log_actividad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(log_actividad_control);
		}
		
		if(log_actividad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(log_actividad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(log_actividad_control) {
		if(log_actividad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("log_actividadReturnGeneral",JSON.stringify(log_actividad_control.log_actividadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(log_actividad_control) {
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && log_actividad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(log_actividad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(log_actividad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(log_actividad_control, mostrar) {
		
		if(mostrar==true) {
			log_actividad_funcion1.resaltarRestaurarDivsPagina(false,"log_actividad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				log_actividad_funcion1.resaltarRestaurarDivMantenimiento(false,"log_actividad");
			}			
			
			log_actividad_funcion1.mostrarDivMensaje(true,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		
		} else {
			log_actividad_funcion1.mostrarDivMensaje(false,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(log_actividad_control) {
		if(log_actividad_funcion1.esPaginaForm(log_actividad_constante1)==true) {
			window.opener.log_actividad_webcontrol1.actualizarPaginaTablaDatos(log_actividad_control);
		} else {
			this.actualizarPaginaTablaDatos(log_actividad_control);
		}
	}
	
	actualizarPaginaAbrirLink(log_actividad_control) {
		log_actividad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(log_actividad_control.strAuxiliarUrlPagina);
				
		log_actividad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(log_actividad_control.strAuxiliarTipo,log_actividad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(log_actividad_control) {
		log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
			
		if(log_actividad_funcion1.esPaginaForm(log_actividad_constante1)==true) {
			window.opener.log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(log_actividad_control) {
		this.log_actividad_controlInicial=log_actividad_control;
			
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(log_actividad_control.strStyleDivArbol,log_actividad_control.strStyleDivContent
																,log_actividad_control.strStyleDivOpcionesBanner,log_actividad_control.strStyleDivExpandirColapsar
																,log_actividad_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=log_actividad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",log_actividad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(log_actividad_control) {
		this.actualizarCssBotonesPagina(log_actividad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(log_actividad_control.tiposReportes,log_actividad_control.tiposReporte
															 	,log_actividad_control.tiposPaginacion,log_actividad_control.tiposAcciones
																,log_actividad_control.tiposColumnasSelect,log_actividad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(log_actividad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(log_actividad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(log_actividad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(log_actividad_control) {
	
		var indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(log_actividad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(log_actividad_control.strRecargarFkTiposNinguno!=null && log_actividad_control.strRecargarFkTiposNinguno!='NINGUNO' && log_actividad_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(log_actividad_control) {
		jQuery("#divBusquedalog_actividadAjaxWebPart").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trlog_actividadCabeceraBusquedas").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trBusquedalog_actividad").css("display",log_actividad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(log_actividad_control.htmlTablaOrderBy!=null
			&& log_actividad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//log_actividad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(log_actividad_control.htmlTablaOrderByRel!=null
			&& log_actividad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(log_actividad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalog_actividadAjaxWebPart").css("display","none");
			jQuery("#trlog_actividadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalog_actividad").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(log_actividad_control) {
		
		if(!log_actividad_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(log_actividad_control);
		} else {
			jQuery("#divTablaDatoslog_actividadsAjaxWebPart").html(log_actividad_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslog_actividads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslog_actividads=jQuery("#tblTablaDatoslog_actividads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("log_actividad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',log_actividad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			log_actividad_webcontrol1.registrarControlesTableEdition(log_actividad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		log_actividad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(log_actividad_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("log_actividad_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(log_actividad_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoslog_actividadsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(log_actividad_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(log_actividad_control);
		
		const divOrderBy = document.getElementById("divOrderBylog_actividadAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(log_actividad_control);
		
		const divOrderByRel = document.getElementById("divOrderByRellog_actividadAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(log_actividad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(log_actividad_control.log_actividadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(log_actividad_control);			
		}
	}
	
	actualizarCamposFilaTabla(log_actividad_control) {
		var i=0;
		
		i=log_actividad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(log_actividad_control.log_actividadActual.id);
		jQuery("#t-version_row_"+i+"").val(log_actividad_control.log_actividadActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(log_actividad_control.log_actividadActual.log_id);
		jQuery("#t-cel_"+i+"_3").val(log_actividad_control.log_actividadActual.fecha);
		jQuery("#t-cel_"+i+"_4").val(log_actividad_control.log_actividadActual.hora);
		jQuery("#t-cel_"+i+"_5").val(log_actividad_control.log_actividadActual.computador);
		jQuery("#t-cel_"+i+"_6").val(log_actividad_control.log_actividadActual.usuario);
		jQuery("#t-cel_"+i+"_7").val(log_actividad_control.log_actividadActual.descripcion);
		jQuery("#t-cel_"+i+"_8").val(log_actividad_control.log_actividadActual.modulo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(log_actividad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(log_actividad_control) {
		log_actividad_funcion1.registrarControlesTableValidacionEdition(log_actividad_control,log_actividad_webcontrol1,log_actividad_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(log_actividad_control) {
		jQuery("#divResumenlog_actividadActualAjaxWebPart").html(log_actividad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(log_actividad_control) {
		//jQuery("#divAccionesRelacioneslog_actividadAjaxWebPart").html(log_actividad_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("log_actividad_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(log_actividad_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneslog_actividadAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		log_actividad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(log_actividad_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(log_actividad_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlog_actividad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("log_actividad",id,"general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividadConstante,strParametros);
		
		//log_actividad_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//log_actividad_control
		
	
	}
	
	onLoadCombosDefectoFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(log_actividad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
			
			
		
			
			if(log_actividad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("log_actividad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("log_actividad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(log_actividad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,"log_actividad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(log_actividad_control) {
		
		jQuery("#divBusquedalog_actividadAjaxWebPart").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trlog_actividadCabeceraBusquedas").css("display",log_actividad_control.strPermisoBusqueda);
		jQuery("#trBusquedalog_actividad").css("display",log_actividad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelog_actividad").css("display",log_actividad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslog_actividad").attr("style",log_actividad_control.strPermisoMostrarTodos);		
		
		if(log_actividad_control.strPermisoNuevo!=null) {
			jQuery("#tdlog_actividadNuevo").css("display",log_actividad_control.strPermisoNuevo);
			jQuery("#tdlog_actividadNuevoToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlog_actividadDuplicar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlog_actividadDuplicarToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlog_actividadNuevoGuardarCambios").css("display",log_actividad_control.strPermisoNuevo);
			jQuery("#tdlog_actividadNuevoGuardarCambiosToolBar").css("display",log_actividad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(log_actividad_control.strPermisoActualizar!=null) {
			jQuery("#tdlog_actividadCopiar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlog_actividadCopiarToolBar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlog_actividadConEditar").css("display",log_actividad_control.strPermisoActualizar);
		}
		
		jQuery("#tdlog_actividadGuardarCambios").css("display",log_actividad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlog_actividadGuardarCambiosToolBar").css("display",log_actividad_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdlog_actividadCerrarPagina").css("display",log_actividad_control.strPermisoPopup);		
		jQuery("#tdlog_actividadCerrarPaginaToolBar").css("display",log_actividad_control.strPermisoPopup);
		//jQuery("#trlog_actividadAccionesRelaciones").css("display",log_actividad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=log_actividad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + log_actividad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + log_actividad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Log Actividadeses";
		sTituloBanner+=" - " + log_actividad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + log_actividad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlog_actividadRelacionesToolBar").css("display",log_actividad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslog_actividad").css("display",log_actividad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		log_actividad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		log_actividad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarEventosControles();
		
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			log_actividad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(log_actividad_constante1.STR_ES_RELACIONES=="true") {
			if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				log_actividad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(log_actividad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(log_actividad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				log_actividad_webcontrol1.onLoad();
			
			//} else {
				//if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			log_actividad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}
}

var log_actividad_webcontrol1 = new log_actividad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {log_actividad_webcontrol,log_actividad_webcontrol1};

//Para ser llamado desde window.opener
window.log_actividad_webcontrol1 = log_actividad_webcontrol1;


if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = log_actividad_webcontrol1.onLoadWindow; 
}

//</script>