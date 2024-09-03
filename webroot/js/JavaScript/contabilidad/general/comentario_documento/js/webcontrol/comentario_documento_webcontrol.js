//<script type="text/javascript" language="javascript">



//var comentario_documentoJQueryPaginaWebInteraccion= function (comentario_documento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {comentario_documento_constante,comentario_documento_constante1} from '../util/comentario_documento_constante.js';

import {comentario_documento_funcion,comentario_documento_funcion1} from '../util/comentario_documento_funcion.js';


class comentario_documento_webcontrol extends GeneralEntityWebControl {
	
	comentario_documento_control=null;
	comentario_documento_controlInicial=null;
	comentario_documento_controlAuxiliar=null;
		
	//if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(comentario_documento_control) {
		super();
		
		this.comentario_documento_control=comentario_documento_control;
	}
		
	actualizarVariablesPagina(comentario_documento_control) {
		
		if(comentario_documento_control.action=="index" || comentario_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(comentario_documento_control);
			
		} 
		
		
		else if(comentario_documento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(comentario_documento_control);
			
		} else if(comentario_documento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(comentario_documento_control);
			
		} else if(comentario_documento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(comentario_documento_control);
		
		}  else if(comentario_documento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(comentario_documento_control);		
		
		} else if(comentario_documento_control.action.includes("Busqueda") ||
				  comentario_documento_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(comentario_documento_control);
			
		} else if(comentario_documento_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(comentario_documento_control)
		}
		
		
		
	
		else if(comentario_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(comentario_documento_control);	
		
		} else if(comentario_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + comentario_documento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(comentario_documento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(comentario_documento_control) {
		this.actualizarPaginaAccionesGenerales(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(comentario_documento_control) {
		
		this.actualizarPaginaCargaGeneral(comentario_documento_control);
		this.actualizarPaginaOrderBy(comentario_documento_control);
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
		this.actualizarPaginaAreaBusquedas(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(comentario_documento_control) {
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(comentario_documento_control) {
		
		this.actualizarPaginaCargaGeneral(comentario_documento_control);
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
		this.actualizarPaginaAreaBusquedas(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(comentario_documento_control) {
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(comentario_documento_control) {
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);				
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(comentario_documento_control) {
		//this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(comentario_documento_control) {
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(comentario_documento_control) {
		this.actualizarPaginaTablaDatos(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(comentario_documento_control) {
					//super.actualizarPaginaImprimir(comentario_documento_control,"comentario_documento");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",comentario_documento_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("comentario_documento_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(comentario_documento_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(comentario_documento_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(comentario_documento_control) {
		//super.actualizarPaginaImprimir(comentario_documento_control,"comentario_documento");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("comentario_documento_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(comentario_documento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",comentario_documento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(comentario_documento_control) {
		//super.actualizarPaginaImprimir(comentario_documento_control,"comentario_documento");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("comentario_documento_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(comentario_documento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",comentario_documento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(comentario_documento_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(comentario_documento_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(comentario_documento_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(comentario_documento_control);
			
		this.actualizarPaginaAbrirLink(comentario_documento_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(comentario_documento_control) {
		
		if(comentario_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(comentario_documento_control);
		}
		
		if(comentario_documento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(comentario_documento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(comentario_documento_control) {
		if(comentario_documento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("comentario_documentoReturnGeneral",JSON.stringify(comentario_documento_control.comentario_documentoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control) {
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && comentario_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(comentario_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(comentario_documento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(comentario_documento_control, mostrar) {
		
		if(mostrar==true) {
			comentario_documento_funcion1.resaltarRestaurarDivsPagina(false,"comentario_documento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				comentario_documento_funcion1.resaltarRestaurarDivMantenimiento(false,"comentario_documento");
			}			
			
			comentario_documento_funcion1.mostrarDivMensaje(true,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		
		} else {
			comentario_documento_funcion1.mostrarDivMensaje(false,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(comentario_documento_control) {
		if(comentario_documento_funcion1.esPaginaForm(comentario_documento_constante1)==true) {
			window.opener.comentario_documento_webcontrol1.actualizarPaginaTablaDatos(comentario_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(comentario_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(comentario_documento_control) {
		comentario_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(comentario_documento_control.strAuxiliarUrlPagina);
				
		comentario_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(comentario_documento_control.strAuxiliarTipo,comentario_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(comentario_documento_control) {
		comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
			
		if(comentario_documento_funcion1.esPaginaForm(comentario_documento_constante1)==true) {
			window.opener.comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(comentario_documento_control) {
		this.comentario_documento_controlInicial=comentario_documento_control;
			
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(comentario_documento_control.strStyleDivArbol,comentario_documento_control.strStyleDivContent
																,comentario_documento_control.strStyleDivOpcionesBanner,comentario_documento_control.strStyleDivExpandirColapsar
																,comentario_documento_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=comentario_documento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",comentario_documento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(comentario_documento_control) {
		this.actualizarCssBotonesPagina(comentario_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(comentario_documento_control.tiposReportes,comentario_documento_control.tiposReporte
															 	,comentario_documento_control.tiposPaginacion,comentario_documento_control.tiposAcciones
																,comentario_documento_control.tiposColumnasSelect,comentario_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(comentario_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(comentario_documento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(comentario_documento_control) {
	
		var indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(comentario_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(comentario_documento_control.strRecargarFkTiposNinguno!=null && comentario_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && comentario_documento_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(comentario_documento_control) {
		jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trcomentario_documentoCabeceraBusquedas").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedacomentario_documento").css("display",comentario_documento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(comentario_documento_control.htmlTablaOrderBy!=null
			&& comentario_documento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//comentario_documento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(comentario_documento_control.htmlTablaOrderByRel!=null
			&& comentario_documento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display","none");
			jQuery("#trcomentario_documentoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacomentario_documento").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(comentario_documento_control) {
		
		if(!comentario_documento_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(comentario_documento_control);
		} else {
			jQuery("#divTablaDatoscomentario_documentosAjaxWebPart").html(comentario_documento_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscomentario_documentos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscomentario_documentos=jQuery("#tblTablaDatoscomentario_documentos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("comentario_documento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',comentario_documento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			comentario_documento_webcontrol1.registrarControlesTableEdition(comentario_documento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		comentario_documento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(comentario_documento_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("comentario_documento_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(comentario_documento_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscomentario_documentosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(comentario_documento_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(comentario_documento_control);
		
		const divOrderBy = document.getElementById("divOrderBycomentario_documentoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(comentario_documento_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcomentario_documentoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(comentario_documento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(comentario_documento_control.comentario_documentoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(comentario_documento_control);			
		}
	}
	
	actualizarCamposFilaTabla(comentario_documento_control) {
		var i=0;
		
		i=comentario_documento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(comentario_documento_control.comentario_documentoActual.id);
		jQuery("#t-version_row_"+i+"").val(comentario_documento_control.comentario_documentoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(comentario_documento_control.comentario_documentoActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(comentario_documento_control.comentario_documentoActual.tipo_documento);
		jQuery("#t-cel_"+i+"_4").val(comentario_documento_control.comentario_documentoActual.comentario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(comentario_documento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(comentario_documento_control) {
		comentario_documento_funcion1.registrarControlesTableValidacionEdition(comentario_documento_control,comentario_documento_webcontrol1,comentario_documento_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(comentario_documento_control) {
		jQuery("#divResumencomentario_documentoActualAjaxWebPart").html(comentario_documento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(comentario_documento_control) {
		//jQuery("#divAccionesRelacionescomentario_documentoAjaxWebPart").html(comentario_documento_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("comentario_documento_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(comentario_documento_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescomentario_documentoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		comentario_documento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(comentario_documento_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(comentario_documento_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncomentario_documento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("comentario_documento",id,"general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documentoConstante,strParametros);
		
		//comentario_documento_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//comentario_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(comentario_documento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
			
			
		
			
			if(comentario_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("comentario_documento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("comentario_documento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(comentario_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,"comentario_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(comentario_documento_control) {
		
		jQuery("#divBusquedacomentario_documentoAjaxWebPart").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trcomentario_documentoCabeceraBusquedas").css("display",comentario_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedacomentario_documento").css("display",comentario_documento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecomentario_documento").css("display",comentario_documento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscomentario_documento").attr("style",comentario_documento_control.strPermisoMostrarTodos);		
		
		if(comentario_documento_control.strPermisoNuevo!=null) {
			jQuery("#tdcomentario_documentoNuevo").css("display",comentario_documento_control.strPermisoNuevo);
			jQuery("#tdcomentario_documentoNuevoToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcomentario_documentoDuplicar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcomentario_documentoDuplicarToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcomentario_documentoNuevoGuardarCambios").css("display",comentario_documento_control.strPermisoNuevo);
			jQuery("#tdcomentario_documentoNuevoGuardarCambiosToolBar").css("display",comentario_documento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(comentario_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdcomentario_documentoCopiar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcomentario_documentoCopiarToolBar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcomentario_documentoConEditar").css("display",comentario_documento_control.strPermisoActualizar);
		}
		
		jQuery("#tdcomentario_documentoGuardarCambios").css("display",comentario_documento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcomentario_documentoGuardarCambiosToolBar").css("display",comentario_documento_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcomentario_documentoCerrarPagina").css("display",comentario_documento_control.strPermisoPopup);		
		jQuery("#tdcomentario_documentoCerrarPaginaToolBar").css("display",comentario_documento_control.strPermisoPopup);
		//jQuery("#trcomentario_documentoAccionesRelaciones").css("display",comentario_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=comentario_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + comentario_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + comentario_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Comentario Documentos";
		sTituloBanner+=" - " + comentario_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + comentario_documento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcomentario_documentoRelacionesToolBar").css("display",comentario_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscomentario_documento").css("display",comentario_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		comentario_documento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		comentario_documento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarEventosControles();
		
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			comentario_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(comentario_documento_constante1.STR_ES_RELACIONES=="true") {
			if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				comentario_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(comentario_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(comentario_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				comentario_documento_webcontrol1.onLoad();
			
			//} else {
				//if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			comentario_documento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
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

var comentario_documento_webcontrol1 = new comentario_documento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {comentario_documento_webcontrol,comentario_documento_webcontrol1};

//Para ser llamado desde window.opener
window.comentario_documento_webcontrol1 = comentario_documento_webcontrol1;


if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = comentario_documento_webcontrol1.onLoadWindow; 
}

//</script>